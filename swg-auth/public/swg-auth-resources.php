<?php

function swg_auth_resources_html() {
  ob_start();
  include( plugin_dir_path( __FILE__ ) . 'html/swg-auth-resources-html.php' );
  return ob_get_clean();
}

new swg_auth_virtual_page(
  array(
    'slug' => 'resources',
    'post_title' => 'Resources',
    'post_content' => swg_auth_resources_html(),
  )
);
