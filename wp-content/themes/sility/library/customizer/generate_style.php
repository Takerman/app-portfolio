<?php echo '<style type="text/css">' ;?>
	<?php  $maincolor = get_theme_mod('global_color'); $rtl =  weblusive_get_option('rtl_mode'); if (!empty($maincolor)):
		$bg = HexToRGB($maincolor);
		
	?>
		/******************global color****************************/
		
		/*****background******/
		
		.header .top, .action-button, .slide-out-header, .main-nav li ul.dropdown-menu li a:hover, .main-nav li ul.dropdown-menu li.active a,
		.sidebar-widget .search-widget .input-group, .footer-widget .search-widget .input-group, .widget_categories ul li span.count, ul.wp-tag-cloud li a:hover,
		.solid-button.purple,.social-icon:hover, .tweet .twitter-item i.fa-twitter, .progress-bar-sility, .btn.purple, .tabs-shortcode ul.nav-tabs li a,
		.service:hover, .icon-box:hover .icon, .experience-block .meta .year, .solid-button.white-purple:hover, .testimonial-slider .sep, 
		.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span, #wp-calendar caption, .widget-tab ul.nav-tabs li a,
		.price-shortcode.pricing .pricingInner .list-group .list-group-item:first-child, 
		.price-shortcode.pricing .pricingInner .list-group .list-group-item:last-child a, 
		.price-shortcode.pricing .pricingInner .list-group:hover .list-group-item:last-child,.popup .social-nav ul li a:hover
		{
			background-color:<?php echo $maincolor?>;
		}
		.wpcf7-submit
		{
			background-color:<?php echo $maincolor?> !important;
		}
		
		/*****color*****/
		
		 a, a:hover, .widget_categories ul li:before, .widget_alc_blogposts p span,  .nav-tabs>li.active>a,
		 .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus, .widget-tab p span, .tweet .twitter-item a, .tweet a:hover, blockquote footer,
		 .nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus, .list-icons.purple > li > i,
		 .single-blog-post .blog-header .content .date, .single-blog-post .blog-details .tags a:hover, .comment .reply i, 
		 .widget_alc_blogposts h4.entry-title a:hover, .price-shortcode.pricing .pricingInner .list-group:hover .list-group-item:last-child a,
		 .widget-tab h4.entry-title a:hover, .price-shortcode.pricing .pricingInner .list-group:hover .list-group-item:first-child h3,
		 .price-shortcode.pricing .pricingInner .list-group:hover .list-group-item:first-child h5
		{
			color:<?php echo $maincolor?>;
		}

		
		/*border color*/
		input:not([type=submit]):not([type=file]):focus, select:focus, textarea:focus, .line-spacer:before, .line-spacer:after,
		.education .item .marker, .education .line:before, .education .line:after
		{
			border-color:<?php echo $maincolor?>;
		}
		.testimonial-slider .sep:after{
			border-color:<?php echo $maincolor?> transparent;
		}
		.experience-block .meta:after{
			border-color:<?php echo $maincolor?> transparent transparent transparent;
		}
		input[type='submit'], .wpcf7-submit{border-color:<?php echo $maincolor?> !important}
		
		/******border bottom color******/
		.main-nav ul>li.active>a, .main-nav ul>li>a:hover, .sidebar-widget h4.widget-title{
			border-bottom-color:<?php echo $maincolor?>;
		}
		
		/******border left color******/
		blockquote{
			border-left-color:<?php echo $maincolor?>;
		}
		
		<?php $newcolor = HexToRGB($maincolor, 1);?>
		.portfolio .item .overlay .background{background:rgba(<?php echo $newcolor['r'].','.$newcolor['g'].','.$newcolor['b'].', 0.9'?>)}
		::-moz-selection{background-color:<?php echo $maincolor?>;}
		::selection {background-color:<?php echo $maincolor?>;}
		<?php if ($rtl):?><?php endif?>
	<?php endif?>
	<?php if( get_option('topnav_bg_image') || get_theme_mod( 'topnav_bg_color')):?>
	/*********************   TOP NAVIGATION   **************************/
		.header .top{
			<?php if(get_theme_mod('topnav_bg_color')) : ?>background-color:<?php echo get_theme_mod('topnav_bg_color'); ?>; <?php endif; ?>
			<?php if(get_option('topnav_bg_image')) : ?>background-image:url('<?php   echo get_option('topnav_bg_image') ?>');   <?php endif; ?>
			<?php if(get_theme_mod('topnav_bg_repeat')) : ?>background-repeat:<?php echo get_theme_mod('topnav_bg_repeat');?>; <?php endif; ?>
		}
	<?php endif; ?>
	<?php if(get_theme_mod('topnav_text')):?>
		.header .top .header .top p{color:<?php echo get_theme_mod('topnav_text')?> }
	<?php endif?>
	<?php if( get_theme_mod('topnav_link_color')):?>
		.header .top a{color:<?php echo get_theme_mod('topnav_link_color')?> !important;}
	<?php endif?>
	
	<?php if(get_theme_mod('topnav_link_color_hov')):?>
		.header .top a:hover{color:<?php echo get_theme_mod('topnav_link_color_hov')?> !important}
	<?php endif?> 	
	<?php if(true===get_theme_mod('bg_size') && (get_option('bg_image') || get_theme_mod('bg_color'))) :?>		
		/****************Custom background**************************/
		body{
			background-color:<?php echo get_theme_mod('bg_color'); ?>;
			background: url('<?php echo get_option('bg_image'); ?>') no-repeat center center fixed !important;
			background-size: cover;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo get_option('bg_image') ?>',sizingMethod='scale') !important;<?php echo "\n"; ?>
			-ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo get_option('bg_image') ?>',sizingMethod='scale')" !important;<?php echo "\n"; ?>
			
		}
	<?php elseif(false===get_theme_mod('bg_size') && (get_option('bg_image') || get_theme_mod('bg_color'))) : ?>
		/****************Custom background**************************/
		body{
			<?php if(get_theme_mod('bg_color')) : ?>background-color:<?php echo get_theme_mod('bg_color'); ?>; <?php endif; ?>
			<?php if(get_option('bg_image')) : ?>background-image:url('<?php   echo get_option('bg_image') ?>');   <?php endif; ?>
			<?php if(get_theme_mod('bg_repeat')) : ?>background-repeat:<?php echo get_theme_mod('bg_repeat');?>; <?php endif; ?>
			<?php if(get_theme_mod('bg_att')) : ?>background-attachment:<?php echo get_theme_mod('bg_att');?>; <?php endif; ?>
			<?php $hor = get_theme_mod('bg_hor');  $ver = get_theme_mod('bg_ver'); if (!$hor) $hor=0; if (!$ver) $ver=0; ?>
			background-position:<?php echo $hor.' '.$ver ?>; 
		}
	<?php endif;?>
	<?php if( get_theme_mod('header_bg_color') || get_theme_mod('header_bg_image') || get_theme_mod('header_bg_repeat') || get_option('header_bg_image')):?>
		/*************************Header*****************/
		.header .bottom{
			<?php if(get_theme_mod('header_bg_color')) : ?>background-color:<?php echo get_theme_mod('header_bg_color'); ?>;<?php endif; ?>
			<?php if(get_option('header_bg_image')) : ?>background-image:url('<?php echo get_option('header_bg_image') ?>'); <?php endif; ?>
			<?php if(get_theme_mod('header_bg_repeat')) : ?>background-repeat:<?php echo get_theme_mod('header_bg_repeat')?>;<?php endif; ?>
			<?php if(get_theme_mod('header_bg_att')) : ?>background-attachment:<?php echo get_theme_mod('header_bg_att')?>;<?php endif; ?>
			<?php $hor = get_theme_mod('header_bg_hor');  $ver = get_theme_mod('header_bg_ver'); if (!$hor) $hor=0; if (!$ver) $ver=0; ?>
			background-position:<?php echo $hor.' '.$ver ?>; 
		}
		
	<?php endif?>

		<?php if(get_option('footer_bg_image') || get_theme_mod('footer_bg_color')):?>
		/********************footer*******************/
		.footer .top{
			<?php if(get_theme_mod('footer_bg_color')): ?>background-color: <?php echo get_theme_mod('footer_bg_color')?>;<?php endif?>
			<?php if(get_option('footer_bg_image')) : ?>background-image:url('<?php echo get_option('footer_bg_image') ?>');<?php endif; ?>
			<?php if(get_theme_mod('footer_bg_repeat')): ?>background-repeat: <?php echo get_theme_mod('footer_bg_repeat')?>;<?php endif?>
			<?php if(get_theme_mod('footer_bg_att')): ?>background-attachment: <?php echo get_theme_mod('footer_bg_att')?>;<?php endif?>
			<?php $hor = get_theme_mod('footer_bg_hor');  $ver = get_theme_mod('footer_bg_ver'); if (!$hor) $hor=0; if (!$ver) $ver=0; ?>
			background-position:<?php echo $hor.' '.$ver ?>; 
		}
		<?php endif?>
		<?php if(get_option('footerbottom_bg_image') || get_theme_mod('footerbottom_bg_color')):?>
		.footer .bottom{
			<?php if(get_theme_mod('footerbottom_bg_color')): ?>background-color: <?php echo get_theme_mod('footerbottom_bg_color')?>;<?php endif?>
			<?php if(get_option('footerbottom_bg_image')) : ?>background-image:url('<?php echo get_option('footerbottom_bg_image') ?>');<?php endif; ?>
			<?php if(get_theme_mod('footerbottom_bg_repeat')): ?>background-repeat: <?php echo get_theme_mod('footerbottom_bg_repeat')?>;<?php endif?>
			<?php if(get_theme_mod('footerbottom_bg_att')): ?>background-attachment: <?php echo get_theme_mod('footerbottom_bg_att')?>;<?php endif?>
			<?php $hor = get_theme_mod('footerbottom_bg_hor');  $ver = get_theme_mod('footerbottom_bg_ver'); if (!$hor) $hor=0; if (!$ver) $ver=0; ?>
			background-position:<?php echo $hor.' '.$ver ?>; 
		}
		<?php if(get_theme_mod('footerbottom_text_color')): ?>.footer .bottom, .footer .bottom p{color:<?php echo get_theme_mod('footerbottom_text_color')?>}<?php endif?> 
		<?php if(get_theme_mod('footerbottom_links_color')): ?>.footer .bottom a{color:<?php echo get_theme_mod('footerbottom_links_color')?>}<?php endif?> 
		<?php if(get_theme_mod('footerbottom_links_color_hov')): ?>.footer .bottom a:hover{color:<?php echo get_theme_mod('footerbottom_links_color_hov')?>}<?php endif?>
		<?php endif?>
		<?php $ftc = get_theme_mod('footer_title_color'); if (!empty($ftc)):?>
			.footer h4.footer-title{color:<?php echo $ftc ?>;}
		<?php endif?>
		<?php $flc = get_theme_mod('footer_links_color'); if (!empty($flc)):?>
		.footer .footer-widget a, .footer .footer-widget li a{color:<?php echo $flc ?>;}
		<?php endif?>
		<?php $flch = get_theme_mod('footer_links_color_hov'); if (!empty($flch)):?>
		.footer .footer-widget a:hover, .footer .footer-widget li a:hover{color:<?php echo $flch ?>;}
		<?php endif?>
		<?php if(get_theme_mod('link_color') || get_theme_mod('link_decor')):?>
		/***********************Links*************************/
		a{
			color:<?php echo get_theme_mod('link_color'); ?>;
			text-decoration:<?php echo get_theme_mod('link_decor'); ?>;
		}
		<?php endif?>
		<?php if(get_theme_mod('link_color_hov') || get_theme_mod('link_decor_hov')):?>
		a:hover{
			color:<?php echo get_theme_mod('link_color_hov'); ?>;
			text-decoration:<?php echo get_theme_mod('link_decor_hov'); ?> ;
		}
		<?php endif?>
		<?php if (get_option('nav_bg_image') || get_theme_mod('nav_bg_color')):?>
		/****************** MAIN NAVIGATION *******************/
			.navbar-default>.container{
				<?php if(get_theme_mod('nav_bg_color')) : ?>background:<?php echo get_theme_mod('nav_bg_color'); ?>; <?php endif; ?>
				<?php if(get_option('nav_bg_image')) : ?>background-image:url('<?php echo get_option('nav_bg_image') ?>');   <?php endif; ?>
				<?php if(get_theme_mod('nav_bg_repeat')) : ?>background-repeat:<?php echo get_theme_mod('nav_bg_repeat');?>; <?php endif; ?>
				<?php if(get_theme_mod('nav_bg_att')) : ?>background-attachment:<?php echo get_theme_mod('nav_bg_att');?>; <?php endif; ?>
				<?php $hor = get_theme_mod('nav_bg_hor');  $ver = get_theme_mod('nav_bg_ver'); if (!$hor) $hor=0; if (!$ver) $ver=0; ?>
				background-position:<?php echo $hor.' '.$ver ?>;
				
			}
			nav ul.nav.navbar-nav>li{background:transparent;}
		<?php endif?>
		<?php if(get_theme_mod('nav_links_color')):?>.header .main-nav ul>li>a{color:<?php echo get_theme_mod('nav_links_color'); ?>;}<?php endif?>
		<?php if(get_theme_mod('nav_links_color_hover')):?>.main-nav ul>li>a:hover{color:<?php echo get_theme_mod('nav_links_color_hover'); ?> !important;}<?php endif?>
		<?php if(get_theme_mod('nav_current_links_color') || get_theme_mod('nav_current_bg')):?>
		.main-nav ul>li.active>a{
			<?php $nclc = get_theme_mod('nav_current_links_color'); if($nclc):?> color:<?php echo $nclc?> !important;<?php endif?>
			<?php $nclb = get_theme_mod('nav_current_bg'); if($nclb):?>border-bottom-color:<?php echo $nclb?> !important;<?php endif?>
		}
		.main-nav ul>li>a:hover{
			<?php $nclb = get_theme_mod('nav_current_bg'); if($nclb):?>border-bottom-color:<?php echo $nclb?> !important;<?php endif?>
		}
		<?php endif; ?>
		<?php if(get_theme_mod('sub_nav_color')):?>.main-nav ul li ul.dropdown-menu > li > a{color:<?php echo get_theme_mod('sub_nav_color'); ?>;}<?php endif?>
		<?php if(get_theme_mod('sub_nav_background')):?>.main-nav ul li ul.dropdown-menu{background:<?php echo get_theme_mod('sub_nav_background'); ?> }<?php endif?>
		<?php if(get_theme_mod('sub_nav_hover_background')):?>.main-nav ul li ul.dropdown-menu > li > a:hover{background:<?php echo get_theme_mod('sub_nav_hover_background'); ?> }<?php endif?>
		<?php if(get_theme_mod('sub_nav_hover_color')):?>.main-nav ul li ul.dropdown-menu > li > a:hover {color:<?php echo get_theme_mod('sub_nav_hover_color'); ?> !important}<?php endif?>
		<?php $sep = get_theme_mod( 'nav_separator' ); if($sep): $newborder = HexToRGB($sep, 1); ?>
			.main-nav ul li ul.dropdown-menu > li > a{border-bottom: 1px solid <?php echo get_theme_mod( 'nav_separator' ); ?>;}
		<?php endif; ?>		
		<?php
		function sility_enqueue_font ( $got_font) {
			if ($got_font) {
			
				
				$font_pieces = explode(":", $got_font);
				
				$font_name = $font_pieces[0];
				$font_type = $font_pieces[1];
				
				if( $font_type == 'non-google' ){
					
				}elseif( $font_type == 'early-google'){
					$font_name_link = str_replace (" ","", $font_pieces[0] );
					$protocol = is_ssl() ? 'https' : 'http';
					wp_enqueue_style( $font_name , $protocol.'://fonts.googleapis.com/earlyaccess/'.$font_name_link.'.css');
				}else{
					$font_name_link = str_replace (" ","+", $font_pieces[0] );
					$font_variants = str_replace ("|",",", $font_pieces[1] );
					$protocol = is_ssl() ? 'https' : 'http';
					wp_enqueue_style( $font_name , $protocol.'://fonts.googleapis.com/css?family='.$font_name_link.':'.$font_variants);
				}
				return $font_name;      
			}
				 
		}
		?>	
		<?php if(get_theme_mod('main_typ_font') || get_theme_mod('main_typ_size') || get_theme_mod('main_typ_weight') || get_theme_mod('main_typ_style')):?>
		body, p, li, .acc-shortcode .panel-body{
			<?php $maintyp=get_theme_mod('main_typ_font'); echo (isset($maintyp) && !empty($maintyp) ) ? 'font-family:'.sility_enqueue_font($maintyp).' !important;' : '' ?>
			<?php $maintypsize=get_theme_mod('main_typ_size'); echo (isset($maintypsize) && !empty($maintypsize) ) ? 'font-size:'.$maintypsize.'px ;' : '' ?>
			<?php $maintypweight=get_theme_mod('main_typ_weight'); echo (isset($maintypweight) && !empty($maintypweight) ) ? 'font-weight:'.$maintypweight.';' : '' ?>
			<?php $maintypstyle=get_theme_mod('main_typ_style'); echo (isset($maintypstyle) && !empty($maintypstyle) ) ? 'font-style:'.$maintypstyle.';' : '' ?>
		}
		<?php endif; ?>
		<?php if(get_theme_mod('main_typ_col')):?>
		body, p, li, .acc-shortcode .panel-body{
			<?php $maintypcol=get_theme_mod('main_typ_col'); echo (isset($maintypcol) && !empty($maintypcol) ) ? 'color:'.$maintypcol.';' : '' ?>
		}	
		<?php endif; ?>
		<?php if(get_theme_mod('log_typ_font') || get_theme_mod('log_typ_col') || get_theme_mod('log_typ_size') || get_theme_mod('log_typ_weight') || get_theme_mod('log_typ_style') ):?>
		.header .bottom .title a{
			<?php $logtyp=get_theme_mod('log_typ_font'); echo (isset($logtyp) && !empty($logtyp) ) ? 'font-family:'.sility_enqueue_font($logtyp).' !important;' : '' ?>
			<?php $logtypcol=get_theme_mod('log_typ_col'); echo (isset($logtypcol) && !empty($logtypcol) ) ? 'color:'.$logtypcol.';' : '' ?>
			<?php $logtypsize=get_theme_mod('log_typ_size'); echo (isset($logtypsize) && !empty($logtypsize) ) ? 'font-size:'.$logtypsize.'px;' : '' ?>
			<?php $logtypweight=get_theme_mod('log_typ_weight'); echo (isset($logtypweight) && !empty($logtypweight) ) ? 'font-weight:'.$logtypweight.';' : '' ?>
			<?php $logtypstyle=get_theme_mod('log_typ_style'); echo (isset($logtypstyle) && !empty($logtypstyle) ) ? 'font-style:'.$logtypstyle.';' : '' ?>
		}
		<?php endif; ?>
		<?php if(get_theme_mod('nav_typ_font') || get_theme_mod('nav_typ_size') || get_theme_mod('nav_typ_weight') || get_theme_mod('nav_typ_style')):?>
		.main-nav ul>li>a{
			<?php $navtyp=get_theme_mod('nav_typ_font'); echo (isset($navtyp) && !empty($navtyp) ) ? 'font-family:'.sility_enqueue_font($navtyp).' !important;' : '' ?>
			<?php $navtypsize=get_theme_mod('nav_typ_size'); echo (isset($navtypsize) && !empty($navtypsize) ) ? 'font-size:'.$navtypsize.'px;' : '' ?>
			<?php $navtypweight=get_theme_mod('nav_typ_weight'); echo (isset($navtypweight) && !empty($navtypweight) ) ? 'font-weight:'.$navtypweight.';' : '' ?>
			<?php $navtypstyle=get_theme_mod('nav_typ_style'); echo (isset($navtypstyle) && !empty($navtypstyle) ) ? 'font-style:'.$navtypstyle.';' : '' ?>
		}
		<?php endif; ?>
		<?php if(get_theme_mod('h1_typ_font') || get_theme_mod('h1_typ_col') || get_theme_mod('h1_typ_size') || get_theme_mod('h1_typ_weight') || get_theme_mod('h1_typ_style') ):?>
		h1{
			<?php $h1typ=get_theme_mod('h1_typ_font'); echo (isset($h1typ) && !empty($h1typ) ) ? 'font-family:'.sility_enqueue_font($h1typ).' !important;' : '' ?>
			<?php $h1typcol=get_theme_mod('h1_typ_col'); echo (isset($h1typcol) && !empty($h1typcol) ) ? 'color:'.$h1typcol.';' : '' ?>
			<?php $h1typsize=get_theme_mod('h1_typ_size'); echo (isset($h1typsize) && !empty($h1typsize) ) ? 'font-size:'.$h1typsize.'px ;' : '' ?>
			<?php $h1typweight=get_theme_mod('h1_typ_weight'); echo (isset($h1typweight) && !empty($h1typweight) ) ? 'font-weight:'.$h1typweight.';' : '' ?>
			<?php $h1typstyle=get_theme_mod('h1_typ_style'); echo (isset($h1typstyle) && !empty($h1typstyle) ) ? 'font-style:'.$h1typstyle.';' : '' ?>
		}
		<?php endif; ?>
		<?php if(get_theme_mod('h2_typ_font') || get_theme_mod('h2_typ_col') || get_theme_mod('h2_typ_size') || get_theme_mod('h2_typ_weight') || get_theme_mod('h2_typ_style') ):?>
		h2{
			<?php $h2typ=get_theme_mod('h2_typ_font'); echo (isset($h2typ) && !empty($h2typ) ) ? 'font-family:'.sility_enqueue_font($h2typ).' !important;' : '' ?>
			<?php $h2typcol=get_theme_mod('h2_typ_col'); echo (isset($h2typcol) && !empty($h2typcol) ) ? 'color:'.$h2typcol.';' : '' ?>
			<?php $h2typsize=get_theme_mod('h2_typ_size'); echo (isset($h2typsize) && !empty($h2typsize) ) ? 'font-size:'.$h2typsize.'px ;' : '' ?>
			<?php $h2typweight=get_theme_mod('h2_typ_weight'); echo (isset($h2typweight) && !empty($h2typweight) ) ? 'font-weight:'.$h2typweight.';' : '' ?>
			<?php $h2typstyle=get_theme_mod('h2_typ_style'); echo (isset($h2typstyle) && !empty($h2typstyle) ) ? 'font-style:'.$h2typstyle.';' : '' ?>
		}
		<?php endif; ?>
		<?php if(get_theme_mod('h3_typ_font') || get_theme_mod('h3_typ_col') || get_theme_mod('h3_typ_size') || get_theme_mod('h3_typ_weight') || get_theme_mod('h3_typ_style') ):?>
		h3{
			<?php $h3typ=get_theme_mod('h3_typ_font'); echo (isset($h3typ) && !empty($h3typ) ) ? 'font-family:'.sility_enqueue_font($h3typ).' !important;' : '' ?>
			<?php $h3typcol=get_theme_mod('h3_typ_col'); echo (isset($h3typcol) && !empty($h3typcol) ) ? 'color:'.$h3typcol.';' : '' ?>
			<?php $h3typsize=get_theme_mod('h3_typ_size'); echo (isset($h3typsize) && !empty($h3typsize) ) ? 'font-size:'.$h3typsize.'px ;' : '' ?>
			<?php $h3typweight=get_theme_mod('h3_typ_weight'); echo (isset($h3typweight) && !empty($h3typweight) ) ? 'font-weight:'.$h3typweight.';' : '' ?>
			<?php $h3typstyle=get_theme_mod('h3_typ_style'); echo (isset($h3typstyle) && !empty($h3typstyle) ) ? 'font-style:'.$h3typstyle.';' : '' ?>
		}
		<?php endif; ?>
		<?php if(get_theme_mod('h4_typ_font') || get_theme_mod('h4_typ_col') || get_theme_mod('h4_typ_size') || get_theme_mod('h4_typ_weight') || get_theme_mod('h4_typ_style') ):?>
		h4{
			<?php $h4typ=get_theme_mod('h4_typ_font'); echo (isset($h4typ) && !empty($h4typ) ) ? 'font-family:'.sility_enqueue_font($h4typ).' !important;' : '' ?>
			<?php $h4typcol=get_theme_mod('h4_typ_col'); echo (isset($h4typcol) && !empty($h4typcol) ) ? 'color:'.$h4typcol.';' : '' ?>
			<?php $h4typsize=get_theme_mod('h4_typ_size'); echo (isset($h4typsize) && !empty($h4typsize) ) ? 'font-size:'.$h4typsize.'px ;' : '' ?>
			<?php $h4typweight=get_theme_mod('h4_typ_weight'); echo (isset($h4typweight) && !empty($h4typweight) ) ? 'font-weight:'.$h4typweight.';' : '' ?>
			<?php $h4typstyle=get_theme_mod('h4_typ_style'); echo (isset($h4typstyle) && !empty($h4typstyle) ) ? 'font-style:'.$h4typstyle.';' : '' ?>
		}
		<?php endif; ?>
		<?php if(get_theme_mod('h5_typ_font') || get_theme_mod('h5_typ_col') || get_theme_mod('h5_typ_size') || get_theme_mod('h5_typ_weight') || get_theme_mod('h5_typ_style') ):?>
		h5{
			<?php $h5typ=get_theme_mod('h5_typ_font'); echo (isset($h5typ) && !empty($h5typ) ) ? 'font-family:'.sility_enqueue_font($h5typ).' !important;' : '' ?>
			<?php $h5typcol=get_theme_mod('h5_typ_col'); echo (isset($h5typcol) && !empty($h5typcol) ) ? 'color:'.$h5typcol.';' : '' ?>
			<?php $h5typsize=get_theme_mod('h5_typ_size'); echo (isset($h5typsize) && !empty($h5typsize) ) ? 'font-size:'.$h5typsize.'px ;' : '' ?>
			<?php $h5typweight=get_theme_mod('h5_typ_weight'); echo (isset($h5typweight) && !empty($h5typweight) ) ? 'font-weight:'.$h5typweight.';' : '' ?>
			<?php $h5typstyle=get_theme_mod('h5_typ_style'); echo (isset($h5typstyle) && !empty($h5typstyle) ) ? 'font-style:'.$h5typstyle.';' : '' ?>
		}
		<?php endif; ?>
		<?php if(get_theme_mod('h6_typ_font') || get_theme_mod('h6_typ_col') || get_theme_mod('h6_typ_size') || get_theme_mod('h6_typ_weight') || get_theme_mod('h6_typ_style') ):?>
		h6{
			<?php $h6typ=get_theme_mod('h6_typ_font'); echo (isset($h6typ) && !empty($h6typ) ) ? 'font-family:'.sility_enqueue_font($h6typ).' !important;' : '' ?>
			<?php $h6typcol=get_theme_mod('h6_typ_col'); echo (isset($h6typcol) && !empty($h6typcol) ) ? 'color:'.$h6typcol.';' : '' ?>
			<?php $h6typsize=get_theme_mod('h6_typ_size'); echo (isset($h6typsize) && !empty($h6typsize) ) ? 'font-size:'.$h6typsize.'px ;' : '' ?>
			<?php $h6typweight=get_theme_mod('h6_typ_weight'); echo (isset($h6typweight) && !empty($h6typweight) ) ? 'font-weight:'.$h6typweight.';' : '' ?>
			<?php $h6typstyle=get_theme_mod('h6_typ_style'); echo (isset($h6typstyle) && !empty($h6typstyle) ) ? 'font-style:'.$h6typstyle.';' : '' ?>
		}
		<?php endif; ?>
		<?php if(get_theme_mod('ptit_typ_font') || get_theme_mod('ptit_typ_col') || get_theme_mod('ptit_typ_size') || get_theme_mod('ptit_typ_weight') || get_theme_mod('ptit_typ_style') ):?>
		h2.onetitle{
			<?php $ptittyp=get_theme_mod('ptit_typ_font'); echo (isset($ptittyp) && !empty($ptittyp) ) ? 'font-family:'.sility_enqueue_font($ptittyp).' !important;' : '' ?>
			<?php $ptittypcol=get_theme_mod('ptit_typ_col'); echo (isset($ptittypcol) && !empty($ptittypcol) ) ? 'color:'.$ptittypcol.';' : '' ?>
			<?php $ptittypsize=get_theme_mod('ptit_typ_size'); echo (isset($ptittypsize) && !empty($ptittypsize) ) ? 'font-size:'.$ptittypsize.'px ;' : '' ?>
			<?php $ptittypweight=get_theme_mod('ptit_typ_weight'); echo (isset($ptittypweight) && !empty($ptittypweight) ) ? 'font-weight:'.$ptittypweight.';' : '' ?>
			<?php $ptittypstyle=get_theme_mod('ptit_typ_style'); echo (isset($ptittypstyle) && !empty($ptittypstyle) ) ? 'font-style:'.$ptittypstyle.';' : '' ?>
		}
		<?php endif; ?>
		<?php if(get_theme_mod('altptit_typ_font') || get_theme_mod('altptit_typ_col') || get_theme_mod('altptit_typ_size') || get_theme_mod('altptit_typ_weight') || get_theme_mod('altptit_typ_style') ):?>
		h2.page-title{
			<?php $altptittyp=get_theme_mod('altptit_typ_font'); echo (isset($altptittyp) && !empty($altptittyp) ) ? 'font-family:'.sility_enqueue_font($altptittyp).' !important;' : '' ?>
			<?php $altptittypcol=get_theme_mod('altptit_typ_col'); echo (isset($altptittypcol) && !empty($altptittypcol) ) ? 'color:'.$altptittypcol.' !important;' : '' ?>
			<?php $altptittypsize=get_theme_mod('altptit_typ_size'); echo (isset($altptittypsize) && !empty($altptittypsize) ) ? 'font-size:'.$altptittypsize.'px !important;' : '' ?>
			<?php $altptittypweight=get_theme_mod('altptit_typ_weight'); echo (isset($altptittypweight) && !empty($altptittypweight) ) ? 'font-weight:'.$altptittypweight.' !important;' : '' ?>
			<?php $altptittypstyle=get_theme_mod('altptit_typ_style'); echo (isset($altptittypstyle) && !empty($altptittypstyle) ) ? 'font-style:'.$altptittypstyle.' !important;' : '' ?>
		}
		<?php endif; ?>
		<?php if(get_theme_mod('tag_typ_font') || get_theme_mod('tag_typ_col') || get_theme_mod('tag_typ_size') || get_theme_mod('tag_typ_weight') || get_theme_mod('tag_typ_style') ):?>
		p.onesubtitle,  p.tagline{
			<?php $tagtyp=get_theme_mod('tag_typ_font'); echo (isset($tagtyp) && !empty($tagtyp) ) ? 'font-family:'.sility_enqueue_font($tagtyp).' !important;' : '' ?>
			<?php $tagtypcol=get_theme_mod('tag_typ_col'); echo (isset($tagtypcol) && !empty($tagtypcol) ) ? 'color:'.$tagtypcol.';' : '' ?>
			<?php $tagtypsize=get_theme_mod('tag_typ_size'); echo (isset($tagtypsize) && !empty($tagtypsize) ) ? 'font-size:'.$tagtypsize.'px ;' : '' ?>
			<?php $tagtypweight=get_theme_mod('tag_typ_weight'); echo (isset($tagtypweight) && !empty($tagtypweight) ) ? 'font-weight:'.$tagtypweight.';' : '' ?>
			<?php $tagtypstyle=get_theme_mod('tag_typ_style'); echo (isset($tagtypstyle) && !empty($tagtypstyle) ) ? 'font-style:'.$tagtypstyle.';' : '' ?>
		}
		<?php endif; ?>

		<?php if(get_theme_mod('wtit_typ_font') || get_theme_mod('wtit_typ_col') || get_theme_mod('wtit_typ_size') || get_theme_mod('wtit_typ_weight') || get_theme_mod('wtit_typ_style') ):?>
		.sidebar-widget h4.widget-title{
			<?php $wtittyp=get_theme_mod('wtit_typ_font'); echo (isset($wtittyp) && !empty($wtittyp) ) ? 'font-family:'.sility_enqueue_font($wtittyp).' !important;' : '' ?>
			<?php $wtittypcol=get_theme_mod('wtit_typ_col'); echo (isset($wtittypcol) && !empty($wtittypcol) ) ? 'color:'.$wtittypcol.';' : '' ?>
			<?php $wtittypsize=get_theme_mod('wtit_typ_size'); echo (isset($wtittypsize) && !empty($wtittypsize) ) ? 'font-size:'.$wtittypsize.'px ;' : '' ?>
			<?php $wtittypweight=get_theme_mod('wtit_typ_weight'); echo (isset($wtittypweight) && !empty($wtittypweight) ) ? 'font-weight:'.$wtittypweight.';' : '' ?>
			<?php $wtittypstyle=get_theme_mod('wtit_typ_style'); echo (isset($wtittypstyle) && !empty($wtittypstyle) ) ? 'font-style:'.$wtittypstyle.';' : '' ?>
		}
		
		<?php endif; ?>
		<?php if(get_theme_mod('ftit_typ_font') || get_theme_mod('ftit_typ_col') || get_theme_mod('ftit_typ_size') || get_theme_mod('ftit_typ_weight') || get_theme_mod('ftit_typ_style') ):?>
		.footer h4.footer-title{
			<?php $ftittyp=get_theme_mod('ftit_typ_font'); echo (isset($ftittyp) && !empty($ftittyp) ) ? 'font-family:'.sility_enqueue_font($ftittyp).' !important;' : '' ?>
			<?php $ftittypcol=get_theme_mod('ftit_typ_col'); echo (isset($ftittypcol) && !empty($ftittypcol) ) ? 'color:'.$ftittypcol.';' : '' ?>
			<?php $ftittypsize=get_theme_mod('ftit_typ_size'); echo (isset($ftittypsize) && !empty($ftittypsize) ) ? 'font-size:'.$ftittypsize.'px ;' : '' ?>
			<?php $ftittypweight=get_theme_mod('ftit_typ_weight'); echo (isset($ftittypweight) && !empty($ftittypweight) ) ? 'font-weight:'.$ftittypweight.';' : '' ?>
			<?php $ftittypstyle=get_theme_mod('ftit_typ_style'); echo (isset($ftittypstyle) && !empty($ftittypstyle) ) ? 'font-style:'.$ftittypstyle.';' : '' ?>
		}
		<?php endif; ?>
		
<?php echo '</style>'; ?>