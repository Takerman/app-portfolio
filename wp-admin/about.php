<?php
/**
 * About This Version administration panel.
 *
 * @package WordPress
 * @subpackage Administration
 */

/** WordPress Administration Bootstrap */
require_once __DIR__ . '/admin.php';

<<<<<<< HEAD
// Used in the HTML title tag.
=======
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
/* translators: Page title of the About WordPress page in the admin. */
$title = _x( 'About', 'page title' );

list( $display_version ) = explode( '-', get_bloginfo( 'version' ) );

require_once ABSPATH . 'wp-admin/admin-header.php';
?>
	<div class="wrap about__container">

		<div class="about__header">
			<div class="about__header-title">
				<h1>
					<?php _e( 'WordPress' ); ?>
<<<<<<< HEAD
					<span class="screen-reader-text"><?php echo $display_version; ?></span>
=======
					<?php echo $display_version; ?>
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
				</h1>
			</div>

			<div class="about__header-text">
<<<<<<< HEAD
				<?php _e( 'Build the site you&#8217;ve always wanted &#8212; with blocks' ); ?>
=======
				<?php _e( 'The next stop on the road to full site editing' ); ?>
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
			</div>

			<nav class="about__header-navigation nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu' ); ?>">
				<a href="about.php" class="nav-tab nav-tab-active" aria-current="page"><?php _e( 'What&#8217;s New' ); ?></a>
				<a href="credits.php" class="nav-tab"><?php _e( 'Credits' ); ?></a>
				<a href="freedoms.php" class="nav-tab"><?php _e( 'Freedoms' ); ?></a>
				<a href="privacy.php" class="nav-tab"><?php _e( 'Privacy' ); ?></a>
			</nav>
		</div>

<<<<<<< HEAD
=======
		<hr />

>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
		<div class="about__section changelog">
			<div class="column">
				<h2><?php _e( 'Maintenance and Security Releases' ); ?></h2>
				<p>
					<?php
					printf(
<<<<<<< HEAD
						/* translators: 1: WordPress version number, 2: Plural number of bugs. More than one security issue. */
						_n(
							'<strong>Version %1$s</strong> addressed some security issues and fixed %2$s bug.',
							'<strong>Version %1$s</strong> addressed some security issues and fixed %2$s bugs.',
							1
						),
						'5.9.2',
						number_format_i18n( 1 )
=======
						/* translators: 1: WordPress version number, 2: plural number of bugs. */
						_n(
							'<strong>Version %1$s</strong> addressed a security issue and fixed %2$s bug.',
							'<strong>Version %1$s</strong> addressed a security issue and fixed %2$s bugs.',
							2
						),
						'5.8.2',
						number_format_i18n( 2 )
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
					);
					?>
					<?php
					printf(
<<<<<<< HEAD
						/* translators: %s: HelpHub URL. */
						__( 'For more information, see <a href="%s">the release notes</a>.' ),
						sprintf(
							/* translators: %s: WordPress version. */
							esc_url( __( 'https://wordpress.org/support/wordpress-version/version-%s/' ) ),
							sanitize_title( '5.9.2' )
=======
						/* translators: %s: HelpHub URL */
						__( 'For more information, see <a href="%s">the release notes</a>.' ),
						sprintf(
							/* translators: %s: WordPress version */
							esc_url( __( 'https://wordpress.org/support/wordpress-version/version-%s/' ) ),
							sanitize_title( '5.8.2' )
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
						)
					);
					?>
				</p>
				<p>
					<?php
					printf(
						/* translators: 1: WordPress version number, 2: plural number of bugs. */
						_n(
<<<<<<< HEAD
							'<strong>Version %1$s</strong> addressed %2$s bug.',
							'<strong>Version %1$s</strong> addressed %2$s bugs.',
							82
						),
						'5.9.1',
						number_format_i18n( 82 )
=======
							'<strong>Version %1$s</strong> addressed a security issue and fixed %2$s bug.',
							'<strong>Version %1$s</strong> addressed a security issue and fixed %2$s bugs.',
							60
						),
						'5.8.1',
						number_format_i18n( 60 )
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
					);
					?>
					<?php
					printf(
<<<<<<< HEAD
						/* translators: %s: HelpHub URL. */
						__( 'For more information, see <a href="%s">the release notes</a>.' ),
						sprintf(
							/* translators: %s: WordPress version. */
							esc_url( __( 'https://wordpress.org/support/wordpress-version/version-%s/' ) ),
							sanitize_title( '5.9.1' )
=======
						/* translators: %s: HelpHub URL */
						__( 'For more information, see <a href="%s">the release notes</a>.' ),
						sprintf(
							/* translators: %s: WordPress version */
							esc_url( __( 'https://wordpress.org/support/wordpress-version/version-%s/' ) ),
							sanitize_title( '5.8.1' )
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
						)
					);
					?>
				</p>
			</div>
		</div>

		<hr class="is-large" />

		<div class="about__section">
			<h2 class="aligncenter">
<<<<<<< HEAD
				<?php _e( 'Full Site Editing is here' ); ?>
			</h2>
			<p class="aligncenter is-subheading">
				<?php _e( 'It puts you in control of your whole site, right in the WordPress Admin.' ); ?>
			</p>
		</div>

		<hr />

		<div class="about__section has-2-columns has-gutters is-wider-left">
			<div class="column about__image is-vertically-aligned-center is-edge-to-edge">
				<img src="https://s.w.org/images/core/5.9/twenty-twenty-two.png" alt="" />
			</div>
			<div class="column is-edge-to-edge">
				<h3>
					<?php _e( 'Say hello to Twenty Twenty&#8209;Two' ); ?>
				</h3>
				<p>
					<?php _e( 'And say hello to the first default block theme in the history of WordPress. This is more than just a new default theme. It&#8217;s a brand-new way to work with WordPress themes.' ); ?>
				</p>
				<p>
					<?php _e( 'Block themes put a wide array of visual choices in your hands, from color schemes and typeface combinations to page templates and image filters &#8212; all together, in the site editing interface. By making changes in one place, you can give Twenty Twenty&#8209;Two the same look and feel as your brand or other websites &#8212; or take your site&#8217;s look in another direction.' ); ?>
				</p>
				<?php if ( current_user_can( 'switch_themes' ) ) : ?>
				<p>
					<?php
					printf(
						/* translators: %s: Link to Themes screen. */
						__( 'The Twenty Twenty&#8209;Two theme is already available to you. It came installed with WordPress 5.9, and you will find it with <a href="%s">your other installed themes</a>.' ),
						admin_url( 'themes.php' )
					);
					?>
				</p>
				<?php endif; ?>
			</div>
		</div>

		<div class="about__section has-2-columns has-gutters is-wider-right">
			<div class="column is-edge-to-edge">
				<h3>
					<?php _e( 'Your personal paintbox awaits' ); ?>
				</h3>
				<p>
					<?php _e( 'More block themes built for full site editing features are in the Theme Directory alongside the Twenty Twenty&#8209;Two theme, just waiting to be explored. Expect more to come!' ); ?>
				</p>
				<p>
					<?php _e( 'When you use any of those new themes, you no longer need the Customizer. Instead, you have all the power of the Styles interface inside the Site Editor. Just as in Twenty Twenty&#8209;Two, you build your site&#8217;s look and feel there, with the tools you need for the job in a fluid interface that practically comes alive in your hands.' ); ?>
				</p>
			</div>
			<div class="column about__image is-vertically-aligned-center is-edge-to-edge">
				<img src="https://s.w.org/images/core/5.9/global-styles.png" alt="" />
			</div>
		</div>

		<div class="about__section has-2-columns has-gutters is-wider-left">
			<div class="column about__image is-vertically-aligned-center is-edge-to-edge">
				<img src="https://s.w.org/images/core/5.9/navigation-block.png" alt="" />
			</div>
			<div class="column is-edge-to-edge">
				<h3>
					<?php _e( 'The Navigation block' ); ?>
				</h3>
				<p>
					<?php _e( 'Blocks come to site navigation, the heart of user experience.' ); ?>
				</p>
				<p>
					<?php _e( 'The new Navigation block gives you the power to choose: an always-on responsive menu or one that adapts to your user&#8217;s screen size. Whatever you create, know it&#8217;s there to reuse wherever you like, whether in a brand new template or after switching themes.' ); ?>
=======
				<?php _e( 'Three Essential Powerhouses' ); ?>
			</h2>
		</div>

		<div class="about__section has-2-columns is-wider-left">
			<div class="column about__image is-vertically-aligned-center">
				<img src="https://s.w.org/images/core/5.8/about-widgets-blocks.png" alt="" />
			</div>
			<div class="column">
				<h3>
					<?php _e( 'Manage Widgets with Blocks' ); ?>
				</h3>
				<p>
					<?php
					printf(
						/* translators: %s: Widgets dev note link. */
						__( 'After months of hard work, the power of blocks has come to both the Block Widgets Editor and the Customizer. Now you can add blocks both in widget areas across your site and with live preview through the Customizer. This opens up new possibilities to create content: from no-code mini layouts to the vast library of core and third-party blocks. For our developers, you can find more details in the <a href="%s">Widgets dev note</a>.' ),
						'https://make.wordpress.org/core/2021/06/29/block-based-widgets-editor-in-wordpress-5-8/'
					);
					?>
				</p>
			</div>
		</div>

		<div class="about__section has-2-columns is-wider-right">
			<div class="column">
				<h3>
					<?php _e( 'Display Posts with New Blocks and Patterns' ); ?>
				</h3>
				<p>
					<?php _e( 'The Query Loop Block makes it possible to display posts based on specified parameters; like a PHP loop without the code. Easily display posts from a specific category, to do things like create a portfolio or a page full of your favorite recipes. Think of it as a more complex and powerful Latest Posts Block! Plus, pattern suggestions make it easier than ever to create a list of posts with the design you want.' ); ?>
				</p>
			</div>
			<div class="column about__image is-vertically-aligned-center">
				<img src="https://s.w.org/images/core/5.8/about-query-loop.png" alt="" />
			</div>
		</div>

		<div class="about__section has-2-columns is-wider-left">
			<div class="column about__image is-vertically-aligned-center">
				<img src="https://s.w.org/images/core/5.8/about-template.png" alt="" />
			</div>
			<div class="column">
				<h3>
					<?php _e( 'Edit the Templates Around Posts' ); ?>
				</h3>
				<p>
					<?php
					_e( 'You can use the familiar block editor to edit templates that hold your content—simply activate a block theme or a theme that has opted in for this feature. Switch from editing your posts to editing your pages and back again, all while using a familiar block editor. There are more than 20 new blocks available within compatible themes. Read more about this feature and how to experiment with it in the release notes.' );
					?>
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
				</p>
			</div>
		</div>

		<hr class="is-large" />

		<div class="about__section">
			<h2 class="aligncenter">
<<<<<<< HEAD
				<?php _e( 'More improvements and updates' ); ?>
			</h2>
			<p class="aligncenter is-subheading">
				<?php _e( 'Do you love to blog or produce content? New tweaks to the publishing flow help you say more, faster.' ); ?>
			</p>
		</div>

		<hr />

		<div class="about__section has-2-columns has-gutters is-wider-left">
			<div class="column about__image is-vertically-aligned-center is-edge-to-edge">
				<img src="https://s.w.org/images/core/5.9/block-controls.png" alt="" />
			</div>
			<div class="column is-edge-to-edge">
				<h3>
					<?php _e( 'Better block controls' ); ?>
				</h3>
				<p>
					<?php _e( 'WordPress 5.9 features new typography tools, flexible layout controls, and finer control over details like spacing, borders, and more &#8212; to help you get not just the look, but the polish that says you care about details.' ); ?>
=======
				<?php _e( 'Three Workflow Helpers' ); ?>
			</h2>
		</div>

		<div class="about__section has-2-columns is-wider-left">
			<div class="column about__image is-vertically-aligned-center">
				<img src="https://s.w.org/images/core/5.8/about-list-view.png" alt="" />
			</div>
			<div class="column">
				<h3>
					<?php _e( 'Overview of the Page Structure' ); ?>
				</h3>
				<p>
					<?php
					_e( 'Sometimes you need a simple landing page, but sometimes you need something a little more robust. As blocks increase, patterns emerge, and content creation gets easier, new solutions are needed to make complex content easy to navigate. List View is the best way to jump between layers of content and nested blocks. Since the List View gives you an overview of all the blocks in your content, you can now navigate quickly to the precise block you need. Ready to focus completely on your content? Toggle it on or off to suit your workflow.' );
					?>
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
				</p>
			</div>
		</div>

<<<<<<< HEAD
		<div class="about__section has-2-columns has-gutters is-wider-right">
			<div class="column is-edge-to-edge">
				<h3>
					<?php _e( 'The power of patterns' ); ?>
				</h3>
				<p>
					<?php _e( 'The WordPress Pattern Directory is the home of a wide range of block patterns built to save you time and add core site functionality. And you can edit them as you see fit. Need something different in the header or footer for your theme? Swap it out with a new one in a few clicks.' ); ?>
				</p>
				<p>
					<?php _e( 'With a near full-screen view that draws you in to see fine details, the Pattern Explorer makes it easy to compare patterns and choose the one your users will expect.' ); ?>
				</p>
			</div>
			<div class="column about__image is-vertically-aligned-center is-edge-to-edge">
				<img src="https://s.w.org/images/core/5.9/pattern-explorer.png" alt="" />
			</div>
		</div>

		<div class="about__section has-2-columns has-gutters is-wider-left">
			<div class="column about__image is-vertically-aligned-center is-edge-to-edge">
				<img src="https://s.w.org/images/core/5.9/list-view.png" alt="" />
			</div>
			<div class="column is-edge-to-edge">
				<h3>
					<?php _e( 'A revamped List View' ); ?>
				</h3>
				<p>
					<?php _e( 'In 5.9, the List View lets you drag and drop your content exactly where you want it. Managing complex documents is easier, too: simple controls let you expand and collapse sections as you build your site &#8212; and add HTML anchors to your blocks to help users get around the page.' ); ?>
				</p>
			</div>
		</div>

		<div class="about__section has-2-columns has-gutters is-wider-right">
			<div class="column is-edge-to-edge">
				<h3>
					<?php _e( 'A better Gallery block' ); ?>
				</h3>
				<p>
					<?php _e( 'Treat every image in a Gallery block the same way you would treat it in the Image block.' ); ?>
				</p>
				<p>
					<?php _e( 'Style every image in your gallery differently from the next (with different crops, or duotones, for instance) or make them all the same. And change the layout with drag-and-drop.' ); ?>
				</p>
			</div>
			<div class="column about__image is-vertically-aligned-center is-edge-to-edge">
				<img src="https://s.w.org/images/core/5.9/gallery-block.png" alt="" />
			</div>
=======
		<div class="about__section has-2-columns is-wider-right">
			<div class="column">
				<h3>
					<?php _e( 'Suggested Patterns for Blocks' ); ?>
				</h3>
				<p>
					<?php
					_e( 'Starting in this release the Pattern Transformations tool will suggest block patterns based on the block you are using. Right now, you can give it a try in the Query Block and Social Icon Block. As more patterns are added, you will be able to get inspiration for how to style your site without ever leaving the editor!' );
					?>
				</p>
			</div>
			<div class="column about__image is-vertically-aligned-center">
				<img src="https://s.w.org/images/core/5.8/about-pattern-suggestions.png" alt="" />
			</div>
		</div>

		<div class="about__section has-2-columns is-wider-left">
			<div class="column about__image is-vertically-aligned-center">
				<img src="https://s.w.org/images/core/5.8/about-duotone.png" alt="" />
			</div>
			<div class="column">
				<h3>
					<?php _e( 'Style and Colorize Images' ); ?>
				</h3>
				<p>
					<?php
					_e( 'Colorize your image and cover blocks with duotone filters! Duotone can add a pop of color to your designs and style your images (or videos in the cover block) to integrate well with your themes. You can think of the duotone effect as a black and white filter, but instead of the shadows being black and the highlights being white, you pick your own colors for the shadows and highlights. There’s more to learn about how it works in the documentation.' );
					?>
				</p>
			</div>
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
		</div>

		<hr class="is-large" />

		<div class="about__section">
			<h2 class="aligncenter" style="margin-bottom:0;">
<<<<<<< HEAD
				<?php
				printf(
					/* translators: %s: Version number. */
					__( 'WordPress %s for developers' ),
					$display_version
				);
				?>
			</h2>
		</div>

		<div class="about__section has-gutters has-2-columns">
			<div class="column is-edge-to-edge">
				<h3>
					<?php _e( 'Introducing block themes' ); ?>
=======
				<?php _e( 'For Developers to Explore' ); ?>
			</h2>
			<div class="column about__image is-vertically-aligned-center">
				<picture>
					<source srcset="https://s.w.org/images/core/5.8/about-theme-json.png, https://s.w.org/images/core/5.8/about-theme-json-2x.png 2x" />
					<img src="https://s.w.org/images/core/5.8/about-theme-json.png" alt="" />
				</picture>
			</div>
		</div>

		<div class="about__section has-1-column">
			<div class="column">
				<h3>
					<?php _e( 'Theme.json' ); ?>
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
				</h3>
				<p>
					<?php
					printf(
<<<<<<< HEAD
						/* translators: %s: Block-based themes dev note link. */
						__( 'A new way to build themes: Block themes use blocks to define the templates that structure your entire site. The new templates and template parts are defined in HTML and use the custom styling offered in theme.json. More information is available in the <a href="%s">block themes dev note</a>.' ),
						'https://make.wordpress.org/core/2022/01/04/block-themes-a-new-way-to-build-themes-in-wordpress-5-9/'
=======
						/* translators: %s: Theme.json dev note link. */
						__( 'Introducing the Global Styles and Global Settings APIs: control the editor settings, available customization tools, and style blocks using a theme.json file in the active theme. This configuration file enables or disables features and sets default styles for both a website and blocks. If you build themes, you can experiment with this early iteration of a useful new feature. For more about what is currently available and how it works, <a href="%s">check out this dev note</a>.' ),
						'https://make.wordpress.org/core/2021/06/25/introducing-theme-json-in-wordpress-5-8/'
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
					);
					?>
				</p>
			</div>
<<<<<<< HEAD
			<div class="column is-edge-to-edge">
				<h3>
					<?php _e( 'Multiple stylesheets for a block' ); ?>
=======
		</div>

		<div class="about__section has-3-columns">
			<div class="column">
				<h3>
					<?php _e( 'Dropping support for Internet Explorer 11' ); ?>
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
				</h3>
				<p>
					<?php
					printf(
<<<<<<< HEAD
						/* translators: %s: Multiple stylesheets dev note link. */
						__( 'Now you can register more than one stylesheet per block. You can use this to share styles across blocks you write, or to load styles for individual blocks, so your styles are only loaded when the block is used. Find out more about <a href="%s">using multiple stylesheets in a block</a>.' ),
						'https://make.wordpress.org/core/2021/12/15/using-multiple-stylesheets-per-block/'
=======
						/* translators: %s: Link to Browse Happy. */
						__( 'Support for Internet Explorer 11 has been dropped as of this release. This means you may have issues managing your site that will not be fixed in the future. If you are currently using IE11, it is strongly recommended that you <a href="%s">switch to a more modern browser</a>.' ),
						'https://browsehappy.com/'
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
					);
					?>
				</p>
			</div>
<<<<<<< HEAD
		</div>
		<div class="about__section has-gutters has-2-columns">
			<div class="column is-edge-to-edge">
				<h3>
					<?php _e( 'Block&#8209;level locking' ); ?>
				</h3>
				<p>
					<?php _e( 'Now you can lock any block (or a few of them) in a pattern, just by adding a lock attribute to its settings in block.json &#8212; leaving the rest of the pattern free for site editors to adapt to their content.' ); ?>
				</p>
			</div>
			<div class="column is-edge-to-edge">
				<h3>
					<?php _e( 'A refactored Gallery block' ); ?>
				</h3>
				<p>
					<?php
					printf(
						/* translators: %s: Gallery Refactor dev note link. */
						__( 'The changes to the Gallery block listed above are the result of a near-complete refactoring. Have you built a plugin or theme on the Gallery block functionality? Be sure to read the <a href="%s">Gallery block compatibility dev note</a>.' ),
						'https://make.wordpress.org/core/2021/08/20/gallery-block-refactor-dev-note/'
					);
					?>
				</p>
			</div>
		</div>

		<hr class="is-large" />

		<div class="about__section has-subtle-background-color has-2-columns is-wider-right">
			<div class="column about__image is-vertically-aligned-center">
				<img src="https://s.w.org/images/core/5.9/learn-video.png" alt="" />
			</div>
			<div class="column">
				<h3><?php _e( 'Learn more about the new features in 5.9' ); ?></h3>
				<p>
					<?php
					printf(
						/* translators: %s: Learn WordPress link. */
						__( 'Want to dive into 5.9 but don&#8217;t know where to start? Visit <a href="%s">learn.wordpress.org</a> for expanding resources on new features in WordPress 5.9.' ),
						'https://learn.wordpress.org'
=======
			<div class="column">
				<h3>
					<?php _e( 'Adding support for WebP' ); ?>
				</h3>
				<p>
					<?php
					_e( 'WebP is a modern image format that provides improved lossless and lossy compression for images on the web. WebP images are around 30% smaller on average than their JPEG or PNG equivalents, resulting in sites that are faster and use less bandwidth.' );
					?>
				</p>
			</div>
			<div class="column">
				<h3>
					<?php _e( 'Adding Additional Block Supports' ); ?>
				</h3>
				<p>
					<?php
					printf(
						/* translators: %1$s: Link to 5.6's block dev notes. %2$s: Link to 5.7's block dev notes. %3$s: Link to 5.8's block dev notes. */
						__( 'Expanding on previously implemented block supports in WordPress <a href="%1$s">5.6</a> and <a href="%2$s">5.7</a>, WordPress 5.8 introduces several new block support flags and new options to customize your registered blocks. More information is available in the <a href="%3$s">block supports dev note</a>.' ),
						'https://make.wordpress.org/core/2020/11/18/block-supports-in-wordpress-5-6/',
						'https://make.wordpress.org/core/2021/02/24/changes-to-block-editor-components-and-blocks/',
						'https://make.wordpress.org/core/2021/06/25/block-supports-api-updates-for-wordpress-5-8/'
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
					);
					?>
				</p>
			</div>
		</div>

<<<<<<< HEAD
		<hr class="is-large" />
=======
		<hr class="is-small" />
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73

		<div class="about__section">
			<div class="column">
				<h3><?php _e( 'Check the Field Guide for more!' ); ?></h3>
				<p>
					<?php
					printf(
<<<<<<< HEAD
						/* translators: %s: WordPress 5.9 Field Guide link. */
						__( 'Check out the latest version of the WordPress Field Guide. It highlights developer notes for each change you may want to be aware of. <a href="%s">WordPress 5.9 Field Guide.</a>' ),
						'https://make.wordpress.org/core/2022/01/10/wordpress-5-9-field-guide/'
=======
						/* translators: %s: WordPress 5.8 Field Guide link. */
						__( 'Check out the latest version of the WordPress Field Guide. It highlights developer notes for each change you may want to be aware of. <a href="%s">WordPress 5.8 Field Guide.</a>' ),
						'https://make.wordpress.org/core/2021/07/03/wordpress-5-8-field-guide/'
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
					);
					?>
				</p>
			</div>
		</div>

		<hr />

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? _e( 'Go to Updates' ) : _e( 'Go to Dashboard &rarr; Updates' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? _e( 'Go to Dashboard &rarr; Home' ) : _e( 'Go to Dashboard' ); ?></a>
		</div>
	</div>

<?php require_once ABSPATH . 'wp-admin/admin-footer.php'; ?>

<?php

// These are strings we may use to describe maintenance/security releases, where we aim for no new strings.
return;

__( 'Maintenance Release' );
__( 'Maintenance Releases' );

__( 'Security Release' );
__( 'Security Releases' );

__( 'Maintenance and Security Release' );
__( 'Maintenance and Security Releases' );

/* translators: %s: WordPress version number. */
__( '<strong>Version %s</strong> addressed one security issue.' );
/* translators: %s: WordPress version number. */
__( '<strong>Version %s</strong> addressed some security issues.' );

/* translators: 1: WordPress version number, 2: Plural number of bugs. */
_n_noop(
	'<strong>Version %1$s</strong> addressed %2$s bug.',
	'<strong>Version %1$s</strong> addressed %2$s bugs.'
);

/* translators: 1: WordPress version number, 2: Plural number of bugs. Singular security issue. */
_n_noop(
	'<strong>Version %1$s</strong> addressed a security issue and fixed %2$s bug.',
	'<strong>Version %1$s</strong> addressed a security issue and fixed %2$s bugs.'
);

/* translators: 1: WordPress version number, 2: Plural number of bugs. More than one security issue. */
_n_noop(
	'<strong>Version %1$s</strong> addressed some security issues and fixed %2$s bug.',
	'<strong>Version %1$s</strong> addressed some security issues and fixed %2$s bugs.'
);

/* translators: %s: Documentation URL. */
__( 'For more information, see <a href="%s">the release notes</a>.' );
