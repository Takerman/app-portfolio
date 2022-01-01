<?php
/*
Plugin Name: Kerge Tracking, External CSS and JS
Plugin URI: http://lmpixels.com
Description: Add tracking, external CSS and JS
Author: LMPixels
Version: 1.0.0
*/

/**
 * LMPixels Adding tracking and external CSS to the head
 */
function kerge_tracking_wp_head()
{
	$external_css = stripcslashes( ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('external_styles') :  '' );
	echo $external_css;

	$head_tracking_code = stripcslashes( ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('head_tracking_code') :  '' );
	echo $head_tracking_code;
}

add_action('wp_head', 'kerge_tracking_wp_head');
/* ================================================================================================ */

/**
 * LMPixels Adding tracking & external js to the body
 */
function kerge_tracking_wp_body()
{
	$external_js = stripcslashes( ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('external_js') :  '' );
	echo $external_js;

	$body_tracking_code = stripcslashes( ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_tracking_code') :  '' );
	echo $body_tracking_code;
}

add_action('wp_footer', 'kerge_tracking_wp_body');
/* ================================================================================================ */