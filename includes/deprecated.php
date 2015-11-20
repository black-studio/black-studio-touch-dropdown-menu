<?php

/**
 * Deprecated global variables and functions
 *
 * @package Black_Studio_Touch_Dropdown_Menu
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Global var with plugin version for backward compatibility
 *
 * @since 0.1
 * @deprecated 1.0.0
 */
global $black_studio_touch_dropdown_menu_version;
$black_studio_touch_dropdown_menu_version = $black_studio_touch_dropdown_menu->get_version();

/**
 * @since 0.3
 * @deprecated 1.0.0
 */
function black_studio_touch_dropdown_menu_get_version() {
	global $black_studio_touch_dropdown_menu;
	_deprecated_function( __FUNCTION__, '1.0.0', '$black_studio_touch_dropdown_menu ->get_version()' );
	return $black_studio_touch_dropdown_menu->get_version();
}
