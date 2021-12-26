<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'portfolio' => array(
		'title'   => esc_html__( 'Portfolio', 'kerge' ),
		'type'    => 'tab',
		'options' => array(
			'portfolio_settings' => array(
				'title'   => esc_html__( 'Portfolio Settings', 'kerge' ),
				'type'    => 'box',
				'options' => array(
					'portfolio_titles' => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'desc'         => false,
						'picker'       => array(
							'portfolio_titles_switcher' => array(
								'label'        => esc_html__( 'Custom Portfolio Titles', 'kerge' ),
								'type'         => 'switch',
								'right-choice' => array(
									'value' => 'on',
									'label' => esc_html__( 'on', 'kerge' )
								),
								'left-choice'  => array(
									'value' => 'off',
									'label' => esc_html__( 'Off', 'kerge' )
								),
								'value'        => 'on',
							)
						),
						'choices'      => array(
							'on' => array(
								'description_title'	=> array(
									'label' => esc_html__( 'Description Title', 'kerge' ),
									'desc'  => esc_html__( 'Description title.', 'kerge' ),
									'type'  => 'text',
									'value' => esc_html__( 'Description', 'kerge' ),
								),
								'technology_title'	=> array(
									'label' => esc_html__( 'Technology Title', 'kerge' ),
									'desc'  => esc_html__( 'Technology title.', 'kerge' ),
									'type'  => 'text',
									'value' => esc_html__( 'Technology', 'kerge' ),
								),
								'share_title'	=> array(
									'label' => esc_html__( 'Share Title', 'kerge' ),
									'desc'  => esc_html__( 'Share title.', 'kerge' ),
									'type'  => 'text',
									'value' => esc_html__( 'Share', 'kerge' ),
								),
							),
						),
						'show_borders' => false,
					),
					'portfolio_desc_sidebar' => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'desc'         => false,
						'picker'       => array(
							'portfolio_sidebar_switcher' => array(
								'label'        => esc_html__( 'Display a Sidebar with a Description, Tags and Share Links.', 'kerge' ),
								'type'         => 'switch',
								'right-choice' => array(
									'value' => 'on',
									'label' => esc_html__( 'on', 'kerge' )
								),
								'left-choice'  => array(
									'value' => 'off',
									'label' => esc_html__( 'Off', 'kerge' )
								),
								'value'        => 'on',
							)
						),
						'choices'      => array(
							'on' => array(
								'portfolio_desc_fields' => array(
								    'type'  => 'checkboxes',
								    'value' => array(
								        'client' => true,
								        'site' => true,
								        'date' => true,
								        'tags' => true,
								        'share' => true,
								    ),
								    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
								    'label' => __('Display Fields and Blocks in the Description Block', 'kerge'),
								    'desc'  => __('These settings apply only to the standard project type.', 'kerge'),
								    'choices' => array(
								        'client' => __('Client', 'kerge'),
								        'site' => __('Site', 'kerge'),
								        'date' => __('Date', 'kerge'),
								        'tags' => __('Tags', 'kerge'),
								        'share' => __('Share Buttons', 'kerge'),
								    ),
								    'inline' => false,
								),
								'portfolio_sidebar_position' => array(
									'label'        => esc_html__( 'Display Sidebar on the Left or Right Side', 'kerge' ),
									'type'         => 'switch',
									'right-choice' => array(
										'value' => 'right',
										'label' => esc_html__( 'Right', 'kerge' )
									),
									'left-choice'  => array(
										'value' => 'left',
										'label' => esc_html__( 'Left', 'kerge' )
									),
									'value'        => 'right',
								)
							),
						),
						'show_borders' => false,
					),
					'portfolio_load_more' => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'desc'         => false,
						'picker'       => array(
							'portfolio_load_more_switcher' => array(
								'label'        => esc_html__( 'Load More Feature', 'kerge' ),
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
							)
						),
						'choices'      => array(
							'on' => array(
								'projects_number'	=> array(
									'label' => esc_html__( 'Number of Projects Displayed by Default', 'kerge' ),
									'type'  => 'text',
									'value' => '9',
								),
								'button_text'	=> array(
									'label' => esc_html__( 'Load More Button Text', 'kerge' ),
									'type'  => 'text',
									'value' => esc_html__( 'Load More', 'kerge' ),
								),
								'button_text_loading'	=> array(
									'label' => esc_html__( 'Load More Button Text on Loading', 'kerge' ),
									'type'  => 'text',
									'value' => esc_html__( 'Loading...', 'kerge' ),
								),

							),
						),
						'show_borders' => false,
					)
				)
			),
		)
	)
);
