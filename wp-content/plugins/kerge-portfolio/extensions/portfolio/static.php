<?php if (!defined('FW')) die('Forbidden');

$load_more_feature = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('portfolio_load_more/portfolio_load_more_switcher') : 'off';

if ($load_more_feature == 'on') {
    wp_enqueue_script(
        'kerge-theme-portfolio-load-more',
        plugin_dir_url( __FILE__ ) . 'static/js/kerge-portfolio-load-more.js',
        '',
        '',
        true
    );
}
