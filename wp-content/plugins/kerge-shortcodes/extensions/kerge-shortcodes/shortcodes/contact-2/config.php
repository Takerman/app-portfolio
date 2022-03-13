<?php if (!defined('FW')) die('Forbidden');
if ( function_exists( 'kerge_contact_action' ) ) {
    $cfg = array(
    	'page_builder' => array(
    		'title'       => esc_html__( 'Contact Form 2', 'kerge-shortcodes' ),
    		'description' => esc_html__( 'Contact Form 2', 'kerge-shortcodes' ),
    		'tab'         => esc_html__( 'Kerge Elements', 'kerge-shortcodes' ),
    	)
    );
}
