<?php get_header('standalone');

$sidebar = weblusive_get_option('sidebar_archive');
$sidebarPos =  weblusive_get_option('sidebar_pos');
//$pagelayout = weblusive_get_option('blog_layout');

$get_meta = get_post_custom($post->ID);
$hidetitles = weblusive_get_option('hide_titles');
//$hidebreadcrumbs = weblusive_get_option('hide_breadcrumbs');
$title = get_the_title($post->ID);
$tagline = isset( $get_meta['_weblusive_tagline'][0]) ? $get_meta["_weblusive_tagline"][0] : '';
$alternativetitle = isset( $get_meta['_weblusive_altpagetitle'][0]) ? $get_meta["_weblusive_altpagetitle"][0] : '';
$hideheading = isset( $get_meta['_weblusive_hide_innerheading'][0]) ? $get_meta["_weblusive_hide_innerheading"][0] : '';
?>

<div class="sections"> 
	<div class="sections-wrapper clearfix">
		<section class="active">
			<div class="container" >
				<?php if (!$hidetitles):?>
					<?php if (!$hidetitles): ?>	
						<h2 class="page-title">
							<?php if (is_day()) : ?>
								<?php printf(__('Daily Archives: %s', 'Sility'), get_the_date()); ?>
							<?php elseif (is_month()) : ?>
								<?php printf(__('Monthly Archives: %s', 'Sility'), get_the_date('F Y')); ?>
							<?php elseif (is_year()) : ?>
								<?php printf(__('Yearly Archives: %s', 'Sility'), get_the_date('Y')); ?>
							<?php elseif (is_category()) : ?>
								<?php single_cat_title(); ?>
							<?php else : ?>
								<?php _e('Blog Archives', 'Sility'); ?>
							<?php endif; ?>
						</h2>
					<?php endif; ?>
				<?php endif;?>
				<div class="row">
					<?php if (!empty($sidebar) && $sidebarPos==='left'):?><div id="sidebar" class="col-md-4"><div class="sidebar sidebar-left"><?php get_sidebar(); ?></div></div><?php endif?>
					<div class="<?php if ($sidebarPos == 'full' || empty($sidebar)):?>col-md-12<?php else:?>col-md-8<?php endif?>">
						<div class="blog-posts masonry" id="blog-masonry">
							<div class="blog-grid-sizer"></div>
							<?php
								if ( have_posts() ) the_post();
								rewind_posts(); 
								get_template_part( 'loop', 'archive' );
							?>
						</div>
					</div>	
					<?php if (!empty($sidebar) && $sidebarPos==='right') : ?><div id="sidebar" class="col-md-4"><div class="sidebar sidebar-right"><?php get_sidebar(); ?></div></div><?php endif?>
				</div>
			</div>
		</section>
	</div>
</div>
<?php get_footer(); ?>