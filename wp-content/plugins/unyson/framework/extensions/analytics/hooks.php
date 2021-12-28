<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

function _filter_fw_ext_analytics_wp_head() {
	echo fw_ext_get_analytics();
}

add_action( 'wp_head', '_filter_fw_ext_analytics_wp_head', 10 );