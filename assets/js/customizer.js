/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	//WPMU Tut
	wp.customize( 'background_color', function( value ) {
		value.bind( function( newval ) {
			$( '.header-alert' ).css( 'background-color', newval );
		});
	});

	wp.customize( 'alert_text', function( value ) {
		value.bind( function( newval ){
			$( 'div.header-alert p' ).html( newval );
		});
	});

	wp.customize( 'column_4_label', function( value ) {
		value.bind( function( newval ){
			$( '#navLabel4' ).html( newval );
		});
	});

	wp.customize( 'column_3_label', function( value ) {
		value.bind( function( newval ){
			$( '#navLabel3' ).html( newval );
		});
	});

	wp.customize( 'column_2_label', function( value ) {
		value.bind( function( newval ){
			$( '#navLabel2' ).html( newval );
		});
	});

	wp.customize( 'column_1_label', function( value ) {
		value.bind( function( newval ){
			$( '#navLabel1' ).html( newval );
		});
	});
} )( jQuery );


