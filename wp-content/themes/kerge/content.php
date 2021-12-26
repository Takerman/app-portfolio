<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */
$permalink = esc_url(get_permalink());
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php kerge_theme_post_thumbnail(); ?>

	<div class="post-content">
		<header class="entry-header">
			

			<div class="entry-meta entry-meta-top">
				<?php
					if ( 'post' == get_post_type() ):
						kerge_theme_post_category();
					endif;
				?>
				<?php
					if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
				?>

				<?php
					endif;

					edit_post_link( esc_html__( 'Edit', 'kerge' ), '<span class="edit-link">', '</span>' );
				?>
			</div><!-- .entry-meta -->

			<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && kerge_theme_categorized_blog() ) : ?>
			<?php
				endif;

				if ( is_single() ) :
					the_title( '<h2 class="entry-title">', '</h2>' );
				else :
					the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
				endif;
			?>
		</header><!-- .entry-header -->

		<?php if ( is_single() ) : ?>
		<div class="entry-content">
			<?php
			$theme_excerpt = get_option( 'theme_excerpt', 'No' );
											
			if ( $theme_excerpt == 'Yes' ):
				the_excerpt();
			elseif ( $theme_excerpt == 'standard' ):
				the_excerpt();
			else:
				the_content( esc_html__( 'Continue reading...', 'kerge' ) );
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'kerge' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			endif; ?>
		</div><!-- .entry-content -->
		<?php else : ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php endif; ?>

		<div class="entry-meta entry-meta-bottom">
		<?php if ( 'post' == get_post_type() ): ?>
			<div class="date-author">
			<?php kerge_theme_posted_on(); ?>
			</div>
		<?php endif; ?>

		<?php if ( function_exists( 'kerge_theme_share_buttons' ) ) : ?>
		<!-- Share Buttons -->
			<div class="entry-share btn-group share-buttons">
				<?php kerge_theme_share_buttons($permalink); ?>
			</div>
		<!-- /Share Buttons -->
		<?php endif; ?>
		</div>

		<div class="post-tags">
			<?php the_tags( '<span class="tags">', '', '</span>' ); ?>
		</div>
	</div>
</article><!-- #post-## -->
