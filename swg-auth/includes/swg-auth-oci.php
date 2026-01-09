<?php
/**
 * Oracle Database (OCI) Connection Functions
 *
 * @package SWG_Auth
 * @since 1.0.0
 */

// No Direct Access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Establish connection to Oracle database using OCI8 extension
 *
 * @since 1.0.0
 * @return resource|false OCI connection resource on success, false on failure
 */
function swg_auth_oci_connect() {
	// Don't even bother if the OCI8 extension isn't installed.
	// Check for all possible OCI8 extension names (oci8, oci8_12c, oci8_19)
	if ( ! extension_loaded( 'oci8' ) && ! extension_loaded( 'oci8_12c' ) && ! extension_loaded( 'oci8_19' ) ) {
		error_log( 'SWG Auth: OCI8 extension not loaded. Enable extension=oci8_19 or extension=oci8_12c in php.ini' );
		return false;
	}

	// Get connection parameters from WordPress options.
	$username = get_option( 'swg-auth-odb-username', 'swg' );
	$password = get_option( 'swg-auth-odb-password', 'swg' );
	$host     = get_option( 'swg-auth-odb-ip', 'localhost' );
	$port     = get_option( 'swg-auth-odb-port', '1521' );
	$sid      = get_option( 'swg-auth-odb-sid', 'swg' );

	// Build connection string.
	$connection_string = sprintf(
		'(DESCRIPTION =
			(ADDRESS_LIST =
				(ADDRESS =
					(PROTOCOL = TCP)
					(HOST = %s)
					(PORT = %s)
				)
			)
			(CONNECT_DATA =
				(SID = %s)
			)
		)',
		esc_attr( $host ),
		esc_attr( $port ),
		esc_attr( $sid )
	);

	// Attempt connection with error suppression for better error handling.
	$connection = @oci_connect( $username, $password, $connection_string );

	// Log error if connection failed.
	if ( ! $connection ) {
		$error = oci_error();
		if ( $error ) {
			error_log( 'SWG Auth OCI Connection Error: ' . $error['message'] );
		}
		return false;
	}

	// Return connection resource.
	return $connection;
}
