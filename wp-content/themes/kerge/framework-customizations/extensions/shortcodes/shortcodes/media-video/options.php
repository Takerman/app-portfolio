<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$options = array(
    'video' => array(
        'label' => esc_html__('Video', 'kerge'),
        'desc'  => esc_html__('Enter Youtube or Vimeo video URL.', 'kerge'),
        'type'  => 'text',
        'help'  => esc_html__('Link formats:
                               YouTube: https://www.youtube.com/embed/id. Example: https://www.youtube.com/embed/w5tWYmIOWGk
                               Vimeo: https://player.vimeo.com/video/id. Example: https://player.vimeo.com/video/97102654.','kerge')
    ),
    'format'   => array(
        'type'    => 'select',
        'label'   => esc_html__('Aspect Ratio', 'kerge'),
        'choices' => array(
            '16by9' => esc_html__('16:9', 'kerge'),
            '4by3' => esc_html__('4:3', 'kerge')
        ),
        'value'   => '16by9'
    ),
    'lazy_load'  => array(
        'label'        => esc_html__( 'YouTube and Vimeo video lazy loading', 'kerge' ),
        'type'         => 'switch',
        'right-choice' => array(
            'value' => 'on',
            'label' => esc_html__( 'On', 'kerge' )
        ),
        'left-choice'  => array(
            'value' => 'off',
            'label' => esc_html__( 'Off', 'kerge' )
        ),
        'value'        => 'on',
        'desc'         => false,
        'help'         => false,
    ),
    'class'  => array(
        'attr'  => array( 'class' => 'border-bottom-none'),
        'label'   => esc_html__( 'Custom Class', 'kerge' ),
        'desc'    => esc_html__( 'Enter custom CSS class', 'kerge' ),
        'type'    => 'text',
        'help' => esc_html__('You can use this class to further style this shortcode by adding your custom CSS.','kerge'),
        'value' => '',
    ),
);