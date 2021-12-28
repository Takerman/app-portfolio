<?php if (!defined('FW')) die('Forbidden');

/**
 * @var $atts The shortcode attributes
 */
global $post;

$blog_number_of_posts = $atts['number_of_posts'];
$layout = $atts['layout'];

if ($layout === 'one-column'):
    $thumbnail_class = 'blog-masonry-image-one-c';
elseif ($layout === 'two-columns'):
     $thumbnail_class = 'blog-masonry-image-two-c';
elseif ($layout === 'three-columns'):
     $thumbnail_class = 'blog-masonry-image-three-c';
endif;
?>

<div class="blog-masonry <?php echo esc_attr($layout); ?> clearfix">
    <?php
        $args_post = array( 'post_type' => 'post', 'posts_per_page' => -1 );
        $loop_post = new WP_Query( $args_post );
        
        if ( $loop_post->have_posts() ) :
            
            $i = 1;
            
            while ( ( $loop_post->have_posts() ) && ( $i <= $blog_number_of_posts ) ) : $loop_post->the_post();
                
                    $i++;
                    
                    ?>
                        <!-- Blog Post <?php the_ID(); ?> -->
                        <div class="item post-<?php the_ID(); ?>">
                          <div class="blog-card blog-card-without-img">
                            <div class="media-block">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if ( is_sticky() ): ?>
                                        <span class="sticky-badge"><i class="fa fa-fw fa-thumb-tack"></i></span>
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="post-info">
                                <div class="category">
                                    <?php
                                        $categories = get_the_category();
                                        $separator = ' ';
                                        $output = '';
                                        if ( ! empty( $categories ) ) {
                                            foreach( $categories as $category ) {
                                                $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( esc_html__( 'View all posts in %s', 'kerge-shortcodes' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                                            }
                                            echo trim( $output, $separator );
                                        }
                                    ?>
                                </div>
                                <div class="post-date"><?php echo esc_attr(get_the_date( 'd M Y' )); ?></div>
                                <a href="<?php the_permalink(); ?>"><h4 class="blog-item-title"><?php the_title(); ?></h4></a>
                                <div class="excerpt">
                                    <?php echo esc_attr(the_excerpt()); ?>
                                </div>
                            </div>
                          </div>
                        </div>
                        <!-- End of Blog Post <?php the_ID(); ?> -->
                    <?php
                
            endwhile;
        endif;
        wp_reset_postdata();
    ?>
</div>

<?php
    if ( get_option( 'show_on_front' ) == 'posts' )
    {
        ?>
            <div class="see-all-posts">
                <a class="btn btn-primary" href="<?php echo esc_url(home_url()); ?>"><?php echo esc_html_e( 'See All Posts', 'kerge-shortcodes' ); ?></a>
            </div>
        <?php
    }
    else
    {
        $blog_page_url = get_page_link( get_option( 'page_for_posts' ) );
        
        ?>
            <div class="see-all-posts">
                <a class="btn btn-primary" href="<?php echo esc_url($blog_page_url); ?>"><?php echo esc_html_e( 'See All Posts', 'kerge-shortcodes' ); ?></a>
            </div>
        <?php
    }
?>
