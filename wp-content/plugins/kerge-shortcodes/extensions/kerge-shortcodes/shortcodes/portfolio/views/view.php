<?php if (!defined('FW')) die('Forbidden');

/**
 * @var $atts The shortcode attributes
 */
global $post;
global $wp_query;
$layout = $atts['layout'];

$load_more_feature = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('portfolio_load_more/portfolio_load_more_switcher') : 'off';

$categories_selected_array = $atts['categories'];

/* Load More Feature Vars */
if ($load_more_feature == 'on') {
    $load_more_number = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('portfolio_load_more/on/projects_number') : '9';
    $load_more_button_text = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('portfolio_load_more/on/button_text') : '';
    $load_more_button_loading = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('portfolio_load_more/on/button_text_loading') : '';
}
/* /Load More Feature Vars */

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

if ( fw_ext('portfolio') && function_exists( 'kerge_filter_portfolio_extension' ) ) {
    $ext_portfolio_instance = fw()->extensions->get( 'portfolio' );
    $ext_portfolio_settings = $ext_portfolio_instance->get_settings();
    $taxonomy               = $ext_portfolio_settings['taxonomy_name'];
    $term                   = get_term_by( 'slug', get_query_var( 'term' ), $taxonomy );
    if (empty($categories_selected_array)):
        $term_id            = ( ! empty( $term->term_id ) ) ? $term->term_id : 0;
        $categories_selected_array = get_terms( $taxonomy, array(
            'hide_empty' => 0,
            'fields' => 'ids'
        ) );
        $categories_selected_string = implode(",", $categories_selected_array);
    else:
        $term_id            = $categories_selected_array;
        $categories_selected_string = implode(",", $categories_selected_array);
    endif;
    $categories             = fw_ext_portfolio_get_listing_categories( $term_id );
}
?>

<?php if ( fw_ext('portfolio') && function_exists( 'kerge_filter_portfolio_extension' ) ) { ?>                        
    <!-- Portfolio Content -->
    <div id="portfolio_content_<?php echo esc_attr($atts['id']); ?>" class="portfolio-content" data-categories="<?php echo esc_attr($categories_selected_string); ?>">

        <?php if ( ! empty( $categories ) ) : ?>
            <ul class="portfolio-filters">
                <li class="active">
                    <a class="filter btn btn-sm btn-link" data-group="category_all"><?php esc_html_e( 'All', 'kerge-shortcodes' ); ?></a>
                </li>
                <?php foreach ( $categories as $category ) : ?>
                    <li>
                        <a class="filter btn btn-sm btn-link" data-group="category_<?php echo esc_attr($category->slug); ?>"><?php echo esc_attr($category->name); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif ?>

        <?php 
            if ($load_more_feature == 'on') {
                $args_portfolio = array(
                    'post_type' => 'fw-portfolio',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'fw-portfolio-category',
                            'field'    => 'id',
                            'terms'    => $categories_selected_array
                        ),
                    ),
                    'posts_per_page' => $load_more_number,
                    'post_status' => 'publish'
                );
            } else {
                $args_portfolio = array( 
                    'post_type' => 'fw-portfolio',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'fw-portfolio-category',
                            'field'    => 'id',
                            'terms'    => $categories_selected_array
                        ),
                    ),
                    'posts_per_page' => -1,
                    'post_status' => 'publish'
                );
            }

            $loop_portfolio = new WP_Query( $args_portfolio );

            $max = $loop_portfolio->max_num_pages;
        ?>

        <!-- Portfolio Grid -->
        <div class="portfolio-grid <?php echo esc_attr($layout); ?>" <?php if ($load_more_feature == 'on'): ?>data-pages-num="<?php echo esc_attr($max); ?>"<?php endif; ?>>

        <?php
            if ( $loop_portfolio->have_posts() ) :
                $i = 1;

                while ( $loop_portfolio->have_posts() ) : $loop_portfolio->the_post();

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
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/portfolio_no_image.jpg" class="portfolio-without-image" alt="<?php esc_attr_e('image', 'kerge-shortcodes'); ?>" />
                                    <?php
                                }
                            ?>

                            <?php
                                if ( $portfolio_type == 'standard' )
                                {
                                    $icon = 'fa fa-file-text-o';
                                    $portfolio_use_ajax = fw_get_db_post_option($post->ID, 'portfolio_type/standard/pf_use_ajax', 'yes');
                                    ?>  
                                        <?php if ( $portfolio_use_ajax == 'yes' ) { ?>
                                        <a href="<?php the_permalink(); ?>" class="ajax-page-load"></a>
                                        <?php } else { ?>
                                        <a href="<?php the_permalink(); ?>"></a>
                                        <?php } ?>
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
        ?>
        </div>

        <?php if ( $load_more_feature == 'on' && $max > 1 ): ?>
        <div>
            <a class="btn btn-primary pf-load-more" href="#" data-load-text="<?php echo esc_attr_e($load_more_button_loading); ?>" data-more-text="<?php echo esc_attr_e($load_more_button_text); ?>"><?php echo esc_html_e($load_more_button_text); ?></a>
        </div>
        <?php endif; ?>

    </div>
<?php } ?>
