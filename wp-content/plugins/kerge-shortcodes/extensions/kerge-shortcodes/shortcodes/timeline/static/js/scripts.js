(function($) { 
"use strict";
    $(document).ready(function ($) {
        var custom_styles = "",
            color = "";
        
        function timelineStyles() {
            $( '.timeline-item' ).each( function() {
                var color_value = $(this).attr('data-color');
                var id = $(this).attr('id'),
                $custom_style = '#' + id + '.timeline-item .item-period { background-color: ' + color_value + '; } ' + '#' + id + '.timeline-item .item-period:before { border-right: 5px solid ' + color_value + '; } ';
                custom_styles += $custom_style;
            });
            $('head').append('<style data-styles="kerge-theme-timeline-dynamic-css" type="text/css">' + custom_styles + color + '</style>');
        }

        timelineStyles();

        $(this).ajaxComplete(function() {
            $('style[data-styles="kerge-theme-timeline-dynamic-css"]').remove().detach();
            timelineStyles();
        });
    });
})(jQuery);