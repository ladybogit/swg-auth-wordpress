<?php

add_action( 'admin_init', 'swg_auth_settings' );
function swg_auth_settings() {

  add_settings_section(
    'swg-auth-general-settings',
    'General Settings',
    'swg_auth_general_settings_html',
    'swg-auth-settings'
  );

  register_setting(
    'swg-auth-general-settings',
    'swg-auth-approval-required',
    array(
      'type' => 'boolean',
      'description' => 'Whether approval is required for game access.',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => false
    )
  );

  add_settings_field(
    'swg-auth-approval-required',
    'Require approval before an account can have game access.',
    'swg_auth_approval_required_html',
    'swg-auth-settings',
    'swg-auth-general-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

}

function swg_auth_general_settings_html( $args ) {
  echo '';
}
function swg_auth_approval_required_html( $args ) {
  ?>
  <input type="checkbox" name="swg-auth-approval-required" <?php echo ( get_option( 'swg-auth-approval-required' ) === 'on' ) ? 'checked' : '' ?>>
  <?php
}
