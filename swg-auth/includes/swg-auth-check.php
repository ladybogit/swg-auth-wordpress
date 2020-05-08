<?php

// Check if the swg-auth action is requested and that a user_name and user_password are provided
if ( isset( $_GET[ 'action' ] ) && $_GET[ 'action' ] === 'swg-auth' && isset( $_POST[ 'user_name' ] ) && isset( $_POST[ 'user_password' ] ) ) {

  // Ask WordPress to authenticate the user_name and user_password
  $user = wp_authenticate_username_password( null, $_POST[ 'user_name' ], $_POST[ 'user_password' ] );

  // Check if the authentication request returned an error
  if ( is_wp_error( $user ) ) {
    $response[ 'message' ] = "Account does not exist or password was incorrect";

  // WordPress Administrators are always let in
  } elseif ( user_can( $user, 'administrator' ) ) {
    $response[ 'message' ] = "success";

  // Check if the user is banned
  } elseif ( get_user_meta( $user->ID, 'swg-auth-banned', true ) === 'on' ) {
    $response[ 'message' ] = "This account has been banned";

  // Check if approval is required and if the user is approved
  } elseif ( get_option( 'swg-auth-approval-required' ) === 'on' && get_user_meta( $user->ID, 'swg-auth-approved', true ) !== 'on' ) {
    $response[ 'message' ] = "This account has not yet been approved";

  // If we're this far along, success!
  } else {
    $response['message'] = "success";
  }

  // JSON Encode our response so that the LoginServer knows what we're talking about
  echo json_encode( $response );
  // Once we've responded, we don't want WordPress to continue
  die;
}
