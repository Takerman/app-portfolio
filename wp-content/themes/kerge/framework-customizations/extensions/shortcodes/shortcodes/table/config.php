<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Table', 'kerge' ),
	'description' => esc_html__( 'Add a Table', 'kerge' ),
	'tab'         => esc_html__( 'Kerge Elements', 'kerge' ),
	'popup_size'  => 'large'
);