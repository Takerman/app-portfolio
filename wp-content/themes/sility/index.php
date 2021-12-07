<?php /** The default template for pages. **/ ?>

<?php get_header(); 
	wp_reset_postdata();

	 $args = array(
		'sort_order' => 'ASC',
		'sort_column' => 'menu_order',
		'hierarchical' => 1,
		'post_type' => 'page',
		'post_status' => 'publish'
	);

	$pages = get_pages($args); 
	
	$pageCounter = 1;
	$onepager = 0;
	$al_options = get_option('al_general_settings');
	
	$walker = new pages_from_nav;
	$menu_items = wp_nav_menu( array('container' => false,'items_wrap' => '%3$s', 'depth' => 0, 'menu' =>'primary_nav', 'theme_location' =>'primary_nav', 'echo'  => false,'walker' => $walker));
	$menu_items = strip_tags ($menu_items);
	
	$pages = explode(',', trim($menu_items));
	$allpages = get_pages();

	foreach ( $allpages as $pag ) {
		$get_meta = get_post_custom($pag->ID);
		$pageType = isset ($get_meta['_weblusive_page_type']) ? $get_meta['_weblusive_page_type'][0] : '';
		if ($pageType == '1') $onepager++;
	}
	
	
	if (!empty($pages[0]) && $onepager > 0):	
	?>
<div class="sections">
	<div class="sections-wrapper clearfix onepage">
		<?php 	
		foreach ( $pages as $pag ) {
			
			$page = get_page($pag);
			
			$template = get_post_meta( $page->ID, '_wp_page_template', true );
			$get_meta = get_post_custom($page->ID);
			$layout = isset ($custom['_page_layout']) ? $custom['_page_layout'][0] : '1';
					
			$slug = slugify($page->post_title);
			
			$tagline = isset( $get_meta['_weblusive_tagline'][0]) ? $get_meta["_weblusive_tagline"][0] : '';
			$headline = isset( $get_meta['_weblusive_altpagetitle'][0]) ? $get_meta["_weblusive_altpagetitle"][0] : '';
			$title = empty($headline) ?  $page->post_title :  $headline;
			$titleColor=isset( $get_meta['_weblusive_page_title_color'][0]) ? $get_meta["_weblusive_page_title_color"][0] : '';
			$hideTilte=isset( $get_meta["_weblusive_page_title_hide"][0]) ? $get_meta["_weblusive_page_title_hide"][0] : '';
			$weblusive_sidebar_pos = isset( $get_meta['_weblusive_sidebar_pos'][0]) ? $get_meta["_weblusive_sidebar_pos"][0] : 'full';
			$pageType = isset ($get_meta['_weblusive_page_type']) ? $get_meta['_weblusive_page_type'][0] : '1';
			$notop = isset( $get_meta['_weblusive_page_notoppadding'][0]) ? ' nopaddingtop' : '';
			$nobottom = isset( $get_meta['_weblusive_page_nobottompadding'][0]) ? ' nopaddingbottom' : '';?>

			
			
			
			<?php
			if ($pageType == '1')
			{
				switch ($template)
				{
					case 'homepage-template.php':
						$content = $page->post_content;
						?>
						<section id="<?php echo esc_attr($slug)?>" class="sility-homepage no-padding-bottom imagepar <?php echo $nobottom.$notop; ?>  waypoint pagecustom-<?php echo $page->ID?>">
							<div class="container">
								<?php echo do_shortcode($content) ?>
							</div>		
						</section>
						<?php 
					break;	
					case 'default': 
					case 'page.php':
						$newId = $page->ID;
						$get_meta = get_post_custom($newId);
						$content = $page->post_content;
						$overridepos = isset($get_meta['_weblusive_sidebar_pos']) ? $get_meta['_weblusive_sidebar_pos'] : array (0 => 'full');
						$overridesidebar =isset($get_meta['_weblusive_sidebar_post']) ? $get_meta['_weblusive_sidebar_post'] : array (0 => '');

						$weblusive_sidebar_pos = ($overridepos[0] == 'default') ?  weblusive_get_option('sidebar_pos') : $overridepos[0];
						$sidebar = ($overridesidebar[0] == '') ?  weblusive_get_option('sidebar_post') : $overridesidebar[0];
						?>
						<section id="<?php echo esc_attr($slug)?>" class="imagepar  waypoint  <?php echo $nobottom.$notop; ?> pagecustom-<?php echo $page->ID?>">
							<?php //get_template_part( 'library/includes/page-head' );  ?>
							<div class="container">
								<?php if(!$hideTilte) : ?>
									<h2 class="onetitle <?php echo esc_attr($titleColor); ?>"><?php echo htmlspecialchars_decode($title)?></h2>
									<?php if($tagline):?>
										<p class="onesubtitle <?php echo esc_attr($titleColor); ?>"><?php echo htmlspecialchars_decode($tagline)?></p>
									<?php endif?>
								<?php endif;?>
								<div class="row">
									<?php if ($weblusive_sidebar_pos == 'left'): ?><div id="sidebar" class="col-md-4"><div class="sidebar sidebar-left"><?php dynamic_sidebar($sidebar); ?></div></div><?php endif?>
									<div class="<?php if ($weblusive_sidebar_pos == 'full'):?>col-md-12<?php else:?>col-md-8 <?php endif?> main-content">
										<?php echo do_shortcode($content) ?>
									</div>
									<?php if ($weblusive_sidebar_pos == 'right'): ?><div id="sidebar" class="col-md-4"><div class="sidebar sidebar-right"><?php dynamic_sidebar($sidebar); ?></div></div><?php endif?>
								</div>
							</div>
						</section>
						<?php 
					break; 
					case 'portfolio-template.php':
						$page_template_name = get_post_meta( $page->ID,'_wp_page_template',true); 
						$content = $page->post_content;
						$pageId = $page->ID;
						$itemsize = '263x351';	
						$itemlayout = 'portfolio-4-cols';	
						$colnumber = 4;
						$thumbsize = 'portfolio-4-cols';
					
						?>
						<section id="<?php echo esc_attr($slug)?>" class="imagepar portfolio-section <?php echo $nobottom.$notop; ?> pagecustom-<?php echo esc_attr($page->ID)?>">
							<div class="container" <?php if (isset($customBg) && !empty($customBg[0])):?>style="background-image:url(<?php echo $customBg[0]?>)"<?php endif?>>
								<?php if(!$hideTilte) : ?>
									<h2 class="onetitle <?php echo esc_attr($titleColor); ?>"><?php echo htmlspecialchars_decode($title)?></h2>
									<?php if($tagline):?>
										<p class="onesubtitle <?php echo esc_attr($titleColor); ?>"><?php echo htmlspecialchars_decode($tagline)?></p>
									<?php endif?>
								<?php endif;?>
							
							<div class="portfolio-wrapper">
								<div class="portfolio-filters" id="portfolio-filters">
										<ul data-option-key="filter" class="folio-filter xtra non-paginated">
											<li><a href="#" class="button solid-button white-purple small"><?php _e('All', 'Sility')?></a></li>
											<?php 
												$cats = get_post_meta($post->ID, "_page_portfolio_cat", $single = true);
												$MyWalker = new PortfolioWalker();
												$args = array( 'taxonomy' => 'portfolio_category', 'hide_empty' => '0', 'include' => $cats, 'title_li'=> '', 'walker' => $MyWalker, 'show_count' => '1');
												$categories = wp_list_categories ($args);
											?>
										</ul>
								</div>
								<div class="portfolio-grid portfolio" id="portfolio">									
											<?php 
											$items_per_page = 777;
											$loop = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => $items_per_page)); 
											$cats = get_post_meta($pageId, "_page_portfolio_cat", $single = true);
											if( $cats == '' ): ?>
												<p><?php _e('No categories selected. Please login to your WP Admin area and set
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
													$wp_query = new WP_Query( array( 'post_type' => 'portfolio', 'orderby' => 'menu_order', 'order' => 'ASC', 'post__in' => $portfolio_posts_to_query, 'paged' => $paged, 'showposts' => $items_per_page) ); 
													
													if ($wp_query->have_posts()):  ?>
													<?php $counter=1; while ($wp_query->have_posts()) : 							
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
												<div class="item <?php echo esc_attr($size); ?> <?php echo esc_attr($cat_slugs); ?>">
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
							</div>
							<div class="clearfix"></div>
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-12">
										<?php echo do_shortcode(getPageContent($pageId)); ?>	
									</div>
								</div>
							</div>	
							</div>
						</section>
						<?php 
					break;
					
					case 'blog-template.php':
					$newId = $page->ID;
					$get_meta = get_post_custom($newId);
						$overridepos = isset($get_meta['_weblusive_sidebar_pos']) ? $get_meta['_weblusive_sidebar_pos'] : array (0 => 'full');
						$overridesidebar =isset($get_meta['_weblusive_sidebar_post']) ? $get_meta['_weblusive_sidebar_post'] : array (0 => '');

						$weblusive_sidebar_pos = ($overridepos[0] == 'default') ?  weblusive_get_option('sidebar_pos') : $overridepos[0];
						$sidebar = ($overridesidebar[0] == '') ?  weblusive_get_option('sidebar_post') : $overridesidebar[0];
						$postlimit = get_option('posts_per_page');
						if (empty($postlimit)) $postlimit = 3;
						?>
						<section id="<?php echo esc_attr($slug)?>" class="imagepar blog-section blog-mini <?php echo $nobottom.$notop; ?> pagecustom-<?php echo $page->ID?>" <?php if (isset($customBg) && !empty($customBg[0])):?>style="background-image:url(<?php echo $customBg[0]?>)"<?php endif?>>
							
							<div class="container">
								<?php if(!$hideTilte) : ?>
									<h2 class="onetitle <?php echo esc_attr($titleColor); ?>"><?php echo htmlspecialchars_decode($title)?></h2>
									<?php if($tagline):?>
										<p class="onesubtitle <?php echo esc_attr($titleColor); ?>"><?php echo htmlspecialchars_decode($tagline)?></p>
									<?php endif?>
								<?php endif;?>
								<div class="blog-page" id="ajax-load-more">
									<div class="blog-posts masonry" id="blog-masonry" data-path="<?php echo get_template_directory_uri(); ?>" data-post-type="post" data-category="" data-taxonomy="" data-tag="" data-author="" data-display-posts="<?php echo $postlimit ?>" data-button-text="<?php _e('Load More Posts', 'Sility' ); ?>">
										<div class="blog-grid-sizer"></div>
										<?php if ( $wp_query->max_num_pages > 1 ): ?><?php endif?>
									</div>
									<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'Sility' ), 'after' => '</div>' ) ); ?>
								</div>
							</div>
						</section>
						<?php 
						
					break;
					
				}
			}
			
			$pageCounter++;
		}
	?>

	<?php else: ?>
		<?php $get_meta = get_post_custom($post->ID); 
		$postlimit = get_option('posts_per_page');
		
		if (empty($postlimit)) $postlimit =  weblusive_get_option('post_main_limit');
		$weblusive_sidebar_pos = isset( $get_meta['_weblusive_sidebar_pos'][0]) ? $get_meta["_weblusive_sidebar_pos"][0] : 'full';
		//get_template_part( 'inner-header', 'content'); 
		?>

		<section class="active pagecustom-<?php echo $post->ID?>">
			<div class="container index-page">
				<div class="row">			
					<?php if ($weblusive_sidebar_pos == 'left'): ?><div id="sidebar" class="col-md-4"><div class="sidebar sidebar-left"><?php get_sidebar(); ?></div></div><?php endif?>
					<div class="<?php if ($weblusive_sidebar_pos == 'full'):?>content col-md-12<?php else:?>col-md-8<?php endif?>">
						<div class="blog-page" id="ajax-load-more">
							<div class="blog-posts masonry" id="blog-masonry" data-path="<?php echo get_template_directory_uri(); ?>" data-post-type="post" data-category="" data-taxonomy="" data-tag="" data-author="" data-display-posts="<?php echo $postlimit ?>" data-button-text="<?php _e('Load More Posts', 'Sility' ); ?>">
								<div class="blog-grid-sizer"></div>
								<?php if ( $wp_query->max_num_pages > 1 ): ?><?php endif?>
							</div>
							<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'Sility' ), 'after' => '</div>' ) ); ?>
						</div>
					</div>
					
					<?php if ($weblusive_sidebar_pos == 'right'): ?><div id="sidebar" class="col-md-4"><div class="sidebar sidebar-right"><?php get_sidebar(); ?></div></div><?php endif?>
					<div class="clear"></div>
				</div>
			</div>
		</section>
	<?php endif;?>
	</div>
</div>
<?php get_footer();?>