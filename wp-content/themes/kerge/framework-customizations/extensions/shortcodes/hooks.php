<?php if (!defined('FW')) die('Forbidden');

/** @internal */
function _filter_disable_shortcodes($to_disable)
{
	// disable the shortcodes you want like this
    $to_disable[] = 'notification';
    $to_disable[] = 'call_to_action';
    $to_disable[] = 'testimonials';
    $to_disable[] = 'slider';
    
    return $to_disable;
}
add_filter('fw_ext_shortcodes_disable_shortcodes', '_filter_disable_shortcodes');
