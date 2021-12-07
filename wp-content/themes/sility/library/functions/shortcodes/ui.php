<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
$fonturl = 'http://fortawesome.github.io/Font-Awesome/icons/';
$icondir = get_template_directory_uri().'/library/functions/shortcodes/images'; 
$hintimg = get_template_directory_uri().'/library/functions/shortcodes/images/smicon.png'; 


?>
<!DOCTYPE html>
<head>
	<?php 
	wp_print_scripts('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_style('thickbox');
	do_action('admin_print_styles');
	
	?>
	<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/library/functions/shortcodes/main.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/library/admin-panel/js/colorpicker.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/library/admin-panel/js/tipsy.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/library/functions/shortcodes/tabs.js"></script>
	
	<script type="text/javascript" src="../../../../../../wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	
	<script>
	jQuery(document).ready(function() {
		jQuery('.tooltip').tipsy({fade: true, gravity: 'n'});
	});
	</script>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/library/admin-panel/style.css" type="text/css" media="all" />
	<link rel='stylesheet' href='shortcode.css' type='text/css' media='all' />
<?php $page = isset($_GET['page']) ? htmlentities($_GET['page']) : 'sility'; if( $page == 'sility' ){
?>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery('.tabs-1').jQueryTab({

				//classes settings
				tabClass:'silitytabs',                // class of the tabs
				accordionClass:'accordion_tabs',            // class of the header of accordion on smaller screens
				contentWrapperClass:'tab_content_wrapper',  // class of content wrapper
				contentClass:'tab_content',         // class of container
				activeClass:'active',               // name of the class used for active tab

				//feature settings
				responsive:true,                // enable accordian on smaller screens
				responsiveBelow:400,             // the breakpoint
				collapsible:true,               // allow all tabs to collapse on accordians
				useCookie: false,                // remember last active tab using cookie
				openOnhover: false,             // open tab on hover
				initialTab: 1,                  // tab to open initially; start count at 1 not 0

				//tabs transition settings      fade, flip, scaleUp, slideLeft, etc.
				tabInTransition: 'fadeIn',              // classname for showing in the tab content
				tabOutTransition: 'fadeOut',            // classname for hiding the tab content

				//accordion transition settings
				accordionTransition: 'slide',           // transitions to use - normal or slide
				accordionIntime:500,                // time for animation IN (1000 = 1s)
				accordionOutTime:400,               // time for animation OUT (1000 = 1s)

				//api functions
				before: function(){},               // function to call before tab is opened
				after: function(){}             // function to call after tab is opened

		});
		
		//jQuery('.tooltip').tipsy({fade: true, gravity: 'n'});
		});
		var shortcode = {
			e: '',
			init: function(e) {
				shortcode.e = e;
				
			},
			insert: function createSilityShortcode(e, page, dialogwidth, dialogheight) {
				e.windowManager.open({url : '<?php echo get_template_directory_uri()?>/library/functions/shortcodes/ui.php?page='+page, width : dialogwidth, height : dialogheight});
				//tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				//tinyMCEPopup.close();
			},
			quickinsert: function createQuickShortcode(e, tag){
				var output = '['+tag+']'+ '[/'+tag+']';
				e.execCommand('mceInsertContent', false, output);
			}
		}
		tinyMCEPopup.onInit.add(shortcode.init, shortcode);
	</script>
	<title>Sility shortcodes listing</title>
</head>
<body>
<form id="SilityShortcode">
	<div class="tabs-1">
		<ul class="silitytabs">
			<li><a href="#tab1">Layout</a></li>
			<li><a href="#tab2">Typography</a></li>
			<li><a href="#tab3">Content</a></li>
		</ul>
		<section class="tab_content_wrapper">
			<article class="tab_content" id="tab1">
				<ul class="shortcode-list">
					<li>
						<a href="javascript:shortcode.quickinsert(shortcode.e, 'row')" class="mo-help tooltip" title="Must be set to wrap the columns">
							<figure>
								<img src="<?php echo $icondir?>/gfx-row.png" alt="Add Row" /> 
								<figcaption>Row</figcaption>
							</figure>
						</a>
					</li> 
					 
					<li>
						<a href="javascript:shortcode.quickinsert(shortcode.e, 'one_whole')" class="mo-help tooltip" title="Full width column">
							<figure>
								<img src="<?php echo $icondir?>/gfx-full-column.png" alt="Add Fullwidth column" /> 
								<figcaption>1/1 Column</figcaption>
							</figure>
						</a>
					</li> 
					<li>
						<a href="javascript:shortcode.quickinsert(shortcode.e, 'one_half')" class="mo-help tooltip" title="One half width column">
							<figure>
								<img src="<?php echo $icondir?>/gfx-half-column.png" alt="Add One half column" /> 
								<figcaption>1/2 Column</figcaption>
							</figure>
						</a>
					</li> 
					<li>
						<a href="javascript:shortcode.quickinsert(shortcode.e, 'one_third')" class="mo-help tooltip" title="One third width column">
							<figure>
								<img src="<?php echo $icondir?>/gfx-three-column.png" alt="Add One third column" /> 
								<figcaption>1/3 Column</figcaption>
							</figure>
						</a>
					</li> 
					<li>
						<a href="javascript:shortcode.quickinsert(shortcode.e, 'one_fourth')" class="mo-help tooltip" title="One fourth width column">
							<figure>
								<img src="<?php echo $icondir?>/gfx-fourth-column.png" alt="Add One fourth column" /> 
								<figcaption>1/4 Column</figcaption>
							</figure>
						</a>
					</li> 
					<li>
						<a href="javascript:shortcode.quickinsert(shortcode.e, 'one_sixth')" class="mo-help tooltip" title="One sixth width column">
							<figure>
								<img src="<?php echo $icondir?>/gfx-six-column.png" alt="Add One sixth column" /> 
								<figcaption>1/6 Column</figcaption>
							</figure>
						</a>
					</li> 
					
					<li>
						<a href="javascript:shortcode.quickinsert(shortcode.e, 'two_third')" class="mo-help tooltip" title="Two third width column">
							<figure>
								<img src="<?php echo $icondir?>/gfx-2-three-column.png" alt="Add Two third column" /> 
								<figcaption>2/3 Column</figcaption>
							</figure>
						</a>
					</li> 
					<li>
						<a href="javascript:shortcode.quickinsert(shortcode.e, 'three_fourth')" class="mo-help tooltip" title="Three fourth width column">
							<figure>
								<img src="<?php echo $icondir?>/gfx-3-four-column.png" alt="Add Three fourth column" /> 
								<figcaption>3/4 Column</figcaption>
							</figure>
						</a>
					</li> 
					<li>
						<a href="javascript:shortcode.quickinsert(shortcode.e, 'five_sixth')" class="mo-help tooltip" title="Five sixth width column">
							<figure>
								<img src="<?php echo $icondir?>/gfx-five-sixth-column.png" alt="Add Five sixth column" /> 
								<figcaption>5/6 Column</figcaption>
							</figure>
						</a>
					</li> 
					<li>
						<a href="javascript:shortcode.quickinsert(shortcode.e, 'five_twelveth')" class="mo-help tooltip" title="Five twelveth width column">
							<figure>
								<img src="<?php echo $icondir?>/gfx-five-twelve-column.png" alt="Add Five twelveth column" /> 
								<figcaption>5/12 Column</figcaption>
							</figure>
						</a>
					</li> 
					<li>
						<a href="javascript:shortcode.quickinsert(shortcode.e, 'seven_twelveth')" class="mo-help tooltip" title="Seven twelveth width column">
							<figure>
								<img src="<?php echo $icondir?>/gfx-seven-twelve-column.png" alt="Add Seven twelveth column" /> 
								<figcaption>7/12 Column</figcaption>
							</figure>
						</a>
					</li> 
					
					
				</ul>
				<div class="clear"></div>
			</article>
			<article class="tab_content" id="tab2">
				<ul class="shortcode-list">
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'list', 600, 450)" class="mo-help tooltip" title="List.">
							<figure>
								<img src="<?php echo $icondir?>/list.png" alt="Add  list" /> 
								<figcaption>List</figcaption>
							</figure>
						</a>
					</li>
					
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'tblock', 600, 480)" class="mo-help tooltip" title="Featured heading with variety of parameters">
							<figure>
								<img src="<?php echo $icondir?>/custom-heading.png" alt="Add heading title" /> 
								<figcaption>Custom heading title</figcaption>
							</figure>
						</a>
					</li>
					
					
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'blockquote', 600, 450)" class="mo-help tooltip" title="Regular blockquote">
							<figure>
								<img src="<?php echo $icondir?>/blockquotes.png" alt="Add Blockquote" /> 
								<figcaption>Blockquote</figcaption>
							</figure>
						</a>
					</li>
					
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'divider', 600, 375)" class="mo-help tooltip" title="Separate content blocks with various type of dividers">
							<figure>
								<img src="<?php echo $icondir?>/divider.png" alt="Add Divider" /> 
								<figcaption>Divider</figcaption>
							</figure>
						</a>
					</li>
				</ul>
				<div class="clear"></div>
			</article>
			<article class="tab_content" id="tab3">
				<ul class="shortcode-list">
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'teammember', 800, 600)" class="mo-help tooltip" title="A convenient way to list team members">
							<figure>
								<img src="<?php echo $icondir?>/team-member.png" alt="Add a team member" /> 
								<figcaption>Team member</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'progress', 600, 450)" class="mo-help tooltip" title="Regular, striped, animated, you choose!">
							<figure>
								<img src="<?php echo $icondir?>/progress-bars.png" alt="Add Progress bar" /> 
								<figcaption>Progress bar</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'circle', 600, 450)" class="mo-help tooltip" title="Special type of stylish progress bars">
							<figure>
								<img src="<?php echo $icondir?>/circular-bar.png" alt="Add Circular progress bar" /> 
								<figcaption>Circular progress bar</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'button', 600, 450)" class="mo-help tooltip" title="Regular button, many parameters to choose from">
							<figure>
								<img src="<?php echo $icondir?>/button.png" alt="Add Regular button" /> 
								<figcaption>Standard Button</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'dropdown', 600, 500)" class="mo-help tooltip" title="Regular button + dropdown menu combination">
							<figure>
								<img src="<?php echo $icondir?>/dropdown.png" alt="Add Dropdown Button" /> 
								<figcaption>Dropdown Button</figcaption>
							</figure>
						</a>
					</li>
					
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'vernav', 600, 375)" class="mo-help tooltip" title="Useful for creating custom menus to go inside the content">
							<figure>
								<img src="<?php echo $icondir?>/vertical-navigation.png" alt="Add Vertical navigation" /> 
								<figcaption>Vertical navigation</figcaption>
							</figure>
						</a>
					</li>
					
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'tabs', 600, 450)" class="mo-help tooltip" title="Tabbed content with variety of positions and styles">
							<figure>
								<img src="<?php echo $icondir?>/tabs.png" alt="Add Tab" /> 
								<figcaption>Tab</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'accordion', 600, 450)" class="mo-help tooltip" title="Q&A blocks, terms and definitions are example of accordion shortcode usage">
							<figure>
								<img src="<?php echo $icondir?>/accordion.png" alt="Add Accordion" /> 
								<figcaption>Accordion</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'testimonial', 800, 630)" class="mo-help tooltip" title="Parametrized testimonials">
							<figure>
								<img src="<?php echo $icondir?>/testimonials.png" alt="Add Testimonial" /> 
								<figcaption>Testimonial</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'alert', 600, 450)" class="mo-help tooltip" title="Use for important informative messages">
							<figure>
								<img src="<?php echo $icondir?>/alertbox.png" alt="Add Alert box" /> 
								<figcaption>Alert box</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'slider', 800, 600)" class="mo-help tooltip" title="Image slider">
							<figure>
								<img src="<?php echo $icondir?>/slider.png" alt="Image Slider" /> 
								<figcaption>Image Slider</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'carousel', 600, 450)" class="mo-help tooltip" title="Highly customizable carousel-style content sliding">
							<figure>
								<img src="<?php echo $icondir?>/carousel.png" alt="Content Slider" /> 
								<figcaption>Content Slider</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'panel', 600, 450)" class="mo-help tooltip" title="Blocks with variety of coloring options">
							<figure>
								<img src="<?php echo $icondir?>/panel.png" alt="Insert a panel" /> 
								<figcaption>Panel</figcaption>
							</figure>
						</a>
					</li>
					
					
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'fblock', 600, 450)" class="mo-help tooltip" title="Useful for listing services, main features, etc...">
							<figure>
								<img src="<?php echo $icondir?>/featured-block.png" alt="Add featured block" /> 
								<figcaption>Featured block</figcaption>
							</figure>
						</a>
					</li>
					
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'reveal', 600, 500)" class="mo-help tooltip" title="Can have any type of content assigned to show on a modal window">
							<figure>
								<img src="<?php echo $icondir?>/modal.png" alt="Add modal box" /> 
								<figcaption>Modal box</figcaption>
							</figure>
						</a>
					</li>
					
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'lightbox', 800, 600)" class="mo-help tooltip" title="Image gallery / videos / iframed content">
							<figure>
								<img src="<?php echo $icondir?>/lightbox.png" alt="Add Lightbox" /> 
								<figcaption>Lightbox</figcaption>
							</figure>
						</a>
					</li> 
					
					
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'social', 600, 450)" class="mo-help tooltip" title="All major social services to choose from.">
							<figure>
								<img src="<?php echo $icondir?>/social-button.png" alt="Add Social Button" /> 
								<figcaption>Social Button</figcaption>
							</figure>
						</a>
					</li>
					
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'googlemap', 800, 600)" class="mo-help tooltip" title="Show custom google maps anywhere in your pages/posts">
							<figure>
								<img src="<?php echo $icondir?>/google-map.png" alt="Add Google Map" /> 
								<figcaption>Google Map</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'pricingtable', 600, 450)" class="mo-help tooltip" title="Pricing Tables">
							<figure>
								<img src="<?php echo $icondir?>/accordion.png" alt="Add Pricing Table" /> 
								<figcaption>Pricing Table</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'contact', 600, 450)" class="mo-help tooltip" title="Contact Details">
							<figure>
								<img src="<?php echo $icondir?>/social-button.png" alt="Add Contact details" /> 
								<figcaption>Contact details</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'regimage', 800, 600)" class="mo-help tooltip" title="Add single image">
							<figure>
								<img src="<?php echo $icondir?>/image.png" alt="Add Image" /> 
								<figcaption>Image</figcaption>
							</figure>
						</a>
					</li>
					<li>
						<a href="javascript:shortcode.insert(shortcode.e, 'timeline', 600, 450)" class="mo-help tooltip" title="Timeline info blocks">
							<figure>
								<img src="<?php echo $icondir?>/tooltip.png" alt="Add Timeline" /> 
								<figcaption>Timeline</figcaption>
							</figure>
						</a>
					</li>
				</ul>
				<div class="clear"></div>
			</article>
			
		</section>
	</div>
</form>
<!--/*************************************/ -->
<?php
} elseif( $page == 'panel' ){
?>
	<script type="text/javascript">
		var AddPanel = {
			e: '',
			init: function(e) {
				AddPanel.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
                var PanelColor=jQuery('#color').val();
				var PanelHead = jQuery('#PanelHead').val();
                var PanelFooter=jQuery('#PanelFooter').val();
				var PanelContent = jQuery('#PanelContent').val();
                var anim=jQuery('#anim').val();
                var addclass=jQuery('#class').val();

				var output = '[panel ';
					if (anim){
						output+= 'anim="'+anim+'" ';
					}
					if(addclass){
						output+='class="'+addclass+'" ';
					}
					if(PanelColor) {
						output += 'color="'+PanelColor+'" ';
					}
					if(PanelHead) {
						output += 'head="'+PanelHead+'" ';
					}
									if(PanelFooter) {
						output += 'footer="'+PanelFooter+'" ';
					}
				output += ']'+PanelContent+'[/panel]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(AddPanel.init, AddPanel);

	</script>
	<title>Add Panel</title>

</head>
<body>
<form id="GalleryShortcode">
     <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
    <p id="animcontent"></p>
    <p>
        <label for="color">Panel Color</label>
        <select id="color" name="color">
            <option value="panel-default">Default</option>
            <option value="panel-primary">Primary</option>
            <option value="panel-info">Info</option>
            <option value="panel-success">Success</option>
            <option value="panel-warning">Warning</option>
            <option value="panel-danger">Danger</option>
        </select>
    </p>
    <p>
		<label for="PanelHead">Panel Header</label>
		<input id="PanelHead" name="PanelHead" type="text" value="" />
		
	</p>
        <p>
		<label for="PanelFooter">Panel Footer</label>
		<input id="PanelFooter" name="PanelFooter" type="text" value="" />
		
	</p>
	
	<p>
		<label for="PanelContent">Content </label>
		<textarea id="PanelContent" name="PanelContent" col="20"></textarea>
	</p>
        <p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
		
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:AddPanel.insert(AddPanel.e)">Insert</a></div>
<!--/*************************************/ -->

<?php } elseif( $page == 'progress' ){
?>
	<script type="text/javascript">
		var AddProgress = {
			e: '',
			init: function(e) {
				AddProgress.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
				var anim=jQuery('#anim').val();
				var addclass=jQuery('#class').val();
				var ProgressColor = jQuery('#ProgressColor').val();
				var ProgressAnim = jQuery('#ProgressAnim').val();
				var ProgressStyle = jQuery('#ProgressStyle').val();
				var ProgressMeter = jQuery('#ProgressMeter').val();
				var ProgressTitle = jQuery('#ProgressTitle').val();
				var ProgressCustomColor = jQuery('#ProgressCustomColor').val();
				var output = '[progressbar ';
					if(anim){
						output+=' anim="'+anim+'" ';
					}
					if(addclass){
						output+='class="'+addclass+'" ';
					}
					
					if(ProgressColor) {
						output += 'color="'+ProgressColor+'" ';
					}
					if(ProgressCustomColor){
						output += 'customcolor="'+ProgressCustomColor+'" ';
					}
					if(ProgressMeter) {
						output += 'meter="'+ProgressMeter+'" ';
					}
					if(ProgressAnim) {
						output += 'animated="'+ProgressAnim+'" ';
					}
					
					if(ProgressStyle) {
						output += 'style="'+ProgressStyle+'" ';
					}
					if(ProgressTitle) {
						output += 'title="'+ProgressTitle+'" ';
					}
					
				output += '/]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(AddProgress.init, AddProgress);

	</script>
	<title>Add Progress bar</title>

</head>
<body>
<form id="GalleryShortcode">
	<script> 
		jQuery(function(){
			jQuery("#animcontent").load("animation.html"); 
		});
    </script>
    <p id="animcontent"></p>
	 <p>
		<label for="ProgressColor">Color :</label>
		<select id="ProgressColor" name="ProgressColor">
			<option value="sility">Sility</option>
			<option value="info">Info</option>
			<option value="success">Success</option>
			<option value="danger">Danger</option>
			<option value="warning">Warning</option>
			<option value="primary">Primary</option>
		</select>
	</p>
	<p>
		<label for="ProgressMeter">Progress meter :</label>
		<select id="ProgressMeter" name="ProgressMeter">
			<option value="1">1%</option>
			<option value="2">2%</option>
			<option value="3">3%</option>
			<option value="4">4%</option>
			<option value="5">5%</option>
			<option value="6">6%</option>
			<option value="7">7%</option>
			<option value="8">8%</option>
			<option value="9">9%</option>
			<option value="10">10%</option>
			<option value="11">11%</option>
			<option value="12">12%</option>
			<option value="13">13%</option>
			<option value="14">14%</option>
			<option value="15">15%</option>
			<option value="16">16%</option>
			<option value="17">17%</option>
			<option value="18">18%</option>
			<option value="19">19%</option>
			<option value="20">20%</option>
			<option value="21">21%</option>
			<option value="22">22%</option>
			<option value="23">23%</option>
			<option value="24">24%</option>
			<option value="25">25%</option>
			<option value="26">26%</option>
			<option value="27">27%</option>
			<option value="28">28%</option>
			<option value="29">29%</option>
			<option value="30">30%</option>
			<option value="31">31%</option>
			<option value="32">32%</option>
			<option value="33">33%</option>
			<option value="34">34%</option>
			<option value="35">35%</option>
			<option value="36">36%</option>
			<option value="37">37%</option>
			<option value="38">38%</option>
			<option value="39">39%</option>
			<option value="40">40%</option>
			<option value="41">41%</option>
			<option value="42">42%</option>
			<option value="43">43%</option>
			<option value="44">44%</option>
			<option value="45">45%</option>
			<option value="46">46%</option>
			<option value="47">47%</option>
			<option value="48">48%</option>
			<option value="49">49%</option>
			<option value="50">50%</option>
			<option value="51">51%</option>
			<option value="52">52%</option>
			<option value="53">53%</option>
			<option value="54">54%</option>
			<option value="55">55%</option>
			<option value="56">56%</option>
			<option value="57">57%</option>
			<option value="58">58%</option>
			<option value="59">59%</option>
			<option value="60">60%</option>
			<option value="61">61%</option>
			<option value="62">62%</option>
			<option value="63">63%</option>
			<option value="64">64%</option>
			<option value="65">65%</option>
			<option value="66">66%</option>
			<option value="67">67%</option>
			<option value="68">68%</option>
			<option value="69">69%</option>
			<option value="70">70%</option>
			<option value="71">71%</option>
			<option value="72">72%</option>
			<option value="73">73%</option>
			<option value="74">74%</option>
			<option value="75">75%</option>
			<option value="76">76%</option>
			<option value="77">77%</option>
			<option value="78">78%</option>
			<option value="79">79%</option>
			<option value="80">80%</option>
			<option value="81">81%</option>
			<option value="82">82%</option>
			<option value="83">83%</option>
			<option value="84">84%</option>
			<option value="85">85%</option>
			<option value="86">86%</option>
			<option value="87">87%</option>
			<option value="88">88%</option>
			<option value="89">89%</option>
			<option value="90">90%</option>
			<option value="91">91%</option>
			<option value="92">92%</option>
			<option value="93">93%</option>
			<option value="94">94%</option>
			<option value="95">95%</option>
			<option value="96">96%</option>
			<option value="97">97%</option>
			<option value="98">98%</option>
			<option value="99">99%</option>
			<option value="100">100%</option>
		</select>
	</p>
	<p>
		<label for="ProgressTitle">Title :</label>
		<input id="ProgressTitle" name="ProgressTitle" type="text" value="" />
	</p>
	<p>
		<label for="ProgressCustomColor">Custom bg color:</label>
		<div id="ProgressCustomColorcolorSelector" class="color-pic">
			<div></div>
		</div>
		<input style="width:80px; margin-right:5px;"  name="ProgressCustomColor" id="ProgressCustomColor" type="text" value="" />			
		<script>
			jQuery(document).ready(function() {
				jQuery('#ProgressCustomColorcolorSelector').ColorPicker({
					onShow: function (colpkr) {
						jQuery(colpkr).fadeIn(500);
						return false;
					},
					onHide: function (colpkr) {
						jQuery(colpkr).fadeOut(500);
						return false;
					},
					onChange: function (hsb, hex, rgb) {
						jQuery('#ProgressCustomColorcolorSelector div').css('backgroundColor', '#' + hex);
						jQuery('#ProgressCustomColor').val('#'+hex);
					}
				});
			});
		</script>
	</p>
	<p>
		<label for="ProgressStyle">Style :</label>
		<select id="ProgressStyle" name="ProgressStyle">
			<option value="">Regular</option>
			<option value="progress-striped">Striped</option>	
		</select>
	</p>
	<p>
		<label for="ProgressAnim">Animated :</label>
		<select id="ProgressAnim" name="ProgressAnim">
			<option value="">No</option>
			<option value="active">Yes</option>
		</select>
	</p>
   
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:AddProgress.insert(AddProgress.e)">Insert</a></div>
<!--/*************************************/ --> 

<?php } elseif( $page == 'circle' ){
?>
	<script type="text/javascript">
		var circle = {
			e: '',
			init: function(e) {
				circle.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
				var piebarcolor = jQuery('#piebarcolor').val(); 
				var meter = jQuery('#meter').val();
				var title = jQuery('#title').val();
				var anim=jQuery('#anim').val();
				var addclass=jQuery('#class').val();
		
				var output = '[circle ';
					if (anim){
						output+= 'anim="'+anim+'" ';
					}
					
					if(addclass){
						output+='class="'+addclass+'" ';
					}
					
					if(meter) {
						output += 'meter="'+meter+'" ';
					}
					if(title) {
						output += 'title="'+title+'" ';
					}
					if(piebarcolor) {
						output += 'piebarcolor="'+piebarcolor+'" ';
					}
					  				
				output += '/]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(circle.init, circle);

	</script>
	<title>Add Circle Progress bar</title>

</head>
<body>
<form id="GalleryShortcode">
     <script> 
    jQuery(function(){
		jQuery("#animcontent").load("animation.html"); 
		
	});
    </script>
    <p id="animcontent"></p>
	<p>
		<label for="meter">Progress meter :</label>
		<select id="meter" name="meter">
			<option value="1">1%</option>
			<option value="2">2%</option>
			<option value="3">3%</option>
			<option value="4">4%</option>
			<option value="5">5%</option>
			<option value="6">6%</option>
			<option value="7">7%</option>
			<option value="8">8%</option>
			<option value="9">9%</option>
			<option value="10">10%</option>
			<option value="11">11%</option>
			<option value="12">12%</option>
			<option value="13">13%</option>
			<option value="14">14%</option>
			<option value="15">15%</option>
			<option value="16">16%</option>
			<option value="17">17%</option>
			<option value="18">18%</option>
			<option value="19">19%</option>
			<option value="20">20%</option>
			<option value="21">21%</option>
			<option value="22">22%</option>
			<option value="23">23%</option>
			<option value="24">24%</option>
			<option value="25">25%</option>
			<option value="26">26%</option>
			<option value="27">27%</option>
			<option value="28">28%</option>
			<option value="29">29%</option>
			<option value="30">30%</option>
			<option value="31">31%</option>
			<option value="32">32%</option>
			<option value="33">33%</option>
			<option value="34">34%</option>
			<option value="35">35%</option>
			<option value="36">36%</option>
			<option value="37">37%</option>
			<option value="38">38%</option>
			<option value="39">39%</option>
			<option value="40">40%</option>
			<option value="41">41%</option>
			<option value="42">42%</option>
			<option value="43">43%</option>
			<option value="44">44%</option>
			<option value="45">45%</option>
			<option value="46">46%</option>
			<option value="47">47%</option>
			<option value="48">48%</option>
			<option value="49">49%</option>
			<option value="50">50%</option>
			<option value="51">51%</option>
			<option value="52">52%</option>
			<option value="53">53%</option>
			<option value="54">54%</option>
			<option value="55">55%</option>
			<option value="56">56%</option>
			<option value="57">57%</option>
			<option value="58">58%</option>
			<option value="59">59%</option>
			<option value="60">60%</option>
			<option value="61">61%</option>
			<option value="62">62%</option>
			<option value="63">63%</option>
			<option value="64">64%</option>
			<option value="65">65%</option>
			<option value="66">66%</option>
			<option value="67">67%</option>
			<option value="68">68%</option>
			<option value="69">69%</option>
			<option value="70">70%</option>
			<option value="71">71%</option>
			<option value="72">72%</option>
			<option value="73">73%</option>
			<option value="74">74%</option>
			<option value="75">75%</option>
			<option value="76">76%</option>
			<option value="77">77%</option>
			<option value="78">78%</option>
			<option value="79">79%</option>
			<option value="80">80%</option>
			<option value="81">81%</option>
			<option value="82">82%</option>
			<option value="83">83%</option>
			<option value="84">84%</option>
			<option value="85">85%</option>
			<option value="86">86%</option>
			<option value="87">87%</option>
			<option value="88">88%</option>
			<option value="89">89%</option>
			<option value="90">90%</option>
			<option value="91">91%</option>
			<option value="92">92%</option>
			<option value="93">93%</option>
			<option value="94">94%</option>
			<option value="95">95%</option>
			<option value="96">96%</option>
			<option value="97">97%</option>
			<option value="98">98%</option>
			<option value="99">99%</option>
			<option value="100">100%</option>
		</select>
	</p>
	<p>
		<label for="title">Title</label>
		<input type="text" id="title" name="title">
	</p>
	<p>
		<label for="piebarcolor">Bar color :</label>
		<div id="barcolorSelector" class="color-pic">
			<div></div>
		</div>
		<input style="width:80px; margin-right:5px;"  name="piebarcolor" id="piebarcolor" type="text" value="" />
							
		<script>
		jQuery(document).ready(function() {
			jQuery('#barcolorSelector').ColorPicker({
				onShow: function (colpkr) {
					jQuery(colpkr).fadeIn(500);
					return false;
				},
				onHide: function (colpkr) {
					jQuery(colpkr).fadeOut(500);
					return false;
				},
				onChange: function (hsb, hex, rgb) {
					jQuery('#barcolorSelector div').css('backgroundColor', '#' + hex);
					jQuery('#piebarcolor').val('#'+hex);
				}
			});
		});
		</script>
		
	</p>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:circle.insert(circle.e)">Insert</a></div>
    <!--/*************************************/ -->
<?php } elseif( $page == 'dropdown' ){ ?>

	<script type="text/javascript">
		var DropdownButton = {
			e: '',
			init: function(e) {
				DropdownButton.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
			
				var output = "[dropbuttongroup ";
				var Type = jQuery('#Type').val();
				var Title = jQuery('#Title').val();
				var anim = jQuery('#anim').val();
				var color = jQuery('#color').val();
				var addclass=jQuery('#class').val();
				if (anim){
					output+= 'anim="'+anim+'" ';
				}
				if(addclass){
					output+='class="'+addclass+'" ';
				}
				
				if(Type) {
					output+= ' type="'+Type+'"';
				}
				
				if(Title) {
					output+= ' title="'+Title+'"';
				}
				if(color) {
					output+= ' color="'+color+'"';
				}
				
				output += "]";
				
				jQuery("input[id^=dropbutton_title]").each(function(intIndex, objValue) {
				
					output +='[dropbutton';
					output += ' title="'+jQuery(this).val()+'"';
					var obj1 = jQuery('input[id^=dropbutton_url]').get(intIndex);
					output += ' url= "'+obj1.value+'"';
					
					var obj2 = jQuery('select[id^=dropbutton_divider]').get(intIndex);
					output += ' divider= "'+obj2.value+'"]';
				
					output += "[/dropbutton]";
				});
				
				
				output += '[/dropbuttongroup]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(DropdownButton.init, DropdownButton);

		jQuery(document).ready(function() {
			jQuery("#add-dropbutton").click(function() {
				jQuery('#DropbuttonShortcodeContent').append('<p><label for="dropbutton_title[]">Item Title</label><input id="dropbutton_title[]" name="dropbutton_title[]" type="text" value="" /></p><p><label for="dropbutton_url[]">Item URL</label><input id="dropbutton_url[]" name="dropbutton_url[]" type="text" value="" /></p><p><label for="Content[]">Item Content</label><input id="Content[]" name="Content[]" type="text" value="" /></p><p><label for="dropbutton_divider[]">Insert divider after item</label><select id="dropbutton_divider[]" name="dropbutton_divider[]"><option value="0">No</option><option value="1">Yes</option></select></p>	<hr class="divider" />');
			});
		});
		
	</script>
	<title>Add Dropdown button</title>

</head>
<body>
<form id="DropbuttonShortcode">
    <script> 
    jQuery(function(){
		jQuery("#animcontent").load("animation.html");
		
    });
    </script>
    <p id="animcontent"></p>
	<div id="DropbuttonShortcodeContent">
		<p>
			<label for="Title">Title</label>
			<input id="Title" name="Title" type="text" value="" />
		</p>
		<p>
			<label for="Type">Type :</label>
			<select id="Type" name="Type">
				<option value="">Default</option>
				<option value="split">Split</option>
			</select>		
		</p>
		<p>
			<label for="color">Color :</label>
			<select id="color" name="color">
				<option value="purple">Purple</option>
				<option value="dark">Dark</option>
				<option value="white">White</option>
				<option value="btn-primary">Primary</option>
				<option value="btn-info">Info</option>
				<option value="btn-success">Success</option>
				<option value="btn-warning">Warning</option>
				<option value="btn-danger">Danger</option>
			</select>
		</p>
				
		<p>
			<label for="class">Extra Class</label>
			<input id="class" name="class" type="text" value="" />
		</p>
		<hr class="divider" />
		<p>
			<label for="dropbutton_title[]">Item Title</label>
			<input id="dropbutton_title[]" name="dropbutton_title[]" type="text" value="" />
		</p>
		<p>
			<label for="dropbutton_url[]">Item URL</label>
			<input id="dropbutton_url[]" name="dropbutton_url[]" type="text" value="" />
		</p>
		<p>
			<label for="dropbutton_divider[]">Insert divider after item</label>
			<select id="dropbutton_divider[]" name="dropbutton_divider[]">
				<option value="0">No</option>
				<option value="1">Yes</option>
			</select>	
		</p>
		
		<hr class="divider" />
	</div>
    
	<strong><a style="cursor: pointer;" id="add-dropbutton">+ Add Item</a></strong>
   
</form>
<div class="mce-foot"><a class="add" href="javascript:DropdownButton.insert(DropdownButton.e)">Insert</a></div>
<!--/*************************************/ --> 

<?php
} elseif( $page == 'button' ){
 ?>
 	<script type="text/javascript">
		var AddButton = {
			e: '',
			init: function(e) {
				AddButton.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
				var ButtonColor = jQuery('#ButtonColor').val();
				var ButtonSize = jQuery('#ButtonSize').val();
				var ButtonLink = jQuery('#ButtonLink').val();
				var ButtonStatus = jQuery('#ButtonStatus').val();
				var ButtonText = jQuery('#ButtonText').val();
				var ButtonTarget = jQuery('#ButtonTarget').val();
				var anim=jQuery('#anim').val();				
				var addclass=jQuery('#class').val();              
				var output = '[button ';
					if (anim){
						output+= 'anim="'+anim+'" ';
					}
					if(addclass){
						output+='class="'+addclass+'" ';
					}
					if(ButtonColor) {
						output += 'color="'+ButtonColor+'" ';
					}
					if(ButtonSize) {
						output += 'size="'+ButtonSize+'" ';
					}
					
					if(ButtonStatus){
						output += 'status="'+ButtonStatus+'" ';
					}
					
					if(ButtonLink) {
						output += 'link="'+ButtonLink+'" ';
					} 
					
					if(ButtonTarget) {
						output += 'target="_blank" ';
					}
				output += ']'+ButtonText+'[/button]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(AddButton.init, AddButton);

	</script>
	<title>Add Buttons</title>

</head>
<body>
<form id="GalleryShortcode">
    <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
    <p id="animcontent"></p>
	<p>
		<label for="ButtonColor">Button Color:</label>
		<select id="ButtonColor" name="ButtonColor">
			<option value="purple">Purple</option>
			<option value="dark">Dark</option>
			<option value="white">White</option>
			<option value="btn-primary">Primary</option>
			<option value="btn-info">Info</option>
			<option value="btn-success">Success</option>
			<option value="btn-warning">Warning</option>
			<option value="btn-danger">Danger</option>
		</select>
	</p>
	<p>
		<label for="ButtonSize">Button Size :</label>
		<select id="ButtonSize" name="ButtonSize">	
			<option value="btn-lg">Large</option>
			<option value="">Default</option>       
			<option value="btn-sm">Small</option>
			<option value="btn-xs">Very Small</option>	
		</select>
	</p>
	
    <p>
		<label for="ButtonStatus">Button Status:</label>
		<select id="ButtonStatus" name="ButtonStatus">
			<option value="">Enabled</option>
			<option value="disabled">Disabled</option>
		</select>
	</p>
        
	<p>
		<label for="ButtonLink">Button Link :</label>
		<input id="ButtonLink" name="ButtonLink" type="text" value="http://" />
		
	</p>
	<p>
		<label for="ButtonTarget">Link Target: </label>
		<select id="ButtonTarget" name="ButtonTarget">
			<option value="_blank">New Window</option>	
			<option value="">Same Window</option>	
		</select>
	</p>
	<p>
		<label for="ButtonText">Button Text :</label>
		<input id="ButtonText" name="ButtonText" type="text" value="" />
	</p>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:AddButton.insert(AddButton.e)">Insert</a></div>
<!--/*************************************/ -->

<!--/*************************************/ -->


<!--/*************************************/ -->

<?php } elseif( $page == 'tabs' ){ ?>

	<script type="text/javascript">
		var tabs = {
			e: '',
			init: function(e) {
				tabs.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
				var anim=jQuery('#anim').val();
				var addclass=jQuery('#class').val();
				
				var output = '[tabgroup   ';
					if (anim){
						output+= 'anim="'+anim+'" ';
					}
					if(addclass){
						output+='class="'+addclass+'" ';
					}
					output+= ']';
				jQuery("input[id^=tab_title]").each(function(intIndex, objValue) {
					output +='[tab title="'+jQuery(this).val()+'"]';
					var obj = jQuery('textarea[id^=Content]').get(intIndex);
					output += obj.value;
					output += "[/tab]";
				});
				
				
				output += '[/tabgroup]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(tabs.init, tabs);

		jQuery(document).ready(function() {
			jQuery("#add-tab").click(function() {
				jQuery('#TabShortcodeContent').append('<p><label for="tab_title[]">Tab Title</label><input id="tab_title[]" name="tab_title[]" type="text" value="" /></p><p><label for="Content[]">Tab Content</label><textarea  style="height:100px;  width:400px;" id="Content[]" name="Content[]" type="text" value=""></textarea></p>	<hr class="divider" />');
			});
		});

	</script>
	<title>Add Tabs</title>

</head>
<body>
<form id="GalleryShortcode">
    <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
	   
    });
    </script>
    <p id="animcontent"></p>
	
	<div id="TabShortcodeContent">
		<p>
			<label for="tab_title[]">Tab Title</label>
			<input id="tab_title[]" name="tab_title[]" type="text" value="" />
		</p>
		
		<p>
			<label for="Content[]">Tab Content</label>
			<textarea style="height:100px; width:400px;" id="Content[]" name="Content[]" type="text" value="" ></textarea>
		</p>
		<hr class="divider" />
	</div>
	<strong><a style="cursor: pointer;" id="add-tab">+ Add Tab</a></strong>
    <p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:tabs.insert(tabs.e)">Insert</a></div>
<!--/*************************************/ -->
<?php } elseif( $page == 'vernav' ){ ?>

	<script type="text/javascript">
		var vernav = {
			e: '',
			init: function(e) {
				vernav.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
			
				var output = "[vernavgroup";
				
				var maintitle = jQuery('#vntitle').val();
				var anim=jQuery('#anim').val();
				var addclass=jQuery('#class').val();
				if (anim){
					output+= 'anim="'+anim+'" ';
				}
				if(addclass){
					output+='class="'+addclass+'" ';
				}

				if(maintitle) {
					output += ' title="'+maintitle+'" ';
				}
				output += "]";
				
				jQuery("input[id^=vernav_title]").each(function(intIndex, objValue) {
					output +='[vernav title="'+jQuery(this).val()+'" ';
					var obj2 = jQuery('input[id^=vernav_link]').get(intIndex);
					output += 'link= "'+obj2.value+'"]';
					output += "[/vernav]";
				});
				
				
				output += '[/vernavgroup]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(vernav.init, vernav);

		jQuery(document).ready(function() {
			jQuery("#add-vernav").click(function() {
				jQuery('#VernavShortcodeContent').append('<p><label for="vernav_title[]">Title</label><input id="vernav_title[]" name="vernav_title[]" type="text" value="" /></p><p><label for="vernav_link[]">URL</label><input id="vernav_link[]" name="vernav_link[]" type="text" value="" /></p>	<hr class="divider" />');
			});
		});

	</script>
	<title>Add Vertical Navigation</title>

</head>
<body>
<form id="GalleryShortcode">
    <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
    <p id="animcontent"></p>
	<div id="VernavShortcodeContent">
		<p>
			<label for="vntitle">Header title</label>
			<input id="vntitle" name="vntitle" type="text" value="" />
		</p>
		<hr class="divider" />
		<p>
			<label for="vernav_title[]">Title</label>
			<input id="vernav_title[]" name="vernav_title[]" type="text" value="" />
		</p>
		<p>
			<label for="vernav_link[]">URL</label>
			<input id="vernav_link[]" name="vernav_link[]" type="text" value="" />
		</p>
		<hr class="divider" />
	</div>
	<strong><a style="cursor: pointer;" id="add-vernav">+ Add Navigation item</a></strong>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />	
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:vernav.insert(vernav.e)">Insert</a></div>
<!--/*************************************/ -->

<?php } elseif( $page == 'accordion' ){ ?>

	<script type="text/javascript">
		var accordion = {
			e: '',
			init: function(e) {
				accordion.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {				
				var type=jQuery('#type').val();
				var anim=jQuery('#anim').val();
				var addclass=jQuery('#class').val();

				var output = '[accordiongroup  type="'+type+'" ';
				if (anim){
					output+= 'anim="'+anim+'" ';
				}
				if(addclass){
					output+='class="'+addclass+'" ';
				}
				output+= ']';
				jQuery("input[id^=accordion_title]").each(function(intIndex, objValue) {
					output +='[accordion title="'+jQuery(this).val()+'"';
					var obj = jQuery('textarea[id^=Content]').get(intIndex);
					output+=']';
					output += obj.value;
					output += "[/accordion]";
				});
				
				output += '[/accordiongroup]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
			}
		}
		tinyMCEPopup.onInit.add(accordion.init, accordion);

		jQuery(document).ready(function() {
			jQuery("#add-accordion").click(function() {
				jQuery('#accordionShortcodeContent').append('<p><label for="accordion_title[]">accordion Title</label><input id="accordion_title[]" name="accordion_title[]" type="text" value="" /></p><p><label for="Content[]">accordion Content</label><textarea  style="height:100px;  width:400px;" id="Content[]" name="Content[]" type="text" value=""></textarea></p><hr class="divider" />');
			});
		});

	</script>
	<title>Add accordion</title>

</head>
<body>
<form id="accordionsShortcode">
     <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
    <p id="animcontent"></p>
    <p>
        <label for="type">Accordion Type</label>
        <select name="type" id="type">
            <option value="1">Accordion</option>
            <option value="2">Toggle</option>
        </select>
    </p>
	<div id="accordionShortcodeContent">
		<p>
			<label for="accordion_title[]">Title</label>
			<input id="accordion_title[]" name="accordion_title[]" type="text" value="" />
		</p>
		<p>
			<label for="Content[]">Content</label>
			<textarea style="height:100px; width:400px;" id="Content[]" name="Content[]" type="text" value="" ></textarea>
		</p>
		<hr class="divider" />
	</div>
	<strong><a style="cursor: pointer;" id="add-accordion">+ Add accordion tab</a></strong>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:accordion.insert(accordion.e)">Insert</a></div>
<!--/*************************************/ -->

<?php } elseif( $page == 'testimonial' ){ ?>
	<script type="text/javascript">
		
		var Testimonial = {
			e: '',
			init: function(e) {
				Testimonial.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
				var anim=jQuery('#anim').val();
                var addclass=jQuery('#class').val();
				
				var pag=jQuery('#pag').val();
				var automatic=jQuery('#autoslide').val();  
				var interval=jQuery('#interval').val(); 
				
				var output = '[testimonialgroup  ';
				if (pag){
					output+= 'pag="'+pag+'" ';
				}
				if (anim){
					output+= 'anim="'+anim+'" ';
				}
				if(addclass){
					output+='class="'+addclass+'" ';
				}
				
				if (automatic){
					output+= 'auto="'+automatic+'" ';
				}
				if(interval){
					output+='interval="'+interval+'" ';
				}
				output+= ']';
				jQuery("input[id^=authorName]").each(function(intIndex, objValue) {
					output +='[testimonial title="'+jQuery(this).val()+'"';
					var position = jQuery('input[id^=authorPosition]').get(intIndex);
					if (position) output += ' position="'+position.value+'"';
					var company = jQuery('input[id^=company]').get(intIndex);
					if (company) output += ' company="'+company.value+'"';
					
					var photoholder = '#authorphoto'+intIndex+'-img';
					var photo=jQuery(photoholder).val();
					if(photo) output+=' photo="'+photo+'"';
					
					output += "]";
					var obj = jQuery('textarea[id^=Content]').get(intIndex);
					output += obj.value;
					output += "[/testimonial]";
					
				});
				
				
				output += '[/testimonialgroup]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
			}
		}
		tinyMCEPopup.onInit.add(Testimonial.init, Testimonial);
		jQuery(document).ready(function() {
			var counter = 0;
			var photo = '';
			jQuery("#add-testimonial").click(function() {
				counter++;
				photo = 'authorphoto' + counter;
				
				weblusive_styling_uploader(photo);
				
				jQuery('#testimonialShortcodeContent').append('<p><label for="authorName[]">Author Name</label><input id="authorName[]" name="authorName[]" type="text" value="" /></p><p><label for="authorPosition[]">Author Position</label><input id="authorPosition[]" name="authorPosition[]" type="text" value="" /></p><p><label for="company[]">Author Company</label><input id="company[]" name="company[]" type="text" value="" /></p><div class="wrap-list"><label for="upload_authorphoto'+counter+'_button">Author Photo:</label><input id="authorphoto'+counter+'-img" class="img-path" type="text" size="56" style="direction:ltr; text-align:left" name="authorphoto'+counter+'" value="" /><input id="upload_authorphoto'+counter+'_button" type="button" class="small_button" value="Upload" /><div id="authorphoto'+counter+'-preview" class="img-preview" <?php if(!weblusive_get_option('authorphoto')) echo 'style="display:none;"' ?>><img src="<?php if(weblusive_get_option('authorphoto')) echo weblusive_get_option('authorphoto'); else echo get_template_directory_uri().'/library/admin-panel/images/spacer.png'; ?>" alt="" /><a class="del-img" title="Delete"></a></div><div class="clear"></div></div><p><label for="Content[]">Text</label><textarea  style="height:100px;  width:400px;" id="Content[]" name="Content[]" type="text" value=""></textarea></p><hr class="divider" />');
			});
		});
	
	</script>
	<title>Insert Testimonial</title>
</head>
<body>
<form id="GalleryShortcode">
     <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
	  jQuery("#interval-wrapper").hide();
	  	jQuery("#autoslide").change(function(){
			var selected = jQuery('#autoslide').val();
			if (selected == 'false'){
				jQuery("#interval-wrapper").hide();
			}
			else{
				jQuery("#interval-wrapper").show();
			}
		});
    });
    </script>
    <p id="animcontent"></p>
	<p>
        <label for="pag">Carousel pagination</label>
        <select id="pag" name="pag">
            <option value="true">Yes</option>
            <option value="false">No</option>
        </select>
    </p>
	<p>
		<label for="autoslide">Automatic sliding</label>
		<select id="autoslide" name="autoslide">
			<option value="false">No</option>
			<option value="true">Yes</option>
		</select>
	</p>
	<div id="carousel-options">
		<p id="interval-wrapper">
			<label for="interval">Sliding interval</label>
			<input id="interval" name="interval" type="text" value="6000" />
		</p>
	</div>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
	<hr class="divider" />
	<div id="testimonialShortcodeContent">
		<p>
			<label for="authorName[]">Author Name</label>
			<input id="authorName[]" name="authorName[]" type="text" value="" />
		</p>
		<p>
			<label for="authorPosition[]">Author Position</label>
			<input id="authorPosition[]" name="authorPosition[]" type="text" value="" />
		</p>
		<p>
			<label for="company[]">Author Company</label>
			<input id="company[]" name="company[]" type="text" value="" />
		</p>
		<div class="wrap-list">
			<label for="upload_authorphoto0_button">Author Photo:</label>
			<input id="authorphoto0-img" class="img-path" type="text" size="56" style="direction:ltr; text-align:left" name="authorphoto0" value="" />
			<input id="upload_authorphoto0_button" type="button" class="small_button" value="Upload" />
			<div id="authorphoto0-preview" class="img-preview" <?php if(!weblusive_get_option('authorphoto0')) echo 'style="display:none;"' ?>>
				<img src="<?php if(weblusive_get_option('authorphoto0')) echo weblusive_get_option('authorphoto0'); else echo get_template_directory_uri().'/library/admin-panel/images/spacer.png'; ?>" alt="" />
				<a class="del-img" title="Delete"></a>
			</div>
			<div class="clear"></div>
		</div>
		
		<p>
			<label for="Content[]">Text : </label>
			<textarea id="Content[]" name="Content[]" col="20"></textarea>
		</p>
		<hr class="divider" />
	</div>
	<strong><a style="cursor: pointer;" id="add-testimonial">+ Add another testimonial</a></strong>
	
</form>
<div class="mce-foot"><a class="add" href="javascript:Testimonial.insert(Testimonial.e)">Insert</a></div>
<!--/*************************************/ -->

<?php } elseif( $page == 'alert' ){ ?>

	<script type="text/javascript">
		var alert = {
			e: '',
			init: function(e) {
				alert.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
                            
                var alertColor=jQuery('#alertColor').val();
				var alertType = jQuery('#alertType').val();
				var Content = jQuery('#Content').val();
				var anim=jQuery('#anim').val();
				var addclass=jQuery('#class').val();

				
				var output = '[alert ';
				if (anim){
					output+= 'anim="'+anim+'" ';
				}
				if(addclass){
					output+='class="'+addclass+'" ';
				}
				if(alertColor){
					output+= 'color="'+alertColor+'" ';
				}
				if(alertType) {
					output += 'type="'+alertType+'"';
				}
			
				output += ']'+Content+'[/alert]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(alert.init, alert);

	</script>
	<title>Add Alert box</title>

</head>
<body>
<form id="GalleryShortcode">
    <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
    <p id="animcontent"></p>
	<p>
		<label for="alertType">Type :</label>
		<select id="alertType" name="alertType">
			<option value="alertdefault">Default</option>
			<option value="alert-dismissible">Dismissible</option>
		</select>
	</p>
	<p>
		<label for="alertColor">Color :</label>
		<select id="alertColor" name="alertColor">
			<option value="alert-info">Info</option>
			<option value="alert-success">Success</option>
			<option value="alert-warning">Warning</option>
			<option value="alert-danger">Danger</option>	
		</select>
	</p>
	<p>
		<label for="Content">Content : </label>
		<textarea id="Content" name="Content" col="20"></textarea>
	</p>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:alert.insert(alert.e)">Insert</a></div>
<!--/*************************************/ -->

<?php } elseif( $page == 'slider' ){ ?>
	
	<script type="text/javascript">
		var Slider = {
			e: '',
			init: function(e) {
				Slider.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
				var anim=jQuery('#anim').val();
				var addclass=jQuery('#class').val();
				var nav = jQuery('#nav').val();
				var auto = jQuery('#auto').val();
				var speed = jQuery('#speed').val();
				var sitems = jQuery('#sitems').val();
				
				var output = "[slider ";
			
				if (anim){
					output+= 'anim="'+anim+'" ';
				}
				if(addclass){
					output+='class="'+addclass+'" ';
				}
				
				
				if(nav) {
					output += ' nav="'+nav+'"';
				}
				
				if(speed) {
					output += ' speed="'+speed+'"';
				}
				if(auto) {
					output += ' auto="'+auto+'"';
				}
				
				
				output += "]";
				
				jQuery("input[id^=slide_title]").each(function(intIndex, objValue) {
					output +='[slideritem ';
					//var obj = jQuery('input[id^=slide_image]').get(intIndex);
					var photoholder = '#slideimage'+intIndex+'-img';
					var photo=jQuery(photoholder).val();
					if(photo) output+=' image="'+photo+'" ';
					output+=']'+jQuery(this).val();
					//output += ' image="'+ obj.value +'"]';
					output += "[/slideritem]";
				});
				
				output += '[/slider]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(Slider.init, Slider);

		jQuery(document).ready(function() {
			
			var counter = 0;
			var photo = '';
			
			
			
			jQuery("#add-slide").click(function() {
				counter++;
				photo = 'slideimage' + counter;
				weblusive_styling_uploader(photo);
				jQuery('#SlideShortcodeContent').append('<p><label for="slide_title[]">Slide Title</label><input type="text" id="slide_title[]" name="slide_title[]"></p><div class="wrap-list"><label for="upload_slideimage'+counter+'_button">Slide image:</label><input id="slideimage'+counter+'-img" class="img-path" type="text" size="56" style="direction:ltr; text-align:left" name="slideimage'+counter+'" value="" /><input id="upload_slideimage'+counter+'_button" type="button" class="small_button" value="Upload" /><div id="slideimage'+counter+'-preview" class="img-preview" <?php if(!weblusive_get_option('slideimage')) echo 'style="display:none;"' ?>><img src="<?php if(weblusive_get_option('slideimage')) echo weblusive_get_option('slideimage'); else echo get_template_directory_uri().'/library/admin-panel/images/spacer.png'; ?>" alt="" /><a class="del-img" title="Delete"></a></div><div class="clear"></div></div>	<hr class="divider" />');
			});
		});
		
	</script>
	<title>Add Slider</title>

</head>
<body>

<form id="SliderShortcode">
    <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
	
    });
    </script>
    
	<div id="SlideShortcodeContent">
			<p id="animcontent"></p>
			
			<p>
				<label for="nav">Navigation</label>
				<select id="nav" name="nav">
					<option value="true">Yes</option>
					<option value="false">No</option>
				</select>
			</p>
			
			<p>
				<label for="auto">Autoplay</label>
				<select id="auto" name="auto">
					<option value="false">No</option>
					<option value="true">Yes</option>
				</select>
			</p>
			<p>
				<label for="speed">Autoplay Speed</label>
				<input id="speed" name="speed" type="text" value="3000" />
			</p>
		
			<p>
				<label for="class">Extra Class</label>
				<input id="class" name="class" type="text" value="" />
			</p>
			<hr class="divider" />
		<p>
			<label for="slide_title[]">Slide Title</label>
			<input type="text" id="slide_title[]" name="slide_title[]">
		</p>
		
		<div class="wrap-list">
			<label for="upload_slideimage0_button">Slide image:</label>
			<input id="slideimage0-img" class="img-path" type="text" size="56" style="direction:ltr; text-align:left" name="slideimage0" value="" />
			<input id="upload_slideimage0_button" type="button" class="small_button" value="Upload" />
			<div id="slideimage0-preview" class="img-preview" <?php if(!weblusive_get_option('slideimage0')) echo 'style="display:none;"' ?>>
				<img src="<?php if(weblusive_get_option('slideimage0')) echo weblusive_get_option('slideimage0'); else echo get_template_directory_uri().'/library/admin-panel/images/spacer.png'; ?>" alt="" />
				<a class="del-img" title="Delete"></a>
			</div>
			<div class="clear"></div>
		</div>
		<hr class="divider" />
	</div>
	<strong><a style="cursor: pointer;" id="add-slide">+ Add Slide</a></strong>
	
</form>
<div class="mce-foot"><a class="add" href="javascript:Slider.insert(Slider.e)">Insert</a></div>
<!--/*************************************/ -->
<?php } elseif( $page == 'carousel' ){ ?>
	
	<script type="text/javascript">
		var Carousel = {
			e: '',
			init: function(e) {
				Carousel.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
			
				var output = "[carousel ";
				var nav = jQuery('#nav').val();
				var pag = jQuery('#pag').val();
				var auto = jQuery('#auto').val();
				var speed = jQuery('#speed').val(); 
				
				var sitems = jQuery('#sitems').val();
				var anim=jQuery('#anim').val();
				var addclass=jQuery('#class').val();
				
				if (anim){
					output+= 'anim="'+anim+'" ';
				}
				if(addclass){
					output+='class="'+addclass+'" ';
				}	
				
				if(nav) {
					output += 'nav="'+nav+'" ';
				}
				if(pag) {
					output += 'pag="'+pag+'" ';
				}
				if(auto) {
					output += ' auto="'+auto+'"';
				}
				if(speed) {
					output += ' speed="'+speed+'"';
				}
				
				if(sitems) {
					output += ' sitems="'+sitems+'"';
				}
                               
				output += "]";
				
				jQuery("textarea[id^=carousel_content]").each(function(intIndex, objValue) {
					output +='[caritem]'+jQuery(this).val()+'[/caritem]';
				});
				
				output += '[/carousel]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(Carousel.init, Carousel);

		jQuery(document).ready(function() {
			jQuery("#interval-holder").hide();
			jQuery("#carouselAuto").change(function(){
				var selected = jQuery('#carouselAuto').val();
				if (selected == 'true'){
					jQuery("#interval-holder").show();
				}
				else{
					jQuery("#interval-holder").hide();
				}
			});
			jQuery("#add-carousel").click(function() {
				jQuery('#SlideShortcodeContent').append('<p><label for="carousel_content[]">Slide Content</label><textarea id="carousel_content[]" name="carousel_content[]" type="text" value="" ></textarea><hr /></p>');
			});
		});
		
	</script>
	<title>Add Carousel slide</title>

</head>
<body>

<form id="CarouselShortcode">
    <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
	  
    });
    </script>
    <p id="animcontent"></p>
	<div id="SlideShortcodeContent">
			
			<p>
				<label for="nav">Navigation</label>
				<select id="nav" name="nav">
					<option value="true">Yes</option>
					<option value="false">No</option>
				</select>
			</p>
			<p class="pag">
				<label for="pag">Pagination</label>
				<select id="pag" name="pag">
					<option value="true">Yes</option>
					<option value="false">No</option>
				</select>
			</p>
			<p>
				<label for="auto">Autoplay</label>
				<select id="auto" name="auto">
					<option value="true">Yes</option>
					<option value="false">No</option>
				</select>
			</p>	
			<p>
				<label for="speed">Autoplay Speed</label>
				<input id="speed" name="speed" type="text" value="3000" />
			</p>
	
			<p class="sitems">
				<label for="sitems">Slide Items for carousel</label>
				<input id="sitems" name="sitems" type="text" value="3" />
			</p>
			<p>
				<label for="carousel_content[]">Slide Content</label>
				<textarea id="carousel_content[]" name="carousel_content[]" type="text" value="" ></textarea>
			</p>
			<p>
				<label for="class">Extra Class</label>
				<input id="class" name="class" type="text" value="" />
			</p>
			<hr />
		</div>
	<strong><a style="cursor: pointer;" id="add-carousel">+ Add slide</a></strong>
	
</form>
<div class="mce-foot"><a class="add" href="javascript:Carousel.insert(Carousel.e)">Insert</a></div>
<!--/*************************************/ -->

<?php } elseif( $page == 'contact' ){ ?>
	<script type="text/javascript">
		
		var Contact = {
			e: '',
			init: function(e) {
				Contact.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
				var address = jQuery('#Contactaddress').val();
				var tel = jQuery('#Contacttel').val();
				var email = jQuery('#Contactemail').val();
				var website=jQuery('#website').val();
				var anim=jQuery('#anim').val();
				var addclass=jQuery('#class').val();
				
				var output = '[contact ';
				if (anim){
					output+= 'anim="'+anim+'" ';
				}
				if(addclass){
					output+='class="'+addclass+'" ';
				}
				
				if(address) {
					output += 'address="'+address+'" ';
				}
				
                if(tel) {
					output += 'tel="'+tel+'" ';
				}
				
				if(email) {
					output += 'email="'+email+'" ';
				}
				if(website) {
					output += 'website="'+website+'" ';
				}
				output += '/]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(Contact.init, Contact);

	</script>
	<title>Insert contact details</title>

</head>
<body>

<form id="GalleryShortcode">
    <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
    <p id="animcontent"></p>
	
	<p>
		<label for="Contactaddress">Address</label>
		<input id="Contactaddress" name="Contactaddress" type="text" value="" />
	</p>
	
	<p>
		<label for="Contacttel">Telephone</label>
		<input id="Contacttel" name="Contacttel" type="text" value="" />
	</p>
    
	
	<p>
		<label for="Contactemail">E-mail</label>
		<input id="Contactemail" name="Contactemail" type="text" value="" />
	</p>
	<p>
		<label for="website">Website</label>
		<input id="website" name="website" type="text" value="" />
	</p>

	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
		
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:Contact.insert(Contact.e)">Insert</a></div>
<!--/*************************************/ -->

<?php } elseif($page=='fblock') {?>
    <script type="text/javascript">
        var fblock={
            e: '',
            init: function(e){
                fblock.e=e,
                tinyMCEPopup.resizeToInnerSize();
            },
            insert: function createGalleryShortcode(e){
				var Type=jQuery('#fblockType').val();
                var Title=jQuery('#fblockTitle').val();
				var Family=jQuery('#family').val();
                var Icon=jQuery('#icon').val();
                var anim=jQuery('#anim').val();
                var addclass=jQuery('#class').val();
		
                var output='[fblock';
                if (anim){
                    output+= ' anim="'+anim+'"';
                }
                if(addclass){
                    output+=' class="'+addclass+'"';
                }
				if(Type){
                    output+=' type="'+Type+'"';
                }
                if(Title){
                    output+=' title="'+Title+'"';
                }
				if(Family){
                    output+=' family="'+Family+'"';
                }
				
                if(Icon){
                    output+=' icon="'+Icon+'"';
                }
               			                
                output+='/]';
                tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		tinyMCEPopup.close();
            }
        }
        tinyMCEPopup.onInit.add(fblock.init, fblock);
    </script>
    <title>Insert Featured Block</title>
</head>
<body>
    <form id="GalleryShortcode">
         <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
	  
    });
    </script>
    <p id="animcontent"></p>
	<p>
		<label for="fblockType">Block Type:</label>
		<select id="fblockType" name="fblockType">
			<option value="default">Default</option>
			<option value="alter">Alternative</option>
		</select>
	</p>
	<p>
		<label for="fblockTitle">Block Title:</label>
		<input type="text" id="fblockTitle">
	</p>
	<p>
		<label for="family">Icon Family</label>
		<select id="family" name="family">
			<option value="fa">Font Awesome</option> 
			<option value="ion">Ion icons</option>
			<option value="md">Material Design</option>
		</select>
	</p>
	 <p>
		<label for="icon">Block Icon:</label>
		<input type="text" id="icon">
	</p>
	
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
		
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:fblock.insert(fblock.e)">Insert</a></div>
<!--/*************************************/ -->

<?php } elseif($page=='tblock'){ ?>
<script type="text/javascript">
    var tblock={
        e:'',
        init:function(e){
            tblock.e=e;
            tinyMCEPopup.resizeToInnerSize();
        },
        insert:function createGalleryShortcode(e){
            var Title=jQuery('#tblockTitle').val();
			var Tag=jQuery('#tblockTag').val();
			var titleCustomColor=jQuery('#titleCustomColor').val();
            var anim=jQuery('#anim').val();
            var addclass=jQuery('#class').val();
            var output='[tblock ';
            if (anim){
                output+= 'anim="'+anim+'" ';
            }
            if(addclass){
                output+='class="'+addclass+'" ';
            }
           
			if(titleCustomColor){
                output+=' tcuscolor="'+titleCustomColor+'"';
            }
			if(Title){
                output+=' title="'+Title+'"';
            }
			
			if(Tag){
                output+=' tag="'+Tag+'"';
            }

            output+='/]';
            tinyMCEPopup.execCommand('mceReplaceContent', false, output);
            tinyMCEPopup.close();
        }
    }
    tinyMCEPopup.onInit.add(tblock.init, tblock);
</script>
<title>Add Title Block</title>
</head>
<body>
    <form id="GalleryShortcode">
    <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
	 
    });
    </script>
    <p id="animcontent"></p>
	
        <p>
            <label for="tblockTitle">Title:</label>
            <input type="text" id="tblockTitle">
        </p>
        <p>
            <label for="tblockTag">Tag:</label>
            <select id="tblockTag" name="tblockTag">
                <option value="h1">H1</option>
                <option value="h2">H2</option>
				<option value="h3">H3</option>
				<option value="h4">H4</option>
				<option value="h5">H5</option>
				<option value="h6">H6</option>
            </select>
        </p>
		
		<p>
		<label for="titleCustomColor"> Title custom color :</label>
		<div id="titleCustomColorSelector" class="color-pic">
			<div></div>
		</div>
		<input style="width:80px; margin-right:5px;"  name="titleCustomColor" id="titleCustomColor" type="text" value="" />
							
			<script>
			jQuery(document).ready(function() {
				jQuery('#titleCustomColorSelector').ColorPicker({
					onShow: function (colpkr) {
						jQuery(colpkr).fadeIn(500);
						return false;
					},
					onHide: function (colpkr) {
						jQuery(colpkr).fadeOut(500);
						return false;
					},
					onChange: function (hsb, hex, rgb) {
						jQuery('#titleCustomColorSelector div').css('backgroundColor', '#' + hex);
						jQuery('#titleCustomColor').val('#'+hex);
					}
				});
			});
				</script>
		
	</p>
        <p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
		
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:tblock.insert(tblock.e)">Insert</a></div>
<!--/*************************************/ 


<!--/*************************************/ -->

<?php } elseif($page=='reveal') { ?>
<script type="text/javascript">
    var reveal={
        e:'',
        init:function(e){
            reveal.e=e;
            //tinyMcePopup.resizeToInnerSize();
        },
        insert: function createGalleryShortcode(e){
            var ButtonColor = jQuery('#ButtonColor').val();
            var Buttonsize = jQuery('#Buttonsize').val();
            var Buttontype = jQuery('#ButtonType').val();
            var Buttontext = jQuery('#Buttontext').val();
            var RevTitle = jQuery('#revTitle').val();
            var RevContent = jQuery('#revContent').val();
            var addclass=jQuery('#class').val();
            
            var output = '[reveal ';
         
            if(addclass){
                output+='class="'+addclass+'" ';
            }
            if(ButtonColor) {
                output += ' color="'+ButtonColor+'" ';
            }
            if(Buttonsize) {
                output += ' size="'+Buttonsize+'" ';
            }
            if(Buttontype) {
                output += ' type="'+Buttontype+'" ';
            }
            if(Buttontext){
                output+=' button="'+Buttontext+'"';
            }
           
            if(RevTitle){
                output+=' revtitle="'+RevTitle+'"';
            }
            

            output += ']'+RevContent+'[/reveal]';
            tinyMCEPopup.execCommand('mceReplaceContent', false, output);
            tinyMCEPopup.close();
	
	}
}
tinyMCEPopup.onInit.add(reveal.init, reveal);
jQuery(function(){
	jQuery("#button-params").hide();
	jQuery("#ButtonType").change(function(){
		var selected = jQuery('#ButtonType').val();
		if (selected == ''){
			jQuery("#button-params").hide();
		}
		else{
			jQuery("#button-params").show();
		}
	});
});
</script>
<title>Add Modal Box</title>

</head>
<body>
    <form id="GalleryShortcode">
	<p>
		<label for="ButtonType">Button Type:</label>
		<select id="ButtonType" name="ButtonType">
			<option value="button solid-button">Button</option>
			<option value="" selected="selected">Minimal (link-style)</option>
		</select>
	</p>
    <div id="button-params">
		<p>
			<label for="ButtonColor">Button Color:</label>
			<select id="ButtonColor" name="ButtonColor">
				<option value="purple">Purple</option>
				<option value="dark">Dark</option>
				<option value="white">White</option>
				<option value="btn-primary">Primary</option>
				<option value="btn-info">Info</option>
				<option value="btn-success">Success</option>
				<option value="btn-warning">Warning</option>
				<option value="btn-danger">Danger</option>
			</select>
		</p>
		<p>
			<label for="ButtonSize">Button Size :</label>
			<select id="ButtonSize" name="ButtonSize">
				
				<option value="">Default</option>
				<option value="btn-lg">Large</option>
				<option value="btn-sm">Small</option>
				<option value="btn-xs">Very small</option>	
			</select>
		</p>
	</div>
	
	<p>
		<label for="Buttontext">Button Text :</label>
		<input id="Buttontext" name="Buttontext" type="text" value="" />
	</p>
	<hr>
   
	<p>
		<label for="revTitle">Modal Box Title</label>
		<input type="text" id="revTitle" name="revTitle">
	</p>
	<p>
		<label for="revContent">Modal Box Content</label>
		<textarea id="revContent" name="revContent" col="20"></textarea>
	</p>

	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:reveal.insert(reveal.e)">Insert</a></div>
<!--/*************************************/ -->

<!--/*************************************/ -->


<?php } elseif($page=='social') { ?>
<script type="text/javascript">
    var social={
        e:'',
        init:function(e){
            social.e=e;
            tinyMCEPopup.resizeToInnerSize();
        },
        insert: function createGalleryShortCode(e){
            
            var Icon = jQuery('#icon').val();
            var Link = jQuery('#link').val();
            var anim = jQuery('#anim').val();
			var target = jQuery('#social_target').val();
			var size = jQuery('#social_size').val();
			
            var addclass=jQuery('#class').val();
					
            var output = '[social ';
            if (anim){
                output+= ' anim="'+anim+'" ';
            }
            if(addclass){
                output+=' class="'+addclass+'" ';
            }
			 if(size){
                output+=' size="'+size+'" ';
            }
			  if(target){
                output+=' target="'+target+'" ';
            }
            output+= ']';
            jQuery("select[id^=icon]").each(function(intIndex, objValue) {
		output +='[soc_button icon="'+jQuery(this).val()+'"';
		var obj = jQuery('input[id^=link]').get(intIndex);
		output += ' link="'+obj.value+'" ';
		output += "/]";
            });
				
            output += '[/social]';
            tinyMCEPopup.execCommand('mceReplaceContent', false, output);
            tinyMCEPopup.close();
        }
    }
    tinyMCEPopup.onInit.add(social.init, social);
    jQuery(document).ready(function() {
        jQuery("#add-social").click(function() {
            jQuery('#SocShortcodeContent').append('<p><label for="icon[]">Social Button</label><select id="icon[]" name="icon[]"><option value="bitbucket">Bitbucket</option><option value="dribbble">Dribble</option><option value="facebook">Facebook</option><option value="flickr">Flickr</option><option value="github">Github</option><option value="google-plus">Google+</option><option value="instagram">Instagram</option><option value="linkedin">LinkedIn</option><option value="pinterest">Pinterest</option><option value="skype">Skype</option><option value="stack-exchange">Stackexchange</option>        <option value="tumblr">Tumblr</option><option value="twitter">Twitter</option><option value="vk">Vkontakte</option><option value="youtube">Youtube</option></select></p><p><label for="link[]">Link to:</label><input type="text" id="link[]" name="link[]"></p><hr class="divider" />');
    });
    });
</script>
<title>Add Social Button</title>
</head>
<body>
    <form id="GalleryShortcode">
        <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
		<p id="animcontent"></p>
		<p>
			<label for="social_target">Link target</label>
			<select id="social_target" name="social_target">
				<option value="_blank">Open in new page</option>
				<option value="">Open in same page</option>
			</select>
        </p>
		<p>
			<label for="class">Extra Class (optional)</label>
			<input id="class" name="class" type="text" value="" />
        </p>
        <div id="SocShortcodeContent">
            <p>
				<label for="icon[]">Social Button</label>
				<select id="icon[]" name="icon[]">
					<option value="bitbucket">Bitbucket</option>
					<option value="dribbble">Dribble</option>
					<option value="facebook">Facebook</option>
					<option value="flickr">Flickr</option>
					<option value="github">Github</option>
					<option value="google-plus">Google+</option>
					<option value="instagram">Instagram</option>
					<option value="linkedin">LinkedIn</option>
					<option value="pinterest">Pinterest</option>
					<option value="skype">Skype</option>
					<option value="stack-exchange">Stackexchange</option>        
					<option value="tumblr">Tumblr</option>
					<option value="twitter">Twitter</option>
					<option value="vk">Vkontakte</option>
					<option value="youtube">Youtube</option>
				</select>
            </p>
            <p>
                <label for="link[]">Link to (with http):</label>
                <input type="text" id="link[]" name="link[]">
            </p>
			
            <p>
                <hr class="divider" />  
            </p>
        </div>
        <strong><a style="cursor: pointer;" id="add-social">+ Add Social Button</a></strong>
    </form>
	<div class="mce-foot"><a class="add" href="javascript:social.insert(social.e)">Insert</a></div>
<!--/*************************************/ -->


<?php } elseif($page=='teammember') { ?>
<script type="text/javascript">
    var team={
        e:'',
        init:function(e){
            team.e=e;
            tinyMCEPopup.resizeToInnerSize();
        },
        insert: function createGalleryShortCode(e){
			var name = jQuery('#membername').val();
			var position = jQuery('#memberposition').val();
			var photo = jQuery('#memberphoto-img').val();
			var anim=jQuery('#anim').val();
			var addclass=jQuery('#class').val();

			var output = '[teammember ';
				if (anim){
					output+= 'anim="'+anim+'" ';
				}
				if(addclass){
					output+='class="'+addclass+'" ';
				}
				
				if(name) {
					output += ' name="'+name+'"';
				}
				if(position) {
					output += ' position="'+position+'"';
				}
							
				if(photo) {
					output += ' photo="'+photo+'"';
				} 
				
			output += ']';
            jQuery("select[id^=tmicon]").each(function(intIndex, objValue) {
				output +='[tmsocbutton tmicon="'+jQuery(this).val()+'"';
				var obj = jQuery('input[id^=tmlink]').get(intIndex);
				output += ' tmlink="'+obj.value+'" ';
				output += "/]";
            });
				
            output +='[/teammember]';
            tinyMCEPopup.execCommand('mceReplaceContent', false, output);
            tinyMCEPopup.close();
        }
    }
    tinyMCEPopup.onInit.add(team.init, team);
    jQuery(document).ready(function() {
        jQuery("#add-social").click(function() {
            jQuery('#TeamMemberContent').append('<p><label for="tmicon[]">Social Button</label><select id="tmicon[]" name="tmicon[]"><option value="fa-bitbucket">Bitbucket</option><option value="fa-dribbble">Dribble</option><option value="fa-facebook">Facebook</option><option value="fa-flickr">Flickr</option><option value="fa-github">Github</option><option value="fa-google-plus">Google+</option><option value="fa-instagram">Instagram</option><option value="fa-linkedin">LinkedIn</option><option value="fa-pinterest">Pinterest</option><option value="fa-skype">Skype</option><option value="fa-stack-exchange">Stackexchange</option><option value="fa-tumblr">Tumblr</option><option value="fa-twitter">Twitter</option><option value="fa-vk">Vkontakte</option><option value="fa-youtube">Youtube</option></select></p><p><label for="tmlink[]">Link to:</label><input type="text" id="tmlink[]" name="tmlink[]"></p><hr class="divider" />');
		});
    });
    
</script>
<title>Add Team Member</title>
</head>
<body>
<form id="GalleryShortcode">
	<script> 
	jQuery(function(){
	  jQuery("#animcontent").load("animation.html"); 
	 
	});
	</script>
    <p id="animcontent"></p>
	<div id="TeamMemberContent">
		
		<p>
			<label for="membername">Name</label>
			<input type="text" id="membername" name="membername" />
		</p>
		<p>
			<label for="memberposition">Position</label>
			<input type="text" id="memberposition" name="memberposition" />
		</p>
		<div class="wrap-list">
			<label for="upload_memberphoto_button">Photo:</label>
			<input id="memberphoto-img" class="img-path" type="text" size="56" style="direction:ltr; text-align:left" name="memberphoto" value="" />
			<input id="upload_memberphoto_button" type="button" class="small_button" value="Upload" />
			<div id="memberphoto-preview" class="img-preview" <?php if(!weblusive_get_option('memberphoto')) echo 'style="display:none;"' ?>>
				<img src="<?php if(weblusive_get_option('memberphoto')) echo weblusive_get_option('memberphoto'); else echo get_template_directory_uri().'/library/admin-panel/images/spacer.png'; ?>" alt="" />
				<a class="del-img" title="Delete"></a>
			</div>
			<div class="clear"></div>
		</div>
		<p>
			<label for="class">Extra Class</label>
			<input id="class" name="class" type="text" value="" />
		</p>
		<hr class="divider" />
		<p>
			<label for="tmicon[]">Social Button</label>
			<select id="tmicon[]" name="tmicon[]">
				<option value="fa-bitbucket">Bitbucket</option>
				<option value="fa-dribbble">Dribble</option>
				<option value="fa-facebook">Facebook</option>
				<option value="fa-flickr">Flickr</option>
				<option value="fa-github">Github</option>
				<option value="fa-google-plus">Google+</option>
				<option value="fa-instagram">Instagram</option>
				<option value="fa-linkedin">LinkedIn</option>
				<option value="fa-pinterest">Pinterest</option>
				<option value="fa-skype">Skype</option>
				<option value="fa-stack-exchange">Stackexchange</option>        
				<option value="fa-tumblr">Tumblr</option>
				<option value="fa-twitter">Twitter</option>
				<option value="fa-vk">Vkontakte</option>
				<option value="fa-youtube">Youtube</option>
			</select>
		</p>
		<p>
			<label for="tmlink[]">Link to (without http):</label>
			<input type="text" id="tmlink[]" name="tmlink[]">
		</p>
		<hr class="divider" />
	</div>
	<strong><a style="cursor: pointer;" id="add-social">+ Add Social Button</a></strong>
	
</form>
<div class="mce-foot"><a class="add" href="javascript:team.insert(team.e)">Insert</a></div>

<!--/*************************************/ -->
<?php } elseif($page=='list') { ?>
<script type="text/javascript">
	var list = {
		e: '',
		init: function(e) {
			list.e = e;
			tinyMCEPopup.resizeToInnerSize();
		},
		insert: function createGalleryShortcode(e) {
			var output = '[list ';
			var anim=jQuery('#anim').val();
			var addclass=jQuery('#class').val();
			var type=jQuery('#type').val();
			
			if (anim){
				output+= ' anim="'+anim+'"';
			}
			if (type){
				output+= ' type="'+type+'"';
			}
			
			if(addclass){
				output+=' class="'+addclass+'"';
			}
			output+=']';
			jQuery("input[id^=itemName").each(function(intIndex, objValue) {
				output +='[listitem ';
				var iconlink=jQuery('input[id^=itemLink]').get(intIndex);
				if(iconlink.value){
					output+=' link="'+iconlink.value+'"';
				}
				output+=']';
				var obj = jQuery('input[id^=itemName]').get(intIndex);
				output += obj.value;
				output += "[/listitem]";
			});
			
			
			output += '[/list]';
			tinyMCEPopup.execCommand('mceReplaceContent', false, output);
			tinyMCEPopup.close();
			
		}
	}
	tinyMCEPopup.onInit.add(list.init, list);

	jQuery(document).ready(function() {
		counter=1;
		
		jQuery("#add-listitem").click(function() {
			jQuery('#ListItemShortcodeContent').append('<p><label for="itemName[]">List Item Name</label><input id="itemName[]" name="itemName[]" type="text" value="" /></p><p><label for="itemLink[]">List Item Link</label><input  id="itemLink[]" name="itemLink[]" type="text" value="" /></p><hr class="divider" />');
			
			counter++;
		});
	});

</script>
<title>Add  List</title>

</head>
<body>
<form id="GalleryShortcode">
	<script> 
		jQuery(function(){
			jQuery("#animcontent").load("animation.html"); 
			
		});
    </script>
  
	<div id="ListItemShortcodeContent">
		<p id="animcontent"></p>
		
		<p>
			<label for="type">List Type</label>
			<select id="type" name="type">
				<option value="order">Ordered</option>
				<option value="unorder">Unordered</option>
				<option value="list-unstyled">Unstyled</option>
				<option value="list-icons">Arrow</option>
			</select>
		</p>
		
		<p>
			<label for="class">Extra Class</label>
			<input id="class" name="class" type="text" value="" />
		</p>
		<hr class="divider" />
		<p>
			<label for="itemName[]">List Item Name</label>
			<input id="itemName[]" name="itemName[]" type="text" value="" />
		</p>
		
		<p>
			<label for="itemLink[]">List Item Link</label>
			<input  id="itemLink[]" name="itemLink[]" type="text" value="" />
		</p>		
		<hr class="divider" />
	</div>
	<strong><a style="cursor: pointer;" id="add-listitem">+ Add  List Item</a></strong>
	
</form>
<div class="mce-foot"><a class="add" href="javascript:list.insert(list.e)">Insert</a></div>
<!--/*************************************/ -->
<?php } elseif( $page == 'blockquote' ){
?>
	<script type="text/javascript">
		var blockquote = {
			e: '',
			init: function(e) {
				blockquote.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
				var author=jQuery('#author').val();
				var company=jQuery('#company').val();
				var content = jQuery('#content').val();
				var bcuscolor = jQuery('#BCustomColor').val();
				var anim=jQuery('#anim').val();     
				var position=jQuery('#pos').val(); 
				var addclass=jQuery('#class').val();        
				var output = '[blockquote';
				if(author) {
					output += ' author="'+author+'"';
				}
                
				if(company) {
					output += ' company="'+company+'"';
				}
				
				if (anim){
					output+= ' anim="'+anim+'"';
				}
				if (position){
					output+= ' pos="'+position+'"';
				}
				if (bcuscolor){
					output+= ' bcuscolor="'+bcuscolor+'"';
				}
				if(addclass){
					output+=' class="'+addclass+'"';
				}
				output += ']'+content+'[/blockquote]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(blockquote.init, blockquote);

	</script>
	<title>Add Blockquote</title>

</head>
<body>
<form id="GalleryShortcode">
    <script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
    <p id="animcontent"></p>
	<p>
		<label for="pos">Position:</label>
		 <select id="pos" name="pos">
			<option value="">Left</option>
			<option value="pull-right">Right</option>
		</select>
	</p>
	<p>
		<label for="author">Author :</label>
		<input type="text" id="author" name="author"/>
	</p>
	<p>
		<label for="company">Company :</label>
		<input type="text" id="company" name="company"/>
	</p>
	<p>
		<label for="content">Content : </label>
		<textarea id="content" name="content" col="20"></textarea>
	</p>
	<p>
		<label for="BCustomColor">Border custom color :</label>
		<div id="BCustomColorSelector" class="color-pic">
			<div></div>
		</div>
		<input style="width:80px; margin-right:5px;"  name="BCustomColor" id="BCustomColor" type="text" value="" />
							
			<script>
			jQuery(document).ready(function() {
				jQuery('#BCustomColorSelector').ColorPicker({
					onShow: function (colpkr) {
						jQuery(colpkr).fadeIn(500);
						return false;
					},
					onHide: function (colpkr) {
						jQuery(colpkr).fadeOut(500);
						return false;
					},
					onChange: function (hsb, hex, rgb) {
						jQuery('#BCustomColorSelector div').css('backgroundColor', '#' + hex);
						jQuery('#BCustomColor').val('#'+hex);
					}
				});
			});
				</script>
		
	</p>
    <p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
    </p>
</form>
<div class="mce-foot"><a class="add" href="javascript:blockquote.insert(blockquote.e)">Insert</a></div>
<!--********************************************-->
<!--/*************************************/ -->
<?php } elseif( $page == 'lightbox' ){
?>
<script type="text/javascript">
	var lightbox = {
		e: '',
		init: function(e) {
			lightbox.e = e;
			tinyMCEPopup.resizeToInnerSize();
		},
		insert: function createGalleryShortcode(e) {
			var type=jQuery('#type').val();
			var thumbnail=jQuery('#lboxthumb-img').val();
			var src=jQuery('#src').val();
			var caption=jQuery('#caption').val();
			var anim=jQuery('#anim').val();    
			var alignment=jQuery('#alignment').val();   
			
			var addclass=jQuery('#class').val();
						   
			var output = '[lightbox ';
				if (anim){
					output+= 'anim="'+anim+'" ';
				}
				if(addclass){
					output+='class="'+addclass+'" ';
				}
				if(alignment){
					output+='alignment="'+alignment+'" ';
				}
				if(type) {
					output += 'type="'+type+'" ';
				}
				
				if(thumbnail) {
					output += 'thumbnail="'+thumbnail+'" ';
				}
				if(src) {
					output += 'src="'+src+'" ';
				}
				output += ']'+caption+'[/lightbox]';
			tinyMCEPopup.execCommand('mceReplaceContent', false, output);
			tinyMCEPopup.close();
			
		}
	}
	tinyMCEPopup.onInit.add(lightbox.init, lightbox);

</script>
<title>Add Lightbox</title>

</head>
<body>
<form id="GalleryShortcode">
    <script> 
		jQuery(function(){
		  jQuery("#animcontent").load("animation.html"); 
		});
    </script>
    <p id="animcontent"></p>
	<p>
		<label for="type">Type:</label>
		<select id="type" name="type">
			<option value="image">Image</option>
			<option value="video">Video</option>
			<option value="iframe">Iframe</option>
		</select>
	</p>
	<div class="wrap-list">
		<label for="upload_lboxthumb_button">Thumbnail image:</label>
		<input id="lboxthumb-img" class="img-path" type="text" size="56" style="direction:ltr; text-align:left" name="lboxthumb" value="" />
		<input id="upload_lboxthumb_button" type="button" class="small_button" value="Upload" />
		<div id="lboxthumb-preview" class="img-preview" <?php if(!weblusive_get_option('lboxthumb')) echo 'style="display:none;"' ?>>
			<img src="<?php if(weblusive_get_option('lboxthumb')) echo weblusive_get_option('lboxthumb'); else echo get_template_directory_uri().'/library/admin-panel/images/spacer.png'; ?>" alt="" />
			<a class="del-img" title="Delete"></a>
		</div>
		<div class="clear"></div>
	</div>
	
	<p id="src-holder">
		<label for="src">Lightbox URL :</label>
		<input type="text" id="src" name="src" value=""/>
	</p>
	<p>
		<label for="caption">Lightbox Caption:</label>
		<textarea   id="caption" name="caption" style="width: 300px;height: 150px;"></textarea>
	</p>
	
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:lightbox.insert(lightbox.e)">Insert</a></div>
<!--/*************************************/ 

<!--/*************************************/ -->

<?php } elseif( $page == 'regimage' ){

?>
	<script type="text/javascript">
		var regimage = {
			e: '',
			init: function(e) {
				regimage.e = e;
				tinyMCEPopup.resizeToInnerSize();
				
			},
			insert: function createGalleryShortcode(e) {
				var image=jQuery('#regimage-img').val();
				var anim=jQuery('#anim').val();     
				var addclass=jQuery('#class').val();
				var alt=jQuery('#alt').val();
				var link=jQuery('#link').val();
				
				var output = '[regimage ';
					if (anim){
						output+= 'anim="'+anim+'" ';
					}
					if(addclass){
						output+='class="'+addclass+'" ';
					}
					if(image) {
						output += 'image="'+image+'" ';
					}
					
					if (alt){
						output+= 'alt="'+alt+'" ';
					}
					if (link){
						output+= 'link="'+link+'" ';
					}
					
					
					output += ' /]';
                   
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
			}
		}
		tinyMCEPopup.onInit.add(regimage.init, regimage);

	</script>
	<title>Add Image</title>

</head>
<body>
<form id="GalleryShortcode">
    <script> 
		jQuery(function(){
		  jQuery("#animcontent").load("animation.html"); 
		});
    </script>
    <p id="animcontent"></p>
	<div class="wrap-list">
		<label for="upload_regimage_button">Image:</label>
		<input id="regimage-img" class="img-path" type="text" size="56" style="direction:ltr; text-align:left" name="regimage-img" value="" />
		<input id="upload_regimage_button" type="button" class="small_button" value="Upload" />
		<div id="regimage-preview" class="img-preview" <?php if(!weblusive_get_option('regimage')) echo 'style="display:none;"' ?>>
			<img src="<?php if(weblusive_get_option('regimage')) echo weblusive_get_option('regimage'); else echo get_template_directory_uri().'/library/admin-panel/images/spacer.png'; ?>" alt="" />
			<a class="del-img" title="Delete"></a>
		</div>
		<div class="clear"></div>
	</div>
	
	<p>
		<label for="alt">Alt text</label>
		<input id="alt" name="alt" type="text" value="" />
	</p>
	
	<p>
		<label for="link">Link URL (Optional)</label>
		<input id="link" name="link" type="text" value="" />
	</p>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
	
</form>
<div class="mce-foot"><a class="add" href="javascript:regimage.insert(regimage.e)">Insert</a></div>

<!--/*************************************/ 


<!--/*************************************/ -->
<?php } elseif( $page == 'smicon' ){
?>
	<script type="text/javascript">
		var smicon = {
			e: '',
			init: function(e) {
				smicon.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
				var smiconFamily = jQuery('#smiconFamily').val();
				var smiconIcon = jQuery('#smiconIcon').val();
				var position=jQuery('#position').val();
				var smiconType = jQuery('#smiconType').val();
				var smiconColor = jQuery('#smiconColor').val();
				var smiconLink = jQuery('#smiconLink').val();
				var customcolor = jQuery('#IconCustomColor').val();
				var smiconSize = jQuery('#smiconSize').val();
				var bgcolor = jQuery('#bgcolor').val();
				var bgcustomcolor = jQuery('#iconcustombg').val();
				
				var anim=jQuery('#anim').val();     
				var addclass=jQuery('#class').val();
               
				var output = '[smicon ';
					if (anim){
						output+= 'anim="'+anim+'" ';
					}   
					if (smiconFamily){
						output+= 'family="'+smiconFamily+'" ';
					}   
					if(addclass){
						output+='class="'+addclass+'" ';
					}
					if(smiconIcon) {
						output += 'icon="'+smiconIcon+'" ';
					}
					if(position){
						output += 'position="'+position+'" ';
					}
					if(smiconLink) {
						output += 'link="'+smiconLink+'" ';
					}
					
					if(smiconType) {
						output += 'type="'+smiconType+'" ';
					}
                    if(smiconColor && !customcolor) {
						output += 'color="'+smiconColor+'" ';
					}
					if(customcolor) {
						output += 'customcolor="'+customcolor+'" ';
					}
					if(smiconSize) {
						output += 'size="'+smiconSize+'" ';
					}
					if(bgcolor && !bgcustomcolor) {
						output += 'bgcolor="'+bgcolor+'" ';
					}
					if(bgcustomcolor) {
						output += 'custombgcolor="'+bgcustomcolor+'" ';
					}
					
				output += '/]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
			}
		}
		tinyMCEPopup.onInit.add(smicon.init, smicon);
	</script>
	<title>Add Icon</title>

</head>
<body>
<form id="GalleryShortcode">
    <script> 
		jQuery(function(){
		  jQuery("#animcontent").load("animation.html"); 
		});
    </script>
    <p id="animcontent"></p>
	<p>
		<label for="smiconFamily">Icon Family</label>
		<select id="smiconFamily" name="smiconFamily">
			<option value="fontawe">Font Awesome</option>
			<option value="Sility">Sility</option>
		</select>
	</p>
	<p>
		<label for="smiconIcon">Icon :</label>
		<input id="smiconIcon" name="smiconIcon" type="text" value=""/>
		<small><a href="<?php echo $fonturl ?>" target="blank">Icons list</a></small>
	</p>
	<p>
		<label for="position">Icon position :</label>
		<select id="position" name="position">
			<option value="">None</option>
			<option value="iconleft">Left</option>	
			<option value="iconright">Right</option>	
		</select>
	</p>
	<p>
		<label for="smiconType">Icon Wrapper</label>
		<select id="smiconType" name="smiconType">
			<option value="nowrapper">None</option>
			<option value="circle">Full Round</option>
			<option value="circle-border">Border Round</option>
			<option value="square">Full Radius</option>
			<option value="square-border">Border Radius</option>
		</select>
	</p>
	<p>
		<label for="smiconLink">Link (optional) :</label>
		<input id="smiconLink" name="smiconLink" type="text" value=""/>
	</p>
	
	<p>
		<label for="smiconColor">Color :</label>
		<select id="smiconColor" name="smiconColor">
			<option value="">None</option>
			<option value="color-default">Default</option>
			<option value="color-info">Info</option>
			<option value="color-success">Success</option>
			<option value="color-danger">Danger</option>
			<option value="color-warning">Warning</option>
			<option value="color-white">White</option>
			<option value="color-dark">Dark</option>
		</select>
	</p>
	<p>
		<label for="IconCustomColor">Icon Custom color :</label>
		<div id="IconCustomColorcolorSelector" class="color-pic">
			<div></div>
		</div>
		<input style="width:80px; margin-right:5px;"  name="IconCustomColor" id="IconCustomColor" type="text" value="" />			
		<script>
			jQuery(document).ready(function() {
				jQuery('#IconCustomColorcolorSelector').ColorPicker({
					onShow: function (colpkr) {
						jQuery(colpkr).fadeIn(500);
						return false;
					},
					onHide: function (colpkr) {
						jQuery(colpkr).fadeOut(500);
						return false;
					},
					onChange: function (hsb, hex, rgb) {
						jQuery('#IconCustomColorcolorSelector div').css('backgroundColor', '#' + hex);
						jQuery('#IconCustomColor').val('#'+hex);
					}
				});
			});
		</script>
	</p>
	<p>
		<label for="smiconSize">Size :</label>
		<select id="smiconSize" name="smiconSize">
			<option value="">Small</option>
			<option value="fa-2x">2X</option>	
			<option value="fa-3x">3X</option>	
			<option value="fa-4x">4X</option>	
			<option value="fa-5x">5X</option>	
		</select>
	</p>
	
	<p>
		<label for="bgcolor">Icon background color:</label>
		<select id="bgcolor" name="bgcolor">
			<option value="">None</option>
			<option value="bg-color-default">Default</option>
			<option value="bg-color-info">Info</option>
			<option value="bg-color-success">Success</option>
			<option value="bg-color-warning">Warning</option>
			<option value="bg-color-danger">Danger</option>
			<option value="bg-color-white">White</option>
			<option value="bg-color-dark">Dark</option>
		</select>
	</p>
	<p>
		<label for="iconcustombg">Icon Custom Background :</label>
		<div id="iconcustombgcolorSelector" class="color-pic">
			<div></div>
		</div>
		<input style="width:80px; margin-right:5px;"  name="iconcustombg" id="iconcustombg" type="text" value="" />			
		<script>
			jQuery(document).ready(function() {
				jQuery('#iconcustombgcolorSelector').ColorPicker({
					onShow: function (colpkr) {
						jQuery(colpkr).fadeIn(500);
						return false;
					},
					onHide: function (colpkr) {
						jQuery(colpkr).fadeOut(500);
						return false;
					},
					onChange: function (hsb, hex, rgb) {
						jQuery('#iconcustombgcolorSelector div').css('backgroundColor', '#' + hex);
						jQuery('#iconcustombg').val('#'+hex);
					}
				});
			});
		</script>
	</p>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:smicon.insert(smicon.e)">Insert</a></div>
<!--/*************************************/ --> 
<?php } elseif( $page == 'googlemap' ){

?>
	<script type="text/javascript">
		var googlemap = {
			e: '',
			init: function(e) {
				googlemap.e = e;
				tinyMCEPopup.resizeToInnerSize();
				
			},
			insert: function createGalleryShortcode(e) {
				var anim=jQuery('#anim').val();   
				var lat=jQuery('#lat').val();
				var lon=jQuery('#lon').val();
				var address=jQuery('#address').val();
				var zoom=jQuery('#zoom').val();
				var width=jQuery('#width').val();
				var height=jQuery('#height').val();
				var maptype=jQuery('#maptype').val();
				var marker=jQuery('#marker').val();
				var markerimage=jQuery('#markerimage-img').val();
				var infowindow=jQuery('#infowindow').val();
				var traffic=jQuery('#traffic').val();
				var addclass=jQuery('#class').val();
				
				var output = '[map';
					if (anim){
						output+= ' anim="'+anim+'"';
					}
					if (lat){
						output+= ' lat="'+lat+'"';
					}
					if (address){
						output+= ' address="'+address+'"';
					}
					if (zoom){
						output+= ' z="'+zoom+'"';
					}
					if (width){
						output+= ' w="'+width+'"';
					}
					if (height){
						output+= ' h="'+height+'"';
					}
					if (maptype){
						output+= ' maptype="'+maptype+'"';
					}
					if (marker){
						output+= ' marker="'+marker+'"';
					}
					if (markerimage){
						output+= ' markerimage="'+markerimage+'"';
					}
					if (infowindow){
						output+= ' infowindow="'+infowindow+'"';
					}
					if (traffic){
						output+= ' traffic="'+traffic+'"';
					}
					if (addclass){
						output+= ' class="'+addclass+'"';
					}
					
				output += '][/map]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
			}
		}
		tinyMCEPopup.onInit.add(googlemap.init, googlemap);

	</script>
	<title>Add Google Map</title>

</head>
<body>
<form id="GalleryShortcode">
    <script> 
		jQuery(function(){
		  jQuery("#animcontent").load("animation.html"); 
		  /*tinyMCE.init({
				skin : "modern",
				mode : "exact",
				elements : "thumbcontent",
				theme: "advanced"
			});*/
		});
    </script>
    <p id="animcontent"></p>
	<p>
		<label for="lat">Latitude</label>
		<input id="lat" name="lat" type="text" value="" />
	</p>
	<p>
		<label for="lon">Longitude</label>
		<input id="lon" name="lon" type="text" value="" />
	</p>
	<p>
		<label for="address">Address</label>
		<input id="address" name="address" type="text" value="" />
	</p>
	<p>
		<label for="zoom">Zoom:</label>
		<select id="zoom" name="zoom">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14" selected="selected">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
		</select>
	</p>
	<p>
		<label for="width">Width (in pixels)</label>
		<input id="width" name="width" type="text" value="" />
	</p>
	<p>
		<label for="height">Height (in pixels)</label>
		<input id="height" name="height" type="text" value="" />
	</p>
	<p>
		<label for="maptype">Map Type:</label>
		<select id="maptype" name="maptype">
			<option value="ROADMAP">Road</option>
			<option value="SATELLITE">Satellite</option>
			<option value="HYBRID">Hybrid</option>
			<option value="TERRAIN">Terrain</option>
		</select>
	</p>
	<p>
		<label for="marker">Marker(set address)</label>
		<input id="marker" name="marker" type="text" value="" />
	</p>
	<p>
		<label for="upload_markerimage_button">Marker image:</label>
		<input id="markerimage-img" class="img-path" type="text" size="56" style="direction:ltr; text-align:left" name="markerimage" value="" />
		<input id="upload_markerimage_button" type="button" class="small_button" value="Upload" />
		<div id="markerimage-preview" class="img-preview" <?php if(!weblusive_get_option('markerimage')) echo 'style="display:none;"' ?>>
			<img src="<?php if(weblusive_get_option('markerimage')) echo weblusive_get_option('markerimage'); else echo get_template_directory_uri().'/library/admin-panel/images/spacer.png'; ?>" alt="" />
			<a class="del-img" title="Delete"></a>
		</div>
		<div class="clear"></div>
	</p>
	<p>
		<label for="infowindow">Information window:</label>
		<textarea id="infowindow" name="infowindow" style="height:50px;"></textarea>
	</p>
	<p>
		<label for="traffic">Show Traffic:</label>
		<select id="traffic" name="traffic">
			<option value="no">No</option> 
			<option value="yes">Yes</option>
		</select>
	</p>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:googlemap.insert(googlemap.e)">Insert</a></div>
<!--********************************************-->
<?php } elseif( $page == 'divider' ){
?>
<script type="text/javascript">
	var divider = {
		e: '',
		init: function(e) {
			divider.e = e;
			tinyMCEPopup.resizeToInnerSize();
		},
		insert: function createGalleryShortcode(e) {
			var type=jQuery('#type').val();
			var linestyle=jQuery('#linestyle').val();
			var customsize=jQuery('#customsize').val();
			var size = jQuery('#size').val();			   
			var addclass=jQuery('#class').val(); 
			var output = '[divider ';
				
				if(addclass){
					output+='class="'+addclass+'" ';
				}
				if(type) {
					output += 'type="'+type+'" ';
				}
				if(linestyle) {
					output += 'linestyle="'+linestyle+'" ';
				}
				if(customsize) {
					output += 'customsize="'+customsize+'" ';
				}
				if(size) {
					output += 'size="'+size+'" ';
				}
				
			output += '/]';
			tinyMCEPopup.execCommand('mceReplaceContent', false, output);
			tinyMCEPopup.close();
			
		}
	}
	tinyMCEPopup.onInit.add(divider.init, divider);

</script>
<title>Add Divider</title>

</head>
<body>
<form id="GalleryShortcode">
    <script> 
    jQuery(function(){ 
	  
		jQuery("#type").change(function(){
			var selected = jQuery('#type').val();
			if (selected == 'blank-spacer'){
				jQuery("#sizewrap").show();
			}else{
				jQuery("#sizewrap").hide(); 
			}
		});
    });
    </script>
	<p>
		<label for="type">Type:</label>
		<select  id="type" name="type">
			<option value="blank-spacer">Blank Spacer</option>
			<option value="line">Line</option>
		</select>
	</p>
	<p id="sizewrap">
		<label for="customsize">Custom Size:</label>
		<input type="text" id="customsize" name="customsize" maxlength="3" style="width:50px" /> px
	</p>
	
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
	</p>
</form>
<div class="mce-foot"><a class="add" href="javascript:divider.insert(divider.e)">Insert</a></div>

<!--/*************************************/ -->
<?php } elseif( $page == 'pricingtable' ){ ?>

	<script type="text/javascript">
		var PricingTable = {
			e: '',
			init: function(e) {
				PricingTable.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {
				var title = jQuery('#title').val();
				var currency = jQuery('#currency').val();
				var price = jQuery('#price').val();
				var fbutton = jQuery('#fbutton').val();
				var fbutlink=jQuery('#fbutlink').val();
				var anim=jQuery('#anim').val();
                var addclass=jQuery('#class').val();
				

				var output = "[av_pricing";
				if (anim){
                   output+= ' anim="'+anim+'" ';
                }
                if(addclass){
                   output+=' class="'+addclass+'" ';
                }
				
				if(title) {
					output+= ' title="'+title+'"';
				}				
				if(currency) {
					output+= ' currency="'+currency+'"';
				}
				if(price) {
					output+= ' price="'+price+'"';
				}
				
				
				if(fbutton) {
					output+= ' fbutton="'+fbutton+'"';
				}
				if(fbutlink) {
					output+= ' fbutlink="'+fbutlink+'"';
				}
				
								
				output += "]";
				
				jQuery("textarea[id^=ptcontent]").each(function(intIndex, objValue) {
					//var obj = jQuery(this).get(intIndex);
					output += "[av_column]" + jQuery(this).val()+"[/av_column]";
				});
				
				
				output += '[/av_pricing]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(PricingTable.init, PricingTable);

		jQuery(document).ready(function() {
			jQuery("#add-tablefield").click(function() {
				jQuery('#PricingTableShortcodeContent').append('<p><label for="ptcontent[]">Column content</label><textarea id="ptcontent[]" name="ptcontent[]" ></textarea></p>');
			});
		});
		
	</script>
	<title>Add Pricing table</title>

</head>
<body>
<form id="PricingTableShortcode">
<div id="PricingTableShortcodeContent">
	<script> 
    jQuery(function(){
      jQuery("#animcontent").load("animation.html"); 
    });
    </script>
	<p id="animcontent"></p>
	 
	<p>
		<label for="title"> Title:</label>
		<input type="text" id="title">
	</p>
	<p>
		<label for="currency">Currency</label>
		<input id="currency" name="currency" type="text" value="" />
	</p>
	<p>
		<label for="price">Price</label>
		<input id="price" name="price" type="text" value="" />
	</p>
	
	<p>
		<label for="fbutton">Submit caption</label>
		<input id="fbutton" name="fbutton" type="text" value="" />
	</p>
	<p>
		<label for="fbutlink">Submit URL</label>
		<input id="fbutlink" name="fbutlink" type="text" value="" />
	</p>
	<p>
		<label for="class">Extra Class</label>
		<input id="class" name="class" type="text" value="" />
		
	</p>
	<hr style="border-bottom: 1px solid #FFF;border-top: 1px solid #ccc; border-left:0; border-right:0;" />
	
	<p>
		<label for="ptcontent[]">Column content</label>
		<textarea id="ptcontent[]" name="ptcontent[]" ></textarea>
	</p>
	
	<hr style="border-bottom: 1px solid #FFF;border-top: 1px solid #ccc; border-left:0; border-right:0;" />
</div>
	<strong><a style="cursor: pointer;" id="add-tablefield">+ Add another column</a></strong>
	<p><a class="add" href="javascript:PricingTable.insert(PricingTable.e)">insert into post</a></p>
</form>
<!--/*************************************/ -->
<?php } elseif($page=='timeline') { ?>
<script type="text/javascript">
	var timeline = {
		e: '',
		init: function(e) {
			biglist.e = e;
			tinyMCEPopup.resizeToInnerSize();
		},
		insert: function createGalleryShortcode(e) {
			var output = '[timeline ';
			var anim=jQuery('#anim').val();
			var type=jQuery('#type').val();
			var addclass=jQuery('#class').val();
			if (anim){
				output+= ' anim="'+anim+'"';
			}
			if (type){
				output+= ' type="'+type+'"';
			}
			if(addclass){
				output+=' class="'+addclass+'"';
			}
			output+=']';
			jQuery("input[id^=itemName").each(function(intIndex, objValue) {
				output +='[timeitem ';
				var title = jQuery('input[id^=itemName]').get(intIndex);
				var itemdate=jQuery('input[id^=itemdate]').get(intIndex);
				var family = jQuery('select[id^=family]').get(intIndex);
				var icon = jQuery('input[id^=icon]').get(intIndex);
				var content=jQuery('textarea[id^=itemContent]').get(intIndex);
				if(title.value){
					output+=' title="'+title.value+'"';
				}
				if(itemdate.value){
					output+=' date="'+itemdate.value+'"';
				}
				if(family.value){
					output+=' family="'+family.value+'"';
				}
				if(icon.value){
					output+=' icon="'+icon.value+'"';
				}
				output+=']';
				
				output += content.value;
				output += "[/timeitem]";
			});
			
			
			output += '[/timeline]';
			tinyMCEPopup.execCommand('mceReplaceContent', false, output);
			tinyMCEPopup.close();
			
		}
	}
	tinyMCEPopup.onInit.add(timeline.init, timeline);

	jQuery(document).ready(function() {
		counter=1;
		jQuery("#add-timeitem").click(function() {
			jQuery('#TimeItemShortcodeContent').append('<p><label for="itemName[]">Title</label><input id="itemName[]" name="itemName[]" type="text" value="" /></p><p><label for="itemdate[]">Item Date</label><input type="text" id="itemdate[]" name="itemdate[]"></p><p><label for="family[]">Icon Family</label><select id="family[]" name="family[]"><option value="fa">Font Awesome</option><option value="ion">Ion icons</option><option value="md">Material Design</option></select></p><p><label for="icon[]">Icon</label><input type="text" id="icon[]" name="icon[]"><small>only for <b>Vertical</b> type</small></p><p><label for="itemContent[]">Item Content</label><textarea  id="itemContent[]" name="itemContent[]"></textarea></p><hr class="divider" />');
			
			counter++;
		});
	});

</script>
<title>Add Timeline Shortcode</title>

</head>
<body>
<form id="GalleryShortcode">
	<script> 
		jQuery(function(){
			jQuery("#animcontent").load("animation.html"); 
		});
    </script>
  
	<div id="TimeItemShortcodeContent">
		<p id="animcontent"></p>
		<p>
		<label for="type">Type</label>
		<select id="type" name="type">
			<option value="horizontal">Horizontal</option> 
			<option value="vertical">Vertical</option>
		</select>
	</p>
		<p>
			<label for="class">Extra Class</label>
			<input id="class" name="class" type="text" value="" />
		</p>
		
		
		<hr class="divider" />
		<p>
			<label for="itemName[]">Item Title</label>
			<input id="itemName[]" name="itemName[]" type="text" value="" />
		</p>
		<p>
			<label for="itemdate[]">Item Date</label>
			<input type="text" id="itemdate[]" name="itemdate[]">
		</p>
		<p>
			<label for="family[]">Icon Family</label>
			<select id="family[]" name="family[]">
				<option value="fa">Font Awesome</option> 
				<option value="ion">Ion icons</option>
				<option value="md">Material Design</option>
			</select>
			<small>only for <b>Vertical</b> type</small>
		</p>
		<p>
			<label for="icon[]">Icon</label>
			<input type="text" id="icon[]" name="icon[]">
			<small>only for <b>Vertical</b> type</small>
		</p>
		<p>
			<label for="itemContent[]">Item Content</label>
			<textarea  id="itemContent[]" name="itemContent[]"></textarea>
		</p>
		<hr class="divider" />
	</div>
	<strong><a style="cursor: pointer;" id="add-timeitem">+ Add  Timeline Item</a></strong>
	
</form>
<div class="mce-foot"><a class="add" href="javascript:timeline.insert(timeline.e)">Insert</a></div>
<!--/*************************************/ -->

<?php } ?>

</body>
</html>