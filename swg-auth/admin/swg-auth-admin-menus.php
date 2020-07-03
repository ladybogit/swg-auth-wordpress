<?php

// No Direct Access
if ( ! defined( 'ABSPATH' ) ) {
  die;
}

// Build the Admin Menus
add_action( 'admin_menu', 'swg_auth_admin_menus' );
function swg_auth_admin_menus() {

  add_menu_page(
    'SWG Auth',
    'SWG Auth',
    'administrator',
    'swg-auth-settings',
    'swg_auth_settings_html',
    'dashicons-swg',
    3
  );

  add_submenu_page(
    'swg-auth-settings',
    'SWG Auth Settings',
    'Settings',
    'administrator',
    'swg-auth-settings',
    'swg_auth_settings_html',
    1
  );

  add_submenu_page(
    'swg-auth-settings',
    'Server Config',
    'Server Config',
    'administrator',
    'swg-auth-server-config',
    'swg_auth_server_config_html',
    10
  );

}

// Include the Admin Menu HTML files
function swg_auth_settings_html() {
  if ( ! current_user_can( 'manage_options' ) ) {
    return;
  }
  include( plugin_dir_path( __FILE__ ) . 'html/swg-auth-settings-html.php' );
}

function swg_auth_server_config_html() {
  if ( ! current_user_can( 'manage_options' ) ) {
    return;
  }
  include( plugin_dir_path( __FILE__ ) . 'html/swg-auth-server-config-html.php' );
}

// Include the Admin CSS
add_action( 'admin_enqueue_scripts', 'swg_auth_admin_enqueue_scripts' );
function swg_auth_admin_enqueue_scripts() {
  wp_register_style( 'swg_auth_dashicons', plugins_url( '/swg-auth/admin/css/swg-auth-dashicons.css' ) );
  wp_enqueue_style( 'swg_auth_dashicons' );
}
