<?php if (!defined('FW')) die('Forbidden');

wp_enqueue_style(
    'fw-shortcode-team-member-customizations',
    fw_get_template_customizations_directory_uri(
        '/extensions/shortcodes/shortcodes/team-member/static/css/styles.css'
    )
);
