<?php 

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the dashboard.
 *
 * @since      1.0.0
 *
 * @package    Black_Studio_Touch_Dropdown_Menu
 * @subpackage Black_Studio_Touch_Dropdown_Menu/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, dashboard-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Black_Studio_Touch_Dropdown_Menu
 * @subpackage Black_Studio_Touch_Dropdown_Menu/includes
 */

class Black_Studio_Touch_Dropdown_Menu {

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the Dashboard and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_name = 'black-studio-touch-dropdown-menu';
		$this->version = '1.0.2';

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Register the script for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		$default_selector = 'li:has(ul) > a';
		$default_selector_leaf = 'li li li:not(:has(ul)) > a';
		$default_force_ios5 = false;
		wp_enqueue_script(
			'black-studio-touch-dropdown-menu',
			plugins_url( 'js/black-studio-touch-dropdown-menu' . $suffix . '.js', dirname( __FILE__ ) ),
			array( 'jquery' ),
			$this->version
		);
		$params = array(
			'selector' => apply_filters( 'black_studio_touch_dropdown_menu_selector', $default_selector ),
			'selector_leaf' => apply_filters( 'black_studio_touch_dropdown_menu_selector_leaf', $default_selector_leaf ),
			'force_ios5' => apply_filters( 'black_studio_touch_dropdown_menu_force_ios5', $default_force_ios5 )
		);
		wp_localize_script( 'black-studio-touch-dropdown-menu', 'black_studio_touch_dropdown_menu_params', $params );
	}

}