<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Register menus
 */
register_nav_menus( array(
	'classic-menu-new' => esc_html__( 'Classic Menu NEW (Recommended)', 'kerge' ),
    'classic-menu' => esc_html__( 'Classic Menu Old Version', 'kerge' ),
    'kerge-template-menu' => esc_html__( 'Kerge Template Additional Menu', 'kerge' ),
) );