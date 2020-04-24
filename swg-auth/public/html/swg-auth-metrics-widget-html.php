<?php

$title = ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Server Status';
$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
echo $args[ 'before_widget' ];
if ( $title ) {
  echo $args['before_title'] . $title . $args['after_title'];
}

$data = get_option( 'swg-auth-metrics-data' );
$format = get_option( 'date_format' ) . ' ' . get_option( 'time_format' );

if ( ! isset ( $data[ 'clusterName' ] ) ):

?>

<p>No server has been detected. Please start up your server or check your SWG config.</p>

<?php elseif ( time() > $data[ 'timestamp' ] + $data [ 'webUpdateIntervalSeconds' ] + 2 ): ?>

<table class="swg-auth-metrics-widget">
  <tr>
    <td>Server:</td>
    <td><?php echo $data[ 'clusterName' ]; ?></td>
  </tr>
  <tr>
    <td>Status:</td>
    <td>Offline <div class="swg-auth-red-light"></div></td>
  </tr>
  <tr>
    <td>Offline Since:</td>
    <td><?php echo wp_date( $format, $data[ 'timestamp' ] ); ?></td>
  </tr>
  <tr>
    <td>Population:</td>
    <td>0</td>
  </tr>
</table>

<?php elseif ( $data[ 'lastLoadingStateTime' ] === 0 ): ?>

  <table class="swg-auth-metrics-widget">
    <tr>
      <td>Server:</td>
      <td><?php echo $data[ 'clusterName' ]; ?></td>
    </tr>
    <tr>
      <td>Status:</td>
      <td>Loading... <div class="led-yellow"></div></td>
    </tr>
    <tr>
      <td>Loading Since:</td>
      <td><?php echo wp_date( $format, $data[ 'timeClusterWentIntoLoadingState' ] ); ?></td>
    </tr>
    <tr>
      <td>Population:</td>
      <td>0</td>
    </tr>
  </table>

<?php elseif ( $data[ 'timeClusterWentIntoLoadingState' ] === 0 ): ?>

  <table class="swg-auth-metrics-widget">
    <tr>
      <td>Server:</td>
      <td><?php echo $data[ 'clusterName' ]; ?></td>
    </tr>
    <tr>
      <td>Status:</td>
      <td>Online <div class="led-green"></div></td>
    </tr>
    <tr>
      <td>Online Since:</td>
      <td><?php echo wp_date( $format, $data[ 'lastLoadingStateTime' ] ); ?></td>
    </tr>
    <tr>
      <td>Population:</td>
      <td><?php echo $data[ 'totalPlayerCount' ]; ?></td>
    </tr>
  </table>

<?php
endif;
echo $args[ 'after_widget' ];
