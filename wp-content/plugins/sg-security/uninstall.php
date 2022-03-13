<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $wpdb;

// The plugin tables.
$tables = array(
	'sgs_log_visitors',
	'sgs_log_events',
);

// Loop through all tables and delete them.
foreach ( $tables as $table ) {
	$wpdb->query( // phpcs:ignore
		'DROP TABLE IF EXISTS ' . $wpdb->dbname . '.' . $wpdb->prefix . $table // phpcs:ignore
	);
}

if ( file_exists( WP_PLUGIN_DIR . '/sg-cachepress/sg-cachepress.php' ) ) {
	return;
}

require_once dirname( __FILE__ ) . '/vendor/siteground/siteground-data/src/Settings.php';

use SiteGround_Data\Settings;

$settings = new Settings();

$settings->stop_collecting_data();
