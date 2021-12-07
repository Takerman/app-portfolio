<?php


if ( isset( $_GET['page'] ) && $_GET['page'] == 'panel' ) {
	function weblusive_enqueue_pointer_script_style( $hook_suffix ) {
		$enqueue_pointer_script_style = false;
		$dismissed_pointers = explode( ',', get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );
		
		
		if( $enqueue_pointer_script_style ) {
			wp_enqueue_style( 'wp-pointer' );
			wp_enqueue_script( 'wp-pointer' );
		}
	}
	add_action( 'admin_enqueue_scripts', 'weblusive_enqueue_pointer_script_style' );
}


/*-----------------------------------------------------------------------------------*/
# Custom Admin Bar Menus
/*-----------------------------------------------------------------------------------*/
function weblusive_admin_bar() {
	global $wp_admin_bar;
	
	if ( current_user_can( 'switch_themes' ) ){
		$wp_admin_bar->add_menu( array(
			'parent' => 0,
			'id' => 'mpanel_page',
			'title' => theme_name ,
			'href' => admin_url( 'admin.php?page=panel')
		) );
	}
	
}
add_action( 'wp_before_admin_bar_render', 'weblusive_admin_bar' );


/*-----------------------------------------------------------------------------------*/
# Register main Scripts and Styles
/*-----------------------------------------------------------------------------------*/
function weblusive_admin_register() {
	wp_enqueue_script( 'jquery-ui-sortable' );
    wp_register_script( 'weblusive-admin-slider', get_template_directory_uri() . '/library/admin-panel/js/jquery.ui.slider.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-widget', 'jquery-ui-mouse', 'jquery-ui-sortable' ) , false , false );  
    wp_enqueue_script( 'weblusive-admin-tipsy', get_template_directory_uri() . '/library/admin-panel/js/tipsy.js', array( 'jquery' ) , false , false );  
	wp_register_script( 'weblusive-admin-main', get_template_directory_uri() . '/library/admin-panel/js/main.js', array( 'jquery' ) , false , false );  
    wp_register_script( 'weblusive-admin-colorpicker', get_template_directory_uri() . '/library/admin-panel/js/colorpicker.js', array( 'jquery' ) , false , false );  
	wp_register_script( 'weblusive-admin-helper', get_template_directory_uri() . '/library/admin-panel/js/helper.js', array( 'jquery' ) , false , false );  
	
	wp_register_style( 'weblusive-style', get_template_directory_uri().'/library/admin-panel/style.css', array(), '20120208', 'all' ); 

	if ( isset( $_GET['page'] ) && $_GET['page'] == 'panel' ) {

		wp_enqueue_script( 'weblusive-admin-colorpicker');  
		wp_enqueue_script( 'weblusive-admin-helper' );  
		wp_enqueue_script( 'weblusive-admin-slider' );  
	}
	
	wp_enqueue_script( 'weblusive-admin-main' );
	wp_enqueue_style( 'weblusive-style' );

}
add_action( 'admin_enqueue_scripts', 'weblusive_admin_register' ); 


/*-----------------------------------------------------------------------------------*/
# To change Insert into Post Text
/*-----------------------------------------------------------------------------------*/
function weblusive_options_setup() {
    global $pagenow;  
	
    if ( 'media-upload.php' == $pagenow || 'async-upload.php' == $pagenow )
        add_filter( 'gettext', 'weblusive_replace_thickbox_text'  , 1, 3 ); 
} 
add_action( 'admin_init', 'weblusive_options_setup' ); 
  
function weblusive_replace_thickbox_text($translated_text, $text, $domain) { 
    if ('Insert into Post' == $text) { 
	
        $referer = strpos( wp_get_referer(), 'weblusive-settings' );
        if ( $referer != '' )
            return __('Use this image', 'Sility' ); 
    }  
    return $translated_text;  
}  
	

/*-----------------------------------------------------------------------------------*/
# get Google Fonts
/*-----------------------------------------------------------------------------------*/
require ('google-fonts.php');
$google_font_array = json_decode ($google_api_output,true) ;
	
$items = $google_font_array['items'];
	
$options_fonts=array();
$options_fonts[''] = "Default Font" ;
$fontID = 0;
foreach ($items as $item) {
	$fontID++;
	$variants='';
	$variantCount=0;
	foreach ($item['variants'] as $variant) {
		$variantCount++;
		if ($variantCount>1) { $variants .= '|'; }
		$variants .= $variant;
	}
	$variantText = ' (' . $variantCount . ' Varaints' . ')';
	if ($variantCount <= 1) $variantText = '';
	$options_fonts[ $item['family'] . ':' . $variants ] = $item['family']. $variantText;
}


/*-----------------------------------------------------------------------------------*/
# Clean options before store it in DB
/*-----------------------------------------------------------------------------------*/
function weblusive_clean_options(&$value) {
  $value = htmlspecialchars(stripslashes($value), ENT_NOQUOTES, 'UTF-8');
}

	
/*-----------------------------------------------------------------------------------*/
# Options Array
/*-----------------------------------------------------------------------------------*/
$array_options = 
	array(
		"weblusive_home_cats",
		"weblusive_options"
	);
	
	
/*-----------------------------------------------------------------------------------*/
# Save Theme Settings
/*-----------------------------------------------------------------------------------*/	
function weblusive_save_settings ( $data , $refresh = 0 ) {
	global $array_options ;
		
	foreach( $array_options as $option ){
		if( isset( $data[$option] )){
			array_walk_recursive( $data[$option] , 'weblusive_clean_options');
			update_option( $option ,  $data[$option]   );
		}
		elseif( !isset( $data[$option] ) && $option != 'weblusive_options' ){
			delete_option($option);
		}		
	}

	if( $refresh == 2 )  die('2');
	elseif( $refresh == 1 )	die('1');
}
	
	
/*-----------------------------------------------------------------------------------*/
# Save Options
/*-----------------------------------------------------------------------------------*/
add_action('wp_ajax_test_theme_data_save', 'weblusive_save_ajax');
function weblusive_save_ajax() {
	
	check_ajax_referer('test-theme-data', 'security');
	$data = $_POST;
	$refresh = 1;

	if( isset($data['weblusive_import']) ){
		$refresh = 2;
		$data = unserialize(base64_decode( $data['weblusive_import'] ));
	}
	
	weblusive_save_settings ($data , $refresh );
	
}


/*-----------------------------------------------------------------------------------*/
# Add Panel Page
/*-----------------------------------------------------------------------------------*/
function weblusive_add_admin() {

	$current_page = isset( $_REQUEST['page'] ) ? $_REQUEST['page'] : '';

	$icon = get_template_directory_uri().'/library/admin-panel/images/weblusive_logo.png';
	add_menu_page(theme_name.' Settings', theme_name ,'switch_themes', 'panel' , 'panel_options', $icon  );
	$theme_page = add_submenu_page('panel',theme_name.' Settings', theme_name.' Settings','switch_themes', 'panel' , 'panel_options');

	add_action( 'admin_head-'. $theme_page, 'weblusive_admin_head' );
	function weblusive_admin_head(){
	
	?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {

		  jQuery('.on-of').checkbox({empty:'<?php echo get_template_directory_uri(); ?>/library/admin-panel/images/empty.png'});

		  jQuery('form#weblusive_form').submit(function() {
			   tinyMCE.triggerSave();
		  	//Disable Empty options
			  jQuery('form#weblusive_form input, form#weblusive_form textarea, form#weblusive_form select').each(function() {
					if (!jQuery(this).val()) jQuery(this).attr("disabled", true );
			  });
			  
			  var data = jQuery(this).serialize();
			  
			//Enable Empty options
			  jQuery('form#weblusive_form input:disabled, form#weblusive_form textarea:disabled, form#weblusive_form select:disabled').attr("disabled", false );
			  
			  jQuery.post(ajaxurl, data, function(response) {
				  if(response == 1) {
					  jQuery('#save-alert').addClass('save-done');
					  t = setTimeout('fade_message()', 1000);
				  }
				else if( response == 2 ){
					location.reload();
				}
				else {
					 jQuery('#save-alert').addClass('save-error');
					  t = setTimeout('fade_message()', 1000);
				  }
			  });
			  return false;
		  });
		  
		});
		
		function fade_message() {
			jQuery('#save-alert').fadeOut(function() {
				jQuery('#save-alert').removeClass('save-done');
			});
			clearTimeout(t);
		}
				
		jQuery(function() {
			jQuery( "#cat_sortable" ).sortable({placeholder: "ui-state-highlight"});
			jQuery( "#customList" ).sortable({placeholder: "ui-state-highlight"});
			jQuery( "#tabs_cats" ).sortable({placeholder: "ui-state-highlight"});
		});
	</script>
	<?php
		wp_print_scripts('media-upload');
		wp_enqueue_script('thickbox');
		wp_enqueue_style('thickbox');
		do_action('admin_print_styles');
	}
	if( isset( $_REQUEST['action'] ) ){
		if( 'reset' == $_REQUEST['action']  && $current_page == 'panel' && check_admin_referer('reset-action-code' , 'resetnonce') ) {
			$default_data = array();
			weblusive_save_settings($default_data);
			header("Location: admin.php?page=panel&reset=true");
			die;
		}
	}
}


/*-----------------------------------------------------------------------------------*/
# Add Options
/*-----------------------------------------------------------------------------------*/
function weblusive_options($value){
	global $options_fonts;
?>
	<div class="option-item" id="<?php echo $value['id'] ?>-item">
		<span class="label"><?php  echo $value['name']; ?></span>
	<?php
	switch ( $value['type'] ) {
	
		case 'text': ?>
			<input  name="weblusive_options[<?php echo $value['id']; ?>]" id="<?php  echo $value['id']; ?>" type="text" value="<?php echo weblusive_get_option( $value['id'] ); ?>" />
			<?php if( isset( $value['extra_text'] ) ) : ?><span class="extra-text"><?php echo $value['extra_text'] ?></span><?php endif; ?>
			<?php
				if( $value['id']=="slider_tag" || $value['id']=="breaking_tag"){
				$tags = get_tags('orderby=count&order=desc&number=50'); ?>
				<a style="cursor:pointer" title="Choose from the most used tags" onclick="toggleVisibility('<?php echo $value['id']; ?>_tags');"><img src="<?php echo get_template_directory_uri(); ?>/library/admin-panel/images/expand.png" alt="" /></a>
				<span class="tags-list" id="<?php echo $value['id']; ?>_tags">
					<?php foreach ($tags as $tag){?>
						<a style="cursor:pointer" onclick="if(<?php echo $value['id'] ?>.value != ''){ var sep = ' , '}else{var sep = ''} <?php echo $value['id'] ?>.value=<?php echo $value['id'] ?>.value+sep+(this.rel);" rel="<?php echo $tag->name ?>"><?php echo $tag->name ?></a>
					<?php } ?>
				</span>
			<?php } ?>		
		<?php 
		break;

		case 'arrayText':  $currentValue = weblusive_get_option( $value['id'] );?>
			<input  name="weblusive_options[<?php echo $value['id']; ?>][<?php echo $value['key']; ?>]" id="<?php  echo $value['id']; ?>[<?php echo $value['key']; ?>]" type="text" value="<?php echo $currentValue[$value['key']] ?>" />	
		<?php 
		break;

		case 'short-text': ?>
			<input style="width:50px" name="weblusive_options[<?php echo $value['id']; ?>]" id="<?php  echo $value['id']; ?>" type="text" value="<?php echo weblusive_get_option( $value['id'] ); ?>" />
		<?php 
		break;
		
		case 'checkbox':
			if(weblusive_get_option($value['id'])){$checked = "checked=\"checked\"";  } else{$checked = "";} ?>
				<input class="on-of" type="checkbox" name="weblusive_options[<?php echo $value['id'] ?>]" id="<?php echo $value['id'] ?>" value="true" <?php echo $checked; ?> />			
		<?php	
		break;


		case 'radio':
		?>
			<div style="float:left; width: 295px;">
				<?php foreach ($value['options'] as $key => $option) { ?>
				<label style="display:block; margin-bottom:8px;"><input name="weblusive_options[<?php echo $value['id']; ?>]" id="<?php echo $value['id']; ?>" type="radio" value="<?php echo $key ?>" <?php if ( weblusive_get_option( $value['id'] ) == $key) { echo ' checked="checked"' ; } ?>> <?php echo $option; ?></label>
				<?php } ?>
			</div>
		<?php
		break;
		
		case 'select':
		?>
			<select name="weblusive_options[<?php echo $value['id']; ?>]" id="<?php echo $value['id']; ?>">
				<?php foreach ($value['options'] as $key => $option) { ?>
				<option value="<?php echo $key ?>" <?php if ( weblusive_get_option( $value['id'] ) == $key) { echo ' selected="selected"' ; } ?>><?php echo $option; ?></option>
				<?php } ?>
			</select>
		<?php
		break;
		
		case 'textarea':
		
		wp_editor(htmlspecialchars_decode( weblusive_get_option($value['id'])), $value['id'], array( 'textarea_name' => 'weblusive_options['.$value['id'].']', 'media_buttons' => false, 'textarea_rows' => 10 /* 'teeny' => true */) ); 
		?>
		<?php
		break;

		case 'upload':
		?>
				<input id="<?php echo $value['id']; ?>" class="img-path" type="text" size="56" style="direction:ltr; text-align:left" name="weblusive_options[<?php echo $value['id']; ?>]" value="<?php echo weblusive_get_option($value['id']); ?>" />
				<input id="upload_<?php echo $value['id']; ?>_button" type="button" class="small_button" value="Upload" />
					
				<div id="<?php echo $value['id']; ?>-preview" class="img-preview" <?php if(!weblusive_get_option( $value['id'] )) echo 'style="display:none;"' ?>>
					<img src="<?php if(weblusive_get_option( $value['id'] )) echo weblusive_get_option( $value['id'] ); else echo get_template_directory_uri().'/library/admin-panel/images/spacer.png'; ?>" alt="" />
					<a class="del-img" title="Delete"></a>
				</div>
		<?php
		break;

		case 'slider':
		?>
				<div id="<?php echo $value['id']; ?>-slider"></div>
				<input type="text" id="<?php echo $value['id']; ?>" value="<?php echo weblusive_get_option($value['id']); ?>" name="weblusive_options[<?php echo $value['id']; ?>]" style="width:50px;" /> <?php echo $value['unit']; ?>
				<script>
				  jQuery(document).ready(function() {
					jQuery("#<?php echo $value['id']; ?>-slider").slider({
						range: "min",
						min: <?php echo $value['min']; ?>,
						max: <?php echo $value['max']; ?>,
						value: <?php if( weblusive_get_option($value['id']) ) echo weblusive_get_option($value['id']); else echo 0; ?>,

						slide: function(event, ui) {
						jQuery('#<?php echo $value['id']; ?>').attr('value', ui.value );
						}
					});
				  });
				</script>
		<?php
		break;
		
		
		case 'background':
			$current_value = weblusive_get_option($value['id']);
		?>
				<input id="<?php echo $value['id']; ?>-img" class="img-path" type="text" size="56" style="direction:ltr; text-align:left" name="weblusive_options[<?php echo $value['id']; ?>][img]" value="<?php echo isset( $current_value['img']) ? $current_value['img'] : ''; ?>" />
				<input id="upload_<?php echo $value['id']; ?>_button" type="button" class="small_button" value="Upload" />
					
				<div style="margin-top:15px; clear:both">
					<div id="<?php echo $value['id']; ?>colorSelector" class="color-pic"><div style="background-color:<?php echo isset($current_value['color']) ? $current_value['color'] : '' ; ?>"></div></div>
					<input style="width:80px; margin-right:5px;"  name="weblusive_options[<?php echo $value['id']; ?>][color]" id="<?php  echo $value['id']; ?>color" type="text" value="<?php echo isset($current_value['color']) ? $current_value['color'] : '' ; ?>" />
					
					<select name="weblusive_options[<?php echo $value['id']; ?>][repeat]" id="<?php echo $value['id']; ?>[repeat]" style="width:96px;">
						<option value="" <?php if (isset($current_value['repeat']) && !$current_value['repeat'] ) { echo ' selected="selected"' ; } ?>></option>
						<option value="repeat" <?php if (isset($current_value['repeat']) && $current_value['repeat']  == 'repeat' ) { echo ' selected="selected"' ; } ?>>repeat</option>
						<option value="no-repeat" <?php if (isset($current_value['repeat']) && $current_value['repeat']  == 'no-repeat') { echo ' selected="selected"' ; } ?>>no-repeat</option>
						<option value="repeat-x" <?php if (isset($current_value['repeat']) && $current_value['repeat'] == 'repeat-x') { echo ' selected="selected"' ; } ?>>repeat-x</option>
						<option value="repeat-y" <?php if (isset($current_value['repeat']) && $current_value['repeat'] == 'repeat-y') { echo ' selected="selected"' ; } ?>>repeat-y</option>
					</select>

					<select name="weblusive_options[<?php echo $value['id']; ?>][attachment]" id="<?php echo $value['id']; ?>[attachment]" style="width:96px;">
						<option value="" <?php if (isset($current_value['attachment']) && !$current_value['attachment'] ) { echo ' selected="selected"' ; } ?>></option>
						<option value="fixed" <?php if (isset($current_value['attachment']) && $current_value['attachment']  == 'fixed' ) { echo ' selected="selected"' ; } ?>>Fixed</option>
						<option value="scroll" <?php if (isset($current_value['attachment']) && $current_value['attachment']  == 'scroll') { echo ' selected="selected"' ; } ?>>scroll</option>
					</select>
					
					<select name="weblusive_options[<?php echo $value['id']; ?>][hor]" id="<?php echo $value['id']; ?>[hor]" style="width:96px;">
						<option value="" <?php if (isset($current_value['hor']) && !$current_value['hor'] ) { echo ' selected="selected"' ; } ?>></option>
						<option value="left" <?php if (isset($current_value['hor']) && $current_value['hor']  == 'left' ) { echo ' selected="selected"' ; } ?>>Left</option>
						<option value="right" <?php if (isset($current_value['hor']) && $current_value['hor']  == 'right') { echo ' selected="selected"' ; } ?>>Right</option>
						<option value="center" <?php if (isset($current_value['hor']) && $current_value['hor'] == 'center') { echo ' selected="selected"' ; } ?>>Center</option>
					</select>
					
					<select name="weblusive_options[<?php echo $value['id']; ?>][ver]" id="<?php echo $value['id']; ?>[ver]" style="width:100px;">
						<option value="" <?php if (isset($current_value['ver']) && !$current_value['ver'] ) { echo ' selected="selected"' ; } ?>></option>
						<option value="top" <?php if (isset($current_value['ver']) && $current_value['ver']  == 'top' ) { echo ' selected="selected"' ; } ?>>Top</option>
						<option value="center" <?php if (isset($current_value['ver']) && $current_value['ver'] == 'center') { echo ' selected="selected"' ; } ?>>Center</option>
						<option value="bottom" <?php if (isset($current_value['ver']) && $current_value['ver']  == 'bottom') { echo ' selected="selected"' ; } ?>>Bottom</option>
					</select>
				</div>
				<div id="<?php echo $value['id']; ?>-preview" class="img-preview" <?php if(isset($current_value['img']) && !$current_value['img']  ) echo 'style="display:none;"' ?>>
					<img src="<?php if(isset($current_value['img']) && $current_value['img'] ) echo $current_value['img'] ; else echo get_template_directory_uri().'/library/admin-panel/images/spacer.png'; ?>" alt="" />
					<a class="del-img" title="Delete"></a>
				</div>
					
				<script>
				jQuery('#<?php echo $value['id']; ?>colorSelector').ColorPicker({
					color: '<?php echo isset($current_value['color']) ? $current_value['color'] : '' ; ?>',
					onShow: function (colpkr) {
						jQuery(colpkr).fadeIn(500);
						return false;
					},
					onHide: function (colpkr) {
						jQuery(colpkr).fadeOut(500);
						return false;
					},
					onChange: function (hsb, hex, rgb) {
						jQuery('#<?php echo $value['id']; ?>colorSelector div').css('backgroundColor', '#' + hex);
						jQuery('#<?php echo $value['id']; ?>color').val('#'+hex);
					}
				});
				weblusive_styling_uploader('<?php echo $value['id']; ?>');
				</script>
		<?php
		break;
		
		
		case 'color':
		?>
			<div id="<?php echo $value['id']; ?>colorSelector" class="color-pic"><div style="background-color:<?php echo weblusive_get_option($value['id']) ; ?>"></div></div>
			<input style="width:80px; margin-right:5px;"  name="weblusive_options[<?php echo $value['id']; ?>]" id="<?php echo $value['id']; ?>" type="text" value="<?php echo weblusive_get_option($value['id']) ; ?>" />
							
			<script>
				jQuery('#<?php echo $value['id']; ?>colorSelector').ColorPicker({
					color: '<?php echo weblusive_get_option($value['id']) ; ?>',
					onShow: function (colpkr) {
						jQuery(colpkr).fadeIn(500);
						return false;
					},
					onHide: function (colpkr) {
						jQuery(colpkr).fadeOut(500);
						return false;
					},
					onChange: function (hsb, hex, rgb) {
						jQuery('#<?php echo $value['id']; ?>colorSelector div').css('backgroundColor', '#' + hex);
						jQuery('#<?php echo $value['id']; ?>').val('#'+hex);
					}
				});
				</script>
		<?php
		break;

		
		case 'typography':
			$current_value = weblusive_get_option($value['id']);
			
		?>
			
				<div style="clear:both;"></div>
				<div style="clear:both; padding:10px 14px; margin:0 -15px;">
					<div id="<?php echo $value['id']; ?>colorSelector" class="color-pic"><div style="background-color:<?php echo $current_value['color'] ; ?>"></div></div>
					<input style="width:80px; margin-right:5px;"  name="weblusive_options[<?php echo $value['id']; ?>][color]" id="<?php  echo $value['id']; ?>color" type="text" value="<?php echo $current_value['color'] ; ?>" />
					
					<select name="weblusive_options[<?php echo $value['id']; ?>][size]" id="<?php echo $value['id']; ?>[size]" style="width:55px;">
						<option value="" <?php if (!$current_value['size'] ) { echo ' selected="selected"' ; } ?>></option>
					<?php for( $i=1 ; $i<101 ; $i++){ ?>
						<option value="<?php echo $i ?>" <?php if (( $current_value['size']  == $i ) ) { echo ' selected="selected"' ; } ?>><?php echo $i ?></option>
					<?php } ?>
					</select>
					
					<select name="weblusive_options[<?php echo $value['id']; ?>][font]" id="<?php echo $value['id']; ?>[font]" style="width:150px;" class="font-choose">				
					<?php foreach( $options_fonts as $font => $font_name ){
						if( empty($font_name) || $font_name == 'Arabic' ){ ?>
						<optgroup disabled="disabled" label="<?php echo $font_name ?>"></optgroup>
						<?php  }else{ ?>
						<option value="<?php echo $font ?>" <?php if ( $current_value['font']  == $font ) { echo ' selected="selected"' ; } ?>><?php echo $font_name ?></option>
					<?php  }
					} ?>
					</select>
					<div class="font-preview"></div>
					<select name="weblusive_options[<?php echo $value['id']; ?>][weight]" id="<?php echo $value['id']; ?>[weight]" style="width:96px;">
						<option value="" <?php if ( !$current_value['weight'] ) { echo ' selected="selected"' ; } ?>></option>
						<option value="normal" <?php if ( $current_value['weight']  == 'normal' ) { echo ' selected="selected"' ; } ?>>Normal</option>
						<option value="bold" <?php if ( $current_value['weight']  == 'bold') { echo ' selected="selected"' ; } ?>>Bold</option>
						<option value="lighter" <?php if ( $current_value['weight'] == 'lighter') { echo ' selected="selected"' ; } ?>>Lighter</option>
						<option value="bolder" <?php if ( $current_value['weight'] == 'bolder') { echo ' selected="selected"' ; } ?>>Bolder</option>
						<option value="100" <?php if ( $current_value['weight'] == '100') { echo ' selected="selected"' ; } ?>>100</option>
						<option value="200" <?php if ( $current_value['weight'] == '200') { echo ' selected="selected"' ; } ?>>200</option>
						<option value="300" <?php if ( $current_value['weight'] == '300') { echo ' selected="selected"' ; } ?>>300</option>
						<option value="400" <?php if ( $current_value['weight'] == '400') { echo ' selected="selected"' ; } ?>>400</option>
						<option value="500" <?php if ( $current_value['weight'] == '500') { echo ' selected="selected"' ; } ?>>500</option>
						<option value="600" <?php if ( $current_value['weight'] == '600') { echo ' selected="selected"' ; } ?>>600</option>
						<option value="700" <?php if ( $current_value['weight'] == '700') { echo ' selected="selected"' ; } ?>>700</option>
						<option value="800" <?php if ( $current_value['weight'] == '800') { echo ' selected="selected"' ; } ?>>800</option>
						<option value="900" <?php if ( $current_value['weight'] == '900') { echo ' selected="selected"' ; } ?>>900</option>
					</select>
					
					<select name="weblusive_options[<?php echo $value['id']; ?>][style]" id="<?php echo $value['id']; ?>[style]" style="width:100px;">
						<option value="" <?php if ( !$current_value['style'] ) { echo ' selected="selected"' ; } ?>></option>
						<option value="normal" <?php if ( $current_value['style']  == 'normal' ) { echo ' selected="selected"' ; } ?>>Normal</option>
						<option value="italic" <?php if ( $current_value['style'] == 'italic') { echo ' selected="selected"' ; } ?>>Italic</option>
						<option value="oblique" <?php if ( $current_value['style']  == 'oblique') { echo ' selected="selected"' ; } ?>>oblique</option>
					</select>
				</div>

					
				<script>
				jQuery('#<?php echo $value['id']; ?>colorSelector').ColorPicker({
					color: '#<?php echo $current_value['color'] ; ?>',
					onShow: function (colpkr) {
						jQuery(colpkr).fadeIn(500);
						return false;
					},
					onHide: function (colpkr) {
						jQuery(colpkr).fadeOut(500);
						return false;
					},
					onChange: function (hsb, hex, rgb) {
						jQuery('#<?php echo $value['id']; ?>colorSelector div').css('backgroundColor', '#' + hex);
						jQuery('#<?php echo $value['id']; ?>color').val('#'+hex);
					}
				});
				</script>
		<?php
		break;
	
	}
	
	?>
	
	<?php if( isset( $value['help'] ) ) : ?>
		<a class="mo-help tooltip"  title="<?php echo $value['help'] ?>"></a>
		<?php endif; ?>
	</div>
			
<?php
}
add_action('admin_menu', 'weblusive_add_admin'); 

?>