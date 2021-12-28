<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'id' => array( 'type' => 'unique' ),
	'layout' => array(
		'label'   => esc_html__('Layout', 'kerge-shortcodes'),
		'desc'    => esc_html__('Choose the layout type', 'kerge-shortcodes'),
		'type'    => 'select',
		'value'   => 'two-columns',
		'choices' => array(
			'one-column'   => esc_html__('1 Column', 'kerge-shortcodes'),
			'two-columns'   => esc_html__('2 Columns', 'kerge-shortcodes'),
			'three-columns' => esc_html__('3 Columns', 'kerge-shortcodes'),
		)
	),
	'number_of_posts' => array(
		'label'   => esc_html__('Number of posts to show', 'kerge-shortcodes'),
		'type'    => 'text',
		'value' => '8',
	),
	'featured_image' => array(
	    'type'  => 'switch',
	    'value' => 'off',
	    'label' => __('Show only posts with featured image', 'kerge-shortcodes'),
	    'left-choice' => array(
	        'value' => 'off',
	        'label' => __('Off', 'kerge-shortcodes'),
	    ),
	    'right-choice' => array(
	        'value' => 'on',
	        'label' => __('On', 'kerge-shortcodes'),
	    ),
	)
);