jQuery(document).ready(function ($) {
	var custom_styles = "";
	
	function columnStyles() {
		custom_styles = "";
		$( '.fw-col-inner' ).each( function() {
			var paddings = $(this).attr('data-paddings');

			if( typeof paddings != 'undefined' || paddings != '0px 0px 0px 0px' ) {
				var id = $(this).attr('id'),
				$custom_style = '#' + id + '{ padding: ' + paddings + '; } ';
				custom_styles += $custom_style;
			}
		});
		$('head').append('<style data-styles="kerge-theme-columns-css" type="text/css">' + custom_styles  + '</style>');
	}

	columnStyles();

	$(this).ajaxComplete(function() {
		$('style[data-styles="kerge-theme-columns-css"]').remove().detach();
		columnStyles();
	});
});
