<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$template_directory = get_template_directory_uri();
$settings_page_link = is_admin() ? menu_page_url( fw()->backend->_get_settings_page_slug(), false ) : '#';
$options            = array(
	'main' => array(
		'title'   => esc_html__( 'Project Options', 'kerge' ),
		'type'    => 'box',
		'options' => array(
			'portfolio_type'   => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'value'        => array(
				'portfolio_type_picker' => 'standard',
				),
				'picker'       => array(
					'portfolio_type_picker' => array(
						'label'   => esc_html__( 'Portfolio Type', 'kerge' ),
						'type'    => 'radio',
						'choices' => array(
							'standard' => esc_html__( 'Standard', 'kerge' ),
							'lbimage'  => esc_html__( 'Lightbox Featured Image', 'kerge' ),
							'lbvideo'  => esc_html__( 'Lightbox Video', 'kerge' ),
							'lbaudio'  => esc_html__( 'Lightbox Audio', 'kerge' ),
							'direct'   => esc_html__( 'Direct URL', 'kerge' ),
						),
					)
				),
				'choices'      => array(
					'standard'  => array(
						'pf_client'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Client', 'kerge' ),
						),
						'pf_site_text'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Site URL Text', 'kerge' ),
						),
						'pf_site_url'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Site URL', 'kerge' ),
						),
						'pf_site_text_second'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Site URL Text 2', 'kerge' ),
						),
						'pf_site_url_second'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Site URL 2', 'kerge' ),
						),
						'pf_site_text_third'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Site URL Text 3', 'kerge' ),
						),
						'pf_site_url_third'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Site URL 3', 'kerge' ),
						),
						'pf_date'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Date', 'kerge' ),
						),
						'pf_description' => array(
							'label' => esc_html__( 'Short Description', 'kerge' ),
							'type'  => 'wp-editor',
							'value' => '',
							'desc'  => false,
							'help'  => false,
							'reinit' => true,
						),
						'pf_tags'            => array(
							'label'  => esc_html__( 'Project Tags', 'kerge' ),
							'type'   => 'addable-option',
							'option' => array(
								'type' => 'text',
							),
							'value'  => array(),
							'desc'   => false
						),
						'pf_gallery_grid' => array(
							'type'         => 'multi-picker',
							'label'        => false,
							'desc'         => false,
							'picker'       => array(
								'pf_gallery_grid_picker' => array(
									'label'        => esc_html__( 'Show Gallery as Grid', 'kerge' ),
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
								)
							),
							'choices'      => array(
								'on' => array(
									'pf_gallery_grid_columns'	=> array(
										'label'   => esc_html__( 'Gallery Grid', 'kerge' ),
										'type'    => 'radio',
										'value'   => 'two-columns',
										'desc'    => false,
										'choices' => array(
											'one-column' => esc_html__( '1 Column', 'kerge' ),
											'two-columns' => esc_html__( '2 Columns', 'kerge' ),
											'three-columns' => esc_html__( '3 Columns', 'kerge' ),
										),
									),
									'crop_img' => array(
										'label'        => esc_html__( 'Crop Gallery Images', 'kerge' ),
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
										'help'         => false,
									),
								),
							),
							'show_borders' => false,
						),
						'pf_use_ajax' => array(
							'label'        => esc_html__( 'Use Ajax to load the project', 'kerge' ),
							'type'         => 'switch',
							'right-choice' => array(
								'value' => 'yes',
								'label' => esc_html__( 'Yes', 'kerge' )
							),
							'left-choice'  => array(
								'value' => 'no',
								'label' => esc_html__( 'No', 'kerge' )
							),
							'value'        => 'yes',
							'desc'         => esc_html__( 'If you disable this option, the project will open as a separate page. If this option is enabled, the project will be loaded in the form of an animated window, above the main content.', 'kerge' ),
							'help'         => false,
						),
						'pf_slider_pos' => array(
							'label'        => esc_html__( 'Display slider/gallery above or below content', 'kerge' ),
							'type'         => 'switch',
							'right-choice' => array(
								'value' => 'below',
								'label' => esc_html__( 'Below', 'kerge' )
							),
							'left-choice'  => array(
								'value' => 'above',
								'label' => esc_html__( 'Above', 'kerge' )
							),
							'value'        => 'below',
							'help'         => false,
						),
					),
					'lbvideo'  => array(
						'videourl'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Video URL', 'kerge' ),
						)
					),
					'lbaudio'  => array(
						'audiourl'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Audio URL', 'kerge' ),
						)
					),
					'direct'  => array(
						'directurl'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Direct URL', 'kerge' ),
						)
					),
				),
				'show_borders' => false,
			),
		),
	),
);
