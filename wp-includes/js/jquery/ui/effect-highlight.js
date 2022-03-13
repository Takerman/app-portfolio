/*!
<<<<<<< HEAD
 * jQuery UI Effects Highlight 1.13.1
=======
 * jQuery UI Effects Highlight 1.12.1
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
 * http://jqueryui.com
 *
 * Copyright jQuery Foundation and other contributors
 * Released under the MIT license.
 * http://jquery.org/license
 */

//>>label: Highlight Effect
//>>group: Effects
//>>description: Highlights the background of an element in a defined color for a custom duration.
//>>docs: http://api.jqueryui.com/highlight-effect/
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

return $.effects.define( "highlight", "show", function( options, done ) {
	var element = $( this ),
		animation = {
			backgroundColor: element.css( "backgroundColor" )
		};

	if ( options.mode === "hide" ) {
		animation.opacity = 0;
	}

	$.effects.saveStyle( element );

	element
		.css( {
			backgroundImage: "none",
			backgroundColor: options.color || "#ffff99"
		} )
		.animate( animation, {
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
