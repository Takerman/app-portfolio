<?php

/********* Custom menu ************/
add_action( 'after_setup_theme', 'bootstrap_setup' );
 
if ( ! function_exists( 'bootstrap_setup' ) ):
 
	function bootstrap_setup(){
 
		class My_Walker extends Walker_Nav_Menu {
 
			
			public function start_lvl( &$output, $depth = 0, $args = array()) {
 
				$indent = str_repeat( "\t", $depth );
				$output	   .= "\n$indent<ul class=\"dropdown-menu\">\n";
				
			}
 
			public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
				if (isset($args->has_children))
				{
					$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
					
					if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
                        $output .= $indent . '<li role="presentation" class="divider">';
					} else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
							$output .= $indent . '<li role="presentation" class="divider">';
					} else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
							$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
					} else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
							$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
					} else {
						$li_attributes = '';
						$class_names = $value = '';
						$classes = empty( $item->classes ) ? array() : (array) $item->classes;
						$custom = get_post_custom($item->object_id);
						$pageType = isset ($custom['_weblusive_page_type']) ? @$custom['_weblusive_page_type'][0] : '';
						if($pageType == '1'){
							$classes[] = 'page-scroll menu-item-' . $item->ID;
						}else{
							$classes[] = 'stand-page page-scroll menu-item-' . $item->ID;
						}
						
						$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

                        if ( $args->has_children  && $depth < 1)
                                $class_names .= ' dropdown';
						
						if ( $args->has_children && $depth >=1)
                                $class_names .= ' dropdown-submenu';

                        if ( in_array( 'current-menu-item', $classes ) )
                                $class_names .= ' current active';

                        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

                        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
                        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
		 
						
						$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
						
						
						
						$link =  $item->url; 
					
						if ($pageType == '2' || $pageType=='')
						{
							$link =  $item->url;
						}
						elseif ($pageType == '1')
						{
							$link = get_site_url().'/#'.slugify($item->title);
							//$link = '#'.slugify($item->title);
							//$link = @$custom['_custom_url'][0];
						}
						else
						{
							$link =  $item->url;
						}
		 
						$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
						$desc  = ! empty( $item->description  ) ? ' <i class="fa '.$item->description .'"></i>' : '';
						$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
						$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
						$attributes .= ! empty( $item->url )        ? ' href="'.$link.'" ' : '';
						$attributes .= ($args->has_children && $depth == 0) ? 'class="dropdown-toggle" data-toggle="dropdown" ' : 'class="smooth-scroll"';
		  
						$item_output = $args->before;
						$item_output .= '<a'. $attributes .'>'.$desc;
						$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
						//$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
						$item_output .= ($args->has_children && $depth == 0) ? '<i class="fa fa-caret-down"></i></a>' : '</a>';
						$item_output .= $args->after;
		 
						$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
					}
				}
			}
 
			function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
				
				if ( !$element )
					return;
				
				$id_field = $this->db_fields['id'];
 
				//display this element
				if ( is_array( $args[0] ) ) 
					$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
				else if ( is_object( $args[0] ) ) 
					$args[0]->has_children = ! empty( $children_elements[$element->$id_field] ); 
				$cb_args = array_merge( array(&$output, $element, $depth), $args);
				call_user_func_array(array(&$this, 'start_el'), $cb_args);
 
				$id = $element->$id_field;
 
				// descend only when the depth is right and there are childrens for this element
				if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {
 
					foreach( $children_elements[ $id ] as $child ){
 
						if ( !isset($newlevel) ) {
							$newlevel = true;
							//start the child delimiter
							$cb_args = array_merge( array(&$output, $depth), $args);
							call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
						}
						$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
					}
						unset( $children_elements[ $id ] );
				}
 
				if ( isset($newlevel) && $newlevel ){
					//end the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
				}
 
				//end this element
				$cb_args = array_merge( array(&$output, $element, $depth), $args);
				call_user_func_array(array(&$this, 'end_el'), $cb_args);
				
			}
			
		}
 
	}
 
endif;
class pages_from_nav extends Walker_Nav_Menu
{
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) 
	{
		global $wp_query;
		$item_output = $item->object_id;
		$item_output .= ',';
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

function get_menu_item_link($id){
	$page = get_page($id);
	$get_meta = get_post_custom($id);
	$pageType = isset ($get_meta['_weblusive_page_type']) ? $get_meta['_weblusive_page_type'][0] : '';
	
	$pageTitle = $page -> post_title;
	$link = '';
	
	if ($pageType == '2')
	{
		$link =  get_permalink($id);
	}
	elseif ($pageType == '1' || $pageType=='')
	{
		$link = get_site_url().'/#'.slugify($pageTitle);
	}
	return $link;
}
/********* STRING MANIPULATIONS ************/

function alc_trim($text, $length, $end = '[...]') {
	$text = preg_replace('`\[[^\]]*\]`', '', $text);
	$text = strip_tags($text);
	$text = substr($text, 0, $length);
	$text = substr($text, 0, last_pos($text, " "));
	$text = $text . $end;
	return $text;
}

function last_pos($string, $needle){
   $len=strlen($string);
   for ($i=$len-1; $i>-1;$i--){
       if (substr($string, $i, 1)==$needle) return ($i);
   }
   return FALSE;
}

function limit_words($string, $word_limit, $chars = 0) {
 
	// creates an array of words from $string (this will be our excerpt)
	// explode divides the excerpt up by using a space character
	$words = '';
	
	if ($chars == 1){
		$words = (strlen($string) > $word_limit) ? substr($string,0, $word_limit).'...' : $string;
		return $words;
	}
	else{
		$words = explode(' ', $string);
		return implode(' ', array_slice($words, 0, $word_limit)).'...';
	}
}

/********** GET PAGES BY PARAMS ************/


/*-- Get page content (Used for pages with custom post types) --*/
if(!function_exists('getPageContent'))
{
	function getPageContent($pageId)
	{
		if(!is_numeric($pageId))
		{
			return;
		}
		$post = get_post($pageId); 
		$content = apply_filters('the_content', $post->post_content); 
		return $content;
	}
}

	
/********************************************/

function youtube_id_from_url($url) {
    $pattern = 
        '%^# Match any youtube URL
        (?:https?://)?  # Optional scheme. Either http or https
        (?:www\.)?      # Optional www subdomain
        (?:             # Group host alternatives
          youtu\.be/    # Either youtu.be,
        | youtube\.com  # or youtube.com
          (?:           # Group path alternatives
            /embed/     # Either /embed/
          | /v/         # or /v/
          | /watch\?v=  # or /watch\?v=
          )             # End path alternatives.
        )               # End host alternatives.
        ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
        $%x'
        ;
    $result = preg_match($pattern, $url, $matches);
    if (false !== $result) {
        return $matches[1];
    }
    return false;
}


/********************************************/

function sility_highlight_results($text){
     if(is_search()){
		 $sr = get_query_var('s');
		 $length = strlen ($sr);
		 if ($length > 3){
			$keys = explode(" ",$sr);
			$text = preg_replace('/('.implode('|', $keys) .')/iu', '<span class="selected">'.$sr.'</span>', $text);
		 }
     }
     return $text;
}
add_filter('the_excerpt', 'sility_highlight_results');

/************** LIST TAXONOMY ***************/

function list_taxonomy($taxonomy, $id='')
{
	$args = array ('hide_empty' => false);
	$tax_terms = get_terms($taxonomy, $args); 
	$active = '';
	$output = '<ul id="'.$id.'">';

	foreach ($tax_terms as $tax_term) {
		if ($taxonomy  == $tax_term)
		{
			$active  = ' class="active"';
		}
		$output.='<li><a href="'.esc_attr(get_term_link($tax_term, $taxonomy)) . '"'.$active.'>'.$tax_term->name.'</a></li>';
	}
	$output.='</ul>';
	
	return $output;
}

/********* HEX TO RGB CONVERSION ************/
function HexToRGB($hex, $findclosest = 0, $valueRatio = 0.8) {
	$hex = str_replace("#", "", $hex);
	$color = array();
	
	if(strlen($hex) == 3) {
		$color['r'] = hexdec(substr($hex, 0, 1) . $r);
		$color['g'] = hexdec(substr($hex, 1, 1) . $g);
		$color['b'] = hexdec(substr($hex, 2, 1) . $b);
	}
	else if(strlen($hex) == 6) {
		$color['r'] = hexdec(substr($hex, 0, 2));
		$color['g'] = hexdec(substr($hex, 2, 2));
		$color['b'] = hexdec(substr($hex, 4, 2));
	}
	
	if ($findclosest == 1){
		$color['r'] = (int)($color['r'] * $valueRatio);
		$color['g'] = (int)($color['g'] * $valueRatio);
		$color['b'] = (int)($color['b'] * $valueRatio);
	}
	
	return $color;
}

/******** CLOSEST COLOR MATCH FUNCTION ******/


/************* COMMENTS HOOK *************/

function sility_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; 
	
	?>
    <li id="comment-<?php comment_ID(); ?>" class="comment">
		<div class="inner clearfix">
			<div class="image">
				<?php echo get_avatar($comment, 100); ?>
			</div>
			<div class="content">
				 <?php if ($comment->comment_approved == '0') : ?><p><em><?php _e('Your comment is awaiting moderation.', 'Sility') ?></em></p><?php endif; ?>
				<h5><?php echo get_comment_author()?></h5>
				<?php comment_text() ?>
				<span class="meta"><?php printf(__('%1$s - %2$s', 'Sility'), get_comment_date(),get_comment_time()) ?></span>
				 <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'reply_text' => __('Reply <i class="fa fa-reply"></i>', 'Sility'), 'style'=>'<ul class="com_child"', 'max_depth' => $args['max_depth']))) ?>
			</div>
		</div>
<?php }

add_filter('comment_reply_link', 'replace_reply_link_class');

function replace_reply_link_class($class){
    $class = str_replace("class='comment-reply-link", "class='reply", $class);
    return $class;
}
add_filter('get_avatar','add_gravatar_class');

function add_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='comment-avatar img-responsive", $class);
    return $class;
}
/*****************************************/

function load_template_part($template_name, $part_name=null) {
    ob_start();
    get_template_part($template_name, $part_name);
    $var = ob_get_contents();
    ob_end_clean();
    return $var;
}
?>