<?php
/*
Plugin Name: Kerge Portfolio
Plugin URI: http://lmpixels.com
Description: Kerge Theme Portfolio
Author: LMPixels
Version: 1.3.0
*/

add_action( 'plugins_loaded', 'kerge_portfolio_textdomain' );

function kerge_portfolio_textdomain() {
    load_plugin_textdomain( 'kerge-portfolio', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}

if( ! function_exists( 'kerge_filter_portfolio_extension' ) ){
    function kerge_filter_portfolio_extension($locations) {
    	$locations[
    		dirname(__FILE__) . '/extensions'
    	] = plugin_dir_url( __FILE__ ) . 'extensions';

    	return $locations;
    }
}
add_filter('fw_extensions_locations', 'kerge_filter_portfolio_extension');