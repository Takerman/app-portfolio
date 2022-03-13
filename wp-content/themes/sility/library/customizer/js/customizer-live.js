( function( $ ) {
	
/******************global color****************************/
	wp.customize( 'global_color', function( value ) {
		value.bind( function(e, newval ) {
			
			$('.header .top, .action-button, .slide-out-header,  .main-nav li ul.dropdown-menu li.active a,\
			.sidebar-widget .search-widget .input-group, .footer-widget .search-widget .input-group, .widget_categories ul li span.count, ul.wp-tag-cloud li a:hover,\
			.solid-button.purple, .tweet .twitter-item i.fa-twitter, .progress-bar-sility, .btn.purple, .tabs-shortcode ul.nav-tabs li a,\
			.experience-block .meta .year,  .testimonial-slider .sep, .owl-theme .owl-dots .owl-dot.active span, #wp-calendar caption, .widget-tab ul.nav-tabs li a,\
			.price-shortcode.pricing .pricingInner .list-group .list-group-item:first-child, .portfolio .item .overlay .background,\
			.price-shortcode.pricing .pricingInner .list-group .list-group-item:last-child a').css('background-color', newval );
			
			$(".main-nav li ul.dropdown-menu li a, .social-icon, .service, .icon-box .icon, .solid-button.white-purple,\
			.owl-theme .owl-dots .owl-dot span, .price-shortcode.pricing .pricingInner .list-group .list-group-item:last-child, .popup .social-nav ul li a").hover(function(e) { 
				$(this).css("background-color", e.type === "mouseenter" ? newval : value);
			});
						
				
			$('a, .widget_categories ul li:before, .widget_alc_blogposts p span,  .nav-tabs>li.active>a,\
			.nav-tabs>li.active>a:focus, .widget-tab p span, .tweet .twitter-item a,  blockquote footer,\
			.nav-tabs>li.active>a,  .nav-tabs>li.active>a:focus, .list-icons.purple > li > i,\
			.single-blog-post .blog-header .content .date,  .comment .reply i').css('color', newval);
		
			$(" a,.nav-tabs>li.active>a, .tweet a, .nav-tabs>li.active>a, .single-blog-post .blog-details .tags a, \
			.widget_alc_blogposts h4.entry-title a, .price-shortcode.pricing .pricingInner .list-group .list-group-item:last-child a,\
			.widget-tab h4.entry-title a, .price-shortcode.pricing .pricingInner .list-group .list-group-item:first-child h3,\
			.price-shortcode.pricing .pricingInner .list-group .list-group-item:first-child h5").hover(function(e) { 
				$(this).css("color", e.type === "mouseenter" ? newval : value);
			});
		
			$('input:not([type=submit]):not([type=file]):focus, select:focus, textarea:focus, .line-spacer:before, .line-spacer:after,\n\
			.education .item .marker, .education .line:before, .education .line:after').css('border-color', newval );
			
			$('.testimonial-slider .sep:after').css('cssText', 'border-color:' + newval + ' transparent;');
			$('.experience-block .meta:after').css('cssText', 'border-color:' + newval + ' transparent transparent transparent;');

			$('.main-nav ul>li.active>a,  .sidebar-widget h4.widget-title').css('border-bottom-color', newval );
			
			$(".main-nav ul>li>a").hover(function(e) { 
				$(this).css("border-bottom-color", e.type === "mouseenter" ? newval : value);
			});
			
			$('blockquote').css('border-left-color', newval );
		
		} );
	} );
/****************Custom background**************************/
wp.customize( 'bg_image', function( value ) {
		value.bind( function( newval ) {
			$('body').css('background-image', 'url('+newval+')');
		} );
	} );
wp.customize( 'bg_color', function( value ) {
		value.bind( function( newval ) {
			$('body').css('background-color', newval );
		} );
	} );
wp.customize( 'bg_repeat', function( value ) {
		value.bind( function( newval ) {
			$('body').css('background-repeat', newval );
		} );
	} );
wp.customize( 'bg_att', function( value ) {
		value.bind( function( newval ) {
			$('body').css('background-attachment', newval );
		} );
	} );
wp.customize( 'bg_hor', function( value ) {
		value.bind( function( newval ) {
			$('body').css('background-position-x', newval );
		} );
	} );
wp.customize( 'bg_ver', function( value ) {
		value.bind( function( newval ) {
			$('body').css('background-position-y', newval );
		} );
	} );
wp.customize( 'bg_size', function( value ) {
		value.bind( function( newval ) {
			if(newval){
			$('body').css('background-size', 'cover' );
		}
		} );
	} );

/************** Top navigation section ******************/
wp.customize( 'topnav_bg_image', function( value ) {
	value.bind( function( newval ) {
		$('.header .top').css('background-image', 'url('+newval+')');
	} );
} );
wp.customize( 'topnav_bg_color', function( value ) {
	value.bind( function( newval ) {
		$('.header .top').css('background-color', newval );
	} );
} );
wp.customize( 'topnav_bg_repeat', function( value ) {
	value.bind( function( newval ) {
		$('.header .top').css('background-repeat', newval );
	} );
} );	

wp.customize( 'topnav_link_color', function( value ) {
	value.bind( function( newval ) {
		$('.header .top a').css('color', newval);
	} );
} );

wp.customize( 'topnav_link_color_hov', function( value ) {
	value.bind( function( newval ) {
		$(".header .top a").hover(function(e) { 
			$(this).css("color", e.type === "mouseenter" ? newval : value);
		});
	} );
} );
wp.customize( 'topnav_text', function( value ) {
	value.bind( function( newval ) {
		$('.header .top, .header .top p').css('color', newval);
	} );
} );

		
/****************Header section**************************/
wp.customize( 'header_bg_image', function( value ) {
		value.bind( function( newval ) {
			$('.header .bottom').css('background', 'url('+newval+')');
		} );
	} );
wp.customize( 'header_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('.header .bottom').css('background-color', newval );
		} );
	} );
wp.customize( 'header_bg_repeat', function( value ) {
		value.bind( function( newval ) {
			$('.header .bottom').css('background-repeat', newval );
		} );
	} );
wp.customize( 'header_bg_att', function( value ) {
		value.bind( function( newval ) {
			$('.header .bottom').css('background-attachment', newval );
		} );
	} );
wp.customize( 'header_bg_hor', function( value ) {
		value.bind( function( newval ) {
			$('.header .bottom').css('background-position-x', newval );
		} );
	} );
wp.customize( 'header_bg_ver', function( value ) {
		value.bind( function( newval ) {
			$('.header .bottom').css('background-position-y', newval );
		} );
	} );

/***************************Footer**************/
wp.customize( 'footer_bg_image', function( value ) {
		value.bind( function( newval ) {
			$('.footer .top').css('background', 'url('+newval+')');
		} );
	} );
wp.customize( 'footer_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('.footer .top').css('background-color', newval );
		} );
	} );
wp.customize( 'footer_bg_repeat', function( value ) {
		value.bind( function( newval ) {
			$('.footer .top').css('background-repeat', newval );
		} );
	} );
wp.customize( 'footer_bg_att', function( value ) {
		value.bind( function( newval ) {
			$('.footer .top').css('background-attachment', newval );
		} );
	} );
wp.customize( 'footer_bg_hor', function( value ) {
		value.bind( function( newval ) {
			$('.footer .top').css('background-position-x', newval );
		} );
	} );
wp.customize( 'footer_bg_ver', function( value ) {
		value.bind( function( newval ) {
			$('.footer .top').css('background-position-y', newval );
		} );
	} );
wp.customize( 'footer_title_color', function( value ) {
		value.bind( function( newval ) {
			$('.footer h4.footer-title').css('color', newval );
		} );
	} );
wp.customize( 'footer_links_color', function( value ) {
		value.bind( function( newval ) {
			$('.footer .footer-widget a, .footer .footer-widget li a').css('color', newval );
		} );
	} );
wp.customize( 'footer_links_color_hov', function( value ) {
		value.bind( function( newval ) {
			$(".footer .footer-widget a, .footer .footer-widget li a").hover(function(e) { 
				$(this).css("color", e.type === "mouseenter" ? newval : value);
			});
		} );
	} );
	
	
wp.customize( 'footerbottom_bg_image', function( value ) {
		value.bind( function( newval ) {
			$('.footer .bottom').css('background', 'url('+newval+')');
		} );
	} );
wp.customize( 'footerbottom_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('.footer .bottom').css('background-color', newval );
		} );
	} );
wp.customize( 'footerbottom_bg_repeat', function( value ) {
		value.bind( function( newval ) {
			$('.footer .bottom').css('background-repeat', newval );
		} );
	} );
wp.customize( 'footerbottom_bg_att', function( value ) {
		value.bind( function( newval ) {
			$('.footer .bottom').css('background-attachment', newval );
		} );
	} );
wp.customize( 'footerbottom_bg_hor', function( value ) {
		value.bind( function( newval ) {
			$('.footer .bottom').css('background-position-x', newval );
		} );
	} );
wp.customize( 'footerbottom_bg_ver', function( value ) {
		value.bind( function( newval ) {
			$('.footer .bottom').css('background-position-y', newval );
		} );
	} );

wp.customize( 'footerbottom_text_color', function( value ) {
	value.bind( function( newval ) {
		$('.footer .bottom, .footer .bottom p').css('color', newval );
	} );
} );	
wp.customize( 'footerbottom_links_color', function( value ) {
	value.bind( function( newval ) {
		$('.footer .bottom a').css('color', newval );
	} );
} );	
	
wp.customize( 'footerbottom_links_color_hov', function( value ) {
	value.bind( function( newval ) {
		$(".footer .bottom a").hover(function(e) { 
			$(this).css("color", e.type === "mouseenter" ? newval : value);
		});
	} );
} );	


/*********************************Links**********************/
wp.customize( 'link_color', function( value ) {
		value.bind( function( newval ) {
			$('a').css('color', newval );
		} );
	} );
wp.customize( 'link_decor', function( value ) {
		value.bind( function( newval ) {
			$('a').css('text-decoration', newval);
		} );
	} );
wp.customize( 'link_color_hov', function( value ) {
		value.bind( function( newval ) {
			$('a').hover(function(){
				$(this).css("color",newval);

			});
		} );
	} );
wp.customize( 'link_decor_hov', function( value ) {
		value.bind( function( newval ) {
			$('a').hover(function(){
				$(this).css("text-decoration",newval);

			});
		} );
	} );
/********************Main Navigation*******************/
/*
wp.customize( 'nav_bg_image', function( value ) {
		value.bind( function( newval ) {
			$('.navbar-default>.container').css('background', 'url('+newval+')');
		} );
	} );
wp.customize( 'nav_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('.navbar-default>.container').css('background-color', newval );
		} );
	} );
wp.customize( 'nav_bg_repeat', function( value ) {
		value.bind( function( newval ) {
			$('.navbar-default>.container').css('background-repeat', newval );
		} );
	} );
wp.customize( 'nav_bg_att', function( value ) {
		value.bind( function( newval ) {
			$('.navbar-default>.container').css('background-attachment', newval );
		} );
	} );
wp.customize( 'nav_bg_hor', function( value ) {
		value.bind( function( newval ) {
			$('.navbar-default>.container').css('background-position-x', newval );
		} );
	} );
wp.customize( 'nav_bg_ver', function( value ) {
		value.bind( function( newval ) {
			$('.navbar-default>.container').css('background-position-y', newval );
		} );
	} );
*/
wp.customize( 'nav_links_color', function( value ) {
		value.bind( function( newval ) {
			$('.header .main-nav ul>li>a').css('color', newval );
		} );
	} );

wp.customize( 'nav_links_color_hover', function( value ) {
		value.bind( function(e, newval ) {
			$('.main-nav ul>li>a').hover(function(e){
				$(this).css("color", e.type === "mouseenter" ? newval : value);
			});
		} );
	} );
wp.customize( 'nav_current_bg', function( value ) {
	value.bind( function( newval ) {
		$('.main-nav ul>li.active>a').css('cssText', 'border-bottom-color:' + newval + '!important');
	} );
} );
	
wp.customize( 'nav_current_links_color', function( value ) {
	value.bind( function(e, newval ) {
		$('.main-nav ul>li.active>a').css('cssText', 'color:' + newval + '!important');
		$('.main-nav ul>li.active>a').hover(function(e){
			$(this).css("color", e.type === "mouseenter" ? newval : value);
		});
	} );
} );

wp.customize( 'sub_nav_hover_background', function( value ) {
	value.bind( function(e, newval ) {
		$('.main-nav ul li ul.dropdown-menu > li > a').hover(function(e){
			$(this).css("background-color", e.type === "mouseenter" ? newval : value);
		});
	} );
} );
wp.customize( 'sub_nav_hover_color', function( value ) {
	value.bind( function(e, newval ) {
		$('.main-nav ul li ul.dropdown-menu > li > a').hover(function(e){
			$(this).css("color", e.type === "mouseenter" ? newval : value);
		});
	} );
} );	

wp.customize( 'sub_nav_background', function( value ) {
		value.bind( function( newval ) {
			$('.main-nav ul li ul.dropdown-menu').css('background-color', newval );
		} );
	} );
wp.customize( 'sub_nav_color', function( value ) {
		value.bind( function( newval ) {
			$('.main-nav ul li ul.dropdown-menu > li > a').css('color', newval);
		} );
	} );
wp.customize( 'nav_separator', function( value ) {
		value.bind( function( newval ) {
			$('.main-nav ul li ul.dropdown-menu > li > a').css('border-bottom', '1px solid'+newval);
		} );
	} );
	
/**************************TYPOGRAPHY***************************************/
//get font name 
function get_font(font){
	var fullFont=font;
	var mainFont=fullFont.split(':');
	var font_name=mainFont[0];
	var font_type=mainFont[1];
	var font_name_link='';
	if( font_type == 'non-google' ){
	}
	else if( font_type == 'early-google'){
		 font_name_link = mainFont[0].replace(" ","");
		$('head').append('<link href="http://fonts.googleapis.com/earlyaccess/'+font_name_link+'.css" rel="stylesheet" type="text/css">');
	}else{
		font_name_link =  mainFont[0].replace(" ","+");
		var font_variants = mainFont[1].replace("|",",");
		$('head').append('<link href="http://fonts.googleapis.com/css?family='+font_name_link+':'+font_variants+'" rel="stylesheet" type="text/css">');
	}
	return font_name;
}
/*main typography*/

wp.customize( 'main_typ_font', function( value ) {
	value.bind( function( newval ) {
		var font=get_font(newval);
		$('body, p, li, .acc-shortcode .panel-body').css('font-family', font);
	} );
} );
wp.customize( 'main_typ_col', function( value ) {
	value.bind( function( newval ) {
		$('body, p, li, .acc-shortcode .panel-body').css('color', newval );
	} );
} );
wp.customize( 'main_typ_size', function( value ) {
	value.bind( function( newval ) {
		$('body, p, li, .acc-shortcode .panel-body').css('font-size', newval+'px' );
	} );
} );
wp.customize( 'main_typ_weight', function( value ) {
	value.bind( function( newval ) {
		$('body, p, li, .acc-shortcode .panel-body').css('font-weight', newval );
	} );
} );
wp.customize( 'main_typ_style', function( value ) {
	value.bind( function( newval ) {
		$('body, p, li, .acc-shortcode .panel-body').css('font-style', newval );
	} );
} );
/*textual logo*/
wp.customize( 'log_typ_font', function( value ) {
		value.bind( function( newval ) {
			var font=get_font(newval);
			$('.header .bottom .title a').css('font-family', font);
		} );
	} );
wp.customize( 'log_typ_col', function( value ) {
		value.bind( function( newval ) {
			$('.header .bottom .title a').css('color', newval );
		} );
	} );
wp.customize( 'log_typ_size', function( value ) {
		value.bind( function( newval ) {
			$('.header .bottom .title a').css('font-size', newval+'px' );
		} );
	} );
wp.customize( 'log_typ_weight', function( value ) {
		value.bind( function( newval ) {
			$('.header .bottom .title a').css('font-weight', newval );
		} );
	} );
wp.customize( 'log_typ_style', function( value ) {
		value.bind( function( newval ) {
			$('.header .bottom .title a').css('font-style', newval );
		} );
	} );
/*main Navigation*/
wp.customize( 'nav_typ_font', function( value ) {
		value.bind( function( newval ) {
			var font=get_font(newval);
			$('.main-nav ul>li>a').css('font-family', font);
		} );
	} );

wp.customize( 'nav_typ_size', function( value ) {
		value.bind( function( newval ) {
			$('.main-nav ul>li>a').css('font-size', newval+'px' );
		} );
	} );
wp.customize( 'nav_typ_weight', function( value ) {
		value.bind( function( newval ) {
			$('.main-nav ul>li>a').css('font-weight', newval );
		} );
	} );
wp.customize( 'nav_typ_style', function( value ) {
		value.bind( function( newval ) {
			$('.main-nav ul>li>a').css('font-style', newval );
		} );
	} );
/*h1 styling*/
wp.customize( 'h1_typ_font', function( value ) {
		value.bind( function( newval ) {
			var font=get_font(newval);
			$('h1, h1 a').css('font-family', font);
		} );
	} );
wp.customize( 'h1_typ_col', function( value ) {
		value.bind( function( newval ) {
			$('h1').css('color', newval );
		} );
	} );
wp.customize( 'h1_typ_size', function( value ) {
		value.bind( function( newval ) {
			$('h1').css('font-size', newval+'px' );
		} );
	} );
wp.customize( 'h1_typ_weight', function( value ) {
		value.bind( function( newval ) {
			$('h1').css('font-weight', newval );
		} );
	} );
wp.customize( 'h1_typ_style', function( value ) {
		value.bind( function( newval ) {
			$('h1').css('font-style', newval );
		} );
	} );
/*h2 styling*/
wp.customize( 'h2_typ_font', function( value ) {
		value.bind( function( newval ) {
			var font=get_font(newval);
			$('h2').css('font-family', font);
		} );
	} );
wp.customize( 'h2_typ_col', function( value ) {
		value.bind( function( newval ) {
			$('h2').css('color', newval );
		} );
	} );
wp.customize( 'h2_typ_size', function( value ) {
		value.bind( function( newval ) {
			$('h2').css('font-size', newval+'px' );
		} );
	} );
wp.customize( 'h2_typ_weight', function( value ) {
		value.bind( function( newval ) {
			$('h2').css('font-weight', newval );
		} );
	} );
wp.customize( 'h2_typ_style', function( value ) {
		value.bind( function( newval ) {
			$('h2').css('font-style', newval );
		} );
	} );
/*h3 styling*/
wp.customize( 'h3_typ_font', function( value ) {
		value.bind( function( newval ) {
			var font=get_font(newval);
			$('h3').css('font-family', font);
		} );
	} );
wp.customize( 'h3_typ_col', function( value ) {
		value.bind( function( newval ) {
			$('h3').css('color', newval );
		} );
	} );
wp.customize( 'h3_typ_size', function( value ) {
		value.bind( function( newval ) {
			$('h3').css('font-size', newval+'px' );
		} );
	} );
wp.customize( 'h3_typ_weight', function( value ) {
		value.bind( function( newval ) {
			$('h3').css('font-weight', newval );
		} );
	} );
wp.customize( 'h3_typ_style', function( value ) {
		value.bind( function( newval ) {
			$('h3').css('font-style', newval );
		} );
	} );
/*h4 styling*/
wp.customize( 'h4_typ_font', function( value ) {
		value.bind( function( newval ) {
			var font=get_font(newval);
			$('h4').css('font-family', font);
		} );
	} );
wp.customize( 'h4_typ_col', function( value ) {
		value.bind( function( newval ) {
			$('h4').css('color', newval );
		} );
	} );
wp.customize( 'h4_typ_size', function( value ) {
		value.bind( function( newval ) {
			$('h4').css('font-size', newval+'px' );
		} );
	} );
wp.customize( 'h4_typ_weight', function( value ) {
		value.bind( function( newval ) {
			$('h4').css('font-weight', newval );
		} );
	} );
wp.customize( 'h4_typ_style', function( value ) {
		value.bind( function( newval ) {
			$('h4').css('font-style', newval );
		} );
	} );
/*h5 styling*/
wp.customize( 'h5_typ_font', function( value ) {
		value.bind( function( newval ) {
			var font=get_font(newval);
			$('h5').css('font-family', font);
		} );
	} );
wp.customize( 'h5_typ_col', function( value ) {
		value.bind( function( newval ) {
			$('h5').css('color', newval );
		} );
	} );
wp.customize( 'h5_typ_size', function( value ) {
		value.bind( function( newval ) {
			$('h5').css('font-size', newval+'px' );
		} );
	} );
wp.customize( 'h5_typ_weight', function( value ) {
		value.bind( function( newval ) {
			$('h5').css('font-weight', newval );
		} );
	} );
wp.customize( 'h5_typ_style', function( value ) {
		value.bind( function( newval ) {
			$('h5').css('font-style', newval );
		} );
	} );
/*h6 styling*/
wp.customize( 'h6_typ_font', function( value ) {
		value.bind( function( newval ) {
			var font=get_font(newval);
			$('h6').css('font-family', font);
		} );
	} );
wp.customize( 'h6_typ_col', function( value ) {
		value.bind( function( newval ) {
			$('h6').css('color', newval );
		} );
	} );
wp.customize( 'h6_typ_size', function( value ) {
		value.bind( function( newval ) {
			$('h6').css('font-size', newval+'px' );
		} );
	} );
wp.customize( 'h6_typ_weight', function( value ) {
		value.bind( function( newval ) {
			$('h6').css('font-weight', newval );
		} );
	} );
wp.customize( 'h6_typ_style', function( value ) {
		value.bind( function( newval ) {
			$('h6').css('font-style', newval );
		} );
	} );

/*Page title styling*/
wp.customize( 'ptit_typ_font', function( value ) {
		value.bind( function( newval ) {
			var font=get_font(newval);
			$('h2.onetitle').css('font-family', font);
		} );
	} );

wp.customize( 'ptit_typ_col', function( value ) {
		value.bind( function( newval ) {
			$('h2.onetitle').css('color', newval );
		} );
	} );
wp.customize( 'ptit_typ_size', function( value ) {
		value.bind( function( newval ) {
			$('h2.onetitle').css('font-size', newval+'px' );
		} );
	} );
wp.customize( 'ptit_typ_weight', function( value ) {
		value.bind( function( newval ) {
			$('h2.onetitle').css('font-weight', newval );
		} );
	} );
wp.customize( 'ptit_typ_style', function( value ) {
		value.bind( function( newval ) {
			$('h2.onetitle').css('font-style', newval );
		} );
	} );

/*Widget title styling*/
wp.customize( 'wtit_typ_font', function( value ) {
		value.bind( function( newval ) {
			var font=get_font(newval);
			$('.sidebar-widget h4.widget-title').css('font-family', font);
		} );
	} );

wp.customize( 'wtit_typ_col', function( value ) {
		value.bind( function( newval ) {
			$('.sidebar-widget h4.widget-title').css('color', newval );
		} );
	} );
wp.customize( 'wtit_typ_size', function( value ) {
		value.bind( function( newval ) {
			$('.sidebar-widget h4.widget-title').css('font-size', newval+'px' );
		} );
	} );
wp.customize( 'wtit_typ_weight', function( value ) {
		value.bind( function( newval ) {
			$('.sidebar-widget h4.widget-title').css('font-weight', newval );
		} );
	} );
wp.customize( 'wtit_typ_style', function( value ) {
		value.bind( function( newval ) {
			$('.sidebar-widget h4.widget-title').css('font-style', newval );
		} );
	} );
/*Footer Widget title styling*/
wp.customize( 'ftit_typ_font', function( value ) {
		value.bind( function( newval ) {
			var font=get_font(newval);
			$('.footer h4.footer-title').css('font-family', font);
		} );
	} );

wp.customize( 'ftit_typ_col', function( value ) {
		value.bind( function( newval ) {			
			$('.footer h4.footer-title').css('color', newval );
		} );
	} );
wp.customize( 'ftit_typ_size', function( value ) {
		value.bind( function( newval ) {
			$('.footer h4.footer-title').css('font-size', newval+'px' );
		} );
	} );
wp.customize( 'ftit_typ_weight', function( value ) {
		value.bind( function( newval ) {
			$('.footer h4.footer-title').css('font-weight', newval );
		} );
	} );
wp.customize( 'ftit_typ_style', function( value ) {
		value.bind( function( newval ) {
			$('.footer h4.footer-title').css('font-style', newval );
		} );
	} );
	
	

/*************************ONE PAGER**********************/
/*inner Page title styling*/
wp.customize( 'altptit_typ_font', function( value ) {
		value.bind( function( newval ) {
			var font=get_font(newval);
			$('h2.page-title').css('font-family', font);
		} );
	} );

wp.customize( 'altptit_typ_col', function( value ) {
		value.bind( function( newval ) {
			$('h2.page-title').css('color', newval );
		} );
	} );
wp.customize( 'altptit_typ_size', function( value ) {
		value.bind( function( newval ) {
			$('h2.page-title').css('font-size', newval+'px' );
		} );
	} );
wp.customize( 'altptit_typ_weight', function( value ) {
		value.bind( function( newval ) {
			$('h2.page-title').css('font-weight', newval );
		} );
	} );
wp.customize( 'altptit_typ_style', function( value ) {
		value.bind( function( newval ) {
			$('h2.page-title').css('font-style', newval );
		} );
	} );
/*Tagline styling*/
wp.customize( 'tag_typ_font', function( value ) {
		value.bind( function( newval ) {
			var font=get_font(newval);
			$('p.onesubtitle,  p.tagline').css('font-family', font);
		} );
	} );

wp.customize( 'tag_typ_col', function( value ) {
		value.bind( function( newval ) {
			$('p.onesubtitle,  p.tagline').css('color', newval );
		} );
	} );
wp.customize( 'tag_typ_size', function( value ) {
		value.bind( function( newval ) {
			$('p.onesubtitle,  p.tagline').css('font-size', newval+'px' );
		} );
	} );
wp.customize( 'tag_typ_weight', function( value ) {
		value.bind( function( newval ) {
			$('p.onesubtitle,  p.tagline').css('font-weight', newval );
		} );
	} );
wp.customize( 'tag_typ_style', function( value ) {
		value.bind( function( newval ) {
			$('p.onesubtitle,  p.tagline').css('font-style', newval );
		} );
	} );
} )( jQuery );


