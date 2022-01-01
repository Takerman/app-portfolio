<?php

namespace Brizy\Utils;

/**
 * Trait UUIdAware
 * @package Brizy
 */
class UUId {

	/**
	 * @param int $n
	 *
	 * @return string
	 */
	static public function uuid( $n = 32 ) {
		$randomString = '';

		for ( $i = 0; $i < $n; $i ++ ) {
			$randomString .= chr( rand( 97, 122 ) );
		}

		return $randomString;
	}
}