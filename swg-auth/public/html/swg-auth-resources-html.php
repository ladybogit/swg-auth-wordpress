<?php

$connection = swg_auth_oci_connect();
$statement = oci_parse( $connection, "SELECT * FROM RESOURCE_TYPES WHERE RESOURCE_NAME NOT LIKE '@%'" );
$results = oci_execute( $statement );

echo '<table class="swg-auth-resource-table">';
while ( $result = oci_fetch_array( $statement, OCI_ASSOC + OCI_RETURN_NULLS  ) ) {
  echo '<tr>';
    echo '<td>';
    echo $result[ 'RESOURCE_NAME' ];
    echo '</td>';
    echo '<td>';
    echo $result[ 'RESOURCE_CLASS' ];
    echo '</td>';
  echo '</tr>';
}
echo '</table>';

oci_free_statement( $statement );
oci_close( $connection );
