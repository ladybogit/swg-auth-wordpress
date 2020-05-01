<?php

add_action( 'wp_enqueue_scripts', 'swg_auth_enqueue_resource_table_css' );
function swg_auth_enqueue_resource_table_css() {
  if ( is_page( 'resources' ) ) {
    wp_enqueue_style( 'swg-auth-resource-table', plugins_url( 'swg-auth/public/css/swg-auth-resource-table.css' ) );
  }
}

function swg_auth_get_planets_list() {
  $strings = array(
    'corellia' => 'Corellia',
    'dantooine' => 'Dantooine',
    'dathomir' => 'Dathomir',
    'endor' => 'Endor',
    'lok' => 'Lok',
    'naboo' => 'Naboo',
    'rori' => 'Rori',
    'talus' => 'Talus',
    'tatooine' => 'Tatooine',
    'yavin4' => 'Yavin 4',
    'kashyyyk_dead_forest' => 'Kashyyyk Dead Forest',
    'kashyyyk_hunting' => 'Kashyyyk Hunting Grounds',
    'kashyyyk_main' => 'Kashyyyk',
    'kashyyyk_north_dungeons' => 'Kashyyyk North Dungeons',
    'kashyyyk_pob_dungeons' => 'Kashyyyk POB Dungeons',
    'kashyyyk_rryatt_trail' => 'Kashyyyk Rryatt Trail',
    'kashyyyk_south_dungeons' => 'Kashyyyk South Dungeons',
    'mustafar' => 'Mustafar',
  );
  $connection = swg_auth_oci_connect();
  $statement = oci_parse( $connection, "SELECT * FROM PLANET_OBJECTS WHERE PLANET_NAME NOT LIKE 'space%' AND PLANET_NAME NOT LIKE 'adventure%' AND PLANET_NAME NOT LIKE 'dungeon%' AND PLANET_NAME NOT LIKE 'tutorial%'");
  $results = oci_execute( $statement );
  $planets = array();
  while ( $result = oci_fetch_array( $statement, OCI_ASSOC ) ) {
    $planets[ $result[ 'OBJECT_ID' ] ] = $strings[ $result[ 'PLANET_NAME' ] ];
  }
  oci_free_statement( $statement );
  oci_close( $connection );
  return $planets;
}

function swg_auth_parse_fractal_seeds( $fractal_seeds ) {
  $planets_list = swg_auth_get_planets_list();
  $fractal_pairs = explode( ':', $fractal_seeds, -1);
  $response = array();
  foreach ( $fractal_pairs as $pair ) {
    $buffer = explode( ' ', $pair );
    $buffer = $planets_list[ $buffer[ 0 ] ];
    if ( substr( $buffer, 0, 9 ) !== 'Kashyyyk ' ) {
      $response[] = $buffer;
    }
  }
  return $response;
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
