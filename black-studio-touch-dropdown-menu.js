/*
Author: Marco Chiesi - Black Studio - www.blackstudio.it

Credits: This script is partially inspired by the one from rmckay found here
http://snippets.webaware.com.au/snippets/make-css-drop-down-menus-work-on-touch-devices/
*/

/* Detect device in use  */
var black_studio_isTouch = ("ontouchstart" in window);
var black_studio_isIOS5 = /iPad|iPod|iPhone/.test(navigator.platform) && "matchMedia" in window;
var black_studio_touch_dropdown_menu_apply = black_studio_isTouch && ! black_studio_isIOS5;
var black_studio_superfish_fix = false;

/* Apply dropdown effect on first click */
if (black_studio_touch_dropdown_menu_apply) {
	jQuery(document).ready(function(){
		jQuery(black_studio_touch_dropdown_menu_params.selector).each(function() {
			// Initial setting to handle first click
			jQuery(this).data('dataNoclick', false);

			// Touch Handler
			jQuery(this).bind('touchstart', function() {
				
				// Hack for superfish menus with low delay
				if (!black_studio_superfish_fix && jQuery.fn.superfish != undefined) {
					for (var i=0; i<jQuery.fn.superfish.o.length; i++) {
						jQuery.fn.superfish.o[i].delay = 800;
					}
					black_studio_superfish_fix = true;
				}
				
		        var noclick = !(jQuery(this).data('dataNoclick'));
				jQuery(black_studio_touch_dropdown_menu_params.selector).each(function(){
					jQuery(this).data('dataNoclick', false);
				}); 
		        jQuery(this).data('dataNoclick', noclick);
		        jQuery(this).focus();
			}); // end touchstart

			// Click Handler
			jQuery(this).bind('click', function(event){
		        if (jQuery(this).data('dataNoclick')) {
		            event.preventDefault();
		        }
		        jQuery(this).focus();
			}); // end click
		}); // end each

		// Fix for 3rd+ level menus not working in some circumstances
		jQuery(black_studio_touch_dropdown_menu_params.selector_leaf).each(function(){ 
			jQuery(this).bind('touchstart', function(){
				window.location = jQuery(this).attr('href');
			}); // end touchstart
		}); // end each
		
	}); // end ready
} //end if