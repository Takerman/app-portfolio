<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'         => array(
		'label' => esc_html__( 'Title', 'kerge-shortcodes' ),
		'desc'  => esc_html__( 'Option Social Title', 'kerge-shortcodes' ),
		'type'  => 'text',
	),
	'social' => array(
		'label'         => esc_html__( 'Social Icons', 'kerge-shortcodes' ),
		'popup-title'   => esc_html__( 'Add/Edit Social Icons', 'kerge-shortcodes' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Social Icons.', 'kerge-shortcodes' ),
		'type'          => 'addable-popup',
		'template'      => '{{=title}}',
		'popup-options' => array(
			'icon'    => array(
				'type'  => 'icon-v2',
				'label' => esc_html__('Choose an Icon', 'kerge-shortcodes'),
			),
			'title'       => array(
				'label' => esc_html__( 'Title', 'kerge-shortcodes' ),
				'desc'  => esc_html__( 'Enter the title', 'kerge-shortcodes' ),
				'type'  => 'text',
			),
			'link'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Link', 'kerge-shortcodes' ),
				'desc'  => esc_html__( 'Where should your link to?', 'kerge-shortcodes' )
			),
			'target' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Open Link in New Window', 'kerge-shortcodes' ),
				'desc'         => esc_html__( 'Select here if you want to open the linked page in a new window', 'kerge-shortcodes' ),
				'right-choice' => array(
					'value' => '_blank',
					'label' => esc_html__( 'Yes', 'kerge-shortcodes' ),
				),
				'left-choice'  => array(
					'value' => '_self',
					'label' => esc_html__( 'No', 'kerge-shortcodes' ),
				),
			),
		)
	)
);