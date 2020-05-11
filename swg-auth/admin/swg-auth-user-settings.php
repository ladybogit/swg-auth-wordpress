<?php

// No Direct Access
if ( ! defined( 'ABSPATH' ) ) {
  die;
}

// Add the User Settings HTML
add_action( 'show_user_profile', 'swg_auth_user_settings' );
add_action( 'edit_user_profile', 'swg_auth_user_settings' );
function swg_auth_user_settings( $user ) {
  if ( ! current_user_can( 'administrator' ) ) {
    return;
  }
  include( plugin_dir_path( __FILE__ ) . 'html/swg-auth-user-settings-html.php' );
}

// Save the User Settings
add_action( 'edit_user_profile_update', 'swg_auth_approved_update' );
function swg_auth_approved_update( $user_id ) {
  if ( ! current_user_can( 'edit_user', $user_id ) ) {
    return false;
  }
  if ( ! isset( $_POST['swg-auth-approved'] ) ) {
    return update_user_meta( $user_id, 'swg-auth-approved', null );
  }
  return update_user_meta( $user_id, 'swg-auth-approved', $_POST['swg-auth-approved'] );
}

add_action( 'edit_user_profile_update', 'swg_auth_banned_update' );
function swg_auth_banned_update( $user_id ) {
  if ( ! current_user_can( 'edit_user', $user_id ) ) {
    return false;
  }
  if ( ! isset( $_POST['swg-auth-banned'] ) ) {
    return update_user_meta( $user_id, 'swg-auth-banned', null );
  }
  return update_user_meta( $user_id, 'swg-auth-banned', $_POST['swg-auth-banned'] );
}

add_action( 'edit_user_profile_update', 'swg_auth_admin_level_update' );
function swg_auth_admin_level_update( $user_id ) {
  if ( ! current_user_can( 'edit_user', $user_id ) ) {
    return false;
  }
  $admin_level = intval( $_POST['swg-auth-admin-level'] );
  if ( ! is_int( $admin_level ) || $admin_level < 0 || $admin_level > 50 ) {
    return false;
  }
  return update_user_meta( $user_id, 'swg-auth-admin-level', $admin_level );
}

// User Settings Errors
add_filter( 'user_profile_update_errors', 'swg_auth_user_settings_errors' );
function swg_auth_user_settings_errors( $errors ) {
  $admin_level = intval( $_POST['swg-auth-admin-level'] );
  if ( ! is_int( $admin_level ) || $admin_level < 0 || $admin_level > 50 ) {
    $errors->add( 'swg-auth-invalid-admin-level', '<strong>ERROR:</strong> Admin Level must be between 0 and 50.' );
  }
  return $errors;
}
