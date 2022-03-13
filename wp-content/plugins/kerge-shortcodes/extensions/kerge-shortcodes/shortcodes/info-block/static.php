<?php if (!defined('FW')) die('Forbidden');

wp_enqueue_style(
    'fw-shortcode-info-block',
    plugin_dir_url( __FILE__ ) . 'static/css/styles.css'
);

wp_enqueue_script(
    'kerge-theme-shortcode-info-block',
    plugin_dir_url( __FILE__ ) . 'static/js/scripts.js'
);

