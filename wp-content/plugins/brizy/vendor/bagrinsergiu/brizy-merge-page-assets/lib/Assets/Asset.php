<?php


namespace BrizyMerge\Assets;


class Asset
{
    const TYPE_INLINE = 'inline';
    const TYPE_CODE = 'code';
    const TYPE_FILE = 'file';

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $score;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string[]
     */
    protected $attrs;

    /**
     * @var bool
     */
    protected $pro;

    /**
     * @param $data
     */
    static function instanceFromJsonData($data)
    {
        $assetKeys = array_keys($data);

        $allowedKeys = ['name', 'score', 'content', 'pro'];
        if (count($keyDiff = array_diff($assetKeys, $allowedKeys)) !== 0) {
            throw new \Exception('Invalid Asset fields provided: ' . json_encode($keyDiff));
        }

        if (count($keyDiff = array_diff($allowedKeys, $assetKeys)) !== 0) {
            throw new \Exception('Missing Asset field: ' . json_encode($keyDiff));
        }

        return new self(
            $data['name'],
            $data['score'],
            isset($data['content']['content']) ? $data['content']['content'] : null,
            isset($data['content']['url']) ? $data['content']['url'] : null,
            isset($data['content']['type']) ? $data['content']['type'] : null,
            isset($data['content']['attr']) ? $data['content']['attr'] : [],
            $data['pro']
        );
    }

    /**
     * Asset constructor.
     *
     * @param string $name
     * @param int $score
     * @param string $content
     * @param false $pro
     */
    public function __construct($name = '', $score = 0, $content = null, $url = '', $type = '', $attrs = [], $pro = false)
    {
        $this->name = $name;
        $this->score = (int)$score;
        $this->type = $type;
        $this->content = $content;
        $this->url = $url;
        $this->attrs = $attrs;
        $this->pro = $pro;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Asset
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getScore()
    {
        return (int)$this->score;
    }

    /**
     * @param int $score
     *
     * @return Asset
     */
    public function setScore($score)
    {
        $this->score = (int)$score;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     *
     * @return Asset
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPro()
    {
        return $this->pro;
    }

    /**
     * @param bool $pro
     *
     * @return Asset
     */
    public function setPro($pro)
    {
        $this->pro = $pro;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Asset
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Asset
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getAttrs()
    {
        return $this->attrs;
    }

    /**
     * @param string[] $attrs
     * @return Asset
     */
    public function setAttrs($attrs)
    {
        $this->attrs = $attrs;
        return $this;
    }
}
