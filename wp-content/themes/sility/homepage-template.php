<?php /* Template Name: Homepage */ 
get_header();?>

<?php
	$get_meta = get_post_custom($post->ID);
	$weblusive_sidebar_pos = isset( $get_meta['_weblusive_sidebar_pos'][0]) ? $get_meta["_weblusive_sidebar_pos"][0] : 'full';
	get_template_part( 'inner-header', 'content'); 
	 
?>

<div class="sections pagecustom-<?php echo $post->ID?>"> 
	<div class="sections-wrapper clearfix">
		<section class="active">
			<div class="container">
				<div class="row">
					<?php if ($weblusive_sidebar_pos == 'left'): ?><div id="sidebar" class="col-md-4 sidebar sidebar-left"><?php get_sidebar(); ?></div><?php endif?>
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div class="<?php if ($weblusive_sidebar_pos == 'full'):?>col-md-12<?php else:?>col-md-8<?php endif?> main-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'Sility' ), 'after' => '</div>' ) ); ?>
					</div>
					<?php endwhile; ?>	
					<?php if ($weblusive_sidebar_pos == 'right'): ?><div id="sidebar" class="col-md-4 sidebar sidebar-left"><?php get_sidebar(); ?></div><?php endif?>
				</div>
			</div>
		</section>
	</div>
</div>
<?php get_footer();?>