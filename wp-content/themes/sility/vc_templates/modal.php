<?php

/****************************Modal BOX****************/

vc_map( array(
   "name" => __("Sility Modal box", "Sility"),
   "base" => "reveal",
   "class" => "",
   "icon" => "icon-wpb-my_reveal",
   'admin_enqueue_css' => array(get_template_directory_uri().'/vc_templates/shortcodes.css'),
   "category" => __('Content', "Sility"),
   "params" => array(
       array(
         "type" => "dropdown",
         
         "class" => "",
         "heading" => __("Type", "Sility"),
         "param_name" => "type",
         "value" => array("Button"=>"button solid-button","Link Style"=>""),
         "description" => __("Choose button type", "Sility")
      ),
       array(
         "type" => "dropdown",
         
         "class" => "",
         "heading" => __("Color", "Sility"),
         "param_name" => "color",
         "value" => array("Purple"=>"purple", "White"=>"white",  "Dark"=>"dark", "Primary"=>"btn-primary", "Info"=>"btn-info", "Success"=>"btn-success","Warning"=>"btn-warning", "Danger"=>"btn-danger"),
         "description" => __("Choose button color.", "Sility")
      ),
      array(
         "type" => "dropdown",
         
         "class" => "",
         "heading" => __("Size", "Sility"),
         "param_name" => "size",
         "value" => array("Large"=>"btn-lg", "Default"=>"", "Small"=>"btn-sm","Very Small"=>"btn-xs"),
         "description" => __("Choose button size.", "Sility")
      ),
      
      array(
         "type" => "textfield",
         "holder" =>'div',
         "class" => "",
         "heading" => __("Button Text", "Sility"),
         "param_name" => "button"
      ),
      array(
         "type" => "textfield",
         
         "class" => "",
         "heading" => __("Box Title", "Sility"),
         "param_name" => "revtitle"
      ),
	   
       array(
         "type" => "textarea_html",
         
         "class" => "",
         "heading" => __("Content", "Sility"),
         "param_name" => "content",
         "description" => __(" Box content.", "Sility")
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