<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'         => array(
		'label' => esc_html__( 'Title', 'kerge-shortcodes' ),
		'desc'  => esc_html__( 'Option Contact Form 2 Title', 'kerge-shortcodes' ),
		'type'  => 'text',
	),
	'contact_form_pro' => array(
		'label'         => esc_html__( 'Contact Form Elements', 'kerge-shortcodes' ),
		'popup-title'   => esc_html__( 'Add/Edit Contact Form Elements', 'kerge-shortcodes' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Contact Form 2 elements.', 'kerge-shortcodes' ),
		'type'          => 'addable-popup',
		'template'      => '{{=title}}',
		'popup-options' => array(
			'element_type'    => array(
			    'type'  => 'radio',
			    'value' => 'text',
			    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
			    'label' => __('Element Type', 'kerge-shortcodes'),
			    'desc'  => __('The type of the form element.', 'kerge-shortcodes'),
			    'choices' => array(
			        'text' => __('Text Input', 'kerge-shortcodes'),
			        'textarea' => __('Textarea', 'kerge-shortcodes'),
			        'email' => __('E-Mail', 'kerge-shortcodes'),
			        'phone' => __('Phone', 'kerge-shortcodes'),
			        'checkbox' => __('Checkbox', 'kerge-shortcodes'),
			    ),
			    'inline' => false,
			),
			'title'       => array(
				'label' => esc_html__( 'Title', 'kerge-shortcodes' ),
				'desc'  => esc_html__( 'Enter the title', 'kerge-shortcodes' ),
				'type'  => 'text',
			),
			'icon'    => array(
				'type'  => 'icon-v2',
				'label' => esc_html__('Choose an Icon', 'kerge-shortcodes'),
			),
			'error_message'       => array(
				'label' => esc_html__( 'Error Message', 'kerge-shortcodes' ),
				'desc'  => esc_html__( 'Enter the error message', 'kerge-shortcodes' ),
				'type'  => 'text',
			),
			'required'       => array(
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
		)
	),
	'submit_btn_text'         => array(
		'label' => esc_html__( 'Submit Button Text', 'kerge-shortcodes' ),
		'type'  => 'text',
		'value' => esc_html__( 'Submit', 'kerge-shortcodes' ),
	),
);