<?php
/**
 * SWG Auth Resources Page Functions
 *
 * Handles resources data retrieval from Oracle database and page generation.
 *
 * @package SWG_Auth
 * @since 1.0.0
 */

// No Direct Access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Get list of planets from Oracle database
 *
 * Retrieves planet objects from the database and returns them as an array
 * keyed by planet object ID with human-friendly names as values.
 *
 * @since 1.0.0
 * @return array Array of planets where keys are OIDs and values are planet names.
 */
function swg_auth_get_planets_list() {
	// Human-friendly planet names mapping.
	$strings = array(
		'corellia'                  => 'Corellia',
		'dantooine'                 => 'Dantooine',
		'dathomir'                  => 'Dathomir',
		'endor'                     => 'Endor',
		'lok'                       => 'Lok',
		'naboo'                     => 'Naboo',
		'rori'                      => 'Rori',
		'talus'                     => 'Talus',
		'tatooine'                  => 'Tatooine',
		'yavin4'                    => 'Yavin 4',
		'kashyyyk_dead_forest'      => 'Kashyyyk Dead Forest',
		'kashyyyk_hunting'          => 'Kashyyyk Hunting Grounds',
		'kashyyyk_main'             => 'Kashyyyk',
		'kashyyyk_north_dungeons'   => 'Kashyyyk North Dungeons',
		'kashyyyk_pob_dungeons'     => 'Kashyyyk POB Dungeons',
		'kashyyyk_rryatt_trail'     => 'Kashyyyk Rryatt Trail',
		'kashyyyk_south_dungeons'   => 'Kashyyyk South Dungeons',
		'mustafar'                  => 'Mustafar',
	);

	// Connect to Oracle database.
	$connection = swg_auth_oci_connect();
	if ( ! $connection ) {
		error_log( 'SWG Auth: Failed to connect to Oracle database in swg_auth_get_planets_list()' );
		return array();
	}

	// Query for planet objects (excluding special zones).
	$query     = "SELECT * FROM PLANET_OBJECTS WHERE PLANET_NAME NOT LIKE 'space%' AND PLANET_NAME NOT LIKE 'adventure%' AND PLANET_NAME NOT LIKE 'dungeon%' AND PLANET_NAME NOT LIKE 'tutorial%'";
	$statement = oci_parse( $connection, $query );

	if ( ! $statement ) {
		$error = oci_error( $connection );
		error_log( 'SWG Auth: OCI parse error in swg_auth_get_planets_list(): ' . $error['message'] );
		oci_close( $connection );
		return array();
	}

	$result = oci_execute( $statement );
	if ( ! $result ) {
		$error = oci_error( $statement );
		error_log( 'SWG Auth: OCI execute error in swg_auth_get_planets_list(): ' . $error['message'] );
		oci_free_statement( $statement );
		oci_close( $connection );
		return array();
	}

	// Build planet array keyed by OID.
	$planets = array();
	while ( $row = oci_fetch_array( $statement, OCI_ASSOC ) ) {
		if ( isset( $row['OBJECT_ID'], $row['PLANET_NAME'] ) && isset( $strings[ $row['PLANET_NAME'] ] ) ) {
			$planets[ $row['OBJECT_ID'] ] = $strings[ $row['PLANET_NAME'] ];
		}
	}

	// Clean up Oracle resources.
	oci_free_statement( $statement );
	oci_close( $connection );

	return $planets;
}

/**
 * Get list of planets where a resource can be found
 *
 * Parses fractal seeds string and returns array of planet names.
 *
 * @since 1.0.0
 * @param string $fractal_seeds Fractal seeds string from database.
 * @return array Array of planet names where resource is available.
 */
function swg_auth_get_resource_planets( $fractal_seeds ) {
	// Get planet names array keyed by OID.
	$planets_list = swg_auth_get_planets_list();

	// Separate the fractal seeds string from Oracle into planet/fractal pairs.
	$fractal_pairs = explode( ':', $fractal_seeds, -1 );
	$response      = array();

	foreach ( $fractal_pairs as $pair ) {
		// Separate the planet OID from the fractal seed.
		$buffer = explode( ' ', $pair );

		// Validate we have required data.
		if ( ! isset( $buffer[0] ) || ! isset( $planets_list[ $buffer[0] ] ) ) {
			continue;
		}

		// Use the OID to get the planet's name.
		$planet_name = $planets_list[ $buffer[0] ];

		// Filter out Kashyyyk zones other than the main one.
		if ( 0 !== strpos( $planet_name, 'Kashyyyk ' ) ) {
			// Add the planet name to the list.
			$response[] = $planet_name;
		}
	}

	// Return the list of planets as an array.
	return $response;
}

/**
 * Parse resource attributes string and return as array
 *
 * Converts Oracle attributes string to associative array with
 * human-readable attribute names.
 *
 * @since 1.0.0
 * @param string $attributes Attributes string from database.
 * @param bool   $shorthand  Whether to use shorthand names (default: false).
 * @return array Array of attributes where keys are names and values are numbers.
 */
function swg_auth_parse_resource_attributes( $attributes, $shorthand = false ) {
	// Separate the attributes string into attribute/value pairs.
	$attributes = explode( ':', $attributes, -1 );

	// Define human-readable attribute names.
	if ( true === $shorthand ) {
		$strings = array(
			'res_cold_resist'      => 'CR',
			'res_conductivity'     => 'CD',
			'res_decay_resist'     => 'DR',
			'res_heat_resist'      => 'HR',
			'res_malleability'     => 'MA',
			'res_shock_resistance' => 'SR',
			'res_toughness'        => 'UT',
			'entangle_resistance'  => 'ER',
			'res_potential_energy' => 'PE',
			'res_flavor'           => 'PF',
			'res_quality'          => 'OQ',
		);
	} else {
		$strings = array(
			'res_cold_resist'      => 'Cold Resistance',
			'res_conductivity'     => 'Conductivity',
			'res_decay_resist'     => 'Decay Resistance',
			'res_heat_resist'      => 'Heat Resistance',
			'res_malleability'     => 'Malleability',
			'res_shock_resistance' => 'Shock Resistance',
			'res_toughness'        => 'Unit Toughness',
			'entangle_resistance'  => 'Entangle Resistance',
			'res_potential_energy' => 'Potential Energy',
			'res_flavor'           => 'Potential Flavor',
			'res_quality'          => 'Overall Quality',
		);
	}

	$attributes_list = array();
	foreach ( $attributes as $attribute ) {
		// Separate the attribute from its value.
		$buffer = explode( ' ', $attribute );

		// Validate we have both attribute name and value.
		if ( ! isset( $buffer[0], $buffer[1] ) || ! isset( $strings[ $buffer[0] ] ) ) {
			continue;
		}

		// Add the attribute to the list as name => value.
		$attributes_list[ $strings[ $buffer[0] ] ] = intval( $buffer[1] );
	}

	// Return array with attribute name keys containing attribute values.
	return $attributes_list;
}

/**
 * Enqueue resources page CSS
 *
 * @since 1.0.0
 */
add_action( 'wp_enqueue_scripts', 'swg_auth_enqueue_resources_css' );
function swg_auth_enqueue_resources_css() {
	if ( is_page( 'resources' ) ) {
		wp_enqueue_style(
			'swg-auth-resources',
			plugin_dir_url( __FILE__ ) . 'css/swg-auth-resources.css',
			array(),
			'1.0.0'
		);
	}
}

/**
 * Build the resources page HTML content
 *
 * @since 1.0.0
 * @return string HTML content for resources page.
 */
function swg_auth_resources_html() {
	// Get resource metadata.
	$resources = require plugin_dir_path( __FILE__ ) . 'swg-auth-resource-metadata.php';

	// Use output buffer for cleaner HTML template.
	ob_start();

	// Include the actual page contents.
	include plugin_dir_path( __FILE__ ) . 'html/swg-auth-resources-html.php';

	// Return the buffered output.
	return ob_get_clean();
}

// Create the virtual resources page (only if OCI8 is available).
if ( extension_loaded( 'OCI8' ) ) {
	new SWG_AUTH_VIRTUAL_PAGE(
		array(
			'slug'         => 'resources',
			'post_title'   => 'Resources',
			'post_content' => swg_auth_resources_html(),
		)
	);
}
