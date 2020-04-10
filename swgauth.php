<?php
/**
  * Plugin Name: SWG Auth
  * Plugin URI: https://tekaohswg.github.io
  * Description: Star Wars Galaxies Authentication for Wordpress
  * Version: 0.1
  * Author: Tekaoh
  * Author URI: https://tekaohswg.github.io
*/

//No Direct Access
if(!defined('ABSPATH')){
  die;
}

add_action('wp_loaded', 'swgauth_run');

function swgauth_run(){
  if($_GET['action'] == 'swgauth'){
    if($_POST['user_name'] && $_POST['user_password']){
      $userInfo = wp_authenticate_username_password(NULL, $_POST['user_name'], $_POST['user_password']);
      if(!is_wp_error($userInfo)){
        $response['message'] = "success";
      } else {
        $response['message'] = "Account does not exist or password was incorrect";
      }
      echo json_encode($response);
      die;
    }
    die;
  }
}
