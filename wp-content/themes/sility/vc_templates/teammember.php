<?php
/***************** TEAM MEMBERS *******************/
function vc_teammember($atts, $content=NULL){
    extract(shortcode_atts(array(
        'name'=>'',
        'position'=>'',
		'photo'=>'',
        'anim'=>'',
        'class'=>'',
		'fb'=>'',
        'tw'=>'',
        'gpl'=>'',
    ), $atts));
	
	$image = wp_get_attachment_image_src($photo, 'full');
	$anim=(!empty($anim)) ? 'animation '.$anim : '';
	$out='';
	do_shortcode ($content);
		$out.='<div class=" teamMember '.$anim.' '.$class.'">
				<div class="row m0 teamMemberInner">
					<div class="col-xs-6 p0">
						<img alt="'.$name.'" src="'.$image[0].'">
						<div class="row m0 socialList">
							<ul class="list-inline">';
								if($gpl) $out.= '<li><a href="'.$gpl.'" title="Google+"><i class="fa fa-google-plus"></i></a></li>';
								if($tw) $out.= '<li><a href="'.$tw.'" title="Twitter"><i class="fa fa-twitter"></i></a></li>';
								if($fb) $out.= '<li><a href="'.$fb.'" title="Facebook"><i class="fa fa-facebook "></i></a></li>';
						$out.='</ul>
						</div>
					</div>
					<div class="col-xs-6">
						<div class="row memIntro">
							<h4>'.$name.'</h4>
							<h5>'.$position.'</h5>
						</div>
					</div>
				</div>
			</div>';
    return $out;
}

add_shortcode('vc_teammember', 'vc_teammember');
/*****************************************************/
vc_map( array(
   "name" => __("Sility Team Member", "Sility"),
   "base" => "vc_teammember",
   "class" => "",
   "icon" => "icon-wpb-my_teammember",
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
         "holder"=>"div",
         "class" => "",
         "heading" => __("Name", "Sility"),
         "param_name" => "name"
      ),
      array(
         "type" => "textfield",
         
         "class" => "",
         "heading" => __("Position", "Sility"),
         "param_name" => "position"
      ),
       array(
         "type" => "attach_image",
         
         "class" => "",
         "heading" => __("Photo ", "Sility"),
         "param_name" => "photo"
      ),
	    
         array(
         "type" => "textarea_html",
         
         "class" => "",
         "heading" => __("Member description", "Sility"),
         "param_name" => "content"
      ),
	   array(
         "type" => "textfield",     
         "class" => "",
         "heading" => __("Link to Facebook profile(optional)", "Sility"),
         "param_name" => "fb"
      ),
        array(
         "type" => "textfield",  
         "class" => "",
         "heading" => __("Link to Twitter profile(optional)", "Sility"),
         "param_name" => "tw"
      ),
       
        array(
         "type" => "textfield",    
         "class" => "",
         "heading" => __("Link to Google+ profile(optional)", "Sility"),
         "param_name" => "gpl"
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