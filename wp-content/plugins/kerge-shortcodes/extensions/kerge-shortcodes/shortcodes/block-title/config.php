<?php if (!defined('FW')) die('Forbidden');

$cfg = array(
	'page_builder' => array(
		'title'       => esc_html__( 'Block Title', 'kerge-shortcodes' ),
		'description' => esc_html__( 'Block title', 'kerge-shortcodes' ),
		'tab'         => esc_html__( 'Kerge Elements', 'kerge-shortcodes' ),
        'title_template' => '{{- title }}: {{- o.description }}',
	)
);