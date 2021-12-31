<?php
/**
 * @package themeplaza_slider
 * @subpackage templates
 * @version 1.0.0
 * @since 1.0.0
 * @author Grig <grigpage@gmail.com>
 * @copyright Copyright (c) 2015, Themeplaza
 */
/**
 * [themeplaza_slider sid=""]
 * @param int $sid          	 The ID of slider
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

extract(shortcode_atts(array(
	"sid" => "",
), $atts));

if ( empty( $sid ) ) {
	?>
	<p class="themeplaza-error">Please Set Slider ID</p>
	<?php 
}
		
$custom_slider_args = array( 'post_type' => 'themeplaza_slider', 'p' => $sid );
$custom_slider = new WP_Query( $custom_slider_args );
		
while ( $custom_slider->have_posts() ) : $custom_slider->the_post();
	$custom = get_post_custom($sid);

	$slider = isset ($custom["custom_slider"]) ? unserialize( $custom["custom_slider"][0]) : '';
	$sliderLoop = isset ($custom["_weblusive_slider_loop"]) ? stripslashes($custom["_weblusive_slider_loop"][0]) : 'true';
	$sliderAutoplay = isset ($custom["_weblusive_slider_autoplay"]) ? stripslashes($custom["_weblusive_slider_autoplay"][0]) : 'true';
	$sliderInterval = isset ($custom["_weblusive_slider_interval"]) ? stripslashes($custom["_weblusive_slider_interval"][0]) : '5000';
	$sliderHeight = isset ($custom["_weblusive_slider_custom_height"]) ? stripslashes($custom["_weblusive_slider_custom_height"][0]) : '';

	
	if( $slider ):?>
	<div class="row">
		<div class="col-md-12">
			<div id="main-slide" class="flexslider headcarousel slide" data-ride="carousel">
				<ul class="slides slider" <?php echo isset($sliderHeight) ? ' style="height:'. $sliderHeight .'px"' : '';?> >
				<?php 
					foreach( $slider as $slide ):
						$image = wp_get_attachment_image_src( $slide['id'], 'full'); 
						$finalimage = empty($image) ? '' : $image[0];
						$caption = empty($slide['caption']) ? '' : $slide['caption'] ;
						$content = empty($slide['content']) ? '' : $slide['content'] ;
						$link = empty($slide['link']) ? '' : $slide['link'] ;
						$link_text = empty($slide['link_text']) ? '' : $slide['link_text'] ;
						?>
						<li>	
							<div class="flex-slider-image">
								<img src="<?php echo $finalimage ?>" class="img-responsive" alt="<?php echo $slide['id'] ?>"/>
							</div>	
							<div class="slide-text">
								<h1 class="col-md-12 text-center flex-slider-caption slider-caption">
									<?php if($caption):?>
										<?php echo $caption ?>
									<?php endif; ?>
								</h1>
								<h2 class="col-md-12 text-center flex-slider-content slider-content">
									<?php if($content):?>
										<?php echo $content ?>
									<?php endif; ?>
								</h2>
								<?php if( $link ):?>
									<a class="flex-slider-read-more button-1" href="<?php echo $link; ?>"><?php if( $link_text ) : echo $link_text; else: ?>Read More<?php endif?></a>
								<?php endif?>
							</div>	
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
			
	<script type="text/javascript">
		jQuery(document).ready(function($) {
		   	var slider; // Global slider value to force playing and pausing by direct access of the slider control
			var canSlide = true; // Global switch to monitor video state
	  		// Call fitVid before FlexSlider initializes, so the proper initial height can be retrieved.
	  		slider = $(".flexslider").fitVids()
	    		.flexslider({
	      			animation: 'fade',
					contorlNav:true,
					directionNav:true,
					prevText:'',
					nextText:'',	
					direction: 'horizontal',	 
			    	//smoothHeight: true,
			    	pauseOnHover: true,
					slideshowSpeed: <?php echo $sliderInterval; ?>,
					animationLoop: <?php echo $sliderLoop; ?>,
					slideshow: <?php echo $sliderAutoplay ?>
	  			});
	  	});	
	</script>
</div>
	<?php else:?>
		<div class="col-md-12">
			<p class="warning">
				<i class="icon-warning-sign"></i>
				<?php _e('No slider items were found in the selected slider. Please make sure to create some via "Slider" section in your admin panel.', 'Sility');?>
			</p>
		</div>
	<?php endif;
endwhile; 

wp_reset_query();