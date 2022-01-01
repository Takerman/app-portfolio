<?php


namespace Brizy;


class DataToProjectContext extends Context {


	/**
	 * @var string
	 */
	private $buildPath;

	/**
	 * DataToProjectContext constructor.
	 *
	 * @param $globals
	 * @param $buildPath
	 */
	public function __construct( $globals, $buildPath ) {
		parent::__construct( $globals );
		$this->buildPath = $buildPath;
	}


	/**
	 * @return string
	 */
	public function getBuildPath() {
		return $this->buildPath;
	}

	/**
	 * @param string $buildPath
	 *
	 * @return DataToProjectContext
	 */
	public function setBuildPath( $buildPath ) {
		$this->buildPath = $buildPath;

		return $this;
	}

}