/* Black Studio Touch Dropdown Menu - JS */

/* global black_studio_touch_dropdown_menu_params */

( function( $ ) {

	/* Detect device in use  */
	var params = black_studio_touch_dropdown_menu_params,
		is_touch = ( ( 'ontouchstart' in window ) || ( window.navigator.msPointerEnabled ) ),
		is_ios5 = /iPad|iPod|iPhone/.test( navigator.platform ) && 'matchMedia' in window,
		force_ios5 = params.force_ios5,
		superfish_fix = false;

	/* Apply dropdown effect on first click */
	if ( is_touch && ( ! is_ios5 || force_ios5 ) ) {

		$( document ).ready(function() {

			$( params.selector ).each(function() {

				var $this = $(this);

				// Fix for IE
				$this.attr( 'aria-haspopup', true );

				// Initial setting to handle first click
				$this.data( 'dataNoclick', false );
				
				// Touch Handler
				$this.bind( 'touchstart', function() {
					var i, noclick;

					// Hack for superfish menus with low delay
					if ( ! superfish_fix && $.fn.superfish !== undefined ) {
						for ( i = 0; i < $.fn.superfish.o.length; i++ ) {
							$.fn.superfish.o[i].delay = 800;
						}
						superfish_fix = true;
					}

					// Reset other menus
					noclick = ! $this.data( 'dataNoclick' );
					$( params.selector ).each(function() {
						$( this ).data( 'dataNoclick', false);
					});
					$this.data( 'dataNoclick', noclick );
					this.focus();

				}); // end touchstart

				// Click Handler
				$this.bind( 'click', function(event) {
					if ( $this.data( 'dataNoclick' ) ) {
						event.preventDefault();
					}
					this.focus();
				}); // end click

			}); // end each

			// Fix for 3rd+ level menus not working in some circumstances
			$( params.selector_leaf ).each(function() {

				$( this ).bind( 'touchstart', function(){
					window.location = this.href;
				}); // end touchstart

			}); // end each

		}); // end ready

	} //end if

})( jQuery ); // end self-invoked wrapper function