(function( $ ) {
    "use strict";
 
    wp.customize( 'boki_link_color', function( value ) {
        value.bind( function( to ) {
            $( 'a' ).css( 'color', to );
        } );
    });
 
})( jQuery );

(function( $ ) {
	"use strict";

	// Home Top Background Image - Image Control
	wp.customize( 'boki_background_image', function( value ) {
		value.bind( function( to ) {
			$( '.custom-background' ).css( 'background-image', 'url( ' + to + ')' );
		} );
	});


})( jQuery );

(function( $ ) {
    "use strict";

	wp.customize( 'boki_footer_naslov', function( value ) {
		value.bind( function( to ) {
			$( '#footer-naslov' ).text( to );
		});
	});
})( jQuery );

(function( $ ) {
    "use strict";

	wp.customize( 'boki_footer_text', function( value ) {
		value.bind( function( to ) {
			$( '#footer-text' ).text( to );
		});
	});
})( jQuery );
