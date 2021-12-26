jQuery(document).ready(function ($) {
	var custom_styles = "";
	
	function buttonStyles() {
		custom_styles = "";
		$( 'a.btn' ).each( function() {
			var margin_top = $(this).attr('data-mtop'),
			margin_bottom = $(this).attr('data-mbottom');

			if( typeof margin_top != 'undefined' ) {
				var id = $(this).attr('id'),
				$custom_style = '#' + id + '.btn { margin-top: ' + margin_top + 'px; margin-bottom: ' + margin_bottom + 'px; } ';
				custom_styles += $custom_style;
			}
		});
		$('head').append('<style data-styles="kerge-theme-button-css" type="text/css">' + custom_styles  + '</style>');
	}

	buttonStyles();

	$(this).ajaxComplete(function() {
		$('style[data-styles="kerge-theme-button-css"]').remove().detach();
		buttonStyles();
	});
});
