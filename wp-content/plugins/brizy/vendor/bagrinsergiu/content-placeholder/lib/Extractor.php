<?php

namespace BrizyPlaceholders;

/**
 * Class Extractor
 */
final class Extractor
{

    //const PLACEHOLDER_REQEX = "/(?<placeholder>{{\s*(?<placeholderName>.+?)(?<attributes>(?:\s+)((?:\w+\s*=\s*(?:'|\"|\&quot;|\&apos;)(?:.[^\"']*|)(?:'|\"|\&quot;|\&apos;)\s*)*))?}}(?:(?<content>.*?){{\s*end_(\g{placeholderName})\s*}})?)/ims";
    const PLACEHOLDER_REQEX = "/(?<placeholder>{{\s*(?<placeholderName>.+?)\s*(?<attributes>\s+((?:\w+(?:\[(?:\w+)?\])?\s*=\s*(?:'|\"|\&quot;|\&apos;|\&#x27;)(?:.[^\"']*?|)(?:'|\"|\&quot;|\&apos;|\&#x27;)\s*)*))?}}(?:(?<content>.*?){{\s*end_(\g{placeholderName})\s*}})?)/ims";

    const ATTRIBUTE_REGEX = "/((?<attr_name>\w+)(?<array>\[(?<array_key>\w+)?\])?)\s*=\s*(?<quote>'|\"|\&quot;|\&apos;|\&#x27;)(?<attr_value>.*?)(\g{quote})/mi";
    //const ATTRIBUTE_REGEX = "/(\w+)\s*=\s*(?<quote>'|\"|\&quot;|\&apos;)(.*?)(\g{quote})/mi";

    /**
     * @var RegistryInterface
     */
    private $registry;


    /**
     * Extractor constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct($registry)
    {
        @ini_set('pcre.backtrack_limit', "2000000");
        $this->registry = $registry;
    }

    public function stripPlaceholders($content)
    {
        $expression = self::PLACEHOLDER_REQEX;

        return preg_replace($expression, '', $content);
    }

    /**
     * @param $content
     *
     * @return array
     */
    public function extract($content)
    {
        $placeholderInstances = array();
        $contentPlaceholders  = array();
        $matches              = array();
        $expression           = self::PLACEHOLDER_REQEX;

        preg_match_all($expression, $content, $matches);

        if (count($matches['placeholder']) == 0) {
            return array($contentPlaceholders, [], $content);
        }

        foreach ($matches['placeholder'] as $i => $name) {

            $instance = $this->registry->getPlaceholderSupportingName($matches['placeholderName'][$i]);

            // ignore unknown placeholders
            if ( ! $instance) {
                continue;
            }
            $placeholderInstances[$i] = $instance;
            $contentPlaceholders[$i] = $placeholder = new ContentPlaceholder(
                $matches['placeholderName'][$i],
                $matches['placeholder'][$i],
                $this->getPlaceholderAttributes($matches['attributes'][$i]),
                $matches['content'][$i]
            );

            $pos = strpos($content, $placeholder->getPlaceholder());

            $length = strlen($placeholder->getPlaceholder());

            if ($pos !== false) {
                $content = substr_replace($content, $placeholder->getUid(), $pos, $length);
            }
        }

        return array($contentPlaceholders, $placeholderInstances, $content);
    }

    /**
     * Split the attributs from attribute string
     *
     * @param $attributeString
     *
     * @return array
     */
    private function getPlaceholderAttributes($attributeString)
    {
        $attrString = trim($attributeString);
        $attrMatches = array();
        $attributes = array();
        preg_match_all(self::ATTRIBUTE_REGEX, $attrString, $attrMatches);

        if (isset($attrMatches[0]) && is_array($attrMatches[0])) {
            foreach ($attrMatches[0] as $i => $attStr) {
                $attrName = $attrMatches['attr_name'][$i];
                $attrValue = urldecode($attrMatches['attr_value'][$i]);
                $isArray = $attrMatches['array'][$i]!='';
                $arrayKey = $attrMatches['array_key'][$i];
                // check if the attribute is an array
                if($isArray)
                {
                    if($arrayKey)
                        $attributes[$attrName][$arrayKey] = $attrValue;
                    else
                        $attributes[$attrName][] = $attrValue;
                } else {
                    $attributes[$attrName] = $attrValue;
                }
            }
        }

        return $attributes;
    }
}
