<?php

namespace BrizyPlaceholders;

/**
 * Class Replacer
 */
final class Replacer
{
    /**
     * @var ContextInterface
     */
    private $context;

    /**
     * @var RegistryInterface
     */
    private $registry;

    /**
     * Brizy_Content_PlaceholderReplacer constructor.
     *
     * @param $registry
     */
    public function __construct($registry)
    {
        $this->registry = $registry;
    }

    /**
     * @param $content
     * @param ContextInterface $context
     *
     *$subContext @return string|string[]
     */
    public function replacePlaceholders($content, ContextInterface $context)
    {
        $extractor = new Extractor($this->registry);
        list($contentPlaceholders, $instancePlaceholders, $contentAfterExtractor) = $extractor->extract($content);

        $context->afterExtract($contentPlaceholders, $instancePlaceholders, $contentAfterExtractor);

        if ($contentPlaceholders && $instancePlaceholders) {
            $content = $this->replaceWithExtractedData($contentPlaceholders, $instancePlaceholders, $contentAfterExtractor, $context);
        }
        return $content;
    }

    /**
     * @param ContentPlaceholder[] $contentPlaceholders
     * @param PlaceholderInterface[] $instancePlaceholders
     * @param string $contentAfterExtractor
     */
    public function replaceWithExtractedData(array $contentPlaceholders, array $instancePlaceholders, $contentAfterExtractor, ContextInterface $context)
    {
        $toReplace = array();
        $toReplaceWithValues = array();
        foreach ($contentPlaceholders as $index => $contentPlaceholder) {
            try {
                $toReplace[] = $contentPlaceholder->getUid();
                /**
                 * @var PlaceholderInterface $instancePlaceholder ;
                 */
                $instancePlaceholder = $instancePlaceholders[$index];
                if ($instancePlaceholder) {
                    $value = $instancePlaceholder->getValue($context, $contentPlaceholder);

                    if ($instancePlaceholder->shouldFallbackValue($value, $context, $contentPlaceholder)) {
                        $toReplaceWithValues[] = $instancePlaceholder->getFallbackValue($context, $contentPlaceholder);
                    } else {
                        $toReplaceWithValues[] = $value;
                    }
                } else {
                    $toReplaceWithValues[] = '';
                }

            } catch (\Exception $e) {
                array_pop($toReplace);
                continue;
            }
        }

        $content = str_replace($toReplace, $toReplaceWithValues, $contentAfterExtractor);

        return $content;
    }

}
