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
  $result = oci_fetch_array( $statement, OCI_ASSOC + OCI_RETURN_NULLS );
?>

<div class="swg-auth-single-resource-page">
  <div class="swg-auth-resource-class-breadcrumbs">
    <?php
      foreach ( $resources[ $result[ 'RESOURCE_CLASS' ] ][ 'classes' ] as $class ) {
        echo $class . ' > ';
      }
      echo $result[ 'RESOURCE_NAME' ];
    ?>
  </div>
  <div class="swg-auth-resource-icon-and-name">
    <img src="<?php echo plugins_url(); ?>/swg-auth/public/img/resources/<?php echo $resources[ $result[ 'RESOURCE_CLASS' ] ][ 'image' ] ?>"><strong><?php echo $result[ 'RESOURCE_NAME' ]; ?></strong>
  </div>
  <div class="swg-auth-resource-deplete-time">
    <?php
      if ( $result[ 'DEPLETED_TIMESTAMP' ] > $clock[ 'LAST_SAVE_TIME' ] ) {
        $seconds_left = $result[ 'DEPLETED_TIMESTAMP' ] - $clock[ 'LAST_SAVE_TIME' ];
        $depletes_on = strtotime( $clock[ 'LAST_SAVE_TIMESTAMP' ] ) + $seconds_left;
        echo 'Depletes On: ' . wp_date( $format, $depletes_on );
      } elseif ( $result[ 'DEPLETED_TIMESTAMP' ] <= $clock[ 'LAST_SAVE_TIME' ] ) {
        $seconds_ago = $clock[ 'LAST_SAVE_TIME' ] - $result[ 'DEPLETED_TIMESTAMP' ];
        $depleted_on = strtotime( $clock[ 'LAST_SAVE_TIMESTAMP' ] ) - $seconds_ago;
        echo 'Depleted On: ' . wp_date( $format, $depleted_on );
      } else {
        echo 'Oops. Something went wrong with the depletion calculation...';
      }
    ?>
  </div>
  <div class="swg-auth-resource-attributes">
    <p>Attributes:</p>
    <table class="swg-auth-single-resource-attribute-table">
    <?php
      foreach ( swg_auth_parse_resource_attributes( $result[ 'ATTRIBUTES' ] ) as $attribute => $value ) {
        echo '<tr><td>' . $attribute . ':</td><td>' . $value . '</td></tr>';
      }
    ?>
    </table>
  </div>
  <div class="swg-auth-resource-planets">
    <p>Available On:</p>
    <table class="swg-auth-single-resource-attribute-table">
    <?php
      foreach ( swg_auth_parse_fractal_seeds( $result[ 'FRACTAL_SEEDS' ] ) as $planet ) {
        echo '<tr><td>' . $planet . '</td></tr>';
      }
    ?>
    </table>
  </div>
</div>

<?php
elseif ( isset( $_GET[ 'display' ] ) && $_GET[ 'display' ] === 'class' && isset( $_GET[ 'resource-class' ] ) ) :
  $class_string = end( $resources[ $_GET[ 'resource-class' ] ][ 'classes' ] );
  $class_position = array_keys( $resources[ $_GET[ 'resource-class' ] ][ 'classes' ], $class_string, true )[ 0 ];
  $search_string = '';
  foreach ($resources as $resource => $metadata) {
    if ( isset( $metadata[ 'classes' ][ $class_position ] ) && $metadata[ 'classes' ][ $class_position ] === $class_string ) {
      $search_string .= "RESOURCE_CLASS = '" . $resource . "' OR ";
    }
  }
  $search_string = substr( $search_string, 0, -4 );
  $statement = oci_parse( $connection, "SELECT * FROM RESOURCE_TYPES WHERE RESOURCE_NAME NOT LIKE '@%' AND RESOURCE_CLASS NOT LIKE 'space%' AND (" . $search_string . ")" );
  $results = oci_execute( $statement );
?>

<table class="swg-auth-resource-table">
<?php while ( $result = oci_fetch_array( $statement, OCI_ASSOC + OCI_RETURN_NULLS ) ) : ?>
  <tr>
    <td><img src="<?php echo plugins_url(); ?>/swg-auth/public/img/resources/<?php echo $resources[ $result[ 'RESOURCE_CLASS' ] ][ 'image' ] ?>"></td>
    <td><a href="<?php echo site_url(); ?>/?page_id=resources&display=single&resource-name=<?php echo $result[ 'RESOURCE_NAME' ]; ?>"><?php echo $result[ 'RESOURCE_NAME' ]; ?></a></td>
    <td><a href="<?php echo site_url(); ?>/?page_id=resources&display=class&resource-class=<?php echo $result[ 'RESOURCE_CLASS' ]; ?>"><?php echo end( $resources[ $result[ 'RESOURCE_CLASS' ] ][ 'classes' ] ); ?></a></td>
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

<?php else : ?>
Resources Home!
<?php endif; ?>

<?php

//oci_free_statement( $statement );
oci_close( $connection );
