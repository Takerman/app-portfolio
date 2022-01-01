<?php


namespace Brizy;


interface ContextInterface {

	/**
	 * @return mixed
	 */
	public function getData();

	/**
	 * @param mixed $data
	 *
	 * @return Context
	 */
	public function setData( $data );
}