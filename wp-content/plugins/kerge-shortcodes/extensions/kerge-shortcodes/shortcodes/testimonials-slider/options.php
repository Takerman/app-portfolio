<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'id' => array( 'type' => 'unique' ),
	'title'         => array(
		'label' => esc_html__( 'Title', 'kerge-shortcodes' ),
		'desc'  => esc_html__( 'Option Testimonials Title', 'kerge-shortcodes' ),
		'type'  => 'text',
	),
	'testimonials_style' => array(
	    'type'  => 'select',
	    'value' => 'second-style',
	    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
	    'label' => __('Testimonials Style', 'kerge'),
	    'choices' => array(
	        'first-style' => __('Style 1', 'kerge'),
	        'second-style' => __('Style 2', 'kerge'),
	    ),
	    'no-validate' => false,
	),
	'testimonials_slider' => array(
		'label'         => esc_html__( 'Testimonials', 'kerge-shortcodes' ),
		'popup-title'   => esc_html__( 'Add/Edit Testimonial', 'kerge-shortcodes' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Testimonials.', 'kerge-shortcodes' ),
		'type'          => 'addable-popup',
		'template'      => '{{=author_name}}',
		'popup-options' => array(
			'content'       => array(
				'label' => esc_html__( 'Quote', 'kerge-shortcodes' ),
				'desc'  => esc_html__( 'Enter the testimonial here', 'kerge-shortcodes' ),
				'type'  => 'textarea',
			),
			'author_avatar' => array(
				'label' => esc_html__( 'Image', 'kerge-shortcodes' ),
				'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'kerge-shortcodes' ),
				'type'  => 'upload',
			),
			'author_name'   => array(
				'label' => esc_html__( 'Name', 'kerge-shortcodes' ),
				'desc'  => esc_html__( 'Enter the Name of the Person to quote', 'kerge-shortcodes' ),
				'type'  => 'text'
			),
			'author_company'   => array(
				'label' => esc_html__( 'Company', 'kerge-shortcodes' ),
				'desc'  => esc_html__( 'Enter the Company Name', 'kerge-shortcodes' ),
				'type'  => 'text'
			),
			'site_url'      => array(
				'label' => esc_html__( 'Website Link', 'kerge-shortcodes' ),
				'desc'  => esc_html__( 'Link to the Persons website', 'kerge-shortcodes' ),
				'type'  => 'text'
			),
			'target' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Open Website Link in New Tab', 'kerge-shortcodes' ),
				'desc'         => esc_html__( 'Select here if you want to open the linked page in a new window', 'kerge-shortcodes' ),
				'value'        => '_blank',
				'right-choice' => array(
					'value' => '_blank',
					'label' => esc_html__( 'Yes', 'kerge-shortcodes' ),
				),
				'left-choice'  => array(
					'value' => '_self',
					'label' => esc_html__( 'No', 'kerge-shortcodes' ),
				),
			),
		)
	),
	'items'         => array(
		'label' => esc_html__( 'Items on the front: Desktop', 'kerge-shortcodes' ),
		'desc'  => esc_html__( 'Example: 2', 'kerge-shortcodes' ),
		'type'  => 'text',
		'value' => '3'
	),
	'items_tablet'         => array(
		'label' => esc_html__( 'Items on the front: Tablet', 'kerge-shortcodes' ),
		'desc'  => esc_html__( 'Example: 2', 'kerge-shortcodes' ),
		'type'  => 'text',
		'value' => '2'
	),
	'items_mobile'         => array(
		'label' => esc_html__( 'Items on the front: Mobile', 'kerge-shortcodes' ),
		'desc'  => esc_html__( 'Example: 2', 'kerge-shortcodes' ),
		'type'  => 'text',
		'value' => '1'
	),
	'loop' => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Infinity Loop', 'kerge-shortcodes' ),
		'desc'         => esc_html__( 'Duplicate last and first items to get loop illusion.', 'kerge-shortcodes' ),
		'value'        => 'off',
		'right-choice' => array(
			'value' => 'on',
			'label' => esc_html__( 'On', 'kerge-shortcodes' ),
		),
		'left-choice'  => array(
			'value' => 'off',
			'label' => esc_html__( 'Off', 'kerge-shortcodes' ),
		),
	),
	'autoplay' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'autoplay_switcher' => array(
				'label'        => esc_html__( 'Autoplay', 'kerge-shortcodes' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'on',
					'label' => esc_html__( 'On', 'kerge-shortcodes' )
				),
				'left-choice'  => array(
					'value' => 'off',
					'label' => esc_html__( 'Off', 'kerge-shortcodes' )
				),
				'value'        => 'off',
			)
		),
		'choices'      => array(
			'on' => array(
				'autoplay_tablet' => array(
					'label'        => esc_html__( 'Autoplay only on Tablets and Mobiles', 'kerge-shortcodes' ),
					'type'         => 'switch',
					'right-choice' => array(
						'value' => 'on',
						'label' => esc_html__( 'On', 'kerge-shortcodes' )
					),
					'left-choice'  => array(
						'value' => 'off',
						'label' => esc_html__( 'Off', 'kerge-shortcodes' )
					),
					'value'        => 'off',
				),
				'autoplay_timeout'         => array(
					'label' => esc_html__( 'Atoplay Timeout', 'kerge-shortcodes' ),
					'desc'  => esc_html__( 'Example: 5000.', 'kerge-shortcodes' ),
					'type'  => 'text',
					'value' => '5000'
				),
				'smart_speed'         => array(
					'label' => esc_html__( 'Autoplay Smart Speed', 'kerge-shortcodes' ),
					'desc'  => esc_html__( 'Example: 1500.', 'kerge-shortcodes' ),
					'type'  => 'text',
					'value' => '1000'
				),
			),
		),
		'show_borders' => false,
	),
	'by_page' => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Slide by Page', 'kerge-shortcodes' ),
		'desc'         => esc_html__( 'Items will slide by page.', 'kerge-shortcodes' ),
		'value'        => '1',
		'right-choice' => array(
			'value' => 'page',
			'label' => esc_html__( 'On', 'kerge-shortcodes' ),
		),
		'left-choice'  => array(
			'value' => '1',
			'label' => esc_html__( 'Off', 'kerge-shortcodes' ),
		),
	),
);