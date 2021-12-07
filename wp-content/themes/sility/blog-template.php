<?php /* Template Name: Blog */

get_header('standalone');
$catid = get_query_var('cat');
$cat = get_category($catid);
$blogLayout =  weblusive_get_option('blog_layout');
isset ($blogLayout) ? $blogLayout : $blogLayout=='regular';
$get_meta = get_post_custom($post->ID);
$weblusive_sidebar_pos = isset( $get_meta['_weblusive_sidebar_pos'][0]) ? $get_meta["_weblusive_sidebar_pos"][0] : 'full';
get_template_part( 'library/includes/page-head' ); 
if ( get_query_var('paged') ) {

    $paged = get_query_var('paged');

} elseif ( get_query_var('page') ) {

    $paged = get_query_var('page');

} else {

    $paged = 1;

}
?>
<div class="sections pagecustom-<?php echo intval($post->ID)?>"> 
	<div class="sections-wrapper clearfix">
		<section class="active">
			<div class="container">	
				<?php get_template_part( 'inner-header', 'content');?>
				<div class="row">
					<div class="blog-page" id="ajax-load-more">
					<?php if ($weblusive_sidebar_pos == 'left'):?><div id="sidebar" class="col-md-4"><div class="sidebar sidebar-left"><?php get_sidebar(); ?></div></div><?php endif?>
					<div class="<?php if ($weblusive_sidebar_pos == 'full'):?>content col-md-12 <?php else:?>col-md-8 <?php endif?>" >
							<div class="blog-posts masonry" id="blog-masonry" data-path="<?php echo get_template_directory_uri(); ?>" data-post-type="post" data-category="" data-taxonomy="" data-tag="" data-author="" data-display-posts="<?php echo get_option('posts_per_page') ?>" data-button-text="<?php _e( 'Load More Posts', 'Sility' ); ?>">
								<div class="blog-grid-sizer"></div>
								<?php if ( $wp_query->max_num_pages > 1 ): ?><?php endif?>
							</div>
					</div>
					<?php if ($weblusive_sidebar_pos == 'right'): ?><div id="sidebar" class="col-md-4 "><div class="sidebar sidebar-right"><?php get_sidebar(); ?></div></div><?php endif?>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
<?php get_footer(); ?>