<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'id'     => array( 'type' => 'unique' ),
	'label'  => array(
		'label' => esc_html__( 'Button Label', 'kerge' ),
		'desc'  => esc_html__( 'This is the text that appears on your button', 'kerge' ),
		'type'  => 'text',
		'value' => 'Submit'
	),
	'link'   => array(
		'label' => esc_html__( 'Button Link', 'kerge' ),
		'desc'  => esc_html__( 'Where should your button link to', 'kerge' ),
		'type'  => 'text',
		'value' => '#'
	),
	'target' => array(
		'type'  => 'switch',
		'label'   => esc_html__( 'Open Link in New Window', 'kerge' ),
		'desc'    => esc_html__( 'Select here if you want to open the linked page in a new window', 'kerge' ),
		'right-choice' => array(
			'value' => '_blank',
			'label' => esc_html__('Yes', 'kerge'),
		),
		'left-choice' => array(
			'value' => '_self',
			'label' => esc_html__('No', 'kerge'),
		),
	),
	'btn_type'  => array(
		'label' => esc_html__( 'Button Type', 'kerge' ),
		'desc'  => esc_html__( 'Select the button type', 'kerge' ),
		'type'  => 'select',
		'value' => 'primary',
		'choices' => array(
            'primary'  => esc_html__( 'Primary Button', 'kerge' ),
            'secondary'  => esc_html__( 'Secondary Button', 'kerge' ),
		)
	),
	'margin_top'  => array(
		'label' => esc_html__( 'Margin Top', 'kerge' ),
		'desc'  => esc_html__( 'Margin top in pixels. Example: 10', 'kerge' ),
		'type'  => 'short-text',
		'value' => '0'
	),
	'margin_bottom'  => array(
		'label' => esc_html__( 'Margin Bottom', 'kerge' ),
		'desc'  => esc_html__( 'Margin bottom in pixels. Example: 10', 'kerge' ),
		'type'  => 'short-text',
		'value' => '0'
	),
);