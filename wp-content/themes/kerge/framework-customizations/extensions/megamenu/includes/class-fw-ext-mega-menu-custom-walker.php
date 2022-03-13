<?php if (!defined('FW')) die('Forbidden');

class FW_Ext_Mega_Menu_Custom_Walker extends FW_Ext_Mega_Menu_Walker
 {
    function start_lvl( &$output, $depth = 0, $args = array(), $class = 'sub-menu' ) {
        return parent::start_lvl($output, $depth, $args, $class);
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="'. esc_attr( $class_names ) . '"';
        $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $type = $item->object;


	    $id_front_page = get_option( 'page_on_front' );
        $front_page_template = get_page_template_slug( $id_front_page );

        if($item->object == 'page') {
        	if ( $front_page_template == "page-templates/template-kerge-vcard-new.php" || $front_page_template == "page-templates/template-kerge-vcard-one-page-new.php" ) {
	            $varpost = get_post($item->object_id);
	            if ( is_front_page() ) {
	              $attributes .= ' href="#' . $varpost->post_name . '"';
	            }else{
	              $attributes .= ' href="'.home_url().'/#' . $varpost->post_name . '"';
	            }
	        } else {
	            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
	        }
        }
        else {
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        }


        $random_animations = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('subpages_animations/subpages_animations_switcher') :  'on';
        $animation_type = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('subpages_animations/off/animation_number') :  '';
        if ($random_animations == 'off') {
            $animation_data = ' data-animation="'.$animation_type.'"';
        } else {
            $animation_data = '';
        }


        $item_output = $args->before;
        if ($type != "page") {
        	$item_output .= '<a class="nav-anim nav-custom" '. $attributes .' data-object="'.$type.'"'.$animation_data.'>';
        } else {
        	$item_output .= '<a class="nav-anim pt-trigger" '. $attributes .' data-object="'.$type.'"'.$animation_data.'>';
        }
        $item_output .= '<span class="link-text">' . $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . '</span>';
        $item_output .= $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
    }
 }