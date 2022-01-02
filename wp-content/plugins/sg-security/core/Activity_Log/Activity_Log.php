<?php
namespace SG_Security\Activity_Log;

use SG_Security\Activity_Log\Activity_Log_Posts;
use SG_Security\Activity_Log\Activity_Log_Options;
use SG_Security\Activity_Log\Activity_Log_Attachments;
use SG_Security\Activity_Log\Activity_Log_Comments;
use SG_Security\Activity_Log\Activity_Log_Core;
use SG_Security\Activity_Log\Activity_Log_Menu;
use SG_Security\Activity_Log\Activity_Log_Export;
use SG_Security\Activity_Log\Activity_Log_Plugins;
use SG_Security\Activity_Log\Activity_Log_Themes;
use SG_Security\Activity_Log\Activity_Log_Users;
use SG_Security\Activity_Log\Activity_Log_Widgets;
use SG_Security\Activity_Log\Activity_Log_Unknown;
use SG_Security\Activity_Log\Activity_Log_Taxonomies;
use SG_Security\Helper\Helper;

/**
 * Activity log main class
 */
class Activity_Log {

	/**
	 * The singleton instance.
	 *
	 * @since 1.0.0
	 *
	 * @var \Activity_Log The singleton instance.
	 */
	private static $instance;

	/**
	 * Our custom log table name
	 *
	 * @var string
	 */
	public $log_table = 'sgs_log_events';

	/**
	 * Our custom log visitors tabl
	 *
	 * @var string
	 */
	public $visitors_table = 'sgs_log_visitors';

	/**
	 * Set logs to exspire after specific time. Default 12 days.
	 *
	 * @since 1.0.0
	 *
	 * @var int The expire time.
	 */
	const LOG_LIFETIME = 12;


	/**
	 * Child classes that have to be initialized.
	 *
	 * @var array
	 *
	 * @since 1.0.0
	 */
	public static $children = array(
		'posts',
		'options',
		'attachments',
		'comments',
		'core',
		'export',
		'plugins',
		'themes',
		'users',
		'widgets',
		'unknown',
		'taxonomies',
	);

	/**
	 * The constructor.
	 */
	public function __construct() {
		self::$instance = $this;
		$this->run();

		global $wpdb;

		$wpdb->sgs_log      = $wpdb->prefix . $this->log_table;
		$wpdb->sgs_visitors = $wpdb->prefix . $this->visitors_table;
	}

	/**
	 * Get the singleton instance.
	 *
	 * @since 1.0.0
	 *
	 * @return \Minifier The singleton instance.
	 */
	public static function get_instance() {
		if ( null == self::$instance ) {
			static::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Init the sub loggers
	 *
	 * @since  1.0.0
	 */
	public function run() {
		foreach ( self::$children as $child ) {
			$this->factory( $child );
		}
	}

	/**
	 * Create a new log of type $type
	 *
	 * @since 1.0.0
	 *
	 * @param string $type The type of the log class.
	 *
	 * @throws \Exception if the type is not supported.
	 */
	private function factory( $type ) {

		$class = __NAMESPACE__ . '\\Activity_Log_' . str_replace( ' ', '_', ucwords( str_replace( '_', ' ', $type ) ) );

		if ( ! class_exists( $class ) ) {
			throw new \Exception( 'Unknown activity log type "' . $type . '".' );
		}

		$this->$type = new $class();
	}


	/**
	 * Set the cron job for deleting old logs.
	 *
	 * @since  1.0.0
	 */
	public function set_sgs_logs_cron() {
		// Bail if cron is disabled.
		if ( 1 === Helper::is_cron_disabled() ) {
			return;
		}

		if ( ! wp_next_scheduled( 'siteground_security_clear_logs_cron' ) ) {
			wp_schedule_event( time(), 'daily', 'siteground_security_clear_logs_cron' );
		}
	}

	/**
	 * Delete logs on plugin page if cron is disabled.
	 *
	 * @since  1.0.0
	 */
	public function delete_logs_on_admin_page() {
		// Delete if we are on plugin page and cron is disabled.
		if (
			isset( $_GET['page'] ) &&
			'sg-security' === $_GET['page'] &&
			1 === Helper::is_cron_disabled()
		) {
			$this->delete_old_activity_logs();
		}
	}

	/**
	 * Delete the old log records from the database.
	 *
	 * @since  1.0.0
	 */
	public function delete_old_activity_logs() {
		global $wpdb;

		// Set custom log lifetime interval in days. The intval covers the cases for string, array and sql injections.
		$log_lifetime = intval( apply_filters( 'sgs_set_activity_log_lifetime',  self::LOG_LIFETIME ) ) ;

		// If the custom value is less than 1 day or more than 12, fallback to the default lifetime.
		if ( ( 1 > $log_lifetime ) || ( $log_lifetime > 12 ) ) {
			$log_lifetime = self::LOG_LIFETIME;
		}

		$wpdb->query(
			$wpdb->prepare(
				'DELETE FROM `' . $wpdb->sgs_log . '`
					WHERE `ts` < %s
				;',
				time() - $log_lifetime * DAY_IN_SECONDS
			)
		);
	}

}
