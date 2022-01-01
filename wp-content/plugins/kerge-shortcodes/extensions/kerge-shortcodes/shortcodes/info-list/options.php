<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'         => array(
		'label' => esc_html__( 'Title', 'kerge-shortcodes' ),
		'desc'  => esc_html__( 'Option Info List Title', 'kerge-shortcodes' ),
		'type'  => 'text',
	),
	'infolist' => array(
		'label'         => esc_html__( 'Info List', 'kerge-shortcodes' ),
		'popup-title'   => esc_html__( 'Add/Edit Info List Item', 'kerge-shortcodes' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Info List.', 'kerge-shortcodes' ),
		'type'          => 'addable-popup',
		'template'      => '{{=title}}',
		'popup-options' => array(
			'title'       => array(
				'label' => esc_html__( 'Title', 'kerge-shortcodes' ),
				'desc'  => esc_html__( 'Enter the title', 'kerge-shortcodes' ),
				'type'  => 'text',
			),
			'text'       => array(
				'label' => esc_html__( 'Text', 'kerge-shortcodes' ),
				'desc'  => esc_html__( 'Enter the some text', 'kerge-shortcodes' ),
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