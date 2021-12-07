<?php

/********************* GOOGLE MAP **********************/

/***********************************/
vc_map( array(
   "name" => __("Sility Google Map", "Sility"),
   "base" => "map",
   "class" => "",
   "icon" => "icon-wpb-map-pin",
   'admin_enqueue_css' => array(get_template_directory_uri().'/vc_templates/shortcodes.css'),
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
         "heading" => __("Latitude", "Sility"),
         "param_name" => "lat"
      ),
	   array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Longitude", "Sility"),
         "param_name" => "lon"
      ),
	   array(
         "type" => "textfield",
		 "holder"=>'div',
         "class" => "",
         "heading" => __("Address", "Sility"),
         "param_name" => "address"
      ),
	   array(
		 "type" => "dropdown",	
		  "class" => "",
		  "heading" => __("Zoom", "Sility"),
		  "param_name" => "z",
		  "value"=>array("1"=>"1", "2"=>"2", "3"=>"3", "4"=>"4", "5"=>"5", "6"=>"6", "7"=>"7", "8"=>"8", "9"=>"9", "10"=>"10", "11"=>"11", "12"=>"12", "13"=>"13", "14"=>"14", "15"=>"15", "16"=>"16", "17"=>"17", "18"=>"18", "19"=>"19", "20"=>"20")
		 ),
	    array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Width(in pixels)", "Sility"),
         "param_name" => "w"
      ),
	   array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Height(in pixels)", "Sility"),
         "param_name" => "h"
      ),
	    array(
		 "type" => "dropdown",	
		  "class" => "",
		  "heading" => __("Map Type", "Sility"),
		  "param_name" => "maptype",
		  "value"=>array("Road"=>"ROADMAP", "Satellite"=>"SATELLITE", "Hybrid"=>"HYBRID", "Terrain"=>"TERRAIN")
		 ),
	   array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Marker(set address)", "Sility"),
         "param_name" => "marker"
      ),
	   array(
         "type" => "attach_image",
         "class" => "",
         "heading" => __("Marker image: ", "Sility"),
         "param_name" => "markerimage"
      ),
	  
	   array(
         "type" => "textarea",
         "class" => "",
         "heading" => __("Information window:", "Sility"),
         "param_name" => "infowindow"
      ),
	   array(
		 "type" => "dropdown",	
		  "class" => "",
		  "heading" => __("Show Traffic:", "Sility"),
		  "param_name" => "traffic",
		  "value"=>array("No"=>"no", "Yes"=>"yes")
		 ),
        array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Extra class", "Sility"),
         "param_name" => "class",
         "description" => __(' Extra class name', "Sility")
      ),
   )
) );

/************************************************/
?>