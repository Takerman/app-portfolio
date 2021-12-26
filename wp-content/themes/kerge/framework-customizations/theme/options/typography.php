<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'typography_customization' => array(
		'title'   => esc_html__( 'Typography', 'kerge' ),
		'type'    => 'tab',
		'options' => array(
			'typography_options' => array(
				'title'   => esc_html__( 'Typography', 'kerge' ),
				'type'    => 'box',
				'options' => array(
					'body_typography' => array(
					    'type' => 'typography-v2',
					    'value' => array(
					        'family' => 'PT Sans',
					        // For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
					        'style' => 'normal',
					        'weight' => 400,
					        'subset' => 'latin-ext',
					        'variation' => 'regular',
					        'size' => 14,
					        'line-height' => 1.75,
					        'letter-spacing' => 0,
					        'color' => '#666666'
					    ),
					    'components' => array(
					        'family'         => true,
					        // 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
					        'line-height'    => true,
					        'letter-spacing' => false
					    ),
					    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
					    'label' => esc_html__('Body Text', 'kerge'),
					    'desc'  => false,
					    'help'  => false,
					),
					'headings' => array(
					    'type' => 'typography-v2',
					    'value' => array(
					        'family' => 'Oswald',
					        // For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
					        'style' => 'normal',
					        'weight' => 400,
					        'subset' => 'latin-ext',
					        'variation' => 'regular',
					        'size' => 33,
					        'line-height' => 33,
					        'letter-spacing' => 0,
					        'color' => '#222222'
					    ),
					    'components' => array(
					        'family'         => true,
					        // 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
					        'size'           => false,
					        'line-height'    => false,
					        'letter-spacing' => false
					    ),
					    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
					    'label' => esc_html__('Headings Font', 'kerge'),
					    'desc'  => false,
					    'help'  => false,
					),
					'h1'                => array(
						'label' => esc_html__( 'H1 Size', 'kerge' ),
						'type'  => 'typography',
						'value' => array(
							'size' => 32,
							'style'  => '400',
						),
						'components' => array(
					        'family' => false,
					        'size'   => true,
					        'style'  => true,
					        'color'  => false
					    ),
						'desc'  => esc_html__( 'H1 heading size',
							'kerge' ),
					),
					'h2'                => array(
						'label' => esc_html__( 'H2 Size', 'kerge' ),
						'type'  => 'typography',
						'value' => array(
							'size' => 24,
							'style'  => '400',
						),
						'components' => array(
					        'family' => false,
					        'size'   => true,
					        'style'  => true,
					        'color'  => false
					    ),
						'desc'  => esc_html__( 'H2 heading size',
							'kerge' ),
					),
					'h3'                => array(
						'label' => esc_html__( 'H3 Size', 'kerge' ),
						'type'  => 'typography',
						'value' => array(
							'size' => 18,
							'style'  => '400',
						),
						'components' => array(
					        'family' => false,
					        'size'   => true,
					        'style'  => true,
					        'color'  => false
					    ),
						'desc'  => esc_html__( 'H1 heading size',
							'kerge' ),
					),
					'h4'                => array(
						'label' => esc_html__( 'H4 Size', 'kerge' ),
						'type'  => 'typography',
						'value' => array(
							'size' => 16,
							'style'  => '400',
						),
						'components' => array(
					        'family' => false,
					        'size'   => true,
					        'style'  => true,
					        'color'  => false
					    ),
						'desc'  => esc_html__( 'H4 heading size',
							'kerge' ),
					),
					'h5'                => array(
						'label' => esc_html__( 'H5 Size', 'kerge' ),
						'type'  => 'typography',
						'value' => array(
							'size' => 14,
							'style'  => '400',
						),
						'components' => array(
					        'family' => false,
					        'size'   => true,
					        'style'  => true,
					        'color'  => false
					    ),
						'desc'  => esc_html__( 'H5 heading size',
							'kerge' ),
					),
					'h6'                => array(
						'label' => esc_html__( 'H6 Size', 'kerge' ),
						'type'  => 'typography',
						'value' => array(
							'size' => 12,
							'style'  => '400',
						),
						'components' => array(
					        'family' => false,
					        'size'   => true,
					        'style'  => true,
					        'color'  => false
					    ),
						'desc'  => esc_html__( 'H6 heading size',
							'kerge' ),
					),

				)
			),
		)
	)
);