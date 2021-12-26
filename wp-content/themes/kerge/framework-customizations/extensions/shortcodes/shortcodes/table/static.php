<?php if (!defined('FW')) die('Forbidden');

/** @var FW_Extension_Shortcodes $shortcodes */
$shortcodes = fw_ext('shortcodes');
/** @var FW_Shortcode_Table $table */
$table = $shortcodes->get_shortcode('table');

if ($button = $table->get_button_shortcode()) {
	$button->_enqueue_static();
}
