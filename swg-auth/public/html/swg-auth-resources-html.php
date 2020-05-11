<?php

// No Direct Access
if ( ! defined( 'ABSPATH' ) ) {
  die;
}

// Connect to Oracle
$connection = swg_auth_oci_connect();

// Get SWG Server's clock
$statement = oci_parse( $connection, "SELECT * FROM CLOCK" );
$results = oci_execute( $statement );
$clock = oci_fetch_array( $statement );
oci_free_statement( $statement );

// Get the WordPress date format
$format = get_option( 'date_format' );

// If the user wants to view a single resource, ask Oracle for just that resource
if ( isset( $_GET['display'] ) && $_GET ['display'] === 'single' && isset( $_GET['resource-name'] ) ) :
  $statement = oci_parse( $connection, "SELECT * FROM RESOURCE_TYPES WHERE RESOURCE_NAME = '" . $_GET['resource-name'] . "'");
  $results = oci_execute( $statement );
  $result = oci_fetch_array( $statement, OCI_ASSOC + OCI_RETURN_NULLS );
?>

<div class="swg-auth-single-resource-page">
  <div class="swg-auth-resource-class-breadcrumbs">
    <?php
      foreach ( $resources[ $result['RESOURCE_CLASS'] ]['classes'] as $class ) {
        $slug = '';
        foreach ( $resources as $resource => $metadata ) {
          if ( end( $metadata['classes'] ) === $class ) {
            $slug = $resource;
            break;
          }
        }
        echo '<a href="' . site_url() . '/?page_id=resources&display=class&resource-class=' . $slug . '">' . $class . '</a> > ';
      }
      echo '<a href="' . site_url() . '/?page_id=resources&display=single&resource-name=' . $result['RESOURCE_NAME'] . '">' . $result['RESOURCE_NAME'] . '</a>';
    ?>
  </div>
  <div class="swg-auth-resource-icon-and-name">
    <img src="<?php echo plugins_url(); ?>/swg-auth/public/img/resources/<?php echo $resources[ $result['RESOURCE_CLASS'] ]['image'] ?>"><span class="swg-auth-resource-name"><a href="<?php echo site_url() . '/?page_id=resources&display=single&resource-name=' . $result['RESOURCE_NAME']; ?>"><?php echo $result['RESOURCE_NAME']; ?></a></span>
  </div>
  <div class="swg-auth-resource-deplete-time">
    <?php
      if ( $result['DEPLETED_TIMESTAMP'] > $clock['LAST_SAVE_TIME'] ) {
        $seconds_left = $result['DEPLETED_TIMESTAMP'] - $clock['LAST_SAVE_TIME'];
        $depletes_on = strtotime( $clock['LAST_SAVE_TIMESTAMP'] ) + $seconds_left;
        echo 'Depletes On: ' . wp_date( $format, $depletes_on );
      } elseif ( $result['DEPLETED_TIMESTAMP'] <= $clock['LAST_SAVE_TIME'] ) {
        $seconds_ago = $clock['LAST_SAVE_TIME'] - $result['DEPLETED_TIMESTAMP'];
        $depleted_on = strtotime( $clock['LAST_SAVE_TIMESTAMP'] ) - $seconds_ago;
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
      foreach ( swg_auth_parse_resource_attributes( $result['ATTRIBUTES'] ) as $attribute => $value ) {
        echo '<tr><td>' . $attribute . ':</td><td>' . $value . '</td></tr>';
      }
    ?>
    </table>
  </div>
  <div class="swg-auth-resource-planets">
    <p>Available On:</p>
    <table class="swg-auth-single-resource-attribute-table">
    <?php
      foreach ( swg_auth_get_resource_planets( $result['FRACTAL_SEEDS'] ) as $planet ) {
        echo '<tr><td>' . $planet . '</td></tr>';
      }
    ?>
    </table>
  </div>
</div>

<?php
// If the user wants to view a resource class...
elseif ( isset( $_GET['display'] ) && $_GET['display'] === 'class' && isset( $_GET['resource-class'] ) ) :
  // Get the readable name of the class
  $class_string = end( $resources[ $_GET['resource-class'] ]['classes'] );
  // Find out which tier this class is in
  $class_position = array_keys( $resources[ $_GET['resource-class'] ]['classes'], $class_string, true )[0];
  // Search the resource metadata for final tier subclasses that are included in this class and add them to a SQL clause
  $search_string = '';
  foreach ($resources as $resource => $metadata) {
    if ( isset( $metadata['classes'][ $class_position ] ) && $metadata['classes'][ $class_position ] === $class_string ) {
      $search_string .= "RESOURCE_CLASS = '" . $resource . "' OR ";
    }
  }
  // Trim off the last " OR " from a couple of lines ago
  $search_string = substr( $search_string, 0, -4 );
  // Ask Oracle for all the resources included in the class for which we're searching
  $statement = oci_parse( $connection, "SELECT * FROM RESOURCE_TYPES WHERE RESOURCE_NAME NOT LIKE '@%' AND RESOURCE_CLASS NOT LIKE 'space%' AND (" . $search_string . ")" );
  $results = oci_execute( $statement );
?>
<div class="swg-auth-resource-class-breadcrumbs">
  <?php
    $breadcrumb_string = '';
    foreach ( $resources[ $_GET['resource-class'] ]['classes'] as $class ) {
      $slug = '';
      foreach ( $resources as $resource => $metadata ) {
        if ( end( $metadata['classes'] ) === $class ) {
          $slug = $resource;
          break;
        }
      }
      $breadcrumb_string .= '<a href="' . site_url() . '/?page_id=resources&display=class&resource-class=' . $slug . '">' . $class . '</a> > ';
    }
    echo substr( $breadcrumb_string, 0, -3 );
  ?>
</div>
<table class="swg-auth-resource-page">
<?php while ( $result = oci_fetch_array( $statement, OCI_ASSOC + OCI_RETURN_NULLS ) ) : ?>
  <tr>
    <td>
      <img src="<?php echo plugins_url(); ?>/swg-auth/public/img/resources/<?php echo $resources[ $result['RESOURCE_CLASS'] ]['image'] ?>">
    </td>
    <td>
      <a href="<?php echo site_url(); ?>/?page_id=resources&display=single&resource-name=<?php echo $result['RESOURCE_NAME']; ?>"><?php echo $result['RESOURCE_NAME']; ?></a>
      <a href="<?php echo site_url(); ?>/?page_id=resources&display=class&resource-class=<?php echo $result['RESOURCE_CLASS']; ?>"><?php echo end( $resources[ $result['RESOURCE_CLASS'] ]['classes'] ); ?></a>
    </td>
    <td>
      <table class="swg-auth-resource-attribute-table">
        <tr>
        <?php
          foreach ( swg_auth_parse_resource_attributes( $result['ATTRIBUTES'], true ) as $attribute => $value ) {
            echo '<td>' . $attribute . '<br />' . $value . '</td>';
          }
        ?>
        </tr>
      </table>
    </td>
    <td>
      <?php
      if ( $result['DEPLETED_TIMESTAMP'] > $clock['LAST_SAVE_TIME'] ) {
        $seconds_left = $result['DEPLETED_TIMESTAMP'] - $clock['LAST_SAVE_TIME'];
        $depletes_on = strtotime( $clock['LAST_SAVE_TIMESTAMP'] ) + $seconds_left;
        echo 'Depletes On<br />' . wp_date( $format, $depletes_on );
      } elseif ( $result['DEPLETED_TIMESTAMP'] <= $clock['LAST_SAVE_TIME'] ) {
        $seconds_ago = $clock['LAST_SAVE_TIME'] - $result['DEPLETED_TIMESTAMP'];
        $depleted_on = strtotime( $clock['LAST_SAVE_TIMESTAMP'] ) - $seconds_ago;
        echo 'Depleted On<br />' . wp_date( $format, $depleted_on );
      } else {
        echo 'Uh-Oh...';
      }
      ?>
    </td>
  </tr>
<?php endwhile; ?>
</table>

<?php else : ?>

<p>Select a resource class to get started:</p>
<form method="GET" action="<?php echo site_url(); ?>">
<input type="hidden" name="page_id" value="resources" /><input type="hidden" name="display" value="class" /><select name="resource-class">
<option value="aluminum">Aluminum</option>
<option value="gemstone_armophous">Amorphous Gemstone</option>
<option value="bone_avian">Avian Bone</option>
<option value="meat_avian">Avian Meat</option>
<option value="vegetable_beans">Beans</option>
<option value="fruit_berries">Berries</option>
<option value="bone">Bone</option>
<option value="hide_bristley">Bristley Hide</option>
<option value="ore_carbonate">Carbonate Ore</option>
<option value="meat_carnivore">Carnivore Meat</option>
<option value="cereal">Cereal</option>
<option value="chemical">Chemical</option>
<option value="copper">Copper</option>
<option value="corn">Corn</option>
<option value="creature_food">Creature Food</option>
<option value="creature_resources">Creature Resources</option>
<option value="creature_structural">Creature Structural</option>
<option value="seafood_crustacean">Crustacean</option>
<option value="gemstone_crystalline">Crystalline Gemstone</option>
<option value="corn_domesticated">Domesticated Corn</option>
<option value="meat_domesticated">Domesticated Meat</option>
<option value="milk_domesticated">Domesticated Milk</option>
<option value="oats_domesticated">Domesticated Oats</option>
<option value="rice_domesticated">Domesticated Rice</option>
<option value="wheat_domesticated">Domesticated Wheat</option>
<option value="meat_egg">Egg Meat</option>
<option value="energy">Energy</option>
<option value="softwood_evergreen">Evergreen Soft Wood</option>
<option value="ore_extrusive">Extrusive Ore</option>
<option value="metal_ferrous">Ferrous Metal</option>
<option value="fiberplast">Fiberplast</option>
<option value="seafood_fish">Fish</option>
<option value="flora_food">Flora Food</option>
<option value="flora_resources">Flora Resources</option>
<option value="flora_structural">Flora Structural</option>
<option value="fruit_flowers">Flowers</option>
<option value="fruit">Fruit</option>
<option value="fruit_fruits">Fruits</option>
<option value="vegetable_fungi">Fungi</option>
<option value="gas">Gas</option>
<option value="gemstone">Gemstone</option>
<option value="vegetable_greens">Greens</option>
<option value="wood_deciduous">Hard Wood</option>
<option value="meat_herbivore">Herbivore Meat</option>
<option value="hide">Hide</option>
<option value="bone_horn">Horn</option>
<option value="ore_igneous">Igneous Ore</option>
<option value="gas_inert">Inert Gas</option>
<option value="petrochem_inert">Inert Petrochemical</option>
<option value="inorganic">Inorganic</option>
<option value="meat_insect">Insect Meat</option>
<option value="ore_intrusive">Intrusive Ore</option>
<option value="iron">Iron</option>
<option value="gas_inert_known">Known Inert Gas</option>
<option value="fuel_petrochem_liquid_known">Known Liquid Petrochem Fuel</option>
<option value="radioactive_known">Known Radioactive</option>
<option value="gas_reactive_known">Known Reactive Gas</option>
<option value="fuel_petrochem_solid_known">Known Solid Petrochem Fuel</option>
<option value="hide_leathery">Leathery Hide</option>
<option value="fuel_petrochem_liquid">Liquid Petrochem Fuel</option>
<option value="ore">Low-Grade Ore</option>
<option value="meat">Meat</option>
<option value="metal">Metal</option>
<option value="milk">Milk</option>
<option value="mineral">Mineral</option>
<option value="seafood_mollusk">Mollusk</option>
<option value="energy_renewable_unlimited">Non Site-Restricted Renewable Energy</option>
<option value="metal_nonferrous">Non-Ferrous Metal</option>
<option value="oats">Oats</option>
<option value="organic">Organic</option>
<option value="radioactive">Radioactive</option>
<option value="gas_reactive">Reactive Gas</option>
<option value="energy_renewable">Renewable energy</option>
<option value="meat_reptillian">Reptillian Meat</option>
<option value="rice">Rice</option>
<option value="hide_scaley">Scaley Hide</option>
<option value="seafood">Seafood</option>
<option value="ore_sedimentary">Sedimentary Ore</option>
<option value="seeds">Seeds</option>
<option value="ore_siliclastic">Siliclastic Ore</option>
<option value="energy_renewable_site_limited">Site-Restricted Renewable Energy</option>
<option value="softwood">Soft Wood</option>
<option value="energy_renewable_unlimited_solar">Solar Energy</option>
<option value="fuel_petrochem_solid">Solid Petrochem Fuel</option>
<option value="steel">Steel</option>
<option value="vegetable_tubers">Tubers</option>
<option value="vegetable">Vegetables</option>
<option value="water">Water</option>
<option value="wheat">Wheat</option>
<option value="corn_wild">Wild Corn</option>
<option value="meat_wild">Wild Meat</option>
<option value="milk_wild">Wild Milk</option>
<option value="oats_wild">Wild Oats</option>
<option value="rice_wild">Wild Rice</option>
<option value="wheat_wild">Wild Wheat</option>
<option value="energy_renewable_unlimited_wind">Wind Energy</option>
<option value="wood">Wood</option>
<option value="hide_wooly">Wooly Hide</option>
</select>

<input type="submit"></input>
</form>

<?php endif; ?>

<?php

// Thanks Oracle! ttyl
oci_close( $connection );
