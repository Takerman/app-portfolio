<?php
namespace AIOSEO\Plugin\Common\Admin\Integrations;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Integrate our SEO Panel with Divi Page Builder.
 *
 * @since 4.1.7
 */
class Divi extends Integration {
	/**
	 * The theme name.
	 *
	 * @since 4.1.7
	 *
	 * @var array
	 */
	public $themes = [ 'Divi' ];

	/**
	 * The integration slug.
	 *
	 * @since 4.1.7
	 *
	 * @var string
	 */
	public $integrationSlug = 'divi';

	/**
	 * Init the integration.
	 *
	 * @since 4.1.7
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'wp', [ $this, 'maybeRun' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueueAdmin' ] );
	}

	/**
	 * Check if we are in the Page Builder and run the integrations.
	 *
	 * @since 4.1.7
	 *
	 * @return void
	 */
	public function maybeRun() {
		$postType = get_post_type( $this->getPostId() );

		if (
			! defined( 'ET_BUILDER_PRODUCT_VERSION' ) ||
			! version_compare( '4.9.2', ET_BUILDER_PRODUCT_VERSION, '<=' ) ||
			! ( function_exists( 'et_core_is_fb_enabled' ) && et_core_is_fb_enabled() ) ||
			! aioseo()->postSettings->canAddPostSettingsMetabox( $postType )
		) {
			return;
		}

		add_action( 'wp_footer', [ $this, 'addContainers' ] );
		add_action( 'wp_footer', [ $this, 'addIframeWatcher' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ] );
		add_filter( 'script_loader_tag', [ $this, 'addEtTag' ], 10, 3 );
	}

	/**
	 * Enqueue the required scripts for the admin screen.
	 *
	 * @since 4.1.7
	 *
	 * @return void
	 */
	public function enqueueAdmin() {
		if ( ! aioseo()->helpers->isScreenBase( 'toplevel_page_et_divi_options' ) ) {
			return;
		}

		aioseo()->helpers->enqueueChunkedAssets( $this->integrationSlug );
		aioseo()->helpers->enqueueScript(
			'aioseo-' . $this->integrationSlug . '-admin',
			'js/divi-admin.js'
		);

		wp_localize_script(
			'aioseo-' . $this->integrationSlug . '-admin',
			'aioseo',
			aioseo()->helpers->getVueData()
		);

		wp_localize_script(
			'aioseo-' . $this->integrationSlug . '-admin',
			'aioseoTranslations',
			[
				'translations' => aioseo()->helpers->getJedLocaleData( 'all-in-one-seo-pack' )
			]
		);

		// Styles.
		$rtl = is_rtl() ? '.rtl' : '';
		aioseo()->helpers->enqueueStyle(
			'aioseo-' . $this->integrationSlug . '-integration-divi-admin',
			"css/divi-admin$rtl.css"
		);
	}

	/**
	 * Add et attributes to script tags.
	 *
	 * @since 4.1.7
	 *
	 * @param  string $tag    The <script> tag for the enqueued script.
	 * @param  string $handle The script's registered handle.
	 * @param  string $src    The script's source URL.
	 * @return string         The tag.
	 */
	public function addEtTag( $tag, $handle, $src ) {
		$scriptHandles = [
			'aioseo-divi',
			'aioseo-vendors',
			'aioseo-common',
		];

		if ( in_array( $handle, $scriptHandles, true ) ) {
			// These tags load in parent window only, not in Divi iframe.
			return '<script type="text/javascript" src="' . $src . '" class="et_fb_ignore_iframe"></script>' . "\n";
		}

		return $tag;
	}

	/**
	 * Add the Divi watcher.
	 *
	 * @since 4.1.7
	 *
	 * @return void
	 */
	public function addIframeWatcher() {
		?>
		<script type="text/javascript">
			if (typeof jQuery === 'function') {
				jQuery(window).on('et_builder_api_ready et_fb_section_content_change', function(event) {
					window.parent.postMessage({ eventType : event.type })
				})
			}
		</script>
		<?php
	}

	/**
	 * Add the containers to mount our panel.
	 *
	 * @since 4.1.7
	 *
	 * @return void
	 */
	public function addContainers() {
		echo '<div id="aioseo-app-modal" class="et_fb_ignore_iframe"><div class="et_fb_ignore_iframe"></div></div>';
		echo '<div id="aioseo-settings" class="et_fb_ignore_iframe"></div>';
	}

	/**
	 * Returns whether or not the given Post ID was built with Divi.
	 *
	 * @since 4.1.7
	 *
	 * @param  int $postId The Post ID.
	 * @return boolean     Whether or not the Post was built with Divi.
	 */
	public function isBuiltWith( $postId ) {
		if ( ! function_exists( 'et_pb_is_pagebuilder_used' ) ) {
			return false;
		}

		return et_pb_is_pagebuilder_used( $postId );
	}
}