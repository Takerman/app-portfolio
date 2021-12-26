<?php

function kerge_theme_customizations() {

    //================================================================================================================================
    // Custom styles
    //================================================================================================================================
    $custom_styles = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('custom_styles') : '';
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
        $start_page_img_slider = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('sp_style/first-style/hp_img_slider/hp_img_slider_switcher') :  'off';
    } elseif ($start_page_style == 'second-style') {
        $start_page_bg = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('sp_style/second-style/hp_background') : '';
        $start_page_bg_position = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('sp_style/second-style/position') : 'no';
    }

    $body_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_bg_color') : '#f5f5f5';
    $body_text_color  = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_text_color') : '#666666';

    $header_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('header_bg_color') : '#ffffff';

    $sidebar_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('sidebar_bg_color') : '#ffffff';

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


    /* logo vars */
    $logo_img_height = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('logo_img_height') : '';
    $logo_img_width = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('logo_img_width') : '';


    //================================================================================================================================
    // Site Header and Main Menu
    //================================================================================================================================'
    $site_header_width = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('site_header_width') : '22%';
    $site_header_bg = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('site_header_bg') : '#ffffff';

    $site_header_title_font = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('site_header_title_font/family') : 'Oswald';
    $site_header_title_variation = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('site_header_title_font/variation') : 'regular';
    $site_header_title_weight = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('site_header_title_font/weight') : '400';
    $site_header_title_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('site_header_title_font/style') : 'normal';
    $site_header_title_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('site_header_title_font/color') : '#222222';
    $site_header_title_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('site_header_title_font/size') : '30';
    $site_header_title_line_height = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('site_header_title_font/line-height') : '1.1';
    $site_header_title_spacing = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('site_header_title_font/letter-spacing') : '0';
    if ( $site_header_title_weight == '' ) {
        $site_header_title_weight = intval($site_header_title_variation);
        $site_header_title_style = ( strpos( $site_header_title_variation, 'italic' ) ) ? 'italic' : 'normal';
        if ( $site_header_title_weight == 'regular' ) {
            $site_header_title_weight = '400';
            $site_header_title_style = 'normal';
        }
        if ( $site_header_title_variation == 'italic' ) {
            $site_header_title_weight = '400';
            $site_header_title_style = 'italic';
        }
    }

    $site_header_subtitle_font = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('site_header_subtitle_font/family') : 'Oswald';
    $site_header_subtitle_variation = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('site_header_subtitle_font/variation') : '300';
    $site_header_subtitle_weight = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('site_header_subtitle_font/weight') : '300';
    $site_header_subtitle_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('site_header_subtitle_font/style') : 'normal';
    $site_header_subtitle_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('site_header_subtitle_font/color') : '#9c9c9c';
    $site_header_subtitle_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('site_header_subtitle_font/size') : '16';
    $site_header_subtitle_line_height = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('site_header_subtitle_font/line-height') : '1.5';
    $site_header_subtitle_spacing = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('site_header_subtitle_font/letter-spacing') : '0';
    if ( $site_header_subtitle_weight == '' ) {
        $site_header_subtitle_weight = intval($site_header_subtitle_variation);
        $site_header_subtitle_style = ( strpos( $site_header_subtitle_variation, 'italic' ) ) ? 'italic' : 'normal';
        if ( $site_header_subtitle_weight == 'regular' ) {
            $site_header_subtitle_weight = '400';
            $site_header_subtitle_style = 'normal';
        }
        if ( $site_header_subtitle_variation == 'italic' ) {
            $site_header_subtitle_weight = '400';
            $site_header_subtitle_style = 'italic';
        }
    } 

    $main_menu_font = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_menu_font/family') : 'Oswald';
    $main_menu_variation = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_menu_font/variation') : 'regular';
    $main_menu_weight = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_menu_font/weight') : '400';
    $main_menu_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_menu_font/style') : 'normal';
    $main_menu_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_menu_font/color') : '#222222';
    $main_menu_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_menu_font/size') : '15';
    $main_menu_line_height = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_menu_font/line-height') : '1.6';
    $main_menu_spacing = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_menu_font/letter-spacing') : '0';
    if ( $main_menu_weight == '' ) {
        $main_menu_weight = intval($main_menu_variation);
        $main_menu_style = ( strpos( $main_menu_variation, 'italic' ) ) ? 'italic' : 'normal';
        if ( $main_menu_weight == 'regular' ) {
            $main_menu_weight = '400';
            $main_menu_style = 'normal';
        }
        if ( $main_menu_variation == 'italic' ) {
            $main_menu_weight = '400';
            $main_menu_style = 'italic';
        }
    } 

    $main_menu_borders_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_menu_borders_color') : '#f5f5f5';
    $main_menu_hover_bg = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_menu_hover_bg') : '#fcfcfc';




    $css = '
    .pt-page,
    .single-page-content .content-area {
        max-width: '.$content_max_width.'px;
        min-width: 0;
    }';

    $css .= '
    body,
    p {
        font-family: '.$body_text_font.', Helvetica, sans-serif;
        font-size: '.$body_text_size.'px;
        font-weight: '.$body_text_weight.';
        font-style: '.$body_text_style.';
        line-height: '.$body_text_line_height.'em;
        color: '.$body_text_color.';
    }';

    $css .= '
    .form-control,
    .form-control:focus,
    .has-error .form-control,
    .has-error .form-control:focus {
        font-family: '.$body_text_font.', Helvetica, sans-serif;
    }';

    $css .= '
    h1, h2, h3, h4, h5, h6 {
        font-family: '.$headings_font.', Helvetica, sans-serif;
        font-weight: '.$headings_weight.';
        font-style: '.$headings_style.';
        color: '.$headings_color.';
    }';

    $css .= '
    h1 {
        font-size: '.$h1_size.'px;
        color: '.$headings_color.';
    }
    h2 {
        font-size: '.$h2_size.'px;
        color: '.$headings_color.';
    }
    h3 {
        font-size: '.$h3_size.'px;
        color: '.$headings_color.';
    }
    h4 {
        font-size: '.$h4_size.'px;
        color: '.$headings_color.';
    }
    h5 {
        font-size: '.$h5_size.'px;
        color: '.$headings_color.';
    }
    h6 {
        font-size: '.$h6_size.'px;
        color: '.$headings_color.';
    }';

    $css .= '
    .testimonial-author,
    .info-list li .title {
        font-family: '.$headings_font.', Helvetica, sans-serif;
        font-weight: '.$headings_weight.';
        font-style: '.$headings_style.';
        color: '.$headings_color.';
    }';

    $css .='
    .timeline-item .item-period,
    .section-inner.start-page-full-width .hp-text-block .sp-subtitle,
    .start-page .title-block .sp-subtitle,
    .mobile-site-title {
        font-family: '.$headings_font.', Helvetica, sans-serif;
    }';

    $css .= '
    .form-control,
    .form-control:focus,
    .has-error .form-control,
    .has-error .form-control:focus,
    input[type="search"],
    input[type="password"],
    input[type="text"],
    .header-search input.form-control {
        font-family: '.$body_text_font.', Helvetica, sans-serif;
        font-weight: '.$body_text_weight.';
        font-style: '.$body_text_style.';
    }';

    $css .= '
    .btn-primary, .btn-secondary, button, input[type="button"], input[type="submit"] {
        font-family: '.$body_text_font.', Helvetica, sans-serif;
    }';



    $css .= '.header-image img {';
    if( !empty( $logo_img_height ) ) {
        $css .= '
        height: auto;
        max-height: '.$logo_img_height.'px;';
    }
    if( !empty( $logo_img_width ) ) {
        $css .= '
        width: auto;
        max-width: '.$logo_img_width.'px;';
    }
    $css .= '}';


    $css .='
    body {
        background-color: '.$body_bg_color.';
    }';

    $css .= '
    @media only screen and (min-width: 991px) {
        .header.sticked {
            background-color: '.$main_header_bg_color.';
        }
    }';

    if ($start_page_style == 'first-style') {
        if( !empty( $start_page_bg ) ) {
            $css .= '
            .start-page .section-inner {
                background-image: url('.$start_page_bg['url'].');
                -webkit-backface-visibility: hidden;
                backface-visibility: hidden;
                background-attachment: fixed;
                background-position: 50%;
                background-size: cover;
                -webkit-background-size: cover;
                background-attachment: scroll;
                background-position: center center;
                background-repeat: no-repeat;
            }';
        }

        $css .= '
        .start-page .section-inner .mask {
            content: "";
            position: absolute;
            height: 100%;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            background: '.$start_page_overlay.';
        }';

        if ($start_page_img_slider == 'on') { 
            $start_page_img_slider_images = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('sp_style/first-style/hp_img_slider/on/images') : '';
            $start_page_img_slider_speed = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('sp_style/first-style/hp_img_slider/on/slideshow_speed') : '6';

            $css .= '
            .start-page .img-slider,
            .start-page .img-slider .img-slider-bg {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
            }';

            $timer = 0;

            foreach ($start_page_img_slider_images as $image) {
                $image_url = $image['url'];
                $image_id = $image['attachment_id'];

                $css .= '
                .start-page .img-slider .img-slider-bg.img-slider-'.$image_id.'  {
                    background-image: url('.$image_url.');
                ';
                    if ($timer != 0) {
                        $css .= '
                            -webkit-animation-delay: '.$timer.'s;
                            -moz-animation-delay: '.$timer.'s;
                            -o-animation-delay: '.$timer.'s;
                            -ms-animation-delay: '.$timer.'s;
                            animation-delay: '.$timer.'s;
                        ';
                    }
                $css .= '}';

                $timer = $timer + $start_page_img_slider_speed;
            } 

            $img_slides_count = count($start_page_img_slider_images); 
            $img_slides_cycle = $img_slides_count * $start_page_img_slider_speed;
            $img_slides_speed = $img_slides_count * $start_page_img_slider_speed;

            $css .= '
            .start-page .img-slider .img-slider-bg {
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0px;
                left: 0px;
                color: transparent;
                background-size: cover;
                background-position: 50% 50%;
                background-repeat: none;
                opacity: 0;
                z-index: 0;
                -webkit-backface-visibility: hidden;
                -webkit-animation: imageAnimation '.$img_slides_speed.'s linear infinite 0s;
                -moz-animation: imageAnimation '.$img_slides_speed.'s linear infinite 0s;
                -o-animation: imageAnimation '.$img_slides_speed.'s linear infinite 0s;
                -ms-animation: imageAnimation '.$img_slides_speed.'s linear infinite 0s;
                animation: imageAnimation '.$img_slides_speed.'s linear infinite 0s;
            }';

            $anim_opacity_first = (($img_slides_count / $img_slides_cycle) / 2)* 100;
            $anim_opacity_second = 100 / $img_slides_count;
            $anim_opacity_third = $anim_opacity_first + $anim_opacity_second;

            $css .= '
            @-webkit-keyframes imageAnimation { 
                0% { opacity: 0;
                -webkit-animation-timing-function: ease-in; }
                '.$anim_opacity_first.'% { opacity: 1;
                     -webkit-animation-timing-function: ease-out; }
                '.$anim_opacity_second.'% { opacity: 1 }
                '.$anim_opacity_third.'% { opacity: 0 }
                100% { opacity: 0 }
            }
            @-moz-keyframes imageAnimation { 
                0% { opacity: 0;
                -moz-animation-timing-function: ease-in; }
                '.$anim_opacity_first.'% { opacity: 1;
                     -moz-animation-timing-function: ease-out; }
                '.$anim_opacity_second.'% { opacity: 1 }
                '.$anim_opacity_third.'% { opacity: 0 }
                100% { opacity: 0 }
            }
            @-o-keyframes imageAnimation { 
                0% { opacity: 0;
                -o-animation-timing-function: ease-in; }
                '.$anim_opacity_first.'% { opacity: 1;
                     -o-animation-timing-function: ease-out; }
                '.$anim_opacity_second.'% { opacity: 1 }
                '.$anim_opacity_third.'% { opacity: 0 }
                100% { opacity: 0 }
            }
            @-ms-keyframes imageAnimation { 
                0% { opacity: 0;
                -ms-animation-timing-function: ease-in; }
                '.$anim_opacity_first.'% { opacity: 1;
                     -ms-animation-timing-function: ease-out; }
                '.$anim_opacity_second.'% { opacity: 1 }
                '.$anim_opacity_third.'% { opacity: 0 }
                100% { opacity: 0 }
            }
            @keyframes imageAnimation { 
                0% { opacity: 0;
                animation-timing-function: ease-in; }
                '.$anim_opacity_first.'% { opacity: 1;
                     animation-timing-function: ease-out; }
                '.$anim_opacity_second.'% { opacity: 1 }
                '.$anim_opacity_third.'% { opacity: 0 }
                100% { opacity: 0 }
            }';
        }
    }

    if ($start_page_style == 'second-style') {
        if( !empty( $start_page_bg ) ) {
            $css .= '
            .section-inner.start-page-full-width .inner-content .fill-block {
                background-image: url('.$start_page_bg['url'].');
            }';
        }
        
        if ($start_page_bg_position == 'yes') {
            $css .= '
            .section-inner.start-page-full-width .row {
                flex-direction: row-reverse;
            }';
        }
    }

    $css .= '
    .btn-primary:hover,
    .btn-primary:focus,
    button:hover,
    button:focus,
    input[type="button"]:hover,
    input[type="button"]:focus,
    input[type="submit"]:hover,
    input[type="submit"]:focus,
    .site-main-menu > li > a:after,
    .timeline-item:after,
    .skill-percentage,
    .service-icon,
    .lm-pricing .lm-package-wrap.highlight-col .lm-heading-row span:after,
    .portfolio-page-nav > div.nav-item a:hover,
    .testimonials.owl-carousel .owl-nav .owl-prev:hover,
    .testimonials.owl-carousel .owl-nav .owl-next:hover,
    .clients.owl-carousel .owl-nav .owl-prev:hover,
    .clients.owl-carousel .owl-nav .owl-next:hover,
    .share-buttons a:hover,
    .fw-pricing .fw-package-wrap.highlight-col .fw-heading-row span:after,
    .cat-links li a,
    .cat-links li a:hover,
    .calendar_wrap td#today,
    .nothing-found p,
    .form-control + .form-control-border,
    .blog-sidebar .sidebar-title h4:after,
    .block-title h3:after,
    h3.comment-reply-title:after,
    .site-main-menu:not(.one-page-menu) li.active a:after,
    .site-main-menu.one-page-menu li a.active:after,
    .site-main-menu li.current-menu-item > a:after,
    .site-main-menu li a:after,
    .paging-navigation .page-numbers.current,
    .skills-second-style .skill-percentage,
    .portfolio-grid figure .portfolio-preview-desc h5:after,
    .preloader-spinner,
    .info-list li .title:after,
    .header .social-links a:hover,
    .fw-shortcode-calendar .cal-day-today,
    .fw-shortcode-calendar .cal-day-today.event-day,
    .wp-block-pullquote.is-style-solid-color,
    .wp-block-button:not(.is-style-outline) .wp-block-button__link:not(.has-background),
    .wp-block-button.is-style-outline .wp-block-button__link:active,
    .wp-block-button.is-style-outline .wp-block-button__link:focus,
    .wp-block-button.is-style-outline .wp-block-button__link:hover {
        background-color: '.$theme_main_color.';
    }';

    $css .= '
    .blog-sidebar .sidebar-item {
        background-color: '.$sidebar_bg_color.';
    }';

    $css .= '
    a,
    .form-group-with-icon.form-group-focus i,
    .site-title span,
    .header-search button:hover,
    .header-search button:focus,
    .block-title h3 span,
    .header-search button:hover,
    .header-search button:focus,
    .lm-info-block .lm-info-block-value,
    .ajax-page-nav > div.nav-item a:hover,
    .project-general-info .fa,
    .comment-author a:hover,
    .comment-list .pingback a:hover,
    .comment-list .trackback a:hover,
    .comment-metadata a:hover,
    .comment-reply-title small a:hover,
    .entry-title a:hover,
    .entry-content .edit-link a:hover,
    .post-navigation a:hover,
    .image-navigation a:hover,
    .portfolio-grid figure i,
    .lmpixels-arrows-nav > div:hover i,
    .lmpixels-scroll-to-top:hover,
    .cal-month-day.event-day span[data-cal-date],
    #cal-slide-content a.event-item {
        color: '.$theme_main_color.';
    }';

    $css .= '
    .start-page .title-block h2 {
        color: '.$sp_title_color.';
    }

    .start-page .title-block .sp-subtitle {
        color: '.$sp_subtitle_color.';
    }

    a,
    .entry-meta:not(.entry-tags-share) a:hover {
        color: '.$links_color.';
    }

    a:hover,
    .post-navigation .meta-nav:hover {
        color: '.$links_hover_color.';
    }';


    $css .= '
    .btn-primary:hover,
    .btn-primary:focus,
    button:hover,
    button:focus,
    input[type="button"]:hover,
    input[type="button"]:focus,
    input[type="submit"]:hover,
    input[type="submit"]:focus,
    .timeline-item,
    .timeline-item:before,
    .page-links a:hover,
    .paging-navigation .page-numbers.current,
    .portfolio-grid figure .portfolio-preview-desc h5:after,
    .paging-navigation a:hover,
    .skill-container,
    .btn-primary, button, input[type="button"], input[type="submit"],
    .timeline-second-style .divider:after,
    .skills-second-style .skill-container,
    .blog-sidebar ul li:before,
    .portfolio-filters li.active a,
    .portfolio-filters li.active a:hover,
    .share-buttons a:hover,
    .testimonials.owl-carousel .owl-nav .owl-prev:hover,
    .testimonials.owl-carousel .owl-nav .owl-next:hover,
    .clients.owl-carousel .owl-nav .owl-prev:hover,
    .clients.owl-carousel .owl-nav .owl-next:hover,
    .wp-block-pullquote,
    .wp-block-button .wp-block-button__link {
        border-color: '.$theme_main_color.';
    }';


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

    $css .= '
    .section-title-block.first-style .section-title,
    .page-title-wrap.first-style h2.page-title,
    .section-title-block.second-style .section-title:after,
    .page-title-wrap.second-style h2.page-title:after {
        background-color: '.$cp_general_bg_color.';
    }

    .section-title-block.first-style .section-title:before,
    .page-title-wrap.first-style .page-title:before {
        border-right-color: '.$cp_general_bg_color.';
    }

    .section-title-block.first-style .section-title,
    .page-title-wrap.first-style h2.page-title,
    .section-title-block.second-style .section-title,
    .page-title-wrap.second-style h2.page-title {
        color: '.$cp_general_title_color.';
        font-size: '.$cp_general_title_size.'px;
        font-family: '.$cp_general_title_font.', Helvetica, sans-serif;
        font-weight: '.$cp_general_title_weight.';
        font-style: '.$cp_general_title_style.';
        letter-spacing: '.$cp_general_title_spacing.'px;
    }

    .pt-page:not(.start-page) .section-inner,
    .pt-page.second-style .section-inner,
    .single-page-content:not(.content-page-with-sidebar) .content-area,
    .custom-page-content .page-content,
    .portfolio-page-content,
    .content-page-with-sidebar .page-content,
    .start-page-content .page-content,
    .single-page-content.content-page-with-sidebar:not(.start-page-template) .content-area .page-content,
    .single-post .site-content .has-post-thumbnail .post-content,
    .timeline-second-style .divider:after {
        background-color: '.$cp_general_content_bg_color.';
    }

    .skills-second-style .skill-percentage,
    .skills-first-style .skill-percentage {
        border-color: '.$cp_general_content_bg_color.';
    }';


    $args = array(
        'numberposts' => -1,
        'category'    => 0,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'include'     => array(),
        'exclude'     => array(),
        'meta_key'    => '',
        'meta_value'  =>'',
        'post_type'   => 'page',
        'suppress_filters' => true,
    );

    $posts = get_posts( $args );

    foreach($posts as $post) { 
        setup_postdata($post);
        $custom_page_header = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_post_option($post->ID, 'cp_custom_header/cp_custom_header_switcher', '') : 'off';

        if ($custom_page_header == "on") {
            $cp_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_post_option($post->ID, 'cp_custom_header/on/cp_bg_color', '') : '';
            $cp_title_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_post_option($post->ID, 'cp_custom_header/on/cp_title_color', '') : '';
            $cp_bg_image = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_post_option($post->ID, 'cp_custom_header/on/cp_bg_img', '') : '';

            $css .= '
            .pt-page-<?php echo esc_attr($post->post_name); ?> .section-title-block.first-style .section-title,
            .page-id-<?php echo esc_attr($post->ID); ?> .page-title-wrap.first-style h2.page-title {
                background-color: '.$cp_bg_color.';
                color: '.$cp_title_color.';
            }

            .pt-page-'.$post->post_name.' .section-title-block.second-style .section-title,
            .page-id-'.$post->ID.' .page-title-wrap.second-style h2.page-title {
                color: '.$cp_title_color.';
            }

            .pt-page-'.$post->post_name.' .section-title-block.second-style .section-title:after,
            .page-id-'.$post->ID.' .page-title-wrap.second-style h2.page-title:after {
                background-color: '.$cp_title_color.';
            }

            .pt-page-'.$post->post_name.' .section-title-block.first-style .section-title:before,
            .page-id-'.$post->ID.' .page-title-wrap.first-style h2.page-title:before {
                border-right-color: '.$cp_bg_color.';
            }';
        }
        $custom_page_content_area = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_post_option($post->ID, 'cp_custom_content_area/cp_custom_ca_switcher', '') : 'off';
        if ($custom_page_content_area == 'on') {
            $cp_ca_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_post_option($post->ID, 'cp_custom_content_area/on/cp_ca_bg_color', '') : '#ffffff';
            $css .= '
            .pt-page.pt-page-'.$post->post_name.' .section-inner,
            .page-id-'.$post->ID.' .single-page-content:not(.content-page-with-sidebar) .content-area {
                background-color: '.$cp_ca_bg_color.';
            }';
        }

    }
    wp_reset_postdata();


    $css .= '
    .header {
        background-color: '.$site_header_bg.';
    }';

    $css .= '
    @media only screen and (min-width: 991px) {
        .header {
            width: '.$site_header_width.';
        }
        .site-main {
            margin-left: '.$site_header_width.';
        }
    }

    .site-title {
        font-family: '.$site_header_title_font.', Helvetica, sans-serif;
        font-size: '.$site_header_title_size.'px;
        font-weight: '.$site_header_title_weight.';
        font-style: '.$site_header_title_style.';
        line-height: '.$site_header_title_line_height.'em;
        color: '.$site_header_title_color.';
        letter-spacing: '.$site_header_title_spacing.'px;
    }

    .site-subtitle {
        font-family: '.$site_header_subtitle_font.', Helvetica, sans-serif;
        font-size: '.$site_header_subtitle_size.'px;
        font-weight: '.$site_header_subtitle_weight.';
        font-style: '.$site_header_subtitle_style.';
        line-height: '.$site_header_subtitle_line_height.'em;
        color: '.$site_header_subtitle_color.';
        letter-spacing: '.$site_header_subtitle_spacing.'px;
    }

    .site-main-menu li a,
    .site-main-menu li a:hover {
        font-family: '.$main_menu_font.', Helvetica, sans-serif;
        font-size: '.$main_menu_size.'px;
        font-weight: '.$main_menu_weight.';
        font-style: '.$main_menu_style.';
        line-height: '.$main_menu_line_height.'em;
        color: '.$main_menu_color.';
        letter-spacing: '.$main_menu_spacing.'px;
    }

    .site-main-menu > li:first-child a,
    .kerge-classic-menu > li:first-child a,
    .site-main-menu li a,
    .site-main-menu li a:hover {
        border-color: '.$main_menu_borders_color.';
    }

    .site-main-menu li a:hover,
    .site-main-menu > li.active > a,
    .site-main-menu.one-page-menu li a.active,
    .site-main-menu li.current-menu-item > a,
    .dl-back > a:hover,
    .site-main-menu li > a.active {
        background-color: '.$main_menu_hover_bg.';
    }';

    if ( is_rtl() ) {
        $css .='@media only screen and (min-width: 991px) {
            .rtl .site-main {
                margin-right: '.$site_header_width.';
                margin-left: auto;
            }

            .pt-page {
                padding-left: 0;
                padding-right: 15px;
            }

            .section-title-block.first-style .section-title:before,
            .page-title-wrap.first-style .page-title:before {
                border-left-color: '.$cp_general_bg_color.';
            }
        }
        ';
    }

    $css .= $custom_styles;

    $customization_css = $css;

    return apply_filters( 'kerge_theme_customizations', $customization_css ); 

} 