<?php

add_action( 'wp_enqueue_scripts', 'swg_auth_enqueue_resource_table_css' );
function swg_auth_enqueue_resource_table_css() {
  if ( is_page( 'resources' ) ) {
    wp_enqueue_style( 'swg-auth-resource-table', plugins_url( 'swg-auth/public/css/swg-auth-resource-table.css' ) );
  }
}

function swg_auth_parse_resource_attributes( $attributes ) {
  $attributes = explode( ':', $attributes, -1 );
  $strings = array(
    'res_cold_resist' => 'Cold Resistance',
    'res_conductivity' => 'Conductivity',
    'res_decay_resist' => 'Decay Resistance',
    'res_heat_resist' => 'Heat Resistance',
    'res_malleability' => 'Malleability',
    'res_shock_resistance' => 'Shock Resistance',
    'res_toughness' => 'Unit Toughness',
    'entangle_resistance' => 'Entangle Resistance',
    'res_potential_energy' => 'Potential Energy',
    'res_flavor' => 'Potential Flavor',
    'res_quality' => 'Overall Quality',
  );
  $i = 0;
  foreach ( $attributes as $attribute ) {
    $buffer = explode( ' ', $attribute );
    $attributes[ $strings[ $buffer[ 0 ] ] ] = $buffer[ 1 ];
    unset( $attributes[ $i ] );
    $i++;
  }
  return $attributes;
}

function swg_auth_resources_html() {
  $resources = require( 'swg-auth-resource-metadata.php' );
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
