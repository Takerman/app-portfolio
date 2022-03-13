<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>
<div class="fw-accordion" data-collapsed="<?php echo esc_attr($atts['all_collapsed']); ?>">
	<?php foreach ( $atts['tabs'] as $tab ) : ?>
		<h3 class="fw-accordion-title"><?php echo esc_html($tab['tab_title']); ?></h3>
		<div class="fw-accordion-content">
			<div><?php echo do_shortcode( $tab['tab_content'] ); ?></div>
		</div>
	<?php endforeach; ?>
</div>