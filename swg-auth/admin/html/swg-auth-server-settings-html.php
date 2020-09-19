<?php

// No Direct Access
if ( ! defined( 'ABSPATH' ) ) {
  die;
}

if ( isset( $_GET['tab'] ) ) {
  $tab = $_GET['tab'];
} else {
  $tab = 'general';
}

settings_errors();

?>

<div class="wrap">

  <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

  <h2 class="nav-tab-wrapper">
      <a href="?page=swg-auth-server-settings&tab=general" class="nav-tab<?php echo $tab === 'general' ? ' nav-tab-active' : '' ?>">General</a>
      <a href="?page=swg-auth-server-settings&tab=zones" class="nav-tab<?php echo $tab === 'zones' ? ' nav-tab-active' : '' ?>">Zones</a>
      <a href="?page=swg-auth-server-settings&tab=events" class="nav-tab<?php echo $tab === 'events' ? ' nav-tab-active' : '' ?>">Events</a>
      <a href="?page=swg-auth-server-settings&tab=advanced" class="nav-tab<?php echo $tab === 'advanced' ? ' nav-tab-active' : '' ?>">Advanced</a>
      <a href="?page=swg-auth-server-settings&tab=custom" class="nav-tab<?php echo $tab === 'custom' ? ' nav-tab-active' : '' ?>">Custom</a>
  </h2>

  <form action="options.php" method="post">
    <?php
    if ( $tab === 'general' ) {
      settings_fields( 'swg-auth-general-server-settings' );
      do_settings_sections( 'swg-auth-general-server-settings' );
    } elseif ( $tab === 'zones' ) {
      settings_fields( 'swg-auth-zones-settings' );
      do_settings_sections( 'swg-auth-zones-settings' );
    } elseif ( $tab === 'events' ) {
      settings_fields( 'swg-auth-events-settings' );
      do_settings_sections( 'swg-auth-events-settings' );
    } elseif ( $tab === 'advanced' ) {
      settings_fields( 'swg-auth-advanced-server-settings' );
      do_settings_sections( 'swg-auth-advanced-server-settings' );
    } elseif ( $tab === 'custom' ) {
      ?>
      <style>
      .form-table th {
        width: 0px;
        padding: 0;
      }
      textarea {
        width: 100%;
      }
      </style>
      <?php
      settings_fields( 'swg-auth-custom-server-settings' );
      do_settings_sections( 'swg-auth-custom-server-settings' );
    }
    submit_button( 'Save Settings' );
    ?>
  </form>

</div>
