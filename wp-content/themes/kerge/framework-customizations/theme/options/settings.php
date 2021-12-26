<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Framework options
 *
 * @var array $options Fill this array with options to generate framework settings form in backend
 */

$options = array(
	fw()->theme->get_options( 'general-settings' ),
    fw()->theme->get_options( 'start-page' ),
    fw()->theme->get_options( 'theme-styling' ),
    fw()->theme->get_options( 'typography' ),
    fw()->theme->get_options( 'contact-form' ),
    fw()->theme->get_options( 'custom-css' ),
    fw()->theme->get_options( 'seo' ),
    fw()->theme->get_options( 'portfolio' ),
    fw()->theme->get_options( 'advanced' ),
);
