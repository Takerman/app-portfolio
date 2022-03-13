<?php
namespace SiteGround_Optimizer\Rest;

use SiteGround_Optimizer\DNS\Cloudflare;
use SiteGround_Optimizer\Supercacher\Supercacher;
/**
 * Rest Helper class that manages cloudflare options.
 */
class Rest_Helper_Cloudflare extends Rest_Helper {
	/**
	 * The constructor.
	 */
	public function __construct() {
		$this->cloudflare = new Cloudflare();
	}

	/**
	 * Manage the CF Optimization
	 *
	 * @since  6.0.0
	 *
	 * @param  object $request The request data.
	 */
	public function manage_cloudflare( $request ) {
		$email      = $this->validate_and_get_option_value( $request, 'email' );
		$key        = $this->validate_and_get_option_value( $request, 'key' );
		$toggle     = intval( $this->validate_and_get_option_value( $request, 'toggle' ) );
		$erase_data = intval( $this->validate_and_get_option_value( $request, 'erase_data' ) );

		// Enable the optimization.
		if ( 1 === $toggle ) {
			$this->authenticate( $email, $key );
		}

		// Disable the optimization.
		$this->deauthenticate( $email, $key, $erase_data );
	}

	/**
	 * Authenticate Cloudflare
	 *
	 * @since  5.7.0
	 *
	 * @param  string $email The email used in cloudflare
	 * @param  string $key   The Cloudflare API Key.
	 */
	public function authenticate( $email, $key ) {
		// Update the options.
		update_option( 'siteground_optimizer_cloudflare_email', $email );
		update_option( 'siteground_optimizer_cloudflare_auth_key', $key );

		$result = $this->cloudflare->add_worker();

		// Delete the options if we fail to add the worker for some reason.
		if ( false === $result ) {
			delete_option( 'siteground_optimizer_cloudflare_email' );
			delete_option( 'siteground_optimizer_cloudflare_auth_key' );
		}
		// Purge the cache.
		Supercacher::purge_cache();

		self::send_json_response(
			$result,
			false === $result ? 'Please provide valid API key & email address' : 'Cloudflare successfully authenticated.',
			array(
				'cloudflare_email'               => $email,
				'cloudflare_auth_key'            => $key,
				'cloudflare_optimization_status' => intval( $result ),
			)
		);
	}

	/**
	 * Purge the cloudflare cache and send json response
	 *
	 * @since  5.7.0
	 */
	public function purge_cloudflare_cache_from_rest() {
		// Purge the cache.
		Supercacher::purge_cache();
		// Purge the CF Cache.
		$this->cloudflare->purge_cache();
		// Disable the option.
		self::send_json_success();
	}

	/**
	 * Deauthenticate Cloudflare.
	 *
	 * @since  5.7.0
	 *
	 * @param  string $email      The CF email used.
	 * @param  string $key        The CF API Key.
	 * @param  int    $erase_data If we need to deauthenticate.
	 */
	public function deauthenticate( $email, $key, $erase_data ) {
		// Remove the worker.
		$result = $this->cloudflare->remove_worker();

		if ( false === $result ) {
			self::send_json_error(
				__( 'Failed to deauthenticate Cloudflare', 'sg-cachepress' ),
				array(
					'cloudflare_email'               => $email,
					'cloudflare_auth_key'            => $key,
					'cloudflare_optimization_status' => 1,
				)
			);
		}

		// Check if we need to erase personal data.
		if ( 1 === $erase_data ) {
			delete_option( 'siteground_optimizer_cloudflare_email' );
			delete_option( 'siteground_optimizer_cloudflare_auth_key' );
			delete_option( 'siteground_optimizer_cloudflare_zone_id' );
			$email = '';
			$key   = '';
		}

		update_option( 'siteground_optimizer_cloudflare_optimization_status', 0 );

		// Purge the cache.
		Supercacher::purge_cache();

		self::send_json_success(
			__( 'Cloudflare successfully deauthenticated.', 'sg-cachepress' ),
			array(
				'cloudflare_email'               => $email,
				'cloudflare_auth_key'            => $key,
				'cloudflare_optimization_status' => 0,
			)
		);
	}

}
