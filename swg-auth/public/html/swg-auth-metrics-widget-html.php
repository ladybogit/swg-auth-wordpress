<?php

$title = ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Server Status';
$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
echo $args[ 'before_widget' ];
echo $args['before_title'] . $title . $args['after_title'];

$data = get_option( 'swg-auth-metrics-data' );
$format = get_option( 'date_format' ) . ' ' . get_option( 'time_format' );

if ( ! isset ( $data[ 'clusterName' ] ) ):

?>

<p>No server has been detected. Please start up your server or check your SWG config.</p>

<?php elseif ( time() > $data[ 'timestamp' ] + 2 ): ?>

<p>Server: <?php echo $data[ 'clusterName' ]; ?><br>
Status: Offline<br>
Offline Since: <?php echo wp_date( $format, $data[ 'timestamp' ] ); ?></p>

<?php elseif ( $data[ 'lastLoadingStateTime' ] === 0 ): ?>

<p>Server: <?php echo $data[ 'clusterName' ]; ?><br>
Status: Loading...<br>
Loading Since: <?php echo wp_date( $format, $data[ 'timeClusterWentIntoLoadingState' ] ); ?></p>

<?php elseif ( $data[ 'timeClusterWentIntoLoadingState' ] === 0 ): ?>

<p>Server: <?php echo $data[ 'clusterName' ]; ?><br>
Status: Online<br>
Online Since: <?php echo wp_date( $format, $data[ 'lastLoadingStateTime' ] ); ?><br>
Population: <?php echo $data[ 'totalPlayerCount' ]; ?></p>

<?php
endif;
echo $args[ 'after_widget' ];
