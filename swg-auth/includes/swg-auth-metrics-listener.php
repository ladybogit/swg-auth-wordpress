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

  // Have we set a new record for the highest population?
  $old_data = get_option( 'swg-auth-metrics-data' );
  if ( ! array_key_exists( 'highestPlayerCount', $old_data ) || $old_data['highestPlayerCount'] < $data['totalPlayerCount'] ) {
    // If so, save the data for our new record
    $data['highestPlayerCount'] = $data['totalPlayerCount'];
    $data['highestPlayerCountTimestamp'] = $data['timestamp'];
  } else {
    // If not, save the data from our most recent record
    $data['highestPlayerCount'] = $old_data['highestPlayerCount'];
    $data['highestPlayerCountTimestamp'] = $old_data['highestPlayerCountTimestamp'];
  }

  // Put the data into the database for later
  update_option( 'swg-auth-metrics-data', $data );

  // We're all done. We don't want WordPress to continue
  die;

}
