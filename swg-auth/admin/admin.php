<?php

// Add Menu Pages
add_action('admin_menu', 'swg_auth_admin_menus');
function swg_auth_admin_menus(){
  add_menu_page(
    'SWG Auth',
    'SWG Auth',
    'administrator',
    'swg-auth-settings',
    'swg_auth_settings_html',
    '', //Icon URL
    3
  );
  add_submenu_page(
    'swg-auth-settings',
    'SWG Auth Settings',
    'Settings',
    'administrator',
    'swg-auth-settings',
    'swg_auth_settings_html',
    1
  );
  add_submenu_page(
    'swg-auth-settings',
    'Server Config',
    'Server Config',
    'administrator',
    'swg-auth-server-config',
    'swg_auth_server_config_html',
    10
  );
}
function swg_auth_settings_html(){
  if(!current_user_can('manage_options')){
    return;
  }
  include(plugin_dir_path(__FILE__) . 'swg-auth-settings-html.php');
}
function swg_auth_server_config_html(){
  if(!current_user_can('manage_options')){
    return;
  }
  include(plugin_dir_path(__FILE__) . 'swg-auth-server-config-html.php');
}

// Add settings
add_action('admin_init', 'swg_auth_settings');
function swg_auth_settings(){
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
function swg_auth_general_settings_html($args){
  echo '';
}
function swg_auth_approval_required_html($args){
  ?><input type="checkbox" name="swg-auth-approval-required" <?php echo (get_option('swg-auth-approval-required') == 'on') ? 'checked' : '' ?>><?php
}

// Add user settings
add_action('edit_user_profile', 'swg_auth_user_settings');
function swg_auth_user_settings($user){
  include(plugin_dir_path(__FILE__) . 'swg-auth-user-settings-html.php');
}
add_action('edit_user_profile_update', 'swg_auth_approved_update');
function swg_auth_approved_update($user_id){
  if(!current_user_can('edit_user', $user_id)){
    return false;
  }
  return update_user_meta($user_id, 'swg-auth-approved', $_POST['swg-auth-approved']);
}
add_action('edit_user_profile_update', 'swg_auth_banned_update');
function swg_auth_banned_update($user_id){
  if(!current_user_can('edit_user', $user_id)){
    return false;
  }
  return update_user_meta($user_id, 'swg-auth-banned', $_POST['swg-auth-banned']);
}
