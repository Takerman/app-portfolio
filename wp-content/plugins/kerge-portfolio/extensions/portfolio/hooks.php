<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}

function kerge_portfolio_post_thumbnail_sizes_attr($attr, $attachment, $size) {
    //Portfolio Thumbnails
    if ($size === 'portfolio-image-two-c') {
        $attr['sizes'] = '(max-width: 768px) 92vw, (max-width: 992px) 450px, (max-width: 1200px) 597px, 40vw';
    } elseif  ($size === 'portfolio-image-three-c') {
        $attr['sizes'] = '(max-width: 768px) 92vw, (max-width: 992px) 450px, (max-width: 1200px) 597px, 25vw';
    } elseif  ($size === 'portfolio-image-four-c') {
        $attr['sizes'] = '(max-width: 768px) 92vw, (max-width: 992px) 290px, (max-width: 1200px) 290px, 22vw';
    } elseif  ($size === 'portfolio-image-five-c') {
        $attr['sizes'] = '(max-width: 768px) 92vw, (max-width: 992px) 250px, (max-width: 1200px) 250px, 20vw';
    }
    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'kerge_portfolio_post_thumbnail_sizes_attr', 10 , 3);

function kerge_loadmore_ajax_handler(){
    global $post;
    $layout = $atts['layout'];
    $load_more_number = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('portfolio_load_more/on/projects_number') : '9';

    if ($layout === 'one-column'):
        $thumbnail_class = 'portfolio-image-one-c';
    elseif ($layout === 'two-columns'):
        $thumbnail_class = 'portfolio-image-two-c';
    elseif ($layout === 'three-columns'):
        $thumbnail_class = 'portfolio-image-three-c';
    elseif ($layout === 'four-columns'):
        $thumbnail_class = 'portfolio-image-four-c';
    elseif ($layout === 'five-columns'):
        $thumbnail_class = 'portfolio-image-five-c';
    else :
        $thumbnail_class = 'portfolio-image-three-c';
    endif;

    if ( fw_ext('portfolio') && function_exists( 'aveo_filter_portfolio_extension' ) ) {
        $ext_portfolio_instance = fw()->extensions->get( 'portfolio' );
        $ext_portfolio_settings = $ext_portfolio_instance->get_settings();
        $taxonomy               = $ext_portfolio_settings['taxonomy_name'];
        $term                   = get_term_by( 'slug', get_query_var( 'term' ), $taxonomy );
        $term_id                = ( ! empty( $term->term_id ) ) ? $term->term_id : 0;
        $categories             = fw_ext_portfolio_get_listing_categories( $term_id );
    }

    $paged = json_decode( stripslashes( $_POST['query'] ), true );
    $paged = $_POST['page'] + 1;
    $categories_that_load = $_POST['categories'];

    $args_portfolio = array( 
        'post_type' => 'fw-portfolio',
        'posts_per_page' => $load_more_number,
        'tax_query' => array(
            array(
              'taxonomy' => 'fw-portfolio-category',
              'field'    => 'id',
              'terms'    => $categories_that_load,
            ),
        ),
        'paged' => $paged
    );
    $loop_portfolio = new WP_Query( $args_portfolio );

    if ( $loop_portfolio->have_posts() ) :
        $i = 1;
        while ( $loop_portfolio->have_posts() && ( $i <= $load_more_number ) ) : $loop_portfolio->the_post();

            $category_icon = fw_get_db_term_option($term_id, 'category_icon', '');
            $portfolio_type = fw_get_db_post_option($post->ID, 'portfolio_type/portfolio_type_picker', '');

            $i++;
            
            ?>
                <!-- Portfolio Item <?php the_ID(); ?> -->
                <figure class="item <?php echo esc_attr($portfolio_type); ?>" data-groups='["category_all"<?php fw_theme_portfolio_post_taxonomies_slug(get_the_ID()); ?>]'>
                    <div class="portfolio-item-img">
                    <?php
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail( esc_attr($thumbnail_class), array( 'alt' => get_the_title(), 'title' => "" ) );
                        } else {
                            ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/portfolio_no_image.jpg" class="portfolio-without-image" alt="<?php esc_attr_e('image', 'aveo-portfolio'); ?>" />
                            <?php
                        }
                    ?>

                    <?php
                        if ( $portfolio_type == 'standard' )
                        {
                            $icon = 'fa fa-file-text-o';
                            ?>
                                <a href="<?php the_permalink(); ?>" class="ajax-page-load"></a>
                            <?php
                        }
                        elseif ( $portfolio_type == 'lbimage' )
                        {
                            $icon = 'fa fa-image';

                            $portfolio_featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
                            
                            $portfolio_featured_image_url = $portfolio_featured_image[0];
                            
                            ?>
                                <a class="lightbox" data-lightbox-gallery="fancybox-item-<?php echo get_the_ID(); ?>" title="<?php echo get_the_title(); ?>" href="<?php echo esc_url($portfolio_featured_image_url); ?>"></a>
                            <?php
                        }
                        elseif ( $portfolio_type == 'lbvideo' )
                        {   
                            $icon = 'fa fa-video-camera';

                            $portfolio_video_url = fw_get_db_post_option($post->ID, 'portfolio_type/lbvideo/videourl', '');
                            ?>  
                                <a href="<?php echo esc_url($portfolio_video_url); ?>" class="lightbox mfp-iframe" title="<?php echo get_the_title(); ?>"></a>
                            <?php
                        }
                        elseif ( $portfolio_type == 'lbaudio' )
                        {
                            $icon = 'fa fa-volume-up';

                            $portfolio_audio_url = fw_get_db_post_option($post->ID, 'portfolio_type/lbaudio/audiourl', '');
                            ?>  
                                <a href="<?php echo esc_url($portfolio_audio_url); ?>" class="lightbox mfp-iframe" title="<?php echo get_the_title(); ?>"></a>
                            <?php
                        }
                        elseif ( $portfolio_type == 'direct' )
                        {
                            $icon = 'fa fa-link';
                            $portfolio_direct_url = fw_get_db_post_option($post->ID, 'portfolio_type/direct/directurl', '');
                            $portfolio_link_new_tab = get_option( get_the_ID() . 'pf_link_new_tab', true );
                            
                            ?>
                                <a <?php if ( $portfolio_link_new_tab ) { echo 'target="_blank"'; } ?> href="<?php echo esc_url($portfolio_direct_url); ?>"></a>
                            <?php
                        }
                        // end if
                    ?>
                    <!-- /Image -->
                    </div>

                    <i class="<?php echo esc_attr($icon); ?>"></i>

                    <?php
                        $categories = get_terms( $taxonomy );
                    ?>

                    <h4 class="name"><?php the_title(); ?></h4>
                    <span class="category"><?php fw_theme_portfolio_post_taxonomies(get_the_ID()); ?></span>
                </figure>
                <!-- /Portfolio Item <?php the_ID(); ?> -->
            <?php
            
        endwhile;
    endif;
    wp_reset_query();

    die; // here we exit the script and even no wp_reset_query() required!
}
 
add_action('wp_ajax_loadmore', 'kerge_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmore', 'kerge_loadmore_ajax_handler');

/**
 * LMPixels custom taxonomy in the Gutenberg
 */
function kerge_portfolio_taxonomy_gutenberg() {
    $mytax = get_taxonomy( 'fw-portfolio-category' );
    $mytax->show_in_rest = true;
}

add_action( 'init', 'kerge_portfolio_taxonomy_gutenberg', 30 );
/* ================================================================================================ */
