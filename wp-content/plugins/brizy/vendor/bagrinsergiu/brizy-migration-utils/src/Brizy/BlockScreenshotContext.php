<?php


namespace Brizy;

class BlockScreenshotContext extends Context {

	/**
	 * @var object
	 */
	private $meta;

	/**
	 * BlockScreenshotContext constructor.
	 *
	 * @param $data
	 */
	public function __construct( $data ) {

		if(!is_object($data))
			throw new \Exception('Invalid argument type. Object expected.');

		parent::__construct( $data );
	}

	/**
	 * @return object
	 */
	public function getMeta() {
		return $this->meta;
	}

	/**
	 * @param object $meta
	 *
	 * @return BlockScreenshotContext
	 */
	public function setMeta( $meta ) {

		if(!is_object($meta))
			throw new \Exception('Invalid argument type. Object expected.');

		$this->meta = $meta;

		return $this;
	}
}
