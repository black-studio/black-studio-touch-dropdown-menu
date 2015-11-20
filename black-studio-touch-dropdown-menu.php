<?php

/**
 * @link              https://wordpress.org/plugins/black-studio-homepage-builder/
 * @since             0.1
 * @package           Black_Studio_Touch_Dropdown_Menu
 *
 * @wordpress-plugin
 * Plugin Name:       Black Studio Touch Dropdown Menu
 * Plugin URI:        https://wordpress.org/plugins/black-studio-touch-dropdown-menu/
 * Description:       Add support for navigation dropdown menus on mobile / touch devices.
 * Version:           1.0.0
 * Author:            Black Studio
 * Author URI:        http://www.blackstudio.it
 * License:           GPLv3
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       black-studio-touch-dropdown-menu
 * Domain Path:       /languages
 */

global $black_studio_touch_dropdown_menu_version;

add_action( 'wp_enqueue_scripts', 'black_studio_touch_dropdown_menu_scripts' );
function black_studio_touch_dropdown_menu_scripts() {
	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	$version = black_studio_touch_dropdown_menu_get_version();
	$default_selector = 'li:has(ul) > a';
	$default_selector_leaf = 'li li li:not(:has(ul)) > a';
    wp_enqueue_script(
		'black-studio-touch-dropdown-menu',
		plugins_url( 'js/black-studio-touch-dropdown-menu' . $suffix . '.js', __FILE__ ),
		array( 'jquery' ),
		$version
	);
	$params = array(
		'selector' => apply_filters( 'black_studio_touch_dropdown_menu_selector', $default_selector ),
		'selector_leaf' => apply_filters( 'black_studio_touch_dropdown_menu_selector_leaf', $default_selector_leaf )
	);
	wp_localize_script( 'black-studio-touch-dropdown-menu', 'black_studio_touch_dropdown_menu_params', $params );
}

/* Get plugin version */
function black_studio_touch_dropdown_menu_get_version() {
	if ( ! function_exists( 'get_plugin_data' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	}
	$plugin_data = get_plugin_data( __FILE__ );
	$plugin_version = $plugin_data['Version'];
	return $plugin_version;
}
