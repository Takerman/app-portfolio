<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'tabs' => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Tabs', 'kerge' ),
		'popup-title'   => esc_html__( 'Add/Edit Tab', 'kerge' ),
		'desc'          => esc_html__( 'Create your tabs', 'kerge' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title' => array(
				'type'  => 'text',
				'label' => esc_html__('Title', 'kerge' )
			),
			'tab_content' => array(
				'type'  => 'wp-editor',
				'size' => 'small',
				'label' => esc_html__('Content', 'kerge' )
			)
		),
	)
);