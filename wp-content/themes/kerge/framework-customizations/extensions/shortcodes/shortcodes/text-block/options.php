<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'text' => array(
		'type'   => 'wp-editor',
		'label'  => __( 'Content', 'kerge' ),
		'desc'   => __( 'Enter some content for this texblock', 'kerge' )
	),
    'description'    => array(
        'label' => esc_html__( 'Short Description', 'kerge' ),
        'desc'  => esc_html__( 'Optional field. Add a brief description of the block.', 'kerge' ),
        'type'  => 'text',
        'value' => '',
    ),
);
