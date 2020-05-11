<?php

// No Direct Access
if ( ! defined( 'ABSPATH' ) ) {
  die;
}

function swg_auth_oci_connect() {
  // Dont even bother if the OCI8 extension isn't installed
  if ( ! extension_loaded( 'OCI8' ) ) {
    return false;
  }

  // Make our connection using values saved in the WordPress database (or these defaults)
  $connection = oci_connect(
    get_option( 'swg-auth-odb-username', 'swg' ),
    get_option( 'swg-auth-odb-password', 'swg' ),
    '(DESCRIPTION =
      (ADDRESS_LIST =
        (ADDRESS =
          (PROTOCOL = TCP)
          (HOST = ' . get_option( 'swg-auth-odb-ip', 'localhost' ) . ')
          (PORT = ' . get_option( 'swg-auth-odb-port', '1521' ) . ')
        )
      )
      (CONNECT_DATA =
        (SID = ' . get_option( 'swg-auth-odb-sid', 'swg' ) . ')
      )
    )'
  );

  // Send back our connection resource
  return $connection;
}
