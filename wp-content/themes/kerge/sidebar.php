<?php
/**
 * The Sidebar
 */
?>

<?php if (is_active_sidebar( 'kerge-blog-sidebar' )): ?>
	<div id="blog-sidebar" class="blog-sidebar">
		<a class="sidebar-toggle" href="#">
			<i class="fa fa-list"></i>
		</a>
		<div class="blog-sidebar-content clearfix">
			<?php if ( !dynamic_sidebar( 'kerge-blog-sidebar' ) ) : ?>

				<div class="sidebar-item">
					<?php get_search_form(); ?>
				</div>

				<div class="sidebar-item">
					<div class="sidebar-title">
						<h4><?php esc_html_e( 'Archives', 'kerge' ); ?></h4>
					</div>
					<ul>
						<?php wp_get_archives(array( 
						'type' => 'monthly'
						)); ?>
					</ul>
				</div>

			<?php endif; // end sidebar widget area ?>
		</div>
	</div>
<?php endif; ?>
