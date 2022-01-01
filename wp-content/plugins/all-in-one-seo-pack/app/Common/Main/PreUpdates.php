<?php
namespace AIOSEO\Plugin\Common\Main;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * This class contains pre-updates necessary for the next updates class to run.
 *
 * @since 4.1.5
 */
class PreUpdates {
	/**
	 * Class constructor.
	 *
	 * @since 4.1.5
	 */
	public function __construct() {
		if ( wp_doing_ajax() || wp_doing_cron() ) {
			return;
		}

		$lastActiveVersion = $this->getInternalOptions( [ 'internal', 'lastActiveVersion' ] );

		if ( version_compare( $lastActiveVersion, '4.1.5', '<' ) ) {
			$this->createCacheTable();
		}
	}

	/**
	 * Manually get and parse internal options.
	 *
	 * @since 4.1.5
	 *
	 * @param  string|array $options         An array of option keys.
	 * @return mixed|null                    The option value or null.
	 */
	private function getInternalOptions( $options ) {
		$internalOptions = json_decode( get_option( 'aioseo_options_internal' ) );

		if ( empty( $internalOptions ) ) {
			return null;
		}

		if ( ! is_array( $options ) ) {
			$options = [ $options ];
		}

		foreach ( $options as $option ) {
			if ( ! isset( $internalOptions->{$option} ) ) {
				return null;
			}

			$internalOptions = $internalOptions->{$option};
		}

		return $internalOptions;
	}

	/**
	 * Creates a new aioseo_cache table.
	 *
	 * @since 4.1.5
	 *
	 * @return void
	 */
	public function createCacheTable() {
		$db             = aioseo()->db->db;
		$charsetCollate = '';

		if ( ! empty( $db->charset ) ) {
			$charsetCollate .= "DEFAULT CHARACTER SET {$db->charset}";
		}
		if ( ! empty( $db->collate ) ) {
			$charsetCollate .= " COLLATE {$db->collate}";
		}

		$tableName = aioseo()->cache->getTableName();
		if ( ! aioseo()->db->tableExists( $tableName ) ) {
			$tableName = $db->prefix . $tableName;

			aioseo()->db->execute(
				"CREATE TABLE {$tableName} (
					`id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
					`key` varchar(80) NOT NULL,
					`value` longtext NOT NULL,
					`expiration` datetime NULL,
					`created` datetime NOT NULL,
					`updated` datetime NOT NULL,
					PRIMARY KEY (`id`),
					UNIQUE KEY ndx_aioseo_cache_key (`key`),
					KEY ndx_aioseo_cache_expiration (`expiration`)
				) {$charsetCollate};"
			);
		}
	}
}