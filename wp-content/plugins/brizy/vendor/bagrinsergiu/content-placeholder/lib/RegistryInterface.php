<?php
namespace BrizyPlaceholders;

interface RegistryInterface
{
    /**
     * Register a placeholder class
     *
     * @param PlaceholderInterface $instance
     * @param $label
     * @param $placeholderName
     * @param $groupName
     *
     * @return mixed
     */
    public function registerPlaceholder(PlaceholderInterface $instance);

    /**
     * Return all placeholders
     *
     * @return PlaceholderInterface[]
     */
    public function getPlaceholders();

    /**
     * It will return first placeholder that supports the $name;
     *
     * @param $name
     *
     * @return mixed
     */
    public function getPlaceholderSupportingName($name);
}
