<?php if (!defined('FW')) die('Forbidden');

if ( function_exists( 'kerge_filter_portfolio_extension' ) ) {
    $cfg = array(
        'page_builder' => array(
            'title'       => esc_html__( 'Portfolio', 'kerge-shortcodes' ),
            'description' => esc_html__( 'Portfolio grid', 'kerge-shortcodes' ),
            'tab'         => esc_html__( 'Kerge Elements', 'kerge-shortcodes' ),
        )
    );
}