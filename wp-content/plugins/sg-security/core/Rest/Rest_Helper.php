<?php
namespace SG_Security\Rest;

use SG_Security\Options_Service\Options_Service;
use SG_Security\Message_Service\Message_Service;

/**
 * Rest Helper class that process all rest requests and provide json output for react app.
 */
abstract class Rest_Helper {

	/**
	 * Checks if the `option_key` paramether exists in rest data.
	 *
	 * @since  1.0.0
	 *
	 * @param  object $request Request data.
	 * @param  string $key     The option key.
	 * @param  bool   $bail    Whether to send json error or to return a response.
	 *
	 * @return string          The option value.
	 */
	public function validate_and_get_option_value( $request, $key, $bail = true ) {
		$data = json_decode( $request->get_body(), true );

		// Bail if the option key is not set.
		if ( ! isset( $data[ $key ] ) ) {
			return true === $bail ? self::send_json( 'Something went wrong', 400 ) : false;
		}

		return $data[ $key ];
	}

	/**
	 * Change the option value.
	 *
	 * @since  1.0.0
	 *
	 * @param  object $key Request data.
	 * @param  string $value   The option value.
	 *
	 * @return bool            True if the option is enabled, false otherwise.
	 */
	public function change_option( $key, $value ) {
		return Options_Service::change_option( $key, $value );
	}

	/**
	 * Custom json response.
	 *
	 * @since  1.0.0
	 *
	 * @param  string  $message     The response message.
	 * @param  integer $result      The result of the optimization.
	 * @param  array   $data        Additional data to be send.
	 */
	public static function send_json( $message, $result = 1, $data = array() ) {
		// Prepare the status code, based on the optimization result.
		$status_code = 1 === $result ? 200 : 400;

		if ( ! headers_sent() ) {
			header( 'Content-Type: application/json; charset=' . get_option( 'blog_charset' ) );

			if ( null !== $status_code ) {
				status_header( $status_code );
			}
		}

		echo wp_json_encode(
			array(
				'data'    => $data,
				'message' => $message,
				'status'  => $status_code,
			)
		);
		exit;
	}

	/**
	 * Prepare the response message for the plugin interface.
	 *
	 * @since  1.0.0
	 *
	 * @param  int    $result The result of the optimization.
	 * @param  string $option The option name.
	 *
	 * @return string         The response message.
	 */
	public function get_response_message( $result, $option ) {
		return Message_Service::get_response_message( $result, $option );
	}
}
