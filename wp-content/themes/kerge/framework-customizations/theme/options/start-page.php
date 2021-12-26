<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'start_page' => array(
		'title'   => esc_html__( 'Start Page', 'kerge' ),
		'type'    => 'tab',
		'options' => array(
			'start_page_options' => array(
				'title'   => esc_html__( 'Start Page Settings', 'kerge' ),
				'type'    => 'box',
				'attr'    => array('class' => 'initialized'),
				'options' => array(
					'sp_style'       => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'desc'         => false,
						'picker'       => array(
							'sp_style_picker' => array(
								'label'   => esc_html__( 'Start Page Style', 'kerge' ),
								'type'    => 'select',
								'choices' => array(
									'first-style'  => esc_html__( 'First Style', 'kerge' ),
									'second-style' => esc_html__( 'Second Style', 'kerge' )
								),
								'value'   => 'second-style',
							)
						),
						'choices'      => array(
							'first-style'  => array(
								'hp_main_title'	=> array(
									'label' => esc_html__( 'Main Title', 'kerge' ),
									'desc'  => esc_html__( 'Write your main title', 'kerge' ),
									'type'  => 'text',
									'value' => get_bloginfo( 'name' )
								),
								'hp_subtitles'            => array(
									'label'  => esc_html__( 'Subtitles Carousel', 'kerge' ),
									'type'   => 'addable-option',
									'option' => array(
										'type' => 'text',
									),
									'value'  => array(),
									'desc'   => false
								),
								'hp_background'	=> array(
									'label' => esc_html__( 'Start Page Background', 'kerge' ),
									'desc'  => esc_html__( 'Upload an image.', 'kerge' ),
									'type'  => 'upload',
								),
								'hp_overlay_bg' => array(
									'label' => __( 'Start Page Overlay', 'kerge' ),
									'type'  => 'rgba-color-picker',
									'value' => 'rgba(10,10,10,0.45)',
									'desc'  => __( 'Select the overlay color.',
										'kerge' ),
								),
								'hp_img_slider' => array(
									'type'         => 'multi-picker',
									'label'        => false,
									'desc'         => false,
									'picker'       => array(
										'hp_img_slider_switcher' => array(
											'label'        => esc_html__( 'Use Background Image Slideshow', 'kerge' ),
											'type'         => 'switch',
											'right-choice' => array(
												'value' => 'on',
												'label' => esc_html__( 'On', 'kerge' )
											),
											'left-choice'  => array(
												'value' => 'off',
												'label' => esc_html__( 'Off', 'kerge' )
											),
											'value'        => 'off',
											'desc'  => __('Use image slideshow on background instead of static image.', 'kerge'),
										)
									),
									'choices'      => array(
										'on' => array(
											'images'	=> array(
											    'type'  => 'multi-upload',
											    'value' => '',
											    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
											    'label' => __('Images', 'kerge'),
											    'desc'  => __('Select multiple images', 'kerge'),
											    'images_only' => true,
											    'files_ext' => array( 'jpg', 'jpeg', 'png', 'gif' ),
											),
											'slideshow_speed'            => array(
												'label'  => esc_html__( 'Slideshow Speed', 'kerge' ),
												'type' => 'short-text',
												'value'  => '6',
												'desc'   => __('Slideshow speed in seconds.', 'kerge'),
											),
										),
									),
									'show_borders' => false,
								),
							),
							'second-style'  => array(
								'hp_background'	=> array(
									'label' => esc_html__( 'Start Page Background', 'kerge' ),
									'desc'  => esc_html__( 'Upload an image.', 'kerge' ),
									'type'  => 'upload',
								),
								'hp_main_title'	=> array(
									'label' => esc_html__( 'Main Title', 'kerge' ),
									'desc'  => esc_html__( 'Write your main title', 'kerge' ),
									'type'  => 'text',
									'value' => get_bloginfo( 'name' )
								),
								'hp_subtitles'            => array(
									'label'  => esc_html__( 'Subtitles Carousel', 'kerge' ),
									'type'   => 'addable-option',
									'option' => array(
										'type' => 'text',
									),
									'value'  => array(),
									'desc'   => false
								),
								'hp_text' => array(
								    'type'  => 'wp-editor',
								    'value' => '',
								    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
								    'label' => __('Text', 'kerge'),
								    'size' => 'small',
								    'editor_height' => 300,
								    'wpautop' => true,
								    'editor_type' => false,
								),
								'hp_buttons' => array(
								    'type' => 'addable-popup',
								    'label' => __('Buttons', 'kerge'),
								    'template' => '{{- title }}',
								    'popup-title' => null,
								    'size' => 'small',
								    'limit' => 0,
								    'add-button-text' => __('Add', 'kerge'),
								    'sortable' => true,
								    'popup-options' => array(
								    	'title' => array(
								            'label' => __('Title', 'kerge'),
								            'type' => 'text',
								            'value' => '',
								        ),
								        'link' => array(
								            'label' => __('URL', 'kerge'),
								            'type' => 'text',
								            'value' => '',
								        ),
								        'target' => array(
											'type'  => 'switch',
											'label'   => esc_html__( 'Open Link in New Tab', 'kerge' ),
											'desc'    => esc_html__( 'Select here if you want to open the linked page in a new tab', 'kerge' ),
											'value'   => '_blank',
											'right-choice' => array(
												'value' => '_blank',
												'label' => esc_html__('Yes', 'kerge'),
											),
											'left-choice' => array(
												'value' => '_self',
												'label' => esc_html__('No', 'kerge'),
											),
										),
								    ),
								),
								'position' => array(
									'type'  => 'switch',
									'label'   => esc_html__( 'Display the image on the right, the block with the text on the left', 'kerge' ),
									'desc'    => esc_html__( 'Swap the location of the blocks at the top of the start page', 'kerge' ),
									'value'   => 'no',
									'right-choice' => array(
										'value' => 'yes',
										'label' => esc_html__('Yes', 'kerge'),
									),
									'left-choice' => array(
										'value' => 'no',
										'label' => esc_html__('No', 'kerge'),
									),
								),
							)
						)
					)
				)
			),
		)
	)
);