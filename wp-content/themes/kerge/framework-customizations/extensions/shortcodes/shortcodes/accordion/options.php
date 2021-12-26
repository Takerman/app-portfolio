<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'tabs' => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Tabs', 'kerge' ),
		'popup-title'   => esc_html__( 'Add/Edit Tabs', 'kerge' ),
		'desc'          => esc_html__( 'Create your tabs', 'kerge' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title'   => array(
				'type'  => 'text',
				'label' => esc_html__('Title', 'kerge')
			),
			'tab_content' => array(
				'type'  => 'wp-editor',
				'size' => 'small',
				'label' => esc_html__('Content', 'kerge')
			)
		)
	),
	'all_collapsed'     => array(
		'label'        => esc_html__( 'All items collapsed', 'kerge' ),
		'type'         => 'switch',
		'right-choice' => array(
			'value'    => 'true',
			'label'    => esc_html__( 'Yes', 'kerge' )
		),
		'left-choice'  => array(
			'value'    => 'false',
			'label'    => esc_html__( 'No', 'kerge' )
		),
		'value'        => 'false',
		'desc'         => esc_html__( 'Display all items collapsed.', 'kerge' ),
		'help'         => false,
	),
);