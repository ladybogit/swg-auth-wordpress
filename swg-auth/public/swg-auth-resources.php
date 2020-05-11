<?php

// No Direct Access
if ( ! defined( 'ABSPATH' ) ) {
  die;
}

// This function will produce an array of planet names referenced by the planet's OID
function swg_auth_get_planets_list() {
  // We'll want to turn machine-friendly strings into human-friendly strings
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
  // Ask Oracle for planet objects that are actually planets and not other things
  $connection = swg_auth_oci_connect();
  $statement = oci_parse( $connection, "SELECT * FROM PLANET_OBJECTS WHERE PLANET_NAME NOT LIKE 'space%' AND PLANET_NAME NOT LIKE 'adventure%' AND PLANET_NAME NOT LIKE 'dungeon%' AND PLANET_NAME NOT LIKE 'tutorial%'");
  $results = oci_execute( $statement );
  // Build an array such that a key (planet OID) contains a value (human-friendly string)
  $planets = array();
  while ( $result = oci_fetch_array( $statement, OCI_ASSOC ) ) {
    $planets[ $result['OBJECT_ID'] ] = $strings[ $result['PLANET_NAME'] ];
  }
  // Thanks Oracle! ttyl
  oci_free_statement( $statement );
  oci_close( $connection );
  // Return our array( OIDs => strings )
  return $planets;
}

// This function will return a list of planets on which a resource can be found
function swg_auth_get_resource_planets( $fractal_seeds ) {
  // Get an array of planet names by OID
  $planets_list = swg_auth_get_planets_list();
  // Separate the fractal seeds string from Oracle into planet/fractal pairs
  $fractal_pairs = explode( ':', $fractal_seeds, -1);
  $response = array();
  foreach ( $fractal_pairs as $pair ) {
    // Separate the planet OID from the fractal seed
    $buffer = explode( ' ', $pair );
    // Use the OID to get the planet's name
    $buffer = $planets_list[ $buffer[0] ];
    // Filter out Kashyyyk zones other than the main one
    if ( substr( $buffer, 0, 9 ) !== 'Kashyyyk ' ) {
      // Add the planet name to the list
      $response[] = $buffer;
    }
  }
  // Returns the list of planets as an array
  return $response;
}

// This function will parse a resource's attributes string and return it as an array
function swg_auth_parse_resource_attributes( $attributes, $shorthand = false ) {
  // Separate the attributes string into attribute/value pairs
  $attributes = explode( ':', $attributes, -1 );
  // We will want human-readable attributes, either initials or names
  if ( $shorthand === true ) {
    $strings = array(
      'res_cold_resist' => 'CR',
      'res_conductivity' => 'CD',
      'res_decay_resist' => 'DR',
      'res_heat_resist' => 'HR',
      'res_malleability' => 'MA',
      'res_shock_resistance' => 'SR',
      'res_toughness' => 'UT',
      'entangle_resistance' => 'ER',
      'res_potential_energy' => 'PE',
      'res_flavor' => 'PF',
      'res_quality' => 'OQ',
    );
  } else {
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
  }
  $attributes_list = array();
  foreach ( $attributes as $attribute ) {
    // Separate the attribute from its value
    $buffer = explode( ' ', $attribute );
    // Add the attribute to the list as name => value
    $attributes_list[ $strings[ $buffer[0] ] ] = $buffer[1];
  }
  // Return an array such that attribute name keys contain the attribute values
  return $attributes_list;
}

// If the user is on the resources page, enqueue the resources CSS
add_action( 'wp_enqueue_scripts', 'swg_auth_enqueue_resources_css' );
function swg_auth_enqueue_resources_css() {
  if ( is_page( 'resources' ) ) {
    wp_enqueue_style( 'swg-auth-resources', plugins_url( 'swg-auth/public/css/swg-auth-resources.css' ) );
  }
}

// This will build the resource page's contents
function swg_auth_resources_html() {
  // We're going to need the resource metadata
  $resources = require( 'swg-auth-resource-metadata.php' );
  // Using an output buffer makes the resources-html.php file a lot nicer to write
  ob_start();
  // Include the actual page contents
  include( plugin_dir_path( __FILE__ ) . 'html/swg-auth-resources-html.php' );
  // Return the output buffer
  return ob_get_clean();
}

// Create the resource page (but not if OCI8 isn't available)
if ( extension_loaded( 'OCI8' ) ) {
  new SWG_AUTH_VIRTUAL_PAGE(
    array(
      'slug' => 'resources',
      'post_title' => 'Resources',
      'post_content' => swg_auth_resources_html(),
    )
  );
}
