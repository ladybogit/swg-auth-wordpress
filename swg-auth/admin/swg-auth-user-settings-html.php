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
</table>
