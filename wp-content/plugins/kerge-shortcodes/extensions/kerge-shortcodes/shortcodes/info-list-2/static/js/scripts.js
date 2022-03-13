(function($) { 
"use strict";
    $(document).ready(function ($) {
        var custom_styles = "",
            color = "";
        
        function ilwiStyles() {
            $( '.info-block-w-icon' ).each( function() {
                var color_value = $(this).attr('data-color');
                var id = $(this).attr('id'),
                $custom_style = '#' + id + '.info-block-w-icon i { color: ' + color_value + '; } ';
                custom_styles += $custom_style;
            });
            $('head').append('<style data-styles="kerge-theme-info-list-2-dynamic-css" type="text/css">' + custom_styles + color + '</style>');
        }

        ilwiStyles();

        $(this).ajaxComplete(function() {
            $('style[data-styles="kerge-theme-info-list-2-dynamic-css"]').remove().detach();
            ilwiStyles();
        });
    });
})(jQuery);