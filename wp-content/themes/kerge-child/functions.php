<?php
/**
 * Theme functions file
 */

/**
 * Enqueue parent theme styles first
 * Replaces previous method using @import
 * <http://codex.wordpress.org/Child_Themes>
 */

function kerge_child_theme_enqueue_styles() {

$parent_style = 'parent-style';

wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
wp_enqueue_style( 'child-style',
get_stylesheet_directory_uri() . '/style.css',
array( $parent_style ),
wp_get_theme()->get('Version')
);
}
add_action( 'wp_enqueue_scripts', 'kerge_child_theme_enqueue_styles' );

/**
 * Add your custom functions below
 */
