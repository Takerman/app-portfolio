<?php if (!defined('FW')) die('Forbidden');

wp_enqueue_script(
    'kerge-shortcode-clients-slider',
    plugin_dir_url( __FILE__ ) . 'static/js/scripts.js'
);
