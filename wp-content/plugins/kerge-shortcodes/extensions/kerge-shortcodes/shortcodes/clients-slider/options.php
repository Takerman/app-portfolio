<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'id' => array( 'type' => 'unique' ),
	'clients_slider' => array(
		'label'         => esc_html__( 'Clients', 'kerge-shortcodes' ),
		'popup-title'   => esc_html__( 'Add/Edit Client Item', 'kerge-shortcodes' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit Clients.', 'kerge-shortcodes' ),
		'type'          => 'addable-popup',
		'template'      => '{{=client_title}}',
		'popup-options' => array(
			'client_logo' => array(
				'label' => esc_html__( 'Logo', 'kerge-shortcodes' ),
				'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'kerge-shortcodes' ),
				'type'  => 'upload',
			),
			'client_title'      => array(
				'label' => esc_html__( 'Title', 'kerge-shortcodes' ),
				'desc'  => esc_html__( 'Link to the Clients website', 'kerge-shortcodes' ),
				'type'  => 'text'
			),
			'site_url'      => array(
				'label' => esc_html__( 'Website Link', 'kerge-shortcodes' ),
				'desc'  => esc_html__( 'Link to the Clients website', 'kerge-shortcodes' ),
				'type'  => 'text'
			),
			'target' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Open Website Link in New Tab', 'kerge-shortcodes' ),
				'desc'         => esc_html__( 'Select here if you want to open the linked page in a new window', 'kerge-shortcodes' ),
				'value'        => '_blank',
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
	),
	'items'         => array(
		'label' => esc_html__( 'Items on the front: Desktop', 'kerge-shortcodes' ),
		'desc'  => esc_html__( 'Example: 2', 'kerge-shortcodes' ),
		'type'  => 'text',
		'value' => '3'
	),
	'items_tablet'         => array(
		'label' => esc_html__( 'Items on the front: Tablet', 'kerge-shortcodes' ),
		'desc'  => esc_html__( 'Example: 2', 'kerge-shortcodes' ),
		'type'  => 'text',
		'value' => '2'
	),
	'items_mobile'         => array(
		'label' => esc_html__( 'Items on the front: Mobile', 'kerge-shortcodes' ),
		'desc'  => esc_html__( 'Example: 2', 'kerge-shortcodes' ),
		'type'  => 'text',
		'value' => '1'
	),
	'loop' => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Infinity Loop', 'kerge-shortcodes' ),
		'desc'         => esc_html__( 'Duplicate last and first items to get loop illusion.', 'kerge-shortcodes' ),
		'value'        => 'off',
		'right-choice' => array(
			'value' => 'on',
			'label' => esc_html__( 'On', 'kerge-shortcodes' ),
		),
		'left-choice'  => array(
			'value' => 'off',
			'label' => esc_html__( 'Off', 'kerge-shortcodes' ),
		),
	),
	'autoplay' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'autoplay_switcher' => array(
				'label'        => esc_html__( 'Autoplay', 'kerge-shortcodes' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'on',
					'label' => esc_html__( 'On', 'kerge-shortcodes' )
				),
				'left-choice'  => array(
					'value' => 'off',
					'label' => esc_html__( 'Off', 'kerge-shortcodes' )
				),
				'value'        => 'off',
			)
		),
		'choices'      => array(
			'on' => array(
				'autoplay_tablet' => array(
					'label'        => esc_html__( 'Autoplay only on Tablets and Mobiles', 'kerge-shortcodes' ),
					'type'         => 'switch',
					'right-choice' => array(
						'value' => 'on',
						'label' => esc_html__( 'On', 'kerge-shortcodes' )
					),
					'left-choice'  => array(
						'value' => 'off',
						'label' => esc_html__( 'Off', 'kerge-shortcodes' )
					),
					'value'        => 'off',
				),
				'autoplay_timeout'         => array(
					'label' => esc_html__( 'Autoplay Timeout', 'kerge-shortcodes' ),
					'desc'  => esc_html__( 'Example: 5000.', 'kerge-shortcodes' ),
					'type'  => 'text',
					'value' => '5000'
				),
				'smart_speed'         => array(
					'label' => esc_html__( 'Autoplay Smart Speed', 'kerge-shortcodes' ),
					'desc'  => esc_html__( 'Example: 1500.', 'kerge-shortcodes' ),
					'type'  => 'text',
					'value' => '1000'
				),
			),
		),
		'show_borders' => false,
	),
	'by_page' => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Slide by Page', 'kerge-shortcodes' ),
		'desc'         => esc_html__( 'Items will slide by page.', 'kerge-shortcodes' ),
		'value'        => '1',
		'right-choice' => array(
			'value' => 'page',
			'label' => esc_html__( 'On', 'kerge-shortcodes' ),
		),
		'left-choice'  => array(
			'value' => '1',
			'label' => esc_html__( 'Off', 'kerge-shortcodes' ),
		),
	),
);