<?php
namespace SiteGround_Optimizer\Loader;

use SiteGround_Optimizer;
use SiteGround_Optimizer\Options\Options;
use SiteGround_Optimizer\Helper\Helper;
use SiteGround_Optimizer\Helper\Factory_Trait;
use SiteGround_Optimizer\Install_Service\Install_6_0_0;
/**
 * Loader functions and main initialization class.
 */
class Loader {
	use Factory_Trait;
	/**
	 * Configuration map array
	 *
	 * @var array
	 */
	public $configuration_map = array(
		'builder_check' => array(
			'emojis_removal' => 'emojis_removal',
			'lazy_load'      => 'lazy_load',
			'minifier'       => 'minifier',
			'parser'         => 'parser',
		),
		'default_hooks' => array(
			'helper'                 => 'helper',
			'i18n'                   => 'i18n',
			'install_service'        => 'install_service',
			'modules'                => 'modules',
			'admin'                  => 'admin',
			'admin_bar'              => 'admin',
			'rest'                   => 'rest',
			'memcache'               => 'memcache',
			'front_end_optimization' => 'front_end_optimization',
			'images_optimizer'       => 'images_optimizer',
			'images_optimizer_webp'  => 'images_optimizer',
			'cli'                    => 'cli',
			'config'                 => 'config',
			'heartbeat_control'      => 'heartbeat_control',
			'cloudflare'             => 'DNS',
			'database_optimizer'     => 'database_optimizer',
			'supercacher'            => 'supercacher',
			'supercacher_helper'     => 'supercacher',
			'ssl'                    => 'ssl',
		),
	);
	/**
	 * Create a new helper.
	 */
	public function __construct() {
		$this->load_dependencies();
		$this->add_hooks();
	}

	/**
	 * Load the main plugin dependencies.
	 *
	 * @since  5.9.0
	 */
	public function load_dependencies() {
		foreach ( $this->configuration_map as $configuration ) {
			foreach ( $configuration as $class => $namespace ) {
				$this->factory( $namespace, $class );
			}
		}
	}

	/**
	 * Add the hooks that the plugin will use to do the magic.
	 *
	 * @since 5.9.0
	 */
	public function add_hooks() {
		// Loop trough configuration map.
		foreach ( $this->configuration_map as $configuration => $classes ) {
			// Check if we need to fire the hooks.
			foreach ( $classes as $classname => $namespace ) {

				// Bail if we are on a builder page and hooks should not be fired.
				if (
					'builder_check' === $configuration &&
					( is_admin() || Helper::check_for_builders() )
				) {
					continue;
				}

				// Add the hooks.
				call_user_func( array( $this, 'add_' . $classname . '_hooks' ) );
			}
		}
	}

	/**
	 * Add helper hooks.
	 *
	 * @since 5.9.0
	 */
	public function add_helper_hooks() {
		// Check if plugin is installed.
		add_action( 'plugins_loaded', array( $this->helper, 'is_plugin_installed' ) );
		// Hide warnings in rest api.
		add_action( 'init', array( $this->helper, 'hide_warnings_in_rest_api' ) );
		// Remove the https module from Site Heatlh, because our plugin provide the same functionality.
		add_filter( 'site_status_tests', array( $this->helper, 'sitehealth_remove_https_status' ) );
	}

	/**
	 * Add localization hooks.
	 *
	 * @since 5.9.0
	 */
	public function add_i18n_hooks() {
		// Load the plugin textdomain.
		add_action( 'after_setup_theme', array( $this->i18n, 'load_textdomain' ), 9999 );
		// Generate JSON translations.
		add_action( 'upgrader_process_complete', array( $this->i18n, 'update_json_translations' ), 10, 2 );
	}

	/**
	 * Add the install service hooks.
	 *
	 * @since 5.9.0
	 */
	public function add_install_service_hooks() {
		// Add the install action.
		add_action( 'upgrader_process_complete', array( $this->install_service, 'install' ) );

		$install_6_0_0 = new Install_6_0_0();

		if ( version_compare( '6.0.0', get_option( 'siteground_optimizer_version', '0.0.0' ), '>' ) ) {
			$install_6_0_0->install();
			update_option( 'siteground_optimizer_version', '6.0.0' );
		}
	}

	/**
	 * Add Admin bar hooks.
	 *
	 * @since 5.9.0
	 */
	public function add_admin_bar_hooks() {
		// Adds a purge buttion in the admin bar menu.
		add_action( 'admin_bar_menu', array( $this->admin_bar, 'add_admin_bar_purge' ), PHP_INT_MAX );
		// Purges the cache and redirects to referrer (admin bar button).
		add_action( 'wp_ajax_admin_bar_purge_cache', array( $this->admin_bar, 'purge_cache' ) );
	}
	/**
	 * Add admin hooks.
	 *
	 * @since 5.9.0
	 */
	public function add_admin_hooks() {
		// Bail if there is nothing to display.
		if ( empty( $this->modules->get_active_tabs() ) ) {
			return;
		}

		if ( is_network_admin() ) {
			// Register the top level page into the WordPress admin menu.
			add_action( 'network_admin_menu', array( $this->admin, 'add_plugin_pages' ) );
		}

		// Register the stylesheets for the admin area.
		add_action( 'admin_enqueue_scripts', array( $this->admin, 'enqueue_styles' ) );
		// Register the JavaScript for the admin area.
		add_action( 'admin_enqueue_scripts', array( $this->admin, 'enqueue_scripts' ) );
		// Add styles to WordPress admin head.
		add_action( 'admin_print_styles', array( $this->admin, 'admin_print_styles' ) );
		// Hide all errors and notices on our custom dashboard.
		add_action( 'admin_init', array( $this->admin, 'hide_errors_and_notices' ), PHP_INT_MAX );

		if ( ! $this->admin->is_multisite_without_permissions() ) {
			// Register the top level page into the WordPress admin menu.
			add_action( 'admin_menu', array( $this->admin, 'add_plugin_pages' ) );
			// add_action( 'admin_notices', array( $this->admin, 'memcache_notice' ) );
			// Reorder the submenu.
			add_filter( 'custom_menu_order', array( $this->admin, 'reorder_submenu_pages' ) );
			// Hide the global memcache notice.
			add_action( 'wp_ajax_dismiss_memcache_notice', array( $this->admin, 'hide_memcache_notice' ) );
			// Hide the global blocking plugins notice.
			add_action( 'wp_ajax_dismiss_blocking_plugins_notice', array( $this->admin, 'hide_blocking_plugins_notice' ) );
			// Hide the global cache plugins notice.
			add_action( 'wp_ajax_dismiss_cache_plugins_notice', array( $this->admin, 'hide_cache_plugins_notice' ) );
		}
	}

	/**
	 * Add modules hooks.
	 *
	 * @since 5.9.0
	 */
	public function add_modules_hooks() {
		// Display notice for blocking plugins.
		add_action( 'admin_notices', array( $this->modules, 'blocking_plugins_notice' ) );
		// Display notice for cache plugins.
		add_action( 'admin_notices', array( $this->modules, 'cache_plugins_notice' ) );
		add_action( 'network_admin_notices', array( $this->modules, 'cache_plugins_notice' ) );
		// Display notice for blocking plugins.
		add_action( 'network_admin_notices', array( $this->modules, 'blocking_plugins_notice' ) );
		// Check if the current domain has cloudflare.
		add_action( 'wp_login', array( $this->modules, 'has_cloudflare' ), 1 );

		// Disable certain modules if there are conflicting plugins installed.
		if ( 1 === (int) get_option( 'disable_conflicting_modules', 0 ) ) {
			add_action( 'plugins_loaded', array( $this->modules, 'disable_modules' ) );
		}
	}

	/**
	 * Add Rest Hooks.
	 *
	 * @since 5.9.0
	 */
	public function add_rest_hooks() {
		// Register rest routes.
		add_action( 'rest_api_init', array( $this->rest, 'register_rest_routes' ) );
	}

	/**
	 * Add Memcache hooks.
	 *
	 * @since 5.9.0
	 */
	public function add_memcache_hooks() {
		// Bail if the memcached is not enabled.
		if ( ! Options::is_enabled( 'siteground_optimizer_enable_memcached' ) ) {
			return;
		}

		if ( ! defined( 'WP_CLI' ) ) {
			// Check if the memcache connection is working and reinitialize the dropin if not.
			add_action( 'load-toplevel_page_sg-cachepress', array( $this->memcache, 'status_healthcheck' ) );
		}

		// Prepare memcache excludes.
		add_action( 'admin_init', array( $this->memcache, 'prepare_memcache_excludes' ) );

		// Check if there are any options that should be excluded from the memcache.
		add_filter( 'pre_cache_alloptions', array( $this->memcache, 'maybe_exclude' ) );
	}

	/**
	 * Add front end optimizations hooks.
	 *
	 * @since 5.9.0
	 */
	public function add_front_end_optimization_hooks() {
		// Check the size of the assets dir.
		add_action( 'siteground_optimizer_check_assets_dir', array( $this->front_end_optimization, 'check_assets_dir' ) );

		// Schedule a cron job that will check for too big assets dir.
		if ( ! wp_next_scheduled( 'siteground_optimizer_check_assets_dir' ) ) {
			wp_schedule_event( time(), 'daily', 'siteground_optimizer_check_assets_dir' );
		}

		// Bail if is admin page and any builders are enabled.
		if (
			is_admin() ||
			Helper::check_for_builders()
		) {
			return;
		}

		// Remove query strings only if the option is emabled.
		if ( Options::is_enabled( 'siteground_optimizer_remove_query_strings' ) ) {
			// Filters for static style and script loaders.
			add_filter( 'style_loader_src', array( $this->front_end_optimization, 'remove_query_strings' ) );
			add_filter( 'script_loader_src', array( $this->front_end_optimization, 'remove_query_strings' ) );
		}

		// Enabled async load js files.
		if ( Options::is_enabled( 'siteground_optimizer_optimize_javascript_async' ) ) {
			// Prepare scripts to be included async.
			add_action( 'wp_print_scripts', array( $this->front_end_optimization, 'prepare_scripts_for_async_load' ), PHP_INT_MAX );

			// Add async attr to all scripts.
			add_filter( 'script_loader_tag', array( $this->front_end_optimization, 'add_async_attribute' ), 10, 3 );
		}
	}

	/**
	 * Add emojis removal hooks.
	 *
	 * @since 5.9.0
	 */
	public function add_emojis_removal_hooks() {
		// Chech if option is enabled.
		if ( Options::is_enabled( 'siteground_optimizer_disable_emojis' ) ) {
			// Disable the emojis.
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );
			remove_action( 'admin_print_styles', 'print_emoji_styles' );
			remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
			remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
			remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
			add_filter( 'tiny_mce_plugins', array( $this->emojis_removal, 'disable_emojis_tinymce' ) );
			add_filter( 'wp_resource_hints', array( $this->emojis_removal, 'disable_emojis_remove_dns_prefetch' ), 10, 2 );
		}
	}

	/**
	 * Add main lazy-load class hooks.
	 *
	 * @since 5.9.0
	 */
	public function add_lazy_load_hooks() {
		// Bail if lazy-load is not enabled.
		if ( ! Options::is_enabled( 'siteground_optimizer_lazyload_images' ) ) {
			return;
		}

		// Get the excluded media types.
		$excluded_types = get_option( 'siteground_optimizer_excluded_lazy_load_media_types', array() );

		// Bail if the current browser runs on a mobile device and the lazy-load on mobile is deactivated.
		if (
			Helper::is_mobile() &&
			in_array( 'lazyload_mobile', $excluded_types )
		) {
			return;
		}

		// Disable the native lazyloading.
		add_filter( 'wp_lazy_loading_enabled', '__return_false' );

		// Set priority.
		$priority = in_array( 'lazyload_shortcodes', $excluded_types ) ? 10 : 9999;

		// Loop all children.
		foreach ( $this->lazy_load->children as $child_name => $child ) {
			// Loop trough all options.
			foreach ( $child as $attriutes ) {

				// Continue if option is in the exclude list.
				if ( in_array( $child_name, $excluded_types ) ) {
					continue;
				}

				// Add the options hooks and child.
				add_filter( $attriutes['hook'], array( $this->lazy_load->$child_name, 'filter_html' ), $priority );
			}
		}

		// Enqueue scripts and styles.
		add_action( 'wp_enqueue_scripts', array( $this->lazy_load, 'load_scripts' ) );
	}

	/**
	 * Minifier hooks.
	 *
	 * @since 5.9.0
	 */
	public function add_minifier_hooks() {
		if ( Options::is_enabled( 'siteground_optimizer_optimize_javascript' ) ) {
			// Minify the js files.
			add_action( 'wp_print_scripts', array( $this->minifier, 'minify_scripts' ), 20 );
			add_action( 'wp_print_footer_scripts', array( $this->minifier, 'minify_scripts' ) );
		}

		if ( Options::is_enabled( 'siteground_optimizer_optimize_css' ) ) {
			// Minify the css files.
			add_action( 'wp_print_styles', array( $this->minifier, 'minify_styles' ), 11 );
			add_action( 'wp_print_footer_scripts', array( $this->minifier, 'minify_styles' ), 11 );
		}
	}

	/**
	 * Add Parser hooks.
	 *
	 * @since 5.9.0
	 */
	public function add_parser_hooks() {
		// Bail if wp cli is defined.
		if ( defined( 'WP_CLI' ) ) {
			return;
		}

		// Check if any of the specific option is enabled and add the parser hooks.
		if (
			Options::is_enabled( 'siteground_optimizer_optimize_html' ) ||
			Options::is_enabled( 'siteground_optimizer_combine_css' ) ||
			Options::is_enabled( 'siteground_optimizer_combine_javascript' ) ||
			Options::is_enabled( 'siteground_optimizer_optimize_web_fonts' ) ||
			Options::is_enabled( 'siteground_optimizer_dns_prefetch' ) ||
			! empty( get_option( 'siteground_optimizer_dns_prefetch_urls', false ) ) ||
			Options::is_enabled( 'siteground_optimizer_fix_insecure_content' )
		) {
			// Add the hooks that we will use to parse the content.
			add_action( 'init', array( $this->parser, 'start_bufffer' ) );
			add_action( 'shutdown', array( $this->parser, 'end_buffer' ) );
		}
	}

	/**
	 * Add images optimization hooks.
	 *
	 * @since 5.9.0
	 */
	public function add_images_optimizer_hooks() {

		add_action( 'wp_ajax_siteground_optimizer_start_image_optimization', array( $this->images_optimizer, 'start_optimization' ) );
		add_action( 'wp_ajax_nopriv_siteground_optimizer_start_image_optimization', array( $this->images_optimizer, 'start_optimization' ) );
		add_action( 'siteground_optimizer_start_image_optimization_cron', array( $this->images_optimizer, 'start_optimization' ) );

		// Resize newly uploaded images.
		if ( Options::is_enabled( 'siteground_optimizer_resize_images' ) ) {
			add_action( 'wp_generate_attachment_metadata', array( $this->images_optimizer, 'resize' ) );
		}

		// Optimize newly uploaded images.
		if (
			0 !== get_option( 'siteground_optimizer_compression_level', 0 ) &&
			0 === Helper::is_cron_disabled()
		) {
			add_action( 'delete_attachment', array( $this->images_optimizer, 'delete_backups' ) );
			add_action( 'wp_generate_attachment_metadata', array( $this->images_optimizer, 'optimize_new_image' ), 10, 2 );
		} else {
			add_action( 'wp_generate_attachment_metadata', array( $this->images_optimizer, 'maybe_update_total_unoptimized_images' ) );
		}
	}

	/**
	 * Add webp images optimization hooks.
	 *
	 * @since 5.9.0
	 */
	public function add_images_optimizer_webp_hooks() {

		add_action( 'wp_ajax_siteground_optimizer_start_webp_conversion', array( $this->images_optimizer_webp, 'start_optimization' ) );
		add_action( 'siteground_optimizer_start_webp_conversion_cron', array( $this->images_optimizer_webp, 'start_optimization' ) );

		// Optimize newly uploaded images.
		if (
			Options::is_enabled( 'siteground_optimizer_webp_support' ) &&
			0 === Helper::is_cron_disabled()
		) {
			add_action( 'delete_attachment', array( $this->images_optimizer_webp, 'delete_webp_copy' ) );
			add_action( 'edit_attachment', array( $this->images_optimizer_webp, 'regenerate_webp_copy' ) );
			add_action( 'wp_generate_attachment_metadata', array( $this->images_optimizer_webp, 'optimize_new_image' ), 10, 2 );
		} else {
			add_action( 'wp_generate_attachment_metadata', array( $this->images_optimizer_webp, 'maybe_update_total_unoptimized_images' ) );
		}
	}

	/**
	 * Add WP-CLI hooks.
	 *
	 * @since 5.9.0
	 */
	public function add_cli_hooks() {
		// If we're in `WP_CLI` load the related files.
		if ( class_exists( 'WP_CLI' ) ) {
			add_action( 'init', array( $this->cli, 'register_commands' ) );
		}
	}

	/**
	 * Add config hooks.
	 *
	 * @since 5.9.0
	 */
	public function add_config_hooks() {
		add_action( 'wp_login', array( $this->config, 'update_config' ) );
	}

	/**
	 * Add heartbeat control hooks.
	 *
	 * @since 5.9.0
	 */
	public function add_heartbeat_control_hooks() {
		if ( @strpos( $_SERVER['REQUEST_URI'], '/wp-admin/admin-ajax.php' ) ) { // phpcs:ignore
			return;
		}

		add_action( 'admin_enqueue_scripts', array( $this->heartbeat_control, 'maybe_disable' ), 99 );
		add_action( 'wp_enqueue_scripts', array( $this->heartbeat_control, 'maybe_disable' ), 99 );
		add_filter( 'heartbeat_settings', array( $this->heartbeat_control, 'maybe_modify' ), 99 );
	}

	/**
	 * Add cloudflare hooks.
	 *
	 * @since 5.9.0
	 */
	public function add_cloudflare_hooks() {
		if ( ! Options::is_enabled( 'siteground_optimizer_cloudflare_optimization_status' ) ) {
			return;
		}

		add_action( 'send_headers', array( $this->cloudflare, 'add_headers' ), PHP_INT_MAX );
		add_action( 'template_redirect', array( $this->cloudflare, 'add_headers' ) );
	}

	/**
	 * Add database optimizer hooks.
	 *
	 * @since 5.9.0
	 */
	public function add_database_optimizer_hooks() {
		// Add action for cron-job.
		add_action( 'siteground_optimizer_database_optimization_cron', array( $this->database_optimizer, 'optimize_database' ) );
	}

	/**
	 * Add Supercacher hooks.
	 *
	 * @since 5.9.0
	 *
	 * @throws \Exception Exception If the type is not supported.
	 */
	public function add_supercacher_hooks() {
		add_action( 'siteground_optimizer_purge_cron_cache', array( $this->supercacher, 'purge_cache' ), 11 );
		add_action( 'update_option_siteground_optimizer_combine_css', array( $this->supercacher, 'delete_assets' ), 10, 0 );

		// Bail if Dynamic cache or Autoflush is disabled.
		if (
			! Options::is_enabled( 'siteground_optimizer_enable_cache' ) ||
			! Options::is_enabled( 'siteground_optimizer_autoflush_cache' )
		) {
			return;
		}

		foreach ( $this->supercacher->purge_hooks as $callback => $hooks ) {
			foreach ( $hooks as $hook ) {
				add_action( $hook, array( $this->supercacher, $callback ), PHP_INT_MAX );
			}
		}

		add_action( 'pll_save_post', array( $this->supercacher, 'flush_memcache' ) );

		$this->supercacher->purge_on_other_events();
		$this->supercacher->purge_on_options_save();

		// Loop all children.
		foreach ( $this->supercacher->children as $child_name => $child ) {
			// Loop trough all options.
			foreach ( $child as $attriutes ) {

				if ( array_key_exists( 'priority', $attriutes ) ) {
					// Add the action.
					add_action( $attriutes['hook'], array( $this->supercacher->$child_name, $attriutes['option'] ), $attriutes['priority'] );
					continue;
				}

				add_action( $attriutes['hook'], array( $this->supercacher->$child_name, $attriutes['option'] ) );

			}
		}
	}

	/**
	 * Add supercacher helper hooks.
	 *
	 * @since 5.9.0
	 */
	public function add_supercacher_helper_hooks() {
		// Set headers cookie.
		add_action( 'wp_headers', array( $this->supercacher_helper, 'set_cache_headers' ) );
		// Set the bypass cookie.
		add_action( 'wp_login', array( $this->supercacher_helper, 'set_bypass_cookie' ), 1 );
		// Remove the bypass cookie set on login.
		add_action( 'wp_logout', array( $this->supercacher_helper, 'remove_bypass_cookie' ) );
	}

	/**
	 * Add ssl hooks.
	 *
	 * @since 5.9.8
	 */
	public function add_ssl_hooks() {
		add_action( 'update_option_siteurl', array( $this->ssl, 'maybe_switch_rules' ), 10, 2 );

		if ( ! is_multisite() ) {
			add_action( 'wp_login', array( $this->ssl, 'maybe_switch_option' ), 1 );
		}
	}
}
