=== SWG Auth ===
Contributors: tekaoh
Tags: admin, integration, star wars galaxies, swg, oracle, oci8
Requires at least: 5.0
Tested up to: 6.9
Stable tag: 0.16
Requires PHP: 7.4
License: The Unlicense
License URI: https://unlicense.org

Star Wars Galaxies Authentication for WordPress with Oracle database integration

== Description ==

If you're running a Star Wars Galaxies server, now you can use WordPress to manage your users.

== Installation ==

1. Upload the plugin files to the `wp-content/plugins/swg-auth/` directory or install the plugin through the WordPress Admin Panel.
2. Activate the plugin through the WordPress Admin Panel.
3. Get the SWG Server Config you need from SWG Auth -> Server Config
4. Done!

== Changelog ==

= 0.16 =
* PHP 8.4 full compatibility
* Complete WordPress coding standards compliance
* Enhanced security with proper input sanitization for all database settings
* Improved Oracle OCI8 error handling and logging
* Better database connection status indicators
* Password field masking for Oracle credentials
* Port validation (1-65535) with auto-correction
* PHPDoc blocks added to all functions
* Internationalization preparation (i18n ready)
* Improved code formatting and structure throughout
* Better resource cleanup in OCI operations
* Enhanced field descriptions and help text
* All database tab functionality preserved and improved

= 0.15 =
* Added comprehensive CSS customization system with tabbed settings interface
* New "Match Theme" option to use your WordPress theme's default styles
* Global Style mode: Apply unified CSS settings across all plugin components
* Component-specific styling: Customize General Pages, Resources Page, and Metrics Widget individually
* 17 CSS options per component including colors, fonts, spacing, borders, shadows, and opacity
* Custom CSS textarea fields for advanced customization
* Dynamic settings visibility based on customization mode selection

= 0.14 =
* PHP 8.0, 8.1, 8.2, and 8.3 compatibility
* WordPress 6.9 compatibility
* Updated minimum requirements to PHP 7.4 and WordPress 5.0
* Code modernization while maintaining OCI8 database support

= 0.13 =
* Add server settings to admin dashboard (beta)

= 0.12 =
* Show a list of characters associated with an account
* Support JsonWebAPI for authentication
* Optionally display the highest population achieved on your server
* Minor appearance tweaks

= 0.11 =
* Secret keys can now be used to secure communications from SWG Server
* Fixed an issue where some settings couldn't be changed

= 0.10 =
* Better quality code
* Don't explode if you don't have OCI8 installed

= 0.9 =
* Resources browser lets you see what resources are available on your server
* Some other minor fixes

= 0.8 =
* Fixed an issue where yellow and red LED indicators didn't appear

= 0.7 =
* A new widget lets you display your server status and population

= 0.6 =
* Return a proper error message if you try to submit an invalid admin level
* Fixed an issue where SWG User Settings didn't appear on your own profile
* Bug Fixes

= 0.5 =
* Manually set the admin level of any user

= 0.4 =
* Optionally, you can require that new accounts have to be specifically approved for game access
* You can now ban an account from the game from the WordPress Admin Panel

= 0.3 =
* Added an admin menu that provides you with the server config you need
* Bug fixes

= 0.2 =
* WordPress can now take requests for admin level checks

= 0.1 =
* Authentication is functional

== Upgrade Notice ==

= 0.16 =
* Important: PHP 8.4 compatibility update with enhanced security and WordPress coding standards

= 0.15 =
* Major CSS customization features added

= 0.13 =
* Web Configs

= 0.12 =
* New features

= 0.11 =
* Secret Keys and Bug Fixes

= 0.10 =
* Big fixes

= 0.9 =
* New Resources Browser

= 0.8 =
* Bug fix

= 0.7 =
* Metrics Widget!

= 0.6 =
* Bug fixes

= 0.5 =
* New features

= 0.4 =
* New features and Security enhancements

= 0.3 =
* Bug fixes

= 0.2 =
* New features

= 0.1 =
* Initial version
