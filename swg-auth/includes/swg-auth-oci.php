<?php

function swg_auth_oci_connect() {
  if ( ! extension_loaded( 'OCI8' ) ) {
    return false;
  }
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
  return $connection;
}
