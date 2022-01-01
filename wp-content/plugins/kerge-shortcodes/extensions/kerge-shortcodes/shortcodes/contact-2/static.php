<?php if (!defined('FW')) die('Forbidden');

$recaptcha = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('recaptcha/recaptcha_switcher') :  'on';
if( $recaptcha = 'on' ){
    wp_enqueue_script('js-recaptcha', 'https://www.google.com/recaptcha/api.js',array(),'2.0',true);
}
