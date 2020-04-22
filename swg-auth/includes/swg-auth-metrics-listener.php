<?php

if ( isset( $_GET[ 'action' ] ) && $_GET[ 'action' ] === 'swg-auth-metrics' ) {
  $data = json_decode( file_get_contents( 'php://input' ), true );
  $data[ 'timestamp' ] = time();
  update_option( 'swg-auth-metrics-data', $data );
  die;
}
