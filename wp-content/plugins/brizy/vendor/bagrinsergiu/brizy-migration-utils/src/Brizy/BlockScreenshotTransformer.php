<?php

namespace Brizy;

/**
 * Class DataToProjectTransformer
 * @package Brizy
 */
class BlockScreenshotTransformer implements DataTransformerInterface {
	/**
	 * @param ContextInterface $context
	 *
	 * @return mixed
	 * @throws \Exception
	 */
	public function execute( ContextInterface $context ) {
		/**
		 * @var BlockScreenshotContext $context ;
		 */

		$data = $context->getData();

		$context->setMeta( $this->generateMeta( $data ) );
	}

	/**
	 * @param $block
	 *
	 * @return object
	 * @throws \Exception
	 */
	private function makeScreenshotAndType( $block ) {
		return (object) [
			"type"             => $this->makeBlockType( $block ),
			"_thumbnailSrc"    => isset( $block->value->_thumbnailSrc ) ? $block->value->_thumbnailSrc : null,
			"_thumbnailWidth"  => isset( $block->value->_thumbnailWidth ) ? $block->value->_thumbnailWidth : null,
			"_thumbnailHeight" => isset( $block->value->_thumbnailHeight ) ? $block->value->_thumbnailHeight : null,
			"_thumbnailTime"   => isset( $block->value->_thumbnailTime ) ? $block->value->_thumbnailTime : null
		];
	}

	/**
	 * @param $blockData
	 *
	 * @return string
	 * @throws \Exception
	 */
	private function makeBlockType( $blockData ) {
		if ( ! isset( $blockData->type ) ) {
			throw new \Exception();
		}

		$type = $blockData->type;

		if ( $type === "SectionPopup" || $type === "SectionPopup2" ) {
			return "popup";
		}

		return "normal";
	}

	private function generateMeta( $data ) {
		if ( ! is_object( $data ) || ! isset( $data->value ) ) {
			throw new \Exception();
		}

		try {
			return $this->makeScreenshotAndType( $data );
		} catch ( \Exception $e ) {
			throw new \Exception( $e );
		}
	}
}


