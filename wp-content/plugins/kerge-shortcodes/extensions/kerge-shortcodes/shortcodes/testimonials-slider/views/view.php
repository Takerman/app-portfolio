<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id = uniqid( 'testimonials-' );

?>

<?php if (!empty($atts['title'])): ?>
<div class="block-title">
	<h3 class="testimonials-slider-title"><?php echo esc_html($atts['title']); ?></h3>
</div>
<?php endif; ?>

<div id="testimonials_<?php echo esc_attr($atts['id']); ?>" class="testimonials owl-carousel 
	testimonials-loop-<?php echo esc_attr($atts['loop']) ?> 
	autoplay-<?php echo esc_attr($atts['autoplay']['autoplay_switcher']) ?>
	<?php if (($atts['autoplay']['autoplay_switcher']) == 'on') {
		if (($atts['autoplay']['on']['autoplay_tablet']) == 'on') { ?>
			autoplay-mobile
		<?php }
	} ?>" 
	data-mobile-items="<?php echo esc_attr($atts['items_mobile']) ?>" 
	data-tablet-items="<?php echo esc_attr($atts['items_tablet']) ?>" 
	data-items="<?php echo esc_attr($atts['items']) ?> "
	data-by-page="<?php echo esc_attr($atts['by_page']) ?>"
	<?php if (($atts['autoplay']['autoplay_switcher']) == 'on') { ?>
		data-autotime="<?php echo esc_attr($atts['autoplay']['on']['autoplay_timeout']) ?>"
		data-speed="<?php echo esc_attr($atts['autoplay']['on']['smart_speed']) ?>"
	<?php } ?>>

	<?php foreach ($atts['testimonials_slider'] as $testimonial): ?>
		<!-- Testimonial <?php echo esc_attr($id); ?> -->
		<div class="testimonial-item testimonial-<?php echo esc_attr($id); ?>">

			<!-- Testimonial Content -->
			<div class="testimonial-content">
				<div class="testimonial-text">
                    <?php if (!empty($testimonial['content'])): ?>
					   <p><?php echo esc_html($testimonial['content']); ?></p>
                    <?php endif; ?>
				</div>
			</div>            
			<!-- /Testimonial Content -->

			<!-- Testimonial Author -->
			<div class="testimonial-credits">
				<!-- Picture -->
				<div class="testimonial-picture">
					<?php
					$author_image_url = !empty($testimonial['author_avatar']['url'])
										? $testimonial['author_avatar']['url']
										: fw_get_framework_directory_uri('/static/img/no-image.png');
					?>
					<img src="<?php echo esc_attr($author_image_url); ?>" alt="<?php echo esc_attr($testimonial['author_name']); ?>"/>
				</div>              
				<!-- /Picture -->
				<!-- Testimonial author information -->
				<div class="testimonial-author-info">
					<p class="testimonial-author"><?php echo esc_html($testimonial['author_name']); ?></p>
					<?php if (!empty($testimonial['author_company'])): ?>
						<?php if (!empty($testimonial['site_url'])): ?>
							<?php if (!empty($testimonials['target'])) {
								$target = $testimonial['target'];
							} else {
								$target = "_blank";
							} ?>
							<p class="testimonial-firm"><a href="<?php echo esc_url($testimonial['site_url']); ?>" target="<?php echo esc_attr($target); ?>"><?php echo esc_html($testimonial['author_company']); ?></a></p>
						<?php else: ?>
							<p class="testimonial-firm"><?php echo esc_html($testimonial['author_company']); ?></p>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div>
			<!-- /Testimonial author information -->  
  
		</div>
		<!-- End of Testimonial <?php echo esc_attr($id); ?> -->
	<?php endforeach; ?>
</div>
