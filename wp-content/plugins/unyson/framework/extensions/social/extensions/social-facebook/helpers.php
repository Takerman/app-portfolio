<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * Accessing Facebook Graph API
 *
 * @param string $method
 * @param $node
 * @param $args
 * @param bool $token
 * @param string $version
 * @param string $graph_url
 *
 * @return string
 */
function fw_ext_social_facebook_graph_api_explorer( $method = 'GET', $node, $args, $token = false, $version = 'v2.2', $graph_url = 'https://graph.facebook.com' ) {
	/* @var FW_Extension_Social_Facebook $facebook */
	$facebook = fw()->extensions->get( 'social-facebook' );

	return $facebook->graph_api_explorer( $method, $node, $args, $token, $version, $graph_url );
}