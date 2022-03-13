<?php

namespace BrizyPlaceholders;

abstract class AbstractPlaceholder implements PlaceholderInterface
{
    /**
     * It should return an unique identifier of the placeholder
     *
     * @return mixed
     */
    public function getUid()
    {
        return md5(microtime() . mt_rand(0, 10000));
    }

    public function shouldFallbackValue($value, ContextInterface $context, ContentPlaceholder $placeholder)
    {
        return empty($value);
    }

    public function getFallbackValue(ContextInterface $context, ContentPlaceholder $placeholder)
    {
        $attributes = $placeholder->getAttributes();
        return isset($attributes[PlaceholderInterface::FALLBACK_KEY]) ? $attributes[PlaceholderInterface::FALLBACK_KEY] : '';
    }

}
