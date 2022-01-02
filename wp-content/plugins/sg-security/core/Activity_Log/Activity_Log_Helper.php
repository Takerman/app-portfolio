<?php
namespace SG_Security\Activity_Log;

use SG_Security\Helper\Helper;

/**
 * Activity log main class
 */
class Activity_Log_Helper {

	/**
	 * Log an event from registered user.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $args Array of the event details.
	 */
	public function log_event( $args ) {
		// Get the current user.
		$user = \wp_get_current_user();

		// Prepare the user id.
		$user_id = ! empty( $user->ID ) ? $user->ID : 0;

		if ( ! empty( $args['user_id'] ) ) {
			$user_id = $args['user_id'];
		}

		$ip = Helper::get_current_user_ip();

		// Merge the event args with the args for each event.
		$args = array_merge(
			array(
				'ts'           => time(), // Current timestamp.
				'ip'           => $ip, // The user IP address.
				'code'         => 200, // The user ID.
				'visitor_id'   => $this->get_visitor_by_user_id( $user_id ), // The user ID.
				'visitor_type' => 'user', // The visitor type.
				'hostname'     => gethostbyaddr( $ip ),
			),
			$args
		);

		// Check if it's a wpcli.
		if ( defined( 'WP_CLI' ) ) {
			$args['object_id'] = 'wpcli';
		}

		// Check for system actions.
		if ( $ip === get_option( 'sg_security_server_address', '' ) ) {
			$args['object_id'] = 'system';
		}

		$this->insert( $args );
	}

	/**
	 * Create the log table.
	 *
	 * @since  1.0.0
	 */
	public static function create_log_tables() {
		global $wpdb;
		$events_sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}sgs_log_events` (
					  `id` int(11) NOT NULL AUTO_INCREMENT,
					  `visitor_id` int(11) NOT NULL,
					  `ts` int(11) NOT NULL DEFAULT '0',
					  `activity` varchar(255) NOT NULL,
					  `description` varchar(255) NOT NULL,
					  `ip` varchar(55) NOT NULL DEFAULT '127.0.0.1',
					  `hostname` varchar(255) DEFAULT '0',
					  `code` varchar(255) NOT NULL DEFAULT '',
					  `object_id` varchar(255) NOT NULL,
					  `type` varchar(255) NOT NULL,
					  `action` varchar(255) NOT NULL,
					  `visitor_type` varchar(255) NOT NULL,
					  PRIMARY KEY (`id`)
				) ENGINE=InnoDB  DEFAULT CHARSET=utf8;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $events_sql );

		$visitors_sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}sgs_log_visitors` (
					  `id` int(11) NOT NULL AUTO_INCREMENT,
					  `ip` varchar(55) NOT NULL DEFAULT '127.0.0.1',
					  `user_id` int(11) NOT NULL DEFAULT 0,
					  `block` int(11) NOT NULL DEFAULT 0,
					  `blocked_on` int(11) NOT NULL DEFAULT 0,
					  PRIMARY KEY (`id`)
				) ENGINE=InnoDB  DEFAULT CHARSET=utf8;";
		dbDelta( $visitors_sql );
	}

	/**
	 * Check if the activity already exists in the database to avoid duplicates.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $args Array of event args.
	 *
	 * @return bool       True if the entry alredy exists, false otherwise.
	 */
	public function check_for_duplicates( $args ) {
		global $wpdb;
		$has_duplicate = $wpdb->get_row( // phpcs:ignore
			$wpdb->prepare(
				'SELECT `id` FROM `' . $wpdb->sgs_log . '`
					WHERE `visitor_id` = %s
						AND `ts` = %s
						AND `activity` = %s
						AND `description` = %s
						AND `ip` = %s
						AND `hostname` = %s
						AND `code` = %s
						AND `object_id` = %s
						AND `type` = %s
						AND `action` = %s
						AND `visitor_type` = %s
				;',
				$args['visitor_id'],
				$args['ts'],
				$args['activity'],
				$args['description'],
				$args['ip'],
				$args['hostname'],
				$args['code'],
				$args['object_id'],
				$args['type'],
				$args['action'],
				$args['visitor_type']
			)
		);

		if ( $has_duplicate ) {
			return true;
		}

		return false;
	}

	/**
	 * Insert a log in the database.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $args The data to insert.
	 */
	public function insert( $args ) {
		global $wpdb;

		if ( $this->check_for_duplicates( $args ) ) {
			return;
		}

		$wpdb->insert(
			$wpdb->sgs_log,
			array(
				'visitor_id'   => $args['visitor_id'],
				'ts'           => $args['ts'],
				'activity'     => $args['activity'],
				'description'  => $args['description'],
				'ip'           => $args['ip'],
				'hostname'     => $args['hostname'],
				'code'         => $args['code'],
				'object_id'    => $args['object_id'],
				'type'         => $args['type'],
				'action'       => $args['action'],
				'visitor_type' => $args['visitor_type'],
			),
			array( '%d', '%d', '%s', '%s', '%s', '%s', '%d', '%s', '%s', '%s', '%s' )
		);
	}

	/**
	 * Get the user id from the visitors table.
	 *
	 * @since  1.0.0
	 *
	 * @param  int $user_id The user ID.
	 *
	 * @return int          The ID from the visitors table.
	 */
	public function get_visitor_by_user_id( $user_id ) {
		global $wpdb;
		$maybe_id = $wpdb->get_row( // phpcs:ignore
			$wpdb->prepare(
				'SELECT `ID` FROM `' . $wpdb->sgs_visitors . '`
					WHERE `user_id` = %s
				;',
				$user_id
			)
		);

		if ( ! is_null( $maybe_id ) ) {
			return $maybe_id->ID;
		}

		$id = $wpdb->insert(
			$wpdb->sgs_visitors,
			array(
				'user_id' => $user_id,
				'ip'      => Helper::get_current_user_ip(),
			),
			array( '%s', '%s' )
		);

		return $id;
	}

	/**
	 * Get the visitor unique ID by Ip address.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $ip The visitor IP.
	 *
	 * @return int        The ID from the visitors table.
	 */
	public function get_visitor_by_ip( $ip ) {
		global $wpdb;
		$maybe_id = $wpdb->get_row( // phpcs:ignore
			$wpdb->prepare(
				'SELECT `ID` FROM `' . $wpdb->sgs_visitors . '`
					WHERE `ip` = %s
					AND `user_id` = 0
				;',
				$ip
			)
		);

		if ( ! is_null( $maybe_id ) ) {
			return $maybe_id->ID;
		}

		$id = $wpdb->insert(
			$wpdb->sgs_visitors,
			array(
				'ip' => $ip,
			),
			array( '%s' )
		);

		return $id;
	}

}
