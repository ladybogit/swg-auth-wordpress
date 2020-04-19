<h3>SWG Settings</h3>
<?php echo (get_user_meta($user->ID, 'swg-auth-approved', true) == 'on') ? '<input type="hidden" name="swg-auth-approved" value="on">' : ''; ?>
<table class="form-table">
  <?php if(get_option('swg-auth-approval-required')) { ?>
  <tr>
    <th>
      <label for="swg-auth-approved">Approved For Game Access</label>
    </th>
    <td>
      <input type="checkbox" name=<?php echo (get_user_meta($user->ID, 'swg-auth-approved', true) == 'on') ? '"swg-auth-display-field" checked disabled' : '"swg-auth-approved"'; ?>>
      <span class="description">Once approved, cannot be unapproved</span>
    </td>
  </tr>
  <?php } ?>
  <tr>
    <th>
      <label for="swg-auth-banned">Banned From Game Access</label>
    </th>
    <td>
      <input type="checkbox" name="swg-auth-banned" <?php echo (get_user_meta($user->ID, 'swg-auth-banned', true) == 'on') ? 'checked' : ''; ?>>
    </td>
  </tr>
  <tr>
    <th>
      <label for="swg-auth-admin-level">Admin Level (For God Mode)</label>
    </th>
    <td>
      <input type="number" name="swg-auth-admin-level" min="0" max="50" value="<?php echo (get_user_meta($user->ID, 'swg-auth-admin-level', true) == NULL) ? '0' : get_user_meta($user->ID, 'swg-auth-admin-level', true); ?>">
      <span class="description">Must be between 0 and 50</span>
    </td>
  </tr>
</table>
