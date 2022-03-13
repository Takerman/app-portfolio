(function($) { 
"use strict";
    $(document).ready(function ($) {
        // Clients Slider
        var mobile_mode_items = "",
            tablet_mode_items = "",
            items = "",
            dir = $("html").attr("dir"),
            rtlVal = false;

            if (dir == 'rtl') {
                rtlVal = true;
            }
            else{
                rtlVal = false;
            }
        
        $( '.clients' ).each( function() {
            var mobile_mode_items = $(this).attr('data-mobile-items'),
                tablet_mode_items = $(this).attr('data-tablet-items'),
                items = $(this).attr('data-items'),
                id = $(this).attr('id'),
                loop = false,
                windowWidth = $(window).width(),
                autoplayTablet = '',
                autoplayValue = '',
                autoplayTime = '',
                autoplaySpeed = 500,
                slideBy = $(this).attr('data-by-page');
            if ($(this).hasClass('autoplay-on')) {
                autoplayValue = true;
                autoplayTime = $(this).attr('data-autotime');
                autoplaySpeed = $(this).attr('data-speed');
                if ($(this).hasClass('autoplay-mobile')) {
                    if (windowWidth > 768) {
                        autoplayValue = false;
                    } else {
                        autoplayValue = true;
                    }
                }
            } else {
                autoplayValue = false;
            }

            if ($(this).hasClass('clients-loop-on')) {
                loop = true;
            } else {
                loop = false;
            }

            if (slideBy == 'page') {
                slideBy = 'page';
            }

            $("#" + id + ".clients.owl-carousel").imagesLoaded().owlCarousel({
                nav: true, // Show next/prev buttons.
                items: 2, // The number of items you want to see on the screen.
                loop: loop,
                dots: false,
                slideBy: slideBy,
                autoplay: autoplayValue,
                autoplayTimeout: autoplayTime,
                smartSpeed: autoplaySpeed,
                navText: false,
                margin: 10,
                rtl: rtlVal,
                autoHeight: false,
                responsive : {
                    // breakpoint from 0 up
                    0 : {
                        items: mobile_mode_items,
                    },
                    // breakpoint from 768 up
                    768 : {
                        items: tablet_mode_items,
                    },
                    1200 : {
                        items: items,
                    }
                }
            });
        });
    });
})(jQuery);