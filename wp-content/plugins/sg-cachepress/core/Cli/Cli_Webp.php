<?php
namespace SiteGround_Optimizer\Cli;
/**
 * WP-CLI: wp sg webp {setting} value.
 *
 * Run the `wp sg webp {setting} value` command to change the settgins of specific plugin functionality.
 *
 * @since 5.0.0
 * @package Cli
 * @subpackage Cli/Cli_Optimizer
 */

/**
 * Define the {@link Cli_Optimizer} class.
 *
 * @since 5.0.0
 */
class Cli_Webp {
	/**
	 * Enable specific setting for SiteGround Optimizer plugin.
	 *
	 * ## OPTIONS
	 *
	 * <setting>
	 * : setting name.
	 * ---
	 * options:
	 *  - type
	 *  - quality
	 * ---
	 * <value>
	 * : The new value of the setting.
	 */
	public function __invoke( $args ) {
		switch ( $args[0] ) {
			case 'type':
				return $this->change_type( $args[1] );
			case 'quality':
				return $this->change_quality( $args[1] );
		}
	}

	public function change_type( $type ) {
		$types = array(
			'lossy',
			'lossless',
		);

		if ( ! in_array( $type, $types ) ) {
			\WP_CLI::error( 'The ' . $type . 'is not supported. Please choose between lossy and lossless' );
		}

		$status = update_option( 'siteground_optimizer_quality_type', $type );

		if ( false === $status ) {
			\WP_CLI::error( 'Error updating WebP optimization type' );
		}

		\WP_CLI::success( 'WebP Optimization Type Updated!' );
	}

	public function change_quality( $quality ) {

		$quality = intval( $quality );

		if ( ! is_int( $quality ) ) {
			\WP_CLI::error( 'The ' . $quality . 'is not supported. Please choose between a number between 1 and 100' );
		}

		if (
			$quality < 1 ||
			$quality > 101
		) {
			\WP_CLI::error( 'The ' . $quality . 'is not supported. Please choose between a number between 1 and 100' );
		}

		$status = update_option( 'siteground_optimizer_quality_webp', $quality );

		if ( false === $status ) {
			\WP_CLI::error( 'Error Updating WebP Optimization Quality' );
		}

		\WP_CLI::success( 'WebP Optimization Quality Changed!' );
	}
}
