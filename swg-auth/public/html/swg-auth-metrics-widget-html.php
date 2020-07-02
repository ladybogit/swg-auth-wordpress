<?php

// No Direct Access
if ( ! defined( 'ABSPATH' ) ) {
  die;
}

// Get the widget title or use a default one
$title = ! empty( $instance['title'] ) ? $instance['title'] : 'Server Status';
// Filter the widget title for some reason
$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

// This comes before a widget
echo $args['before_widget'];

// If there is a title (which there certainly is), display it now please
if ( $title ) {
  echo $args['before_title'] . $title . $args['after_title'];
}

// Find out if we're supposed to hide the lights
$hide_lights = isset( $instance['hide_lights'] ) ? $instance['hide_lights'] : false;

// Find out if we're supposed to show the highest population
$show_highest_population = isset( $instance['show_highest_population'] ) ? $instance['show_highest_population'] : false;

// Get the latest metrics data from the database
$data = get_option( 'swg-auth-metrics-data' );

// If we want to show the highest population, the code for that can exist in a function
if ( $show_highest_population ) {
  function swg_auth_show_highest_population( $data, $format ) {
    ?>
    <tr>
      <td>Highest Population:</td>
      <td><?php echo array_key_exists( 'highestPlayerCount', $data ) ? $data['highestPlayerCount'] : 'No Population Found'; ?></td>
    </tr>
    <tr>
      <td>Record Set On:</td>
      <td><?php echo array_key_exists( 'highestPlayerCountTimestamp', $data ) ? wp_date( $format, $data['highestPlayerCountTimestamp'] ) : 'No Timestamp Found'; ?></td>
    </tr>
    <?php
  }
}

// Get the WordPress date and time format
$format = get_option( 'date_format' ) . ' ' . get_option( 'time_format' );

// If no metrics data exists, just stop here and output an error message
if ( ! isset ( $data['clusterName'] ) ):

?>

<p>No server has been detected. Please start up your server or check your SWG config.</p>

<?php
  // The server is offline if the metrics data is too old
  elseif ( time() > $data['timestamp'] + $data['webUpdateIntervalSeconds'] + 2 ):
?>

<table class="swg-auth-metrics-widget">
  <tr>
    <td>Server:</td>
    <td><?php echo $data['clusterName']; ?></td>
  </tr>
  <tr>
    <td>Status:</td>
    <td>Offline<?php echo ( $hide_lights ) ? '' : ' <div class="swg-auth-red-light"></div>'; ?></td>
  </tr>
  <tr>
    <td>Offline Since:</td>
    <td><?php echo wp_date( $format, $data['timestamp'] ); ?></td>
  </tr>
  <tr>
    <td>Population:</td>
    <td>0</td>
  </tr>
  <?php if ( $show_highest_population ) { swg_auth_show_highest_population( $data, $format ); } ?>
</table>

<?php
  // The server is still loading if the last time it was loading is 0
  elseif ( $data['lastLoadingStateTime'] === 0 ):
?>

  <table class="swg-auth-metrics-widget">
    <tr>
      <td>Server:</td>
      <td><?php echo $data['clusterName']; ?></td>
    </tr>
    <tr>
      <td>Status:</td>
      <td>Loading...<?php echo ( $hide_lights ) ? '' : ' <div class="swg-auth-yellow-light"></div>'; ?></td>
    </tr>
    <tr>
      <td>Loading Since:</td>
      <td><?php echo wp_date( $format, $data['timeClusterWentIntoLoadingState'] ); ?></td>
    </tr>
    <tr>
      <td>Population:</td>
      <td>0</td>
    </tr>
    <?php if ( $show_highest_population ) { swg_auth_show_highest_population( $data, $format ); } ?>
  </table>

<?php
  // The server is online if the time it began loading is 0
  elseif ( $data['timeClusterWentIntoLoadingState'] === 0 ):
?>

  <table class="swg-auth-metrics-widget">
    <tr>
      <td>Server:</td>
      <td><?php echo $data['clusterName']; ?></td>
    </tr>
    <tr>
      <td>Status:</td>
      <td>Online<?php echo ( $hide_lights ) ? '' : ' <div class="swg-auth-green-light"></div>'; ?></td>
    </tr>
    <tr>
      <td>Online Since:</td>
      <td><?php echo wp_date( $format, $data['lastLoadingStateTime'] ); ?></td>
    </tr>
    <tr>
      <td>Population:</td>
      <td><?php echo $data['totalPlayerCount']; ?></td>
    </tr>
    <?php if ( $show_highest_population ) { swg_auth_show_highest_population( $data, $format ); } ?>
  </table>

<?php
endif;

// This comes after a widget
echo $args['after_widget'];
