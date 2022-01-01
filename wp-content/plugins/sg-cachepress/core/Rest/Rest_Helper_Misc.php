<?php
namespace SiteGround_Optimizer\Rest;

use SiteGround_Optimizer\Supercacher\Supercacher;
use SiteGround_Optimizer\Analysis\Analysis;
use SiteGround_Optimizer\Message_Service\Message_Service;
/**
 * Rest Helper class that manages misc rest routes  settings.
 */
class Rest_Helper_Misc extends Rest_Helper {

	/**
	 * Speed test run.
	 *
	 * @since  5.4.0
	 *
	 * @param  object $request Request data.
	 */
	public function run_analysis( $request ) {
		// Get the required params.
		$device = $this->validate_and_get_option_value( $request, 'device' );
		$url    = $this->validate_and_get_option_value( $request, 'url', false );

		$analysis = new Analysis();
		$result = $analysis->run_analysis( $url, $device );

		// Send the response.
		self::send_json_response(
			$result,
			false === $result ? __( 'We failed to connect to Google servers, please try later!', 'sg-cachepress' ) : '',
			array(
				'success' => $result,
			)
		);
	}

	/**
	 * Manage Excludes.
	 *
	 * @since 6.0.0
	 *
	 * @param object $request Request data.
	 */
	public function manage_excludes( $request ) {
		// Get the request params.
		$params = $request->get_params( $request );

		// Get the current type param.
		$type = str_replace( '-', '_', $params['type'] );

		// Get the Excludes list values.
		$selected = $this->validate_and_get_option_value( $request, 'selected' );
		$default  = $this->validate_and_get_option_value( $request, 'default' );

		if ( ! empty( $default ) ) {
			// Get the default values from the defaults.
			$default_values = array_column( $default, 'value' );

			// Get the diff between selected and selected in the database.
			$selected_diff = array_diff( get_option( 'siteground_optimizer_' . $type, array() ), $selected );

			// Get the difference between selected and default values.
			$diff = array_diff( $selected_diff, $default_values );

			// Preprare the new selected.
			$selected = array_unique( array_merge( $selected, $diff ) );
		}

		// Update the option.
		$result = update_option( 'siteground_optimizer_' . $type, $selected );

		// Purge the cache.
		Supercacher::purge_cache();

		// Send the response.
		self::send_json_success(
			Message_Service::get_response_message( 1, $type, null ),
			array(
				$type => array(
					'default'  => $default,
					'selected' => array_values( $selected ),
				),
			)
		);
	}
}
