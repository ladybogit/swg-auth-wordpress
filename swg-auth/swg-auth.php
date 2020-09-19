<?php
/**
  * Plugin Name: SWG Auth
  * Plugin URI: https://tekaohswg.github.io/swg-auth-wordpress.html
  * Description: Star Wars Galaxies Authentication for WordPress
  * Version: 0.13
  * Author: Tekaoh
  * Author URI: https://tekaohswg.github.io
*/

// No Direct Access
if ( ! defined( 'ABSPATH' ) ) {
  die;
}

// Include some includes
include( plugin_dir_path( __FILE__ ) . 'includes/swg-auth-oci.php' );

// Run when WordPress is loaded
add_action( 'wp_loaded', 'swg_auth_run' );
function swg_auth_run() {
  include( plugin_dir_path( __FILE__ ) . 'includes/swg-auth-check.php' );
  include( plugin_dir_path( __FILE__ ) . 'includes/swg-auth-admin-level-check.php' );
  include( plugin_dir_path( __FILE__ ) . 'includes/swg-auth-metrics-listener.php' );
  include( plugin_dir_path( __FILE__ ) . 'includes/swg-auth-webcfg.php' );
}

// Run Admin Stuff
include( plugin_dir_path( __FILE__ ) . 'admin/swg-auth-admin-menus.php' );
include( plugin_dir_path( __FILE__ ) . 'admin/swg-auth-settings.php' );
include( plugin_dir_path( __FILE__ ) . 'admin/swg-auth-server-settings.php' );
include( plugin_dir_path( __FILE__ ) . 'admin/swg-auth-user-settings.php' );

// Run Public Stuff
include( plugin_dir_path( __FILE__ ) . 'public/swg-auth-virtual-page.php' );
include( plugin_dir_path( __FILE__ ) . 'public/swg-auth-resources.php' );
include( plugin_dir_path( __FILE__ ) . 'public/swg-auth-metrics-widget.php' );
