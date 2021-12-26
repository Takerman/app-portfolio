<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => __( 'Text Block', 'kerge' ),
	'description' => __( 'Add a Text Block', 'kerge' ),
	'tab'         => __( 'Content Elements', 'kerge' ),
    'title_template' => '{{- title }}: {{- o.description }}',
);
