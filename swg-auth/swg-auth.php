<?php
/**
  * Plugin Name: SWG Auth
  * Plugin URI: https://tekaohswg.github.io/swg-auth-wordpress.html
  * Description: Star Wars Galaxies Authentication for Wordpress
  * Version: 0.8
  * Author: Tekaoh
  * Author URI: https://tekaohswg.github.io
*/

// No Direct Access
if ( ! defined( 'ABSPATH' ) ) {
  die;
}

// Include some includes
include( plugin_dir_path( __FILE__ ) . 'includes/swg-auth-oci.php' );

// Run when Wordpress is loaded
add_action( 'wp_loaded', 'swg_auth_run' );
function swg_auth_run() {
  include( plugin_dir_path( __FILE__ ) . 'includes/swg-auth-check.php' );
  include( plugin_dir_path( __FILE__ ) . 'includes/swg-auth-admin-level-check.php' );
  include( plugin_dir_path( __FILE__ ) . 'includes/swg-auth-metrics-listener.php' );
}

// Run Admin Stuff
include( plugin_dir_path( __FILE__ ) . 'admin/swg-auth-admin-menus.php' );
include( plugin_dir_path( __FILE__ ) . 'admin/swg-auth-settings.php' );
include( plugin_dir_path( __FILE__ ) . 'admin/swg-auth-user-settings.php' );

// Run Public Stuff
include( plugin_dir_path( __FILE__ ) . 'public/swg-auth-virtual-page.php' );
include( plugin_dir_path( __FILE__ ) . 'public/swg-auth-resources.php' );
add_action( 'wp_enqueue_scripts', 'swg_auth_enqueue_resource_table_css' );
function swg_auth_enqueue_resource_table_css() {
  wp_enqueue_style( 'swg-auth-resource-table', plugins_url( 'swg-auth/public/css/swg-auth-resource-table.css' ) );
}
include( plugin_dir_path( __FILE__ ) . 'public/swg-auth-metrics-widget.php' );
add_action( 'widgets_init', 'swg_auth_register_metrics_widget' );
function swg_auth_register_metrics_widget() {
  register_widget( 'swg_auth_metrics_widget' );
}
add_action( 'wp_enqueue_scripts', 'swg_auth_enqueue_metrics_widget_css' );
function swg_auth_enqueue_metrics_widget_css() {
  wp_enqueue_style( 'swg-auth-metrics-widget', plugins_url( 'swg-auth/public/css/swg-auth-metrics-widget.css' ) );
}
