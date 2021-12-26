<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); ?>

<div id="main" class="site-main">
    <div id="main-content" class="single-page-content nothing-found">
        <div id="primary" class="content-area">
            <div id="content" class="site-content" role="main">
				<div class="page-content">
					<h2 class="page-title"><?php esc_html_e( '404', 'kerge' ); ?></h2>
					<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'kerge' ); ?></p>
				</div><!-- .page-content -->
            </div><!-- #content -->
	    </div>
	</div>
</div>

<?php
get_footer();
