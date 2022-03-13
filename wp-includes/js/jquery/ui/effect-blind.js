/*!
<<<<<<< HEAD
 * jQuery UI Effects Blind 1.13.1
=======
 * jQuery UI Effects Blind 1.12.1
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
 * http://jqueryui.com
 *
 * Copyright jQuery Foundation and other contributors
 * Released under the MIT license.
 * http://jquery.org/license
 */

//>>label: Blind Effect
//>>group: Effects
//>>description: Blinds the element.
//>>docs: http://api.jqueryui.com/blind-effect/
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

return $.effects.define( "blind", "hide", function( options, done ) {
	var map = {
			up: [ "bottom", "top" ],
			vertical: [ "bottom", "top" ],
			down: [ "top", "bottom" ],
			left: [ "right", "left" ],
			horizontal: [ "right", "left" ],
			right: [ "left", "right" ]
		},
		element = $( this ),
		direction = options.direction || "up",
		start = element.cssClip(),
		animate = { clip: $.extend( {}, start ) },
		placeholder = $.effects.createPlaceholder( element );

	animate.clip[ map[ direction ][ 0 ] ] = animate.clip[ map[ direction ][ 1 ] ];

	if ( options.mode === "show" ) {
		element.cssClip( animate.clip );
		if ( placeholder ) {
			placeholder.css( $.effects.clipToBox( animate ) );
		}

		animate.clip = start;
	}

	if ( placeholder ) {
		placeholder.animate( $.effects.clipToBox( animate ), options.duration, options.easing );
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
