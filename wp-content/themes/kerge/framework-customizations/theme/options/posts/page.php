<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$template_directory = get_template_directory_uri();
$settings_page_link = is_admin() ? menu_page_url( fw()->backend->_get_settings_page_slug(), false ) : '#';
$options            = array(
	'main' => array(
		'title'   => false,
		'type'    => 'box',
		'options' => array(
			'page_settings' => array(
				'title'   => esc_html__( 'Page Settings', 'kerge' ),
				'type'    => 'tab',
				'options' => array(
					'cp_hide_header' => array(
					    'type'  => 'switch',
					    'value' => 'no',
					    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
					    'label' => esc_html__('Hide Page Title', 'kerge'),
					    'desc'  => false,
					    'help'  => false,
					    'left-choice' => array(
					        'value' => 'no',
					        'label' => esc_html__('No', 'kerge'),
					    ),
					    'right-choice' => array(
					        'value' => 'yes',
					        'label' => esc_html__('Yes', 'kerge'),
					    )
					),
					'cp_page_subtitle' => array(
				        'label'   => esc_html__('Page Subtitle', 'kerge'),
				        'desc'    => esc_html__('Write some text', 'kerge'),
				        'type'    => 'text',
				    ),
				)
			),
			'page_title_design' => array(
				'title'   => esc_html__( 'Page Title Design', 'kerge' ),
				'type'    => 'tab',
				'options' => array(
					'cp_custom_header'       => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'desc'         => false,
						'picker'       => array(
							'cp_custom_header_switcher' => array(
								'label'        => esc_html__( 'Custom Page Title Design', 'kerge' ),
								'type'         => 'switch',
								'right-choice' => array(
									'value' => 'on',
									'label' => esc_html__( 'on', 'kerge' )
								),
								'left-choice'  => array(
									'value' => 'off',
									'label' => esc_html__( 'Off', 'kerge' )
								),
								'value'        => 'off',
								'desc'         => esc_html__( 'If the switch is in the Off position, general page title design settings apply. General settings can be changed on the page "Appearance -> Theme Settings".',
									'kerge' ),
							)
						),
						'choices'      => array(
							'on' => array(
								'cp_bg_color' => array(
									'label' => __( 'Background Color', 'kerge' ),
									'type'  => 'color-picker',
									'value' => '#ffcd38',
									'palettes' => array( '#ffcd38', '#e65959', '#34c7a9', '#a878ff', '#f9966f', '#2fc0d1', '#c7243f', '#0099e5', '#f57c02' ),
									'desc'  => __( 'Select the background color of the title.',
										'kerge' ),
								),
								'cp_title_color'            => array(
									'label' => __( 'Title Color', 'kerge' ),
									'type'  => 'color-picker',
									'value' => '#ffffff',
									'desc'  => __( 'Select the color of the title.',
										'kerge' ),
								),
							),
						),
						'show_borders' => false,
					),
				),
			),
			'page_content_area_design' => array(
				'title'   => esc_html__( 'Page Content Area Design', 'kerge' ),
				'type'    => 'tab',
				'options' => array(
					'cp_custom_content_area'       => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'desc'         => false,
						'picker'       => array(
							'cp_custom_ca_switcher' => array(
								'label'        => esc_html__( 'Custom Content Area Design', 'kerge' ),
								'type'         => 'switch',
								'right-choice' => array(
									'value' => 'on',
									'label' => esc_html__( 'on', 'kerge' )
								),
								'left-choice'  => array(
									'value' => 'off',
									'label' => esc_html__( 'Off', 'kerge' )
								),
								'value'        => 'off',
								'desc'         => esc_html__( 'If the switch is in the Off position, general content area design settings apply. General settings can be changed on the page "Appearance -> Theme Settings".',
									'kerge' ),
							)
						),
						'choices'      => array(
							'on' => array(
								'cp_ca_bg_color' => array(
									'label' => __( 'Background Color', 'kerge' ),
									'type'  => 'rgba-color-picker',
									'value' => 'rgba(46, 202, 127, 1)',
									'desc'  => __( 'Select the background color of the title.',
										'kerge' ),
								),
							),
						),
						'show_borders' => false,
					),
				),
			),
		),
	),
);
