<?php
namespace SiteGround_Optimizer\Supercacher;

use SiteGround_Optimizer\Helper\Update_Queue_Trait;
use WP_Rewrite;
/**
 * SG CachePress main plugin class
 */
class Supercacher_Posts {
	use Update_Queue_Trait;

	/**
	 * List of post types excluded from smart cache purge.
	 *
	 * @since 5.9.4
	 *
	 * @var array.
	 */
	public $excluded_post_types = array(
		// Spotlight-social-photo-feeds plugin.
		'sl-insta-media',
		'sl-insta-feed',
		// Layerswp theme.
		'custom_css',
		// ttm-plugin plugin.
		'dn_wp_yt_log',
		// post-smtp plugin.
		'postman_sent_mail',
		// Flamingo plugin.
		'flamingo_contact',
		'flamingo_inbound',
		'flamingo_outbound',
		// Stop-spammers-premium plugin.
		'ssp-firewall',
		'pf_contact',
	);

	/**
	 * Get all parent pages of the certain post.
	 *
	 * @since  5.0.0
	 *
	 * @param  int $post_id The post id.
	 */
	public function get_parents_urls( $post_id ) {
		// Get post parents.
		$parents = get_ancestors(
			$post_id,
			get_post_type( $post_id ),
			'post_type'
		);

		$parents_urls = array();

		// Bail if the post top level post.
		if ( empty( $parents ) ) {
			return $parents_urls;
		}

		// Adds all parents to the purge queue.
		foreach ( $parents as $id ) {
			$parents_urls[] = get_permalink( $id );
		}

		// Return an array with URLs of all post parent pages.
		return $parents_urls;
	}

	/**
	 * Get all post terms.
	 *
	 * @since  5.0.0
	 *
	 * @param  int $post_id The post id.
	 */
	public function get_post_terms( $post_id ) {
		// Get all post taxonomies.
		$taxonomies = get_post_taxonomies( $post_id );

		// Get term ids.
		$term_ids = wp_get_object_terms(
			$post_id,
			$taxonomies,
			array(
				'fields' => 'ids',
			)
		);

		$term_urls = array();

		// Bail if there are no term_ids.
		if ( empty( $term_ids ) ) {
			return $term_urls;
		}

		// Init the terms cacher.
		$supercacher_terms = new Supercacher_Terms();

		// Loop through all terms ids and purge the cache.
		foreach ( $term_ids as $id ) {
			$term_urls[] = $supercacher_terms->get_term_url( $id );
		}

		// Return an array with all post term URLs.
		return $term_urls;
	}

	/**
	 * Get the Blog Page URL.
	 *
	 * @since  5.7.20
	 */
	public function get_blog_page() {
		// Check if a blog page is set.
		$blog_id = (int) get_option( 'page_for_posts' );

		// Bail if home page is set for blog page.
		if ( empty( $blog_id ) ) {
			return get_home_url( null, '/' );
		}

		// Purge the cache for that post.
		return get_permalink( $blog_id );
	}

	/**
	 * Purge on post save.
	 *
	 * @since 5.9.0
	 *
	 * @param  int $post_id The post id.
	 */
	public function purge_post_save( $post_id ) {
		// Purge all cache if a post is saved and the WPML plugin is active.
		if ( class_exists( 'SitePress' ) ) {
			return Supercacher::get_instance()->purge_everything();
		}

		// Continue with post cache purge.
		$this->purge_all_post_cache( $post_id );
	}

	/**
	 * Adds the post that has been changed and it's parents,
	 * the index cache, and the post categories to the purge cache queue.
	 *
	 * @since  5.0.0
	 *
	 * @param  int $post_id The post id.
	 */
	public function purge_all_post_cache( $post_id ) {
		// Delete the index page only if this is the front page.
		if ( (int) get_option( 'page_on_front' ) === $post_id ) {
			// Add the index page to the cache purge queue.
			$this->update_queue( array( get_home_url( null, '/' ) ) );
			return;
		}

		// Get the post.
		$post = get_post( $post_id );

		// Bail if post type is excluded from cache purge.
		if ( in_array( $post->post_type, $this->excluded_post_types ) ) {
			return;
		}

		// Do not purge the cache for revisions and auto-drafts.
		if (
			'auto-draft' === $post->post_status ||
			'revision' === $post->post_type ||
			'trash' === $post->post_status
		) {
			return;
		}

		// Init the WP Rewrite Class.
		global $wp_rewrite;

		$wp_rewrite = is_null( $wp_rewrite ) ? new WP_Rewrite() : $wp_rewrite; //phpcs:ignore

		// Add the URLs to the purge cache queue.
		$this->update_queue(
			array_merge(
				// The post parent URLs.
				$this->get_parents_urls( $post_id ),
				// The post term URLs.
				$this->get_post_terms( $post_id ),
				// The default URLs.
				array(
					get_rest_url(), // The rest api URL.
					get_permalink( $post_id ), // The post URL.
					$this->get_blog_page(), // The blog page URL.
					get_home_url( null, '/' ), // The home URL.
					get_home_url( null, '/feed' ), // The Feed URL.
				)
			)
		);
	}
}
