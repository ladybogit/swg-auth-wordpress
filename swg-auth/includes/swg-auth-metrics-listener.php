<?php

// No Direct Access
if ( ! defined( 'ABSPATH' ) ) {
  die;
}

// Check if metrics are being sent
if ( isset( $_GET['action'] ) && $_GET['action'] === 'swg-auth-metrics' ) {

  // Decode the metrics data
  $data = json_decode( file_get_contents( 'php://input' ), true );

  // Check the secret key
  if ( $data['secretKey'] !== get_option( 'swg-auth-centralserver-key', '' ) ) {
    // If it's incorrect, stop immediately
    die;
  }

  // Add our own timestamp so that we know when this data was received
  $data['timestamp'] = time();

  // Put the data into the database for later
  update_option( 'swg-auth-metrics-data', $data );

  // We're all done. We don't want WordPress to continue
  die;

}
