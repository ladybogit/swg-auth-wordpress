<?php
/**
  * Plugin Name: SWG Auth
  * Plugin URI: https://tekaohswg.github.io/swg-auth-wordpress.html
  * Description: Star Wars Galaxies Authentication for Wordpress
  * Version: 0.4
  * Author: Tekaoh
  * Author URI: https://tekaohswg.github.io
*/

// No Direct Access
if(!defined('ABSPATH')){
  die;
}

// Run when Wordpress is loaded
add_action('wp_loaded', 'swg_auth_run');
function swg_auth_run(){
  include(plugin_dir_path(__FILE__) . 'includes/swg-auth-check.php');
  include(plugin_dir_path(__FILE__) . 'includes/swg-auth-admin-level-check.php');
}

// Run the admin panel stuff
include(plugin_dir_path(__FILE__) . 'admin/admin.php');
