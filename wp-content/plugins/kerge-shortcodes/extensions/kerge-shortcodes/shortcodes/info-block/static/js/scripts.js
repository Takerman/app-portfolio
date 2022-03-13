(function($) { 
"use strict";
	$(document).ready(function ($) {
		var custom_styles = "",
			color = "";
		
		function ibStyles() {
			$( '.lm-info-block' ).each( function() {
				var color_value = $(this).attr('data-color');
				var id = $(this).attr('id'),
				$custom_style = '#' + id + '.lm-info-block i { color: ' + color_value + '; } ';
				custom_styles += $custom_style;
			});
			$('head').append('<style data-styles="kerge-theme-info-block-dynamic-css" type="text/css">' + custom_styles + color + '</style>');
		}

		ibStyles();

		$(this).ajaxComplete(function() {
			$('style[data-styles="kerge-theme-info-block-dynamic-css"]').remove().detach();
			ibStyles();
		});
	});
})(jQuery);
