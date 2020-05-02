<?php

$connection = swg_auth_oci_connect();
$statement = oci_parse( $connection, "SELECT * FROM CLOCK" );
$results = oci_execute( $statement );
$clock = oci_fetch_array( $statement );
oci_free_statement( $statement );

$format = get_option( 'date_format' );

if ( isset( $_GET[ 'display' ] ) && $_GET [ 'display' ] === 'single' && isset( $_GET[ 'resource-name' ] ) ) :
  $statement = oci_parse( $connection, "SELECT * FROM RESOURCE_TYPES WHERE RESOURCE_NAME = '" . $_GET[ 'resource-name' ] . "'");
  $results = oci_execute( $statement );
  $result = oci_fetch_array( $statement, OCI_ASSOC + OCI_RETURN_NULLS )
?>

<img src="<?php echo plugins_url(); ?>/swg-auth/public/img/resources/<?php echo $resources[ $result[ 'RESOURCE_CLASS' ] ][ 'image' ] ?>">
<?php echo $result[ 'RESOURCE_NAME' ]; ?>
<?php echo end( $resources[ $result[ 'RESOURCE_CLASS' ] ][ 'classes' ] ); ?>
<?php
  foreach ( swg_auth_parse_resource_attributes( $result[ 'ATTRIBUTES' ] ) as $attribute => $value ) {
    echo $attribute . ': ' . $value . '<br />';
  }
?>
<?php
  foreach ( swg_auth_parse_fractal_seeds( $result[ 'FRACTAL_SEEDS' ] ) as $planet ) {
    echo $planet . '<br />';
  }
?>

<?php else :
  $statement = oci_parse( $connection, "SELECT * FROM RESOURCE_TYPES WHERE RESOURCE_NAME NOT LIKE '@%' AND RESOURCE_CLASS NOT LIKE 'space%'" );
  $results = oci_execute( $statement );
?>

<table class="swg-auth-resource-table">
<?php while ( $result = oci_fetch_array( $statement, OCI_ASSOC + OCI_RETURN_NULLS ) ) : ?>
  <tr>
    <td><img src="<?php echo plugins_url(); ?>/swg-auth/public/img/resources/<?php echo $resources[ $result[ 'RESOURCE_CLASS' ] ][ 'image' ] ?>"></td>
    <td><?php echo $result[ 'RESOURCE_NAME' ]; ?></td>
    <td><?php echo end( $resources[ $result[ 'RESOURCE_CLASS' ] ][ 'classes' ] ); ?></td>
    <td>
      <?php
        foreach ( swg_auth_parse_resource_attributes( $result[ 'ATTRIBUTES' ] ) as $attribute => $value ) {
          echo $attribute . ': ' . $value . '<br />';
        }
      ?>
    </td>
    <td>
      Available on:<br>
      <?php
        foreach ( swg_auth_parse_fractal_seeds( $result[ 'FRACTAL_SEEDS' ] ) as $planet ) {
          echo $planet . '<br />';
        }
      ?>
    </td>
    <td>
    <?php
    if ( $result[ 'DEPLETED_TIMESTAMP' ] > $clock[ 'LAST_SAVE_TIME' ] ) {
      $seconds_left = $result[ 'DEPLETED_TIMESTAMP' ] - $clock[ 'LAST_SAVE_TIME' ];
      $depletes_on = strtotime( $clock[ 'LAST_SAVE_TIMESTAMP' ] ) + $seconds_left;
      echo 'Depletes On: ' . wp_date( $format, $depletes_on );
    }
    ?>
    </td>
  </tr>
<?php endwhile; ?>
</table>

<?php endif; ?>

<?php

oci_free_statement( $statement );
oci_close( $connection );
