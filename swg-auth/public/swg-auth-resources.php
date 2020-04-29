<?php

add_action( 'wp_enqueue_scripts', 'swg_auth_enqueue_resource_table_css' );
function swg_auth_enqueue_resource_table_css() {
  if ( is_page( 'resources' ) ) {
    wp_enqueue_style( 'swg-auth-resource-table', plugins_url( 'swg-auth/public/css/swg-auth-resource-table.css' ) );
  }
}

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
