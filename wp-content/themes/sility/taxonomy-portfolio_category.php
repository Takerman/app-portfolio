<?php get_header('standalone');
get_template_part('portfolio_header'); 
	//global $paged;
 	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	if ( get_query_var('paged') ) {
		$paged = get_query_var('paged');
	} elseif ( get_query_var('page') ) {
		$paged = get_query_var('page');
	} else {
		$paged = 1;
	}
	
	$sidebarPos = weblusive_get_option('sidebar_pos');
	$sidebar = weblusive_get_option('sidebar_portfolio_taxonomy');
	if(empty($sidebar)) $sidebarPos = 'full';
	
	$page_template_name = 'portfolio-template.php'; 
	//$pageId = get_page_ID_by_page_template($page_template_name);
	$columns = weblusive_get_option('portfolio_tax_columns') ? weblusive_get_option('portfolio_tax_columns') : '3'; 
	$layout = weblusive_get_option('portfolio_tax_layout') ? weblusive_get_option('portfolio_tax_layout') : '1'; 
	
	$itemsize = '400x400';	
	$thumbsize = 'big';
?>
<?php //echo do_shortcode($term->description); ?> 
<?php //echo category_description(); ?>
<div class="container">
	<?php get_template_part( 'inner-header', 'content');?>
	<div class="row">
	<?php if (!empty($sidebar) && $sidebarPos == 'left'): ?>
		<div id="sidebar" class="col-md-4"><div class="sidebar sidebar-left"><?php get_sidebar(); ?></div></div>
	<?php endif?>
	<div class="<?php if ($sidebarPos == 'full' || empty($sidebar)):?>col-md-12<?php else:?>col-md-8<?php endif?> main-content">
		<div class="portfolio-wrapper portfolio-standalone">
			<div class="portfolio-filters" id="portfolio-filters">
			<ul id="filter"  class="folio-filter xtra">
				<li><a href="<?php echo '#'; //get_page_link($pageId) ?>" class="button solid-button white-purple small"><?php _e('All', 'Sility')?></a></li> 
				<?php 
					$cats = get_post_meta($post->ID, "_page_portfolio_cat", $single = true);
					$MyWalker = new PortfolioWalker2();
					$args = array( 'taxonomy' => 'portfolio_category', 'hide_empty' => '0', 'include' => $cats, 'title_li'=> '', 'walker' => $MyWalker, 'show_count' => '1');
					$categories = wp_list_categories ($args);
				?>
			</ul>
			</div>
		<div class="portfolio" id="portfolio">
				<?php
				$counter=1;
				if ($wp_query->have_posts()):
					while ($wp_query->have_posts()) : 							
						$wp_query->the_post();
						$custom = get_post_custom($post->ID);
						// Get the portfolio item categories
						$cats = wp_get_object_terms($post->ID, 'portfolio_category');
						if ($cats):
							$cat_slugs = '';
							foreach( $cats as $cat ) {$cat_slugs .= $cat->slug . " ";}
						endif;

						?>
						<?php 
						$link = ''; 
						if (!empty($custom['_portfolio_video'][0])){
							$link = $custom['_portfolio_video'][0];
						}
						elseif (isset($custom['_portfolio_link'][0]) && $custom['_portfolio_link'][0] != '') {
							$link = $custom['_portfolio_link'][0];
						}
						elseif (isset($custom['_portfolio_no_lightbox'][0]) && $custom['_portfolio_no_lightbox'][0] != '') { 
							$link = get_permalink(get_the_ID());
						}
						else{
							$full_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false);
							$link = $full_image[0];				
						}
					
						$attachments = ''; 
						$thumbnail = get_the_post_thumbnail($post->ID, $thumbsize); 
						$size = isset($custom["_portfolio_item_width"][0]) ? $custom["_portfolio_item_width"][0] : '';
										
						?>
						<div class="item  <?php echo esc_attr($size); ?> <?php echo $cat_slugs; ?>">
							<?php if (!empty($thumbnail)): the_post_thumbnail('big', array('class' => 'img-responsive')); endif?>
							<?php if (!empty($custom['_portfolio_video'][0])): ?>
								<a href="<?php echo esc_url($link) ?>" data-rel="prettyPhoto" class="overlay" title="<?php the_title() ?>">
									<div class="background"></div>
									<div class="portfolio-inner">
										<span class="fa fa-video-camera"></span>
									</div>
							<?php elseif (isset($custom['_portfolio_link'][0]) && $custom['_portfolio_link'][0] != '') : ?>
								<a href="<?php echo esc_url($link) ?>" class="overlay" title="<?php the_title() ?>">
									<div class="background"></div>
									<div class="portfolio-inner">
										<span class="fa fa-link"></span>
									</div>
							<?php elseif (isset($custom['_portfolio_no_lightbox'][0]) && $custom['_portfolio_no_lightbox'][0] != '') : ?>
								<a href="<?php echo esc_url($link); ?>" class="overlay" title="<?php the_title() ?>">
									<div class="background"></div>
									<div class="portfolio-inner">
										<span class="fa fa-file-text-o"></span>
									</div>
							<?php else : ?>
								<a data-rel="prettyPhoto[gallery]" href="<?php echo esc_url($link); ?>" class="overlay" title="<?php the_title() ?>">
									<div class="background"></div>
									<div class="portfolio-inner">
										<span class="fa fa-camera"></span>
									</div>
							<?php endif; ?>   
								<div class="meta">
									<span class="title"><?php the_title() ?></span>
									<span class="category"><?php echo esc_attr($cat_slugs); ?></span>
								</div>
								</a>
						</div>	
					<?php $counter++; endwhile; ?>				
				<?php endif?>
			</div>
			<?php if ( $wp_query->max_num_pages > 1 ): ?>
				<div class="row">
					<div class="col-md-12">
						<?php include(sility_PLUGINS . '/wp-pagenavi.php' ); wp_pagenavi(); ?> 
					</div>
				</div>
			<?php endif?>
	</div>
	</div>
	<?php if (!empty($sidebar) && $sidebarPos == 'right'): ?>
		<div id="sidebar" class="col-md-4"><div class="sidebar sidebar-right"><?php get_sidebar(); ?></div></div>
	<?php endif?>
</div>
</div>
<?php get_template_part('portfolio_footer'); ?>
<?php get_footer() ?>