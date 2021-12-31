<?php

function weblusive_enqueue_font ( $got_font) {
	$char_set = '';
	if ($got_font) {
		
		if( weblusive_get_option('typography_latin_extended') || weblusive_get_option('typography_cyrillic') ||
		weblusive_get_option('typography_cyrillic_extended') || weblusive_get_option('typography_greek') ||
		weblusive_get_option('typography_greek_extended') ){
		
			$char_set = '&subset=latin';
			if( weblusive_get_option('typography_latin_extended') ) 
				$char_set .= ',latin-ext';
			if( weblusive_get_option('typography_cyrillic') )
				$char_set .= ',cyrillic';
			if( weblusive_get_option('typography_cyrillic_extended') )
				$char_set .= ',cyrillic-ext';
			if( weblusive_get_option('typography_greek') )
				$char_set .= ',greek';
			if( weblusive_get_option('typography_greek_extended') )
				$char_set .= ',greek-ext';
		}
		
		$font_pieces = explode(":", $got_font);
		
		$font_name = $font_pieces[0];
		$font_type = $font_pieces[1];
		
		if( $font_type == 'non-google' ){
			
		}elseif( $font_type == 'early-google'){
			$font_name = str_replace (" ","", $font_pieces[0] );
			$protocol = is_ssl() ? 'https' : 'http';
			wp_enqueue_style( $font_name , $protocol.'://fonts.googleapis.com/earlyaccess/'.$font_name);
			
		}else{
			$font_name = str_replace (" ","+", $font_pieces[0] );
			$font_variants = str_replace ("|",",", $font_pieces[1] );
			$protocol = is_ssl() ? 'https' : 'http';
			wp_enqueue_style( $font_name , $protocol.'://fonts.googleapis.com/css?family='.$font_name.':'.$font_variants.$char_set);
		}
              
	}
         
}
?>
