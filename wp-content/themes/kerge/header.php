<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Loading animation -->
<div class="preloader">
  <div class="preloader-animation">
    <div class="preloader-spinner">
    </div>
  </div>
</div>
<!-- /Loading animation -->

<div id="page" class="page-layout">

    <header id="site_header" class="header mobile-menu-hide">
        <div class="header-content clearfix">
            <?php
            $logo_img = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('photo') : '';
            if( !empty( $logo_img ) ) :
                $logo_img_alt = get_post_meta($logo_img['attachment_id'], '_wp_attachment_image_alt', true);
                if (empty($logo_img_alt)) {
                    $logo_img_alt = __('image', 'kerge');
                }
            ?>
            <div class="header-image">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo esc_url($logo_img['url']); ?>" alt="<?php echo esc_attr($logo_img_alt); ?>">
                </a>
            </div>
            <?php endif ?>

            <?php
            $text_logo = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('logo') :  get_bloginfo( 'name' );
            $header_subtitle = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('header_subtitle') :  '';

            if( !empty( $text_logo ) || !empty( $text_logo_color ) ) :
            ?>
            <div class="site-title-block">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if( !empty( $text_logo ) ) : ?>
                        <h1 class="site-title"><?php echo esc_html($text_logo); ?></h1>
                    <?php endif; ?>

                    <?php if( !empty( $header_subtitle ) ) : ?>
                        <p class="site-subtitle"><?php echo esc_html($header_subtitle); ?></p>
                    <?php endif; ?>
                </a>
            </div>
            <?php endif ?>


            <!-- Navigation -->
            <div class="site-nav dl-menuwrapper">
                <?php
                if ( is_page_template('page-templates/template-kerge-vcard.php') || is_page_template('page-templates/template-kerge-vcard-one-page.php') )
                {   
                    $random_animations = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('subpages_animations/subpages_animations_switcher') :  'on';
                    $animation_type = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('subpages_animations/off/animation_number') :  '';
                    ?>
                    <!-- Main menu -->
                    <ul id="nav" class="site-main-menu site-auto-menu <?php if (is_page_template('page-templates/template-kerge-vcard-one-page.php')) { ?>one-page-menu<?php } ?>" <?php if ($random_animations == 'off'): ?>data-animation="<?php echo esc_attr($animation_type) ?>"<?php endif; ?>>

                    </ul>
                    <?php if(has_nav_menu('kerge-template-menu')){ wp_nav_menu( array( 'menu_class' => 'kerge-additional-menu site-main-menu dl-menu dl-menuopen', 'theme_location' => 'kerge-template-menu', 'container' => '', 'depth' => 6) ); }
                    ?>
                    <!-- /Main menu -->
                <?php
                }
                else
                {   
                    ?>
                    <!-- Main menu -->
                    <?php 
                    if(has_nav_menu('classic-menu-new')){ 
                        wp_nav_menu( [ 
                            'menu_class' => 'kerge-classic-menu-new site-main-menu site-auto-menu main-menu dl-menu dl-menuopen',
                            'theme_location' => 'classic-menu-new', 
                            'echo' => true, 
                            'container' => false, 
                            'depth' => 6,
                            'walker'=> new Kerge_Onepage_Walker()
                        ] );
                    } elseif(has_nav_menu('classic-menu')){ 
                        wp_nav_menu( array( 'menu_class' => 'kerge-classic-menu site-main-menu dl-menu dl-menuopen', 'theme_location' => 'classic-menu', 'container' => '', 'depth' => 6) ); 
                    }
                    ?>
                    <!-- /Main menu -->
                    <?php
                }

                // Search field
                $display_header_search = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('header_search') :  'yes';
                if ($display_header_search == 'yes') {
                ?>
                <div class="header-search">
                    <form role="search" id="search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                        <input type="text" id="search" class="form-control" name="s" value="<?php the_search_query(); ?>" placeholder="<?php esc_attr_e('Search', 'kerge'); ?>" required="required">
                        <button type="submit" id="search-submit" class="search-submit" title="<?php esc_attr_e('Search', 'kerge'); ?>">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
                <?php 
                }
                // /Search field
                ?>
            </div>

            <!-- Social Links -->
            <?php if ( function_exists('fw_get_db_settings_option') ): ?>
            <div class="social-links">
                <?php $kerge_header_social = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('header_social') : '';
                if ( !empty($kerge_header_social)) :
                    foreach ($kerge_header_social as $kerge_header_social):
                        if( !empty( $kerge_header_social['link'] ) ) : ?>
                            <a href="<?php echo esc_url($kerge_header_social['link']); ?>" target="_blank">
                                <?php
                                    if (!empty($kerge_header_social['image']['url'])) {
                                        ?>
                                            <img src="<?php echo esc_url($kerge_header_social['image']['url']); ?>" alt="<?php echo esc_attr($kerge_header_social['title']); ?>">
                                        <?php 
                                    } else  {
                                        ?>
                                            <i class="<?php echo esc_attr($kerge_header_social['icon']); ?>"></i>
                                        <?php 
                                    }
                                ?>
                            </a>
                        <?php endif;
                    endforeach;
                endif;
                ?>
            </div>
            <?php endif; ?>
            <!-- /Social Links -->

            <!-- Copyrights -->
            <?php $copyrights = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('copyrights') : '';
            if( !empty( $copyrights ) ) :
            ?>
            <div class="copyrights"><?php echo wp_kses_post($copyrights) ?></div>
            <?php endif ?>
            <!-- /Copyrights -->
        </div>
    </header>
    <!-- /Header -->

    <!-- Mobile Header -->
    <div class="mobile-header mobile-visible">
        <div class="mobile-logo-container">
            <?php if( !empty( $logo_img ) ) : ?>
            <div class="mobile-header-image">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo esc_url($logo_img['url']); ?>" alt="<?php esc_attr_e('image', 'kerge'); ?>">
                </a>
            </div>
            <?php endif; ?>

            <div class="mobile-site-title">
                <?php if( !empty( $text_logo ) || !empty( $text_logo_color ) ) :
                ?>
                    <?php if( !empty( $text_logo ) ) : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <?php echo esc_html($text_logo); ?>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>

        <a class="menu-toggle mobile-visible">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <!-- /Mobile Header -->
