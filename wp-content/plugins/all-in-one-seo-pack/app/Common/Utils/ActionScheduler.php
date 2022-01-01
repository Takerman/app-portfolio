<?php
namespace AIOSEO\Plugin\Common\Utils;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * This class makes sure the action scheduler tables always exist.
 *
 * @since 4.0.0
 */
class ActionScheduler extends \ActionScheduler_ListTable {
	/**
	 * Class Constructor.
	 *
	 * @since 4.0.0
	 *
	 * @param $store
	 * @param $logger
	 * @param $runner
	 */
	public function __construct( $store, $logger, $runner ) {
		global $wpdb;
		if (
				(
					is_a( $store, 'ActionScheduler_HybridStore' ) ||
					is_a( $store, 'ActionScheduler_DBStore' )
				) &&
				apply_filters( 'action_scheduler_enable_recreate_data_store', true ) &&
				method_exists( get_parent_class( $this ), 'recreate_tables' )
			) {
			$tableList = [
				'actionscheduler_actions',
				'actionscheduler_logs',
				'actionscheduler_groups',
				'actionscheduler_claims',
			];

			$foundTables = $wpdb->get_col( "SHOW TABLES LIKE '{$wpdb->prefix}actionscheduler%'" );
			foreach ( $tableList as $tableName ) {
				if ( ! in_array( $wpdb->prefix . $tableName, $foundTables, true ) ) {
					$this->recreate_tables();
					return;
				}
			}
		}

		add_action( 'action_scheduler_after_execute', [ $this, 'cleanup' ], 1000, 2 );
	}

	/**
	 * Cleans up the Action Scheduler tables after one of our actions completes.
	 *
	 * @since 4.0.10
	 *
	 * @return void
	 */
	public function cleanup( $actionId, $action ) {
		if (
			// Bail if this isn't one of our actions or if we're in a dev environment.
			'aioseo' !== $action->get_group() ||
			defined( 'AIOSEO_DEV_VERSION' ) ||
			// Bail if the tables don't exist.
			! aioseo()->db->tableExists( 'actionscheduler_actions' ) ||
			! aioseo()->db->tableExists( 'actionscheduler_groups' )
		) {
			return;
		}

		$prefix = aioseo()->db->db->prefix;

		// Clean up logs associated with entries in the actions table.
		aioseo()->db->execute(
			"DELETE al FROM {$prefix}actionscheduler_logs as al
			JOIN {$prefix}actionscheduler_actions as aa on `aa`.`action_id` = `al`.`action_id`
			JOIN {$prefix}actionscheduler_groups as ag on `ag`.`group_id` = `aa`.`group_id`
			WHERE `ag`.`slug` = 'aioseo'
			AND `aa`.`status` IN ('complete', 'failed', 'canceled');"
		);

		// Clean up actions.
		aioseo()->db->execute(
			"DELETE aa FROM {$prefix}actionscheduler_actions as aa
			JOIN {$prefix}actionscheduler_groups as ag on `ag`.`group_id` = `aa`.`group_id`
			WHERE `ag`.`slug` = 'aioseo'
			AND `aa`.`status` IN ('complete', 'failed', 'canceled');"
		);

		// Clean up logs where there was no group.
		aioseo()->db->execute(
			"DELETE al FROM {$prefix}actionscheduler_logs as al
			JOIN {$prefix}actionscheduler_actions as aa on `aa`.`action_id` = `al`.`action_id`
			WHERE `aa`.`hook` LIKE 'aioseo_%'
			AND `aa`.`group_id` = 0
			AND `aa`.`status` IN ('complete', 'failed', 'canceled');"
		);

		// Clean up actions that start with aioseo_ and have no group.
		aioseo()->db->execute(
			"DELETE aa FROM {$prefix}actionscheduler_actions as aa
			WHERE `aa`.`hook` LIKE 'aioseo_%'
			AND `aa`.`group_id` = 0
			AND `aa`.`status` IN ('complete', 'failed', 'canceled');"
		);

		// Clean up orphaned log files. @TODO: Look at adding this back in, however it was causing errors with the number of locks exceeding the lock table size.
		// aioseo()->db->execute(
		//  "DELETE al FROM {$prefix}actionscheduler_logs as al
		//  LEFT JOIN {$prefix}actionscheduler_actions as aa on `aa`.`action_id` = `al`.`action_id`
		//  WHERE `aa`.`action_id` IS NULL
		//  LIMIT 100000;"
		// );
	}
}