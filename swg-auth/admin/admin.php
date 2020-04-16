<?php

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
  include(plugin_dir_path(__FILE__) . 'swg-auth-settings-html.php');
}
function swg_auth_server_config_html(){
  include(plugin_dir_path(__FILE__) . 'swg-auth-server-config-html.php');
}
