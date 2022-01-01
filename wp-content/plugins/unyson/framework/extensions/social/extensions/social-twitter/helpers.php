<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * Returns a instance of TwitterOAuth (see: https://github.com/abraham/twitteroauth), based on keys inserted into the page Social
 * @return TwitterOAuth
 */
function fw_ext_social_twitter_get_connection() {
	/* @var FW_Extension_Social_Twitter $social_twitter */
	$social_twitter = fw()->extensions->get( 'social-twitter' );

	return $social_twitter->get_connection();
}