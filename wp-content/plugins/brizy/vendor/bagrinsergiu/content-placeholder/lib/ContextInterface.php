<?php
namespace BrizyPlaceholders;


interface ContextInterface
{
    /**
     * This will be called right after all placeholder are extracted from content
     * @param $contentPlaceholders
     * @param $instancePlaceholders
     * @param $contentAfterExtractor
     * @return mixed
     */
    public function afterExtract($contentPlaceholders, $instancePlaceholders, $contentAfterExtractor);
}
