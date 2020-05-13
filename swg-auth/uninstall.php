<?php

// Don't run this if you're not actually unstalling
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
  die;
}

// Delete installation settings
delete_option( 'swg-auth-approval-required' );
delete_option( 'swg-auth-metrics-data' );
delete_option( 'swg-auth-odb-username' );
delete_option( 'swg-auth-odb-password' );
delete_option( 'swg-auth-odb-sid' );
delete_option( 'swg-auth-odb-ip' );
delete_option( 'swg-auth-odb-port' );
delete_option( 'swg-auth-loginserver-key' );
delete_option( 'swg-auth-serverutility-key' );
delete_option( 'swg-auth-centralserver-key' );

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
