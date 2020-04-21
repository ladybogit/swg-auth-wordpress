<h3>SWG Settings</h3>

<?php
// Collect the user's existing meta values
$approved = get_user_meta( $user->ID, 'swg-auth-approved', true );
$banned = get_user_meta( $user->ID, 'swg-auth-banned', true );
$admin_level = get_user_meta( $user->ID, 'swg-auth-admin-level', true );
?>

<table class="form-table">

  <?php if ( $approved === 'on' ): ?>
  <input type="hidden" name="swg-auth-approved" value="on">
  <?php endif; ?>

  <?php if ( get_option( 'swg-auth-approval-required' ) ): ?>
  <tr>
    <th>
      <label for="swg-auth-approved">Approved For Game Access</label>
    </th>
    <td>
      <input type="checkbox" <?php echo ( $approved === 'on' ) ? 'checked disabled' : 'name="swg-auth-approved"'; ?>>
      <span class="description">Once approved, cannot be unapproved</span>
    </td>
  </tr>
  <?php endif; ?>

  <tr>
    <th>
      <label for="swg-auth-banned">Banned From Game Access</label>
    </th>
    <td>
      <input type="checkbox" name="swg-auth-banned" <?php echo ( $banned === 'on' ) ? 'checked' : ''; ?>>
    </td>
  </tr>

  <tr>
    <th>
      <label for="swg-auth-admin-level">Admin Level (For God Mode)</label>
    </th>
    <td>
      <input type="number" name="swg-auth-admin-level" min="0" max="50" value="<?php echo ( $admin_level === null ) ? '0' : $admin_level; ?>">
      <span class="description">Must be between 0 and 50</span>
    </td>
  </tr>

</table>
