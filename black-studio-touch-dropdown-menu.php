<?php

/**
 * @link              https://wordpress.org/plugins/black-studio-touch-dropdown-menu/
 * @since             0.1
 * @package           Black_Studio_Touch_Dropdown_Menu
 *
 * @wordpress-plugin
 * Plugin Name:       Black Studio Touch Dropdown Menu
 * Plugin URI:        https://wordpress.org/plugins/black-studio-touch-dropdown-menu/
 * Description:       Add support for navigation dropdown menus on mobile / touch devices.
 * Version:           1.0.2
 * Author:            Black Studio
 * Author URI:        http://www.blackstudio.it
 * License:           GPLv3
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       black-studio-touch-dropdown-menu
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Includes
require_once plugin_dir_path( __FILE__ ) . 'includes/class-black-studio-touch-dropdown-menu.php';

// Plugin instance
$black_studio_touch_dropdown_menu = new Black_Studio_Touch_Dropdown_Menu;

// Include deprecated code
require_once plugin_dir_path( __FILE__ ) . 'includes/deprecated.php';
