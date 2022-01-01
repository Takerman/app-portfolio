<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'icon'    => array(
		'type'  => 'icon-v2',
		'label' => esc_html__('Choose an Icon', 'kerge-shortcodes'),
	),
	'title'   => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title of the Service', 'kerge-shortcodes' ),
	),
	'content' => array(
		'type'  => 'text',
		'label' => esc_html__( 'Content', 'kerge-shortcodes' ),
		'desc'  => esc_html__( 'Enter the desired content', 'kerge-shortcodes' ),
	),
);