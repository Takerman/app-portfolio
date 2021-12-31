/*
* Template Name: Kerge - Responsive vCard WordPress Theme
* Author: lmpixels
* Author URL: http://themeforest.net/user/lmpixels
* Version: 3.1.1
*/

(function($) {
"use strict";

    function scrollTop() {
        if ($(window).scrollTop() > 150) {
            $('.lmpixels-scroll-to-top').removeClass('hidden-stb');
        } else {
            $('.lmpixels-scroll-to-top').addClass('hidden-stb');
        }
    }

    $(document).on('ready', function() {
        // Auto Menu creating
        var menu_html = "";
                            
        $('.pt-wrapper:not(".one-page-new")').find('section.pt-page').each(function()
        {
            var slug = $(this).attr('id');
            var page_title = $(this).attr('data-title');
            if(slug.length) {
                var menu_item = '<li><a href="#' + slug + '" class="pt-trigger">' + page_title + '</a></li>';
            } else {
                var menu_item = '';
            }
            menu_html += menu_item;
            $('.site-auto-menu').html(menu_html);
        });

        // Page Scroll to id fn call //
        var offset = 0;
        if ($(window).width() < 992) {
            offset = 25;
        }
        $("li:not('.menu-item-has-children') > .pt-trigger").mPageScroll2id({
            layout:"vertical",
            highlightClass: "active",
            keepHighlightUntilNext: false,
            scrollSpeed: 800,
            scrollEasing: "easeInOutExpo",
            scrollingEasing: "easeInOutCirc",
            clickedClass: "",
            appendHash: true,
            offset: offset,
            forceSingleHighlight: true,
        });

        $('.lmpixels-scroll-to-top').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 400);
        });

        scrollTop();
    });

    $(window).scroll(function () {
        scrollTop();
    });
})(jQuery);
