<?php /** The template for displaying FAQ search results. **/
get_header('standalone');
$sidebar = weblusive_get_option('sidebar_archive');
$weblusive_sidebar_pos = weblusive_get_option('sidebar_pos');
$search_refer = isset($_GET["post_type"]) ? $_GET["post_type"] : 'post';

$hidetitles = weblusive_get_option('hide_titles');
$hidebreadcrumbs = weblusive_get_option('hide_breadcrumbs');
?>

<div class="sections"> 
	<div class="sections-wrapper clearfix">
		<section class="active">
			<div class="container">
				<div class="row">
					<?php if ($weblusive_sidebar_pos == 'left' && !empty($sidebar)):?><div id="sidebar" class="col-md-4"><div class="sidebar sidebar-left"><?php get_sidebar(); ?></div></div><?php endif?>
					<div class="<?php if ($weblusive_sidebar_pos == 'full' || empty($sidebar)):?>col-md-12<?php else:?>col-md-8<?php endif?>">
						<?php   $args = array('post_type'=> $search_refer, 's' => $s, 'paged' => $paged); query_posts($args);
						if ( have_posts() ) : ?>
							<h2>
								<?php printf( __( 'Search Results for: %s', 'Sility' ), '<mark>' . get_search_query() . '</mark>' ); ?>
								<?php wp_reset_query(); ?>
							</h2>
							<div class="blog-posts masonry" id="blog-masonry">
								<div class="blog-grid-sizer"></div>
								<?php get_template_part( 'loop', 'search' );?>
							</div>
						<?php else : ?>
							<div id="post-0" class="post no-results not-found">
								<div class="post-content">
									<h4><?php _e( 'Nothing Found', 'Sility' ); ?></h4>
									<div class="entry-content">
										<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'Sility' ); ?></p>
									</div><!-- .entry-content -->
								</div>
							</div><!-- #post-0 -->
						<?php endif; ?>
					</div>	
					<?php if ($weblusive_sidebar_pos == 'right'  && !empty($sidebar)): ?><div id="sidebar" class="col-md-4"><div class="sidebar sidebar-right"><?php get_sidebar(); ?></div></div><?php endif?>
				</div>
			</div>
		</section>
	</div>
</div>

<?php get_footer(); ?>