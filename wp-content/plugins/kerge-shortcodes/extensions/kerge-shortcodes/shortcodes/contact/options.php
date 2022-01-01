<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'checkbox' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'cf_checkbox_switcher' => array(
				'label'        => esc_html__( 'Show the Checkbox', 'kerge-shortcodes' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'on',
					'label' => esc_html__( 'on', 'kerge-shortcodes' )
				),
				'left-choice'  => array(
					'value' => 'off',
					'label' => esc_html__( 'off', 'kerge-shortcodes' )
				),
				'value'        => 'off',
			)
		),
		'choices'      => array(
			'on' => array(
				'checkbox_text'	    => array(
					'label' => esc_html__( 'Checkbox Text', 'kerge-shortcodes' ),
					'desc'  => esc_html__( 'Checkbox text. In this field you can use HTML tags, for example, you can add a link to any page.', 'kerge-shortcodes' ),
					'type'  => 'text',
					'value' => '',
				),
				'checkbox_error'	=> array(
					'label' => esc_html__( 'Checkbox Error Text', 'kerge-shortcodes' ),
					'desc'  => esc_html__( 'Checkbox error text.', 'kerge-shortcodes' ),
					'type'  => 'text',
					'value' => '',
				),
				'checkbox_required' => array(
				    'type'  => 'switch',
				    'value' => 'on',
				    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
				    'label' => __('Mandatory', 'kerge-shortcodes'),
				    'left-choice' => array(
				        'value' => 'off',
				        'label' => __('No', 'kerge-shortcodes'),
				    ),
				    'right-choice' => array(
				        'value' => 'on',
				        'label' => __('Yes', 'kerge-shortcodes'),
				    ),
				)
			),
		),
		'show_borders' => false,
	),
);