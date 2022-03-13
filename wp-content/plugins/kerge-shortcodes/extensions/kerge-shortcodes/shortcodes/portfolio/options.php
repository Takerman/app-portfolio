<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'id' => array( 'type' => 'unique' ),
	'layout' => array(
		'label'   => esc_html__('Layout', 'kerge-shortcodes'),
		'desc'    => esc_html__('Choose the layout type', 'kerge-shortcodes'),
		'type'    => 'select',
		'value'   => 'two-columns',
		'choices' => array(
			'two-columns'   => esc_html__('2 Columns', 'kerge-shortcodes'),
			'three-columns' => esc_html__('3 Columns', 'kerge-shortcodes'),
			'four-columns' => esc_html__('4 Columns', 'kerge-shortcodes'),
			'five-columns' => esc_html__('5 Columns', 'kerge-shortcodes'),
		)
	),
	'categories' => array(
	    'type'  => 'multi-select',
	    'value' => '',
	    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
	    'label' => __('Categories', 'kerge-shortcodes'),
	    'desc'  => __('Select the categories from which the projects will be displayed. If this field is empty, then projects will be displayed from all categories.', 'kerge-shortcodes'),
	    'population' => 'taxonomy',
	    'source' => 'fw-portfolio-category',
	)
);