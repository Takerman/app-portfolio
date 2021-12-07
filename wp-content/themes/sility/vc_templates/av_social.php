<?php
class WPBakeryShortCode_Social extends WPBakeryShortCodesContainer{

}
/*******************************************/
class WPBakeryShortCode_Soc_Button extends WPBakeryShortCode {

}
/**********************************************************/
vc_map( array(
	"name" => __("Sility Social Icons", "Sility"),
	"show_settings_on_create" => true,
	'is_container' => true,
	"content_element" => true,
	"as_parent" => array('only' => 'soc_button'),
	"base" => "social",
	"class" => "",
	"icon" => "icon-wpb-my_social",
	'admin_enqueue_css' => array(get_template_directory_uri() . '/vc_templates/shortcodes.css'),
	"category" => __('Content', "Sility"),
	"params" => array(
		array(
         "type" => "dropdown",
         "class" => "",
         "heading" => __("Animation", "Sility"),
         "param_name" => "anim",
         "value" => array( "None"=>"", "bounce"=>"bounce", "flash"=>"flash", "pulse"=>"pulse", "shake"=>"shake", "swing"=>"swing", "tada"=>"tada", "wobble"=>"wobble", "bounceIn"=>"bounceIn", "bounceInDown"=>"bounceInDown", "bounceInLeft"=>"bounceInLeft", "bounceInRight"=>"bounceInRight", "bounceInUp"=>"bounceInUp", "bounceOut"=>"bounceOut", "bounceOutDown"=>"bounceOutDown", "bounceOutLeft"=>"bounceOutLeft", "bounceOutRight"=>"bounceOutRight", "bounceOutUp"=>"bounceOutUp", "fadeIn"=>"fadeIn", "fadeInDown"=>"fadeInDown", "fadeInDownBig"=>"fadeInDownBig", "fadeInLeft"=>"fadeInLeft", "fadeInLeftBig"=>"fadeInLeftBig", "fadeInRight"=>"fadeInRight", "fadeInRightBig"=>"fadeInRightBig", "fadeInUp"=>"fadeInUp", "fadeInUpBig"=>"fadeInUpBig", "fadeOut"=>"fadeOut", "fadeOutDown"=>"fadeOutDown", "fadeOutDownBig"=>"fadeOutDownBig", "fadeOutLeft"=>"fadeOutLeft", "fadeOutLeftBig"=>"fadeOutLeftBig", "fadeOutRight"=>"fadeOutRight", "fadeOutRightBig"=>"fadeOutRightBig", "fadeOutUp"=>"fadeOutUp", "fadeOutUpBig"=>"fadeOutUpBig", "flip"=>"flip", "flipInX"=>"flipInX", "flipInY"=>"flipInY", "flipOutX"=>"flipOutX", "flipOutY"=>"flipOutY", "lightSpeedIn"=>"lightSpeedIn", "lightSpeedOut"=>"lightSpeedOut", "rotateIn"=>"rotateIn", "rotateInDownLeft"=>"rotateInDownLeft", "rotateInDownRight"=>"rotateInDownRight", "rotateInUpLeft"=>"rotateInUpLeft", "rotateInUpRight"=>"rotateInUpRight", "rotateOut"=>"rotateOut", "rotateOutDownLeft"=>"rotateOutDownLeft", "rotateOutDownRight"=>"rotateOutDownRight", "rotateOutUpLeft"=>"rotateOutUpLeft", "rotateOutUpRight"=>"rotateOutUpRight",  "hinge"=>"hinge", "rollIn"=>"rollIn", "rollOut"=>"rollOut", "zoomIn"=>"zoomIn","zoomInDown"=>"zoomInDown", "zoomInLeft"=>"zoomInLeft","zoomInRight"=>"zoomInRight","zoomInUp"=>"zoomInUp","zoomOut"=>"zoomOut", "zoomOutLeft"=>"zoomOutLeft", "zoomOutRight"=>"zoomOutRight","zoomOutUp"=>"zoomOutUp"),
         "description" => __(" Animation.", "Sility")
      ),
       
        array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Extra class", "Sility"),
         "param_name" => "class"
      ),
   ),
	"js_view" => 'VcColumnView'
) );
/**********************************************************/
vc_map( array(
	'name' => __( 'Social icon', 'Sility' ),
	'base' => 'soc_button',
	"icon" => "icon-wpb-ui-accordion",
	"as_child" => array('only' => 'social'),
	'content_element' => true,
	'params' => array(
		array(
		 "type" => "dropdown",
		 "holder"=>'div',	
		  "class" => "",
		  "heading" => __("Icon", "Sility"),
		  "param_name" => "icon",
		  "value"=>array("Bitbucket"=>"bitbucket", "Dribble"=>"dribbble", "Facebook"=>"facebook", "Flickr"=>"flickr", "Github"=>"github", "Google+"=>"google-plus", "Instagram"=>"instagram", "Linkedin"=>"linkedin", "Pinterest"=>"pinterest", "Skype"=>"skype", "Stackexchange"=>"stack-exchange", "Tumblr"=>"tumblr", "Twitter"=>"twitter", "Vkontakte"=>"vk", "Youtube"=>"youtube" )
		 ),
		array(
		 "type" => "textfield",
		  "class" => "",
		  "heading" => __("Link to", "Sility"),
		  "param_name" => "link"
		 )		
		)
	))
?>