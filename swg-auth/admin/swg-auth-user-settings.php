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

add_action( 'edit_user_profile_update', 'swg_auth_expansion_jtl_update' );
function swg_auth_expansion_jtl_update( $user_id ) {
  if ( ! current_user_can( 'edit_user', $user_id ) ) {
    return false;
  }
  if ( ! isset( $_POST['swg-auth-expansion-jtl'] ) ) {
    return update_user_meta( $user_id, 'swg-auth-expansion-jtl', null );
  }
  return update_user_meta( $user_id, 'swg-auth-expansion-jtl', $_POST['swg-auth-expansion-jtl'] );
}

add_action( 'edit_user_profile_update', 'swg_auth_expansion_ep3_update' );
function swg_auth_expansion_ep3_update( $user_id ) {
  if ( ! current_user_can( 'edit_user', $user_id ) ) {
    return false;
  }
  if ( ! isset( $_POST['swg-auth-expansion-ep3'] ) ) {
    return update_user_meta( $user_id, 'swg-auth-expansion-ep3', null );
  }
  return update_user_meta( $user_id, 'swg-auth-expansion-ep3', $_POST['swg-auth-expansion-ep3'] );
}

add_action( 'edit_user_profile_update', 'swg_auth_expansion_tow_update' );
function swg_auth_expansion_tow_update( $user_id ) {
  if ( ! current_user_can( 'edit_user', $user_id ) ) {
    return false;
  }
  if ( ! isset( $_POST['swg-auth-expansion-tow'] ) ) {
    return update_user_meta( $user_id, 'swg-auth-expansion-tow', null );
  }
  return update_user_meta( $user_id, 'swg-auth-expansion-tow', $_POST['swg-auth-expansion-tow'] );
}

add_action( 'edit_user_profile_update', 'swg_auth_expansion_cu_update' );
function swg_auth_expansion_cu_update( $user_id ) {
  if ( ! current_user_can( 'edit_user', $user_id ) ) {
    return false;
  }
  if ( ! isset( $_POST['swg-auth-expansion-cu'] ) ) {
    return update_user_meta( $user_id, 'swg-auth-expansion-cu', null );
  }
  return update_user_meta( $user_id, 'swg-auth-expansion-cu', $_POST['swg-auth-expansion-cu'] );
}

add_action( 'edit_user_profile_update', 'swg_auth_expansion_nge_update' );
function swg_auth_expansion_nge_update( $user_id ) {
  if ( ! current_user_can( 'edit_user', $user_id ) ) {
    return false;
  }
  if ( ! isset( $_POST['swg-auth-expansion-nge'] ) ) {
    return update_user_meta( $user_id, 'swg-auth-expansion-nge', null );
  }
  return update_user_meta( $user_id, 'swg-auth-expansion-nge', $_POST['swg-auth-expansion-nge'] );
}

add_action( 'edit_user_profile_update', 'swg_auth_expansion_coa_update' );
function swg_auth_expansion_coa_update( $user_id ) {
  if ( ! current_user_can( 'edit_user', $user_id ) ) {
    return false;
  }
  if ( ! isset( $_POST['swg-auth-expansion-coa'] ) ) {
    return update_user_meta( $user_id, 'swg-auth-expansion-coa', null );
  }
  return update_user_meta( $user_id, 'swg-auth-expansion-coa', $_POST['swg-auth-expansion-coa'] );
}

add_action( 'edit_user_profile_update', 'swg_auth_skip_tutorial_update' );
function swg_auth_skip_tutorial_update( $user_id ) {
  if ( ! current_user_can( 'edit_user', $user_id ) ) {
    return false;
  }
  if ( ! isset( $_POST['swg-auth-skip-tutorial'] ) ) {
    return update_user_meta( $user_id, 'swg-auth-skip-tutorial', null );
  }
  return update_user_meta( $user_id, 'swg-auth-skip-tutorial', $_POST['swg-auth-skip-tutorial'] );
}

add_action( 'edit_user_profile_update', 'swg_auth_subscription_state_update' );
function swg_auth_subscription_state_update( $user_id ) {
  if ( ! current_user_can( 'edit_user', $user_id ) ) {
    return false;
  }
  $state = sanitize_text_field( $_POST['swg-auth-subscription-state'] );
  if ( ! in_array( $state, array( 'base', 'freetrial', 'freetrial2' ) ) ) {
    $state = 'base';
  }
  return update_user_meta( $user_id, 'swg-auth-subscription-state', $state );
}

add_action( 'edit_user_profile_update', 'swg_auth_track_update' );
function swg_auth_track_update( $user_id ) {
  if ( ! current_user_can( 'edit_user', $user_id ) ) {
    return false;
  }
  $track = intval( $_POST['swg-auth-track'] );
  if ( $track < 0 ) {
    $track = 0;
  }
  return update_user_meta( $user_id, 'swg-auth-track', $track );
}

add_action( 'edit_user_profile_update', 'swg_auth_buddy_points_update' );
function swg_auth_buddy_points_update( $user_id ) {
  if ( ! current_user_can( 'edit_user', $user_id ) ) {
    return false;
  }
  $points = intval( $_POST['swg-auth-buddy-points'] );
  if ( $points < 0 ) {
    $points = 0;
  }
  return update_user_meta( $user_id, 'swg-auth-buddy-points', $points );
}

add_action( 'edit_user_profile_update', 'swg_auth_entitlement_override_update' );
function swg_auth_entitlement_override_update( $user_id ) {
  if ( ! current_user_can( 'edit_user', $user_id ) ) {
    return false;
  }
  $time = intval( $_POST['swg-auth-entitlement-override'] );
  if ( $time < 0 ) {
    $time = 0;
  }
  
  // Save the override
  update_user_meta( $user_id, 'swg-auth-entitlement-override', $time );
  
  // Recalculate total entitlement and milestones
  $user = get_userdata( $user_id );
  $account_created = strtotime( $user->user_registered );
  $current_time = time();
  $account_age_seconds = $current_time - $account_created;
  $total_entitlement = $account_age_seconds + $time;
  $milestones = floor( $total_entitlement / 7776000 );
  
  // Update the calculated values
  update_user_meta( $user_id, 'swg-auth-entitlement-total', $total_entitlement );
  update_user_meta( $user_id, 'swg-auth-veteran-milestones', $milestones );
  
  return true;
}

// Removed swg_auth_entitlement_total_update - it was overwriting the auto-calculated value

add_action( 'edit_user_profile_update', 'swg_auth_entitlement_entitled_update' );
function swg_auth_entitlement_entitled_update( $user_id ) {
  if ( ! current_user_can( 'edit_user', $user_id ) ) {
    return false;
  }
  $time = intval( $_POST['swg-auth-entitlement-entitled'] );
  if ( $time < 0 ) {
    $time = 0;
  }
  return update_user_meta( $user_id, 'swg-auth-entitlement-entitled', $time );
}

add_action( 'edit_user_profile_update', 'swg_auth_entitlement_total_since_login_update' );
function swg_auth_entitlement_total_since_login_update( $user_id ) {
  if ( ! current_user_can( 'edit_user', $user_id ) ) {
    return false;
  }
  $time = intval( $_POST['swg-auth-entitlement-total-since-login'] );
  if ( $time < 0 ) {
    $time = 0;
  }
  return update_user_meta( $user_id, 'swg-auth-entitlement-total-since-login', $time );
}

add_action( 'edit_user_profile_update', 'swg_auth_entitlement_entitled_since_login_update' );
function swg_auth_entitlement_entitled_since_login_update( $user_id ) {
  if ( ! current_user_can( 'edit_user', $user_id ) ) {
    return false;
  }
  $time = intval( $_POST['swg-auth-entitlement-entitled-since-login'] );
  if ( $time < 0 ) {
    $time = 0;
  }
  return update_user_meta( $user_id, 'swg-auth-entitlement-entitled-since-login', $time );
}

add_action( 'edit_user_profile_update', 'swg_auth_feature_ids_update' );
function swg_auth_feature_ids_update( $user_id ) {
  if ( ! current_user_can( 'edit_user', $user_id ) ) {
    return false;
  }
  $feature_ids = sanitize_textarea_field( $_POST['swg-auth-feature-ids'] );
  return update_user_meta( $user_id, 'swg-auth-feature-ids', $feature_ids );
}

add_action( 'edit_user_profile_update', 'swg_auth_veteran_milestones_update' );
function swg_auth_veteran_milestones_update( $user_id ) {
  if ( ! current_user_can( 'edit_user', $user_id ) ) {
    return false;
  }
  $milestones = intval( $_POST['swg-auth-veteran-milestones'] );
  if ( $milestones < 0 ) {
    $milestones = 0;
  }
  if ( $milestones > 40 ) {
    $milestones = 40;
  }
  return update_user_meta( $user_id, 'swg-auth-veteran-milestones', $milestones );
}

add_action( 'edit_user_profile_update', 'swg_auth_veteran_claimed_update' );
function swg_auth_veteran_claimed_update( $user_id ) {
  if ( ! current_user_can( 'edit_user', $user_id ) ) {
    return false;
  }
  $claimed = sanitize_textarea_field( $_POST['swg-auth-veteran-claimed'] );
  return update_user_meta( $user_id, 'swg-auth-veteran-claimed', $claimed );
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
