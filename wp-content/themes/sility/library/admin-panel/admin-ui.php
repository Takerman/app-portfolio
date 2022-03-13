<?php
function panel_options() { 

	$categories_obj = get_categories('hide_empty=0');
	$categories = array();
	foreach ($categories_obj as $pn_cat) {
		$categories[$pn_cat->cat_ID] = $pn_cat->cat_name;
	}
	
	$sliders = array();
	$custom_slider = new WP_Query( array( 'post_type' => 'weblusive_slider', 'posts_per_page' => -1 ) );
	while ( $custom_slider->have_posts() ) {
		$custom_slider->the_post();
		$sliders[get_the_ID()] = get_the_title();
	}
	
	
$save='
	<div class="mpanel-submit">
		<input type="hidden" name="action" value="test_theme_data_save" />
        <input type="hidden" name="security" value="'. wp_create_nonce("test-theme-data").'" />
		<input name="save" class="mpanel-save" type="submit" value="Save Changes" />    
	</div>'; 
?>

		
<div id="save-alert"></div>

<div class="admin-panel">
	<div class="top-nav">
		<div class="logo"></div>
		<div class="right-info">
			
		</div>
		<div class="clear"></div>
	</div>
	<div class="admin-panel-tabs">
		<ul>
			<li class="weblusive-tabs main-settings"><a href="#tab1"><span></span>Main Settings</a></li>
			<li class="weblusive-tabs header"><a href="#tab2"><span></span>Header</a></li>
			<li class="weblusive-tabs footer"><a href="#tab3"><span></span>Footer</a></li>
			<li class="weblusive-tabs sidebars"><a href="#tab4"><span></span>Sidebars</a></li>
			<li class="weblusive-tabs portfolio"><a href="#tab-portfolio"><span></span>Portfolio</a></li>
			<li class="weblusive-tabs blog"><a href="#tab8"><span></span>Blog settings</a></li>
			<li class="weblusive-tabs underconstruction"><a href="#tab9"><span></span>Under construct.</a></li>
			<li class="weblusive-tabs styling"><a href="#tab6"><span></span>Styling</a></li>
			<li class="weblusive-tabs underconstruction"><a href="#tab12"><span></span>Google Map Api Key</a></li>
			<li class="weblusive-tabs advanced"><a href="#tab11"><span></span>Advanced</a></li>
		</ul>
		<div class="clear"></div>
	</div> <!-- .admin-panel-tabs -->
	
	<div class="admin-panel-content">
	<form action="/" name="weblusive_form" id="weblusive_form">
		<div id="tab1" class="tabs-wrap">
			<h2>Main Settings</h2> <?php echo $save ?>
			<div class="weblusivepanel-item">
				<h3>Logo</h3>
				<?php
					weblusive_options(
						array( 	
						"name" => "Logo Setting",
						"id" => "logo_setting",
						"type" => "radio",
						"options" => array( "logo"=>"Custom Image Logo" ,"title"=>"Display Site Title" )
						)
					);
				?>
								
				<?php
					weblusive_options(
						array(	"name" => "Custom Logo Image",
								"id" => "logo",
								"help" => "Upload an image or specify an existing URL. If left blank, the default website name will be applied.",
								"type" => "upload"));
				?>
			</div>
			<div class="weblusivepanel-item">
				<h3>Favicon</h3>
				<?php
					weblusive_options(
					array(	
						"name" => "Custom Favicon",
						"id" => "favicon",
						"type" => "upload")
					);
				?>
			</div>
	

			<div class="weblusivepanel-item">
				<h3>RTL Mode</h3>
				<?php weblusive_options(
					array(	
						"name" => "Enable RTL",
						"id" => "rtl_mode",
						"help" => "Switch this on for Right to left direction languages like Arabic or Hebrew.",
						"type" => "checkbox")
					);
				?>		
			</div>
		</div>
		
		<div id="tab2" class="tabs-wrap">
			<h2>Header Settings</h2> <?php echo $save ?>
			<div class="weblusivepanel-item">
				<h3>Topbar Settings</h3>
				<?php
				weblusive_options(
					array(	
						"name" => "Enable topbar",
						"id" => "topbar_enable",
						"help" => "Set to display a bar on top of the header.",
						"type" => "checkbox")
					);
				weblusive_options(
					array(	
						"name" => "Enable topbar left sidebar ",
						"id" => "topbar_lsidebar_enable",
						"help" => "Will appear on left side of the topbar.",
						"type" => "checkbox")
					);
				weblusive_options(
					array(	
						"name" => "Enable topbar right sidebar ",
						"id" => "topbar_rsidebar_enable",
						"help" => "Will appear on right side of the topbar.",
						"type" => "checkbox")
					);
				weblusive_options(
						array(	
						"name" => "Disable search box",
						"id" => "disable_header_searchbox",
						"help" => "Select this option to hide the searchbox which appears on the main navigation block's right side.",
						"type" => "checkbox")
					);
					
				weblusive_options(
					array(	
						"name" => "Resume File URL",
						"id" => "top_file_download",
						"help" => "Paste the absolute URL of the file. Example: http://mywebsite.com/myresume.pdf",
						"type" => "text")
					);
				?>		
			</div>
			
			<div class="weblusivepanel-item">
				<h3>Menu settings</h3>
				<?php
					
					weblusive_options(
						array(	
						"name" => "Sticky menu",
						"id" => "sticky_menu",
						"help" => "",
						"type" => "checkbox")
					);
				?>
				
			</div>
			<div class="weblusivepanel-item">
				<h3>Title Settings</h3>
				<?php
					weblusive_options(
					array(	"name" => "Hide titles",
							"id" => "hide_titles",
							"type" => "checkbox")
						); 
							
					
				?>
			</div>
			<div class="weblusivepanel-item">
				<h3>Special Sidebar Settings</h3>
				<?php
				weblusive_options(
					array(	
						"name" => "Author Name",
						"id" => "spec_side_name",
						"type" => "text")
					);
				weblusive_options(
					array(	
						"name" => "Author Position",
						"id" => "spec_side_pos",
						"type" => "text")
					);
				weblusive_options(
					array(	
						"name" => "Author Photo",
						"id" => "spec_side_img",
						"type" => "upload")
					);
				weblusive_options(
					array(	
						"name" => "Custom Link Caption",
						"id" => "spec_side_caption",
						"type" => "text")
					);
				weblusive_options(
					array(	
						"name" => "Custom Link URL",
						"id" => "spec_side_link",
						"type" => "text")
					);
				?>		
			</div>			
			<div class="weblusivepanel-item">
				<h3>Header Code</h3>
				<div class="option-item">
					<small>Paste any custom javascript code you would like to put in header in this field.</small>
					<textarea id="header_code" name="weblusive_options[header_code]" style="width:100%" rows="7"><?php echo htmlspecialchars_decode(weblusive_get_option('header_code'));  ?></textarea>				
				</div>
			</div>
		</div> 
		
		<div id="tab3" class="tabs-wrap">
			<h2>Footer Settings</h2> <?php echo $save ?>
			
			<div class="weblusivepanel-item">
				<h3>Footer Widgets</h3>
				<div class="option-item">
					<?php weblusive_options(
						array( 	
						"name" => "Number of widgets",
						"id" => "footer_widgets",
						"type" => "select",
						"options" => array(  "3"=>"3 widgets per column", "2"=>"2 widgets per column","1"=>"1 widgets per column", "none"=>"Disable footer widgets" )
						)
					);
					?>
				</div>
			</div>

			<div class="weblusivepanel-item">
				<h3>Footer bottom options</h3>
				
				<div class="option-item">
					<?php 
						weblusive_options(
						array(	"name" => "Copyright text",
								"desc" => "",
								"id" => "footer_copyright",
								"type" => "textarea"));
					?>
				</div>
				
				<div class="option-item">
					<?php 
						weblusive_options(
						array(	
							"name" => "Disable Footer bottom",
							"id" => "footer_bottom_disable",
							"help" => "All related content set will be disabled.",
							"type" => "checkbox")
						); 		
					?>
				</div>
			</div>
					
			
		</div><!-- Footer Settings -->
		
		<div id="tab4" class="tab_content tabs-wrap">
			<h2>Sidebars</h2>	<?php echo $save ?>	
			
			<div class="weblusivepanel-item">
				<h3>Sidebar Position</h3>
				<div class="option-item">
					<?php
						$checked = 'checked="checked"';
						$weblusive_sidebar_pos = weblusive_get_option('sidebar_pos');
					?>
					<ul id="sidebar-position-options" class="weblusive-options">
						<li>
							<input id="_weblusive_sidebar_pos" name="weblusive_options[sidebar_pos]" type="radio" value="right" <?php if($weblusive_sidebar_pos == 'right' || !$weblusive_sidebar_pos ) echo $checked; ?> />
							<a class="checkbox-select" href="#"><img src="<?php echo get_template_directory_uri(); ?>/library/admin-panel/images/sidebar-right.png" /></a>
						</li>
						<li>
							<input id="_weblusive_sidebar_pos" name="weblusive_options[sidebar_pos]" type="radio" value="left" <?php if($weblusive_sidebar_pos == 'left') echo $checked; ?> />
							<a class="checkbox-select" href="#"><img src="<?php echo get_template_directory_uri(); ?>/library/admin-panel/images/sidebar-left.png" /></a>
						</li>
					</ul>
				</div>
			</div>
			
			<div class="weblusivepanel-item">
				<h3>Add Sidebar</h3>
				<div class="option-item">
					<span class="label">Sidebar Name</span>
					
					<input id="sidebarName" type="text" size="56" style="direction:ltr; text-laign:left" name="sidebarName" value="" />
					<input id="sidebarAdd"  class="small_button" type="button" value="Add" />
					
					<ul id="sidebarsList">
					<?php $sidebars = weblusive_get_option( 'sidebars' ) ;
						if($sidebars){
							foreach ($sidebars as $sidebar) { ?>
						<li>
							<div class="widget-head"><?php echo $sidebar ?>  <input id="weblusive_sidebars" name="weblusive_options[sidebars][]" type="hidden" value="<?php echo $sidebar ?>" /><a class="del-sidebar"></a></div>
						</li>
							<?php }
						}
					?>
					</ul>
				</div>				
			</div>

			<div class="weblusivepanel-item" id="custom-sidebars">
				<h3>Custom Sidebars</h3>
				<?php
				
				$new_sidebars = array('primary-widget-area'=> 'Default (Primary Widget Area)', '' => 'None');
				if($sidebars){
					foreach ($sidebars as $sidebar) {
						$new_sidebars[$sidebar] = $sidebar;
					}
				}
							
				weblusive_options(				
					array(	"name" => "Blog Single Post Sidebar",
							"id" => "sidebar_post",
							"type" => "select",
							"options" => $new_sidebars ));
							
				weblusive_options(				
					array(	"name" => "Blog Archives Sidebar",
							"id" => "sidebar_archive",
							"type" => "select",
							"help" => "Applies only to inner sidebar layout type, outer one will always stay full width",
							"options" => $new_sidebars )); 
				
				weblusive_options(				
					array(	"name" => "Portfolio Single Page Sidebar",
							"id" => "sidebar_portfolio",
							"type" => "select",
							"options" => $new_sidebars ));
				weblusive_options(				
					array(	"name" => "Portfolio taxonomy Page Sidebar",
							"id" => "sidebar_portfolio_taxonomy",
							"type" => "select",
							"options" => $new_sidebars ));
				?>
			</div>
		</div> 
		
		 <!-- Woocommerce -->
        <div id="tab5" class="tab_content tabs-wrap">
            <h2>Woocommerce</h2>	<?php echo $save ?>
            <div class="weblusivepanel-item">
                <h3>Visual options</h3>
                <?php
                weblusive_options(
                    array(
                        "name" => "Products per page",
                        "id" => "products_per_page",
                        "type" => "text",
                        "help" => "The default pagination value",
                    ));
              
					weblusive_options(
                    array(
                        "name" => "Products per row",
                        "id" => "products_per_row",
                        "type" => "select",
                        "help" => "How many products to show in one row",
                        "options" => array("columns-2" => '2', "columns-3" => '3', "columns-4" => "4",  "columns-6" => "6", "columns-1" => '1')
                    ));
					
					
					weblusive_options(
                    array(
                        "name" => "Hide related products",
                        "id" => "hide_related_products",
						"type" => "checkbox",
                        "help" => "Applies to product page"
                    ));
				  ?>
            </div>
			
        </div> <!-- End Woocommerce -->
		
		<!-- Styling -->
		<div id="tab6" class="tab_content tabs-wrap">
			<h2>Styling manager</h2>	<?php echo $save ?>	
						
						
			<div class="weblusivepanel-item">
				<h3>Custom CSS</h3>	
				<div class="option-item">
					<p><strong>Global CSS :</strong></p>
					<textarea id="weblusive_css" name="weblusive_options[css]" style="width:100%" rows="7"><?php echo weblusive_get_option('css');  ?></textarea>
				</div>	
				<div class="option-item">
					<p><strong>Portrait Tablets :</strong> 768px and above</p>
					<textarea id="weblusive_css" name="weblusive_options[css_tablets]" style="width:100%" rows="7"><?php echo weblusive_get_option('css_tablets');  ?></textarea>
				</div>
				<div class="option-item">
					<p><strong>Phones to tablets :</strong> 767px and below</p>
					<textarea id="weblusive_css" name="weblusive_options[css_wide_phones]" style="width:100%" rows="7"><?php echo weblusive_get_option('css_wide_phones');  ?></textarea>
				</div>
				<div class="option-item">
					<p><strong>Phones :</strong>480px and below</p>
					<textarea id="weblusive_css" name="weblusive_options[css_phones]" style="width:100%" rows="7"><?php echo weblusive_get_option('css_phones');  ?></textarea>
				</div>	
			</div>	

		</div> <!-- Styling -->

		<div id="tab7" class="tab_content tabs-wrap">
			<h2>Typography</h2>	<?php echo $save ?>	
			
			<div class="weblusivepanel-item">
				<h3>Character sets</h3>
				<p class="info">
					Loading additional character sets affects the performance. Use the additional character sets only if it's 
					required for the language you intend to build your website in. Example: If your website is in English, you 
					don't need any of those, if in Greek, Greek character set should be activated.
				</p>
				<?php
					weblusive_options(
						array(	"name" => "Latin Extended",
								"id" => "typography_latin_extended",
								"type" => "checkbox"));

					weblusive_options(
						array(	"name" => "Cyrillic",
								"id" => "typography_cyrillic",
								"type" => "checkbox"));

					weblusive_options(
						array(	"name" => "Cyrillic Extended",
								"id" => "typography_cyrillic_extended",
								"type" => "checkbox"));
								
					weblusive_options(
						array(	"name" => "Greek",
								"id" => "typography_greek",
								"type" => "checkbox"));
								
					weblusive_options(
						array(	"name" => "Greek Extended",
								"id" => "typography_greek_extended",
								"type" => "checkbox"));
				?>
			</div>
			
		</div> 
		<div id="tab-portfolio" class="tab_content tabs-wrap">
			<h2>Portfolio Settings</h2> <?php echo $save ?>
               
			<div class="weblusivepanel-item">
				<h3>Taxonomy (category) options</h3>
				<p class="info">Options in this block are effective only if Non-animated portfolio with pagination is selected.</p>
				<?php
					weblusive_options(
						array(	
							"name" => "Items per page",
							"id" => "portfolio_category_ppp",
							"type" => "text",
							"help" => "Applies only if Non-animated portfolio with pagination is selected via portfolio page. If not set, number 4 posts per page be applied by default."
						)
					); 
				?>
			</div>
			
			<div class="weblusivepanel-item">
				<h3>Single page</h3>
				<?php
					weblusive_options(
                    array(
                        "name" => "Hide Next / Prev navigation",
                        "id" => "hide_portfolio_navigation",
						"type" => "checkbox",
                        "help" => "Refers to the navigation buttons that appear on top of sidebar"
                    ));
				?>
			</div>
			
		</div> <!-- Portfolio Settings -->
		<div id="tab8" class="tab_content tabs-wrap">
			<h2>Blog Settings</h2> <?php echo $save ?>
                        
			<div class="weblusivepanel-item">
				<h3>Layout</h3>
				<?php
					weblusive_options(
						array(	
							"name" => "Posts limit on main page",
							"id" => "post_main_limit",
							"type" => "text",
							"help" => "If not set, will default to 3."
						)
					); 
				?>
			</div>

			<div class="weblusivepanel-item">

				<h3>Meta information</h3>
				<?php
				weblusive_options(
                    array(
                        "name" => "Show",
                        "id" => "blog_meta_show",
                        "type" => "select",
                        "help" => "Shows the selected meta information ",
                        "options" => array("comments" => 'Comments Number', "author" => "Author",   "category"=>"Category")
                    ));
					 
					
				?>
			</div>
			<div class="weblusivepanel-item">
				<h3>Single page</h3>
				<?php
				weblusive_options(
						array(	"name" => "Disable Author Block",
								"id" => "blog_disable_authorbio",
								"type" => "checkbox")
							);
				weblusive_options(
						array(	"name" => "Disable Share Block",
								"id" => "blog_disable_share",
								"type" => "checkbox")
							);
					weblusive_options(
						array(	"name" => "Disable tags",
								"id" => "blog_disable_tags",
								"type" => "checkbox")
							);
					
					weblusive_options(
						array(	"name" => "Disable comments",
								"id" => "blog_disable_comments",
								"type" => "checkbox")
							); 
				?>
			</div>
		</div> <!-- Article Settings -->
		
		<!-- Under construction -->
		<div id="tab9" class="tab_content tabs-wrap">
			<h2>Under construction</h2>	<?php echo $save ?>	

			<div class="weblusivepanel-item">
				<h3>General settings</h3>
				<?php
					
					weblusive_options(
					array(	"name" => "Main text",
							"id" => "uc_maintitle",
							"type" => "textarea"));
				
					weblusive_options(
					array(	"name" => "Custom Background",
							"id" => "uc_custombg",
							"help" => "Goes under countdown block",
							"type" => "upload")
						);
					weblusive_options(
					array(	
					"name" => "Progress",
					"id" => "uc_progress",
					"type" => "select",
					"options" => array('10%' => '10%', '20%' => '20%', '30%' => '30%', '40%' => '40%', '50%' => '50%', '60%' => '60%', '70%' => '70%', '80%' => '80%', '90%' => '90%')
					));
					weblusive_options(
					array(	"name" => "Launching date (yyyy/mm/dd)",
							"id" => "uc_launchdate",
							"type" => "text",
							"help" => "Please insert the date in yyyy/mm/dd format otherwise the page won't work correctly. Example: 2015/07/24"));

				?>
			</div>	
		</div> <!-- End under construction -->
		<div id="tab12" class="tab_content tabs-wrap">
			<h2>Google Map Api Key</h2>	<?php echo $save ?>	
			<div class="weblusivepanel-item">
				<h3>Google Map Api Key</h3>
				<?php
					weblusive_options(
						array(	"name" => "Api Key",
								"id" => "google_api",
								"type" => "text"));
				?>
			
			</div>
		</div>
		<div id="tab11" class="tab_content tabs-wrap">
			<h2>Advanced Settings</h2>	<?php echo $save ?>	

			<div class="weblusivepanel-item">
				<h3>Branding</h3>
				<?php
					weblusive_options(
						array(	"name" => "Worpress Login page Logo",
								"id" => "dashboard_logo",
								"type" => "upload"));
				?>
			
			</div>
			<?php
				global $array_options ;
				
				$current_options = array();
				foreach( $array_options as $option ){
					if( get_option( $option ) )
						$current_options[$option] =  get_option( $option ) ;
				}
			?>
			
			<div class="weblusivepanel-item">
				<h3>Export</h3>
				<p class="info">If you are importing previously saved content, make sure to delete the content in the "Export" field.</p>
				<div class="option-item">
					<textarea style="width:100%" rows="7"><?php echo $currentsettings = base64_encode( serialize( $current_options )); ?></textarea>
				</div>
			</div>
			<div class="weblusivepanel-item">
				<h3>Import</h3>
				<div class="option-item">
					<textarea id="weblusive_import" name="weblusive_import" style="width:100%" rows="7"></textarea>
				</div>
			</div>
			
		</div>
		
		<div class="mo-footer">
			<?php echo $save; ?>
		</div>
		</form>
		
	</div><!-- .admin-panel-content -->
	<div class="clear"></div>
</div><!-- .admin-panel -->
<?php
}
?>