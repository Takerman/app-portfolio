<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'         => array(
		'label' => esc_html__( 'Title', 'kerge-shortcodes' ),
		'desc'  => esc_html__( 'Option Timeline Title', 'kerge-shortcodes' ),
		'type'  => 'text',
	),
	'timeline_style' => array(
		'label'   => esc_html__('Timeline Style', 'kerge-shortcodes'),
		'desc'    => esc_html__('Choose the style', 'kerge-shortcodes'),
		'type'    => 'select',
		'value'   => 'timeline-second-style',
		'choices' => array(
			'timeline-first-style'   => esc_html__('1 Style', 'kerge-shortcodes'),
			'timeline-second-style' => esc_html__('2 Style', 'kerge-shortcodes'),
		)
	),
	'timeline' => array(
		'label'         => esc_html__( 'Timeline', 'kerge-shortcodes' ),
		'popup-title'   => esc_html__( 'Add/Edit Timeline', 'kerge-shortcodes' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit timeline.', 'kerge-shortcodes' ),
		'type'          => 'addable-popup',
		'template'      => '{{=period}}',
		'popup-options' => array(
			'id' => array( 'type' => 'unique' ),
			'period'       => array(
				'label' => esc_html__( 'Period', 'kerge-shortcodes' ),
				'desc'  => esc_html__( 'Enter the period', 'kerge-shortcodes' ),
				'type'  => 'text',
			),
			'title'       => array(
				'label' => esc_html__( 'Title', 'kerge-shortcodes' ),
				'desc'  => esc_html__( 'Enter the title', 'kerge-shortcodes' ),
				'type'  => 'text',
			),
			'subtitle'       => array(
				'label' => esc_html__( 'Company', 'kerge-shortcodes' ),
				'desc'  => esc_html__( 'Enter the company name', 'kerge-shortcodes' ),
				'type'  => 'text',
			),
			'text'       => array(
				'label' => esc_html__( 'Text', 'kerge-shortcodes' ),
				'desc'  => esc_html__( 'Enter the some text', 'kerge-shortcodes' ),
				'type'  => 'wp-editor',
				'size' => 'small',
			),
			'logo'	=> array(
				'label' => esc_html__( 'Logo', 'kerge-shortcodes' ),
				'desc'  => esc_html__( 'Upload a logo image.', 'kerge' ),
				'type'  => 'upload'
			),
			'period_color' => array(    
				'type'  => 'color-picker',
			    'value' => '#9bd952',
			    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
			    'palettes' => array( '#9bd952', '#ffcd38', '#e65959', '#34c7a9', '#a878ff', '#f9966f', '#2fc0d1' ),
			    'label' => __('Period BG Color', 'kerge-shortcodes'),
			    'desc' => __('This setting applies only to the first style', 'kerge-shortcodes'),
			)
		)
	)
);