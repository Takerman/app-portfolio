<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'theme_customization' => array(
		'title'   => esc_html__( 'Theme Design', 'kerge' ),
		'type'    => 'tab',
		'options' => array(
			'theme_style_options' => array(
				'title'   => esc_html__( 'Theme Design', 'kerge' ),
				'type'    => 'box',
				'options' => array(
					'content_max_width' => array(
						'label' => esc_html__( 'Content Area Max Width', 'kerge' ),
			            'type' => 'short-text',
			            'value' => '1800',
			            'desc'  => esc_html__( 'Maximum width of the area with content. In pixels.', 'kerge' ),
					),
					'main_color' => array(
						'label' => esc_html__( 'Main Theme Color', 'kerge' ),
						'type'  => 'color-picker',
						'value' => '#ffcd38',
						'palettes' => array( '#ffcd38', '#e65959', '#34c7a9', '#a878ff', '#f9966f', '#2fc0d1', '#c7243f', '#0099e5', '#f57c02' ),
						'desc'  => esc_html__( 'Select main color.', 'kerge' ),
					),
					'main_bg_color' => array(
						'label' => esc_html__( 'Body Background Color', 'kerge' ),
						'type'  => 'color-picker',
						'value' => '#f5f5f5',
						'palettes' => array( '#f5f5f5', '#000000' ),
						'desc'  => esc_html__( 'Select body background color.', 'kerge' ),
					),
					'sidebar_bg_color' => array(
						'label' => esc_html__( 'Blog Sidebar Background Color', 'kerge' ),
						'type'  => 'color-picker',
						'value' => '#fff',
						'palettes' => array( '#ffffff', '#333333' ),
						'desc'  => esc_html__( 'Select blog pages sidebar background color.', 'kerge' ),
					),
					'start_page_title_color' => array(
						'label' => esc_html__( 'Start Page Title Color', 'kerge' ),
						'type'  => 'color-picker',
						'value' => '#ffffff',
						'palettes' => array( '#ffffff', '#333333' ),
						'desc'  => esc_html__( 'Select start page title color.', 'kerge' ),
					),
					'start_page_subtitle_color' => array(
						'label' => esc_html__( 'Start Page Subtitle Color', 'kerge' ),
						'type'  => 'color-picker',
						'value' => '#ffffff',
						'palettes' => array( '#ffffff', '#888888' ),
						'desc'  => esc_html__( 'Select start page subtitle color.', 'kerge' ),
					),
					'links_color' => array(
						'label' => esc_html__( 'Links Color', 'kerge' ),
						'type'  => 'color-picker',
						'value' => '#0099CC',
						'palettes' => array( '#0099CC', '#ffcd38', '#e65959', '#34c7a9', '#a878ff', '#f9966f', '#2fc0d1', '#c7243f', '#0099e5', '#f57c02' ),
						'desc'  => esc_html__( 'Select links color.', 'kerge' ),
					),
					'links_hover_color' => array(
						'label' => esc_html__( 'Links Hover Color', 'kerge' ),
						'type'  => 'color-picker',
						'value' => '#006699',
						'desc'  => esc_html__( 'Select links hover color.', 'kerge' ),
					),
					'theme_style_picker'                    => array(
						'label'        => esc_html__( 'Theme Style', 'kerge' ),
						'type'         => 'switch',
						'right-choice' => array(
							'value' => 'light',
							'label' => esc_html__( 'Light', 'kerge' )
						),
						'left-choice'  => array(
							'value' => 'dark',
							'label' => esc_html__( 'Dark', 'kerge' )
						),
						'value'        => 'light',
						'desc'         => esc_html__( 'This option changes the basic styles. The styles that can be changed on that page should be changed at your discretion.', 'kerge' ),
						'help'         => false,
					),
					'blog_sidebar'                    => array(
						'label'        => esc_html__( 'Show Blog Sidebar', 'kerge' ),
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
						'desc'         => false,
						'help'         => false,
					),
					'header_search'                    => array(
						'label'        => esc_html__( 'Display the Search Field in the Header', 'kerge' ),
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
						'desc'         => false,
						'help'         => false,
					),
					'subpages_animations' => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'desc'         => false,
						'picker'       => array(
							'subpages_animations_switcher' => array(
								'label'        => esc_html__( 'Random Animation of Subpages', 'kerge' ),
								'type'         => 'switch',
								'right-choice' => array(
									'value' => 'on',
									'label' => esc_html__( 'On', 'kerge' )
								),
								'left-choice'  => array(
									'value' => 'off',
									'label' => esc_html__( 'Off', 'kerge' )
								),
								'value'        => 'on',
							)
						),
						'choices'      => array(
							'off' => array(
								'animation_number'	=> array(
								    'type'  => 'select',
								    'value' => '1',
								    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
								    'label' => __('Animation Type', 'kerge'),
								    'desc'  => __('Choose the type of animation.', 'kerge'),
								    'choices' => array(
								        '1' => __('1. out: move to Left | in: move from Right', 'kerge'),
								        '2' => __('2. out: move to Right | in: move from Left', 'kerge'),
								        '3' => __('3. out: move to Top | in: move from Bottom', 'kerge'),
								        '4' => __('4. out: move to Bottom | in: move from Top', 'kerge'),
								        '5' => __('5. out: fade | in: move from Right on top', 'kerge'),
								        '6' => __('6. out: fade | in: move from Left on top', 'kerge'),
								        '7' => __('7. out: fade | in: move from Bottom on top', 'kerge'),
								        '8' => __('8. out: fade | in: move from Top on top', 'kerge'),
								        '9' => __('9. out: move to Left Fade | in: move from Right Fade', 'kerge'),
								        '10' => __('10. out: move to Right Fade | in: move from Left Fade', 'kerge'),
								        '11' => __('11. out: move to Top Fade | in: move from Bottom Fade', 'kerge'),
								        '12' => __('12. out: move to Bottom Fade | in: move from Top Fade', 'kerge'),
								        '13' => __('13. out: move to Left Easing on top | in: move from Right', 'kerge'),
								        '14' => __('14. out: move to Right Easing on top | in: move from Left', 'kerge'),
								        '15' => __('15. out: move to Top Easing on top | in: move from Bottom', 'kerge'),
								        '16' => __('16. out: move to Bottom Easing on top | in: move from Top', 'kerge'),
								        '17' => __('17. out: scale Down | in: move from Right on top', 'kerge'),
								        '18' => __('18. out: scale Down | in: move from Left on top', 'kerge'),
								        '19' => __('19. out: scale Down | in: move from Bottom on top', 'kerge'),
								        '20' => __('20. out: scale Down | in: move from Top on top', 'kerge'),
								        '21' => __('21. out: scale Down | in: scale Up Down delay300', 'kerge'),
								        '22' => __('22. out: scale Down Up | in: scale Up delay300', 'kerge'),
								        '23' => __('23. out: move to Left on top | in: scale Up', 'kerge'),
								        '24' => __('24. out: move to Right on top | in: scale Up', 'kerge'),
								        '25' => __('25. out: move to Top on top | in: scale Up', 'kerge'),
								        '26' => __('26. out: move to Bottom on top | in: scale Up', 'kerge'),
								        '27' => __('27. out: scale Down Center | in: scale Up Center delay400', 'kerge'),
								        '28' => __('28. out: rotate Right Side First | in: move from Right delay200 on top', 'kerge'),
								        '29' => __('29. out: rotate Left Side First | in: move from Left delay200 on top', 'kerge'),
								        '30' => __('30. out: rotate Top Side First | in: move from Top delay200 on top', 'kerge'),
								        '31' => __('31. out: rotate Bottom Side First | in: move from Bottom delay200 on top', 'kerge'),
								        '32' => __('32. out: flip Out Right | in: flip In Left delay500', 'kerge'),
								        '33' => __('33. out: flip Out Left | in: flip In Right delay500', 'kerge'),
								        '34' => __('34. out: flip Out Top | in: flip In Bottom delay500', 'kerge'),
								        '35' => __('35. out: flip Out Bottom | in: flip In Top delay500', 'kerge'),
								        '36' => __('36. out: rotate Fall on top | in: scale Up', 'kerge'),
								        '37' => __('37. out: rotate Out Newspaper | in: rotate In Newspaper delay500', 'kerge'),
								        '38' => __('38. out: rotate Push Left | in: move from Right', 'kerge'),
								        '39' => __('39. out: rotate Push Right | in: move from Left', 'kerge'),
								        '40' => __('40. out: rotate Push Top | in: move from Bottom', 'kerge'),
								        '41' => __('41. out: rotate Push Bottom | in: ', 'kerge'),
								        '42' => __('42. out: rotate Push Left | in: rotate Pull Right delay180', 'kerge'),
								        '43' => __('43. out: rotate Push Right | in: rotate Pull Left delay180', 'kerge'),
								        '44' => __('44. out: rotate Push Top | in: rotate Pull Bottom delay180', 'kerge'),
								        '45' => __('45. out: rotate Push Bottom | in: rotate Pull Top delay180', 'kerge'),
								        '46' => __('46. out: rotate Fold Left | in: move from Right Fade', 'kerge'),
								        '47' => __('47. out: rotate Fold Right | in: move from Left Fade', 'kerge'),
								        '48' => __('48. out: rotate Fold Top | in: move from Bottom Fade', 'kerge'),
								        '49' => __('49. out: rotate Fold Bottom | in: move from Top Fade', 'kerge'),
								        '50' => __('50. out: move to Right Fade | in: rotate Unfold Left', 'kerge'),
								        '51' => __('51. out: move to Left Fade | in: rotate Unfold Right', 'kerge'),
								        '52' => __('52. out: move to Bottom Fade | in: rotate Unfold Top', 'kerge'),
								        '53' => __('53. out: move to Top Fade | in: rotate Unfold Bottom', 'kerge'),
								        '54' => __('54. out: rotate Room Left Out on top | in: rotate Room Left In', 'kerge'),
								        '55' => __('55. out: rotate Room Right Out on top | in: rotate Room Right In', 'kerge'),
								        '56' => __('56. out: rotate Room Top Out on top | in: rotate Room Top In', 'kerge'),
								        '57' => __('57. out: rotate Room Bottom Out on top | in: rotate Room Bottom In', 'kerge'),
								        '58' => __('58. out: rotate Cube Left Out on top | in: rotate Cube Left In', 'kerge'),
								        '59' => __('59. out: rotate Cube Right Out on top | in: rotate Cube Right In', 'kerge'),
								        '60' => __('60. out: rotate Cube Top Out on top | in: rotate Cube Top In', 'kerge'),
								        '61' => __('61. out: rotate Cube Bottom Out on top | in: rotate Cube Bottom In', 'kerge'),
								        '62' => __('62. out: rotate Carousel Left Out on top | in: rotate Carousel Left In', 'kerge'),
								        '63' => __('63. out: rotate Carousel Right Out on top | in: rotate Carousel Right In', 'kerge'),
								        '64' => __('64. out: rotate Carousel Top Out on top | in:  rotate Carousel Top In', 'kerge'),
								        '65' => __('65. out: rotate Carousel Bottom Out on top | in: rotate Carousel Bottom In', 'kerge'),
								        '66' => __('66. out: rotate Sides Out | in: rotate Sides In delay200', 'kerge'),
								        '67' => __('67. out: rotate Slide Out | in: rotate Slide In', 'kerge'),
								    ),
								    'no-validate' => false,
								)
							),
						),
						'show_borders' => false,
					),
					'arrows_nav'                    => array(
						'label'        => esc_html__( 'Display Arrow Navigation for Subpage Animations', 'kerge' ),
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
						'desc'         => false,
						'help'         => false,
					),
				)
			),
			'site_header_design' => array(
				'title'   => esc_html__( 'Site Header  Design and Design of the Main Menu', 'kerge' ),
				'type'    => 'box',
				'attr'    => array('class' => 'initialized'),
				'options' => array(
					'site_header_width' => array(
						'label' => esc_html__( 'Site Header Width', 'kerge' ),
			            'type' => 'short-text',
			            'value' => '22%',
			            'desc'  => esc_html__( 'Width of the site header. Example: 22% or 150px.', 'kerge' ),
					),
					'site_header_bg' => array(
						'label' => __( 'Site Header Background Color', 'kerge' ),
						'type'  => 'rgba-color-picker',
						'value' => 'rgba(255, 255, 255, 1)',
						'palettes' => array( '#ffffff', '#222222' ),
						'desc'  => __( 'Select the background color.', 'kerge' ),
					),
					'site_header_title_font' => array(
					    'type' => 'typography-v2',
					    'value' => array(
					        'family' => 'Oswald',
					        // For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
					        'style' => 'normal',
					        'weight' => 400,
					        'subset' => 'latin-ext',
					        'variation' => 'regular',
					        'size' => 30,
					        'line-height' => 1.1,
					        'letter-spacing' => 0,
					        'color' => '#222222'
					    ),
					    'components' => array(
					        'family'         => true,
					        // 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
					        'size'           => true,
					        'line-height'    => true,
					        'letter-spacing' => true
					    ),
					    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
					    'label' => esc_html__('Header Title Font', 'kerge'),
					    'desc'  => false,
					    'help'  => false,
					),
					'site_header_subtitle_font' => array(
					    'type' => 'typography-v2',
					    'value' => array(
					        'family' => 'Oswald',
					        // For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
					        'style' => 'normal',
					        'weight' => 300,
					        'subset' => 'latin-ext',
					        'variation' => 300,
					        'size' => 16,
					        'line-height' => 1.5,
					        'letter-spacing' => 0,
					        'color' => '#9c9c9c'
					    ),
					    'components' => array(
					        'family'         => true,
					        // 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
					        'size'           => true,
					        'line-height'    => true,
					        'letter-spacing' => true
					    ),
					    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
					    'label' => esc_html__('Header Subtitle Font', 'kerge'),
					    'desc'  => false,
					    'help'  => false,
					),
					'main_menu_font' => array(
					    'type' => 'typography-v2',
					    'value' => array(
					        'family' => 'Oswald',
					        // For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
					        'style' => 'normal',
					        'weight' => 400,
					        'subset' => 'latin-ext',
					        'variation' => 'regular',
					        'size' => 15,
					        'line-height' => 1.6,
					        'letter-spacing' => 0,
					        'color' => '#222222'
					    ),
					    'components' => array(
					        'family'         => true,
					        // 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
					        'size'           => true,
					        'line-height'    => true,
					        'letter-spacing' => true
					    ),
					    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
					    'label' => esc_html__('Main Menu Font', 'kerge'),
					    'desc'  => false,
					    'help'  => false,
					),
					'main_menu_borders_color' => array(
						'label' => __( 'Main Menu Borders Color', 'kerge' ),
						'type'  => 'color-picker',
						'value' => '#f5f5f5',
					    'palettes' => array( '#f5f5f5', '#333333' ),
						'desc'  => __( 'Main Menu Borders Color', 'kerge' ),
					),
					'main_menu_hover_bg' => array(
						'label' => __( 'Main Menu Hover Background Color', 'kerge' ),
						'type'  => 'color-picker',
						'value' => '#fcfcfc',
						'palettes' => array( '#fcfcfc', '#333333' ),
						'desc'  => __( 'Main Menu Active and Hover Background Color', 'kerge' ),
					)
				),
				
			),
			'page_titles' => array(
				'title'   => esc_html__( 'Page Titles', 'kerge' ),
				'type'    => 'box',
				'attr'    => array('class' => 'initialized'),
				'options' => array(
					'cp_title_style' => array(
					    'type'  => 'select',
					    'value' => 'second-style',
					    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
					    'label' => __('Page Titles Style', 'kerge'),
					    'choices' => array(
					        'first-style' => __('Style 1', 'kerge'),
					        'second-style' => __('Style 2', 'kerge'),
					    ),
					    'no-validate' => false,
					),
					'cp_title_general_bg_color' => array(
						'label' => __( 'Background Color', 'kerge' ),
						'type'  => 'color-picker',
						'value' => '#ffcd38',
						'palettes' => array( '#ffcd38', '#e65959', '#34c7a9', '#a878ff', '#f9966f', '#2fc0d1', '#c7243f', '#0099e5', '#f57c02', '#666666' ),
						'desc'  => __( 'Select the background color of the title.', 'kerge' ),
					),
					'cp_title_general_title_font' => array(
					    'type' => 'typography-v2',
					    'value' => array(
					        'family' => 'Oswald',
					        // For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
					        'style' => 'normal',
					        'weight' => 400,
					        'subset' => 'latin-ext',
					        'variation' => 'regular',
					        'size' => 27,
					        'line-height' => 40,
					        'letter-spacing' => 0,
					        'color' => '#222222'
					    ),
					    'components' => array(
					        'family'         => true,
					        // 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
					        'size'           => true,
					        'line-height'    => false,
					        'letter-spacing' => true
					    ),
					    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
					    'label' => esc_html__('Title Font', 'kerge'),
					    'desc'  => false,
					    'help'  => false,
					)
				)
			),
			'page_content_area' => array(
				'title'   => esc_html__( 'Background Color of the Area with the Content of the Page', 'kerge' ),
				'type'    => 'box',
				'attr'    => array('class' => 'initialized'),
				'options' => array(
					'cp_content_bg_color' => array(
						'label' => __( 'Background Color', 'kerge' ),
						'type'  => 'rgba-color-picker',
						'value' => 'rgba(255, 255, 255, 1)',
						'palettes' => array( '#ffffff', '#222222' ),
						'desc'  => __( 'Select the background color.', 'kerge' ),
					),
				)
			)
		)
	)
);