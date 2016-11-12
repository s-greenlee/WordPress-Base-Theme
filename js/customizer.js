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
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
    
    /* Update link color in customizer without reloading the page. */
    wp.customize( 'basetheme_link_color', function( value ) {
        value.bind( function( to ) {
            var css = 'a, a:visited{ color: ' + to + ' }';
            style = document.createElement('style');

            if (style.styleSheet) {
                style.styleSheet.cssText = css;
            } else {
                style.appendChild(document.createTextNode(css));
            }

            document.getElementsByTagName('head')[0].appendChild(style);
        } );
    });
    
    /* Update footer background color in customizer without reloading the page. */
    wp.customize( 'basetheme_footer_background_color', function( value ) {
        value.bind( function( to ) {
            $( '.site-footer' ).css( 'background-color', to );
        } );
    });
    /* Update link hover color in customizer without reloading the page */
    wp.customize( 'basetheme_link_hover_color', function( value ) {
        value.bind( function( to ) {
            var css = 'a:hover{ color: ' + to + ' }';
            style = document.createElement('style');

            if (style.styleSheet) {
                style.styleSheet.cssText = css;
            } else {
                style.appendChild(document.createTextNode(css));
            }

            document.getElementsByTagName('head')[0].appendChild(style);
        } );
    });
    
    /* Button Color live update */
    wp.customize( 'basetheme_button_background_color', function( value ) {
        value.bind( function( to ) {
            var css = 'button, a.button, input[type="button"], input[type="reset"], input[type="submit"] { background-color: ' + to + ' }';
            style = document.createElement('style');
            if (style.styleSheet) {
                style.styleSheet.cssText = css;
            } else {
                style.appendChild(document.createTextNode(css));
            }

            document.getElementsByTagName('head')[0].appendChild(style);
        } );
    });
    
    /* Update button hover color in customizer without reloading the page */
    wp.customize( 'basetheme_button_hover_background_color', function( value ) {
        value.bind( function( to ) {
            var css = 'a.button:hover, input.submit:hover, input[type="submit"]:hover{ background-color: ' + to + ' }';
            style = document.createElement('style');

            if (style.styleSheet) {
                style.styleSheet.cssText = css;
            } else {
                style.appendChild(document.createTextNode(css));
            }

            document.getElementsByTagName('head')[0].appendChild(style);
        } );
    });
    
     /* Body Font color live update */
    wp.customize( 'basetheme_body_font_color', function( value ) {
        value.bind( function( to ) {
            var css = 'body, button, input, select, textarea { color: ' + to + ' }';
            style = document.createElement('style');

            if (style.styleSheet) {
                style.styleSheet.cssText = css;
            } else {
                style.appendChild(document.createTextNode(css));
            }

            document.getElementsByTagName('head')[0].appendChild(style);

        } );
    });
    
    /* Base font size live update. */
    wp.customize( 'basetheme_base_font_size', function( value ) {
        value.bind( function( to ) {
            var css = 'body, button, input, select, textarea { font-size: ' + to + ' }';
            style = document.createElement('style');

            if (style.styleSheet) {
                style.styleSheet.cssText = css;
            } else {
                style.appendChild(document.createTextNode(css));
            }

            document.getElementsByTagName('head')[0].appendChild(style);

        } );
    });
    
} )( jQuery );
