<?php

// No Direct Access
if ( ! defined( 'ABSPATH' ) ) {
  die;
}

?>

<h3>SWG Settings</h3>

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
