<footer class="footer">
	<?php 
		$footer_widget_count = weblusive_get_option('footer_widgets');
		if($footer_widget_count !== 'none'): ?>
			<div class="top">
				<div class="container">
					<div class="row">
					<?php 
						if($footer_widget_count !== 'none'):
						for($i = 1; $i<= $footer_widget_count; $i++){
							if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Widget ".$i) ) :endif;
						}			
					?>
					<?php endif; ?>
					</div>
				</div>
			</div>	
	<?php endif; ?>
	<?php $footer_bottom_disable = weblusive_get_option('footer_bottom_disable');
	if (!$footer_bottom_disable): ?>
	<div class="bottom"><?php echo  htmlspecialchars_decode(do_shortcode(weblusive_get_option('footer_copyright')))?></div>
	<?php endif;?>
</footer>
<?php wp_footer()?>
</body>
</html>
