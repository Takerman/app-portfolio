<?php


namespace Brizy;


abstract class Context implements ContextInterface {

	/**
	 * @var mixed
	 */
	protected $data;

	/**
	 * Context constructor.
	 *
	 * @param mixed $data
	 */
	public function __construct( $data ) {
		$this->data = $data;
	}

	/**
	 * @return mixed
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * @param mixed $data
	 *
	 * @return Context
	 */
	public function setData( $data ) {
		$this->data = $data;

		return $this;
	}
}