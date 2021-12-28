<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'         => array(
		'label' => esc_html__( 'Title', 'kerge-shortcodes' ),
		'desc'  => esc_html__( 'Option Skills Title', 'kerge-shortcodes' ),
		'type'  => 'text',
	),
	'skills_style' => array(
		'label'   => esc_html__('Skills Style', 'kerge-shortcodes'),
		'desc'    => esc_html__('Choose the style', 'kerge-shortcodes'),
		'type'    => 'select',
		'value'   => 'skills-second-style',
		'choices' => array(
			'skills-first-style'   => esc_html__('1 Style', 'kerge-shortcodes'),
			'skills-second-style' => esc_html__('2 Style', 'kerge-shortcodes'),
		)
	),
	'skills' => array(
		'label'         => esc_html__( 'Skill', 'kerge-shortcodes' ),
		'popup-title'   => esc_html__( 'Add/Edit Skill', 'kerge-shortcodes' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your skill.', 'kerge-shortcodes' ),
		'type'          => 'addable-popup',
		'template'      => '{{=title}}',
		'popup-options' => array(
			'id'    => array(
				'type' => 'unique'
			),
			'title'       => array(
				'label' => esc_html__( 'Title', 'kerge-shortcodes' ),
				'desc'  => esc_html__( 'Enter the title', 'kerge-shortcodes' ),
				'type'  => 'text',
			),
			'value'       => array(
				'label' => esc_html__( 'Value', 'kerge-shortcodes' ),
				'desc'  => esc_html__( 'Enter the value (%)', 'kerge-shortcodes' ),
				'type'  => 'short-text',
			),
			'color' => array(
				'label' => esc_html__( 'Skill Color', 'kerge' ),
				'type'  => 'color-picker',
				'value' => '#ffcd38',
				'palettes' => array( '#ffcd38', '#e65959', '#34c7a9', '#a878ff', '#f9966f', '#2fc0d1' ),
				'desc'  => esc_html__( 'Select main color.', 'kerge' ),
			),
		)
	)
);