<?php if (!defined('FW')) die('Forbidden');

$options = array(
    'block_id' => array(
        'label'   => esc_html__('ID', 'kerge-shortcodes'),
        'desc'    => esc_html__('Optional field. You can add an ID for this block, for example for the Scroll to ID functionality. There should be no spaces in this field. Example ID: test_id.', 'kerge-shortcodes'),
        'type'    => 'text',
    ),
	'title' => array(
		'label'   => esc_html__('Title', 'kerge-shortcodes'),
		'desc'    => esc_html__('Write some text', 'kerge-shortcodes'),
		'type'    => 'text',
	),
    'color_title_part' => array(
        'label'   => esc_html__('Color Part of Title', 'kerge-shortcodes'),
        'desc'    => esc_html__('Write some text', 'kerge-shortcodes'),
        'type'    => 'text',
    ),
    'description'    => array(
        'label' => esc_html__( 'Short Description', 'kerge' ),
        'desc'  => esc_html__( 'Optional field. Add a brief description of the block.', 'kerge' ),
        'type'  => 'text',
        'value' => '',
    ),
);