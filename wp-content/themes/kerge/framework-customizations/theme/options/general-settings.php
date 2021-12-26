<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'general' => array(
		'title'   => esc_html__( 'General', 'kerge' ),
		'type'    => 'tab',
		'options' => array(
			'general-box' => array(
				'title'   => esc_html__( 'General Settings', 'kerge' ),
				'type'    => 'box',
				'attr'    => array('class' => 'initialized'),
				'options' => array(
					'logo'	=> array(
						'label' => esc_html__( 'Header Title', 'kerge' ),
						'desc'  => esc_html__( 'Write your website title', 'kerge' ),
						'type'  => 'text',
						'value' => get_bloginfo( 'name' ),
						'help'    => esc_html__( 'If you want to use the logo as an image, you can upload it below, in which case this field can be left blank.', 'kerge' ),
					),
					'header_subtitle'	=> array(
						'label' => esc_html__( 'Header Subtitle', 'kerge' ),
						'desc'  => esc_html__( 'Write your header subtitle', 'kerge' ),
						'type'  => 'text',
						'value' => '',
					),
					'photo'	=> array(
						'label' => esc_html__( 'Image Logo', 'kerge' ),
						'desc'  => esc_html__( 'Upload the logo.', 'kerge' ),
						'type'  => 'upload',
					),
					'logo_img_height'	=> array(
						'label' => esc_html__( 'Logo Image Height', 'kerge' ),
						'desc'  => esc_html__( 'Set logo image height in the pixels. Example: 100.', 'kerge' ),
						'type'  => 'short-text',
						'value' => '110'
					),
					'logo_img_width'	=> array(
						'label' => esc_html__( 'Logo Image Width', 'kerge' ),
						'desc'  => esc_html__( 'Set logo image width in the pixels. Example 100.', 'kerge' ),
						'type'  => 'short-text',
						'value' => '110'
					),
					'header_social'            => array(
					    'type' => 'addable-popup',
					    'value' => array(
					    ),
					    'label' => __('Social Icons', 'kerge'),
					    'template' => '{{- title }}',
					    'popup-title' => null,
					    'size' => 'small', // small, medium, large
					    'limit' => 0, // limit the number of popup`s that can be added
					    'add-button-text' => __('Add', 'kerge'),
					    'sortable' => true,
					    'popup-options' => array(
					    	'title' => array(
					            'label' => __('Title', 'kerge'),
					            'type' => 'text',
					            'value' => '',
					        ),
					        'icon'    => array(
								'type'  => 'icon',
								'label' => esc_html__('Choose an Icon', 'kerge'),
							),
							'image'	=> array(
								'label' => esc_html__( 'Use a Graphic Icon Instead of a Font', 'kerge' ),
								'desc'  => esc_html__( 'Add an icon image. In this case, the previous field will have no effect.', 'kerge' ),
								'type'  => 'upload',
							),
					        'link' => array(
					            'label' => __('Social Link', 'kerge'),
					            'type' => 'text',
					            'value' => '',
					        ),
					    ),
					),
					'copyrights' => array(
						'label' => esc_html__( 'Copyrights', 'kerge' ),
						'desc'  => false,
						'type'  => 'text',
						'value' => ''
					),
				)
			)
		)
	)
);