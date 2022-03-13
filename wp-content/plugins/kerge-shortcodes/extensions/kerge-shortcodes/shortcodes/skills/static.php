<?php if (!defined('FW')) die('Forbidden');

wp_enqueue_script(
    'kerge-theme-shortcode-skills',
    plugin_dir_url( __FILE__ ) . 'static/js/scripts.js'
);
