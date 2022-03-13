<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( function_exists( 'kerge_tracking_wp_head' ) ) {
	$options = array(
		'seo' => array(
			'title'   => esc_html__( 'SEO', 'kerge' ),
			'type'    => 'tab',
			'options' => array(
				'tracking_code' => array(
					'title'   => esc_html__( 'SEO', 'kerge' ),
					'type'    => 'box',
					'options' => array(
						'head_tracking_code'	=> array(
							'label' => esc_html__( 'Tracking Code (head)', 'kerge' ),
							'desc'  => esc_html__( 'Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing head tag.', 'kerge' ),
							'type'  => 'textarea',
							'value' => '',
						),
						'body_tracking_code'	=> array(
							'label' => esc_html__( 'Tracking Code (body)', 'kerge' ),
							'desc'  => esc_html__( 'Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing body tag.', 'kerge' ),
							'type'  => 'textarea',
							'value' => '',
						),
					)
				),
			)
		)
	);
}
