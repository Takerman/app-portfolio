<?php
/*
Template Name: Kerge vCard Animated NEW
*/
$arrows_nav = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('arrows_nav') :  'on';
get_header(); ?>

<div id="main" class="site-main">
    <!-- Page changer wrapper -->
    <div class="pt-wrapper">
        <!-- Subpages -->
        <div class="subpages animated-subpages animated-sections">
            <?php
            if ( has_nav_menu( 'classic-menu-new' ) ) {
                $menu_name = 'classic-menu-new';
                $locations = get_nav_menu_locations();
                $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
                $cp_titles_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_style') : 'second-style';
                foreach( $menuitems as $item ) {
                    $title = $item->post_name;
                    $url = $item->url;
                    $slug = basename(parse_url($url, PHP_URL_PATH));

                    if ( $item->object == 'page' ) {
                
                        $args_custom_page = 'pagename=' . $slug;
                        $loop_custom_page = new WP_Query( $args_custom_page );
                        
                        if ( $loop_custom_page->have_posts() ) :
                            while ( $loop_custom_page->have_posts() ) : $loop_custom_page->the_post();
                                $template = get_post_meta( get_the_ID(), '_wp_page_template', true );
                                $cp_hide_title = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_post_option(get_the_ID(),'cp_hide_header') : 'no';
                                $subtitle = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_post_option(get_the_ID(),'cp_page_subtitle') : '';
                                
                                if ($template == ( 'page-templates/template-kerge-start-page.php' )) {
                                ?>


                                    <?php $start_page_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('sp_style/sp_style_picker') : 'second-style'; ?>
                                    <section data-id="<?php echo esc_attr($slug); ?>" class="pt-page pt-page-<?php echo esc_attr($slug); ?> animated-section start-page <?php echo esc_attr($start_page_style); ?>">
                                        <?php if ($start_page_style == 'first-style') { 
                                            $start_page_img_slider = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('sp_style/first-style/hp_img_slider/hp_img_slider_switcher') :  'off';
                                            $start_page_img_slider_images = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('sp_style/first-style/hp_img_slider/on/images') :  '';
                                        ?>
                                        <div class="section-inner vcentered">
                                            <?php if ($start_page_img_slider == 'on') { ?>
                                            <div class="img-slider">
                                                <?php foreach ($start_page_img_slider_images as $image) {
                                                    $image_url = $image['url'];
                                                    $image_id = $image['attachment_id'];
                                                ?>
                                                <div class="img-slider-bg img-slider-<?php echo esc_attr($image_id); ?>"></div>
                                                <?php } ?>
                                            </div>
                                            <?php } ?>
                                            <div class="mask"></div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <div class="title-block">
                                                        <?php
                                                        $main_title = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('sp_style/first-style/hp_main_title') :  get_bloginfo( 'name' );
                                                        if( !empty( $main_title ) ) :
                                                        ?>
                                                        <h2><?php echo wp_kses_post($main_title); ?></h2>
                                                        <?php endif; ?>
                                                        <?php if ( function_exists('fw_get_db_settings_option') ): ?>
                                                        <div class="owl-carousel text-rotation">                                    
                                                            <?php foreach (( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('sp_style/first-style/hp_subtitles') : '' as $kerge_project_tags): ?>
                                                                <div class="item">
                                                                    <div class="sp-subtitle"><?php echo wp_kses_post($kerge_project_tags); ?></div>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php } elseif ($start_page_style == 'second-style') { ?>

                                        <?php
                                            $start_page_text = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('sp_style/second-style/hp_text') : '';
                                            $start_page_bg = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('sp_style/second-style/hp_background') : '';
                                        ?>

                                        <div class="section-inner start-page-full-width">
                                            <div class="start-page-full-width">
                                                <div class="row">
                                                    <?php if (!empty($start_page_bg['url'])) { ?>
                                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                                        <div class="inner-content">
                                                            <div class="fill-block"></div>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if (!empty($start_page_bg['url'])) { ?>
                                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <?php } else { ?>
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <?php } ?>
                                                        <div class="inner-content">
                                                            <div class="hp-text-block">
                                                                <?php if ( function_exists('fw_get_db_settings_option') ): ?>
                                                                <div class="owl-carousel text-rotation">                                    
                                                                    <?php foreach (( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('sp_style/second-style/hp_subtitles') : '' as $kerge_project_tags): ?>
                                                                        <div class="item">
                                                                            <div class="sp-subtitle"><?php echo wp_kses_post($kerge_project_tags); ?></div>
                                                                        </div>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                                <?php endif; ?>
                                                                <?php
                                                                $main_title = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('sp_style/second-style/hp_main_title') :  get_bloginfo( 'name' );
                                                                if( !empty( $main_title ) ) :
                                                                ?>
                                                                <h2 class="hp-main-title"><?php echo wp_kses_post($main_title); ?></h2>
                                                                <?php endif; ?>

                                                                <?php echo wp_kses_post($start_page_text); ?>


                                                                <?php if ( function_exists('fw_get_db_settings_option') ): ?>
                                                                    <?php $hp_buttons = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('sp_style/second-style/hp_buttons') : '';
                                                                    if ( !empty($hp_buttons)) : ?>
                                                                        <div class="hp-buttons">
                                                                        <?php
                                                                        foreach ($hp_buttons as $hp_buttons):
                                                                            if( !empty( $hp_buttons['link'] ) ) :
                                                                            $target = (!isset($hp_buttons['target'])) ? '_blank' : $hp_buttons['target'];
                                                                        ?>
                                                                                <a href="<?php echo esc_url($hp_buttons['link']); ?>" target="<?php echo esc_attr($target) ?>" class="btn btn-primary"><?php echo esc_attr($hp_buttons['title']); ?></a>
                                                                        <?php endif;
                                                                        endforeach;
                                                                        ?>
                                                                        </div>
                                                                        <?php
                                                                    endif;
                                                                    ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="section-inner custom-page-content">
                                             <?php
                                                the_content();
                                            ?>
                                        </div>
                                        <?php } ?>
                                        
                                    </section>

                                    
                                <?php
                                } else {
                                    ?>
                                    <section data-id="<?php echo esc_attr($slug); ?>" class="pt-page pt-page-<?php echo esc_attr($slug); ?> animated-section">
                                        <div class="section-inner custom-page-content">
                                            <?php if($cp_hide_title == 'no') {
                                            ?>
                                            <div class="section-title-block <?php echo esc_attr($cp_titles_style); ?>">
                                                <?php the_title( '<h2 class="section-title">', '</h2>' ); ?>
                                                <?php if (!empty($subtitle)): ?>
                                                <h5 class="section-description"><?php echo esc_html($subtitle); ?></h5>
                                                <?php endif; ?>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                            <div class="section-content">
                                            <?php
                                            the_content();
                                            ?>
                                            </div>
                                        </div>
                                    </section>
                                    <?php
                                }
                            endwhile;
                        endif;
                        wp_reset_postdata();
                    }
                }
            }
            ?>
        </div>
    </div>
</div>

<?php if($arrows_nav == "yes"): ?>
<!-- Arrows Nav -->
<div class="lmpixels-arrows-nav">
    <div class="lmpixels-arrow-left"><i class="dashicons dashicons-arrow-left-alt2"></i></div>
    <div class="lmpixels-arrow-right"><i class="dashicons dashicons-arrow-right-alt2"></i></div>
</div>
<!-- /Arrows Nav -->
<?php endif; ?>

<?php get_footer(); ?>
