<?php

/*******************dropdown button******************/
class WPBakeryShortCode_Dropbuttongroup extends WPBakeryShortCodesContainer{

}
/*******************************************/
class WPBakeryShortCode_Dropbutton extends WPBakeryShortCode {
	
}

/**********************************************************/
vc_map( array(
	"name" => __("Sility Dropdown button", "Sility"),
	"show_settings_on_create" => true,
	'is_container' => true,
	"content_element" => true,
	"as_parent" => array('only' => 'dropbutton'),
	"base" => "dropbuttongroup",
	"class" => "",
	"icon" => "icon-wpb-my_dropdown",
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
		"holder"=>"div",
		  "class" => "",
		  "heading" => __("Title", "Sility"),
		  "param_name" => "title"
		 ),
		array(
         "type" => "dropdown",
         
         "class" => "",
         "heading" => __("Type", "Sility"),
         "param_name" => "type",
         "value"=>array("Default"=>"", "Split"=>"split")
      ),
	   array(
         "type" => "dropdown",
         "class" => "",
         "heading" => __("Color", "Sility"),
         "param_name" => "color",
         "value" => array("Purple"=>"purple", "White"=>"white",  "Dark"=>"dark", "Primary"=>"btn-primary", "Info"=>"btn-info", "Success"=>"btn-success","Warning"=>"btn-warning", "Danger"=>"btn-danger")
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
	'name' => __( 'Dropdown Item', 'Sility' ),
	'base' => 'dropbutton',
	"icon" => "icon-wpb-ui-accordion",
	"as_child" => array('only' => 'dropbuttongroup'),
	'content_element' => true,
	'params' => array(
		array(
		 "type" => "textfield",
		"holder"=>"div",
		  "class" => "",
		  "heading" => __("Title", "Sility"),
		  "param_name" => "title"
		 ),
		array(
		 "type" => "textfield",
		  "class" => "",
		  "heading" => __("Url", "Sility"),
		  "param_name" => "url"
			),
		array(
         "type" => "dropdown",
         "class" => "",
         "heading" => __("Insert Divider", "Sility"),
         "param_name" => "divider",
         "value"=>array("No"=>"0", "Yes"=>"1")
      ),
		)
	))
?>