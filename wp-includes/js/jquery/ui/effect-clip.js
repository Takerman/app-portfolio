/*!
<<<<<<< HEAD
 * jQuery UI Effects Clip 1.13.1
=======
 * jQuery UI Effects Clip 1.12.1
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
 * http://jqueryui.com
 *
 * Copyright jQuery Foundation and other contributors
 * Released under the MIT license.
 * http://jquery.org/license
 */

//>>label: Clip Effect
//>>group: Effects
//>>description: Clips the element on and off like an old TV.
//>>docs: http://api.jqueryui.com/clip-effect/
//>>demos: http://jqueryui.com/effect/

( function( factory ) {
<<<<<<< HEAD
	"use strict";

=======
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
	if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define( [
			"jquery",
			"./effect"
		], factory );
	} else {

		// Browser globals
		factory( jQuery );
	}
<<<<<<< HEAD
} )( function( $ ) {
"use strict";
=======
}( function( $ ) {
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73

return $.effects.define( "clip", "hide", function( options, done ) {
	var start,
		animate = {},
		element = $( this ),
		direction = options.direction || "vertical",
		both = direction === "both",
		horizontal = both || direction === "horizontal",
		vertical = both || direction === "vertical";

	start = element.cssClip();
	animate.clip = {
		top: vertical ? ( start.bottom - start.top ) / 2 : start.top,
		right: horizontal ? ( start.right - start.left ) / 2 : start.right,
		bottom: vertical ? ( start.bottom - start.top ) / 2 : start.bottom,
		left: horizontal ? ( start.right - start.left ) / 2 : start.left
	};

	$.effects.createPlaceholder( element );

	if ( options.mode === "show" ) {
		element.cssClip( animate.clip );
		animate.clip = start;
	}

	element.animate( animate, {
		queue: false,
		duration: options.duration,
		easing: options.easing,
		complete: done
	} );

} );

<<<<<<< HEAD
} );
=======
} ) );
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
