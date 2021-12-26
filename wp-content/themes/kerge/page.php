<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 */

get_header(); ?>
<div id="main" class="site-main">
    <div id="main-content" class="single-page-content">
        <div id="primary" class="content-area">
            <?php $cp_titles_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_style') : 'second-style'; ?>
            <div class="page-title-wrap <?php echo esc_attr($cp_titles_style); ?>">
                <?php
                    // Page thumbnail and title.
                    kerge_theme_post_thumbnail();
                    the_title( '<h2 class="page-title">', '</h2>' );
                ?>

                <?php $subtitle = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_post_option(get_the_ID(),'cp_page_subtitle') : '';

                if (!empty($subtitle)): ?>
                    <h5 class="page-description"><?php echo esc_html($subtitle); ?></h5>
                <?php endif; ?>
            </div>
            <div id="content" class="page-content site-content single-post" role="main">
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
            </div><!-- #content -->
        </div><!-- #primary -->
    </div><!-- #main-content -->
</div>
<?php get_footer(); ?>
