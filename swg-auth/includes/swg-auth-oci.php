<?php
/**
 * Oracle Database (OCI8) Connection Functions
 *
 * @package SWG_Auth
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Check if OCI8 is available
 *
 * @return bool
 */
function swg_auth_has_oci8() {
    return extension_loaded('oci8') && function_exists('oci_connect');
}

/**
 * Establish Oracle connection
 *
 * @return resource|false
 */
function swg_auth_oci_connect() {

    if ( ! swg_auth_has_oci8() ) {
        error_log('SWG Auth: OCI8 extension not loaded or oci_connect missing');
        return false;
    }

    $username = get_option( 'swg-auth-odb-username', 'swg' );
    $password = get_option( 'swg-auth-odb-password', 'swg' );
    $host     = get_option( 'swg-auth-odb-ip', 'localhost' );
    $port     = get_option( 'swg-auth-odb-port', '1521' );
    $sid      = get_option( 'swg-auth-odb-sid', 'swg' );

    $conn_str = sprintf(
        '(DESCRIPTION=
            (ADDRESS=(PROTOCOL=TCP)(HOST=%s)(PORT=%s))
            (CONNECT_DATA=(SID=%s))
        )',
        $host,
        $port,
        $sid
    );

    $conn = @oci_connect($username, $password, $conn_str);

    if ( ! $conn ) {
        $e = oci_error();
        error_log('SWG Auth OCI error: ' . ($e['message'] ?? 'unknown'));
        return false;
    }

    return $conn;
}
