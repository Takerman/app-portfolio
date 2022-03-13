// image Uploader Functions ##############################################
	function weblusive_styling_uploader(field) {
	
		var button = "#upload_"+field+"_button";
		
		var win = window.location.href;
		jQuery(button).live('click', function() {
			
			window.restore_send_to_editor = window.send_to_editor;
			tb_show('', '../../../../../../wp-admin/media-upload.php?referer=weblusive-settings&amp;type=image&amp;TB_iframe=true&amp;post_id=0');
			styling_send_img(field);
			return false;
		});
		jQuery('#'+field).change(function(){
			jQuery('#'+field+'-preview img').attr("src",jQuery('#'+field).val());
		});
	}
	function styling_send_img(field) {
		window.send_to_editor = function(html) {
			imgurl = jQuery('img',html).attr('src');
			
			if(typeof imgurl == 'undefined') // Bug fix By Fouad Badawy
				imgurl = jQuery(html).attr('src');
				
			jQuery('#'+field+'-img').val(imgurl);
			jQuery('#'+field+'-preview').show();
			jQuery('#'+field+'-preview img').attr("src",imgurl);
			tb_remove();
			window.send_to_editor = window.restore_send_to_editor;
		}
	};
	
jQuery(document).ready(function() {

    jQuery('.tooltip').tipsy({fade: true, gravity: 's'});		
	
	weblusive_styling_uploader("markerimage");
	weblusive_styling_uploader("bgimage");
	weblusive_styling_uploader("authorphoto0");
	weblusive_styling_uploader("galleryimage0");
	weblusive_styling_uploader("slideimage0");
	
	weblusive_styling_uploader("memberphoto");
	weblusive_styling_uploader("fullimage");
	weblusive_styling_uploader("lboxthumb");
	weblusive_styling_uploader("thumbnailimg");
	weblusive_styling_uploader("regimage");

	
	// Del Preview Image ##############################################
	jQuery(document).on("click", ".del-img" , function(){
		jQuery(this).parent().fadeOut(function() {
			jQuery(this).hide();
			jQuery(this).parent().find('input[class="img-path"]').attr('value', '' );
		});
	});	
	
});
		
function toggleVisibility(id) {
	var e = document.getElementById(id);
    if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
}