<?php


namespace BrizyMerge;


interface CompiledPageAssetsInterface
{
    public function getHeadAssetList();

    public function getBodyAssetList();

    public function getHeadAssetAsHtml();

    public function getBodyAssetAsHtml();

}
