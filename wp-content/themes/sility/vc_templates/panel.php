<?php
/*********************Panel******************************/

vc_map( array(
   "name" => __("Sility Panel", "Sility"),
   "base" => "panel",
   "class" => "",
   "icon" => "icon-wpb-my_panel",
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
         "type" => "dropdown",
         
         "class" => "",
         "heading" => __("Color", "Sility"),
         "param_name" => "color",
         "value" => array("Default"=>"panel-default","Info"=>"panel-info", "Success"=>"panel-success","Warning"=>"panel-warning", "Danger"=>"panel-danger"),
         "description" => __("Choose button color.", "Sility")
      ),
       array(
         "type" => "textfield",
         "holder"=>"div",
         "class" => "",
         "heading" => __("Panel Header", "Sility"),
         "param_name" => "head"
      ),
       array(
         "type" => "textfield",
         
         "class" => "",
         "heading" => __("Panel Footer", "Sility"),
         "param_name" => "footer"
      ),
      array(
         "type" => "textarea_html",       
         "class" => "",
         "heading" => __("Content", "Sility"),
         "param_name" => "content",
         "description" => __(" panel content", "Sility")
      ),
       array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Extra class", "Sility"),
         "param_name" => "class",
         "description" => __(' Extra class name', "Sility")
      )
   )
) );

/************************************************/
?>