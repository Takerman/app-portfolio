<?php
/*
Plugin Name: Kerge Shortcodes
Plugin URI: http://lmpixels.com
Description: Kerge Theme Shortcodes
Author: LMPixels
Version: 2.1.1
*/

add_action( 'plugins_loaded', 'kerge_shortcodes_textdomain' );

function kerge_shortcodes_textdomain() {
    load_plugin_textdomain( 'kerge-shortcodes', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}

function kerge_filter_plugin_shortcodes($locations) {
	$locations[
		dirname(__FILE__) . '/extensions'
	] = plugin_dir_url( __FILE__ ) . 'extensions';

	return $locations;
}

add_filter('fw_extensions_locations', 'kerge_filter_plugin_shortcodes');

/**
 * LMPixels Start page widget
 */
class KERGE_Start_Page_Widget extends WP_Widget
{
    private $options;
    private $prefix;

    public function __construct()
    {
        parent::__construct('start_page_widget',
                            __( '+ Kerge Theme &#151; Start Page', 'kerge-shortcodes' ),
                            array( 'description' => esc_html__( 'About Me, Resume etc.', 'kerge-shortcodes' ) ) );
    }
    
    
    public function form( $instance )
    {
        if ( isset( $instance[ 'title' ] ) ) { $title = $instance[ 'title' ]; } else { $title = ""; }
        if ( isset( $instance[ 'start_page_slug' ] ) ) { $start_page_slug = $instance[ 'start_page_slug' ]; } else { $start_page_slug = ""; }
        
        ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><strong><?php echo esc_html_e( 'Title', 'kerge-shortcodes' ); ?></strong></label>
                
                <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr( $title ); ?>">
            </p>
            
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'start_page_slug' )); ?>"><strong><?php echo esc_html_e( 'Select A Page', 'kerge-shortcodes' ); ?></strong></label>
                
                <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'start_page_slug' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'start_page_slug' )); ?>">
                
                    <option></option>
                    
                    <?php
                        $pages = get_pages();
                        
                        foreach ( $pages as $page )
                        {
                            if ( $start_page_slug == $page->post_name )
                            {
                                $option = '<option selected="selected" value="' . $page->post_name . '">' . $page->post_title . '</option>';
                                
                                echo wp_kses($option, array('option' => array('selected' => array(), 'value' => array())));
                            }
                            else
                            {
                                $option = '<option value="' . $page->post_name . '">' . $page->post_title . '</option>';
                                
                                echo wp_kses($option, array('option' => array('value' => array())));
                            }
                        }
                    ?>
                </select>
            </p>
        <?php
    }
    

    public function update( $new_instance, $old_instance )
    {
        $instance = array();
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['start_page_slug'] = strip_tags( $new_instance['start_page_slug'] );
        return $instance;
    }
    
    
    public function widget( $args, $instance )
    {
        extract( $args );

        $title = apply_filters( 'widget_title', $instance['title'] );

        $start_page_slug = apply_filters( 'widget_start_page_slug', $instance['start_page_slug'] );
        
        echo wp_kses_post( $before_widget );
        
        ?>
            <?php $start_page_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('sp_style/sp_style_picker') : 'second-style'; ?>

            <section <?php if ( is_page_template( 'page-templates/template-kerge-vcard-one-page.php' ) ) { ?>id<?php } else { ?>data-id<?php } ?>="<?php echo esc_attr($start_page_slug); ?>" data-title="<?php echo esc_attr($title); ?>" class="pt-page pt-page-<?php echo esc_attr($start_page_slug); ?> start-page <?php echo esc_attr($start_page_style); ?>">

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
                        $args_start_page = 'pagename=' . $start_page_slug;
                        $loop_start_page = new WP_Query( $args_start_page );
                        
                        if ( $loop_start_page->have_posts() ) :
                            while ( $loop_start_page->have_posts() ) : $loop_start_page->the_post();
                                ?>
                                <div class="page-content">
                                <?php
                                the_content();
                                ?>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                    ?>
                </div>
                <?php } ?>

            </section>
        <?php
        
        echo wp_kses_post( $after_widget );

    }
}

function kerge_register_start_page_widget() {
    register_widget( "kerge_start_page_widget" );
}

add_action( 'widgets_init', 'kerge_register_start_page_widget' );

/* ================================================================================================ */



/**
 * LMPixels custom page widget
 */
class KERGE_Custom_Page_Widget extends WP_Widget
{
    private $options;
    private $prefix;

    public function __construct()
    {
        parent::__construct('custom_page_widget',
                            __( '+ Kerge Theme &#151; Custom Page', 'kerge-shortcodes' ),
                            array( 'description' => esc_html__( 'About Me, Resume etc.', 'kerge-shortcodes' ) ) );
    }
    
    
    public function form( $instance )
    {
        if ( isset( $instance[ 'title' ] ) ) { $title = $instance[ 'title' ]; } else { $title = ""; }
        if ( isset( $instance[ 'subtitle' ] ) ) { $subtitle = $instance[ 'subtitle' ]; } else { $subtitle = ""; }
        if ( isset( $instance[ 'custom_page_slug' ] ) ) { $custom_page_slug = $instance[ 'custom_page_slug' ]; } else { $custom_page_slug = ""; }
        
        ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><strong><?php echo esc_html_e( 'Title', 'kerge-shortcodes' ); ?></strong></label>
                
                <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr( $title ); ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'subtitle' )); ?>"><strong><?php echo esc_html_e( 'Subtitle', 'kerge-shortcodes' ); ?></strong></label>
                
                <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'subtitle' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'subtitle' )); ?>" value="<?php echo esc_attr( $subtitle ); ?>">
            </p>
            
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'custom_page_slug' )); ?>"><strong><?php echo esc_html_e( 'Select A Page', 'kerge-shortcodes' ); ?></strong></label>
                
                <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'custom_page_slug' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'custom_page_slug' )); ?>">
                
                    <option></option>
                    
                    <?php
                        $pages = get_pages();
                        
                        foreach ( $pages as $page )
                        {
                            if ( $custom_page_slug == $page->post_name )
                            {
                                $option = '<option selected="selected" value="' . $page->post_name . '">' . $page->post_title . '</option>';

                                echo wp_kses($option, array('option' => array('selected' => array(), 'value' => array())));
                            }
                            else
                            {
                                $option = '<option value="' . $page->post_name . '">' . $page->post_title . '</option>';
                                
                                echo wp_kses($option, array('option' => array('value' => array())));
                            }
                        }
                    ?>
                </select>
            </p>

        <?php
    }
    

    public function update( $new_instance, $old_instance )
    {
        $instance = array();
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['subtitle'] = strip_tags( $new_instance['subtitle'] );
        $instance['custom_page_slug'] = strip_tags( $new_instance['custom_page_slug'] );

        return $instance;
    }
    
    
    public function widget( $args, $instance )
    {
        extract( $args );
        
        
        $title = apply_filters( 'widget_title', $instance['title'] );

        $subtitle = apply_filters( 'widget_subtitle', $instance['subtitle'] );

        
        $custom_page_slug = apply_filters( 'widget_custom_page_slug', $instance['custom_page_slug'] );

        $cp_titles_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_style') : 'second-style';
        
        echo wp_kses_post( $before_widget );   

        $args_custom_page = 'pagename=' . $custom_page_slug;
        $loop_custom_page = new WP_Query( $args_custom_page );

        if ( $loop_custom_page->have_posts() ) :
            while ( $loop_custom_page->have_posts() ) : $loop_custom_page->the_post();
                $page_subtitle = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_post_option(get_the_ID(),'cp_page_subtitle') : '';
            endwhile;
        endif;

        if (empty($page_subtitle)) {
            $page_subtitle = $subtitle;
        }
        ?>
            <section <?php if ( is_page_template( 'page-templates/template-kerge-vcard-one-page.php' ) ) { ?>id<?php } else { ?>data-id<?php } ?>="<?php echo esc_attr($custom_page_slug); ?>" data-title="<?php echo esc_attr($title); ?>" class="pt-page pt-page-<?php echo esc_attr($custom_page_slug); ?>">
                <div class="section-inner custom-page-content">
                    <div class="section-title-block <?php echo esc_attr($cp_titles_style); ?>">
                        <h2 class="section-title"><?php echo esc_html($title); ?></h2>
                        <?php if (!empty($subtitle)): ?>
                        <h5 class="section-description"><?php echo esc_html($page_subtitle); ?></h5>
                        <?php endif; ?>
                    </div>
                    <div class="section-content">
                        <?php
                            if ( $loop_custom_page->have_posts() ) :
                                while ( $loop_custom_page->have_posts() ) : $loop_custom_page->the_post();
                                    the_content();
                                endwhile;
                            endif;
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </section>
        <?php
        
        echo wp_kses_post( $after_widget );

    }
}

function kerge_register_custom_page_widget() {
    register_widget( "kerge_custom_page_widget" );
}

add_action( 'widgets_init', 'kerge_register_custom_page_widget' );

/* ================================================================================================ */

function kerge_update_active_widgets() {
    retrieve_widgets();
}

add_action( 'admin_init', 'kerge_update_active_widgets' );