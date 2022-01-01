<?php

namespace Brizy;

use stdClass;

/**
 * Class ConditionsTransformer
 * @package Brizy
 */
class ConditionsTransformer implements DataTransformerInterface {
	/**
	 * @param ConditionsContext $context
	 *
	 * @return TransformerContext|mixed
	 */
	public function execute( ContextInterface $context ) {
		//$this->page = json_decode($context->getData());
		//$this->globalBlocks = json_decode($context->getGlobalBlocks());
		//$this->options = json_decode($context->getConfig());
		$this->transformPageData( $context );
		$this->getGlobalBlocks( $context );

		return $context;
	}

//  public function getMigratedData()
//  {
//    $newPage = $this->getPage();
//    $newGlobalBlocks = $this->getGlobalBlocks();
//  }


	/**
	 * @param ConditionsContext $context
	 *
	 * @return mixed
	 */
	private function transformPageData( ConditionsContext $context ) {
		$blocks           = $context->getData()->items;
		$surroundedBlocks = $this->getSurroundedIds( $blocks );

		$newBlocks = array_reduce(
			$blocks,
			function ( $acc, $block ) use ( $surroundedBlocks ) {
				$isTopCondition    =
					$this->isConditionBlock( $block ) &&
					isset( $surroundedBlocks['top'] ) && in_array( $block->value->globalBlockId, $surroundedBlocks['top'] );
				$isBottomCondition =
					$this->isConditionBlock( $block ) &&
					isset( $surroundedBlocks['bottom'] ) && in_array( $block->value->globalBlockId, $surroundedBlocks['bottom'] );

				if ( ! $isTopCondition && ! $isBottomCondition ) {
					array_push( $acc, $block );
				}

				return $acc;
			},
			[]
		);

		$context->getData()->items = $newBlocks;

		return $context;
	}

	/**
	 * @param ConditionsContext $context
	 *
	 * @return ConditionsContext
	 */
	private function getGlobalBlocks( ConditionsContext $context ) {
		$sortedGlobalBlocks = $context->getGlobalBlocks();

		uasort( $sortedGlobalBlocks, function ( $a, $b ) {
			if ( ! isset( $a->position ) && ! isset( $b->position ) ) {
				return 0;
			} elseif (
				isset( $b->position ) &&
				( ! isset( $a->position ) || $b->position->index < $a->position->index )
			) {
				return 1;
			} else {
				return - 1;
			}
		} );

		$context->setGlobalBlocks( $sortedGlobalBlocks );

		$this->insertSurroundedGlobalBlocks( $context, "bottom" );
		$this->insertSurroundedGlobalBlocks( $context, "top" );

		return $context;
	}

	/**
	 * @param ConditionsContext $context
	 * @param $type
	 *
	 * @return ConditionsContext
	 */
	private function insertSurroundedGlobalBlocks( ConditionsContext $context, $type ) {
		$globalBlocks = $context->getGlobalBlocks();
		//$globalBlocksAsObject = Conditions::turnIntoObject( $this->globalBlocks );
		$blocks           = $context->getData()->items;
		$surroundedBlocks = $this->getSurroundedIds( $blocks );

		$prevGlobalBlock  = null;
		$surroundedBlocks = $surroundedBlocks[ $type ];

		if ( $surroundedBlocks[0] ) {
			$globalBlock = $globalBlocks[ $surroundedBlocks[0] ];

			if ( isset( $globalBlock->position ) && $globalBlock->position->index > 0 ) {
				$prevGlobalBlock = $globalBlocks[ $globalBlock->position->index ];
			}
		}

		$newSortedBlocks = array_values(
			array_filter( $globalBlocks, function ( $item ) use (
				$surroundedBlocks
			) {
				return ! in_array( $item->uid, $surroundedBlocks );
			} )
		);

		$topLength = $this->array_count( $globalBlocks, function ( $value ) {
			return isset( $value->position ) && $value->position->align === "top";
		} );

		$insertIndex = $prevGlobalBlock
			? array_search( $prevGlobalBlock, $newSortedBlocks )
			: $topLength;

		$surroundedGlobalBlocks = array();
		$currentRule            = $this->getCurrentRule( $context->getConfig() );
		foreach ( $surroundedBlocks as $uid ) {
			$newGlobalBlock                  = json_decode( json_encode( $globalBlocks[ $uid ] ) );
			$newGlobalBlock->position        = new stdClass();
			$newGlobalBlock->position->align = $type;
			if ( ! isset( $newGlobalBlock->rules ) ) {
				$newGlobalBlock->rules = new stdClass();
				$newGlobalBlock->rules = $currentRule;
			}

			$surroundedGlobalBlocks[ $uid ] = $newGlobalBlock;
			//array_push( $surroundedGlobalBlocks, $newGlobalBlock );
		}

		array_splice( $newSortedBlocks, $insertIndex, 0, $surroundedGlobalBlocks );

		$newGlobalBlocks = array();
		$i               = 0;
		foreach ( $newSortedBlocks as $value ) {
			if ( isset( $value->position ) ) {
				$value->position->index = $i;
				$i ++;
			}

			array_push( $newGlobalBlocks, $value );
		}

		$context->setGlobalBlocks( $newGlobalBlocks );

		return $context;
	}

	/**
	 * @param $config
	 *
	 * @return stdClass
	 */
	private function getCurrentRule( $config ) {
		$PAGES_GROUP_ID = 1;
		$POST_GROUP_ID  = 1;
//		$CATEGORIES_GROUP_ID = 2;
		$TEMPLATES_GROUP_ID = 16;

		$PAGE_TYPE     = "page";
		$POST_TYPE     = "post";
		$TEMPLATE_TYPE = "brizy_template";
		$page          = $config->page;
		$isTemplate    = $config->isTemplate;
		$ruleMatches   = $config->ruleMatches;

		$result     = new stdClass();
		$result->id = $page;

		if ( $isTemplate ) {
			$result->group = $TEMPLATES_GROUP_ID;
			$result->type  = $TEMPLATE_TYPE;
		} elseif ( $ruleMatches[0]->entityType === $POST_TYPE ) {
			$result->group = $POST_GROUP_ID;
			$result->type  = $POST_TYPE;
		} else {
			$result->group = $PAGES_GROUP_ID;
			$result->type  = $PAGE_TYPE;
		}

		return $result;
	}

	private function getSurroundedIds( $blocks ) {
		$top    = array();
		$bottom = array();

		if ( count( $blocks ) > 0 ) {
			$i = 0;
			while ( $i <= count( $blocks ) - 1 ) {
				$currentBlock = $blocks[ $i ];
				if ( $currentBlock->type === "GlobalBlock" ) {
					array_push( $top, $currentBlock->value->globalBlockId );
				} else {
					break;
				}
				$i ++;
			}

			$i = 0;
			while ( $i <= count( $blocks ) - 1 ) {
				$currentBlock = $blocks[ count( $blocks ) - 1 - $i ];
				if ( $currentBlock->type === "GlobalBlock" ) {
					array_push( $bottom, $currentBlock->value->globalBlockId );
				} else {
					break;
				}
				$i ++;
			}
		}

		return array( $top, $bottom );
	}

	private function isConditionBlock( $block ) {
		return $block->type === "GlobalBlock";
	}

	private function array_count( $arr, $callback ) {
		$i = 0;
		foreach ( $arr as $value ) {
			if ( $callback( $value ) ) {
				$i ++;
			}
		}

		return $i;
	}
}
