<?php

$connection = swg_auth_oci_connect();
$statement = oci_parse( $connection, "SELECT * FROM RESOURCE_TYPES WHERE RESOURCE_NAME NOT LIKE '@%' AND RESOURCE_CLASS NOT LIKE 'space%'" );
$results = oci_execute( $statement );

echo '<table class="swg-auth-resource-table">';
while ( $result = oci_fetch_array( $statement, OCI_ASSOC + OCI_RETURN_NULLS  ) ) {
  echo '<tr>';
    echo '<td>';
    echo '<img src="' . plugins_url() . '/swg-auth/public/img/resources/' . $resources[ $result[ 'RESOURCE_CLASS' ] ][ 'image' ] . '">';
    echo '</td>';
    echo '<td>';
    echo $result[ 'RESOURCE_NAME' ];
    echo '</td>';
    echo '<td>';
    echo end( $resources[ $result[ 'RESOURCE_CLASS' ] ][ 'classes' ] );
    echo '</td>';
  echo '</tr>';
}
echo '</table>';

oci_free_statement( $statement );
oci_close( $connection );
