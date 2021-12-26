<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$shortcodes_extension = fw_ext( 'shortcodes' );

wp_enqueue_style(
	'fw-shortcode-calendar-bootstrap3',
	$shortcodes_extension->get_declared_URI( '/shortcodes/calendar/static/libs/bootstrap3/css/bootstrap-grid.css' )
);
wp_enqueue_style(
	'fw-shortcode-calendar-calendar',
	fw_get_template_customizations_directory_uri(
        '/extensions/shortcodes/shortcodes/calendar/static/css/calendar.css'
    )
);

$theme_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('theme_style_picker') :  'light';

if ($theme_style == 'dark'){
	wp_enqueue_style(
		'fw-shortcode-calendar-calendar-dark',
		fw_get_template_customizations_directory_uri(
	        '/extensions/shortcodes/shortcodes/calendar/static/css/calendar-dark.css'
	    )
	);
}

wp_enqueue_style(
	'fw-shortcode-calendar',
	fw_get_template_customizations_directory_uri(
        '/extensions/shortcodes/shortcodes/calendar/static/css/styles.css'
    )
);


wp_enqueue_script(
	'fw-shortcode-calendar-bootstrap3',
	$shortcodes_extension->get_declared_URI( '/shortcodes/calendar/static/libs/bootstrap3/js/bootstrap.min.js' ),
	array( 'jquery', 'underscore' ),
	fw()->manifest->get_version(),
	true
);
wp_enqueue_script(
	'fw-shortcode-calendar-timezone',
	$shortcodes_extension->get_declared_URI( '/shortcodes/calendar/static/libs/jstimezonedetect/jstz.min.js' ),
	array( 'jquery', 'underscore' ),
	fw()->manifest->get_version(),
	true
);
wp_enqueue_script(
	'fw-shortcode-calendar-calendar',
	$shortcodes_extension->get_declared_URI( '/shortcodes/calendar/static/js/calendar.js' ),
	array( 'jquery', 'underscore', 'fw-shortcode-calendar-bootstrap3', 'fw-shortcode-calendar-timezone' ),
	fw()->manifest->get_version(),
	true
);
wp_enqueue_script(
	'fw-shortcode-calendar',
	$shortcodes_extension->get_declared_URI( '/shortcodes/calendar/static/js/scripts.js' ),
	array( 'jquery', 'underscore', 'fw-shortcode-calendar-calendar' ),
	fw()->manifest->get_version(),
	true
);

$locale = get_locale();
wp_localize_script(
	'fw-shortcode-calendar',
	'fwShortcodeCalendarLocalize',
	array(
		'event'  => __( 'Event', 'kerge' ),
		'events' => __( 'Events', 'kerge' ),
		'today'  => __( 'Today', 'kerge' ),
		'locale' => $locale
	)
);
wp_localize_script(
	'fw-shortcode-calendar',
	'calendar_languages',
	array(
		$locale => array(
			'error_noview'     => sprintf( __( 'Calendar: View %s not found', 'kerge' ), '{0}' ),
			'error_dateformat' => sprintf( __( 'Calendar: Wrong date format %s. Should be either "now" or "yyyy-mm-dd"',
					'kerge' ), '{0}' ),
			'error_loadurl'    => __( 'Calendar: Event URL is not set', 'kerge' ),
			'error_where'      => sprintf( __( 'Calendar: Wrong navigation direction %s. Can be only "next" or "prev" or "today"',
					'kerge' ), '{0}' ),
			'error_timedevide' => __( 'Calendar: Time split parameter should divide 60 without decimals. Something like 10, 15, 30',
				'kerge' ),
			'no_events_in_day' => __( 'No events in this day.', 'kerge' ),
			'title_year'       => '{0}',
			'title_month'      => '{0} {1}',
			'title_week'       => sprintf( __( 'week %s of %s', 'kerge' ), '{0}', '{1}' ),
			'title_day'        => '{0} {1} {2}, {3}',
			'week'             => __( 'Week ', 'kerge' ) . '{0}',
			'all_day'          => __( 'All day', 'kerge' ),
			'time'             => __( 'Time', 'kerge' ),
			'events'           => __( 'Events', 'kerge' ),
			'before_time'      => __( 'Ends before timeline', 'kerge' ),
			'after_time'       => __( 'Starts after timeline', 'kerge' ),
			'm0'               => __( 'January', 'kerge' ),
			'm1'               => __( 'February', 'kerge' ),
			'm2'               => __( 'March', 'kerge' ),
			'm3'               => __( 'April', 'kerge' ),
			'm4'               => __( 'May', 'kerge' ),
			'm5'               => __( 'June', 'kerge' ),
			'm6'               => __( 'July', 'kerge' ),
			'm7'               => __( 'August', 'kerge' ),
			'm8'               => __( 'September', 'kerge' ),
			'm9'               => __( 'October', 'kerge' ),
			'm10'              => __( 'November', 'kerge' ),
			'm11'              => __( 'December', 'kerge' ),
			'ms0'              => __( 'Jan', 'kerge' ),
			'ms1'              => __( 'Feb', 'kerge' ),
			'ms2'              => __( 'Mar', 'kerge' ),
			'ms3'              => __( 'Apr', 'kerge' ),
			'ms4'              => __( 'May', 'kerge' ),
			'ms5'              => __( 'Jun', 'kerge' ),
			'ms6'              => __( 'Jul', 'kerge' ),
			'ms7'              => __( 'Aug', 'kerge' ),
			'ms8'              => __( 'Sep', 'kerge' ),
			'ms9'              => __( 'Oct', 'kerge' ),
			'ms10'             => __( 'Nov', 'kerge' ),
			'ms11'             => __( 'Dec', 'kerge' ),
			'd0'               => __( 'Sunday', 'kerge' ),
			'd1'               => __( 'Monday', 'kerge' ),
			'd2'               => __( 'Tuesday', 'kerge' ),
			'd3'               => __( 'Wednesday', 'kerge' ),
			'd4'               => __( 'Thursday', 'kerge' ),
			'd5'               => __( 'Friday', 'kerge' ),
			'd6'               => __( 'Saturday', 'kerge' ),
		)
	)
);
