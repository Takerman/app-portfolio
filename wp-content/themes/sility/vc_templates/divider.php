<?php
/*********************Divider************************/


/*************************************************/
vc_map( array(
   "name" => __("Sility Divider", "Sility"),
   "base" => "divider",
   "class" => "",
   "icon" => "icon-wpb-my_divider",
   'admin_enqueue_css' => array(get_template_directory_uri().'/vc_templates/shortcodes.css'),
   "category" => __('Content', "Sility"),
   "params" => array(
        
       array(
         "type" => "dropdown",
         "class" => "",
         "heading" => __("Type", "Sility"),
         "param_name" => "type",
         "value" => array("Blank Spacer"=>"blank-spacer", "Line"=>"line" ),
      ),
       array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Custom Size for Blank Spacer", "Sility"),
         "param_name" => "customsize",
         "description" => __('In pixels', "Sility")
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
/*********************************************/
?>