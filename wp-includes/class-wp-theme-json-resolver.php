<?php
/**
 * WP_Theme_JSON_Resolver class
 *
 * @package WordPress
 * @subpackage Theme
 * @since 5.8.0
 */

/**
 * Class that abstracts the processing of the different data sources
 * for site-level config and offers an API to work with them.
 *
<<<<<<< HEAD
 * This class is for internal core usage and is not supposed to be used by extenders (plugins and/or themes).
 * This is a low-level API that may need to do breaking changes. Please,
 * use get_global_settings, get_global_styles, and get_global_stylesheet instead.
 *
=======
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
 * @access private
 */
class WP_Theme_JSON_Resolver {

	/**
	 * Container for data coming from core.
	 *
	 * @since 5.8.0
	 * @var WP_Theme_JSON
	 */
<<<<<<< HEAD
	protected static $core = null;
=======
	private static $core = null;
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73

	/**
	 * Container for data coming from the theme.
	 *
	 * @since 5.8.0
	 * @var WP_Theme_JSON
	 */
<<<<<<< HEAD
	protected static $theme = null;
=======
	private static $theme = null;
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73

	/**
	 * Whether or not the theme supports theme.json.
	 *
	 * @since 5.8.0
	 * @var bool
	 */
<<<<<<< HEAD
	protected static $theme_has_support = null;

	/**
	 * Container for data coming from the user.
	 *
	 * @since 5.9.0
	 * @var WP_Theme_JSON
	 */
	protected static $user = null;

	/**
	 * Stores the ID of the custom post type
	 * that holds the user data.
	 *
	 * @since 5.9.0
	 * @var int
	 */
	protected static $user_custom_post_type_id = null;

	/**
	 * Container to keep loaded i18n schema for `theme.json`.
	 *
	 * @since 5.8.0 As `$theme_json_i18n`.
	 * @since 5.9.0 Renamed from `$theme_json_i18n` to `$i18n_schema`.
	 * @var array
	 */
	protected static $i18n_schema = null;
=======
	private static $theme_has_support = null;

	/**
	 * Structure to hold i18n metadata.
	 *
	 * @since 5.8.0
	 * @var array
	 */
	private static $theme_json_i18n = null;
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73

	/**
	 * Processes a file that adheres to the theme.json schema
	 * and returns an array with its contents, or a void array if none found.
	 *
	 * @since 5.8.0
	 *
	 * @param string $file_path Path to file. Empty if no file.
	 * @return array Contents that adhere to the theme.json schema.
	 */
<<<<<<< HEAD
	protected static function read_json_file( $file_path ) {
		$config = array();
		if ( $file_path ) {
			$decoded_file = wp_json_file_decode( $file_path, array( 'associative' => true ) );
=======
	private static function read_json_file( $file_path ) {
		$config = array();
		if ( $file_path ) {
			$decoded_file = json_decode(
				file_get_contents( $file_path ),
				true
			);

			$json_decoding_error = json_last_error();
			if ( JSON_ERROR_NONE !== $json_decoding_error ) {
				trigger_error( "Error when decoding a theme.json schema at path $file_path " . json_last_error_msg() );
				return $config;
			}

>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
			if ( is_array( $decoded_file ) ) {
				$config = $decoded_file;
			}
		}
		return $config;
	}

	/**
<<<<<<< HEAD
	 * Returns a data structure used in theme.json translation.
	 *
	 * @since 5.8.0
	 * @deprecated 5.9.0
=======
	 * Converts a tree as in i18n-theme.json into a linear array
	 * containing metadata to translate a theme.json file.
	 *
	 * For example, given this input:
	 *
	 *     {
	 *       "settings": {
	 *         "*": {
	 *           "typography": {
	 *             "fontSizes": [ { "name": "Font size name" } ],
	 *             "fontStyles": [ { "name": "Font size name" } ]
	 *           }
	 *         }
	 *       }
	 *     }
	 *
	 * will return this output:
	 *
	 *     [
	 *       0 => [
	 *         'path'    => [ 'settings', '*', 'typography', 'fontSizes' ],
	 *         'key'     => 'name',
	 *         'context' => 'Font size name'
	 *       ],
	 *       1 => [
	 *         'path'    => [ 'settings', '*', 'typography', 'fontStyles' ],
	 *         'key'     => 'name',
	 *         'context' => 'Font style name'
	 *       ]
	 *     ]
	 *
	 * @since 5.8.0
	 *
	 * @param array $i18n_partial A tree that follows the format of i18n-theme.json.
	 * @param array $current_path Optional. Keeps track of the path as we walk down the given tree.
	 *                            Default empty array.
	 * @return array A linear array containing the paths to translate.
	 */
	private static function extract_paths_to_translate( $i18n_partial, $current_path = array() ) {
		$result = array();
		foreach ( $i18n_partial as $property => $partial_child ) {
			if ( is_numeric( $property ) ) {
				foreach ( $partial_child as $key => $context ) {
					$result[] = array(
						'path'    => $current_path,
						'key'     => $key,
						'context' => $context,
					);
				}
				return $result;
			}
			$result = array_merge(
				$result,
				self::extract_paths_to_translate( $partial_child, array_merge( $current_path, array( $property ) ) )
			);
		}
		return $result;
	}

	/**
	 * Returns a data structure used in theme.json translation.
	 *
	 * @since 5.8.0
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
	 *
	 * @return array An array of theme.json fields that are translatable and the keys that are translatable.
	 */
	public static function get_fields_to_translate() {
<<<<<<< HEAD
		_deprecated_function( __METHOD__, '5.9.0' );
		return array();
=======
		if ( null === self::$theme_json_i18n ) {
			$file_structure        = self::read_json_file( __DIR__ . '/theme-i18n.json' );
			self::$theme_json_i18n = self::extract_paths_to_translate( $file_structure );
		}
		return self::$theme_json_i18n;
	}

	/**
	 * Translates a chunk of the loaded theme.json structure.
	 *
	 * @since 5.8.0
	 *
	 * @param array  $array_to_translate The chunk of theme.json to translate.
	 * @param string $key                The key of the field that contains the string to translate.
	 * @param string $context            The context to apply in the translation call.
	 * @param string $domain             Text domain. Unique identifier for retrieving translated strings.
	 * @return array Returns the modified $theme_json chunk.
	 */
	private static function translate_theme_json_chunk( array $array_to_translate, $key, $context, $domain ) {
		foreach ( $array_to_translate as $item_key => $item_to_translate ) {
			if ( empty( $item_to_translate[ $key ] ) ) {
				continue;
			}

			// phpcs:ignore WordPress.WP.I18n.LowLevelTranslationFunction,WordPress.WP.I18n.NonSingularStringLiteralText,WordPress.WP.I18n.NonSingularStringLiteralContext,WordPress.WP.I18n.NonSingularStringLiteralDomain
			$array_to_translate[ $item_key ][ $key ] = translate_with_gettext_context( $array_to_translate[ $item_key ][ $key ], $context, $domain );
		}

		return $array_to_translate;
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
	}

	/**
	 * Given a theme.json structure modifies it in place to update certain values
	 * by its translated strings according to the language set by the user.
	 *
	 * @since 5.8.0
	 *
	 * @param array  $theme_json The theme.json to translate.
	 * @param string $domain     Optional. Text domain. Unique identifier for retrieving translated strings.
	 *                           Default 'default'.
	 * @return array Returns the modified $theme_json_structure.
	 */
<<<<<<< HEAD
	protected static function translate( $theme_json, $domain = 'default' ) {
		if ( null === static::$i18n_schema ) {
			$i18n_schema         = wp_json_file_decode( __DIR__ . '/theme-i18n.json' );
			static::$i18n_schema = null === $i18n_schema ? array() : $i18n_schema;
		}

		return translate_settings_using_i18n_schema( static::$i18n_schema, $theme_json, $domain );
=======
	private static function translate( $theme_json, $domain = 'default' ) {
		$fields = self::get_fields_to_translate();
		foreach ( $fields as $field ) {
			$path    = $field['path'];
			$key     = $field['key'];
			$context = $field['context'];

			/*
			 * We need to process the paths that include '*' separately.
			 * One example of such a path would be:
			 * [ 'settings', 'blocks', '*', 'color', 'palette' ]
			 */
			$nodes_to_iterate = array_keys( $path, '*', true );
			if ( ! empty( $nodes_to_iterate ) ) {
				/*
				 * At the moment, we only need to support one '*' in the path, so take it directly.
				 * - base will be [ 'settings', 'blocks' ]
				 * - data will be [ 'color', 'palette' ]
				 */
				$base_path = array_slice( $path, 0, $nodes_to_iterate[0] );
				$data_path = array_slice( $path, $nodes_to_iterate[0] + 1 );
				$base_tree = _wp_array_get( $theme_json, $base_path, array() );
				foreach ( $base_tree as $node_name => $node_data ) {
					$array_to_translate = _wp_array_get( $node_data, $data_path, null );
					if ( is_null( $array_to_translate ) ) {
						continue;
					}

					// Whole path will be [ 'settings', 'blocks', 'core/paragraph', 'color', 'palette' ].
					$whole_path       = array_merge( $base_path, array( $node_name ), $data_path );
					$translated_array = self::translate_theme_json_chunk( $array_to_translate, $key, $context, $domain );
					_wp_array_set( $theme_json, $whole_path, $translated_array );
				}
			} else {
				$array_to_translate = _wp_array_get( $theme_json, $path, null );
				if ( is_null( $array_to_translate ) ) {
					continue;
				}

				$translated_array = self::translate_theme_json_chunk( $array_to_translate, $key, $context, $domain );
				_wp_array_set( $theme_json, $path, $translated_array );
			}
		}

		return $theme_json;
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
	}

	/**
	 * Return core's origin config.
	 *
	 * @since 5.8.0
	 *
	 * @return WP_Theme_JSON Entity that holds core data.
	 */
	public static function get_core_data() {
<<<<<<< HEAD
		if ( null !== static::$core ) {
			return static::$core;
		}

		$config       = static::read_json_file( __DIR__ . '/theme.json' );
		$config       = static::translate( $config );
		static::$core = new WP_Theme_JSON( $config, 'default' );

		return static::$core;
=======
		if ( null !== self::$core ) {
			return self::$core;
		}

		$config     = self::read_json_file( __DIR__ . '/theme.json' );
		$config     = self::translate( $config );
		self::$core = new WP_Theme_JSON( $config, 'core' );

		return self::$core;
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
	}

	/**
	 * Returns the theme's data.
	 *
<<<<<<< HEAD
	 * Data from theme.json will be backfilled from existing
	 * theme supports, if any. Note that if the same data
	 * is present in theme.json and in theme supports,
	 * the theme.json takes precendence.
	 *
	 * @since 5.8.0
	 * @since 5.9.0 Theme supports have been inlined and the `$theme_support_data` argument removed.
	 *
	 * @param array $deprecated Deprecated. Not used.
	 * @return WP_Theme_JSON Entity that holds theme data.
	 */
	public static function get_theme_data( $deprecated = array() ) {
		if ( ! empty( $deprecated ) ) {
			_deprecated_argument( __METHOD__, '5.9.0' );
		}
		if ( null === static::$theme ) {
			$theme_json_data = static::read_json_file( static::get_file_path_from_theme( 'theme.json' ) );
			$theme_json_data = static::translate( $theme_json_data, wp_get_theme()->get( 'TextDomain' ) );
			static::$theme   = new WP_Theme_JSON( $theme_json_data );

			if ( wp_get_theme()->parent() ) {
				// Get parent theme.json.
				$parent_theme_json_data = static::read_json_file( static::get_file_path_from_theme( 'theme.json', true ) );
				$parent_theme_json_data = static::translate( $parent_theme_json_data, wp_get_theme()->parent()->get( 'TextDomain' ) );
				$parent_theme           = new WP_Theme_JSON( $parent_theme_json_data );

				// Merge the child theme.json into the parent theme.json.
				// The child theme takes precedence over the parent.
				$parent_theme->merge( static::$theme );
				static::$theme = $parent_theme;
			}
=======
	 * Data from theme.json can be augmented via the $theme_support_data variable.
	 * This is useful, for example, to backfill the gaps in theme.json that a theme
	 * has declared via add_theme_supports.
	 *
	 * Note that if the same data is present in theme.json and in $theme_support_data,
	 * the theme.json's is not overwritten.
	 *
	 * @since 5.8.0
	 *
	 * @param array $theme_support_data Optional. Theme support data in theme.json format.
	 *                                  Default empty array.
	 * @return WP_Theme_JSON Entity that holds theme data.
	 */
	public static function get_theme_data( $theme_support_data = array() ) {
		if ( null === self::$theme ) {
			$theme_json_data = self::read_json_file( self::get_file_path_from_theme( 'theme.json' ) );
			$theme_json_data = self::translate( $theme_json_data, wp_get_theme()->get( 'TextDomain' ) );
			self::$theme     = new WP_Theme_JSON( $theme_json_data );
		}

		if ( empty( $theme_support_data ) ) {
			return self::$theme;
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
		}

		/*
		 * We want the presets and settings declared in theme.json
<<<<<<< HEAD
		 * to override the ones declared via theme supports.
		 * So we take theme supports, transform it to theme.json shape
		 * and merge the static::$theme upon that.
		 */
		$theme_support_data = WP_Theme_JSON::get_from_editor_settings( get_default_block_editor_settings() );
		if ( ! static::theme_has_support() ) {
			if ( ! isset( $theme_support_data['settings']['color'] ) ) {
				$theme_support_data['settings']['color'] = array();
			}

			$default_palette = false;
			if ( current_theme_supports( 'default-color-palette' ) ) {
				$default_palette = true;
			}
			if ( ! isset( $theme_support_data['settings']['color']['palette'] ) ) {
				// If the theme does not have any palette, we still want to show the core one.
				$default_palette = true;
			}
			$theme_support_data['settings']['color']['defaultPalette'] = $default_palette;

			$default_gradients = false;
			if ( current_theme_supports( 'default-gradient-presets' ) ) {
				$default_gradients = true;
			}
			if ( ! isset( $theme_support_data['settings']['color']['gradients'] ) ) {
				// If the theme does not have any gradients, we still want to show the core ones.
				$default_gradients = true;
			}
			$theme_support_data['settings']['color']['defaultGradients'] = $default_gradients;
		}
		$with_theme_supports = new WP_Theme_JSON( $theme_support_data );
		$with_theme_supports->merge( static::$theme );
=======
		 * to override the ones declared via add_theme_support.
		 */
		$with_theme_supports = new WP_Theme_JSON( $theme_support_data );
		$with_theme_supports->merge( self::$theme );
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73

		return $with_theme_supports;
	}

	/**
<<<<<<< HEAD
	 * Returns the custom post type that contains the user's origin config
	 * for the current theme or a void array if none are found.
	 *
	 * This can also create and return a new draft custom post type.
	 *
	 * @since 5.9.0
	 *
	 * @param WP_Theme $theme              The theme object. If empty, it
	 *                                     defaults to the current theme.
	 * @param bool     $create_post        Optional. Whether a new custom post
	 *                                     type should be created if none are
	 *                                     found. Default false.
	 * @param array    $post_status_filter Optional. Filter custom post type by
	 *                                     post status. Default `array( 'publish' )`,
	 *                                     so it only fetches published posts.
	 * @return array Custom Post Type for the user's origin config.
	 */
	public static function get_user_data_from_wp_global_styles( $theme, $create_post = false, $post_status_filter = array( 'publish' ) ) {
		if ( ! $theme instanceof WP_Theme ) {
			$theme = wp_get_theme();
		}
		$user_cpt         = array();
		$post_type_filter = 'wp_global_styles';
		$args             = array(
			'numberposts' => 1,
			'orderby'     => 'date',
			'order'       => 'desc',
			'post_type'   => $post_type_filter,
			'post_status' => $post_status_filter,
			'tax_query'   => array(
				array(
					'taxonomy' => 'wp_theme',
					'field'    => 'name',
					'terms'    => $theme->get_stylesheet(),
				),
			),
		);

		$cache_key = sprintf( 'wp_global_styles_%s', md5( serialize( $args ) ) );
		$post_id   = wp_cache_get( $cache_key );

		if ( (int) $post_id > 0 ) {
			return get_post( $post_id, ARRAY_A );
		}

		// Special case: '-1' is a results not found.
		if ( -1 === $post_id && ! $create_post ) {
			return $user_cpt;
		}

		$recent_posts = wp_get_recent_posts( $args );
		if ( is_array( $recent_posts ) && ( count( $recent_posts ) === 1 ) ) {
			$user_cpt = $recent_posts[0];
		} elseif ( $create_post ) {
			$cpt_post_id = wp_insert_post(
				array(
					'post_content' => '{"version": ' . WP_Theme_JSON::LATEST_SCHEMA . ', "isGlobalStylesUserThemeJSON": true }',
					'post_status'  => 'publish',
					'post_title'   => 'Custom Styles',
					'post_type'    => $post_type_filter,
					'post_name'    => 'wp-global-styles-' . urlencode( wp_get_theme()->get_stylesheet() ),
					'tax_input'    => array(
						'wp_theme' => array( wp_get_theme()->get_stylesheet() ),
					),
				),
				true
			);
			$user_cpt    = get_post( $cpt_post_id, ARRAY_A );
		}
		$cache_expiration = $user_cpt ? DAY_IN_SECONDS : HOUR_IN_SECONDS;
		wp_cache_set( $cache_key, $user_cpt ? $user_cpt['ID'] : -1, '', $cache_expiration );

		return $user_cpt;
	}

	/**
	 * Returns the user's origin config.
	 *
	 * @since 5.9.0
	 *
	 * @return WP_Theme_JSON Entity that holds styles for user data.
	 */
	public static function get_user_data() {
		if ( null !== static::$user ) {
			return static::$user;
		}

		$config   = array();
		$user_cpt = static::get_user_data_from_wp_global_styles( wp_get_theme() );

		if ( array_key_exists( 'post_content', $user_cpt ) ) {
			$decoded_data = json_decode( $user_cpt['post_content'], true );

			$json_decoding_error = json_last_error();
			if ( JSON_ERROR_NONE !== $json_decoding_error ) {
				trigger_error( 'Error when decoding a theme.json schema for user data. ' . json_last_error_msg() );
				return new WP_Theme_JSON( $config, 'custom' );
			}

			// Very important to verify that the flag isGlobalStylesUserThemeJSON is true.
			// If it's not true then the content was not escaped and is not safe.
			if (
				is_array( $decoded_data ) &&
				isset( $decoded_data['isGlobalStylesUserThemeJSON'] ) &&
				$decoded_data['isGlobalStylesUserThemeJSON']
			) {
				unset( $decoded_data['isGlobalStylesUserThemeJSON'] );
				$config = $decoded_data;
			}
		}
		static::$user = new WP_Theme_JSON( $config, 'custom' );

		return static::$user;
	}

	/**
	 * Returns the data merged from multiple origins.
	 *
	 * There are three sources of data (origins) for a site:
	 * default, theme, and custom. The custom's has higher priority
	 * than the theme's, and the theme's higher than default's.
	 *
	 * Unlike the getters {@link get_core_data},
	 * {@link get_theme_data}, and {@link get_user_data},
	 * this method returns data after it has been merged
	 * with the previous origins. This means that if the same piece of data
	 * is declared in different origins (user, theme, and core),
	 * the last origin overrides the previous.
	 *
	 * For example, if the user has set a background color
	 * for the paragraph block, and the theme has done it as well,
	 * the user preference wins.
	 *
	 * @since 5.8.0
	 * @since 5.9.0 Added user data, removed the `$settings` parameter,
	 *              added the `$origin` parameter.
	 *
	 * @param string $origin Optional. To what level should we merge data.
	 *                       Valid values are 'theme' or 'custom'. Default 'custom'.
	 * @return WP_Theme_JSON
	 */
	public static function get_merged_data( $origin = 'custom' ) {
		if ( is_array( $origin ) ) {
			_deprecated_argument( __FUNCTION__, '5.9.0' );
		}

		$result = new WP_Theme_JSON();
		$result->merge( static::get_core_data() );
		$result->merge( static::get_theme_data() );

		if ( 'custom' === $origin ) {
			$result->merge( static::get_user_data() );
		}
=======
	 * There are different sources of data for a site: core and theme.
	 *
	 * While the getters {@link get_core_data}, {@link get_theme_data} return the raw data
	 * from the respective origins, this method merges them all together.
	 *
	 * If the same piece of data is declared in different origins (core and theme),
	 * the last origin overrides the previous. For example, if core disables custom colors
	 * but a theme enables them, the theme config wins.
	 *
	 * @since 5.8.0
	 *
	 * @param array $settings Optional. Existing block editor settings. Default empty array.
	 * @return WP_Theme_JSON
	 */
	public static function get_merged_data( $settings = array() ) {
		$theme_support_data = WP_Theme_JSON::get_from_editor_settings( $settings );

		$result = new WP_Theme_JSON();
		$result->merge( self::get_core_data() );
		$result->merge( self::get_theme_data( $theme_support_data ) );
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73

		return $result;
	}

	/**
<<<<<<< HEAD
	 * Returns the ID of the custom post type
	 * that stores user data.
	 *
	 * @since 5.9.0
	 *
	 * @return integer|null
	 */
	public static function get_user_global_styles_post_id() {
		if ( null !== static::$user_custom_post_type_id ) {
			return static::$user_custom_post_type_id;
		}

		$user_cpt = static::get_user_data_from_wp_global_styles( wp_get_theme(), true );

		if ( array_key_exists( 'ID', $user_cpt ) ) {
			static::$user_custom_post_type_id = $user_cpt['ID'];
		}

		return static::$user_custom_post_type_id;
	}

	/**
	 * Whether the current theme has a theme.json file.
	 *
	 * @since 5.8.0
	 * @since 5.9.0 Added a check in the parent theme.
=======
	 * Whether the current theme has a theme.json file.
	 *
	 * @since 5.8.0
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
	 *
	 * @return bool
	 */
	public static function theme_has_support() {
<<<<<<< HEAD
		if ( ! isset( static::$theme_has_support ) ) {
			static::$theme_has_support = (
				is_readable( static::get_file_path_from_theme( 'theme.json' ) ) ||
				is_readable( static::get_file_path_from_theme( 'theme.json', true ) )
			);
		}

		return static::$theme_has_support;
=======
		if ( ! isset( self::$theme_has_support ) ) {
			self::$theme_has_support = (bool) self::get_file_path_from_theme( 'theme.json' );
		}

		return self::$theme_has_support;
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
	}

	/**
	 * Builds the path to the given file and checks that it is readable.
	 *
	 * If it isn't, returns an empty string, otherwise returns the whole file path.
	 *
	 * @since 5.8.0
<<<<<<< HEAD
	 * @since 5.9.0 Adapted to work with child themes, added the `$template` argument.
	 *
	 * @param string $file_name Name of the file.
	 * @param bool   $template  Optional. Use template theme directory. Default false.
	 * @return string The whole file path or empty if the file doesn't exist.
	 */
	protected static function get_file_path_from_theme( $file_name, $template = false ) {
		$path      = $template ? get_template_directory() : get_stylesheet_directory();
		$candidate = $path . '/' . $file_name;

		return is_readable( $candidate ) ? $candidate : '';
=======
	 *
	 * @param string $file_name Name of the file.
	 * @return string The whole file path or empty if the file doesn't exist.
	 */
	private static function get_file_path_from_theme( $file_name ) {
		/*
		 * This used to be a locate_template call. However, that method proved problematic
		 * due to its use of constants (STYLESHEETPATH) that threw errors in some scenarios.
		 *
		 * When the theme.json merge algorithm properly supports child themes,
		 * this should also fall back to the template path, as locate_template did.
		 */
		$located   = '';
		$candidate = get_stylesheet_directory() . '/' . $file_name;
		if ( is_readable( $candidate ) ) {
			$located = $candidate;
		}
		return $located;
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
	}

	/**
	 * Cleans the cached data so it can be recalculated.
	 *
	 * @since 5.8.0
<<<<<<< HEAD
	 * @since 5.9.0 Added the `$user`, `$user_custom_post_type_id`,
	 *              and `$i18n_schema` variables to reset.
	 */
	public static function clean_cached_data() {
		static::$core                     = null;
		static::$theme                    = null;
		static::$user                     = null;
		static::$user_custom_post_type_id = null;
		static::$theme_has_support        = null;
		static::$i18n_schema              = null;
=======
	 */
	public static function clean_cached_data() {
		self::$core              = null;
		self::$theme             = null;
		self::$theme_has_support = null;
		self::$theme_json_i18n   = null;
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
	}

}
