=== Black Studio Touch Dropdown Menu ===
Contributors: black-studio, marcochiesi, thedarkmist
Donate link: https://www.blackstudio.it/en/wordpress-plugins/black-studio-touch-dropdown-menu/
Tags: touch, touchscreen, mobile, menu, dropdown, drop-down, nav, navigation, ipad, iphone, android, click
Requires at least: 3.0
Tested up to: 6.0
Stable tag: 1.0.2

Add support for navigation dropdown menus on mobile / touch devices.

== Description ==

Navigation dropdown menus are widely used, especially on sites with lots of pages and/or categories, as they allow to navigate directly to almost every page of the site, with no need to navigate through all the intermediate pages in the hierarchy. Unfortunately dropdown menus do not work well with mobile / touch devices, because the "mouseover" event is not handled, so when the user click a top level menu, the browser follows the link instead of opening the dropdown menu. This plugin is a solution for that situation. On touch devices, the first click / tap on a top level menu (or, in general on any menu with children) only expands the nested dropdown menu, while the second one brings to the link. This is the same behavior natively adopted by iPad / iPhone starting from iOS version 5, so this plugin is intended to work with previous versions of iOS and with other mobile platforms that do not have such native behavior (Android, Windows, etc).

= Links =

* [Black Studio web site](https://www.blackstudio.it/en/)
* [Plugin's web page](https://www.blackstudio.it/en/wordpress-plugins/black-studio-touch-dropdown-menu/)
* [Support forum](https://wordpress.org/support/plugin/black-studio-touch-dropdown-menu)
* Follow us on [Twitter](https://twitter.com/blackstudioita), [Facebook](https://www.facebook.com/blackstudiocomunicazione), [LinkedIn](https://www.linkedin.com/company/black-studio) and [GitHub](https://github.com/black-studio)

= Get involved =

* Developers can contribute to the source code on our [GitHub repository](https://github.com/black-studio/black-studio-touch-dropdown-menu).
* Users can contribute by leaving a 5 stars [review](https://wordpress.org/support/view/plugin-reviews/black-studio-touch-dropdown-menu#postform) or making a [donation](https://www.blackstudio.it/en/wordpress-plugins/black-studio-touch-dropdown-menu/).

= Credits =

This plugin was inspired by the article ["Make CSS drop-down menus work on touch devices"](https://snippets.webaware.com.au/snippets/make-css-drop-down-menus-work-on-touch-devices/) written by Ross McKay, although it uses a totally different javascript code.

== Installation ==

This section describes how to install and use the plugin.

1. Install automatically through the `Plugins` menu and `Add New` button (or upload the entire `black-studio-touch-dropdown-menu` folder to the `/wp-content/plugins/` directory)
2. Activate the plugin
3. This plugin has no options, it only modifies the behavior of navigation dropdown menus, by including a javascript file on the frontend of your site

== Frequently Asked Questions ==

= How to customize the plugin's behavior =

By default the plugin applies its behavior to all hyperlinks that are direct children of nested unordered list. This is corresponding to the following jQuery selector: `li:has(ul) > a`, which is very generic and should fit with almost every theme. In some case the use of this generic selector may cause unexpected behaviors on nested unordered lists that are not navigation menus and do not have any dropdown effect applied. To workaround this, the plugin provides the filter `black_studio_touch_dropdown_menu_selector`, that allows advanced users to customize the selector to use.

Example (based on Twenty Eleven theme markup):
`
add_filter( 'black_studio_touch_dropdown_menu_selector', 'my_custom_selector' );
function my_custom_selector( $selector ) {
    return 'nav li:has(ul) > a';
}
`

= Forcing plugin's behavior on iOS =

The plugin behavior is intentionally disabled on Apple devices with iOS version 5 or later, as it should be provided natively by the devices. Anyway, if you want to force the application even on these devices, there's a filter hook for that. You may use the following snippet:
`
add_filter( 'black_studio_touch_dropdown_menu_force_ios5', 'my_force_ios5' );
function my_force_ios5( $force ) {
    return true;
}
`

= Troubleshooting =

If you think the plugin doesn't work as expected. please post a message in the [Support forum](https://wordpress.org/support/plugin/black-studio-touch-dropdown-menu), providing the following information:

* Description of the problem and steps to reproduce it
* Error messages if any (especially in the browser javascript console)
* Browser / OS / Device in use
* Wordpress version in use
* Wordpress theme in use
* List of other Wordpress plugins installed

== Changelog ==

= 1.0.2 (2022-07-01) =
* Maintenance release

= 1.0.1 (2017-11-28) =
* Maintenance release to avoid the plugin being marked as not up to date
* Updated documentation

= 1.0.0 (2015-11-20) =
* Total refactoring of plugin's source code
* Added project to [GitHub](https://github.com/black-studio/black-studio-touch-dropdown-menu)
* Improved code quality and security thanks to [Scrutinizer](https://scrutinizer-ci.com/g/black-studio/black-studio-touch-dropdown-menu/) service
* Improved development workflow thanks to [Grunt](https://gruntjs.com/)

= 0.3 (2014-08-02) =
* Added support for Internet Explorer 10+ on Windows 8 touch devices
* Fixed weird chars in js file
* Integration with WordPress SCRIPT_DEBUG constant for javascript debugging purposes
* Enhanced plugin internal version handling

= 0.2 (2012-09-05) =
* General code optimization (thanks to Ross McKay for the useful suggestions)
* Javascript minified

= 0.1 (2012-09-04) =
* First beta release