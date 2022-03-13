<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 */
$show_blog_sidebar = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('blog_sidebar') :  'yes';

get_header(); ?>
<div id="main" class="site-main">
    <?php if ( $show_blog_sidebar == 'yes' && is_active_sidebar( 'kerge-blog-sidebar' ) ): ?>
    <div id="main-content" class="single-page-content content-page-with-sidebar">
    <?php else: ?>
    <div id="main-content" class="single-page-content">
    <?php endif; ?>
        <div id="primary" class="content-area">
            <div id="content" class="page-content site-content" role="main">

				<?php if ( have_posts() ) : ?>
					<h2 class="archive-title">
						<?php
							if ( is_day() ) :
								printf( esc_html__( 'Daily Archives: %s', 'kerge' ), get_the_date() );

							elseif ( is_month() ) :
								printf( esc_html__( 'Monthly Archives: %s', 'kerge' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'kerge' ) ) );

							elseif ( is_year() ) :
								printf( esc_html__( 'Yearly Archives: %s', 'kerge' ), get_the_date( _x( 'Y', 'yearly archives date format', 'kerge' ) ) );

							else :
								_e( 'Archives', 'kerge' );
							endif;
						?>
					</h2>
				<?php
						// Start the Loop.
						while ( have_posts() ) : the_post();

							/*
							 * Include the post format-specific template for the content. If you want to
							 * use this in a child theme, then include a file called called content-___.php
							 * (where ___ is the post format) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );

						endwhile;
						// Previous/next page navigation.
						kerge_theme_paging_nav();

					else :
						// If no content, include the "No posts found" template.
						get_template_part( 'content', 'none' );

					endif;
				?>

            </div><!-- #content -->

			<?php if ( $show_blog_sidebar == 'yes'):
				get_sidebar( 'content' );
			endif; ?>
		</div><!-- #primary -->
	</div><!-- #main-content -->
</div>
<?php
get_footer();
