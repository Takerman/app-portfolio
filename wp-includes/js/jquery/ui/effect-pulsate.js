/*!
<<<<<<< HEAD
 * jQuery UI Effects Pulsate 1.13.1
=======
 * jQuery UI Effects Pulsate 1.12.1
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
 * http://jqueryui.com
 *
 * Copyright jQuery Foundation and other contributors
 * Released under the MIT license.
 * http://jquery.org/license
 */

//>>label: Pulsate Effect
//>>group: Effects
//>>description: Pulsates an element n times by changing the opacity to zero and back.
//>>docs: http://api.jqueryui.com/pulsate-effect/
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

return $.effects.define( "pulsate", "show", function( options, done ) {
	var element = $( this ),
		mode = options.mode,
		show = mode === "show",
		hide = mode === "hide",
		showhide = show || hide,

		// Showing or hiding leaves off the "last" animation
		anims = ( ( options.times || 5 ) * 2 ) + ( showhide ? 1 : 0 ),
		duration = options.duration / anims,
		animateTo = 0,
		i = 1,
		queuelen = element.queue().length;

	if ( show || !element.is( ":visible" ) ) {
		element.css( "opacity", 0 ).show();
		animateTo = 1;
	}

	// Anims - 1 opacity "toggles"
	for ( ; i < anims; i++ ) {
		element.animate( { opacity: animateTo }, duration, options.easing );
		animateTo = 1 - animateTo;
	}

	element.animate( { opacity: animateTo }, duration, options.easing );

	element.queue( done );

	$.effects.unshift( element, queuelen, anims + 1 );
} );

<<<<<<< HEAD
} );
=======
} ) );
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
