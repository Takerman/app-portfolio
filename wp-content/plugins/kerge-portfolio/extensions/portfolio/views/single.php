<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 */

$fw_ext_projects_gallery_image = fw()->extensions->get( 'portfolio' )->get_config( 'image_sizes' );
$fw_ext_projects_gallery_image = $fw_ext_projects_gallery_image['gallery-image'];
$permalink = esc_url(get_permalink());
$is_ajax_query  = get_query_var( 'ajax' );
$portfolio_sidebar = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('portfolio_desc_sidebar/portfolio_sidebar_switcher') : 'on';

if ( !$is_ajax_query ) :
	get_header();
?>

<div id="main" class="site-main">
    <div id="main-content" class="single-page-content">
        <div id="primary" class="content-area">
<?php endif; ?>
					<?php
					// Start the Loop.
					while ( have_posts() ) : the_post(); ?>
					<?php
						$portfolio_type = fw_get_db_post_option($post->ID, 'portfolio_type/portfolio_type_picker', '');
					?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<div class="entry-content">
			                    <div id="portfolio-page" class="portfolio-page-content">
			                        <div class="portfolio-page-wrapper">
			                            <?php
											kerge_theme_portfolio_nav();
										?>

			                            <div class="portfolio-page-title">
			                                <?php the_title( '<h1>', '</h1>' ); ?>
			                            </div>

			                            <?php
		                                    if ( $portfolio_type == 'standard' )
		                                    {
	                                    ?>
				                            <div class="row">
				                            	<?php if ($portfolio_sidebar == "on") { 
				                            		$portfolio_sidebar_position = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('portfolio_desc_sidebar/on/portfolio_sidebar_position') : 'right';
				                            	?>
				                                <div class="col-sm-12 col-md-8 portfolio-block<?php if ($portfolio_sidebar_position == "left") { ?> order-last<?php } ?>">
				                                <?php } else { ?>
				                                <div class="col-sm-12 col-md-12 portfolio-block">
				                                <?php } ?>

				                                	<?php  $portfolio_slider_pos = fw_get_db_post_option($post->ID, 'portfolio_type/standard/pf_slider_pos', 'below');
				                                    if ( $portfolio_slider_pos == 'below' ) { ?>
			                                        	<?php the_content(); ?>
			                                        <?php } ?>

				                                    <?php
				                                        $thumbnails = fw_ext_portfolio_get_gallery_images();
				                                        $pf_gallery_grid = fw_get_db_post_option($post->ID, 'portfolio_type/standard/pf_gallery_grid/pf_gallery_grid_picker', 'off');

				                                        $captions = array();
				                                        if ( ! empty( $thumbnails ) ) :
				                                            ?>
				                                        	<?php if ( $pf_gallery_grid == "off" ) { ?>
				                                            <div class="owl-carousel portfolio-page-carousel">
				                                                <?php foreach ( $thumbnails as $thumbnail ) :
				                                                    $attachment = get_post( $thumbnail['attachment_id'] );

				                                                    $captions[ $thumbnail['attachment_id'] ] = $attachment->post_title;

				                                                    $image = $thumbnail;
				                                                    ?>
				                                                    <img src="<?php echo esc_url($image['url']) ?>" alt="<?php esc_attr_e('image', 'kerge-portfolio'); ?>"/>
				                                                <?php endforeach ?>
				                                            </div>

				                                        	<?php } else { ?>

				                                        	<?php $pf_gallery_grid_columns = fw_get_db_post_option($post->ID, 'portfolio_type/standard/pf_gallery_grid/on/pf_gallery_grid_columns', 'two-columns'); 
				                                        	if ($pf_gallery_grid_columns === 'one-column'):
															    $thumbnail_class = 'portfolio-image-one-c';
															elseif ($pf_gallery_grid_columns === 'two-columns'):
															    $thumbnail_class = 'portfolio-image-two-c';
															elseif ($pf_gallery_grid_columns === 'three-columns'):
															    $thumbnail_class = 'portfolio-image-three-c';
															endif;
				                                        	?>

				                                            <div id="portfolio-gallery-grid" class="portfolio-grid <?php echo esc_attr($pf_gallery_grid_columns) ?>">
				                                                <?php foreach ( $thumbnails as $thumbnail ) :
				                                                    $attachment = get_post( $thumbnail['attachment_id'] );

				                                                    $captions[ $thumbnail['attachment_id'] ] = $attachment->post_title;

				                                                    $image = $thumbnail;

				                                                   	$pf_gallery_img_crop = fw_get_db_post_option($post->ID, 'portfolio_type/standard/pf_gallery_grid/on/crop_img', 'off');
				                                                    ?>
				                                                    <figure>
				                                                    	<a href="<?php echo esc_url($image['url']) ?>" class="gallery-lightbox"></a>
				                                                    	<?php if ( $pf_gallery_img_crop == 'off' ) { ?>
				                                                    	
				                                                    	<img src="<?php echo esc_url($image['url']) ?>" alt="<?php esc_attr_e('image', 'kerge-portfolio'); ?>"
				                                                    	srcset="<?php echo wp_get_attachment_image_srcset( $thumbnail['attachment_id'], '<?php echo esc_attr($thumbnail_class) ?>' ) ?>"
     																	sizes="<?php echo wp_get_attachment_image_sizes( $thumbnail['attachment_id'], '<?php echo esc_attr($thumbnail_class) ?>' ) ?>"
				                                                    	/>

				                                                    	<?php } else { ?>
				                                                    		<?php if ( $pf_gallery_grid_columns == "one-column" ) { ?>
				                                                    		<img src="<?php echo esc_url(fw_resize($image['url'],850,850,true)) ?>" alt="<?php esc_attr_e('image', 'kerge-portfolio'); ?>"
				                                                    		/>
				                                                    		<?php } elseif ( $pf_gallery_grid_columns == "two-columns" ) { ?>
				                                                    		<img src="<?php echo esc_url(fw_resize($image['url'],600,600,true)) ?>" alt="<?php esc_attr_e('image', 'kerge-portfolio'); ?>"
				                                                    		/>
				                                                    		<?php } elseif ( $pf_gallery_grid_columns == "three-columns" ) { ?>
				                                                    		<img src="<?php echo esc_url(fw_resize($image['url'],400,400,true)) ?>" alt="<?php esc_attr_e('image', 'kerge-portfolio'); ?>"
				                                                    		/>
				                                                    		<?php } ?>



				                                                    	<?php } ?>
				                                                    	<div class="mask-gallery-grid"></div>
				                                                    </figure>
				                                                <?php endforeach ?>
				                                            </div>
				                                            <?php } ?>
				                                        <?php endif ?>

				                                    <?php if ( $portfolio_slider_pos == 'above' ) { ?>
			                                        	<?php the_content(); ?>
			                                        <?php } ?>
				                                    
				                                </div>

				                                <?php if ($portfolio_sidebar == "on") { ?>
				                                <div class="col-sm-12 col-md-4 portfolio-block<?php if ($portfolio_sidebar_position == "left") { ?> order-first mb-4<?php } ?>">
				                                    <?php
				                                        $portfolio_client = fw_get_db_post_option($post->ID, 'portfolio_type/standard/pf_client', '');
				                                        $portfolio_site_text = fw_get_db_post_option($post->ID, 'portfolio_type/standard/pf_site_text', '');
				                                        $portfolio_site_text_second = fw_get_db_post_option($post->ID, 'portfolio_type/standard/pf_site_text_second', '');
				                                        $portfolio_site_text_third = fw_get_db_post_option($post->ID, 'portfolio_type/standard/pf_site_text_third', '');
				                                        $portfolio_site_url = fw_get_db_post_option($post->ID, 'portfolio_type/standard/pf_site_url', '');
				                                        $portfolio_site_url_second = fw_get_db_post_option($post->ID, 'portfolio_type/standard/pf_site_url_second', '');
				                                        $portfolio_site_url_third = fw_get_db_post_option($post->ID, 'portfolio_type/standard/pf_site_url_third', '');
				                                        $portfolio_description = fw_get_db_post_option($post->ID, 'portfolio_type/standard/pf_description', '');
				                                        $post_date = fw_get_db_post_option($post->ID, 'portfolio_type/standard/pf_date', '');

				                                        $custom_titles = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('portfolio_titles/portfolio_titles_switcher') : 'on';
				                                        $description_title = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('portfolio_titles/on/description_title') : '';
				                                        $technology_title = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('portfolio_titles/on/technology_title') : '';
				                                        $share_title = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('portfolio_titles/on/share_title') : '';

				                                        $client_show = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('portfolio_desc_sidebar/on/portfolio_desc_fields/client') : '';
				                                        $site_show = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('portfolio_desc_sidebar/on/portfolio_desc_fields/site') : '';
				                                        $date_show = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('portfolio_desc_sidebar/on/portfolio_desc_fields/date') : '';
				                                        $tags_show = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('portfolio_desc_sidebar/on/portfolio_desc_fields/tags') : '';
				                                        $share_buttons_show = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('portfolio_desc_sidebar/on/portfolio_desc_fields/share') : '';
					                                ?>
				                                    <!-- Project Description -->
				                                    <div class="project-description">
					                                    <div class="block-title">
					                                        <?php if ($custom_titles == 'on') { ?>
				                                            <h3><?php echo esc_html($description_title); ?></h3>
				                                            <?php } else { ?>
				                                            <h3><?php esc_html_e( 'Description', 'kerge-portfolio' ); ?></h3>
				                                            <?php } ?>
					                                    </div>
					                                    <ul class="project-general-info">
					                                        <?php if ( ! empty( $portfolio_client ) && $client_show == "1" ) :
					                                            ?>
					                                            <li><p><i class="fa fa-user"></i> <?php echo esc_html($portfolio_client); ?></p></li>
					                                        <?php endif ?>

					                                        <?php if ( ! empty( $portfolio_site_text ) && $site_show == "1" ) :
					                                            ?>
					                                            <li><p><i class="fa fa-globe"></i> <a href="<?php echo esc_url($portfolio_site_url); ?>" target="_blank"><?php echo esc_html($portfolio_site_text); ?></a></p></li>
					                                        <?php endif ?>

					                                        <?php if ( ! empty( $portfolio_site_text_second ) && $site_show == "1" ) :
					                                            ?>
					                                            <li><p><i class="fa fa-globe"></i> <a href="<?php echo esc_url($portfolio_site_url_second); ?>" target="_blank"><?php echo esc_html($portfolio_site_text_second); ?></a></p></li>
					                                        <?php endif ?>

					                                        <?php if ( ! empty( $portfolio_site_text_third ) && $site_show == "1" ) :
					                                            ?>
					                                            <li><p><i class="fa fa-globe"></i> <a href="<?php echo esc_url($portfolio_site_url_third); ?>" target="_blank"><?php echo esc_html($portfolio_site_text_third); ?></a></p></li>
					                                        <?php endif ?>

					                                        <?php if ( ! empty( $post_date ) && $date_show == "1" ) :
					                                            ?>
					                                            <li><p><i class="fa fa-calendar"></i> <?php echo esc_html($post_date); ?></p></li>
					                                        <?php endif ?>
					                                    </ul>

					                                    <?php if ( ! empty( $portfolio_description ) ) :
				                                            ?>
				                                            <div class="text-justify"><?php echo wp_kses_post($portfolio_description); ?></div>
				                                        <?php endif ?>

					                                    <?php if( fw_get_db_post_option($post->ID, 'portfolio_type/standard/pf_tags', '') && $tags_show == "1" ):
					                                    ?>
						                                    <!-- Tags -->
						                                    <div class="tags-block">
						                                        <div class="block-title">
						                                        	<?php if ($custom_titles == 'on') { ?>
						                                            <h3><?php echo esc_html($technology_title); ?></h3>
						                                            <?php } else { ?>
						                                            <h3><?php esc_html_e( 'Technology', 'kerge-portfolio' ); ?></h3>
						                                            <?php } ?>
						                                        </div>
						                                        <ul class="tags">
																	<?php foreach (fw_get_db_post_option($post->ID, 'portfolio_type/standard/pf_tags', '') as $kerge_project_tags): ?>

																		   <li><a><?php echo esc_html($kerge_project_tags); ?></a></li>

																	<?php endforeach; ?>
																</ul>
															</div>
														<?php endif; ?>
														<!-- /Tags -->

														<?php if ( function_exists( 'kerge_theme_share_buttons' ) && $share_buttons_show == "1" ) : ?>
															<!-- Share Buttons -->
															<div class="share-buttons">
																<div class="block-title">
																	<?php if ($custom_titles == 'on') { ?>
						                                            <h3><?php echo esc_html($share_title); ?></h3>
						                                            <?php } else { ?>
						                                            <h3><?php esc_html_e( 'Share', 'kerge-portfolio' ); ?></h3>
						                                            <?php } ?>
																</div>
																<div class="btn-group">
																	<?php kerge_theme_share_buttons($permalink); ?>
																</div>
															</div>
															<!-- /Share Buttons -->
														<?php endif; ?>
													</div>
													<!-- /Project Description -->
												</div>
												<?php } ?>
											</div>
										<?php
											}
											elseif ( $portfolio_type == 'lbimage' )
											{
												if ( has_post_thumbnail() )
													{
														the_post_thumbnail( 'full', array( 'alt' => get_the_title(), 'title' => "" ) );
													}
											}
											elseif ( $portfolio_type == 'lbvideo' )
											{
												$portfolio_video_url = fw_get_db_post_option($post->ID, 'portfolio_type/lbvideo/videourl', '');
											?>
												<div class="embed-video embed-responsive embed-responsive-16by9">
													<iframe class="embed-responsive-item" src="<?php echo esc_url($portfolio_video_url); ?>?output=embed"></iframe>
												</div>
												<?php the_content(); ?>
											<?php
											}
											elseif ( $portfolio_type == 'lbaudio' )
											{
												$portfolio_audio_url = fw_get_db_post_option($post->ID, 'portfolio_type/lbaudio/audiourl', '');
											?>

												<div class="col-sm-12 col-md-12 portfolio-block">
													<iframe src="<?php echo esc_url($portfolio_audio_url); ?>" frameborder="no" scrolling="no" width="100%" height="480"></iframe>
												</div>
												<?php the_content(); ?>

	                                    	<?php
	                                    	}
	                                    	elseif ( $portfolio_type == 'direct' )
					                        {
				                        		the_content();
	                                    	}
	                                    ?>

			                        </div>
			                    </div>
			                </div>
			            </article>
					<?php endwhile; ?>
<?php
if ( !$is_ajax_query ) :
?>
		</div>
	</div>
</div>
<?php get_footer(); ?>

<?php
endif;
?>