(function($) { 
"use strict";
    $(document).ready(function($){
    	$( ".fw-accordion" ).each(function() {
	    	var accordion = $(this),
	    		collapsed = accordion.attr('data-collapsed');
	    	if (collapsed == "true") {
	    		collapsed = true;
	    	} else {
	    		collapsed = false;
	    	}
	        accordion.accordion({
	            heightStyle: "content",
	            collapsible: collapsed,
	            active: collapsed
	        });
	    });
    });
})(jQuery);
