<?php

add_action('admin_menu', 'swg_auth_menu');
function swg_auth_menu(){
  add_menu_page(
    'SWG Auth',
    'SWG Auth',
    'administrator',
    'swg-auth-menu',
    'swg_auth_menu_html',
    '',
    3
  );
}
function swg_auth_menu_html(){
  include(plugin_dir_path(__FILE__) . 'swg-auth-menu-html.php');
}
