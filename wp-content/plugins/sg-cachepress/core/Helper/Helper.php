<?php
namespace SiteGround_Optimizer\Helper;

/**
 * Helper functions and main initialization class.
 */
class Helper {

	/**
	 * Test if the current browser runs on a mobile device (smart phone, tablet, etc.)
	 *
	 * @since  5.9.0
	 *
	 * @return boolean
	 */
	public static function is_mobile() {
		if ( function_exists( 'wp_is_mobile' ) ) {
			return wp_is_mobile();
		}

		if ( empty( $_SERVER['HTTP_USER_AGENT'] ) ) {
			$is_mobile = false;
		} elseif ( @strpos( $_SERVER['HTTP_USER_AGENT'], 'Mobile' ) !== false // many mobile devices (all iPhone, iPad, etc.)
			|| @strpos( $_SERVER['HTTP_USER_AGENT'], 'Android' ) !== false
			|| @strpos( $_SERVER['HTTP_USER_AGENT'], 'Silk/' ) !== false
			|| @strpos( $_SERVER['HTTP_USER_AGENT'], 'Kindle' ) !== false
			|| @strpos( $_SERVER['HTTP_USER_AGENT'], 'BlackBerry' ) !== false
			|| @strpos( $_SERVER['HTTP_USER_AGENT'], 'Opera Mini' ) !== false
			|| @strpos( $_SERVER['HTTP_USER_AGENT'], 'Opera Mobi' ) !== false ) {
				$is_mobile = true;
		} else {
			$is_mobile = false;
		}

		return $is_mobile;
	}

	/**
	 * Checks if the page is being rendered via page builder.
	 *
	 * @since  5.9.0
	 *
	 * @return bool True/false.
	 */
	public static function check_for_builders() {

		$builder_paramas = apply_filters(
			'sgo_pb_params',
			array(
				'fl_builder',
				'vcv-action',
				'et_fb',
				'ct_builder',
				'tve',
				'preview',
				'elementor-preview',
				'uxb_iframe',
				'trp-edit-translation',
			)
		);

		foreach ( $builder_paramas as $param ) {
			if ( isset( $_GET[ $param ] ) ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Check if the plugin is installed.
	 *
	 * @since  5.0.0
	 */
	public function is_plugin_installed() {
		if (
			isset( $_GET['sgCacheCheck'] ) &&
			md5( 'wpCheck' ) === $_GET['sgCacheCheck']
		) {
			die( 'OK' );
		}
	}

	/**
	 * Load the global wp_filesystem.
	 *
	 * @since  5.0.0
	 *
	 * @return object The instance.
	 */
	public static function setup_wp_filesystem() {
		global $wp_filesystem;

		// Initialize the WP filesystem, no more using 'file-put-contents' function.
		if ( empty( $wp_filesystem ) ) {
			require_once( ABSPATH . '/wp-admin/includes/file.php' );
			WP_Filesystem();
		}

		return $wp_filesystem;
	}

	/**
	 * Check if wp cron is disabled and send error message.
	 *
	 * @since  5.0.0
	 */
	public static function is_cron_disabled() {
		if ( defined( 'DISABLE_WP_CRON' ) && true == DISABLE_WP_CRON ) {
			return 1;
		}

		return 0;
	}

	/**
	 * Hide warnings in rest api.
	 *
	 * @since  5.0.0
	 */
	public function hide_warnings_in_rest_api() {
		if ( self::is_rest() ) {
			error_reporting( E_ERROR | E_PARSE );
		}
	}

	/**
	 * Checks if the current request is a WP REST API request.
	 *
	 * Case #1: After WP_REST_Request initialisation
	 * Case #2: Support "plain" permalink settings
	 * Case #3: URL Path begins with wp-json/ (your REST prefix)
	 *          Also supports WP installations in subfolders
	 *
	 * @since 5.0.0
	 *
	 * @return bool True if it's rest request, false otherwise.
	 */
	public static function is_rest() {
		$prefix = rest_get_url_prefix();

		if (
			defined( 'REST_REQUEST' ) && REST_REQUEST ||
			(
				isset( $_GET['rest_route'] ) &&
				0 === @strpos( trim( $_GET['rest_route'], '\\/' ), $prefix, 0 )
			)
		) {
			return true;
		}

		$rest_url    = wp_parse_url( site_url( $prefix ) );
		$current_url = wp_parse_url( add_query_arg( array() ) );

		return 0 === @strpos( $current_url['path'], $rest_url['path'], 0 );
	}

	/**
	 * Some plugins like WPML for example are overwriting the home url.
	 *
	 * @since  5.0.10
	 *
	 * @return string The real home url.
	 */
	public static function get_home_url() {
		$url = get_option( 'home' );

		$scheme = is_ssl() ? 'https' : parse_url( $url, PHP_URL_SCHEME );

		$url = set_url_scheme( $url, $scheme );

		return trailingslashit( $url );
	}

	/**
	 * Some plugins like WPML for example are overwriting the site url.
	 *
	 * @since  5.0.10
	 *
	 * @return string The real site url.
	 */
	public static function get_site_url() {
		$url = get_option( 'siteurl' );

		$scheme = is_ssl() ? 'https' : parse_url( $url, PHP_URL_SCHEME );

		$url = set_url_scheme( $url, $scheme );

		return trailingslashit( $url );
	}

	/**
	 * Checks if the plugin run on the new SiteGround interface.
	 *
	 * @since  5.3.0
	 *
	 * @return boolean True/False.
	 */
	public static function is_siteground() {
		return (int) ( file_exists( '/etc/yum.repos.d/baseos.repo' ) && file_exists( '/Z' ) );
	}

	/**
	 * Checks what are the upload dir permissions.
	 *
	 * @since  5.7.11
	 *
	 * @return boolean True/false
	 */
	public static function check_upload_dir_permissions() {
		// If the function does not exist the file permissions are correct.
		if ( ! function_exists( 'fileperms' ) ) {
			return true;
		}

		// Check if directory permissions are set accordingly.
		if ( 700 <= intval( substr( sprintf( '%o', fileperms( self::get_uploads_dir() ) ), -3 ) ) ) {
			return true;
		}

		// Return false if permissions are below 700.
		return false;
	}

	/**
	 * Get WordPress uploads dir
	 *
	 * @since  5.7.11
	 *
	 * @return string Path to the uploads dir.
	 */
	public static function get_uploads_dir() {
		// Get the uploads dir.
		$upload_dir = wp_upload_dir();

		$base_dir = $upload_dir['basedir'];

		if ( defined( 'UPLOADS' ) ) {
			$base_dir = ABSPATH . UPLOADS;
		}

		return $base_dir;
	}

	/**
	 * Remove the https module from Site Heatlh, because our plugin provide the same functionality.
	 *
	 * @since  5.7.17
	 *
	 * @param  array $tests An associative array, where the $tests is either direct or async, to declare if the test should run via Ajax calls after page load.
	 *
	 * @return array        Tests with removed https_status module.
	 */
	public function sitehealth_remove_https_status( $tests ) {
		unset( $tests['async']['https_status'] );
		return $tests;
	}

	/**
	 * Check for any updates available.
	 *
	 * @since  6.0.0
	 *
	 * @return boolean True if we have, false otherwise.
	 */
	public static function has_updates() {
		// Get dependencies.
		require_once( ABSPATH . 'wp-admin/includes/update.php' );

		if ( ! function_exists( 'get_plugins' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		// Check for theme updates.
		if ( ! empty( get_theme_updates() ) ) {
			return true;
		}

		// Check for plugin updates.
		if ( ! empty( get_plugin_updates() ) ) {
			return true;
		}

		$core = get_core_updates();

		// Check for core.
		if ( ! empty( $core ) && 'latest' !== $core[0]->response ) {
			return true;
		}

		// Check for translation updates.
		if ( ! empty( wp_get_translation_updates() ) ) {
			return true;
		}

		// Bail if we do not have any updates available.
		return false;
	}

}
