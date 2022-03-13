<?php 
/**
 * General options of the slider.
 *
 * @package themeplaza_slider
 * @subpackage options
 * @version 1.0.0
 * @since 1.0.0
 * @author Grig <grigpage@gmail.com>
 * @copyright Copyright (c) 2015, Themeplaza
 */

	global $post;
?>

<?php 

weblusive_post_options(				
array(	"name" => "Animation Loop",
	"id" => "_weblusive_slider_loop",
	"type" => "select",
	"options" => array(
		'true'=> 'Yes',
		'false'=> 'No',
	)));
weblusive_post_options(				
array(	"name" => "Autoplay",
	"id" => "_weblusive_slider_autoplay",
	"type" => "select",
	"options" => array(
		'true'=> 'Yes',
		'false'=> 'No',
	)));
weblusive_post_options(				
array(	"name" => "Interval",
	"id" => "_weblusive_slider_interval",
	"type" => "select",
	"options" => array(
		'1000'  => '1000',
		'2000' => '2000',
		'3000' => '3000',
		'4000' => '4000',
		'5000' => '5000',
		'6000' => '6000',
		'7000' => '7000',
		'8000' => '8000',
		'9000' => '9000',
		'10000' => '10000',
	)));

?>

<?php 
	/* Don't forget to save the slider's option by adding 
	it's ID into the array ThemeplazaSliderAdmin::$fields */
	array_push( ThemeplazaSliderAdmin::$fields, "_weblusive_slider_loop", "_weblusive_slider_autoplay", "_weblusive_slider_interval");
		
?>