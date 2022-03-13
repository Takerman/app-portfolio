<?php
define ( 'JS_PATH' , get_template_directory_uri().'/library/functions/shortcodes/shortcode.js');

function Sility_addbuttons() {
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		return;

	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "add_alc_custom_tinymce_plugin");
		add_filter('mce_buttons', 'register_alc_custom_button');
	}
}
function register_alc_custom_button($buttons) {
	array_push(
		$buttons,
		"Sility"
		); 
	return $buttons;
} 

function add_alc_custom_tinymce_plugin($plugin_array) {
	$plugin_array['SilityShortcodes'] = JS_PATH;
	return $plugin_array;
}
add_action('init', 'Sility_addbuttons');

function sumtips_add_dfe_buttons($buttons)
{
	$buttons[] = 'separator'; //Add separator (optional)
	$buttons['SilityShortcodes'] = array(
		'title' => __('Sility Shortcodes', "Sility"), //Button Title
		'onclick' => "tinyMCE.execCommand('alc_sility');", //Command to execute
		'both' => true // Show in visual mode. Set 'true' to show in both visual and HTML mode
	);
	
	return $buttons;
}
add_filter( 'wp_fullscreen_buttons', 'sumtips_add_dfe_buttons' );

/********************* PANEL **********************/

function alc_panel( $atts, $content = null ) {
	extract(shortcode_atts(array(
		"anim"=>'',
		"color" => '',
        "head"=>'',
        "footer"=>'',
        "class"=>''
	), $atts));
	$anim=(!empty($anim)) ? 'animation '.$anim : '';
	$out = '<div class="panel '.$color.' '.$anim.' '.$class.'">';
	if ($head) $out.='<div class="panel-heading"><span class="panel-title">'.$head.'</span></div>';
        $out.='<div class="panel-body">'.do_shortcode ($content).'</div>';
        if($footer) $out.= '<div class="panel-footer"><span class="panel-title">'.$footer.'</span></div>';
        $out.='</div>';
    return $out;
}
add_shortcode('panel', 'alc_panel');

/**************************************************/

/***************** PROGRESS BAR *******************/

function alc_progressbar( $atts, $content = null ) {
    extract(shortcode_atts(array(
		"anim"=>'',
		"color"=>'',
		"customcolor" => '',
		"meter" => '50',
		"style" => '',
		"animated" => '',
		"title" => '',
		"class"=>''
	), $atts));
	$anim=(!empty($anim)) ? 'animation '.$anim : '';
	$out='';

	$out.='<div class="progress-short '.$class.'  '.$anim.'">';
	if($title){	$out.='<label class="progress-bar-label">'.$title.'</label>';}
	$out.='<div class="progress '.$style.' '.$animated.' ">
			<div class="progress-bar progress-bar-'.$color.'  " role="progressbar" aria-valuenow="'.$meter.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$meter.'%;  background-color:'.$customcolor.'">
				<span>'.$meter.'%</span>
			</div>
		</div></div>'; 		
    return $out;
}
add_shortcode('progressbar', 'alc_progressbar');

/************************************************/


/************** Circular Progress Bar ***********/

function alc_circle( $atts, $content = null ) {
 extract(shortcode_atts(array(
	'anim' => '',
	'title' => '',
	'meter' => '',
	'class' => '',
	'piebarcolor' => '#7c4dff',
	), $atts));
	
	$randomID=  mt_rand(0, 10000);
	$anim=(!empty($anim)) ? 'animation '.$anim : '';
	
	$out = '<div class="circle-progress-wrapper clearfix '.$anim.' '.$class.'">
				<div class="circle-progress">
					<input type="text" class="dial" value="'.$meter.'" data-color="'.$piebarcolor.'" data-from="0" data-to="'.$meter.'" />
				</div>
				<div class="circle-progress-label-wrapper"><label class="circle-progress-label">'.$title.'</label></div>
			</div>';
    return $out;
}
add_shortcode('circle', 'alc_circle');

/**************************************************/

/*************** Dropdown buttons *****************/

function alc_dropbutton_group( $atts, $content ){
	extract(shortcode_atts(array(
		'title' => '',
		'type'	=> '',
		'color' => '',
		'anim'=>'',
		'class'=>'',
	), $atts));
	$GLOBALS['dropbutton_count'] = 0;
	$randomId = mt_rand(0, 100000);
	$return = '';
    $anim=(!empty($anim)) ? 'animation '.$anim : '';
	do_shortcode( $content );
	$counter = 1;
	if( is_array( $GLOBALS['dropbuttons'] ) ){
		foreach( $GLOBALS['dropbuttons'] as $dropbutton ){
			$dropbuttons[] = '<li><a href="'.$dropbutton['url'].'">'.do_shortcode($dropbutton['title']).'</a></li>';
			if ($dropbutton['divider'] == 1)
			{
				$dropbuttons[] = '<li class="divider"></li>';
			}
		}
		
		if ($type == 'split')
		{
			$return.='
			<div class="btn-group '.$anim.' '.$class.'">
				<button class="btn '.$color.' ">'.$title.'</button>
				<button class="btn dropdown-toggle '.$color.'" data-toggle="dropdown">
					<span class="caret "></span>
				</button>';
		}
		else
		{	
			$return.= '
			<div class="btn-group '.$anim.' '.$class.'">
				 <a class="btn btn-default dropdown-toggle '.$color.'" data-toggle="dropdown" href="#">'.$title.'<span class="caret iconright"></span></a>';
		}
		$return.= '<ul class="dropdown-menu" id="'.$randomId.'">'.implode( "\n", $dropbuttons ).'</ul>';
		$return.= '</div>';
		unset($GLOBALS['dropbuttons']);
	}
	return $return;
}
add_shortcode( 'dropbuttongroup', 'alc_dropbutton_group' );

/**************************************************/


/**************** DROPDOWN BUTTON *****************/

function alc_dropbutton( $atts, $content ){
	extract(shortcode_atts(array(
	'title' => '',
	'url' => '',
	'divider' => '',
	), $atts));
	
	$x = $GLOBALS['dropbutton_count'];
	$GLOBALS['dropbuttons'][$x] = array( 'title' => $title, 'url' => $url, 'divider' => $divider, 'content' =>  $content );
	
	$GLOBALS['dropbutton_count']++;
}

add_shortcode( 'dropbutton', 'alc_dropbutton' );

/************************************************/

/******************* BUTTONS ********************/

function alc_button( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'size' => 'medium',
		'link' => '#',
		'color' => '',
		'status'=>'',
		'target' => '',
		'anim'=>'',
		'class'=>'purple',
	), $atts));
    
	$anim=(!empty($anim)) ? 'animation '.$anim : '';
	$target = ($target) ? ' target="_blank"' : '';
	$out = '<a href="'.$link.'" '.$target.' class="button solid-button  '.$size.' '.$color.' '.$status.'  '.$class.' '.$anim.'">'.do_shortcode($content).'</a>';
    return $out;
}
add_shortcode('button', 'alc_button');

/************************************************/


/****************** TABS ************************/

function alc_tab_group( $atts, $content ){
    extract(shortcode_atts(array(
        'anim'=>'',
        'class'=>'',
        ), $atts));
	$GLOBALS['tab_count'] = 0;	
	do_shortcode( $content );
    
	$anim=(!empty($anim)) ? 'animation '.$anim : '';
	$randomId = mt_rand(0, 100000);
	$counter = 0;
		if( is_array( $GLOBALS['tabs'] ) ){
			foreach( $GLOBALS['tabs'] as $tab ){
				$active = ($counter == 0) ? ' active' : '';
				$tabs[] = '  <li  class="'.$active.'"><a href="#tab-'.$randomId.'"  data-toggle="tab">';
				$tabs[].= $tab['title'].'</a></li>';
				$tabcontent[] =  '<div  class="tab-pane '.$active.'" id="tab-'.$randomId.'">'.do_shortcode($tab['content']).'</div>';	
				$counter ++;
				$randomId++;
			}
			$return='';
			$return.='<div class="tabs-shortcode '.$anim.' '.$class.'">';
				$return.= '<ul class="nav nav-tabs">'.implode( "\n", $tabs ).'</ul>';
				$return.= ' <div class="tab-content">'.implode( "\n", $tabcontent ).'</div>';
			$return.='</div>';
			unset($GLOBALS['tabs']);
		}
	return $return;
}
add_shortcode( 'tabgroup', 'alc_tab_group' );


function alc_tab( $atts, $content ){
	extract(shortcode_atts(array(
	'title' => 'Tab %d',
	
	), $atts));
	
	$x = $GLOBALS['tab_count'];
	$GLOBALS['tabs'][$x] = array( 'title' => $title, 'content' =>  $content );
	
	$GLOBALS['tab_count']++;
}
add_shortcode( 'tab', 'alc_tab' );

/************************************************/
/*************** Vertical Navigation ************/
function alc_vernav_group( $atts, $content ){
	extract(shortcode_atts(array(
		'title' => '',
		'anim'=>'',
		'class'=>'',
	), $atts));
	$GLOBALS['vernav_count'] = 0;
	do_shortcode( $content );
    $anim=(!empty($anim)) ? 'animation '.$anim : '';
	$return = '<div class="vernav '.$anim.' '.$class.'" style="max-width: 340px; padding: 8px 0"><ul class="nav nav-list">';
	if (!empty($title)) $return.='<li class="nav-header">'.$title.'</li>';
	if( is_array( $GLOBALS['vernavs'] ) ){
		foreach( $GLOBALS['vernavs'] as $vernav ){
			$vernavs[] = ' <li><a href="'.$vernav['link'].'">'.$vernav['title'].'</a></li>';	
		}
		$return.=implode( "\n", $vernavs );
		$return.= '</ul></div>';
		unset($GLOBALS['vernavs']);
	}
	return $return;
}
add_shortcode( 'vernavgroup', 'alc_vernav_group' );


function alc_vernav( $atts, $content ){
	extract(shortcode_atts(array(
	'title' => 'Nav %d',
	'link'	=> ''
	), $atts));
	
	$x = $GLOBALS['vernav_count'];
	$GLOBALS['vernavs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['vernav_count'] ), 'content' =>  $content, 'link' =>  $link );
	
	$GLOBALS['vernav_count']++;
}
add_shortcode( 'vernav', 'alc_vernav' );

/*************************************************/


/***************** ACCORDION ********************/


function alc_accordion_group( $atts, $content ){
	extract(shortcode_atts(array(
        'type'=>'',
        'anim'=>'',
        'class'=>'',
	), $atts));
	$GLOBALS['accordion_count'] = 0;
	$anim=(!empty($anim)) ? 'animation '.$anim : '';
	$counter = 0;
	$accId=  mt_rand(0, 100);
	do_shortcode( $content );
        
	if($type==1){
		$acc='data-parent="#accordion-'.$accId.'"';
	}
	else{
		$acc="";
	}
        
	if( is_array( $GLOBALS['accordions'] ) ){
		foreach( $GLOBALS['accordions'] as $accordion ){
			$randomId=  mt_rand(0, 10000);
			$active = ($counter == 0) ? ' collapsed' : '';
			$activeContent=($counter==0 )? 'in' : '';
			$accordions[] = '
				<div class="panel panel-default">		
					<div class="panel-heading">
						<h4 class="panel-title">
							<a class="accordion-toggle collapsed-icon  '.$active.' " '.$acc.'  data-toggle="collapse" href="#acc-'.$randomId.'">';
								$accordions[].= $accordion['title'].'
							</a>
						</h4>
					</div>    
					<div id="acc-'.$randomId.'" class="panel-collapse collapse '.$activeContent.'">
						<div class="panel-body">
							'.do_shortcode($accordion['content']).'
						</div>
					</div>
				</div>';	
			$counter++;
		}
		$return='<div class="panel-group accShort'.$anim.' '.$class.'" id="accordion-'.$accId.'">'.implode( "\n", $accordions ).'</div>';
		unset($GLOBALS['accordions']);
	}
	return $return;
}

add_shortcode( 'accordiongroup', 'alc_accordion_group' );
/***************/

function alc_accordion( $atts, $content ){
	extract(shortcode_atts(array(
	'title' => 'accordion %d',
	), $atts));
	
	$x = $GLOBALS['accordion_count'];
	$GLOBALS['accordions'][$x] = array( 'title' => sprintf( $title, $GLOBALS['accordion_count'] ), 'content' =>  $content);
	
	$GLOBALS['accordion_count']++;
}

add_shortcode( 'accordion', 'alc_accordion' );
/************************************************/


/*************** TESTIMONIALS ********************/

function alc_testimonial_group( $atts, $content ){
	extract(shortcode_atts(array(
        'anim'=>'',
        'class'=>'',
		'pag'=>'true',
		'rtl'=>'false',
		'auto'=>'false',
		'interval'=>'3000'
	), $atts));
	$GLOBALS['testimonial_count'] = 0;
	$counter = 0;
	$randomId = mt_rand(0, 100000);
	do_shortcode( $content );
	$imglink = '';
	$anim=(!empty($anim)) ? 'animation '.$anim : '';
	$return='<div id="testimonials-'.$randomId.'" class="test-shortcode testimonial-slider owl-carousel '.$anim.' '.$class.'">';
					if( is_array( $GLOBALS['testimonials'] ) ){
						foreach( $GLOBALS['testimonials'] as $testimonial ){
						$imglink='';
						if(function_exists('vc_map')){
							$limage = wp_get_attachment_image_src($testimonial['photo'], 'full');
							$imglink.=$limage[0];
						}else{
							$imglink=$testimonial['photo'];
						}
						$testimonials[] = '<div>
											<div class="image">
												<img src="'.$imglink.'" alt="'.$testimonial['title'].'">
											</div>
											<div class="sep"></div>
											<p>"'.do_shortcode($testimonial['content']).'"</p>
											<span class="author">'.$testimonial['title'].' , '.$testimonial['position'].' '.$testimonial['company'].'</span>
										</div>';	
				$counter++;
			}
			$return.= implode( "\n", $testimonials );
			unset($GLOBALS['testimonials']);
		}
	$return.='</div>';
	$direction= weblusive_get_option('rtl_mode');
	if($direction){
		$rtl='true';
	}else{
		$rtl='false';
	}
	$return.='<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery("#testimonials-'.$randomId.'").owlCarousel({
				rtl	:'.$rtl.',
				dots : '.$pag.', // Show next and prev buttons
				loop:true,
				items : 1,
				autoplay: '.$auto.',
				autoplayTimeout:'.$interval.',
				navText: ""
			});
		});
	</script>';
			
	return $return;
}

add_shortcode( 'testimonialgroup', 'alc_testimonial_group' );

function alc_testimonial( $atts, $content ){
	extract(shortcode_atts(array(
		'title' => '',
		'position' => '',
		'company'=>'',
		'photo'=>'',
	), $atts));
	
	$x = $GLOBALS['testimonial_count'];
	$GLOBALS['testimonials'][$x] = array( 'title' => sprintf( $title, $GLOBALS['testimonial_count'] ), 'position' => $position, 'company' => $company, 'photo' => $photo,   'content' =>  $content );
	
	$GLOBALS['testimonial_count']++;
}

add_shortcode( 'testimonial', 'alc_testimonial' );

/************************************************/

/******************* Alertbox *******************/

function alc_alert( $atts, $content = null ) {
     extract(shortcode_atts(array(
		"type"=>'',
		"color" => '',
		"anim"=>'',
		"class"=>''
	), $atts));
    do_shortcode($content);
    $anim=(!empty($anim)) ? 'animation '.$anim : '';
	$out = '<div class="alert '.$type.' '.$color.' '.$class.' '.$anim.'" role="alert">';
     if($type!=='alertdefault') {
		$out.='<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>';
	}
	$out.=do_shortcode($content).'</div>';
   return $out;
}
add_shortcode('alert', 'alc_alert');

/************************************************/


/***********  VIDEOS  ****************/

function alc_video($atts, $content=null) {
	extract(shortcode_atts(array(
		'site' => 'youtube',
		'id' => '',
		'width' => '',
		'height' => '',
		'autoplay' => '0',
		"anim"=>'',
		"class"=>''
	), $atts));
    $anim=(!empty($anim)) ? 'animation '.$anim : '';
	if ( $site == "youtube" ) { $src = 'http://www.youtube.com/embed/'.$id.'?autoplay='.$autoplay; }
	else if ( $site == "vimeo" ) { $src = 'http://player.vimeo.com/video/'.$id.'?autoplay='.$autoplay; }
	else if ( $site == "dailymotion" ) { $src = 'http://www.dailymotion.com/embed/video/'.$id.'?autoplay='.$autoplay; }
	else if ( $site == "veoh" ) { $src = 'http://www.veoh.com/static/swf/veoh/SPL.swf?videoAutoPlay='.$autoplay.'&permalinkId='.$id; }
	else if ( $site == "bliptv" ) { $src = 'http://a.blip.tv/scripts/shoggplayer.html#file=http://blip.tv/rss/flash/'.$id; }
	else if ( $site == "viddler" ) { $src = 'http://www.viddler.com/embed/'.$id.'e/?f=1&offset=0&autoplay='.$autoplay; }
	
	if ( $id != '' ) {
		return '<div class="flex-video '.$anim.' '.$class.'"><iframe width="'.$width.'" height="'.$height.'" src="'.$src.'" class="vid iframe-'.$site.'"></iframe></div>';
	}
}
add_shortcode('tp_video','alc_video');

/************************************************/



/****************** SLIDER ********************/
function alc_slider( $atts, $content ){
	$GLOBALS['slideritem_count'] = 0;
	extract(shortcode_atts(array(
		"anim"=>'',
		"class"=>'',
		"nav"=>'',
		"auto"=>'',
		"speed" => '',
		"sitems"=>'',
	), $atts));
	do_shortcode( $content );
	$randomId = mt_rand(0, 100000);
	$return = '';
	$anim=(!empty($anim)) ? 'animation '.$anim : '';
	
	if(isset($GLOBALS['sitems']) && is_array( $GLOBALS['sitems'] ) ){
		$icount = 0;
		foreach( $GLOBALS['sitems'] as $item ){
			$panes[]='<div><img src="'.$item['image'].'" alt="slider-img" class="img-resposive"/></div>';
	
			$icount ++ ;
		}
		$randomId = mt_rand(0, 100000);
		$return.='<div id="single-slider-'.$randomId.'" class="portfolio-slider owl-carousel '.$class.' '.$anim.'">'.implode( "\n", $panes ).'</div>';

			
		unset($GLOBALS['sitems']);
	}
	$rtl= weblusive_get_option('rtl_mode');
	if($rtl){
		$rtl='true';
	}else{
		$rtl='false';
	}
	$return.='
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery("#single-slider-'.$randomId.'").owlCarousel({
				items: 1,
				autoplay: '.$auto.',
				autoplayTimeout:'.$speed.',
				loop: true,
				nav: '.$nav.',
				navText: ["<i class=\"fa fa-angle-left\"></i>","<i class=\"fa fa-angle-right\"></i>"],
				dots: false
				});
		});
	</script>';
	return $return;
}
add_shortcode('slider', 'alc_slider' );

/****/



function alc_slideritem( $atts, $content ){
	extract(shortcode_atts(array(
		'image' => '',
		'title' => '',
	), $atts));
	
	$x = $GLOBALS['slideritem_count'];
	$GLOBALS['sitems'][$x] = array( 'image' => $image, 'title' => $title, 'content' =>  $content );
	
	$GLOBALS['slideritem_count']++;
	
}
add_shortcode( 'slideritem', 'alc_slideritem' );

/************************************************/


/*******************Carousel********************/

function alc_carousel( $atts, $content ){
	$GLOBALS['caritem_count'] = 0;
	extract(shortcode_atts(array(
		'nav' => '',
		'auto' => '',
		'speed'=>'',
		'sitems' => '',
		'pag'=>'',
		"anim"=>'',
		"class"=>''
	), $atts));
	$randomId = mt_rand(0, 100000);
	$panes = array();	
	$return = '';
	
	do_shortcode ($content);
   $anim=(!empty($anim)) ? 'animation '.$anim : '';
	if(isset( $GLOBALS['caritems']) && is_array( $GLOBALS['caritems'] ) ){
		foreach( $GLOBALS['caritems'] as $item ){
			$panes[]= '<div class="item">'.$item['content'].'</div>';
			}				
			$return.='
			<div id="content-carousel-'.$randomId.'" class="portfolio-slider content-slider owl-carousel '.$class.' '.$anim.'">'.implode( "\n", $panes ).' </div>';
		unset($GLOBALS['caritems']);
	}
	
	$rtl= weblusive_get_option('rtl_mode');
	if($rtl){
		$rtl='true';
	}else{
		$rtl='false';
	}
	$return.='
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery("#content-carousel-'.$randomId.'").owlCarousel({
				items: '.$sitems.',
				autoplay: '.$auto.',
				autoplayTimeout:'.$speed.',
				loop: true,
				nav: '.$nav.',
				navText: ["<i class=\"fa fa-angle-left\"></i>","<i class=\"fa fa-angle-right\"></i>"],
				dots: '.$pag.',
				margin:20
				});
		});
		</script>';
	return $return;
}

add_shortcode('carousel', 'alc_carousel' );
/***/

function alc_caritem( $atts, $content ){
	extract(shortcode_atts(array(
	'title' => '',
	), $atts));
	$x = $GLOBALS['caritem_count'];
	$GLOBALS['caritems'][$x] = array('title' => $title, 'content' =>  do_shortcode ($content) );
	$GLOBALS['caritem_count']++;	
}
add_shortcode( 'caritem', 'alc_caritem' );

/************************************************/


/*************** Contact details ****************/

function alc_contact( $atts, $content = null ) {
     extract(shortcode_atts(array(
		"address" => '',
		"tel" => '',
		"email" => '',
		"website" => '',
		"anim"=>'',
		"class"=>'',
	), $atts));	
    $anim=(!empty($anim)) ? 'animation '.$anim : '';
	$out = '<ul class="list-icons list-unstyled '.$class.' '.$anim.'">';
				if ($address){$out.='<li><i class="ion-ios-location-outline"></i>'.$address.'</li>';}
				if($tel){$out.='<li><i class="ion-iphone"></i>'.$tel.'</li>';}
				if($email){$out.='<li><i class="ion-ios-email-outline"></i>'.$email.'</li>';}
				if($website){$out.='<li><i class="ion-ios-home-outline"></i>'.$website.'</li>';}
			$out.='</ul>';
   return $out;
}
add_shortcode('contact', 'alc_contact');

/************************************************/


/************ FEATURED BLOCK****************/
function alc_fblock($atts, $content=NULL){
    extract(shortcode_atts(array(
        'anim'=>'',
		'type'=>'default',
		'title'=>'',
		'family'=>'',
		'icon'=>'',
		'class'=>'',
    ), $atts));
	$anim=(!empty($anim)) ? 'animation '.$anim : '';
	$out = '';
	if ($type == 'default') {
		$out.='<div class="service '.$anim.' '.$class.'">
					<div class="icon"><i class="'.$family.' '.$icon.'"></i></div>
					<h5>'.$title.'</h5>
				</div>';
	}elseif ($type=='alter') {
		$out.='<div class="icon-box '.$anim.' '.$class.'">
					<div class="icon"><i class="'.$family.' '.$icon.'"></i></div>
					<h6>'.$title.'</h6>
				</div>';
	}
	return $out;
}
add_shortcode('fblock', 'alc_fblock');

/**************************************************/


/******************* TITLE BLOCK ******************/
function alc_tblock($atts, $content=NULL){
    extract(shortcode_atts(array(
        'anim'=>'',
        'title'=>'',
		'tag'=>'h1',
		'tcuscolor' => '',
        'class'=>'',
    ), $atts));
	$anim=(!empty($anim)) ? 'animation '.$anim : '';
	$tcuscolor = (isset($tcuscolor) && !empty($tcuscolor))  ? 'style="color:'.$tcuscolor.' !important"' : '';
	$out='';
	
		$out.='<'.$tag.' class="tblock-title " '.$tcuscolor.'>'.$title.'</'.$tag.'>';	
    return $out;
}

add_shortcode('tblock', 'alc_tblock');

/******************************************************/


/******************** REVEAL BOX **********************/

function alc_reveal($atts, $content=NULL){
    extract(shortcode_atts(array(
        'type'=>'',
        'size'=>'',
        'color'=>'',
        'button'=>'', 
        'revtitle'=>'',
        'class'=>''
    ), $atts));
    $randomId=  mt_rand(0, 100000);
   
    $out='<a href="#myModal'.$randomId.'"  role="button" data-toggle="modal" class="'.$type.' '.$color.' '.$size.' '.$class.'">'.$button.'</a>';
    $out.='<div id="myModal'.$randomId.'"  class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
            <div class="modal-dialog">
            <div class="modal-content">        
            <div class="modal-header">
		<h4 id="myModalLabel">'.$revtitle.'</h4>
	  </div>
	   <div class="modal-body">
		<p>'.do_shortcode($content).'</p>
	  </div>';
	  $out.='<div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">'.__('Close', 'Sility').'</button></div>';
         $out.='</div>
          </div>
	 </div>
	';	
return $out;
}

add_shortcode('reveal', 'alc_reveal');

/*************************************************/


/****** SHOW POSTS BY CATEGORY AND COUNT ********/

function alc_list_posts( $atts )
{
	extract( shortcode_atts( array(
		'category' => '',
		'limit' => '5',
		'order' => 'DESC',
		'orderby' => 'date',
		'anim'=>'',
		'class'=>''
	), $atts) );
    $anim=(!empty($anim)) ? 'animation '.$anim : '';
	$return = '';

	$query = array();

	if ( $category != '' )
		$query[] = 'category=' . $category;

	if ( $limit )
		$query[] = 'numberposts=' . $limit;

	if ( $order )
		$query[] = 'order=' . $order;

	if ( $orderby )
		$query[] = 'orderby=' . $orderby;

	$posts_to_show = get_posts( implode( '&', $query ) );
	$return.='<div class="bloglisting '.$class.' '.$anim.'">';
				foreach ($posts_to_show as $ps) {
				$day = get_the_time('d', $ps->ID);
				$month = get_the_time('M', $ps->ID);
				$thumbnail = get_the_post_thumbnail($ps->ID, 'blog-thumb-2');
				$postmeta = get_post_custom($ps->ID);
				$return.='<div class="col-md-4">
							<div class="media recent-post">';
								if (!empty($thumbnail) && 'gallery' !== get_post_format( $ps->ID )):
									$return.='<a href="' . get_permalink($ps->ID) . '">' . $thumbnail . '</a>';
								elseif (( function_exists( 'get_post_format' ) && 'video' == get_post_format( $ps->ID ) )):
									global $wp_embed;
									$post_embed = '';
									$video = isset($postmeta["_blog_video"]) ? $postmeta["_blog_video"][0] : ''; 
									$videoself = isset($postmeta["_blog_video_selfhosted"]) ? $postmeta["_blog_video_selfhosted"][0] : ''; 
									if ($video || $videoself): 
									$return.='<div class="full-video">';
										if ($video):
											$post_embed = $wp_embed->run_shortcode('[embed width="500" height="400"]'.$video.'[/embed]'); 
										else:
											$post_embed = do_shortcode($videoself);
										endif;
										$return.=$post_embed; 
									$return.='</div>';	
									else:
										$return.='<div class="alert alert-danger fade in">
											Video post format was chosen but no url or embed code provided. Please fix this by providing it.
										</div>';
									endif;
								elseif(( function_exists( 'get_post_format' ) && 'gallery' == get_post_format( $ps->ID ) )):
								$return.='<div class="blog-slider-wrapper">';
								$full_image = wp_get_attachment_image_src(get_post_thumbnail_id($ps->ID), 'full', false); 
								$argsThumb = array(
									'order'          => 'ASC',
									'posts_per_page'  => 99,
									'post_type'      => 'attachment',
									'post_parent'    => $ps->ID,
									'post_mime_type' => 'image',
									'post_status'    => null,
									//'exclude' => get_post_thumbnail_id()
								);
								$return.='<ul class="bxslider">';
											$attachments = get_posts($argsThumb);
											if ($attachments) {
												foreach ($attachments as $attachment) {
													$image = wp_get_attachment_url($attachment->ID, 'full', false, false);
													$alt = $attachment->post_excerpt;
													$return.= '<li><img src="'.$image.'" alt="'.$alt.'" class="img-responsive"></li>';
												}
											}
								$return.='</ul>
										</div>';
							else:
								$return.='<a href="' . get_permalink($ps->ID) . '" >
												<img src = "http://placehold.it/267x186" alt="' . __('No image', 'Sility') . '" />
										</a>';
							endif;
					$return.='	<div class="media-body post-body">
									<h3><a href="'.get_permalink( $ps->ID ).'">'.$ps->post_title.'</a></h3>
									<div class="post-excerpt">
										<p>'.limit_words($ps->post_content, 15).'</p>
										<a href="'.get_permalink( $ps->ID ).'" class="read-more">Read More <i class="fa fa fa-long-arrow-right"></i></a>
									</div>
								</div>
							</div><!-- end media -->
	   	 				</div>';
							
				}
			$return.='</div>';
                       
	
	return $return;
}

add_shortcode('list_posts', 'alc_list_posts');

/************************************************/


/**************** RELATED POSTS *****************/
function related_posts_shortcode( $atts ) {
	extract(shortcode_atts(array(
        'count' => '3',
		'title' => 'More useful tips',
	), $atts));
	global $post, $wp_embed;
	$retval = '';
	$current_cat = get_the_category($post->ID);
	$current_cat = $current_cat[0]->cat_ID;
	$this_cat = '';
	$tag_ids = array();
	$tags = get_the_tags($post->ID);
	if ($tags) {
		foreach($tags as $tag) {
			$tag_ids[] = $tag->term_id;
		}
	} 
	else {
		$this_cat = $current_cat;
	}
	$args = array(
		'post_type' => get_post_type(),
		'numberposts' => $count,
		'orderby' => 'date',
		'order' => 'DESC',
		'tag__in' => $tag_ids,
		'cat' => $this_cat,
		'exclude' => $post->ID
	);
	$dtwd_related_posts = get_posts($args);
	if ( empty($dtwd_related_posts) ) {
		$args['tag__in'] = '';
		$args['cat'] = $current_cat;
		$dtwd_related_posts = get_posts($args);
	}
	//if ( empty($dtwd_related_posts) ) {return;}
	$post_list = '';

	if ( $dtwd_related_posts ) {
		foreach($dtwd_related_posts as $r) {
			$get_meta = get_post_custom($r->ID);
			$video = isset($get_meta["_blog_video"]) ? $get_meta["_blog_video"][0] : ''; 
			$thumbnail = get_the_post_thumbnail($r->ID, 'blog-medium');
			$retval .= '
			<div class="col-md-4 col-sm-4">
				<div class="related-post-media">';
					if ($video):
						$retval.='<div class="flex-video">'.$wp_embed->run_shortcode('[embed width="262" height="197"]'.$video.'[/embed]').'</div>';	
					else:	
						if ($thumbnail !== ''):
							$retval.=$thumbnail;
						else:	
							//$retval.='<img src = "http://placehold.it/550x403" alt="'.__('No Image', 'Sility').'" />';
						endif;
					endif;		
				$retval .= '</div>
				<div class="related-post-content">
					<div class="related-post-title"><a href="'.get_permalink($r->ID).'">'.wptexturize($r->post_title).'</a></div>
					<div class="related-post-meta"><span class="meta-date">'.get_the_time('d M Y', $r->ID).'</span></div>
				</div>
			</div>';
		}
	} 
	else {
		$retval .= '<div class="col-md-12"><p>'.__('No related posts for this one', 'Sility').'</div>';
	}
	
	return $retval;
}
add_shortcode('related_posts', 'related_posts_shortcode');

/*************** SOCIAL BUTTONS *****************/
function alc_social($atts, $content=NULL){
    extract( shortcode_atts( array(
		'anim'=>'',
        'class'=>'',
		'target' => '_blank'
	), $atts) );
    $anim=(!empty($anim)) ? 'animation '.$anim : '';
    $GLOBALS['socbuttoncount']=0;
	$out = '';
	if ($target) $target = 'target="'.$target.'"';
	do_shortcode ($content);
    if(isset($GLOBALS['soc_buttons']) && is_array($GLOBALS['soc_buttons'])){
        foreach ($GLOBALS['soc_buttons'] as $soc){
            $soclink=$soc['link'];
            $socicon=$soc['icon'];
            $soc_buttons[]="<li><a href=\"$soclink\" class=\"social-icon\" $target><i class=\"fa fa-$socicon\"></i></a></li>";
        }
        $out='<ul class="social-icons '.$anim.' '.$class.'">'.implode("\n", $soc_buttons).'</ul>';
		unset($GLOBALS['soc_buttons']);
    }
    return $out;
}

add_shortcode('social', 'alc_social');

/*********************/
function alc_soc_button($atts, $content=NULL){
    extract(shortcode_atts(array(
        'icon'=>'',
        'link'=>''
    ), $atts));
    //do_shortcode ($content);
    $x= $GLOBALS['socbuttoncount'];
    $GLOBALS['soc_buttons'][$x]=array('icon'=> $icon, 'link'=>$link);
    $GLOBALS['socbuttoncount']++;

} 

add_shortcode('soc_button', 'alc_soc_button');
/**************************************************/


/***************** TEAM MEMBERS *******************/
function al_teammember($atts, $content=NULL){
    extract(shortcode_atts(array(
        'name'=>'',
        'position'=>'',
		'photo'=>'',
        'anim'=>'',
        'class'=>'',
    ), $atts));
	
	$GLOBALS['sbcount']=0;
	$out='';
	
	$anim=(!empty($anim)) ? 'animation '.$anim : '';
		do_shortcode ($content);
			$out.= '<div class="teamMember '.$anim.' '.$class.'">
						<div class="row m0 teamMemberInner">
							<div class="col-xs-6 p0">
								<img  alt="'.$name.'" src="'.$photo.'">
								<div class="row m0 socialList">
									<ul class="list-inline">';
										if(is_array($GLOBALS['tmsocbuttons'])){
											foreach ($GLOBALS['tmsocbuttons'] as $soc){
												$tmname = ucwords(substr($soc['tmicon'], 3));
												$tmsocbuttons[]='<li><a href="'.$soc['tmlink'].'"><i class="fa '.$soc['tmicon'].'"></i></a></li>';
											}	
											$out.=implode("\n", $tmsocbuttons);
										}
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
			unset($GLOBALS['tmsocbuttons']);
    return $out;
}

add_shortcode('teammember', 'al_teammember');
/************************/
function al_tmsocbutton($atts, $content=NULL){
    extract(shortcode_atts(array(
        'tmicon'=>'',
        'tmlink'=>''
    ), $atts));
    
	$x = $GLOBALS['sbcount'] ;
    $GLOBALS['tmsocbuttons'][$x]=array('tmicon'=> $tmicon, 'tmlink'=>$tmlink);
    $GLOBALS['sbcount']++;
} 

add_shortcode('tmsocbutton', 'al_tmsocbutton');


/**************************************************/

/********************List*************/

function alc_list( $atts, $content ){
	extract(shortcode_atts(array(
        'anim' => '',
		'type' => '',
		'class' => ''
					), $atts));
	$GLOBALS['listitem_count'] = 0;
	$counter=0;
	$listitems = array();
	$return = '';
    $anim=(!empty($anim)) ? 'animation '.$anim : '';
	do_shortcode($content);
	if($type=='order') {
		$tag='<ol ';
		$tagEnd='</ol>';
	}else{
		 $tag='<ul ';
		 $tagEnd='</ul>';
	}
	if( is_array( $GLOBALS['listitems'] ) ){
		
		foreach( $GLOBALS['listitems'] as $listitem ){
			$listitems[]='<li>';
			if($type=='list-icons'){$listitems[].='<i class="md-arrow-forward"></i>';}
			if($listitem['link']){
				$listitems[].='<a href="'.$listitem['link'].'">'.do_shortcode($listitem['content']).'</a>';
			}else{
				$listitems[].=do_shortcode($listitem['content']);
			}
			$listitems[].='</li>';
			$counter++;
		}
		if($type=='list-icons'){$type='list-icons purple bold-list';}
		$return.= $tag.' class=" '.$anim.' '.$class.' '.$type.'">'.implode( "\n", $listitems ).$tagEnd;
		unset($GLOBALS['listitems']);
	}
	else {
		
	}
	return $return;	
}
add_shortcode('list', 'alc_list');
/************************/
function alc_list_item( $atts, $content = null){
	extract(shortcode_atts(array(
		'title' => '',
		'link' => ''
	), $atts));
	
	$x = $GLOBALS['listitem_count'];
	$GLOBALS['listitems'][$x] = array('link'=>$link, 'content'=>$content);
	
	$GLOBALS['listitem_count']++;
}
add_shortcode('listitem', 'alc_list_item');


/****************** BLOCKQUOTE *********************/
function alc_blockquote( $atts, $content = null ) {
	extract(shortcode_atts(array( 
		'author'=>'',
		'anim'=>'',
		'class'=>'',
		'company' => '',
		'pos' => '',
		'bcuscolor'=>''
	), $atts));
	$anim=(!empty($anim)) ? 'animation '.$anim : '';
	$bcuscolor = (isset($bcuscolor) && !empty($bcuscolor))  ? 'style="border-color:'.$bcuscolor.'"' : '';
	$out='<blockquote class="'.$pos.' '.$class.''.$anim.'" '.$bcuscolor.'>
			<p>'.do_shortcode($content).'</p>
			<footer>'.$author.'<cite title="Source Title"> '.$company.'</cite></footer>
		</blockquote>';	
    return $out;
}
add_shortcode('blockquote', 'alc_blockquote');
/****************** Lightbox ********************/

function alc_lightbox( $atts, $content = null ) {
	extract(shortcode_atts(array( 
		'type'=>'',
		'thumbnail'=>'',
		'src'=>'',
		'anim'=>'',
		'class'=>'',
	), $atts));
    $out = '';
	$anim=(!empty($anim)) ? 'animation '.$anim : '';
	$iframeAdd=($type=='iframe') ? '?iframe=true' : '';
	$imglink='';
	if(function_exists('vc_map')){
		$limage = wp_get_attachment_image_src($thumbnail, 'full');
		$imglink.=$limage[0];
	}else{
		$imglink=$thumbnail;
	}
	$out.='<a href="'.$src.''.$iframeAdd.'" data-rel="prettyPhoto '.$class.' "   data-lightbox="'.$type.'" title="'.do_shortcode($content).'"><img src="'.$imglink.'" alt="" class="img-responsive thumbnail '.$anim.'"></a>';
    return $out;
}
add_shortcode('lightbox', 'alc_lightbox');
/*****************************************/




/*********************************************************/

/********************* GOOGLE MAP **********************/


function mapme($attr) {
	$number = mt_rand(0, 100000);
	$randomId = "googlemap".$number;
	// default atts
	$attr = shortcode_atts(array(	
		'lat'   => '0', 
		'lon'    => '0',
		'z' => '14',
		'w' => '300',
		'h' => '300',
		'maptype' => 'ROADMAP',
		'address' => '',
		'kml' => '',
		'marker' => '',
		'markerimage' => '',
		'traffic' => 'no',
		'infowindow' => '',
		'class' => ''
		), $attr);
	$imglink='';
	if(function_exists('vc_map')){
		$limage = wp_get_attachment_image_src($attr['markerimage'], 'full');
		$imglink.=$limage[0];
	}else{
		$imglink=$attr['markerimage'];
	}							
	$returnme = '<div class="map-split gm-shortcode"><div id="' .$randomId . '" style="width:' . $attr['w'] . 'px;height:' . $attr['h'] . 'px;" class="'.$attr['class'].'"></div></div>
  
	<script type="text/javascript">
    	var latlng = new google.maps.LatLng(' . $attr['lat'] . ', ' . $attr['lon'] . ');
		var myOptions = {
			zoom: ' . $attr['z'] . ',
			center: latlng,
			scrollwheel:false,
			mapTypeId: google.maps.MapTypeId.' . $attr['maptype'] . '
		};
		var ' . $randomId . ' = new google.maps.Map(document.getElementById("' . $randomId . '"),
		myOptions);
		';
				
		//kml
		if($attr['kml'] != '') 
		{
			//Wordpress converts "&" into "&#038;", so converting those back
			$thiskml = str_replace("&#038;","&",$attr['kml']);		
			$returnme .= '
			var kmllayer = new google.maps.KmlLayer(\'' . $thiskml . '\');
			kmllayer.setMap(' . $randomId . ');
			';
		}
		
		//traffic
		if($attr['traffic'] == 'yes')
		{
			$returnme .= '
			var trafficLayer = new google.maps.TrafficLayer();
			trafficLayer.setMap(' . $randomId . ');
			';
		}
	
		//address
		if($attr['address'] != '')
		{
			$returnme .= '
		    var geocoder_' . $randomId . ' = new google.maps.Geocoder();
			var address = \'' . $attr['address'] . '\';
			geocoder_' . $randomId . '.geocode( { \'address\': address}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					' . $randomId . '.setCenter(results[0].geometry.location);
					';
					
					if ($attr['marker'] !='')
					{
						//add custom image
						if ($imglink!='')
						{
							$returnme .= 'var image = "'.$imglink .'";';
						}
						$returnme .= '
						var marker = new google.maps.Marker({
							map: ' . $randomId . ', 
							';
							if ($attr['markerimage'] !='')
							{
								$returnme .= 'icon: image,';
							}
						$returnme .= '
							position: ' . $randomId . '.getCenter()
						});
						';

						//infowindow
						if($attr['infowindow'] != '') 
						{
							//first convert and decode html chars
							$thiscontent = htmlspecialchars_decode($attr['infowindow']);
							$returnme .= 'var contentString = \'' . $thiscontent . '\'
								var infowindow = new google.maps.InfoWindow({
								content: contentString
							});
										
							google.maps.event.addListener(marker, \'click\', function() {
							  infowindow.open(' . $randomId . ',marker);
							});
							';
						}
					}
			$returnme .= '
				} else {
				alert("Geocode was not successful for the following reason: " + status);
			}
			});
			';
		}

		//marker: show if address is not specified
		if ($attr['marker'] != '' && $attr['address'] == '')
		{
			//add custom image
			if ($attr['markerimage'] !='')
			{
				$returnme .= 'var image = "'.$imglink .'";';
			}

			$returnme .= '
				var marker = new google.maps.Marker({
				map: ' . $arandomId . ', 
				';
				if ($attr['markerimage'] !='')
				{
					$returnme .= 'icon: image,';
				}
			$returnme .= '
				position: ' . $randomId . '.getCenter()
			});
			';

			//infowindow
			if($attr['infowindow'] != '') 
			{
				$returnme .= '
				var contentString = \'' . $attr['infowindow'] . '\';
				var infowindow = new google.maps.InfoWindow({
					content: contentString
				});
							
				google.maps.event.addListener(marker, \'click\', function() {
				  infowindow.open(' . $randomId . ',marker);
				});
	
				';
			}
		}

		$returnme .= '
		
		</script>';

		return $returnme;
	?>
    

	<?php
}
add_shortcode('map', 'mapme');


/*********************Pricing Table***************/
function alc_pricing($atts, $content=NULL){
    extract(shortcode_atts(array(
        'anim' => '',
		'title' => '',
		'currency'=>'',
		'price'=>'',
		'fbutton'=>'',
		'fbutlink'=>'',
		'class'=>''
					), $atts));
	$GLOBALS['column_count'] = 0;
	$counter = 0;
    $anim=(!empty($anim)) ? 'animation '.$anim : '';
	do_shortcode($content);
	$out='';
	$out.='<div class="price-shortcode pricing '.$anim.' '.$class.'">
				<div class="pricingInner">
				<ul class="list-group">
					<li class="list-group-item">
						<h3>'.$title.'</h3>
						<h5>'.$currency.$price.'</h5>
					</li>';
				if( is_array( $GLOBALS['columns'] ) ){
					foreach( $GLOBALS['columns'] as $column ){
						$columns[]='<li class="list-group-item">'.do_shortcode($column['content']).'</li>';
						$counter++;
					}
				$out.=implode( "\n", $columns );
				$out.='<li class="list-group-item">
							<a href="'.$fbutlink.'">'.$fbutton.'</a>
						</li>
					</ul>';
		unset($GLOBALS['columns']);
	}
			$out.='</div>
			</div>';
		
	
	return $out;	
}
add_shortcode('av_pricing', 'alc_pricing');

/************************/
function alc_column( $atts, $content = null){
	extract(shortcode_atts(array(
		'colcontent' => ''
	), $atts));
	
	$x = $GLOBALS['column_count'];
	$GLOBALS['columns'][$x] = array( 'content'=>$content);
	
	$GLOBALS['column_count']++;
	}
add_shortcode('av_column', 'alc_column');
/**************************************************/


/******************** Divider **********************/
function alc_divider( $atts, $content = null ) {
	extract(shortcode_atts(array( 
		'type'=>'',
		'customsize'=>'',
		'anim'=>'',
		'class'=>''
		), $atts)
	);
	$out = '';
	$anim = empty($anim) ? '' : "animation $anim";
	$customsize = (isset($customsize) && !empty($customsize))  ? ' style="margin-bottom:'.$customsize.'px !important; clear:both;"' : '';
	if ($type=='blank-spacer') {
		$out='<div class="clearfix '.$anim.' '.$class.'" '.$customsize.'></div>';
	}
	elseif($type=='line'){
		$out='<div class="line-spacer '.$anim.' '.$class.'"></div>';
	}
	return $out;
}
add_shortcode('divider', 'alc_divider');


/*********************Single image***************/
function alc_regimage($atts, $content=NULL){
    extract(shortcode_atts(array(
		'image' =>'',
        'anim' => '',
		'alt'=>'',
		'link'=>'',
		'class'=>''
	), $atts));

    $anim=(!empty($anim)) ? 'animation '.$anim : '';
	$out='';
	$imglink='';
		if(function_exists('vc_map')){
			$limage = wp_get_attachment_image_src($image, 'full');
			$imglink.=$limage[0];
		}else{
			$imglink=$image;
		}
	if($link){
		$out.='<a href="'.$link.'">';
	}
	$out.='<img src="'.$imglink.'" class="img-responsive '.$anim.' '.$class.'" alt="'.$alt.'">';
	if($link){
		$out.='</a>';
	}	
	
	return $out;	
}
add_shortcode('regimage', 'alc_regimage');
/**********************Timeline*******************/
function alc_timeline($atts, $content=NULL){
    extract(shortcode_atts(array(
        'anim' => '',
		'class' => '',
		'type'=>'horizontal',
	), $atts));
	$GLOBALS['timeitem_count'] = 0;
	$counter=0;
    $anim=isset($anim) ? 'animation '.$anim : '';
	do_shortcode($content);
	$return='';
	if($type=='horizontal'){
		if( is_array( $GLOBALS['timeitems'] ) ){
			foreach( $GLOBALS['timeitems'] as $timeitem ){
			$timeitems[]='<div class="item">
							<div class="marker"></div>
							<div class="content"><span class="time-title">'.$timeitem['title'].'</span>'.do_shortcode($timeitem['content']).'</div>
							<div class="year">'.$timeitem['date'].'</div>
						</div>';
			$counter++;
			}
			$return.= '<div id="timeline" class="education clearfix '.$anim.' '.$class.'">'.implode( "\n", $timeitems ).'<div class="line"></div></div>';
			unset($GLOBALS['timeitems']);
		}
	}elseif ($type=='vertical') {
		if( is_array( $GLOBALS['timeitems'] ) ){
			foreach( $GLOBALS['timeitems'] as $timeitem ){
			$timeitems[]='<div class="experience-block clearfix">
								<div class="meta">
									<span class="year">'.$timeitem['date'].'</span>
									<span class="company">'.$timeitem['title'].'</span>
								</div>
								<div class="content">
									'.do_shortcode($timeitem['content']).'
								</div>
								<div class="icon">
									<i class="'.$timeitem['family'].' '.$timeitem['icon'].'"></i>
								</div>
								<div class="line"></div>
							</div>';
			$counter++;
			}
			$return.= '<div id="timeline2" class="experience-block clearfix '.$anim.' '.$class.'">'.implode( "\n", $timeitems ).'</div>';
			unset($GLOBALS['timeitems']);
		}
	}
	
	return $return;	
}

add_shortcode('timeline', 'alc_timeline');
/*******************************************/
 function alc_timeitem( $atts, $content = null){
	extract(shortcode_atts(array(
		'title' => '',
		'date' => '',
		'family' => '',
		'icon' => ''
	), $atts));
	
	$x = $GLOBALS['timeitem_count'];
	$GLOBALS['timeitems'][$x] = array( 'title'=>$title, 'date'=>$date, 'family'=>$family, 'icon'=>$icon,  'content'=>$content);
	
	$GLOBALS['timeitem_count']++;
	}
add_shortcode('timeitem', 'alc_timeitem');
/*******************************************/
/*********************** COLUMNS *************************/

function Sility_one_whole( $atts, $content = null ) {
	return '<div class="col-md-12">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_whole', 'Sility_one_whole');

function Sility_one_half( $atts, $content = null ) {

	return '<div class="col-md-6">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'Sility_one_half');


function Sility_one_third( $atts, $content = null ) {
	return '<div class="col-md-4">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'Sility_one_third');


function Sility_two_third( $atts, $content = null ) {
	return '<div class="col-md-8">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'Sility_two_third');


function Sility_one_fourth( $atts, $content = null ) {

	return '<div class="col-md-3">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'Sility_one_fourth');

function Sility_three_fourth( $atts, $content = null ) {
	return '<div class="col-md-9">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth', 'Sility_three_fourth');

function Sility_one_sixth( $atts, $content = null ) {
	return '<div class="col-md-2">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_sixth', 'Sility_one_sixth');

function Sility_five_twelveth( $atts, $content = null ) {
	return '<div class="col-md-5">' . do_shortcode($content) . '</div>';
}
add_shortcode('five_twelveth', 'Sility_five_twelveth');

function Sility_seven_twelveth( $atts, $content = null ) {
	return '<div class="col-md-7">' . do_shortcode($content) . '</div>';
}
add_shortcode('seven_twelveth', 'Sility_seven_twelveth');

function Sility_five_sixth( $atts, $content = null ) {
	return '<div class="col-md-10">' . do_shortcode($content) . '</div>';
}
add_shortcode('five_sixth', 'Sility_five_sixth');

function Sility_row( $atts, $content = null ) {
   return '<div class="row">' . do_shortcode($content) . '</div>';
}
add_shortcode('row', 'Sility_row');

function Sility_inner_row( $atts, $content = null ) {
   return '<div class="row">' . do_shortcode($content) . '</div>';
}
add_shortcode('inner_row', 'Sility_inner_row');
/************************************************/


/******************** CLEAR *********************/

function alc_clear($atts, $content = null) {	
	return '<div class="clearfix"></div>';
}
add_shortcode('clear', 'alc_clear');


/******** SHORTCODE SUPPORT FOR WIDGETS *********/

if (function_exists ('shortcode_unautop')) {
	add_filter ('widget_text', 'shortcode_unautop');
}
add_filter ('widget_text', 'do_shortcode');

/************************************************/
?>