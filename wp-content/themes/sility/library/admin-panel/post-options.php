<?php
add_action("admin_init", "posts_init");
function posts_init(){
	add_meta_box("post_options", theme_name ." - Post Options", "post_options", "post", "normal", "high");
	add_meta_box("page_options", theme_name ." - Page Options", "page_options", "page", "normal", "high");
	add_meta_box("portfolio_options", theme_name ." - Portfolio item options", "portfolio_options", "portfolio", "normal", "high");
}

function portfolio_options(){
	global $post ;
	$get_meta = get_post_custom($post->ID);
	$weblusive_sidebar_pos = isset($get_meta["_weblusive_sidebar_pos"]) ? $get_meta["_weblusive_sidebar_pos"][0] : 'default';
	wp_enqueue_script( 'weblusive-admin-slider' );  

?>	
		<div class="weblusivepanel-item">
			<input type="hidden" name="weblusive_hidden_flag" value="true" />	
		
			<div class="weblusivepanel-item">
				<h3>General Options</h3>
				<?php
				weblusive_post_options(				
						array(	
							"name" => "Tagline",
							"id" => "_weblusive_tagline",
							"type" => "text",
							"hint"=> "A custom text which will appear after the page title."));
					
					weblusive_post_options(				
						array(	
							"name" => "Alternative page title",
							"id" => "_weblusive_altpagetitle",
							"type" => "text",
							"hint"=> "Set if you'd like a title for the page, different from the one displayed in the menu."));
					
					weblusive_post_options(				
						array(	"name" => "Hide inner heading block",
								"id" => "_weblusive_hide_innerheading",
								"type" => "checkbox",
								"hint" =>  "Hides title/breadcrumbs block for current page. Will override the global settings set via theme's admin panel."
						));
					
				?>
			</div>
			<h3>Post Head Options</h3>
			<?php	

			weblusive_post_options(				
				array(	"name" => "Display",
						"id" => "_weblusive_post_head",
						"type" => "select",
						"options" => array(
							'none'=> 'None',
							'slider'=> 'Slider',
							'youtubevideo' => 'Youtube video',
							'vimeovideo' => 'Vimeo video',
							'thumb'=> 'Featured Image (thumb+title+desc)',
							'full'=> 'Featured Image (Full size)'
						)));
			
			global $post;
			$orig_post = $post;
			
			$sliders = array();
			$custom_slider = new WP_Query( array( 'post_type' => 'themeplaza_slider', 'posts_per_page' => -1 ) );
			while ( $custom_slider->have_posts() ) {
				$custom_slider->the_post();
				$sliders[get_the_ID()] = get_the_title();
			}
			$post = $orig_post;
			wp_reset_query();
	
			weblusive_post_options(				
				array(	"name" => "Custom Slider",
						"id" => "_weblusive_post_slider",
						"type" => "select",
						"options" => $sliders ));

			weblusive_post_options(				
				array(	"name" => "Revolution slider",
						"id" => "_weblusive_revslider",
						"type" => "text"));
			
			weblusive_post_options(				
				array(	"name" => "Video ID",
						"id" => "_weblusive_youtube",
						"type" => "text",
						"hint" => "Paste the youtube video ID here."));
			weblusive_post_options(				
				array(	"name" => "Video ID",
						"id" => "_weblusive_vimeo",
						"type" => "text",
						"hint" => "Paste the vimeo video ID here."));

			?>
		</div>
		<div class="weblusivepanel-item">
			<h3>Sidebar Options</h3>
			<div class="option-item">
				<?php
					$checked = 'checked="checked"';
				?>
				<ul id="sidebar-position-options" class="weblusive-options">
					<li>
						<input id="_weblusive_sidebar_pos"  name="_weblusive_sidebar_pos" type="radio" value="default" <?php if($weblusive_sidebar_pos == 'default' || !$weblusive_sidebar_pos ) echo $checked; ?> />
						<a class="checkbox-select" href="#"><img src="<?php echo get_template_directory_uri(); ?>/library/admin-panel/images/sidebar-default.png" /></a>
					</li>						<li>
						<input id="_weblusive_sidebar_pos"  name="_weblusive_sidebar_pos" type="radio" value="right" <?php if($weblusive_sidebar_pos == 'right' ) echo $checked; ?> />
						<a class="checkbox-select" href="#"><img src="<?php echo get_template_directory_uri(); ?>/library/admin-panel/images/sidebar-right.png" /></a>
					</li>
					<li>
						<input id="_weblusive_sidebar_pos"  name="_weblusive_sidebar_pos" type="radio" value="left" <?php if($weblusive_sidebar_pos == 'left') echo $checked; ?> />
						<a class="checkbox-select" href="#"><img src="<?php echo get_template_directory_uri(); ?>/library/admin-panel/images/sidebar-left.png" /></a>
					</li>
					<li>
						<input id="_weblusive_sidebar_pos"  name="_weblusive_sidebar_pos" type="radio" value="full" <?php if($weblusive_sidebar_pos == 'full') echo $checked; ?> />
						<a class="checkbox-select" href="#"><img src="<?php echo get_template_directory_uri(); ?>/library/admin-panel/images/sidebar-no.png" /></a>
					</li>
				</ul>
			</div>
			<?php
			$sidebars = weblusive_get_option( 'sidebars' ) ;
			$new_sidebars = array(''=> 'None', 'primary-widget-area'=> 'Default (Primary Widget Area)');
			if(isset($sidebars) && is_array($sidebars) && !empty($sidebars)){
				foreach ($sidebars as $sidebar) {
					$new_sidebars[$sidebar] = $sidebar;
				}
			}
					
			weblusive_post_options(				
				array(	"name" => "Choose Sidebar",
						"id" => "_weblusive_sidebar_post",
						"type" => "select",
						"options" => $new_sidebars ));
			?>
		</div>
		<div class="weblusivepanel-item">
			<h3>General Options</h3>
			<?php	
			
			weblusive_post_options(				
				array(	"name" => "Item links to inner page",
						"id" => "_portfolio_no_lightbox",
						"type" => "checkbox",
						"hint" =>  "Thumbnail to link directly to the portfolio item detail or custom URL instead of opening the full image in the lightbox"
				));
			
			
			weblusive_post_options(				
				array(	"name" => "Portfolio Item custom destination URL",
						"id" => "_portfolio_link",
						"hint" => "If you want the portfolio item have custom link rather going to item's details page. Example: http://www.weblusive.com",
						"type" => "text")
				);
											
			weblusive_post_options(				
				array(	"name" => "Portfolio third-party video in lightbox",
						"id" => "_portfolio_video",
						"hint" => "<strong>Supports Youtube, Vimeo, etc.. </strong><br /> Example:http://www.youtube.com/watch?v=ehuwoGVLyhg",
						"type" => "text"));
											
			weblusive_post_options(				
				array(	"name" => "Make project featured",
						"id" => "_portfolio_featured",
						"hint" => "If set, this item will appear in portfolio's featured items list when using [list_portfolio /] shortcode.",
						"type" => "checkbox"));
			?>
		</div>		
  <?php
}

function post_options(){
	global $post ;
	$get_meta = get_post_custom($post->ID);
	$format = get_post_format( $post->ID );
	$weblusive_sidebar_pos = isset($get_meta["_weblusive_sidebar_pos"]) ? $get_meta["_weblusive_sidebar_pos"][0] : 'default';
	wp_enqueue_script( 'weblusive-admin-slider');
	
?>	
<script>
jQuery(document).ready(function() {
	jQuery("#_blog_link-item, #_blog_video-item, #_blog_audio-item, #_blog_quote-item, #_blog_status-item, #_blog_video_selfhosted-item").hide();
	var selected_item = jQuery("#post-format-<?php echo $format?>").val();
	jQuery("#_blog_"+selected_item+"-item").show();
	if (selected_item == 'video') {
		jQuery('#_blog_video_selfhosted-item').show();
	}

	jQuery(".post-format").change(function(){
		var selected_item = jQuery(this).val();
		jQuery("#_blog_link-item, #_blog_video-item, #_blog_audio-item, #_blog_quote-item, #_blog_status-item, #_blog_video_selfhosted-item").hide();
		jQuery("#_blog_"+selected_item+"-item").show();
		if (selected_item == 'video') {
			jQuery('#_blog_video_selfhosted-item').show();
		}
	});
});
</script>

		<div class="weblusivepanel-item">
		<input type="hidden" name="weblusive_hidden_flag" value="true" />	
		<div class="weblusivepanel-item">
			<h3>Page Options</h3>
			<?php
			weblusive_post_options(				
					array(	
						"name" => "Tagline",
						"id" => "_weblusive_tagline",
						"type" => "text",
						"hint"=> "A custom text which will appear after the page title."));
				
				weblusive_post_options(				
					array(	
						"name" => "Alternative page title",
						"id" => "_weblusive_altpagetitle",
						"type" => "text",
						"hint"=> "Set if you'd like a title for the page, different from the one displayed in the menu."));
				
				weblusive_post_options(				
					array(	"name" => "Hide inner heading block",
							"id" => "_weblusive_hide_innerheading",
							"type" => "checkbox",
							"hint" =>  "Hides title/breadcrumbs block for current page. Will override the global settings set via theme's admin panel."
					));
				weblusive_post_options(				
				array(	"name" => "Thumbnail Position",
						"id" => "_weblusive_post_img_pos",
						"type" => "select",
						"options" => array(
							'image-top'=> 'Top',
							'image-left'=> 'Left',
							'image-right'=>'Right',
							'image-none'=>'None'
						)));
			?>
		</div>
		<h3>General Options</h3>
			<?php 
				
				weblusive_post_options(				
				array(	"name" => "Video URL",
						"id" => "_blog_video",
						"hint" => "Paste the third party video url here directly. MUST start with http://.",
						"type" => "text")
				);
				
				weblusive_post_options(				
				array(	"name" => "Self hosted video",
						"id" => "_blog_video_selfhosted",
						"hint" => " Click on 'Add media' button and paste the generated embed code here.",
						"type" => "text")
				);
				
				
				weblusive_post_options(				
				array(	"name" => "Link",
						"id" => "_blog_link",
						"hint" => "Set your URL here.",
						"type" => "text")
				);
			
				weblusive_post_options(				
				array(	"name" => "Quote",
						"id" => "_blog_quote",
						"hint" => "",
						"type" => "textarea")
				);
			
				weblusive_post_options(				
				array(	"name" => "Audio embed code",
						"id" => "_blog_audio",
						"hint" => "Add your audio file via 'Add media' button and paste the generated embed code here.",
						"type" => "text")
				);
				
				weblusive_post_options(				
				array(	"name" => "Status",
						"id" => "_blog_status",
						"hint" => "Put a status here to show on the listing.",
						"type" => "textarea")
				);
			?>
		</div>
		
		<div class="weblusivepanel-item">
			<h3>Sidebar Options</h3>
			<div class="option-item">
				<?php
					$checked = 'checked="checked"';
				?>
				<ul id="sidebar-position-options" class="weblusive-options">
					<li>
						<input id="_weblusive_sidebar_pos"  name="_weblusive_sidebar_pos" type="radio" value="default" <?php if($weblusive_sidebar_pos == 'default' || !$weblusive_sidebar_pos ) echo $checked; ?> />
						<a class="checkbox-select" href="#"><img src="<?php echo get_template_directory_uri(); ?>/library/admin-panel/images/sidebar-default.png" /></a>
					</li>						<li>
						<input id="_weblusive_sidebar_pos"  name="_weblusive_sidebar_pos" type="radio" value="right" <?php if($weblusive_sidebar_pos == 'right' ) echo $checked; ?> />
						<a class="checkbox-select" href="#"><img src="<?php echo get_template_directory_uri(); ?>/library/admin-panel/images/sidebar-right.png" /></a>
					</li>
					<li>
						<input id="_weblusive_sidebar_pos"  name="_weblusive_sidebar_pos" type="radio" value="left" <?php if($weblusive_sidebar_pos == 'left') echo $checked; ?> />
						<a class="checkbox-select" href="#"><img src="<?php echo get_template_directory_uri(); ?>/library/admin-panel/images/sidebar-left.png" /></a>
					</li>
					<li>
						<input id="_weblusive_sidebar_pos"  name="_weblusive_sidebar_pos" type="radio" value="full" <?php if($weblusive_sidebar_pos == 'full') echo $checked; ?> />
						<a class="checkbox-select" href="#"><img src="<?php echo get_template_directory_uri(); ?>/library/admin-panel/images/sidebar-no.png" /></a>
					</li>
				</ul>
			</div>
			<?php
			$sidebars = weblusive_get_option( 'sidebars' ) ;
			$new_sidebars = array(''=> 'None', 'primary-widget-area'=> 'Default (Primary Widget Area)');
			if(isset($sidebars) && is_array($sidebars) && !empty($sidebars)){
				foreach ($sidebars as $sidebar) {
					$new_sidebars[$sidebar] = $sidebar;
				}
			}
					
			weblusive_post_options(				
				array(	"name" => "Choose Sidebar",
						"id" => "_weblusive_sidebar_post",
						"type" => "select",
						"options" => $new_sidebars ));
			?>
		</div>
		
		
		<div class="weblusivepanel-item">
			<h3>Post Head Options</h3>
			<?php	

			weblusive_post_options(				
				array(	"name" => "Display",
						"id" => "_weblusive_post_head",
						"type" => "select",
						"options" => array(
							'none'=> 'None',
							'slider'=> 'Slider'
						)));
			
			global $post;
			$orig_post = $post;
			
			$sliders = array();
			$custom_slider = new WP_Query( array( 'post_type' => 'themeplaza_slider', 'posts_per_page' => -1 ) );
			while ( $custom_slider->have_posts() ) {
				$custom_slider->the_post();
				$sliders[get_the_ID()] = get_the_title();
			}
			$post = $orig_post;
			wp_reset_query();
	
			weblusive_post_options(				
				array(	"name" => "Custom Slider",
						"id" => "_weblusive_post_slider",
						"type" => "select",
						"options" => $sliders ));

			weblusive_post_options(				
				array(	"name" => "Revolution slider",
						"id" => "_weblusive_revslider",
						"type" => "text"));

			?>
		</div>	
  <?php
}

/*********************************************************************************************/

function page_options(){
	global $post ;
	$get_meta = get_post_custom($post->ID);
	$weblusive_sidebar_pos = isset ($get_meta["_weblusive_sidebar_pos"][0]) ? $get_meta["_weblusive_sidebar_pos"][0] : 'full';
	wp_enqueue_script( 'weblusive-admin-slider' );  
	
	$categories_obj = get_categories();
	$categories = array();
	$categories = array(''=> 'All Categories');
	foreach ($categories_obj as $pn_cat) {
		$categories[$pn_cat->cat_ID] = $pn_cat->cat_name;
	}
	
?>
		<input type="hidden" name="weblusive_hidden_flag" value="true" />	
		<div class="weblusivepanel-item">
			<h3>Sidebar Options</h3>
			<div class="option-item">
				<?php
					$checked = 'checked="checked"';
				?>
				<ul id="sidebar-position-options" class="weblusive-options">
					<li>
						<input id="_weblusive_sidebar_pos"  name="_weblusive_sidebar_pos" type="radio" value="default" <?php if($weblusive_sidebar_pos == 'default' || !$weblusive_sidebar_pos ) echo $checked; ?> />
						<a class="checkbox-select" href="#"><img src="<?php echo get_template_directory_uri(); ?>/library/admin-panel/images/sidebar-default.png" /></a>
					</li>						
					<li>
						<input id="_weblusive_sidebar_pos"  name="_weblusive_sidebar_pos" type="radio" value="right" <?php if($weblusive_sidebar_pos == 'right' ) echo $checked; ?> />
						<a class="checkbox-select" href="#"><img src="<?php echo get_template_directory_uri(); ?>/library/admin-panel/images/sidebar-right.png" /></a>
					</li>
					<li>
						<input id="_weblusive_sidebar_pos"  name="_weblusive_sidebar_pos" type="radio" value="left" <?php if($weblusive_sidebar_pos == 'left') echo $checked; ?> />
						<a class="checkbox-select" href="#"><img src="<?php echo get_template_directory_uri(); ?>/library/admin-panel/images/sidebar-left.png" /></a>
					</li>
					<li>
						<input id="_weblusive_sidebar_pos"  name="_weblusive_sidebar_pos" type="radio" value="full" <?php if($weblusive_sidebar_pos == 'full') echo $checked; ?> />
						<a class="checkbox-select" href="#"><img src="<?php echo get_template_directory_uri(); ?>/library/admin-panel/images/sidebar-no.png" /></a>
					</li>
				</ul>
			</div>
			<?php
			$sidebars = weblusive_get_option( 'sidebars' ) ;
			$new_sidebars = array(''=> 'None', 'primary-widget-area'=> 'Default (Primary Widget Area)');
			if(isset($sidebars) && is_array($sidebars) && !empty($sidebars)){
				foreach ($sidebars as $sidebar) {
					$new_sidebars[$sidebar] = $sidebar;
				}
			}
					
			weblusive_post_options(				
				array(	"name" => "Choose Sidebar",
						"id" => "_weblusive_sidebar_post",
						"type" => "select",
						"options" => $new_sidebars ));
			?>
		</div>
		<div class="weblusivepanel-item">
			<h3>General Options</h3>
			<?php
			weblusive_post_options(				
				array(	
					"name" => "Page type",
					"id" => "_weblusive_page_type",
					"type" => "select",
					"options" => array(
						'1'=> 'One page',
						'2'=> 'Standalone'
					)
				));
			weblusive_post_options(				
					array(	
						"name" => "Tagline",
						"id" => "_weblusive_tagline",
						"type" => "text",
						"hint"=> "A custom text which will appear after the page title."));
				
				weblusive_post_options(				
					array(	
						"name" => "Alternative page title",
						"id" => "_weblusive_altpagetitle",
						"type" => "text",
						"hint"=> "Set if you'd like a title for the page, different from the one displayed in the menu."));
				
				weblusive_post_options(				
					array(	"name" => "Hide inner heading block",
							"id" => "_weblusive_hide_innerheading",
							"type" => "checkbox",
							"hint" =>  "Hides title/breadcrumbs block for current page. Will override the global settings set via theme's admin panel."
					));
				
				weblusive_post_options(				
				array(	
					"name" => "Hide Page Title In Main Page",
					"id" => "_weblusive_page_title_hide",
					"type" => "checkbox",
				));
				
			?>
		</div>
		
		<div class="weblusivepanel-item">
			<h3>Head Options</h3>
			<?php
			
			weblusive_post_options(				
				array(	"name" => "Display",
						"id" => "_weblusive_post_head",
						"type" => "select",
						"options" => array(
							'none'=> 'None',
							'slider'=> 'Slider',
							'youtubevideo' => 'Youtube video',
							'vimeovideo' => 'Vimeo video',
							'thumb'=> 'Featured Image (thumb+title+desc)',
							'full'=> 'Featured Image (Full size)'
						)));


		
			global $post;
			$orig_post = $post;
			
			$sliders = array();
			$custom_slider = new WP_Query( array( 'post_type' => 'themeplaza_slider', 'posts_per_page' => -1 ) );
			while ( $custom_slider->have_posts() ) {
				$custom_slider->the_post();
				$sliders[get_the_ID()] = get_the_title();
			}
			$post = $orig_post;
			wp_reset_query();
	
			weblusive_post_options(				
				array(	"name" => "Custom Slider",
						"id" => "_weblusive_post_slider",
						"type" => "select",
						"options" => $sliders ));
			
			weblusive_post_options(				
				array(	"name" => "Revolution slider",
						"id" => "_weblusive_revslider",
						"type" => "text",
						"hint" => "Paste the slider shortcode here."));
			weblusive_post_options(				
				array(	"name" => "Video ID",
						"id" => "_weblusive_youtube",
						"type" => "text",
						"hint" => "Paste the youtube video ID here."));
			weblusive_post_options(				
				array(	"name" => "Video ID",
						"id" => "_weblusive_vimeo",
						"type" => "text",
						"hint" => "Paste the vimeo video ID here."));
				
			?>
		</div>
		<div class="weblusivepanel-item">
			<h3>Styling Options</h3>
			<div class="option-item">
				<?php
				weblusive_post_options(				
				array(	
					"name" => "Background image URL",
					"id" => "_weblusive_page_bg",
					"type" => "text",
					"hint"=> "Make sure it's an absolute URL. Example: http://www.website.com/images/bg.jpg"
				));
					
				weblusive_post_options(				
				array(	
					"name" => "Background color",
					"id" => "_weblusive_page_bgcolor",
					"type" => "text",
					"hint"=> "Put the hex color code or color name. Example: #ff0000. "
				));
				
				weblusive_post_options(				
				array(	
					"name" => "Background image repeat",
					"id" => "_weblusive_page_bgrepeat",
					"type" => "select",
					"options" => array(
						'repeat'=> 'Repeat',
						'repeat-x'=> 'Repeat-x',
						'repeat-y'=> 'Repeat-y',
						'no-repeat'=> 'No repeat'
					)
				));
				
				weblusive_post_options(				
				array(	
					"name" => "Individual elements color",
					"id" => "_weblusive_page_color",
					"type" => "text",
					"hint"=> "If set, all page elements which are not overridden by higher priority css will take the color set here."
				));
				
				?>
			</div>
		</div>
		<div class="weblusivepanel-item">
			
			<h3>Portfolio page Options</h3>
			<?php	
				weblusive_post_options(
					array(
					"id" => "_page_portfolio_cat",
					"name" => "Portfolio Categories",
					"hint" => "Choose only if this page uses a Portfolio page template",
					"type" => "portfolio_cat")
				);	
				weblusive_post_options(
					array(
					"id" => "_page_portfolio_num_items_page",
					"name" => "Portfolio items per page",
					"hint" => "Number of items displayed per page. Leave blank if you don't want to paginate the portfolio items.",
					"type"  => "slider",  
					"min"   => "0",  
					"max"   => "100",  
					"step"  => "1")
				);	
				weblusive_post_options(
					array(
						"id" => "_portfolio_type",
						"name" => "Portfolio type",
						"hint" => "Choose over animated portfolio with pagination (all items displayed in one page) or non-animated portfolio with pagination enabled.<br /> Applies only to portfolio pages.",
						"type" => "select",
						"options" => array('0' => "Animated without pagination", '1' => "Non-animated with pagination")
					)
				);
								
			?>	
		</div>

  <?php
}

add_action('save_post', 'save_postdata');
function save_postdata(){

	global $post;
	
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		return $post_id;
		
    if (isset($_POST['weblusive_hidden_flag'])) {
	
		$custom_meta_fields = array(
			'_weblusive_sidebar_pos',
			'_page_portfolio_cat',
			'_portfolio_item_layout',
			'_page_portfolio_num_items_page',
			'_portfolio_type',
			'_weblusive_sidebar_post',
			'_weblusive_post_head',
			'_weblusive_post_slider',
			'_weblusive_revslider',
			'_portfolio_no_lightbox',
			'_portfolio_item_width',
			'_portfolio_link',
			'_portfolio_video',
			'_portfolio_featured',
			'_portfolio_item_animation',
			'_portfolio_item_overlay',
			'_blog_video_selfhosted',
			'_blog_video',
			'_blog_audio',
			'_blog_status',
			'_blog_link',
			'_blog_quote',
			'_blog_mediatype',
			'_weblusive_vimeo',
			'_weblusive_youtube',
			'_weblusive_tagline',
			'_weblusive_altpagetitle',
			'_weblusive_hide_innerheading',
			'_weblusive_page_type',
			'_weblusive_page_title_color',
			'_weblusive_page_title_hide',
			'_weblusive_page_bg',
			'_weblusive_page_bgcolor',
			'_weblusive_page_bgrepeat',
			'_weblusive_page_color',
			'_weblusive_page_notoppadding',
			'_weblusive_page_nobottompadding',
			'_weblusive_header_bg',
			'_weblusive_post_img_pos'
		);
		
			
		foreach( $custom_meta_fields as $custom_meta_field ){
			if(isset($_POST[$custom_meta_field]) )
			{
				if(is_array($_POST[$custom_meta_field]))
				{
					$cats = '';
					foreach($_POST[$custom_meta_field] as $cat){
						$cats .= $cat . ",";
					}
					$data = substr($cats, 0, -1);
					update_post_meta($post->ID, $custom_meta_field, $data);
				}
				else
				{
					update_post_meta($post->ID, $custom_meta_field, htmlspecialchars(stripslashes($_POST[$custom_meta_field])) );
				}
			}
			else
			{
				delete_post_meta($post->ID, $custom_meta_field);
			}
		}
	
	}
}

/*********************************************************/

function weblusive_post_options($value){
	global $post;
?>

	<div class="option-item" id="<?php echo $value['id'] ?>-item">
		<span class="label"><?php  echo $value['name']; ?></span>
	<?php
		$id = isset($value['id']) ? $value['id'] : '';
		$get_meta = get_post_custom($post->ID);
		$meta_box_value = get_post_meta($post->ID, $id, true);
		if( isset( $get_meta[$id][0] ) )
			$current_value = $get_meta[$id][0];
			
	switch ( $value['type'] ) {
		
		case 'text': ?>
			<input  name="<?php echo $value['id']; ?>" id="<?php  echo $value['id']; ?>" type="text" value="<?php echo (isset($current_value) && !empty( $current_value )) ? $current_value : '' ?>" />
			<?php if (isset($value ['hint'])):?><a href="#" class="mo-help tooltip" title="<?php echo $value ['hint']?>"></a><?php endif?>
		<?php 
		break;

		case 'checkbox':
			if(isset($current_value) && !empty( $current_value ) ){$checked = "checked=\"checked\"";  } else{$checked = "";} ?>
				<input type="checkbox" name="<?php echo $value['id'] ?>" id="<?php echo $value['id'] ?>" value="true" <?php echo $checked; ?> />	
			<?php if (isset($value ['hint'])):?><a href="#" class="mo-help tooltip" title="<?php echo $value ['hint']?>"></a><?php endif?>		
		<?php	
		break;
		
		case 'select':
		?>
			<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
				<?php foreach ($value['options'] as $key => $option) { ?>
				<option value="<?php echo $key ?>" <?php if (isset($current_value) && !empty( $current_value ) && $current_value == $key) { echo ' selected="selected"' ; } ?>><?php echo $option; ?></option>
				<?php } ?>
			</select>
			<?php if (isset($value ['hint'])):?><a href="#" class="mo-help tooltip" title="<?php echo $value ['hint']?>"></a><?php endif?>
		<?php
		break;
		
		case 'textarea':
		?>
			<textarea style="direction:ltr; text-align:left; width:430px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="textarea" cols="100%" rows="3" tabindex="4"><?php echo isset($current_value) ? $current_value : ''  ?></textarea>
			<?php if (isset($value ['hint'])):?><a href="#" class="mo-help tooltip" title="<?php echo $value ['hint']?>"></a><?php endif?>
		<?php
		break;
		
		case 'slider':
			if ($meta_box_value == '') $meta_box_value = 9;  
			echo '
			<script type="text/javascript">		
			jQuery(document).ready(function () {						
				jQuery( "#'.$value['id'].'-slider" ).slider({ 
					value: '.$meta_box_value.', 
					min: '.$value['min'].', 
					max: '.$value['max'].', 
					step: '.$value['step'].', 
					slide: function( event, ui ) { 
						jQuery( "#'.$value['id'].'" ).val( ui.value ); 
					} 
				});
			});
			</script>';  
			
			echo '<div id="'.$value['id'].'-slider" class="slider-container"></div>
			<input type="text" name="'.$value['id'].'" id="'.$value['id'].'" value="'.$meta_box_value.'" size="5" class="minimal-textbox custom-tm" />
			<div class="clear"></div>';
			if (isset($value ['hint'])):?><a href="#" class="mo-help tooltip" title="<?php echo $value ['hint']?>"></a><?php endif;
		break;
		
		case 'portfolio_cat':
			// Get the categories first
			$args = array( 'taxonomy' => 'portfolio_category', 'hide_empty' => '0' );
			$categories = get_categories( $args ); 
			
			$selected_cats = explode( ",", $meta_box_value );
			
			echo '<ul class="portfolio-listing">';

			// Loop through each category
			foreach ($categories as $category) {
											
				foreach ($selected_cats as $selected_cat) {
					if($selected_cat == $category->cat_ID){ $checked = 'checked="checked"'; break; } else { $checked = ""; }
				}
				
				echo '<li>
					<input style="width: 14px;" type="checkbox" id="pcategory' . $category->cat_ID . '" name="' . $value[ 'id' ] . '[]" value="' . $category->cat_ID . '" ' . $checked . ' />
					<label for="pcategory'.$category->cat_ID.'" class="inline">' . $category->name . '</label>
					</li>';
			}
			
			echo '</ul>';
			if (isset($value ['hint'])):?><a href="#" class="mo-help tooltip" title="<?php echo $value ['hint']?>"></a><?php endif;
		break;
		
	
	} ?>
	</div>
<?php
}
?>