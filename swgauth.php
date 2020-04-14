<?php
/**
  * Plugin Name: SWG Auth
  * Plugin URI: https://tekaohswg.github.io/swgauth-wordpress.html
  * Description: Star Wars Galaxies Authentication for Wordpress
  * Version: 0.1
  * Author: Tekaoh
  * Author URI: https://tekaohswg.github.io
*/

// No Direct Access
if(!defined('ABSPATH')){
  die;
}

// Run when Wordpress is loaded
add_action('wp_loaded', 'swgauth_run');

function swgauth_run(){
  // Check if the swgauth action is requested
  if($_GET['action'] == 'swgauth'){
    // Check if a user_name and user_password are provided
    if($_POST['user_name'] && $_POST['user_password']){
      // Ask Wordpress to authenticate the user_name and user_password
      $userInfo = wp_authenticate_username_password(NULL, $_POST['user_name'], $_POST['user_password']);
      // Check if the authentication request returned an error
      if(is_wp_error($userInfo)){
        // If there was an error, we'll let the client know.
        $response['message'] = "Account does not exist or password was incorrect";
      } else {
        // If there's no error, Success!
        $response['message'] = "success";
      }
      // Json encode our response so that the LoginServer knows what we're talking about
      echo json_encode($response);
      // Once we've responded, we don't want Wordpress to continue
      die;
    }
    // If we're here, the swgauth action was requested but no user_name and user_password were provided. That's weird... Don't return anything
    die;
  }
}
