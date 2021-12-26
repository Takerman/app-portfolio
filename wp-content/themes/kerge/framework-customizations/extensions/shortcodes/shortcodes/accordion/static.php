<?php if (!defined('FW')) die('Forbidden');

$shortcodes_extension = fw_ext('shortcodes');
wp_enqueue_script(
	'fw-shortcode-accordion',
    fw_get_template_customizations_directory_uri(
        '/extensions/shortcodes/shortcodes/accordion/static/js/scripts.js'
    ),
	array('jquery-ui-accordion'),
	false,
	true
);
wp_enqueue_style(
	'fw-shortcode-accordion-customizations',
    fw_get_template_customizations_directory_uri(
        '/extensions/shortcodes/shortcodes/accordion/static/css/styles.css'
    )
);

$theme_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('theme_style_picker') :  'light';

if ($theme_style == 'dark'){
    wp_enqueue_style(
        'fw-shortcode-accordion-customizations-dark',
        fw_get_template_customizations_directory_uri(
            '/extensions/shortcodes/shortcodes/accordion/static/css/dark-styles.css'
        )
    );
}

