<?php

namespace Brizy;

class ConditionsContext extends Context {
	/**
	 * @var array
	 */
	private $globalBlocks;

	/**
	 * @var array
	 */
	private $config;

	/**
	 * @return array
	 */
	public function getGlobalBlocks() {
		return $this->globalBlocks;
	}

	/**
	 * @param array $globalBlocks
	 *
	 * @return ConditionsContext
	 */
	public function setGlobalBlocks( $globalBlocks ) {
		$this->globalBlocks = $globalBlocks;

		return $this;
	}

	/**
	 * @return array
	 */
	public function getConfig() {
		return $this->config;
	}

	/**
	 * @param array $config
	 *
	 * @return ConditionsContext
	 */
	public function setConfig( $config ) {
		$this->config = $config;

		return $this;
	}

}
