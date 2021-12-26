<?php
/**
 * Kerge Theme Editor Styles
 *
 */

function kerge_theme_settings_css() {

	$pages_shadow = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_content_shadow') : 'on';
	$content_max_width = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('content_max_width') : '1800';

	//================================================================================================================================
	// Main color
	//================================================================================================================================
	$theme_main_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_color') : '#ffcd38';

	//================================================================================================================================
	// Backgrounds
	//================================================================================================================================
	$main_header_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_header_bg_color') : '#ffffff';

	$start_page_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('sp_style/sp_style_picker') : 'second-style';

	if ($start_page_style == 'first-style') {
	    $start_page_bg = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('sp_style/first-style/hp_background') : '';
	    $start_page_overlay = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('sp_style/first-style/hp_overlay_bg') : '';
	} elseif ($start_page_style == 'second-style') {
	    $start_page_bg = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('sp_style/second-style/hp_background') : '';
	    $start_page_bg_position = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('sp_style/second-style/position') : 'no';
	}

	$body_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_bg_color') : '#f5f5f5';
	$body_text_color  = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_text_color') : '#666666';

	$sp_title_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('start_page_title_color') : '#ffffff';
	$sp_subtitle_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('start_page_subtitle_color') : '#ffffff';


	//================================================================================================================================
	// Typography
	//================================================================================================================================'
	$body_text_font = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography/family') : 'PT Sans';
	$body_text_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography/size') : '14';
	$body_text_line_height = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography/line-height') : '1.75';
	$body_text_variation = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography/variation') : 'regular';
	$body_text_weight = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography/weight') : '400';
	$body_text_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography/style') : 'normal';
	if ( $body_text_weight == '' ) {
	    $body_text_weight = intval($body_text_variation);
	    $body_text_style = ( strpos( $body_text_variation, 'italic' ) ) ? 'italic' : 'normal';
	    if ( $body_text_weight == 'regular' ) {
	        $body_text_weight = '400';
	        $body_text_style = 'normal';
	    }
	    if ( $body_text_variation == 'italic' ) {
	        $body_text_weight = '400';
	        $body_text_style = 'italic';
	    }
	}
	$body_text_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography/color') : '#666666';

	$headings_font = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('headings/family') : 'Oswald';
	$headings_variation = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('headings/variation') : 'regular';
	$headings_weight = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('headings/weight') : '400';
	$headings_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('headings/style') : 'normal';
	if ( $headings_weight == '' ) {
	    $headings_weight = intval($headings_variation);
	    $headings_style = ( strpos( $headings_variation, 'italic' ) ) ? 'italic' : 'normal';
	    if ( $headings_weight == 'regular' ) {
	        $headings_weight = '400';
	        $headings_style = 'normal';
	    }
	    if ( $headings_variation == 'italic' ) {
	        $headings_weight = '400';
	        $headings_style = 'italic';
	    }
	}
	$headings_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('headings/color') : '#222222';


	$h1_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('h1/size') : '32';
	$h2_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('h2/size') : '27';
	$h3_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('h3/size') : '21';
	$h4_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('h4/size') : '18';
	$h5_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('h5/size') : '16';
	$h6_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('h6/size') : '14';

	$links_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('links_color') : '#0099CC';
	$links_hover_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('links_hover_color') : '#006699';

	$cp_titles_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_style') : 'second-style';
    $cp_general_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_bg_color') : '#ffcd38';
    $cp_general_content_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_content_bg_color') : '#ffffff';
    $cp_general_title_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font/size') : '27';
    $cp_general_title_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font/color') : '#222222';
    $cp_general_title_font = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font/family') : 'Oswald';
    $cp_general_title_variation = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font/variation') : 'regular';
    $cp_general_title_weight = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font/weight') : '400';
    $cp_general_title_spacing = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font/letter-spacing') : '0';
    $cp_general_title_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font/style') : 'normal';
    if ( $cp_general_title_weight == '' ) {
        $cp_general_title_weight = intval($cp_general_title_variation);
        $cp_general_title_style = ( strpos( $cp_general_title_variation, 'italic' ) ) ? 'italic' : 'normal';
        if ( $cp_general_title_weight == 'regular' ) {
            $cp_general_title_weight = '400';
            $cp_general_title_style = 'normal';
        }
        if ( $cp_general_title_weight == 'italic' ) {
            $cp_general_title_weight = '400';
            $cp_general_title_style = 'italic';
        }
    }

    if ( $cp_titles_style == 'first-style' ) {
    	$page_titles_styles = '
    		display: inline-block;
		    position: relative;
		    margin: 0 0 0 -70px;
		    padding: 10px 20px 10px 78px;
		    background-color: ' . $cp_general_bg_color .';
		    line-height: 1.1em;
		    text-shadow: 1px 1px 1px rgba(0,0,0,.1);
		    width: 100%;

    		color: ' . $cp_general_title_color .';
		    font-size: ' . $cp_general_title_size . 'px;
		    font-family: ' . $cp_general_title_font . ';
		    font-weight: ' . $cp_general_title_weight . ';
		    font-style: ' . $cp_general_title_style . ';
		    letter-spacing: ' . $cp_general_title_spacing . ';
    	';
    	$page_titles_after = '';
    } else {
    	$page_titles_styles = '
    		color: ' . $cp_general_title_color .';
		    font-size: ' . $cp_general_title_size . 'px;
		    font-family: ' . $cp_general_title_font . ';
		    font-weight: ' . $cp_general_title_weight . ';
		    font-style: ' . $cp_general_title_style . ';
		    letter-spacing: ' . $cp_general_title_spacing . ';
		    margin: 0 0 8px;
    		line-height: 1.5em;
    		text-align: left;
    	';
    	$page_titles_after = '
		    display: block;
		    width: 100%;
		    margin-top: 5px;
		    height: 2px;
		    background-color: ' . $cp_general_bg_color . ';
		    opacity: 1;
    	';
    }


	//================================================================================================================================
	// Theme style and Main color
	//================================================================================================================================

	$theme_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('theme_style_picker') :  'light';

	//================================================================================================================================
	// Backgrounds
	//================================================================================================================================
	$sidebar_bg_color = get_theme_mod('unique_blog_sidebar_bg_color');

	if( $theme_style == 'light' ) {
		$border_color = '#e2e4e7';

		$stripes_color = '#f3f4f5';

		$separator_color = '#e5e5e5';

		$btn_text_color = '#222';
	}
	elseif( $theme_style == 'dark' )
	{
		$border_color = '#444';

		$stripes_color = '#444';

		$separator_color = '#555';

		$btn_text_color = '#fff';
	}

	$editor_css = '
		.edit-post-visual-editor.editor-styles-wrapper .wp-block {
		    max-width: ' . $content_max_width . 'px;
		}
		/*
		 * Set colors for:
		 * - links
		 * - blockquote
		 * - pullquote (solid color)
		 * - buttons
		 */
		.editor-block-list__layout .editor-block-list__block a,
		.editor-block-list__layout .editor-block-list__block .wp-block-file .wp-block-file__textlink {
			color: ' . $links_color . ';
		}

		.editor-block-list__layout .editor-block-list__block .wp-block-quote:not(.is-large):not(.is-style-large),
		.editor-styles-wrapper .editor-block-list__layout .wp-block-freeform blockquote,
		.editor-block-list__layout .editor-block-list__block .wp-block-button .wp-block-button__link,
		.editor-block-list__layout .editor-block-list__block .wp-block-button .wp-block-button__link:active,
		.editor-block-list__layout .editor-block-list__block .wp-block-button .wp-block-button__link:focus,
		.editor-block-list__layout .editor-block-list__block .wp-block-button .wp-block-button__link:hover {
			border-color: ' . $theme_main_color . ';
		}

		.editor-block-list__layout .editor-block-list__block .wp-block-pullquote.is-style-solid-color:not(.has-background-color),
		.editor-block-list__layout .editor-block-list__block .wp-block-file .wp-block-file__button,
		.editor-block-list__layout .editor-block-list__block .wp-block-button .wp-block-button__link,
		.editor-block-list__layout .editor-block-list__block .wp-block-button:not(.is-style-outline) .wp-block-button__link,
		.editor-block-list__layout .editor-block-list__block .wp-block-button.is-style-outline .wp-block-button__link:active,
		.editor-block-list__layout .editor-block-list__block .wp-block-button.is-style-outline .wp-block-button__link:focus,
		.editor-block-list__layout .editor-block-list__block .wp-block-button.is-style-outline .wp-block-button__link:hover {
			background-color: ' . $theme_main_color . ';
		}

		.editor-block-list__layout .editor-block-list__block .wp-block-button .wp-block-button__link,
		.editor-block-list__layout .editor-block-list__block .wp-block-button:not(.is-style-outline) .wp-block-button__link:active,
		.editor-block-list__layout .editor-block-list__block .wp-block-button:not(.is-style-outline) .wp-block-button__link:focus,
		.editor-block-list__layout .editor-block-list__block .wp-block-button:not(.is-style-outline) .wp-block-button__link:hover {
		    color: ' . $btn_text_color . ';
		}

		/* Hover colors */
		.editor-block-list__layout .editor-block-list__block a:hover,
		.editor-block-list__layout .editor-block-list__block a:active,
		.editor-block-list__layout .editor-block-list__block .wp-block-file .wp-block-file__textlink:hover {
			color: ' . $links_hover_color . ';
		}

		/* Do not overwrite solid color pullquote or cover links */
		.editor-block-list__layout .editor-block-list__block .wp-block-pullquote.is-style-solid-color a,
		.editor-block-list__layout .editor-block-list__block .wp-block-cover a {
			color: inherit;
		}

		.block-editor .block-editor__container {
			background-color: ' . $cp_general_content_bg_color . ';
		}

		.editor-styles-wrapper,
		.edit-post-visual-editor.editor-styles-wrapper,
		.edit-post-visual-editor.editor-styles-wrapper li {
			font-family: ' . $body_text_font . ', Helvetica, sans-serif;
		    font-weight: ' . $body_text_weight . ';
		    font-style: ' .$body_text_style . ';
		    font-size: ' . $body_text_size . 'px;
		    color: ' . $body_text_color . ';
		    line-height: ' . $body_text_line_height . ';
		}

		.editor-styles-wrapper h1,
		.editor-styles-wrapper h2,
		.editor-styles-wrapper h3,
		.editor-styles-wrapper h4,
		.editor-styles-wrapper h5,
		.editor-styles-wrapper h6 {
			font-family: ' . $headings_font . ', Helvetica, sans-serif;
    		font-weight: ' . $headings_weight . ';
    		font-style: ' . $headings_style . ';
    		color: ' . $headings_color . ';
		}

		.editor-styles-wrapper h1 {
			font-size: ' . $h1_size . 'px;
		}

		.editor-styles-wrapper h2 {
			font-size: ' . $h2_size . 'px;
		}

		.editor-styles-wrapper h3 {
			font-size: ' . $h3_size . 'px;
		}

		.editor-styles-wrapper h4 {
			font-size: ' . $h4_size . 'px;
		}

		.editor-styles-wrapper h5 {
			font-size: ' . $h5_size . 'px;
		}

		.editor-styles-wrapper h6 {
			font-size: ' . $h6_size . 'px;
		}

		.editor-styles-wrapper .editor-post-title__block .editor-post-title__input {
			font-family: ' . $headings_font . ', Helvetica, sans-serif;
		    font-weight: ' . $headings_weight . ';
		    font-style: ' . $headings_style . ';
			color: ' . $headings_color . ';
			font-size: 32px;
		    line-height: 1.3;
		    margin: 15px 0 15px 0;
		    text-align: center;
		}

		.post-type-page .editor-styles-wrapper .editor-post-title__block .editor-post-title__input {
			' . $page_titles_styles . '
		}

		.post-type-page .editor-styles-wrapper .editor-post-title__block > div:after {
			' . $page_titles_after . '
		}

		.editor-styles-wrapper .edit-post-visual-editor .editor-post-title__block {
			margin-bottom: 20px;
		}

		.editor-styles-wrapper .edit-post-layout__metaboxes:not(:empty) {
			border-top-color: ' . $border_color . ';
		}

		.editor-block-list__layout .editor-block-list__block .wp-block-quote:not(.is-large):not(.is-style-large), .editor-styles-wrapper .editor-block-list__layout .wp-block-freeform blockquote,
		.editor-block-list__layout .editor-block-list__block .wp-block-quote.is-large, .editor-block-list__layout .editor-block-list__block .wp-block-quote.is-style-large,
		.edit-post-visual-editor.editor-styles-wrapper .wp-block-pullquote {
			border-color: ' . $theme_main_color . ';
		}

		.wp-block-table.is-style-stripes tr:nth-child(odd) {
			background-color: ' . $stripes_color . ';
		}

		.wp-block-table.is-style-stripes {
			border-color: ' . $stripes_color . ';
		}

		.wp-block-separator {
		    border-color: ' . $separator_color . ';
		}

		.wp-block-pullquote {
			color: ' . $body_text_color . ';
		}

		.wp-block-verse pre, pre.wp-block-verse {
			color: ' . $body_text_color . ';
		}
	';

	return apply_filters( 'kerge_theme_settings_css', $editor_css );
}
