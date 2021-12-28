<?php


namespace BrizyMerge\Assets;


class AssetFont extends Asset
{
    /**
     * @var string
     */
    protected $fontType;

    /**
     * @param $data
     */
    static function instanceFromJsonData($data)
    {
        $assetKeys = array_keys($data);

        $allowedKeys = ['name', 'score', 'content', 'pro', 'type'];
        if (count($keyDiff = array_diff($assetKeys, $allowedKeys)) !== 0) {
            throw new \Exception('Invalid AssetFont fields provided: ' . json_encode($keyDiff));
        }

        if (count($keyDiff = array_diff($allowedKeys, $assetKeys)) !== 0) {
            throw new \Exception('Missing AssetFont field: ' . json_encode($keyDiff));
        }


        return new self($data['name'],
            $data['score'],
            isset($data['content']['content']) ? $data['content']['content'] : '',
            isset($data['content']['url']) ? $data['content']['url'] : '',
            isset($data['content']['type']) ? $data['content']['type'] : '',
            isset($data['content']['attr']) ? $data['content']['attr'] : [],
            $data['pro'],
            $data['type']);
    }

    /**
     * AssetLib constructor.
     *
     * @param string $name
     * @param int $score
     * @param string $content
     * @param false $pro
     * @param array $selectors
     */
    public function __construct($name = '', $score = 0, $content = '', $url = '', $assetType = '', $attrs = [], $pro = false, $fontType = [])
    {
        parent::__construct($name, $score, $content, $url, $assetType, $attrs, $pro);

        $this->fontType = $fontType;
    }

    /**
     * @return string
     */
    public function getFontType()
    {
        return $this->fontType;
    }

    /**
     * @param string $type
     *
     * @return AssetFont
     */
    public function setFontType($type)
    {
        $this->fontType = $type;

        return $this;
    }
    /**
     * @return string
     */
    public function getContentByType()
    {
        switch ($this->getType()) {
            case self::TYPE_INLINE:
            case self::TYPE_CODE:
                return $this->getContent();
            case self::TYPE_FILE:
                return $this->getUrl();
        }
    }
}
