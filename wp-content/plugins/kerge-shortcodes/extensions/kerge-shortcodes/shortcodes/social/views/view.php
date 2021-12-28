<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id = uniqid( 'social-links-' );
?>

<div class="social-links-block">
	<?php if (!empty($atts['title'])): ?>
		<div class="block-title social-links-title">
			<h3><?php echo esc_html($atts['title']); ?></h3>
		</div>
	<?php endif; ?>
	<ul class="social-links" id="<?php echo esc_attr($id); ?>">
		<?php foreach ($atts['social'] as $social_links): ?>
			<?php $target = $social_links['target'] ?>
			<li><a class="social-button" href="<?php echo esc_url($social_links['link']); ?>" <?php if ($target == "_blank"): ?>target="_blank"<?php endif; ?> title="<?php echo esc_attr($social_links['title']); ?>">
				<?php
			        if (!empty($social_links['icon']['url'])) {
			            ?>
			                <img src="<?php echo esc_url($social_links['icon']['url']); ?>" alt="<?php echo esc_attr($social_links['title']); ?>">
			            <?php 
			        }
			    ?>
			    <?php
			        if (!empty($social_links['icon']['icon-class'])) {
			            ?>
			                <i class="<?php echo esc_attr($social_links['icon']['icon-class']); ?>"></i>
			            <?php 
			        }
			    ?>
			</a></li>
		<?php endforeach; ?>
	</ul>
</div>
