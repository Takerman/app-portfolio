<?php if (!defined('FW')) die('Forbidden');

wp_enqueue_style(
    'fw-shortcode-tabs-customizations',
    fw_get_template_customizations_directory_uri(
        '/extensions/shortcodes/shortcodes/tabs/static/css/styles.css'
    )
);
wp_enqueue_script(
	'fw-shortcode-tabs-customizations',
    fw_get_template_customizations_directory_uri(
        '/extensions/shortcodes/shortcodes/tabs/static/js/scripts.js'
    ),
	array('jquery-ui-tabs'),
	false,
	true
);

$theme_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('theme_style_picker') :  'light';

if ($theme_style == 'dark'){
    wp_enqueue_style(
        'fw-shortcode-tabs-customizations-dark',
        fw_get_template_customizations_directory_uri(
            '/extensions/shortcodes/shortcodes/tabs/static/css/dark-styles.css'
        )
    );
}

