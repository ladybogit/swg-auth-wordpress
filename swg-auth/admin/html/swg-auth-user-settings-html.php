<?php

// No Direct Access
if ( ! defined( 'ABSPATH' ) ) {
  die;
}

?>

<h3>SWG Settings</h3>

<?php
// We're going to need OCI8 to look up character names.
if ( extension_loaded( 'oci8' ) ) {
  // Do we have a Station ID on file for this account?
  $station_id = get_user_meta( $user->ID, 'swg-auth-station-id', true );
  if ( $station_id ) {
    // If so, ask Oracle for a list of characters on this account.
    $connection = swg_auth_oci_connect();
    if ( $connection ) {
      $statement = oci_parse( $connection, "SELECT * FROM PLAYERS WHERE STATION_ID='" . $station_id . "'" );
      $results = oci_execute( $statement );
      // Create a list of characters.
      $format = get_option( 'date_format' );
      echo '<p>Characters associated with this account:</p>';
      echo '<ul>';
      while ( $result = oci_fetch_array( $statement, OCI_ASSOC + OCI_RETURN_NULLS ) ) {
        echo '<li>' . $result['CHARACTER_FULL_NAME'] . ' (Last Login: ' . wp_date( $format, strtotime( $result['LAST_LOGIN_TIME'] ) ) . '; Created: ' . wp_date( $format, strtotime( $result['CREATE_TIME'] ) ) . ')' . '</li>';
      }
      echo '</ul>';
      oci_free_statement( $statement );
      oci_close( $connection );
    } else {
      echo '<p>Unable to connect to the database. Please check your database settings.</p>';
    }
  } else {
    // No Station ID in user meta
    echo '<p>Station ID unknown. Waiting for next account authentication...</p>';
  }
}
?>

<?php
$is_admin = false;
// Collect the user's existing meta values
$approved = get_user_meta( $user->ID, 'swg-auth-approved', true );
$banned = get_user_meta( $user->ID, 'swg-auth-banned', true );
$admin_level = get_user_meta( $user->ID, 'swg-auth-admin-level', true );
?>

<?php if ( user_can( $user, 'administrator' ) ): ?>
  <?php $is_admin = true; ?>
  <span class="description">This user is an Administrator and therefore has Game Access and Admin Level 50.</span>
<?php endif; ?>

<table class="form-table">

  <?php if ( $approved === 'on' || $is_admin ): ?>
    <input type="hidden" name="swg-auth-approved" value="on">
  <?php endif; ?>

  <?php if ( get_option( 'swg-auth-approval-required' ) ): ?>
    <tr>
      <th>
        <label for="swg-auth-approved">Approved For Game Access</label>
      </th>
      <td>
        <input type="checkbox" <?php echo ( $approved === 'on' || $is_admin ) ? 'checked disabled' : 'name="swg-auth-approved"'; ?>>
        <span class="description">Once approved, cannot be unapproved</span>
      </td>
    </tr>
  <?php endif; ?>

  <tr>
    <th>
      <label for="swg-auth-banned">Banned From Game Access</label>
    </th>
    <td>
      <?php if ( $is_admin ): ?>
        <input type="checkbox" name="swg-auth-banned" disabled>
      <?php else: ?>
        <input type="checkbox" name="swg-auth-banned" <?php echo ( $banned === 'on' ) ? 'checked' : ''; ?>>
      <?php endif; ?>
    </td>
  </tr>

  <tr>
    <th>
      <label for="swg-auth-admin-level">Admin Level (For God Mode)</label>
    </th>
    <td>
      <?php if ( $is_admin ): ?>
        <input type="hidden" name="swg-auth-admin-level" value="0">
        <input type="number" value="50" min="0" max="50" disabled>
      <?php else: ?>
        <input type="number" name="swg-auth-admin-level" min="0" max="50" value="<?php echo ( $admin_level === null ) ? '0' : esc_attr( $admin_level ); ?>">
      <?php endif; ?>
      <span class="description">Must be between 0 and 50</span>
    </td>
  </tr>

</table>

<h3>Account Features</h3>

<?php
$skip_tutorial = get_user_meta( $user->ID, 'swg-auth-skip-tutorial', true );
$track = get_user_meta( $user->ID, 'swg-auth-track', true );
$buddy_points = get_user_meta( $user->ID, 'swg-auth-buddy-points', true );
$subscription_state = get_user_meta( $user->ID, 'swg-auth-subscription-state', true );

// Entitlement times - Calculate automatically from account age
$account_created = strtotime( $user->user_registered );
$current_time = time();
$account_age_seconds = $current_time - $account_created;
$account_age_days = round( $account_age_seconds / 86400 );

$entitlement_override = get_user_meta( $user->ID, 'swg-auth-entitlement-override', true );
$entitlement_total = get_user_meta( $user->ID, 'swg-auth-entitlement-total', true );

// If no override set but total exists, use the total as default override
if ( empty( $entitlement_override ) && ! empty( $entitlement_total ) ) {
  $entitlement_override = intval( $entitlement_total );
}

$calculated_entitlement = $account_age_seconds + ( $entitlement_override ? intval( $entitlement_override ) : 0 );
$calculated_milestones = floor( $calculated_entitlement / 7776000 );

$entitlement_entitled = get_user_meta( $user->ID, 'swg-auth-entitlement-entitled', true );
$entitlement_total_since_login = get_user_meta( $user->ID, 'swg-auth-entitlement-total-since-login', true );
$entitlement_entitled_since_login = get_user_meta( $user->ID, 'swg-auth-entitlement-entitled-since-login', true );

$feature_ids = get_user_meta( $user->ID, 'swg-auth-feature-ids', true );
?>

<table class="form-table">

  <tr>
    <th>
      <label for="swg-auth-skip-tutorial">Can Skip Tutorial</label>
    </th>
    <td>
      <input type="checkbox" name="swg-auth-skip-tutorial" <?php echo ( $skip_tutorial === 'on' ) ? 'checked' : ''; ?>>
      <span class="description">Allow this account to skip the tutorial</span>
    </td>
  </tr>

  <tr>
    <th>
      <label for="swg-auth-subscription-state">Subscription State</label>
    </th>
    <td>
      <select name="swg-auth-subscription-state">
        <option value="base" <?php echo ( $subscription_state === '' || $subscription_state === 'base' ) ? 'selected' : ''; ?>>Base (Paid Subscription)</option>
        <option value="freetrial" <?php echo ( $subscription_state === 'freetrial' ) ? 'selected' : ''; ?>>Free Trial (14-day)</option>
        <option value="freetrial2" <?php echo ( $subscription_state === 'freetrial2' ) ? 'selected' : ''; ?>>Free Trial 2 (Converted Trial)</option>
      </select>
      <span class="description">Free trials have restricted access to expansions</span>
    </td>
  </tr>

  <tr>
    <th>
      <label for="swg-auth-track">Track Number</label>
    </th>
    <td>
      <input type="number" name="swg-auth-track" min="0" value="<?php echo ( $track === '' ) ? '0' : esc_attr( $track ); ?>">
      <span class="description">Account tracking/grouping number (default: 0)</span>
    </td>
  </tr>

  <tr>
    <th>
      <label for="swg-auth-buddy-points">Buddy Points</label>
    </th>
    <td>
      <input type="number" name="swg-auth-buddy-points" min="0" value="<?php echo ( $buddy_points === '' ) ? '0' : esc_attr( $buddy_points ); ?>">
      <span class="description">Referral reward points</span>
    </td>
  </tr>

  <tr style="background-color: #f0f8ff;">
    <th colspan="2">
      <h3 style="margin: 10px 0;">Veteran Rewards (Auto-Calculated)</h3>
    </th>
  </tr>

  <tr>
    <th>Account Information</th>
    <td>
      <strong>Created:</strong> <?php echo date('Y-m-d H:i:s', $account_created); ?><br>
      <strong>Account Age:</strong> <?php echo $account_age_days; ?> days (<?php echo number_format($account_age_seconds); ?> seconds)<br>
      <strong>Override Value:</strong> <span id="override-display"><?php echo number_format($entitlement_override ? intval($entitlement_override) : 0); ?></span> seconds<br>
      <strong style="color: green;">Total Entitlement:</strong> <span id="calculated-display" style="color: green; font-weight: bold;"><?php echo number_format($calculated_entitlement); ?></span> seconds (<span id="days-display"><?php echo round($calculated_entitlement/86400); ?></span> days)<br>
      <strong>Current Milestones:</strong> <span id="milestones-display"><?php echo $calculated_milestones; ?></span>
    </td>
  </tr>

  <tr>
    <th>
      <label for="swg-auth-entitlement-override">Entitlement Time Override</label>
    </th>
    <td>
      <input type="number" id="swg-auth-entitlement-override" name="swg-auth-entitlement-override" min="0" value="<?php echo ( $entitlement_override === '' ) ? '0' : esc_attr( $entitlement_override ); ?>">
      <span class="description">Additional seconds to add to account age (77760000 = 900 days = 10 milestones)</span>
    </td>
  </tr>
  
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    const accountAge = <?php echo $account_age_seconds; ?>;
    const overrideInput = document.getElementById('swg-auth-entitlement-override');
    const overrideDisplay = document.getElementById('override-display');
    const calculatedDisplay = document.getElementById('calculated-display');
    const daysDisplay = document.getElementById('days-display');
    const milestonesDisplay = document.getElementById('milestones-display');
    
    overrideInput.addEventListener('input', function() {
      const override = parseInt(this.value) || 0;
      const total = accountAge + override;
      const days = Math.round(total / 86400);
      const milestones = Math.floor(total / 7776000);
      
      overrideDisplay.textContent = override.toLocaleString();
      calculatedDisplay.textContent = total.toLocaleString();
      daysDisplay.textContent = days;
      milestonesDisplay.textContent = milestones;
    });
  });
  </script>

  <tr>
    <th>
      <label for="swg-auth-entitlement-total">Total Entitlement Time (Calculated)</label>
    </th>
    <td>
      <input type="number" name="swg-auth-entitlement-total" min="0" value="<?php echo ( $entitlement_total === '' ) ? '0' : esc_attr( $entitlement_total ); ?>" readonly style="background-color: #f0f0f0;">
      <span class="description">Auto-calculated: Account Age + Override = <?php echo number_format($calculated_entitlement); ?> seconds</span>
    </td>
  </tr>

  <tr>
    <th>
      <label for="swg-auth-entitlement-entitled">Entitled Time</label>
    </th>
    <td>
      <input type="number" name="swg-auth-entitlement-entitled" min="0" value="<?php echo ( $entitlement_entitled === '' ) ? '0' : esc_attr( $entitlement_entitled ); ?>">
      <span class="description">Entitled play time in seconds</span>
    </td>
  </tr>

  <tr>
    <th>
      <label for="swg-auth-entitlement-total-since-login">Total Time Since Last Login</label>
    </th>
    <td>
      <input type="number" name="swg-auth-entitlement-total-since-login" min="0" value="<?php echo ( $entitlement_total_since_login === '' ) ? '0' : esc_attr( $entitlement_total_since_login ); ?>">
      <span class="description">Total subscribed time since last login in seconds</span>
    </td>
  </tr>

  <tr>
    <th>
      <label for="swg-auth-entitlement-entitled-since-login">Entitled Time Since Last Login</label>
    </th>
    <td>
      <input type="number" name="swg-auth-entitlement-entitled-since-login" min="0" value="<?php echo ( $entitlement_entitled_since_login === '' ) ? '0' : esc_attr( $entitlement_entitled_since_login ); ?>">
      <span class="description">Entitled play time since last login in seconds</span>
    </td>
  </tr>

  <tr>
    <th>
      <label for="swg-auth-feature-ids">Account Feature IDs</label>
    </th>
    <td>
      <textarea name="swg-auth-feature-ids" rows="5" cols="50" class="large-text"><?php echo esc_textarea( $feature_ids ); ?></textarea>
      <span class="description">One per line, format: FEATURE_ID:AMOUNT (e.g., 12345:1 for TCG items)</span>
    </td>
  </tr>

</table>

<h3>Veteran Rewards</h3>

<?php
$veteran_reward_milestones = get_user_meta( $user->ID, 'swg-auth-veteran-milestones', true );
$veteran_rewards_claimed = get_user_meta( $user->ID, 'swg-auth-veteran-claimed', true );
?>

<span class="description">Veteran rewards are based on account age. Each milestone = 90 days.</span>

<table class="form-table">

  <tr>
    <th>
      <label for="swg-auth-veteran-milestones">Veteran Reward Milestones</label>
    </th>
    <td>
      <input type="number" name="swg-auth-veteran-milestones" min="0" max="40" value="<?php echo ( $veteran_reward_milestones === '' ) ? '0' : esc_attr( $veteran_reward_milestones ); ?>">
      <span class="description">Number of 90-day milestones earned (0-40). Milestone 2 = 180 days, etc.</span>
    </td>
  </tr>

  <tr>
    <th>
      <label for="swg-auth-veteran-claimed">Claimed Reward Events</label>
    </th>
    <td>
      <textarea name="swg-auth-veteran-claimed" rows="3" cols="50" class="large-text"><?php echo esc_textarea( $veteran_rewards_claimed ); ?></textarea>
      <span class="description">List of claimed event names (one per line). Leave empty if none claimed.</span>
    </td>
  </tr>

</table>

<h3>Expansion Access</h3>

<?php
$expansion_jtl = get_user_meta( $user->ID, 'swg-auth-expansion-jtl', true );
$expansion_ep3 = get_user_meta( $user->ID, 'swg-auth-expansion-ep3', true );
$expansion_tow = get_user_meta( $user->ID, 'swg-auth-expansion-tow', true );
$expansion_cu = get_user_meta( $user->ID, 'swg-auth-expansion-cu', true );
$expansion_nge = get_user_meta( $user->ID, 'swg-auth-expansion-nge', true );
$expansion_coa = get_user_meta( $user->ID, 'swg-auth-expansion-coa', true );

// Default to enabled (checked) if not set
$jtl_checked = ( $expansion_jtl === '' || $expansion_jtl === 'on' );
$ep3_checked = ( $expansion_ep3 === '' || $expansion_ep3 === 'on' );
$tow_checked = ( $expansion_tow === '' || $expansion_tow === 'on' );
$cu_checked = ( $expansion_cu === '' || $expansion_cu === 'on' );
$nge_checked = ( $expansion_nge === '' || $expansion_nge === 'on' );
$coa_checked = ( $expansion_coa === '' || $expansion_coa === 'on' );
?>

<span class="description">All expansions are enabled by default. Uncheck to disable access.</span>

<table class="form-table">

  <tr>
    <th>
      <label for="swg-auth-expansion-jtl">Jump to Lightspeed (JTL)</label>
    </th>
    <td>
      <input type="checkbox" name="swg-auth-expansion-jtl" <?php echo $jtl_checked ? 'checked' : ''; ?>>
      <span class="description">Enable Jump to Lightspeed expansion access</span>
    </td>
  </tr>

  <tr>
    <th>
      <label for="swg-auth-expansion-ep3">Episode 3: Revenge of the Sith</label>
    </th>
    <td>
      <input type="checkbox" name="swg-auth-expansion-ep3" <?php echo $ep3_checked ? 'checked' : ''; ?>>
      <span class="description">Enable Episode 3 expansion access</span>
    </td>
  </tr>

  <tr>
    <th>
      <label for="swg-auth-expansion-tow">Trials of Obi-Wan</label>
    </th>
    <td>
      <input type="checkbox" name="swg-auth-expansion-tow" <?php echo $tow_checked ? 'checked' : ''; ?>>
      <span class="description">Enable Trials of Obi-Wan expansion access</span>
    </td>
  </tr>

  <tr>
    <th>
      <label for="swg-auth-expansion-cu">Combat Upgrade</label>
    </th>
    <td>
      <input type="checkbox" name="swg-auth-expansion-cu" <?php echo $cu_checked ? 'checked' : ''; ?>>
      <span class="description">Enable Combat Upgrade expansion access</span>
    </td>
  </tr>

  <tr>
    <th>
      <label for="swg-auth-expansion-nge">New Game Enhancements (NGE)</label>
    </th>
    <td>
      <input type="checkbox" name="swg-auth-expansion-nge" <?php echo $nge_checked ? 'checked' : ''; ?>>
      <span class="description">Enable New Game Enhancements expansion access</span>
    </td>
  </tr>

  <tr>
    <th>
      <label for="swg-auth-expansion-coa">Complete Online Adventures</label>
    </th>
    <td>
      <input type="checkbox" name="swg-auth-expansion-coa" <?php echo $coa_checked ? 'checked' : ''; ?>>
      <span class="description">Enable Complete Online Adventures expansion access</span>
    </td>
  </tr>

</table>
