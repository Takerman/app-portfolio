<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$tabs        = array();
$general_tab = apply_filters( 'fw_ext_social_boxes_from_general_tab', array() );
$main_box    = apply_filters( 'fw_ext_social_main_box_from_general_tab', array() );

if ( ! empty( $general_tab ) || ! empty( $main_box ) ) {
	$tabs['general-tab'] = array(
		'title'   => __( 'General', 'fw' ),
		'type'    => 'tab',
		'options' => array(
			'general-settings' => array(
				'title'   => __( 'General Settings', 'fw' ),
				'type'    => 'box',
				'options' => array(
					$main_box
				)
			),
			$general_tab
		),
	);
}

$options = array(
	$tabs = apply_filters( 'fw_ext_social_tabs', $tabs )
);