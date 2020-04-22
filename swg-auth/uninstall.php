<?php

// Don't run this if you're not actually unstalling
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
  die;
}

// Delete installation settings
delete_option( 'swg-auth-approval-required' );
delete_option( 'swg-auth-metrics-data' );

// Delete user settings
swg_auth_delete_user_meta();
function swg_auth_delete_user_meta() {
  $users = get_users();
  foreach ( $users as $user ) {
    delete_user_meta( $user->ID, 'swg-auth-approved' );
    delete_user_meta( $user->ID, 'swg-auth-banned' );
    delete_user_meta( $user->ID, 'swg-auth-admin-level' );
  }
}
