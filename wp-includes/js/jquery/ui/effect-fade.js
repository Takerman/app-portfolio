/*!
<<<<<<< HEAD
 * jQuery UI Effects Fade 1.13.1
=======
 * jQuery UI Effects Fade 1.12.1
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
 * http://jqueryui.com
 *
 * Copyright jQuery Foundation and other contributors
 * Released under the MIT license.
 * http://jquery.org/license
 */

//>>label: Fade Effect
//>>group: Effects
//>>description: Fades the element.
//>>docs: http://api.jqueryui.com/fade-effect/
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

return $.effects.define( "fade", "toggle", function( options, done ) {
	var show = options.mode === "show";

	$( this )
		.css( "opacity", show ? 0 : 1 )
		.animate( {
			opacity: show ? 1 : 0
		}, {
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
