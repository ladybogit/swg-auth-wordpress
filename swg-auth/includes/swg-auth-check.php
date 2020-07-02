<?php

// No Direct Access
if ( ! defined( 'ABSPATH' ) ) {
  die;
}

// Check if the swg-auth action is requested
if ( isset( $_GET['action'] ) && $_GET['action'] === 'swg-auth' ) {

  // What type of auth are we using?
  $auth_type = get_option( 'swg-auth-auth-type', 'WebAPI' );

  // Parse for the data we need
  if ( $auth_type === 'WebAPI' ) {
    $username = $_POST['user_name'];
    $password = $_POST['user_password'];
    $key = $_POST['secretKey'];
  } elseif ( $auth_type === 'JsonWebAPI' ) {
    $data = json_decode( file_get_contents( 'php://input' ), true );
    $username = $data['user_name'];
    $password = $data['user_password'];
    $key = $data['secretKey'];
  }

  // Do we have everything we need continue?
  if ( ! isset( $username ) || ! isset( $password ) ) {
    // If not, abort the auth check and return to WordPress
    return;
  }

  // Check the secret key
  if ( $key !== get_option( 'swg-auth-loginserver-key', '' ) ) {
    // If it's incorrect, stop immediately
    die;
  }

  // Ask WordPress to authenticate the username and userpassword
  $user = wp_authenticate_username_password( null, $username, $password );

  // Check if the authentication request returned an error
  if ( is_wp_error( $user ) ) {
    $response['message'] = 'Account does not exist or password was incorrect';

  // WordPress Administrators are always let in
  } elseif ( user_can( $user, 'administrator' ) ) {
    $response['message'] = 'success';

  // Check if the user is banned
  } elseif ( get_user_meta( $user->ID, 'swg-auth-banned', true ) === 'on' ) {
    $response['message'] = 'This account has been banned';

  // Check if approval is required and if the user is approved
  } elseif ( get_option( 'swg-auth-approval-required' ) === 'on' && get_user_meta( $user->ID, 'swg-auth-approved', true ) !== 'on' ) {
    $response['message'] = 'This account has not yet been approved';

  // If we're this far along, success!
  } else {
    $response['message'] = 'success';
  }

  // JSON Encode our response so that the SWG server can understand it
  header('Content-type: application/json');
  echo json_encode( $response );

  // Once we've responded, we don't want WordPress to continue
  die;

}
