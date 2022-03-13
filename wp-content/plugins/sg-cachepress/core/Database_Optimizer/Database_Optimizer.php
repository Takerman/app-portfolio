<?php
namespace SiteGround_Optimizer\Database_Optimizer;

use SiteGround_Optimizer\Supercacher\Supercacher;

/**
 * SG Database_Optimizer main plugin class.
 */
class Database_Optimizer {

	/**
	 * {WordPress Database Access Abstraction Object} instance.
	 *
	 * @var object.
	 */
	public $wpdb;

	/**
	 * {Database_Optimizer_Background Object} instance.
	 *
	 * @var object.
	 */
	public $background_process;

	/**
	 * The constructor.
	 *
	 * @since 5.6.0
	 */
	public function __construct() {
		// Init Database.
		global $wpdb;

		// Set refference to the variable.
		$this->wpdb = $wpdb;

		// Set the BG processing class.
		$this->background_process = new Database_Optimizer_Background();
	}

	/**
	 * Handle the cron optimization of database.
	 *
	 * @since  5.6.0
	 */
	public function optimize_database() {
		// The methods that should be called to optimize the database.
		$methods = array(
			'delete_auto_drafts',
			'delete_revisions',
			'delete_trashed_posts',
			'delete_spam_comments',
			'delete_trash_comments',
			'expired_transients',
			'optimize_tables',
			'clear_memcache',
		);

		foreach ( $methods as $method ) {
			$this->background_process->push_to_queue( $method );
		}

		// Dispatch.
		$this->background_process->save()->dispatch();
	}

	/**
	 * Delete all auto-drafts.
	 *
	 * @since  5.6.0
	 */
	public function delete_auto_drafts() {
		// Get the auto-drafts of posts.
		$posts = $this->wpdb->get_col( "SELECT ID FROM " . $this->wpdb->posts . " WHERE post_status = 'auto-draft'" );

		// Bail if there are no posts.
		if ( ! $posts ) {
			return;
		}

		// Loop trough the result and delete the auto-draft.
		foreach ( $posts as $id ) {
			wp_delete_post( intval( $id ), true );
		}
	}

	/**
	 * Delete all post revisions
	 *
	 * @since  5.6.0
	 */
	public function delete_revisions() {
		// Get all posts revisions.
		$posts = $this->wpdb->get_col( "SELECT ID FROM " . $this->wpdb->posts . " WHERE post_type = 'revision'" );

		// Bail if there are no posts.
		if ( ! $posts ) {
			return;
		}

		// Loop trough result and delete post revisions.
		foreach ( $posts as $id ) {
			wp_delete_post_revision( intval( $id ) );
		}
	}

	/**
	 * Delete all trashed posts.
	 *
	 * @since  5.6.0
	 */
	public function delete_trashed_posts() {
		// Get all trashed posts.
		$posts = $this->wpdb->get_col( "SELECT ID FROM " . $this->wpdb->posts . " WHERE post_status = 'trash'" );

		// Bail if there are no posts.
		if ( ! $posts ) {
			return;
		}

		// Loop trough result and delete trashed posts.
		foreach ( $posts as $id ) {
			wp_delete_post( $id, true );
		}
	}

	/**
	 * Delete all spam comments.
	 *
	 * @since  5.6.0
	 */
	public function delete_spam_comments() {
		// Get all spam comments.
		$comments = $this->wpdb->get_col( "SELECT comment_ID FROM " . $this->wpdb->comments . " WHERE comment_approved = 'spam'" );

		// Bail if there are no comments.
		if ( ! $comments ) {
			return;
		}

		// Loop trough result and delete spam comments.
		foreach ( $comments as $id ) {
			wp_delete_comment( intval( $id ), true );
		}
	}

	/**
	 * Delete trashed comments.
	 *
	 * @since  5.6.0
	 */
	public function delete_trash_comments() {
		// Get all trashed comments.
		$comments = $this->wpdb->get_col( "SELECT comment_ID FROM " . $this->wpdb->comments . " WHERE comment_approved = 'trash'" );

		// Bail if there are no comments.
		if ( ! $comments ) {
			return;
		}

		// Loop trough and delete trashed comments.
		foreach ( $comments as $id ) {
			wp_delete_comment( intval( $id ), true );
		}
	}

	/**
	 * Delete expired transients.
	 *
	 * @since  5.6.0
	 */
	public function expired_transients() {
		$time  = isset( $_SERVER['REQUEST_TIME'] ) ? (int) $_SERVER['REQUEST_TIME'] : time();
		$transients = $this->wpdb->get_col( $this->wpdb->prepare( "SELECT option_name FROM " . $this->wpdb->options . " WHERE option_name LIKE %s AND option_value < %d", $this->wpdb->esc_like( '_transient_timeout' ) . '%', $time ) );

		// Bail if there are no transients.
		if ( ! $transients ) {
			return;
		}

		// Loop trough and delete expired transients.
		foreach ( $transients as $transient ) {
			delete_transient( str_replace( '_transient_timeout_', '', $transient ) );
		}
	}

	/**
	 * Optimize database tables
	 *
	 * @since  5.6.0
	 */
	public function optimize_tables() {
		$tables = $this->wpdb->get_results( "SELECT table_name, data_free FROM information_schema.tables WHERE table_schema = '" . DB_NAME . "' and Engine <> 'InnoDB' and data_free > 0" );

		// Bail if there are no results.
		if ( ! $tables ) {
			return;
		}

		// Loop trough and optimize table.
		foreach ( $tables as $table ) {
			$this->wpdb->query( "OPTIMIZE TABLE $table->table_name" );
		}
	}

	/**
	 * Clears Memcache/Memcached if the option is enabled.
	 *
	 * @since 6.0.1
	 *
	 * @return bool Result of cache purge.
	 */
	public function clear_memcache() {
		return Supercacher::flush_memcache();
	}
}
