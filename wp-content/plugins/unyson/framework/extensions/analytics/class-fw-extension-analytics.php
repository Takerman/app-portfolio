<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

class FW_Extension_Analytics extends FW_Extension {

	/**
	 * @internal
	 */
	public function _init() {
	}

	/**
	 * @return string
	 */
	public function get_analytics_code() {
		return fw_get_db_ext_settings_option( $this->get_name(), 'code' );
	}

	public function render() {
		$code = trim( fw()->extensions->get( 'analytics' )->get_analytics_code() );

		if ( empty( $code ) ) {
			return '';
		}

		return $this->render_view( 'view', array( 'code' => $code ) );
	}
}