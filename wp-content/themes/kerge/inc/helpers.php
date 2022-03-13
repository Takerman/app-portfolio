<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Helper functions and classes with static methods for usage in theme
 */

/**
 * Register Lato Google font.
 *
 * @return string
 */
function kerge_theme_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'kerge' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ),
			"//fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**
 * A helper conditional function that returns a boolean value.
 *
 * @return bool Whether there are featured posts.
 */
function kerge_theme_has_featured_posts() {
	return ! is_paged() && (bool) fw_theme_get_featured_posts();
}

if ( ! function_exists( 'fw_theme_the_attached_image' ) ) : /**
 * Print the attached image with a link to the next attached image.
 */ {
	function kerge_theme_the_attached_image() {
		$post = get_post();
		/**
		 * Filter the default attachment size.
		 *
		 * @param array $dimensions {
		 *     An array of height and width dimensions.
		 *
		 * @type int $height Height of the image in pixels. Default 810.
		 * @type int $width Width of the image in pixels. Default 810.
		 * }
		 */
		$attachment_size     = apply_filters( 'fw_theme_attachment_size', array( 810, 810 ) );
		$next_attachment_url = wp_get_attachment_url();

		/*
		 * Grab the IDs of all the image attachments in a gallery so we can get the URL
		 * of the next adjacent image in a gallery, or the first image (if we're
		 * looking at the last image in a gallery), or, in a gallery of one, just the
		 * link to that image file.
		 */
		$attachment_ids = get_posts( array(
			'post_parent'    => $post->post_parent,
			'fields'         => 'ids',
			'numberposts'    => - 1,
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => 'ASC',
			'orderby'        => 'menu_order ID',
		) );

		// If there is more than 1 attachment in a gallery...
		if ( count( $attachment_ids ) > 1 ) {
			foreach ( $attachment_ids as $attachment_id ) {
				if ( $attachment_id == $post->ID ) {
					$next_id = current( $attachment_ids );
					break;
				}
			}

			// get the URL of the next image attachment...
			if ( $next_id ) {
				$next_attachment_url = get_attachment_link( $next_id );
			} // or get the URL of the first image attachment.
			else {
				$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
			}
		}

		printf( '<a href="%1$s" rel="attachment">%2$s</a>',
			esc_url( $next_attachment_url ),
			wp_get_attachment_image( $post->ID, $attachment_size )
		);
	}
}
endif;

if ( ! function_exists( 'fw_theme_list_authors' ) ) : /**
 * Print a list of all site contributors who published at least one post.
 */ {
	function kerge_theme_list_authors() {
		$contributor_ids = get_users( array(
			'fields'  => 'ID',
			'orderby' => 'post_count',
			'order'   => 'DESC',
			'who'     => 'authors',
		) );

		foreach ( $contributor_ids as $contributor_id ) :
			$post_count = count_user_posts( $contributor_id );

			// Move on if user has not published a post (yet).
			if ( ! $post_count ) {
				continue;
			}
			?>

			<div class="contributor">
				<div class="contributor-info">
					<div class="contributor-avatar"><?php echo get_avatar( $contributor_id, 132 ); ?></div>
					<div class="contributor-summary">
						<h2 class="contributor-name"><?php echo get_the_author_meta( 'display_name',
								$contributor_id ); ?></h2>

						<p class="contributor-bio">
							<?php echo get_the_author_meta( 'description', $contributor_id ); ?>
						</p>
						<a class="button contributor-posts-link"
						   href="<?php echo esc_url( get_author_posts_url( $contributor_id ) ); ?>">
							<?php printf( _n( '%d Article', '%d Articles', $post_count, 'kerge' ), $post_count ); ?>
						</a>
					</div>
					<!-- .contributor-summary -->
				</div>
				<!-- .contributor-info -->
			</div><!-- .contributor -->

		<?php
		endforeach;
	}
}
endif;

/**
 * Custom template tags
 */
{
	if ( ! function_exists( 'fw_theme_paging_nav' ) ) : /**
	 * Display navigation to next/previous set of posts when applicable.
	 */ {
		function kerge_theme_paging_nav( $wp_query = null ) {

			if ( ! $wp_query ) {
				$wp_query = $GLOBALS['wp_query'];
			}

			// Don't print empty markup if there's only one page.

			if ( $wp_query->max_num_pages < 2 ) {
				return;
			}

			$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
			$pagenum_link = html_entity_decode( get_pagenum_link() );
			$query_args   = array();
			$url_parts    = explode( '?', $pagenum_link );

			if ( isset( $url_parts[1] ) ) {
				wp_parse_str( $url_parts[1], $query_args );
			}

			$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
			$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

			$format = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link,
				'index.php' ) ? 'index.php/' : '';
			$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%',
				'paged' ) : '?paged=%#%';

			// Set up paginated links.
			$links = paginate_links( array(
				'base'      => $pagenum_link,
				'format'    => $format,
				'total'     => $wp_query->max_num_pages,
				'current'   => $paged,
				'mid_size'  => 1,
				'add_args'  => array_map( 'urlencode', $query_args ),
				'prev_text' => esc_html__( 'Previous', 'kerge' ),
				'next_text' => esc_html__( 'Next', 'kerge' ),
			) );

			if ( $links ) :

				?>
				<nav class="navigation paging-navigation" role="navigation">
					<div class="pagination loop-pagination">
						<?php echo wp_kses_post($links); ?>
					</div>
					<!-- .pagination -->
				</nav><!-- .navigation -->
			<?php
			endif;
		}
	}
	endif;

	if ( ! function_exists( 'kerge_theme_post_nav' ) ) : /**
	 * Display navigation to next/previous post when applicable.
	 */ {
		function kerge_theme_post_nav() {
			// Don't print empty markup if there's nowhere to navigate.
			$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '',
				true );
			$next     = get_adjacent_post( false, '', false );

			if ( ! $next && ! $previous ) {
				return;
			}

			?>
			<nav class="navigation post-navigation clearfix">
				<div class="nav-links">
					<?php
					if ( is_attachment() ) :
						previous_post_link( '%link', ('<span class="meta-nav">' . esc_html__( 'Published In', 'kerge' ) . ' %title' . '</span>') );
					else :
						previous_post_link( '%link', ('<span class="meta-nav">' . ' %title' . '</span>') );
						next_post_link( '%link', ('<span class="meta-nav">' . ' %title' . '</span>') );
					endif;
					?>
				</div>
				<!-- .nav-links -->
			</nav><!-- .navigation -->
		<?php
		}
	}
	endif;

	if ( ! function_exists( 'kerge_theme_portfolio_nav' ) ) : /**
	 * Display navigation to next/previous post when applicable.
	 */ {
		function kerge_theme_portfolio_nav() {
			// Don't print empty markup if there's nowhere to navigate.

			$is_ajax_query  = get_query_var( 'ajax' );
			$prev_post_obj = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
			$next_post_obj     = get_adjacent_post( false, '', false );
			?>
			
			<nav class="portfolio-page-nav">
				<div class="nav-item portfolio-page-prev-next">
					<?php
					if( $prev_post_obj ):
						$prev_post_ID   = isset( $prev_post_obj->ID ) ? $prev_post_obj->ID : '';
						$prev_post_link     = get_permalink( $prev_post_ID );
						$prev_title = $prev_post_obj->post_title;
					?>
						<?php if ( $is_ajax_query ): ?>
							<a href="<?php echo esc_url($prev_post_link); ?>" rel="previous" class="ajax-page-load">
						<?php else: ?>
							<a href="<?php echo esc_url($prev_post_link); ?>" rel="next" >
						<?php endif; ?>
							    <span class="meta-nav" title="<?php echo esc_attr($prev_title); ?>"><i class="dashicons dashicons-arrow-left-alt2 portfolio-nav-prev"></i></span>
							</a>
					<?php
					endif;
					?>

					<?php
					if ( $next_post_obj ):
						$next_post_ID   = isset( $next_post_obj->ID ) ? $next_post_obj->ID : '';
						$next_post_link     = get_permalink( $next_post_ID );
						$next_title = $next_post_obj->post_title;
					?>
						<?php if ( $is_ajax_query ): ?>
							<a href="<?php echo esc_url($next_post_link); ?>" rel="next" class="ajax-page-load">
						<?php else: ?>
							<a href="<?php echo esc_url($next_post_link); ?>" rel="next" >
						<?php endif; ?>
						    <span class="meta-nav" title="<?php echo esc_attr($next_title); ?>"><i class="dashicons dashicons-arrow-right-alt2 portfolio-nav-next"></i></span>
						</a>
					<?php
					endif;
					?>
				</div>
				<?php
				if ( $is_ajax_query ) :
					?>
					<div class="nav-item portfolio-page-close-button">
						<a id="portfolio-page-close-button" href="#"><i class="dashicons dashicons-no-alt portfolio-nav-close"></i></a>
					</div>
					<?php
				endif;
				?>
			</nav>
		<?php
		}
	}
	endif;

	if ( ! function_exists( 'kerge_theme_posted_on' ) ) : /**
	 * Print HTML with meta information for the current post-date/time and author.
	 */ {
		function kerge_theme_posted_on() {
			// Set up and print post meta information.
			printf( '<span class="entry-date"><a href="%1$s" rel="bookmark"><i class="fa fa-fw fa-clock-o"></i> <time class="entry-date" datetime="%2$s">%3$s</time></a></span><span class="author vcard"><a class="url fn n" href="%4$s" rel="author"><i class="fa fa-fw fa-user"></i> %5$s</a></span> ',
				esc_url( get_permalink() ),
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( get_the_author() )
			);
		}
	}
	endif;

	if ( ! function_exists( 'kerge_theme_post_category' ) ) : /**
	 * Print HTML with meta information for the current post-date/time and author.
	 */ {
		function kerge_theme_post_category() {
			if ( is_sticky() && is_home() && ! is_paged() ) {
				echo '<span class="featured-post"><i class="fa fa-fw fa-thumb-tack"></i> ' . esc_html__( 'Featured', 'kerge' ) . ' </span>';
			}

			// Set up and print post meta information.
			printf( '<span>%1$s</span> ',
				get_the_category_list($separator = ', ')
			);
		}
	}
	endif;


	/**
	 * Find out if blog has more than one category.
	 *
	 * @return boolean true if blog has more than 1 category
	 */
	function kerge_theme_categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'fw_theme_category_count' ) ) ) {
			// Create an array of all the categories that are attached to posts
			$all_the_cool_cats = get_categories( array(
				'hide_empty' => 1,
			) );

			// Count the number of categories that are attached to the posts
			$all_the_cool_cats = count( $all_the_cool_cats );

			set_transient( 'fw_theme_category_count', $all_the_cool_cats );
		}

		if ( 1 !== (int) $all_the_cool_cats ) {
			// This blog has more than 1 category so fw_theme_categorized_blog should return true
			return true;
		} else {
			// This blog has only 1 category so fw_theme_categorized_blog should return false
			return false;
		}
	}

	/**
	 * Display an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index
	 * views, or a div element when on single views.
	 */
	function kerge_theme_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		$current_position = false;
		if (function_exists('fw_ext_sidebars_get_current_position')) {
			$current_position = fw_ext_sidebars_get_current_position();
		}



		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php
					the_post_thumbnail( 'full' );
				?>
			</div>

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>">
				<?php
					the_post_thumbnail( 'full' );
				?>
			</a>

		<?php endif; // End is_singular()
	}
}
