<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>
<blockquote class="quote <?php echo esc_attr( $atts['text_align'] ); ?> <?php echo esc_attr( $atts['font_size'] ); ?> <?php echo esc_attr( $atts['class'] ); ?>">
    <?php echo wp_kses_post( do_shortcode( $atts['text'] ) ); ?>
	<?php if( $atts['author'] != '' ) : ?>
		<footer class="quote-author">
			<span>
				<?php if($atts['author_link'] != '') : ?>
					<a href="<?php echo esc_url( $atts['author_link'] ); ?>"><?php echo esc_html( $atts['author'] ); ?></a>
				<?php else : ?>
					<?php echo esc_html( $atts['author'] ); ?>
				<?php endif; ?>
			</span>
		</footer>
	<?php endif; ?>
</blockquote>