<?php


namespace BrizyMerge\Assets;


class AssetGroup
{
    /**
     * @var Asset
     */
    private $main;

    /**
     * @var Asset[]
     */
    private $generic;

    /**
     * @var AssetLib[]
     */
    private $libsMap;

    /**
     * @var string[]
     */
    private $libsSelectors;

    /**
     * @var AssetFont[]
     */
    private $pageFonts;

    /**
     * @var Asset
     */
    private $pageStyles;

    /**
     * @param $data
     */
    static function instanceFromJsonData($data)
    {
        $assetKeys = array_keys($data);

        $allowedKeys = ['main', 'generic', 'libsMap', 'libsSelectors'];
        if ($keyDiff = array_diff($assetKeys, $allowedKeys)) {
            if ($keyDiff2 = array_diff(['pageFonts', 'pageStyles'], $keyDiff)) {
                if (count($keyDiff2) != 0) {
                    throw new \Exception('Invalid AssetGroup fields provided: '.json_encode($keyDiff2));
                }
            }
        }

        // create main assets
        $main = Asset::instanceFromJsonData($data['main']);

        // create generic assets
        $generic = [];
        foreach ($data['generic'] as $entry) {
            $generic[] = Asset::instanceFromJsonData($entry);
        }

        // create libsMap assets
        $libsMap = [];
        foreach ($data['libsMap'] as $entry) {
            $libsMap[] = AssetLib::instanceFromJsonData($entry);
        }

        // create libsSelectors assets
        $libsSelectors = [];
        foreach ($data['libsSelectors'] as $entry) {
            $libsSelectors[] = (string)$entry;
        }

        // create pageFonts assets
        $pageFonts = [];
        if (isset($data['pageFonts'])) {
            foreach ($data['pageFonts'] as $entry) {
                $pageFonts[] = AssetFont::instanceFromJsonData($entry);
            }
        }

        // create pageStyles assets
        $pageStyles = [];
        if (isset($data['pageStyles'])) {
            foreach ($data['pageStyles'] as $entry) {
                $pageStyles[] = Asset::instanceFromJsonData($entry);
            }
        }

        return new self($main, $generic, $libsMap, $libsSelectors, $pageFonts, $pageStyles);
    }

    /**
     * AssetGroup constructor.
     *
     * @param array $main
     * @param array $generic
     * @param array $libsMap
     * @param array $libsSelectors
     * @param array $pageFonts
     * @param array $pageStyles
     */
    public function __construct(
        $main = null,
        $generic = [],
        $libsMap = [],
        $libsSelectors = [],
        $pageFonts = [],
        $pageStyles = []
    ) {
        $this->main          = $main;
        $this->generic       = $generic;
        $this->libsMap       = $libsMap;
        $this->libsSelectors = $libsSelectors;
        $this->pageFonts     = $pageFonts;
        $this->pageStyles    = $pageStyles;
    }

    /**
     * @return Asset[]
     */
    public function getMain()
    {
        return $this->main;
    }

    /**
     * @param Asset[] $main
     *
     * @return AssetGroup
     */
    public function setMain($main)
    {
        $this->main = $main;

        return $this;
    }

    /**
     * @return Asset[]
     */
    public function getGeneric()
    {
        return $this->generic;
    }

    /**
     * @param Asset[] $generic
     *
     * @return AssetGroup
     */
    public function setGeneric($generic)
    {
        $this->generic = $generic;

        return $this;
    }

    /**
     * @return AssetLib[]
     */
    public function getLibsMap()
    {
        return $this->libsMap;
    }

    /**
     * @param AssetLib[] $libsMap
     *
     * @return AssetGroup
     */
    public function setLibsMap($libsMap)
    {
        $this->libsMap = $libsMap;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getLibsSelectors()
    {
        return $this->libsSelectors;
    }

    /**
     * @param string[] $libsSelectors
     *
     * @return AssetGroup
     */
    public function setLibsSelectors($libsSelectors)
    {
        $this->libsSelectors = $libsSelectors;

        return $this;
    }

    /**
     * @return AssetFont[]
     */
    public function getPageFonts()
    {
        return $this->pageFonts;
    }

    /**
     * @param AssetFont[] $pageFonts
     *
     * @return AssetGroup
     */
    public function setPageFonts($pageFonts)
    {
        $this->pageFonts = $pageFonts;

        return $this;
    }

    /**
     * @return Asset
     */
    public function getPageStyles()
    {
        return $this->pageStyles;
    }

    /**
     * @param Asset $pageStyles
     *
     * @return AssetGroup
     */
    public function setPageStyles($pageStyles)
    {
        $this->pageStyles = $pageStyles;

        return $this;
    }


}
