<?php

// No Direct Access
if ( ! defined( 'ABSPATH' ) ) {
  die;
}

// Check if the swg-auth-admin-level action is requested and that a user_name is provided
if ( isset( $_GET['action'] ) && $_GET['action'] === 'swg-auth-admin-level' && isset( $_POST['user_name'] ) ) {

  // Look up the user
  $user = get_user_by( 'login', $_POST['user_name'] );
  // Look up the user's Admin level
  $level = get_user_meta( $user->ID, 'swg-auth-admin-level', true );

  // If the user is a WordPress Admin, send back level 50
  if ( user_can( $user, 'administrator' ) ) {
    $response['message'] = '50';

  // If an Admin Level exists in the user's metadata, send that value
  } elseif( $level !== null ) {
    $response['message'] = $level;

  // Not an Admin
  } else {
    $response['message'] = '0';
  }

  // JSON Encode our response so that the SWG server can understand it
  echo json_encode( $response );

  // Once we've responded, we don't want WordPress to continue
  die;

}
