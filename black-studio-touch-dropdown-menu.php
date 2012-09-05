<?php
/*
Plugin Name: Black Studio Touch Dropdown Menu
Plugin URI: http://wordpress.org/extend/plugins/black-studio-touch-dropdown-menu/
Description: Add support for navigation dropdown menus on mobile / touch devices
Version: 0.2
Author: Black Studio
Author URI: http://www.blackstudio.it
License: GPL2
*/
global $black_studio_touch_dropdown_menu_version;
$black_studio_touch_dropdown_menu_version = "0.2"; // This is used internally - should be the same reported on the plugin header

add_action( 'wp_enqueue_scripts', 'black_studio_touch_dropdown_menu_scripts');
function black_studio_touch_dropdown_menu_scripts() {
	global $black_studio_touch_dropdown_menu_version;
	$default_selector = 'li:has(ul) > a';
	$default_selector_leaf = 'li li li:not(:has(ul)) > a';
    wp_enqueue_script('black-studio-touch-dropdown-menu', plugins_url('black-studio-touch-dropdown-menu.js', __FILE__), array('jquery'), $black_studio_touch_dropdown_menu_version);
	$params = array(
		'selector' => apply_filters('black_studio_touch_dropdown_menu_selector', $default_selector),
		'selector_leaf' => apply_filters('black_studio_touch_dropdown_menu_selector_leaf', $default_selector_leaf)
	);
	wp_localize_script('black-studio-touch-dropdown-menu', 'black_studio_touch_dropdown_menu_params', $params);
}
