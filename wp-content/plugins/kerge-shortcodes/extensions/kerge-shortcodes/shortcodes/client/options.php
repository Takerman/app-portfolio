<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'image'            => array(
		'type'  => 'upload',
		'label' => esc_html__( 'Choose Logo Image', 'kerge-shortcodes' ),
		'desc'  => esc_html__( 'Either upload a new, or choose an existing logo image from your media library', 'kerge-shortcodes' )
	),
	'size'             => array(
		'type'    => 'group',
		'options' => array(
			'width'  => array(
				'type'  => 'text',
				'label' => esc_html__( 'Width', 'kerge-shortcodes' ),
				'desc'  => esc_html__( 'Set image width', 'kerge-shortcodes' ),
				'value' => 80
			),
			'height' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Height', 'kerge-shortcodes' ),
				'desc'  => esc_html__( 'Set image height', 'kerge-shortcodes' ),
				'value' => 80
			)
		)
	),
	'image-link-group' => array(
		'type'    => 'group',
		'options' => array(
			'link'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Logo Image Link', 'kerge-shortcodes' ),
				'desc'  => esc_html__( 'Where should your logo image link to?', 'kerge-shortcodes' )
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

