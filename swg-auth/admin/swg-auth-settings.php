<?php

// No Direct Access
if ( ! defined( 'ABSPATH' ) ) {
  die;
}

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

  add_settings_section(
    'swg-auth-odb-settings',
    'Oracle Database Connection Settings',
    'swg_auth_odb_settings_html',
    'swg-auth-settings'
  );

  register_setting(
    'swg-auth-odb-settings',
    'swg-auth-odb-username',
    array(
      'type' => 'string',
      'description' => 'Oracle Username',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'swg'
    )
  );

  add_settings_field(
    'swg-auth-odb-username',
    'Oracle Username:',
    'swg_auth_odb_username_html',
    'swg-auth-settings',
    'swg-auth-odb-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-odb-settings',
    'swg-auth-odb-password',
    array(
      'type' => 'string',
      'description' => 'Oracle Password',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'swg'
    )
  );

  add_settings_field(
    'swg-auth-odb-password',
    'Oracle Password:',
    'swg_auth_odb_password_html',
    'swg-auth-settings',
    'swg-auth-odb-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-odb-settings',
    'swg-auth-odb-sid',
    array(
      'type' => 'string',
      'description' => 'Oracle SID',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'swg'
    )
  );

  add_settings_field(
    'swg-auth-odb-sid',
    'Oracle SID:',
    'swg_auth_odb_sid_html',
    'swg-auth-settings',
    'swg-auth-odb-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-odb-settings',
    'swg-auth-odb-ip',
    array(
      'type' => 'string',
      'description' => 'Oracle IP Address',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => 'localhost'
    )
  );

  add_settings_field(
    'swg-auth-odb-ip',
    'Oracle IP Address:',
    'swg_auth_odb_ip_html',
    'swg-auth-settings',
    'swg-auth-odb-settings',
    array(
      //'label_for' => '', // When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
      //'class' => '', // CSS Class to be added to the <tr> element when the field is output.
    )
  );

  register_setting(
    'swg-auth-odb-settings',
    'swg-auth-odb-port',
    array(
      'type' => 'string',
      'description' => 'Oracle Port',
      'sanitize_callback' => '', // TODO: A callback function that sanitizes the option's value.
      'show_in_rest' => false,
      'default' => '1521'
    )
  );

  add_settings_field(
    'swg-auth-odb-port',
    'Oracle Port:',
    'swg_auth_odb_port_html',
    'swg-auth-settings',
    'swg-auth-odb-settings',
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
  <input type="checkbox" name="swg-auth-approval-required" <?php echo ( get_option( 'swg-auth-approval-required' ) === 'on' ) ? 'checked' : ''; ?>>
  <?php
}

function swg_auth_odb_settings_html( $args ) {
  ?>
  <p>The PHP OCI8 extension is <strong><?php echo extension_loaded( 'OCI8' ) ? 'loaded' : 'NOT loaded'; ?></strong>.</p>
  <p>The connection to Oracle is <strong><?php echo swg_auth_oci_connect() ? 'working' : 'NOT working'; ?></strong>.</p>
  <?php
}

function swg_auth_odb_username_html( $args ) {
  ?>
  <input type="text" name="swg-auth-odb-username" value="<?php echo esc_attr( get_option( 'swg-auth-odb-username' ) ); ?>">
  <?php
}

function swg_auth_odb_password_html( $args ) {
  ?>
  <input type="text" name="swg-auth-odb-password" value="<?php echo esc_attr( get_option( 'swg-auth-odb-password' ) ); ?>">
  <?php
}

function swg_auth_odb_sid_html( $args ) {
  ?>
  <input type="text" name="swg-auth-odb-sid" value="<?php echo esc_attr( get_option( 'swg-auth-odb-sid' ) ); ?>">
  <?php
}

function swg_auth_odb_ip_html( $args ) {
  ?>
  <input type="text" name="swg-auth-odb-ip" value="<?php echo esc_attr( get_option( 'swg-auth-odb-ip' ) ); ?>">
  <?php
}

function swg_auth_odb_port_html( $args ) {
  ?>
  <input type="text" name="swg-auth-odb-port" value="<?php echo esc_attr( get_option( 'swg-auth-odb-port' ) ); ?>">
  <?php
}
