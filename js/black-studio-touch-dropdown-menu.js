( function( $ ) {
	/* Detect device in use  */
	var black_studio_is_touch = ( ( "ontouchstart" in window ) || ( window.navigator.msPointerEnabled ) );
	var black_studio_is_ios5 = /iPad|iPod|iPhone/.test( navigator.platform ) && "matchMedia" in window;
	var black_studio_touch_dropdown_menu_apply = black_studio_is_touch && ! black_studio_is_ios5;
	var black_studio_superfish_fix = false;
	
	/* Apply dropdown effect on first click */
	if ( black_studio_touch_dropdown_menu_apply ) {
		$( document ).ready(function() {
			$( black_studio_touch_dropdown_menu_params.selector ).each(function() {
				var $this = $(this);
				
				// Fix for IE
				$this.attr( 'aria-haspopup', true );
				
				// Initial setting to handle first click
				$this.data( 'dataNoclick', false );
				
				// Touch Handler
				$this.bind( 'touchstart', function() {
					
					// Hack for superfish menus with low delay
					if ( ! black_studio_superfish_fix && $.fn.superfish != undefined ) {
						for ( var i = 0; i < $.fn.superfish.o.length; i++ ) {
							$.fn.superfish.o[i].delay = 800;
						}
						black_studio_superfish_fix = true;
					}
					
					var noclick = ! $this.data( 'dataNoclick' );
					$( black_studio_touch_dropdown_menu_params.selector ).each(function() {
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
			$( black_studio_touch_dropdown_menu_params.selector_leaf ).each(function() { 
				$( this ).bind( 'touchstart', function(){
					window.location = this.href;
				}); // end touchstart
			}); // end each
			
		}); // end ready
	} //end if
})( jQuery ); // end self-invoked wrapper function