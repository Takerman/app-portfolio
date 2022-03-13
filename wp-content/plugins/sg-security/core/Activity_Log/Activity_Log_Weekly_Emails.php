<?php
namespace SG_Security\Activity_Log;

use SiteGround_Helper\Helper_Service;
use SiteGround_Emails\Email_Service;

/**
 * Activity Log Weekly Emails class
 */
class Activity_Log_Weekly_Emails extends Activity_Log_Helper {
	/**
	 * The constructor.
	 *
	 * @since 1.2.0
	 */
	public function __construct() {
		// Initiate the Email Service Class.
		$this->weekly_report_email = new Email_Service(
			'sgs_email_cron',
			'weekly',
			strtotime( 'next monday' ),
			array(
				'recipients_option' => 'sg_security_notification_emails',
				'subject'           => __( 'SiteGround Security Weekly Activity', 'sg-security' ),
				'body_method'       => array( '\SG_Security\Activity_Log\Activity_Log_Weekly_Emails', 'generate_message_body' )
			)
		);
	}

	/**
	 * Generate the message body and return it to the constructor.
	 *
	 * @since  1.2.0
	 *
	 * @return string $message_body HTML of the message body.
	 */
	static function generate_message_body() {
		$weekly_emails = new Activity_Log_Weekly_Emails();

		// Activity Log page URL.
		$activity_log_url = admin_url( '/admin.php?page=activity-log' );

		// Generate the start date we should collect the data from.
		$start_date = $weekly_emails->get_last_cron_run()->modify( 'last monday' );
		// Generate the end date we should collect the data to.
		$end_date = $weekly_emails->get_last_cron_run();


		// Mail template arguments.
		$args = array(
			'domain'               => Helper_Service::get_site_url(),
			'activity_log_link'    => $activity_log_url,
			'unsubscribe_link'     => $activity_log_url,
			'start_time'           => $start_date->format( 'F d' ),
			'end_time'             => $end_date->format( 'F d, Y' ),
			'is_siteground'        => Helper_Service::is_siteground(),
			'agreed_email_consent' => (int) get_option( 'siteground_email_consent', 0 ),
			'total_human'          => $weekly_emails->get_total_human_stats( $start_date->getTimestamp(), $end_date->getTimestamp() ),
			'total_bots'           => $weekly_emails->get_total_bots_stats( $start_date->getTimestamp(), $end_date->getTimestamp() ),
			'total_blocked_login'  => get_option( 'sg_security_total_blocked_logins', 0 ),
			'total_blocked_visits' => get_option( 'sg_security_total_blocked_visits', 0 ),
		);

		// Turn on output buffering.
		ob_start();

		// Include the template file.
		include \SG_Security\DIR . '/templates/weekly_report.php';

		// Pass the contents of the output buffer to the variable.
		$message_body = ob_get_contents();

		// Clean the output buffer and turn off output buffering.
		ob_end_clean();

		// Return the message body content as a string.
		return $message_body;
	}

	/**
	 * Update the timestamp when the cron event was last ran.
	 *
	 * @since 1.2.0
	 */
	public function update_last_cron_run_timestamp() {
		update_option( 'sg_security_weekly_email_timestamp', time() );
	}

	/**
	 * Get the last time the cron event was ran.
	 *
	 * @since  1.2.0
	 *
	 * @return object $last_run_time DateTime object.
	 */
	public function get_last_cron_run() {
		// DateTime object.
		$last_run_time = new \DateTime();

		// Get the timestamp and convert it to DateTime object.
		$last_run_time->setTimestamp( get_option( 'sg_security_weekly_email_timestamp', time() ) );

		return $last_run_time;
	}

	/**
	 * Get stats for total human visits in the past week.
	 *
	 * @since  1.2.0
	 *
	 * @param  int $start_date Start date timestamp.
	 * @param  int $end_date   End date timestamp.
	 *
	 * @return int             The number of total human visits.
	 */
	private function get_total_human_stats( $start_date, $end_date ) {
		global $wpdb;

		return $wpdb->get_var(
			'SELECT COUNT(*) FROM `' . $wpdb->prefix . 'sgs_log_events' . '`
			WHERE `action` = "visit"
			AND `visitor_type` = "Human"
			AND `type` = "unknown"
			AND `ts` BETWEEN ' . $start_date .' AND ' . $end_date . ' ;'
		);
	}

	/**
	 * Get stats for total bots visits in the past week.
	 *
	 * @since  1.2.0
	 *
	 * @param  int $start_date Start date timestamp.
	 * @param  int $end_date   End date timestamp.
	 *
	 * @return int             The number of total bots visits.
	 */
	private function get_total_bots_stats( $start_date, $end_date ) {
		global $wpdb;

		return $wpdb->get_var(
			'SELECT COUNT(*) FROM `' . $wpdb->prefix . 'sgs_log_events' . '`
			WHERE `action` = "visit"
			AND `visitor_type` <>"Human" AND `visitor_type` <>"unknown"
			AND `type` = "unknown"
			AND `ts` BETWEEN ' . $start_date .' AND ' . $end_date . ' ;'
		);
	}

	/**
	 * Reset the block stats counters.
	 *
	 * @since 1.2.0
	 */
	public function reset_weekly_stats_counters() {
		// Reset the total blocked visits counter.
		update_option( 'sg_security_total_blocked_visits', 0 );
		// Reset the total blocked logins counter.
		update_option( 'sg_security_total_blocked_logins', 0 );
	}

	/**
	 * Get notification receipient emails.
	 *
	 * @since  1.2.0
	 *
	 * @return Object $data Array Object with the list of emails set to receive notifications.
	 */
	public function weekly_report_receipients() {
		$data = array();

		// Get the currently set receipients.
		$receipients = get_option( 'sg_security_notification_emails', array() );

		// Return empty array if no receipients are set.
		if ( empty( $receipients ) ) {
			return $data;
		}

		// Convert the data to an email key array.
		foreach ( $receipients as $entry ) {
			$data[] = array( 'email' => $entry );
		}

		// Return the data.
		return $data;
	}
}
