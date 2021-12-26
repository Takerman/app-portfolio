<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( function_exists( 'kerge_tracking_wp_head' ) ) {
	$options = array(
		'custom_css_js' => array(
			'title'   => esc_html__( 'Custom CSS and JS', 'kerge' ),
			'type'    => 'tab',
			'options' => array(
				'custom_css_js_fields' => array(
					'title'   => esc_html__( 'Custom CSS and JS', 'kerge' ),
					'type'    => 'box',
					'options' => array(
						'custom_styles'	=> array(
							'label' => esc_html__( 'Custom CSS', 'kerge' ),
							'desc'  => esc_html__( 'Add your custom CSS styles.', 'kerge' ),
							'type'  => 'textarea',
							'value' => '',
						),
						'external_styles'	=> array(
							'label' => esc_html__( 'External CSS', 'kerge' ),
							'desc'  => esc_html__( 'Add your custom external (.css) file. Example: &lt;link rel="stylesheet" type="text/css" href="yourstyle.css"&gt;', 'kerge' ),
							'type'  => 'textarea',
							'value' => '',
						),
						'external_js'	=> array(
							'label' => esc_html__( 'External JS', 'kerge' ),
							'desc'  => esc_html__( 'Add your custom external (.js) file. Example: &lt;script src="yourscript.js"&gt;&lt;/script&gt;', 'kerge' ),
							'type'  => 'textarea',
							'value' => '',
						),
					)
				)
			)
		)
	);
}
