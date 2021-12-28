<?php

namespace BrizyMerge;


use BrizyMerge\Assets\Asset;
use BrizyMerge\Assets\AssetFont;
use BrizyMerge\Assets\AssetGroup;
use BrizyMerge\Assets\AssetLib;

class AssetAggregator
{
    const FONT_TYPE_GOOGLE = 'google-font';
    const FONT_TYPE_UPLOADED = 'uploaded-font';

    /**
     * @var AssetGroup[] $groups ;
     */
    private $groups;

    /**
     * AssetAggregator constructor.
     *
     * @param $assets
     */
    public function __construct($assets = [])
    {
        $this->groups = $assets;
    }

    /**
     * @param $group
     */
    public function addAssetGroup(AssetGroup $group)
    {
        $this->groups[] = $group;
    }

    /**
     * @param AssetGroup[] $groups
     */
    public function setAssetGroups($groups)
    {
        $this->groups[] = $groups;
    }


    /**
     * This will return a list of assets ready to be included in page
     *
     * @return Asset[]
     */
    public function getAssetList()
    {
        $assets = $this->getAggregatedAssets($this->groups);

        list($freeLibMap, $proLibMap) = $this->getLibMaps($this->groups);

        $assets = $this->normalizeAssets($assets, $freeLibMap, $proLibMap);

        return $this->sortAssets($assets);
    }

    private function getLibMaps($groups)
    {
        $pro  = null;
        $free = null;
        foreach ($groups as $group) {
            /**
             * @var AssetGroup $group ;
             */
            if ($group->getMain() && $group->getMain()->isPro()) {
                $pro = $group->getLibsMap();
            } else {
                $free = $group->getLibsMap();
            }

            if ($pro && $free) {
                return [$free, $pro];
            }
        }

        return [$free, $pro];
    }

    private function getAggregatedAssets($groups)
    {
        $assets    = [];
        $mainAsset = null;

        foreach ($groups as $group) {

            /**
             * @var AssetGroup $group ;
             */
            // set main asset and override if there are pro main assets
            if ( ! $mainAsset || $group->getMain()->isPro()) {
                $mainAsset = $group->getMain();
            }

            foreach ($group->getGeneric() as $asset) {
                $assets[] = $asset;
            }
            foreach ($group->getPageFonts() as $font) {
                $assets[] = $font;
            }
            foreach ($group->getPageStyles() as $style) {
                $assets[] = $style;
            }

            $selectors      = $group->getLibsSelectors();
            $selectorsCount = count($selectors);

            if ($selectorsCount != 0) {
                $selectedLib = array_reduce(
                    $group->getLibsMap(),
                    function ($lib, $alib) use ($selectors, $selectorsCount) {
                        if ($lib) {
                            return $lib;
                        }

                        return count(
                                   array_intersect($alib->getSelectors(), $selectors)
                               ) == $selectorsCount ? $alib : null;
                    }
                );

                if ($selectedLib) {
                    $assets[] = $selectedLib;
                }
            }

            $assets = array_filter(
                $assets,
                function ($a) {
                    return ! is_null($a);
                }
            );
        }

        // include main asset
        if ($mainAsset) {
            $assets[] = $mainAsset;
        }

        return $assets;
    }

    private function normalizeAssets($assets, $freeLibMap, $proLibMap)
    {
        // remove duplicates
        $duplicateKeys = [];
        $tmp           = [];

        foreach ($assets as $key => $val) {
            if ( ! in_array($val, $tmp)) {
                $tmp[] = $val;
            } else {
                $duplicateKeys[] = $key;
            }
        }

        foreach ($duplicateKeys as $key) {
            unset($assets[$key]);
        }

        // find libs and check if cannot be replace with a bigger lib to save requests
        $freeLibsFoundKeys      = [];
        $freeLibsSelectorsFound = [];
        $proLibsFoundKeys       = [];
        $proLibsSelectorsFound  = [];

        foreach ($assets as $key => $lib) {
            if ($lib instanceof AssetLib && ! $lib->isPro()) {
                $freeLibsFoundKeys[]    = $key;
                $freeLibsSelectorsFound = array_merge($freeLibsSelectorsFound, $lib->getSelectors());
            }

            if ($lib instanceof AssetLib && $lib->isPro()) {
                $proLibsFoundKeys[]    = $key;
                $proLibsSelectorsFound = array_merge($proLibsSelectorsFound, $lib->getSelectors());
            }
        }

        $assets = $this->groupLibs($assets, $freeLibMap, $freeLibsSelectorsFound, $freeLibsFoundKeys);
        $assets = $this->groupLibs($assets, $proLibMap, $proLibsSelectorsFound, $proLibsFoundKeys);

        $assets = $this->groupGoogleFonts($assets);
        $assets = $this->groupUploadedFonts($assets);

        return array_values($assets);
    }

    private function groupLibs($assets, $libMap, $selectorsFound, $foundLibPositions)
    {
        if (count($foundLibPositions) != 0) {
            // try to find a lib containing all found selectors
            $libsSelectorsFound      = array_unique($selectorsFound);
            $libsSelectorsFoundCount = count($libsSelectorsFound);

            foreach ($libMap as $alib) {
                if (count(array_intersect($alib->getSelectors(), $libsSelectorsFound)) == $libsSelectorsFoundCount) {

                    foreach ($foundLibPositions as $key) {
                        unset($assets[$key]);
                    }

                    $assets[] = $alib;
                    break;
                }
            }
        }

        return $assets;
    }

    private function groupGoogleFonts($assets)
    {
        return $this->groupFonts(
            $assets,
            self::FONT_TYPE_GOOGLE,
            "/\?family=(.*?)(&|\")/",
            function ($value,$matchTermination) {
                return "?family={$value}{$matchTermination}";
            }
        );
    }

    private function groupUploadedFonts($assets)
    {
        return $this->groupFonts(
            $assets,
            self::FONT_TYPE_UPLOADED,
            "/-font=(.*?)(&|\"|$)/",
            function ($value,$matchTermination) {
                return "-font={$value}{$matchTermination}";
            }
        );
    }

    private function groupFonts($assets, $fontType, $extractRegex, $replaceRegex)
    {
        // extract google fonts
        $fonts      = [];
        $sampleFont = null;
        $matchTermination = "";
        foreach ($assets as $i => $asset) {
            /**
             * @var AssetFont $asset ;
             */
            if ($asset instanceof AssetFont && $asset->getFontType() === $fontType) {

                // obtain a font copy
                if ( ! $sampleFont) {
                    $sampleFont = $asset;
                }
                $matches = [];
                preg_match($extractRegex, $asset->getContentByType(), $matches);

                if (isset($matches[1]) ) {
                    $fontString = urldecode($matches[1]);
                    $fontSets   = explode('|', $fontString);

                    foreach ($fontSets as $set) {
                        list($family, $weights) = explode(':', $set);
                        $weights = explode(',', $weights);

                        if ( ! isset($fonts[$family])) {
                            $fonts[$family] = [];
                        }

                        $fonts[$family] = array_merge($fonts[$family], $weights);
                    }
                }

                unset($assets[$i]);

                if(isset($matches[2]))
                {
                    $matchTermination = $matches[2];
                }
            }
        }

        // generate font query value
        if ( ! $sampleFont) {
            return $assets;
        }

        $f = [];
        foreach ($fonts as $family => $weight) {
            $weight = array_unique($weight);
            $f[] = $family.':'.implode(',', $weight);
        }
        $fontQueryValue = implode('|', $f);

        $replaceValue = $replaceRegex($fontQueryValue, $matchTermination);

        $sampleFont->setUrl(
            preg_replace($extractRegex, $replaceValue, $sampleFont->getUrl())
        );

        $assets[] = $sampleFont;

        return array_values($assets);
    }

    private function sortAssets($assets)
    {
        // sort asset list by score
        usort(
            $assets,
            function ($as1, $as2) {
                if ($as1->getScore() === $as2->getScore()) {
                    return 0;
                }

                return ($as1->getScore() < $as2->getScore()) ? -1 : 1;
            }
        );

        return $assets;
    }

}
