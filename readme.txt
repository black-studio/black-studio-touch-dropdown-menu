=== Black Studio Touch Dropdown Menu ===
Contributors: marcochiesi, thedarkmist
Donate link: http://www.blackstudio.it/en/wordpress-plugins/black-studio-touch-dropdown-menu/
Tags: touch, touch screen, mobile, menu, dropdown, drop-down, navigation, hover, mouseover, ipad, iphone, android
Requires at least: 3.0
Tested up to: 3.4
Stable tag: 0.1

Add support for navigation dropdown menus on mobile / touch devices.

== Description ==

Navigation dropdown menus are widely used, especially on sites with lots of pages and/or categories, since they allow to go directly to almost every page of the site, with no need to navigate through all the intermediate pages in the hierarchy. Unfortunately dropdown menus do not work well with mobile / touch devices, because the "mouseover" event is not handled, so when the user click a top level menu, the browser follows the link instead of opening the dropdown menu. This plugin is a solution for that. On touch devices, the first click (tap) on a top level menu only expands the nested dropdown menu, while the second click goes to the link. This is the same behavior natively adopted by iPad / iPhone since iOS 5, so this plugin is intended to work with previous versions of iOS and with other mobile platforms that do not have such native behavior (Android, etc).

Note: This is a BETA release, but you can safely try it, since the plugin only adds a javascript behavior on menus for touch devices and it doesn't change the contents of your site in any way, nor it affects behavior on standard browsers. If you encounter any issues please report them in the [support forum](http://wordpress.org/support/black-studio-touch-dropdown-menu). 

= Links =

* [Plugin's web page](http://www.blackstudio.it/en/wordpress-plugins/black-studio-touch-dropdown-menu/)
* [Support forum](http://wordpress.org/support/black-studio-touch-dropdown-menu)
* [Follow us on Twitter](https://twitter.com/blackstudioita)

== Installation ==

This section describes how to install and use the plugin.

1. Install automatically through the `Plugins` menu and `Add New` button (or upload the entire `black-studio-touch-dropdown-menu` folder to the `/wp-content/plugins/` directory)
2. Activate the plugin
3. This plugin has no options, it only modifies the behavior of navigation dropdown menus

== Frequently Asked Questions ==

= How to customize the plugin's behavior =

By default the plugin applies its behavior to all hyperlinks that are direct children of nested unordered list. This is corresponding to the following jQuery selector: `li:has(ul) > a`, which is very generic and should fit with almost every theme. In some case the use of this generic selector may cause unexpected behaviors on nested unordered lists that are not navigation menus and do not have any dropdown effect applied. To workaround this, the plugin provides the filter `black_studio_touch_dropdown_menu_selector`, that allows advanced users to customize the selector to use.

Example (based on Twenty Eleven theme markup):
`
add_filter('black_studio_touch_dropdown_menu_selector', 'my_custom_selector');
function my_custom_selector($selector) {
	return 'nav li:has(ul) > a';
}
`

= The plugin doesn't work as expected =

Please post a message in the [Support forum](http://wordpress.org/support/black-studio-touch-dropdown-menu), providing the following information:

* Description of the problem and steps to reproduce it
* Error messages if any
* Browser / OS / Device in use
* Wordpress version in use
* Wordpress theme in use
* List of other Wordpress plugins installed

== Changelog ==

= 0.1 =
* First beta release