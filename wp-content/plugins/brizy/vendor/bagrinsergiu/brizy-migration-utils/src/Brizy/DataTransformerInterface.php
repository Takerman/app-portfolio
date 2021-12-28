<?php

namespace Brizy;

/**
 * Interface DataTransformerInterface
 * @package Brizy
 */
interface DataTransformerInterface {

	/**
	 * @param ContextInterface $context
	 *
	 * @return mixed
	 */
	public function execute( ContextInterface $context );
}