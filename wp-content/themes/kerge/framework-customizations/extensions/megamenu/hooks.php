<?php if (!defined('FW')) die('Forbidden');

$id_front_page = get_option( 'page_on_front' );
$front_page_template = get_page_template_slug( $id_front_page );

if ( $front_page_template == "page-templates/template-kerge-vcard-new.php" || $front_page_template == "page-templates/template-kerge-vcard-one-page-new.php" ) {
	{
	    /** @internal */
	    function _filter_theme_ext_mega_menu_wp_nav_menu_args($args) {
	        $args['walker'] = new FW_Ext_Mega_Menu_Custom_Walker();

	        return $args;
	    }
	    add_filter('wp_nav_menu_args', '_filter_theme_ext_mega_menu_wp_nav_menu_args');
	}
}