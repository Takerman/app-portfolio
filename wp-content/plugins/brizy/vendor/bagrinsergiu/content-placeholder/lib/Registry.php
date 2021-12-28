<?php

namespace BrizyPlaceholders;

/**
 * Class Registry
 * @package BrizyPlaceholders
 */
class Registry implements RegistryInterface
{

    /**
     * @var PlaceholderInterface[]
     */
    public $placeholders = [];

    /**
     * @param PlaceholderInterface $instance
     * @param string $label
     * @param string $placeholderName
     * @param string $groupName
     *
     * @return mixed|void
     */
    public function registerPlaceholder(PlaceholderInterface $instance)
    {
        $this->placeholders[] = $instance;
    }

    /**
     * @inheritDoc
     */
    public function getPlaceholders()
    {
        return $this->placeholders;
    }

    /**
     * @inheritDoc
     */
    public function getPlaceholderSupportingName($name)
    {
        foreach ($this->placeholders as $aplaceholder) {
            if ($aplaceholder->support($name)) {
                return $aplaceholder;
            }
        }
    }
}
