<?php
/*
Template Name: Kerge Start Page
*/

get_header(); ?>

<div id="main" class="site-main">
    <div id="main-content" class="single-page-content start-page-template">
        <div id="primary" class="content-area">
            <?php $start_page_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('sp_style/sp_style_picker') : 'second-style'; ?>
            <section class="pt-page pt-page-current start-page <?php echo esc_attr($start_page_style); ?>">
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

                                <?php
                                    // Start the Loop.
                                    while ( have_posts() ) : the_post();

                                        // Include the page content template.
                                        get_template_part( 'content', 'page' );

                                        // If comments are open or we have at least one comment, load up the comment template.
                                        if ( comments_open() || get_comments_number() ) {
                                            comments_template();
                                        }
                                    endwhile;
                                ?>
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
                        // Start the Loop.
                        while ( have_posts() ) : the_post();

                            // Include the page content template.
                            get_template_part( 'content', 'page' );

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) {
                                comments_template();
                            }
                        endwhile;
                    ?>
                </div>
                <?php } ?>
                
            </section>
        </div>
    </div>
</div>

<?php get_footer(); ?>
