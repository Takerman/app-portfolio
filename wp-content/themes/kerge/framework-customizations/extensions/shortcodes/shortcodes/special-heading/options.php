<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'    => array(
		'type'  => 'text',
		'label' => __( 'Heading Title', 'kerge' ),
		'desc'  => __( 'Write the heading title content', 'kerge' ),
	),
	'subtitle' => array(
		'type'  => 'text',
		'label' => __( 'Heading Subtitle', 'kerge' ),
		'desc'  => __( 'Write the heading subtitle content', 'kerge' ),
	),
	'heading' => array(
		'type'    => 'select',
		'label'   => __('Heading Size', 'kerge'),
		'choices' => array(
			'h1' => 'H1',
			'h2' => 'H2',
			'h3' => 'H3',
			'h4' => 'H4',
			'h5' => 'H5',
			'h6' => 'H6',
		)
	),
	'centered' => array(
		'type'    => 'switch',
		'label'   => __('Centered', 'kerge'),
	),
	'description'    => array(
        'label' => esc_html__( 'Short Description', 'kerge' ),
        'desc'  => esc_html__( 'Optional field. Add a brief description of the block.', 'kerge' ),
        'type'  => 'text',
        'value' => '',
    ),
);
