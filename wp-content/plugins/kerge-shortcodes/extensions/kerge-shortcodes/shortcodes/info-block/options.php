<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'id' => array( 'type' => 'unique' ),
	'icon'    => array(
		'type'  => 'icon-v2',
		'label' => esc_html__('Choose an Icon', 'kerge-shortcodes'),
	),
	'title'   => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title', 'kerge-shortcodes' ),
	),
	'content' => array(
		'type'  => 'textarea',
		'label' => esc_html__( 'Highlighted Content', 'kerge-shortcodes' ),
	),
	'text' => array(
		'type'  => 'textarea',
		'label' => esc_html__( 'Text', 'kerge-shortcodes' ),
	),
	'style'   => array(
		'type'    => 'select',
		'label'   => esc_html__('Box Style', 'kerge-shortcodes'),
		'choices' => array(
			'gray-default' => esc_html__('Default Background', 'kerge-shortcodes'),
			'gray-bg' => esc_html__('Gray Background', 'kerge-shortcodes')
		)
	),
	'icon_color' => array(    
		'type'  => 'color-picker',
	    'value' => '#b5b5b5',
	    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
	    'palettes' => array( '#b5b5b5', '#ffcd38', '#e65959', '#34c7a9', '#a878ff', '#f9966f', '#2fc0d1' ),
	    'label' => __('Icon Color', 'kerge-shortcodes')
	)
);