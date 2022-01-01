<?php 
$pageId = $post->ID;
get_template_part('portfolio_header');
$_SESSION['sility_page_id'] = $pageId;

$get_meta = get_post_custom($post->ID);

$weblusive_sidebar_pos = $get_meta["_weblusive_sidebar_pos"][0];
$layout =  isset($get_meta["_portfolio_item_layout"][0]) ? $get_meta["_portfolio_item_layout"][0] : '1'; 
get_template_part( 'library/includes/page-head' ); 

$portfolio_type = get_post_meta($post->ID, "_portfolio_type", $single = false);
$paginationEnabled = (isset($portfolio_type) && !(empty ($portfolio_type))) ? $portfolio_type[0] : 0;
$itemsize = '400x400';	
$thumbsize = 'big';



if( get_post_meta($post->ID, "_page_portfolio_num_items_page", $single = true) != '' && $paginationEnabled ) 
{ 
	$items_per_page = get_post_meta($post->ID, "_page_portfolio_num_items_page", $single = false);
} 
else 
{ // else don't paginate
	$items_per_page[0] = 777;
}
$loop = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => $items_per_page[0])); 
?>
<div class="container">
	<?php get_template_part( 'inner-header', 'content');?>
	<div class="row">
		<?php if ($weblusive_sidebar_pos == 'left'): ?>
			<div id="sidebar" class="col-md-4"><div class="sidebar sidebar-left"><?php get_sidebar(); ?></div></div>
		<?php endif?>
		<div class="<?php if ($weblusive_sidebar_pos == 'full'):?>col-md-12<?php else:?>col-md-8<?php endif?> main-content">
			<div class="portfolio-wrapper portfolio-standalone">
				<div id="portfolio-filters" class="portfolio-filters">
					<ul data-option-key="filter" class="folio-filter xtra <?php if (!$paginationEnabled):?><?php echo 'non-paginated' ?><?php endif?>">
						<?php if ($paginationEnabled):?>
							<li><a href="<?php echo esc_url(get_page_link($pageId)) ?>" class="button solid-button white-purple small"><?php _e('All', 'Sility')?></a></li>
							<?php 
								$cats = get_post_meta($post->ID, "_page_portfolio_cat", $single = true);
								$MyWalker = new PortfolioWalker2();
								$args = array( 'taxonomy' => 'portfolio_category', 'hide_empty' => '0', 'include' => $cats, 'title_li'=> '', 'walker' => $MyWalker, 'show_count' => '1');
								$categories = wp_list_categories ($args);
							?>
						<?php else: ?>
							<li><a href="#filter" class="button solid-button white-purple small" data-filter="*"><?php _e('All', 'Sility')?></a></li>
							<?php
								$cats = get_post_meta($post->ID, "_page_portfolio_cat", $single = true);
								$MyWalker = new PortfolioWalker();
								$args = array( 'taxonomy' => 'portfolio_category', 'hide_empty' => '0', 'include' => $cats, 'title_li'=> '', 'walker' => $MyWalker, 'show_count' => '1');
								$categories = wp_list_categories ($args);
							?>
						<?php endif ?>
					</ul>
				</div>
			<div class="portfolio" id="portfolio">
						<?php if( $cats == '' ): ?>
							<p><?php _e('No categories selected. To fix this, please login to your WP Admin area and set
										the categories you want to show by editing this page and setting one or more categories 
										in the multi checkbox field "Portfolio Categories".', 'Sility')?>
							</p>
						<?php else: ?>		
							<?php 
								// If the user hasn't set a number of items per page, then use JavaScript filtering
								if( $items_per_page == 777 ) : endif; 
								$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
								//  query the posts in selected terms
								$portfolio_posts_to_query = get_objects_in_term( explode( ",", $cats ), 'portfolio_category');
							 ?>
							 <?php if (!empty($portfolio_posts_to_query)):			
								$wp_query = new WP_Query( array( 'post_type' => 'portfolio', 'orderby' => 'menu_order', 'order' => 'ASC', 'post__in' => $portfolio_posts_to_query, 'paged' => $paged, 'showposts' => $items_per_page[0] ) ); 
								
								if ($wp_query->have_posts()):  ?>
								<?php while ($wp_query->have_posts()) : 							
									$wp_query->the_post();
									$custom = get_post_custom($post->ID);
										 
									// Get the portfolio item categories
									$cats = wp_get_object_terms($post->ID, 'portfolio_category');
														   
															
									if ($cats):
										$cat_slugs = ''; $cat_names = '';
										foreach( $cats as $cat ) {$cat_slugs .= $cat->slug . " "; $cat_names .= $cat->name . " ";}
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
									<div class="item  <?php echo esc_attr($size); ?> <?php echo esc_attr($cat_slugs) ?>">
										<?php if (!empty($thumbnail)): the_post_thumbnail('big', array('class' => 'img-responsive')); endif?>
											
										
											<?php if (!empty($custom['_portfolio_video'][0])): ?>
												<a href="<?php echo esc_url($link) ?>" data-rel="prettyPhoto[gallery]" class="overlay" title="<?php the_title() ?>">
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
												
											<?php elseif (isset($custom['_portfolio_no_lightbox'][0]) && $custom['_portfolio_no_lightbox'][0] != '') :?>
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
												<span class="category"><?php echo esc_attr($cat_names); ?></span>
											</div>
										</a>
									</div>	
								<?php endwhile; ?>
							<?php endif;?>
						<?php endif;?>
					<?php endif?>
			</div>
			<?php if ($paginationEnabled ):?>
				<?php if ( $wp_query->max_num_pages > 1 ): ?>
					<div class="row">
						<div class="col-md-12  pagination-wrapper">
							<?php include(sility_PLUGINS . '/wp-pagenavi.php' ); wp_pagenavi(); ?> 
							<div class="clearfix"></div>
						</div>
					</div>
				<?php endif?>
			<?php endif?>	
		</div>
		</div>
		<?php if ($weblusive_sidebar_pos == 'right'): ?>
			<div id="sidebar" class="col-md-4"><div class="sidebar sidebar-right"><?php get_sidebar(); ?></div></div>
		<?php endif?>
	</div>
</div>
<?php echo do_shortcode(getPageContent($pageId)); ?>
<?php get_template_part('portfolio_footer'); ?>