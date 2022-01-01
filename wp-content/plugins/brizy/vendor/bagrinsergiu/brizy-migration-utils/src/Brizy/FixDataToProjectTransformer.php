<?php

namespace Brizy;


use Brizy\Utils\UUId;

/**
 * Class DataToProjectTransformer
 * @package Brizy
 */
class FixDataToProjectTransformer implements DataTransformerInterface
{
    /**
     * @param ContextInterface $context
     *
     * @return mixed
     * @throws \Exception
     */
    public function execute(ContextInterface $context)
    {
        $defaults = $this->getDefaults($context->getBuildPath());

        return $this->merge($context->getData(), $defaults);
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
     * @param $globals
     * @param $default
     *
     * @return mixed
     * @throws \Exception
     */
    private function merge($globals, $default)
    {
        // Check if globals is object
        if (!is_object($globals)) {
            throw new \Exception();
        }

        $project = clone $globals;

        if (isset($project->styles) && isset($project->selectedStyle)) {
            $styles = $project->styles;
            $selectedStyle = $project->selectedStyle;
            $existed = false;

            foreach ($styles as $style) {
                if ($style->id === $selectedStyle) {
                    $existed = true;
                }
            }

            if (!$existed) {
                $overpass = clone $styles[0];
                $defaultStyle = $this->getStyle($default->styles, $selectedStyle);

                if ($defaultStyle) {
                    // copy project colorPalette and fontStyles to defaultStyles
                    $defaultStyle->id = $selectedStyle;
                    $defaultStyle->colorPalette = $overpass->colorPalette;
                    $defaultStyle->fontStyles = $overpass->fontStyles;
                    $project->styles[0] = $defaultStyle;

                    $defaultOverpass = $this->getStyle($default->styles, $overpass->id);
                    array_splice($project->styles, 1, 0, array($defaultOverpass));
                }
            }
        }

        return $project;
    }

    private function getStyle($styles, $selectedStyle)
    {

        foreach ($styles as $style) {
            if ($style->id === $selectedStyle) {
                return $style;
            }
        }

        return null;
    }
}