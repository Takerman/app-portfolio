<?php

namespace Brizy;


use Brizy\Utils\UUId;

/**
 * Class DataToProjectTransformer
 * @package Brizy
 */
class DataToProjectTransformer implements DataTransformerInterface
{


    /**
     * @param DataToProjectContext $context
     *
     * @return mixed
     */
    public function execute(ContextInterface $context)
    {
        $defaults = $this->getDefaults($context->getBuildPath());
        $styles = $this->getStyles($context->getBuildPath());
        $fonts = $this->getFonts($context->getBuildPath());

        return $this->merge($context->getData(), $defaults, $styles, $fonts);
    }

    /**
     * @param $buildPath
     *
     * @return array
     */
    private function getStyles($buildPath)
    {
        $templates = json_decode(
            file_get_contents(
                $buildPath .
                DIRECTORY_SEPARATOR . "templates" .
                DIRECTORY_SEPARATOR . "meta.json"
            )
        );
        $result = array();

        foreach ($templates->templates as $template) {
            foreach ($template->styles as $style) {
                $result[] = $style;
            }
        }

        return $result;
    }

    /**
     * @param $buildPath
     *
     * @return array
     */
    private function getFonts($buildPath)
    {
        $fonts = json_decode(
            file_get_contents(
                $buildPath .
                DIRECTORY_SEPARATOR . "googleFonts.json"
            )
        );
        $result = array();

        foreach ($fonts->items as $font) {
            $result[] = $font;
        }

        return $result;
    }

    private function getStyleId($id)
    {
        $keyValue = array(
            "default" => "kldugntsakdckzxhreidncqvgunudghrcuzv",
            "Advisors" => "hhvfadskiuddpumderkrpfierxemmnfkkbdb",
            "AlpineLodge" => "gkvpzagrxxxncblrivcrklhuxqlxuocpvxoi",
            "Architekt" => "rtaizkhcpyvnsklrpneezuxfjbhxcgapvwzq",
            "BaseGround" => "cwqlmorbdzpfjgeijdsucmmynmnvjjnhizgf",
            "BeachResort" => "ogxvoqhdgowojrgovjtvfmgbdmtkrvfhzvut",
            "CarClinic" => "sfacrfbudlqbjsohlttpgfdlcmpupwatrsqj",
            "College" => "rrjgcxrizanoftyyjtlkpvxgboxzarhkjfpb",
            "Creed" => "icwfpvkhphypjweexsymjpmobcndrdzvhypd",
            "Flavour" => "wsndowxcdsndojazydvziriiurijzxxupmud",
            "Gourmet" => "djgycpkivxkotophosklpovakaeglaphgeso",
            "Hitched" => "ijwyqvltsbwnwwdgvsqbgazaafovftffjkeb",
            "Hope" => "stclcsngwfgigirslshihqvfoffcvnuwutdo",
            "InShape" => "yvabgehbjleqzdcbssoauoyeipqnrcctgsgf",
            "Keynote" => "lywkwvivqbnmvopnhknegxidxkdhuglechhj",
            "KidQuest" => "chnsxxxqibdfampcesxktddfoaftzkllzrem",
            "Lavish" => "ldvzefmtepfgwsfrturzebeffqgrjygmvbpa",
            "Molino" => "gznajvmfejckfmmzuabtsggydvuwqzzabzig",
            "Moves" => "kqvgvsnfwhkwjwguzvsizkzdnpstlketofio",
            "Parlor" => "eciislkkeivlbyblfujrudusvhkihlqtdura",
            "Philanthropy" => "lnvuquwgkncpurwstjtvnamvymqgncggdgxm",
            "Quantum" => "hkauzpefyxheerdsojcrzoznghmxyqxnpcos",
            "ReelStory" => "zbncnqgfqctenhdippnnagyiwqrkblqykqfw",
            "Skypoint" => "yvkltrdrjkjbolyedrpsprhaffytnuntjboy",
            "Startapp" => "gwjxyiigrnkerwoorkywtgsfnfetztugngxc",
            "Swipe" => "adodkqfglmmsgiwlrikyelxfaprxuwoeoemg",
            "Wellness" => "pbbrkumtobavljgjvoqybsljdwhturhulobp",
            "Yoga" => "pkfsnabwzdaviiiitkjgxdfxlslqbcapagwd"
        );

        return $keyValue[$id];
    }

    /**
     * @param $styles
     * @param $id
     *
     * @return | null
     */
    private function getStyle($styles, $id)
    {
        foreach ($styles as $style) {
            if ($style && $style->id === $id) {
                return $style;
            }
        }

        return null;
    }

    /**
     * @param $buildPath
     *
     * @return mixed
     */
    private function getDefaults($buildPath)
    {
        return json_decode(
            file_get_contents(
                $buildPath .
                DIRECTORY_SEPARATOR . "defaults.json"
            )
        );
    }

    /**
     * @param $styles
     * @return array
     */
    private function addStyleFontType($styles)
    {
        $finalStyles = array();

        foreach ($styles as $style) {
            $style->fontFamilyType = "google";
            $finalStyles[] = $style;
        }

        return $finalStyles;
    }

    /**
     * @param $globals
     * @param $default
     * @param $styles
     * @param $fonts
     *
     * @return mixed
     */
    private function merge($globals, $default, $styles, $fonts)
    {
        $result = $default;

        // Check if globals is object
        if (!is_object($globals)) {
            throw new \Exception();
        }

        // extraFont
        if (isset($globals->extraFonts)) {
            $extraFonts = $globals->extraFonts;
            $finalFonts = array();

            foreach ($extraFonts as $fontKey) {
                foreach ($fonts as $font) {
                    $fontFamilyToKey = preg_replace('/\s+/', '_', strtolower($font->family));

                    if ($fontKey === $fontFamilyToKey) {
                        $font->brizyId = UUId::uuid();
                        $finalFonts[] = $font;
                    }
                }
            }

            $result->fonts->google = (object)array('data' => $finalFonts);

            unset($globals->extraFonts);
        }

        // selectedStyle
        if (isset($globals->styles) && isset($globals->styles->_selected)) {
            $result->selectedStyle = $this->getStyleId($globals->styles->_selected);

            unset($globals->styles->_selected);
        }

        // copy defaultStyle
        if (!isset($globals->styles)) {
            $result->selectedStyle = $this->getStyleId("default");
        }

        // extraFontStyles
        if (isset($globals->styles) && isset($globals->styles->_extraFontStyles)) {
            $result->extraFontStyles = $this->addStyleFontType($globals->styles->_extraFontStyles);
            unset($globals->styles->_extraFontStyles);
        }

        // styles
        // styles -> copy default
        if (isset($globals->styles) && isset($globals->styles->default)) {
            foreach ($result->styles as $i => $style) {
                // Copy in defaultStyle current styles
                if ($style->id === $result->selectedStyle) {
                    $result->styles[$i]->colorPalette = $globals->styles->default->colorPalette;
                    $result->styles[$i]->fontStyles = $this->addStyleFontType($globals->styles->default->fontStyles);
                }
            }

            unset($globals->styles->default);
        }

        // styles -> copy others
        if (isset ($globals->styles)) {
            foreach ($globals->styles as $id => $data) {
                $styleId = $this->getStyleId($id);
                $style = $this->getStyle($styles, $styleId);
                if (!is_object($style)) {
                    continue;
                }
                $result->styles[] = (object)array(
                    "id" => $styleId,
                    "title" => $style->title,
                    "colorPalette" => $data->colorPalette,
                    "fontStyles" => $this->addStyleFontType($data->fontStyles),
                );
            }
        }

        // styles -> missing selected style data
        $selected_style_data_present = false;
        foreach ($result->styles as $style) {
            if ($style->id === $result->selectedStyle) {
                $selected_style_data_present = true;
            }
        }
        if (!$selected_style_data_present) {
            $selected_style = $this->getStyle($styles, $result->selectedStyle);
            if (is_object($selected_style)) {
                $result->styles[] = (object)array(
                    "id" => $selected_style->id,
                    "title" => $selected_style->title,
                    "colorPalette" => $selected_style->colorPalette,
                    "fontStyles" => $this->addStyleFontType($selected_style->fontStyles),
                );
            }
        }

        return $result;
    }
}
