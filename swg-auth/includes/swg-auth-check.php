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
    $station_id = $_POST['stationID'];
    $ip = $_POST['ip'];
    $key = $_POST['secretKey'];
  } elseif ( $auth_type === 'JsonWebAPI' ) {
    $data = json_decode( file_get_contents( 'php://input' ), true );
    $username = $data['user_name'];
    $password = $data['user_password'];
    $station_id = $data['stationID'];
    $ip = $data['ip'];
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
    $response['message'] = 'Match your user or password douse not. says Yoda';

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

  // Add expansion feature flags to response (converted to bit flags for SWG server)
  if ( isset( $user ) && ! is_wp_error( $user ) ) {
    // Get user settings
    $jtl_setting = get_user_meta( $user->ID, 'swg-auth-expansion-jtl', true );
    $ep3_setting = get_user_meta( $user->ID, 'swg-auth-expansion-ep3', true );
    $tow_setting = get_user_meta( $user->ID, 'swg-auth-expansion-tow', true );
    $cu_setting = get_user_meta( $user->ID, 'swg-auth-expansion-cu', true );
    $nge_setting = get_user_meta( $user->ID, 'swg-auth-expansion-nge', true );
    $coa_setting = get_user_meta( $user->ID, 'swg-auth-expansion-coa', true );
    $subscription_state = get_user_meta( $user->ID, 'swg-auth-subscription-state', true );
    $skip_tutorial = get_user_meta( $user->ID, 'swg-auth-skip-tutorial', true );
    $track = get_user_meta( $user->ID, 'swg-auth-track', true );
    $buddy_points = get_user_meta( $user->ID, 'swg-auth-buddy-points', true );
    $entitlement_total = get_user_meta( $user->ID, 'swg-auth-entitlement-total', true );
    $entitlement_entitled = get_user_meta( $user->ID, 'swg-auth-entitlement-entitled', true );
    $entitlement_total_since_login = get_user_meta( $user->ID, 'swg-auth-entitlement-total-since-login', true );
    $entitlement_entitled_since_login = get_user_meta( $user->ID, 'swg-auth-entitlement-entitled-since-login', true );
    $feature_ids_text = get_user_meta( $user->ID, 'swg-auth-feature-ids', true );
    $veteran_milestones = get_user_meta( $user->ID, 'swg-auth-veteran-milestones', true );
    $veteran_claimed = get_user_meta( $user->ID, 'swg-auth-veteran-claimed', true );
    
    $jtl_enabled = ( $jtl_setting === '' || $jtl_setting === 'on' ) ? 1 : 0;
    $ep3_enabled = ( $ep3_setting === '' || $ep3_setting === 'on' ) ? 1 : 0;
    $tow_enabled = ( $tow_setting === '' || $tow_setting === 'on' ) ? 1 : 0;
    $cu_enabled = ( $cu_setting === '' || $cu_setting === 'on' ) ? 1 : 0;
    $nge_enabled = ( $nge_setting === '' || $nge_setting === 'on' ) ? 1 : 0;
    $coa_enabled = ( $coa_setting === '' || $coa_setting === 'on' ) ? 1 : 0;
    
    // Individual flags for backward compatibility
    $response['expansion_jtl'] = $jtl_enabled;
    $response['expansion_ep3'] = $ep3_enabled;
    $response['expansion_tow'] = $tow_enabled;
    $response['expansion_cu'] = $cu_enabled;
    $response['expansion_nge'] = $nge_enabled;
    $response['expansion_coa'] = $coa_enabled;
    
    // Calculate subscription bits based on state
    // Base: 0x01, FreeTrial: 0x02, FreeTrial2: 0x20
    if ( $subscription_state === 'freetrial' ) {
      $subscriptionBits = 0x02; // FreeTrial only
    } elseif ( $subscription_state === 'freetrial2' ) {
      $subscriptionBits = 0x20; // FreeTrial2 only (not Base)
    } else {
      $subscriptionBits = 0x01; // Base (paid subscription)
    }
    
    // Calculate game feature bits
    $gameBits = 0xFFFFFFFF; // Start with all features enabled
    
    // If any expansion is disabled, modify the bits accordingly
    if ( !$jtl_enabled || !$ep3_enabled || !$tow_enabled || !$cu_enabled || !$nge_enabled || !$coa_enabled ) {
      $gameBits = 0x00000001; // Base game only
      
      if ( $jtl_enabled ) {
        $gameBits |= 0x00000002; // JTL bit (bit 1)
      }
      if ( $ep3_enabled ) {
        $gameBits |= 0x00000004; // Episode 3 bit (bit 2)
      }
      if ( $tow_enabled ) {
        $gameBits |= 0x00000008; // Trials of Obi-Wan bit (bit 3)
      }
      if ( $cu_enabled ) {
        $gameBits |= 0x00000400; // Combat Upgrade bit (bit 10)
      }
      if ( $nge_enabled ) {
        $gameBits |= 0x00040000; // New Game Enhancements bit (bit 18)
      }
      if ( $coa_enabled ) {
        $gameBits |= 0x00080000; // Complete Online Adventures bit (bit 19)
      }
    }
    
    // Free trial accounts don't get expansions even if bits are set
    if ( $subscription_state === 'freetrial2' ) {
      // FreeTrial2 blocks Episode 3 and TOW
      $gameBits &= ~0x00000004; // Remove EP3
      $gameBits &= ~0x00000008; // Remove TOW
    }
    
    $response['subscriptionBits'] = $subscriptionBits;
    $response['gameBits'] = $gameBits;
    
    // Tutorial skip flag (server expects boolean)
    $response['canSkipTutorial'] = ( $skip_tutorial === 'on' );
    
    // Track number (server expects unsigned int)
    $response['track'] = ( $track !== '' ) ? intval( $track ) : 0;
    
    // Buddy points (server expects int)
    $response['buddyPoints'] = ( $buddy_points !== '' ) ? intval( $buddy_points ) : 0;
    
    // Entitlement times (server expects unsigned int, in seconds)
    $response['entitlementTotalTime'] = ( $entitlement_total !== '' ) ? intval( $entitlement_total ) : 0;
    $response['entitlementEntitledTime'] = ( $entitlement_entitled !== '' ) ? intval( $entitlement_entitled ) : 0;
    $response['entitlementTotalTimeSinceLastLogin'] = ( $entitlement_total_since_login !== '' ) ? intval( $entitlement_total_since_login ) : 0;
    $response['entitlementEntitledTimeSinceLastLogin'] = ( $entitlement_entitled_since_login !== '' ) ? intval( $entitlement_entitled_since_login ) : 0;
    
    // Parse account feature IDs (server expects map<uint32, int>)
    $accountFeatureIds = new stdClass(); // Use object to force JSON object encoding
    if ( !empty( $feature_ids_text ) ) {
      $lines = explode( "\n", $feature_ids_text );
      foreach ( $lines as $line ) {
        $line = trim( $line );
        if ( empty( $line ) ) continue;
        
        $parts = explode( ':', $line );
        if ( count( $parts ) === 2 ) {
          $featureId = intval( trim( $parts[0] ) );
          $amount = intval( trim( $parts[1] ) );
          if ( $featureId > 0 ) {
            $accountFeatureIds->$featureId = $amount;
          }
        }
      }
    }
    $response['accountFeatureIds'] = $accountFeatureIds;
    
    // Veteran reward milestones (90 days each)
    $milestones = ( $veteran_milestones !== '' ) ? intval( $veteran_milestones ) : 0;
    $response['veteranRewardMilestones'] = $milestones;
    
    // Claimed veteran rewards/events
    $claimedEvents = array();
    if ( !empty( $veteran_claimed ) ) {
      $lines = explode( "\n", $veteran_claimed );
      foreach ( $lines as $line ) {
        $line = trim( $line );
        if ( !empty( $line ) ) {
          $claimedEvents[] = $line;
        }
      }
    }
    $response['veteranRewardsClaimed'] = $claimedEvents;
    
    // Admin/secure login flags
    $isAdmin = user_can( $user, 'administrator' );
    $response['isSecure'] = $isAdmin; // Admins get secure login
    
    // Admin level (0-50, admins get 50)
    $admin_level = get_user_meta( $user->ID, 'swg-auth-admin-level', true );
    $response['adminLevel'] = $isAdmin ? 50 : ( ( $admin_level !== '' ) ? intval( $admin_level ) : 0 );
    
    // Save the account's Station ID for later
    update_user_meta( $user->ID, 'swg-auth-station-id', $station_id );
  }

  // JSON Encode our response so that the SWG server can understand it
  header('Content-type: application/json');
  echo json_encode( $response, JSON_UNESCAPED_SLASHES );

  // Once we've responded, we don't want WordPress to continue
  die;

}
