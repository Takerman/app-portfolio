<?php
global $get_meta, $post;
if (empty($get_meta)) $get_meta = get_post_custom($post->ID);
if(isset( $get_meta['_weblusive_post_head'][0]) && $get_meta['_weblusive_post_head'][0] != 'none' ):
	
	$orig_post = $post;
	
	if(isset( $get_meta['_weblusive_post_head'][0]) && $get_meta['_weblusive_post_head'][0] == 'thumb' || (isset( $get_meta['_weblusive_post_head'][0]) && empty( $get_meta['_weblusive_post_head'][0] ) && weblusive_get_option( 'post_featured' ) ) ){
		$image_id = get_post_thumbnail_id($post->ID);  
		$image_url = wp_get_attachment_image_src($image_id,'full');  
		$image_url = $image_url[0];
		
		$postinfo = get_post(get_post_thumbnail_id());
		$thumb_caption = $postinfo->post_excerpt;
		$thumb_desc = $postinfo->post_content;
		?>
		<section class="container-fluid  phead feat2" data-animated="0">
			<div class="row">
				<div class="col-md-8">
					<div class="image-overlay animation fadeInLeft">
						<?php the_post_thumbnail('full', array('class'=>'img-thumbnail') ); ?> 
						<div class="overlay-fade">
							<a data-rel="prettyPhoto" href="<?php echo $image_url ?>"><i class="icon-overlay fa fa-search-plus fa-2x"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<h3 class="title-color heading-single"><span><?php echo $thumb_caption ?></span></h3>
					<p><?php echo $thumb_desc ?></p>
				</div>
			</div>
		</section>
		<?php 
	}
	elseif(isset( $get_meta['_weblusive_post_head'][0]) && $get_meta['_weblusive_post_head'][0] == 'full' && has_post_thumbnail($post->ID)){
		?>
		<section class="container-fluid phead">
			<div class="row">
				<div class="col-md-12">
					<div class="pHead-image-full animation fadeInUp">
						<?php the_post_thumbnail('full', array('class'=>'psingle-img-thumbnail') ); ?> 
					</div>
				</div>
			</div>
		</section>
		
	<?php 
	}
	elseif(isset( $get_meta['_weblusive_post_head'][0]) && $get_meta['_weblusive_post_head'][0] == 'vimeovideo'){
		$video = isset ($get_meta["_weblusive_vimeo"]) ? $get_meta["_weblusive_vimeo"][0] : '';
		?>
		<section class="container-fluid slider phead" data-animated="0">
			<div class="row">
				<div class="col-md-12">
					<div class="portfolio-media">
						<?php if($video):?>
							<div class="flex-video vimeo">
								<iframe src="http://player.vimeo.com/video/<?php echo $video?>" width="500" height="350" ></iframe>
							</div>
						<?php else: ?>
							<p class="label label-warning"><?php _e('Vimeo video chosen from post head options but no video ID provided. Please make sure to provide a video ID to display it.', 'Sility')?></p>
						<?php endif?>
					</div>
				</div>
			</div>
		</section>
	<?php 
	}
	elseif(isset( $get_meta['_weblusive_post_head'][0]) && $get_meta['_weblusive_post_head'][0] == 'youtubevideo'){
		$video = $get_meta["_weblusive_youtube"][0];
		?>
		<section class="container-fluid slider phead" data-animated="0">
			<div class="row">
				<div class="col-md-12">
					<div class="portfolio-media">
						<div class="flex-video youtube">
							<?php if($video):?>
								<iframe src="http://www.youtube.com/embed/<?php echo $video?>" width="500" height="350" ></iframe>
							<?php else: ?>
								<p><?php _e('Youtube video was chosen from post head options but no video ID provided. Please make sure to provide a video ID  to display it.', 'Sility')?></p>
							<?php endif?>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php 
	}
	
	
	elseif(isset( $get_meta['_weblusive_post_head'][0]) && $get_meta['_weblusive_post_head'][0] == 'slider' && !empty( $get_meta['_weblusive_post_slider'][0] ) ){
		
		
		$custom_slider_args = array( 'post_type' => 'themeplaza_slider', 'p' => $get_meta['_weblusive_post_slider'][0] );
		$custom_slider = new WP_Query( $custom_slider_args );
		
		while ( $custom_slider->have_posts() ) : $custom_slider->the_post();
			$custom = get_post_custom($post->ID);
			$slidertype = isset ($custom["_weblusive_slider_type"]) ? $custom["_weblusive_slider_type"][0] : '1';
			$sliderLoop = isset ($custom["_weblusive_slider_loop"]) ? stripslashes($custom["_weblusive_slider_loop"][0]) : 'true';
			$sliderAutoplay = isset ($custom["_weblusive_slider_autoplay"]) ? stripslashes($custom["_weblusive_slider_autoplay"][0]) : 'true';
			$sliderInterval = isset ($custom["_weblusive_slider_interval"]) ? stripslashes($custom["_weblusive_slider_interval"][0]) : '5000';
			$slider = isset ($custom["custom_slider"]) ? unserialize( $custom["custom_slider"][0]) : '';
			$number = count($slider);
				
		if( $slider ):?>
				<section id="slider_blocks" class="phead">
					<div class="homeSlider flexslider row m0">
						<ul class="slides nav">
							<?php $counter=0; foreach( $slider as $slide ): 
								
								$image =  wp_get_attachment_image_src( $slide['id'], 'full'); 
								$width = isset($image[1]) ? $image[1] : '';
								$height = isset($image[2]) ? $image[2] : '';
								
								$finalimage = empty($image) ? '' : $image[0];
								$caption = empty($slide['content']) ? '' : stripslashes($slide['content']) ;
								$videoUrl= empty($slide['video']) ? '' : ($slide['video']) ;
								?>
								<li>
									<?php if( !empty( $slide['link'] ) ):?><a href="<?php echo esc_url($slide['link'])?>"><?php endif?>
										<img src="<?php echo esc_url($finalimage) ?>" alt="" width="<?php echo $width?>" height="<?php echo $height?>" />
									
									<div class="text_lines row m0">
										<div class="container">
											<?php echo do_shortcode($caption); ?>
										</div>
									</div>
									<?php if( !empty( $slide['link'] ) ):?></a><?php endif?>
								</li>
								
							<?php $counter++; endforeach; ?>
						</ul>
					</div>
					<script type="text/javascript">
						jQuery(document).ready(function(){ 
							jQuery('.homeSlider').flexslider({
								animation: "fade",
								slideshowSpeed: <?php echo esc_attr($sliderInterval); ?>,
								animationLoop: <?php echo $sliderLoop; ?>,
								slideshow: <?php echo esc_attr($sliderAutoplay) ?>,
								controlNav: false,
								directionNav:true
								
							})
						});
					</script>
			</section>
		<?php else: ?>
			<section id="slider_blocks" class="empty_slider">
				<div class="col-md-12 text-center">
					<p class="label label-danger">
						<i class="fa fa-warning"></i>
						<?php _e('No slider items were found in the selected slider. Please make sure to create some via "Slider" section in your admin panel.', 'Sility');?>
					</p>
				</div>
			</section>
		<?php endif;?>
		
	<?php endwhile; ?>
<?php }

	$post = $orig_post;
	wp_reset_query();
	
 endif; ?>
