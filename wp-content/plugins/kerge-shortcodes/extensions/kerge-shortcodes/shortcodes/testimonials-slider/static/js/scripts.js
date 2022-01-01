(function($) { 
"use strict";
    $(document).ready(function ($) {
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
        
        $( '.testimonials' ).each( function() {
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

            if ($(this).hasClass('testimonials-loop-on')) {
                loop = true;
            } else {
                loop = false;
            }

            if (slideBy == 'page') {
                slideBy = 'page';
            }

            $(this).imagesLoaded(function () {
                $("#" + id + ".testimonials.owl-carousel").owlCarousel({
                    nav: true,
                    dots: false,
                    items: 1,
                    loop: loop,
                    slideBy: slideBy,
                    autoplay: autoplayValue,
                    autoplayTimeout: autoplayTime,
                    smartSpeed: autoplaySpeed,
                    navText: false,
                    autoHeight: true,
                    margin: 10,
                    rtl: rtlVal,
                    responsive : {
                        0 : {
                            items: mobile_mode_items,
                        },
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
    });
})(jQuery);