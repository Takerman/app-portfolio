<?php /** The Template for displaying all single posts. **/

get_header('standalone'); 
$get_meta = get_post_custom($post->ID);

$overridepos = isset($get_meta['_weblusive_sidebar_pos']) ? $get_meta['_weblusive_sidebar_pos'] : array (0 => 'full');
$overridesidebar =isset($get_meta['_weblusive_sidebar_post']) ? $get_meta['_weblusive_sidebar_post'] : array (0 => '');

$weblusive_sidebar_pos = ($overridepos[0] == 'default') ?  weblusive_get_option('sidebar_pos') : $overridepos[0];
$sidebar = ($overridesidebar[0] == '') ?  weblusive_get_option('sidebar_post') : $overridesidebar[0];

$format =  get_post_format( $post->ID );
if (empty($format)){ $format = 'standard';}
$nobio = weblusive_get_option('blog_disable_authorbio');
$noshare = weblusive_get_option('blog_disable_share');
$notags = weblusive_get_option('blog_disable_tags');
$nocomments = weblusive_get_option('blog_disable_comments');
$hidedate = weblusive_get_option('blog_show_date'); 

//get_template_part( 'library/includes/page-head'); 
get_template_part( 'library/includes/page-head' ); 
?>

<div class="sections pagecustom-<?php echo intval($post->ID)?>"> 
	<div class="sections-wrapper clearfix">
		<section class="active"> 
			<div class="container">
				<div class="row">
					<?php if ($weblusive_sidebar_pos == 'left' && !empty($sidebar)): ?><div id="sidebar" class="col-md-4"><div class="sidebar sidebar-left"><?php get_sidebar(); ?></div></div><?php endif?>
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div class="<?php if (empty($sidebar) || $weblusive_sidebar_pos == 'full'):?>col-md-12<?php else:?>col-md-8<?php endif?>">
						<div class="single-blog-post post-format-<?php echo $format?>">
							<?php if ($format == 'link' || $format == 'audio' || $format == 'quote'){
								$header_class='col-md-4';
								$body_class='col-md-8';
							}else{
								$header_class='';
								$body_class='';
							}
							?>
							<header class="blog-header clearfix <?php echo $header_class; ?>">
								<div class="content">
									<span class="date"><?php echo get_the_time('M d, Y', $post->ID); ?></span>
									<h4><?php the_title()?></h4>
									<span class="meta"><?php $meta = sility_meta($post); echo $meta ?></span>
									<div class="footer">
										<p class="button-row blog-button-row">
											<?php				
											$prev_post = get_previous_post();
											if (!empty( $prev_post )): ?>
												<a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="button solid-button dark"><?php _e('Prev ', 'Sility') ?></a>
											<?php endif; ?>
											<?php $next_post = get_next_post();
											if (!empty( $next_post )): ?>
												<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="button solid-button purple"><?php _e('Next ', 'Sility') ?></a>
											<?php endif; ?>
										</p>
									</div>
								</div>
								
							</header>
							<div class="blog-post <?php echo $body_class; ?>">
								<div class="blog-post-content">
									<?php if ($format == 'standard' || $format == 'video' || $format == 'image' || $format == 'gallery'):
									if($format == 'standard' || $format == 'image'):
										$thumbnail = get_the_post_thumbnail($post->ID, 'blog-single', array("class"=>"img-responsive"));
										if($thumbnail):?><div class="image"><?php echo $thumbnail ?></div><?php endif;
									elseif ($format == 'video'):?>
										<div class="blog-video-wrapper">  
											<?php global $wp_embed;
											$post_embed = '';
											$video = isset($get_meta["_blog_video"]) ? $get_meta["_blog_video"][0] : ''; 
											$videoself = isset($get_meta["_blog_video_selfhosted"]) ? $get_meta["_blog_video_selfhosted"][0] : ''; 
											if ($video): ?>
												<div class="full-video">
													<?php
														if ($video):
															$post_embed = $wp_embed->run_shortcode('[embed width="790" height="392"]'.$video.'[/embed]'); 
														else:
															//$post_embed = do_shortcode($videoself);
														endif;
														echo $post_embed; 
													?>
												</div>	
											<?php else:?>

											<?php endif?>
										</div>
									<?php elseif ($format == 'gallery'):?>
										<div class="flexpost">
											<?php
											$full_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false); 
											$argsThumb = array(
												'order'          => 'ASC',
												'posts_per_page'  => 99,
												'post_type'      => 'attachment',
												'post_parent'    => $post->ID,
												'post_mime_type' => 'image',
												'post_status'    => null,
												//'exclude' => get_post_thumbnail_id()
											);
											?>
											<ul class="slides">
												<?php 
													$attachments = get_posts($argsThumb);
													if ($attachments) {
														foreach ($attachments as $attachment) {
															$image = wp_get_attachment_url($attachment->ID, 'full', false, false);
															$alt = $attachment->post_excerpt;
															echo '<li><img src="'.$image.'" alt="'.$alt.'" class="img-responsive"></li>';
														}
													}
													?>
											</ul>
										</div>
									<?php endif?>
								<?php endif?>
									<?php the_content()?>
								</div>
								<?php if (!$nocomments):?>
									<div class="blog-post-comments">
										<?php if( 'open' == $post->comment_status):?> 
											<?php comments_template(); ?>
										<?php endif?>
										<?php $test = false; if ($test) {comment_form();} ?>
									</div>
								<?php endif?>
							</div>
							<div class="blog-details">
								<!-- author box -->
								<?php if (!$nobio):?>
									<?php 
										$photo = get_avatar( get_the_author_meta('email') , 80 );
										$bio = get_the_author_meta('description');
										$website = get_the_author_meta('user_url');
										$name= get_the_author_meta('first_name');
										$lastName=get_the_author_meta('last_name');

									?>
									<div class="section">
										<h5><?php _e('Author Details', 'Sility') ?></h5>
										<div class="author">
											<div class="image">
												<?php echo $photo; ?>
											</div>
											<span class="title"><?php echo $name.' '.$lastName; ?></span>
											<p><?php echo $bio?></p>
										</div>
									</div>               
								<?php endif?>
								<?php if (!$noshare):?>
								<div class="section">
									<h5><?php _e('Share Post ', 'Sility') ?></h5>
									<?php if(function_exists('juiz_sps')):?>
									<?php echo do_shortcode("[juiz_social buttons='facebook, twitter, google , linkedin']");?>
									<?php endif; ?>
								</div>
								<?php endif?>
								<!-- author box -->
								<?php if (!$notags): $posttags = get_the_tags();?>
									<?php if($posttags):?>
										<div class="section">
											<h5><?php _e('Tags ', 'Sility') ?></h5>
											<div class="tags">
												<?php foreach($posttags as $tag):?>
													<a href="<?php echo  get_tag_link($tag->term_id)?>"><?php echo $tag->name?> </a><span class="tag-divider">|</span>
												<?php endforeach?>
											</div>
										</div>
									<?php endif?>
								<?php endif?>
							</div>
						</div>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'Sility' ), 'after' => '</div>' ) ); ?>
					</div>
					<?php endwhile; ?>	
					<?php if ($weblusive_sidebar_pos == 'right'  && !empty($sidebar)): ?><div id="sidebar" class="col-md-4"><div class="sidebar sidebar-right"><?php get_sidebar(); ?></div></div><?php endif?>
				</div>
			</div>
		</section>
	</div>
</div>
<?php get_footer(); ?>