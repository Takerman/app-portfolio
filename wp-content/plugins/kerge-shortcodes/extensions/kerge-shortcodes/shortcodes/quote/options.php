<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$template_directory = get_template_directory_uri();
$options = array(
	'text_align' => array(
		'label' => esc_html__( 'Text Alignment', 'kerge-shortcodes' ),
		'desc'  => esc_html__( 'Select the prefered text alignment', 'kerge-shortcodes' ),
		'type'  => 'image-picker',
		'value' => '',
		'choices' => array(
			'fw-quote-left' => array(
				'small' => array(
					'height' => 50,
					'src' => $template_directory .'/images/image-picker/left-position.jpg',
					'title' => esc_html__('Left', 'kerge-shortcodes')
				),
			),
			'fw-quote-center' => array(
				'small' => array(
					'height' => 50,
					'src' => $template_directory .'/images/image-picker/center-position.jpg',
					'title' => esc_html__('Center', 'kerge-shortcodes')
				),
			),
			'fw-quote-right' => array(
				'small' => array(
					'height' => 50,
					'src' => $template_directory .'/images/image-picker/right-position.jpg',
					'title' => esc_html__('Right', 'kerge-shortcodes')
				),
			),
		),
	),
	'text'  => array(
		'label'   => esc_html__( 'Text', 'kerge-shortcodes' ),
		'desc'    => esc_html__( 'Enter quote text', 'kerge-shortcodes' ),
		'value'   => '',
		'type'    => 'wp-editor',
	),
    'text_group' => array(
        'type' => 'group',
        'options' => array(
            'author'  => array(
                'label' => esc_html__( 'Author', 'kerge-shortcodes' ),
                'desc'  => esc_html__( 'Enter the quote author', 'kerge-shortcodes' ),
                'type'  => 'text',
                'value' => ''
            ),
            'author_link'   => array(
                'label' => esc_html__( 'Link', 'kerge-shortcodes' ),
                'desc'  => esc_html__( 'Enter the author link', 'kerge-shortcodes' ),
                'type'  => 'text',
                'value' => ''
            ),
        )
    ),
	'font_size' => array(
		'label' => esc_html__( 'Font Size', 'kerge-shortcodes' ),
		'desc'  => esc_html__( 'Select font size', 'kerge-shortcodes' ),
		'attr'  => array( 'class' => 'fw-checkbox-float-left' ),
		'type'  => 'radio',
		'value' => 'fw-quote-md',
		'choices' => array(
			'fw-quote-sm' => esc_html__( 'Small', 'kerge-shortcodes' ),
			'fw-quote-md' => esc_html__( 'Medium', 'kerge-shortcodes' ),
			'fw-quote-lg' => esc_html__( 'Large', 'kerge-shortcodes' ),
		),
	),
	'class'  => array(
		'label' => esc_html__( 'Custom Class', 'kerge-shortcodes' ),
		'desc'  => esc_html__( 'Enter custom CSS class', 'kerge-shortcodes' ),
		'type'  => 'text',
		'value' => '',
		'help'  => esc_html__( 'You can use this class to further style this shortcode by adding your custom CSS.', 'kerge-shortcodes' ),
	),
);