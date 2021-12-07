<?php
	wp_reset_query();
	if( is_page() ){
		global $get_meta;
		$weblusive_sidebar_pos = isset( $get_meta['_weblusive_sidebar_pos'][0]) ? $get_meta["_weblusive_sidebar_pos"][0] : 'right';
		if( $weblusive_sidebar_pos != 'full' ){
			$weblusive_sidebar_post = isset( $get_meta['_weblusive_sidebar_post'][0]) ? sanitize_title($get_meta["_weblusive_sidebar_post"][0]) : 'primary-widget-area';
			$sidebar_page = weblusive_get_option( 'sidebar_page' );
			if( $weblusive_sidebar_post )
				dynamic_sidebar($weblusive_sidebar_post);
				
			elseif( $sidebar_page )
				dynamic_sidebar ( sanitize_title( $sidebar_page ) ); 
			
			else dynamic_sidebar( 'primary-widget-area' );
		}

	}elseif ( is_single() && 'portfolio' != get_post_type()  ){
		global $get_meta;
		$weblusive_sidebar_pos = isset ($get_meta["_weblusive_sidebar_pos"]) ? $get_meta["_weblusive_sidebar_pos"][0] : 'right';

		if( $weblusive_sidebar_pos != 'full' ){
			$weblusive_sidebar_post = isset( $get_meta['_weblusive_sidebar_post'][0]) ? sanitize_title($get_meta["_weblusive_sidebar_post"][0]) : '';
			$sidebar_post = weblusive_get_option( 'sidebar_post' );
			if( $weblusive_sidebar_post )
				dynamic_sidebar($weblusive_sidebar_post);
				
			elseif( $sidebar_post )
				dynamic_sidebar ( sanitize_title( $sidebar_post ) ); 
			
			else dynamic_sidebar( 'primary-widget-area' );
		}
        }  elseif ('portfolio' == get_post_type() && is_single() ) {
            $sidebar_port = weblusive_get_option( 'sidebar_portfolio' );
			if( $sidebar_port )
				dynamic_sidebar ( sanitize_title( $sidebar_port ) ); 
			
			else dynamic_sidebar( 'primary-widget-area' );

		
	}elseif ( is_category() ){
		
		$category_id = get_query_var('cat') ;
		$cat_sidebar = weblusive_get_option( 'sidebar_cat_'.$category_id ) ;
		$sidebar_archive = weblusive_get_option( 'sidebar_archive' );

		if( $cat_sidebar )
			dynamic_sidebar ( sanitize_title( $cat_sidebar ) ); 
			
		elseif( $sidebar_archive )
			dynamic_sidebar ( sanitize_title( $sidebar_archive ) );
			
		else dynamic_sidebar( 'primary-widget-area' );
		
	}else{
		$sidebar_archive = weblusive_get_option( 'sidebar_archive' );
		if( $sidebar_archive ){
			dynamic_sidebar ( sanitize_title( $sidebar_archive ) );
		}
		else dynamic_sidebar( 'primary-widget-area' );
	}
?>