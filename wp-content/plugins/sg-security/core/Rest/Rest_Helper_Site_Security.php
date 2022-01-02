<?php
namespace SG_Security\Rest;

use SG_Security\Rest\Rest_Helper_Options;
use SG_Security\Readme_Service\Readme_Service;
use SG_Security\Htaccess_Service\Directory_Service;
use SG_Security\Htaccess_Service\Headers_Service;
use SG_Security\Htaccess_Service\Xmlrpc_Service;
use SG_Security\Htaccess_Service\Hsts_Service;
use SG_Security\Message_Service\Message_Service;
/**
 * Rest Helper class that manages the site security.
 */
class Rest_Helper_Site_Security extends Rest_Helper {

	/**
	 * The constructor.
	 */
	public function __construct() {
		$this->readme_service      = new Readme_Service();
		$this->rest_helper_options = new Rest_Helper_Options();
		$this->directory_service   = new Directory_Service();
		$this->headers_service     = new Headers_Service();
		$this->hsts_service        = new Hsts_Service();
		$this->xmlrpc_service      = new Xmlrpc_Service();
	}

	/**
	 * Locks system folders.
	 *
	 * @since  1.0.0
	 *
	 * @param  object $request Request data.
	 */
	public function lock_system_folders( $request ) {
		$value = $this->validate_and_get_option_value( $request, 'lock_system_folders' );
		$this->directory_service->toggle_rules( $value );

		$this->rest_helper_options->change_option_from_rest( $request, 'lock_system_folders' );
	}

	/**
	 * Disable the theme/plugins editor.
	 *
	 * @since  1.0.0
	 *
	 * @param  object $request Request data.
	 */
	public function disable_editors( $request ) {
		$this->rest_helper_options->change_option_from_rest( $request, 'disable_file_edit' );
	}

	/**
	 * WP Version Removal
	 *
	 * @since  1.0.0
	 *
	 * @param  object $request Request data.
	 */
	public function hide_wp_version( $request ) {
		$this->rest_helper_options->change_option_from_rest( $request, 'wp_remove_version' );
	}

	/**
	 * Disable XML-RPC
	 *
	 * @since  1.0.0
	 *
	 * @param  object $request Request data.
	 */
	public function disable_xml_rpc( $request ) {
		$value = $this->validate_and_get_option_value( $request, 'disable_xml_rpc' );
		$result = $this->xmlrpc_service->toggle_rules( $value );

		if ( false === $result ) {
			self::send_json(
				Message_Service::get_response_message( $result, 'disable_xml_rpc', $value ),
				$result
			);
		}

		$this->rest_helper_options->change_option_from_rest( $request, 'disable_xml_rpc' );
	}

	/**
	 * Disable RSS and ATOM Feeds
	 *
	 * @since  1.0.0
	 *
	 * @param  object $request Request data.
	 */
	public function disable_feeds( $request ) {
		$this->rest_helper_options->change_option_from_rest( $request, 'disable_feed' );
	}

	/**
	 * Enable advanced XSS protection.
	 *
	 * @since  1.0.0
	 *
	 * @param  object $request Request data.
	 */
	public function xss_protection( $request ) {
		$value = $this->validate_and_get_option_value( $request, 'xss_protection' );

		$this->headers_service->toggle_rules( $value );

		$this->rest_helper_options->change_option_from_rest( $request, 'xss_protection' );
	}

	/**
	 * Enable HSTS protection.
	 *
	 * @since  1.1.0
	 *
	 * @param  object $request Request data.
	 */
	public function hsts_protection( $request ) {
		$value = $this->validate_and_get_option_value( $request, 'hsts_protection' );

		$this->hsts_service->toggle_rules( $value );

		$this->rest_helper_options->change_option_from_rest( $request, 'hsts_protection' );
	}

	/**
	 * Deletes the WP readme.
	 *
	 * @since  1.0.0
	 */
	public function delete_readme() {
		$result = (int) $this->readme_service->delete_readme();
		self::send_json(
			$this->get_response_message( $result, 'delete_readme' ),
			$result
		);
	}
}
