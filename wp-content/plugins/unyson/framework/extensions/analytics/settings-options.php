<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'box' => array(
		'title'   => false,
		'type'    => 'box',
		'options' => array(
			'code' => array(
				'label' => __( 'Google Analytics', 'fw' ),
				'desc'  => __( 'Enter your Google Analytics code (Ex: UA-XXXXX-X)', 'fw' ),
				'type'  => 'text',
			)
		)
	)
);