<?php

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
  return update_user_meta( $user_id, 'swg-auth-approved', $_POST[ 'swg-auth-approved' ] );
}

add_action( 'edit_user_profile_update', 'swg_auth_banned_update' );
function swg_auth_banned_update( $user_id ) {
  if ( ! current_user_can( 'edit_user', $user_id ) ) {
    return false;
  }
  return update_user_meta( $user_id, 'swg-auth-banned', $_POST[ 'swg-auth-banned' ] );
}

add_action( 'edit_user_profile_update', 'swg_auth_admin_level_update' );
function swg_auth_admin_level_update( $user_id ) {
  if ( ! current_user_can( 'edit_user', $user_id ) ) {
    return false;
  }
  $value = intval( $_POST[ 'swg-auth-admin-level' ] );
  if ( ! is_int( $value ) || $value < 0 || $value > 50 ) {
    return false;
  }
  return update_user_meta( $user_id, 'swg-auth-admin-level', $value );
}
