<?php
namespace SG_Security\Helper;

use SG_Security;
use SiteGround_Helper\Helper_Service;
use SG_Security\Salt_Shaker\Salt_Shaker;
use \WP_Session_Tokens;

/**
 * Helper functions and main initialization class.
 */
class Helper {

	/**
	 * Get the current user's ip address.
	 *
	 * @since  1.0.0
	 *
	 * @return string The users's ip.
	 */
	public static function get_current_user_ip() {

		$keys = array(
			'HTTP_CLIENT_IP',
			'HTTP_X_FORWARDED_FOR',
			'HTTP_X_FORWARDED',
			'HTTP_X_CLUSTER_CLIENT_IP',
			'HTTP_FORWARDED_FOR',
			'HTTP_FORWARDED',
			'REMOTE_ADDR',
		);

		foreach ( $keys as $key ) {
			// Bail if the key doesn't exists.
			if ( ! isset( $_SERVER[ $key ] ) ) {
				continue;
			}

			// Bail if the IP is not valid.
			if ( ! filter_var( $_SERVER[ $key ], FILTER_VALIDATE_IP ) ) { //phpcs:ignore
				continue;
			}

			return preg_replace( '/^::1$/', '127.0.0.1', $_SERVER[ $key ] ); //phpcs:ignore
		}

		// Return the local IP by default.
		return '127.0.0.1';
	}

	/**
	 * Sets the server IP address.
	 *
	 * @since 1.1.0
	 */
	public static function set_server_ip() {
		update_option( 'sg_security_server_address', \gethostbyname( \gethostname() ) );
	}

	/**
	 * Get the path without home url path.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $url The URL.
	 *
	 * @return string      The URL path.
	 */
	public static function get_url_path( $url ) {
		// Get the site url parts.
		$url_parts = parse_url( Helper_Service::get_site_url() );
		// Get the home path.
		$home_path = ! empty( $url_parts['path'] ) ? trailingslashit( $url_parts['path'] ) : '/';

		// Remove the query args from the url.
		$url = explode( '?', preg_replace( '|//+|', '/', $url ) );
		// Get the url path.
		$path = parse_url( $url[0], PHP_URL_PATH );
		// Return the path without home path.
		return str_replace( $home_path, '', $path );

	}

	/**
	 * Set custom wp_die callback.
	 *
	 * @since  1.1.0
	 *
	 * @return array Array with the callable function for our custom wp_die.
	 */
	public function custom_wp_die_handler() {
		return array( $this, 'custom_wp_die_callback' );
	}

	/**
	 * Custom wp_die callback.
	 *
	 * @since  1.1.0
	 *
	 * @param  string $message The error message.
	 * @param  string $title   The error title.
	 * @param  array  $args    Array with additional args.
	 */
	public function custom_wp_die_callback( $message, $title, $args ) {
		// Call the default wp_die_handler if the custom param is not set or a WP_Error object is present.
		if ( is_object( $message ) || empty( $args['sgs_error'] ) ) {
			_default_wp_die_handler( $message, $title, $args );
		}

		// Include the error template.
		include SG_Security\DIR . '/templates/error.php';
		exit;
	}

	/**
	 * Checks if the table exists in the database.
	 *
	 * @since  1.2.0
	 *
	 * @param  string $table_name The name of the table
	 *
	 * @return boolean            True/False.
	 */
	public static function table_exists( $table_name ) {
		global $wpdb;

		// Bail if table doesn't exist.
		if ( $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $table_name ) ) !== $table_name ) {
			return false;
		}

		return true;
	}

	/**
	 * Force user logout.
	 *
	 * @since  1.2.2
	 */
	public function logout_users() {
		// Init the salt shaker
		$this->salt_shaker = new Salt_Shaker();

		// Change salts
		$this->salt_shaker->change_salts();

		// Destroy all sessions.
		WP_Session_Tokens::destroy_all_for_all_users();
	}

	/**
	 * Encrypt data method.
	 *
	 * @since  1.2.4
	 *
	 * @param  string $data The string we will encrypt.
	 * @param  string $key  The string used for encryption key.
	 *
	 * @return string       The encrypted data.
	 */
	public static function sgs_encrypt( $data, $key ) {
		// Remove the base64 encoding from our key.
		$encryption_key = base64_decode( $key . AUTH_SALT );

		// Define cipher and generate an initialization vector.
		$cipher = 'AES-256-CBC';
		$ivlen  = openssl_cipher_iv_length( $cipher );
		$iv     = openssl_random_pseudo_bytes( $ivlen );

		$raw_value = openssl_encrypt( implode( '|', $data ), $cipher, $encryption_key, OPENSSL_RAW_DATA, $iv );

		// Return the encrypted data.
		return base64_encode( $iv . $raw_value );
	}

	/**
	 * Decrypt data method.
	 *
	 * @since  1.2.4
	 *
	 * @param  string $data The string we will decrypt.
	 * @param  string $key  The string used as an encryption key.
	 *
	 * @return string       The decrypted data.
	 */
	public static function sgs_decrypt( $data, $key ) {
		// Remove the base64 encoding from our data.
		$raw_value = base64_decode( $data, true );

		// Remove the base64 encoding from our key.
		$encryption_key = base64_decode( $key . AUTH_SALT );

		// Define cipher and get the initialization vector.
		$cipher = 'AES-256-CBC';
		$ivlen  = openssl_cipher_iv_length( $cipher );
		$iv     = substr( $raw_value, 0, $ivlen );

		$raw_value = substr( $raw_value, $ivlen );

		// Return the decrypted data.
		$decrypted = openssl_decrypt( $raw_value, 'AES-256-CBC', $encryption_key, OPENSSL_RAW_DATA, $iv );

		return explode( '|', $decrypted );
	}
}
