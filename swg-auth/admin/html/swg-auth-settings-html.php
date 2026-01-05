<?php

// No Direct Access
if ( ! defined( 'ABSPATH' ) ) {
  die;
}

settings_errors();

// Get current tab
$active_tab = isset( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : 'general';
$active_css_subtab = isset( $_GET['css_subtab'] ) ? sanitize_text_field( $_GET['css_subtab'] ) : 'general';

?>

<div class="wrap">

  <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

  <nav class="nav-tab-wrapper">
    <a href="?page=swg-auth-settings&tab=general" class="nav-tab <?php echo $active_tab === 'general' ? 'nav-tab-active' : ''; ?>">General</a>
    <a href="?page=swg-auth-settings&tab=database" class="nav-tab <?php echo $active_tab === 'database' ? 'nav-tab-active' : ''; ?>">Database</a>
    <a href="?page=swg-auth-settings&tab=keys" class="nav-tab <?php echo $active_tab === 'keys' ? 'nav-tab-active' : ''; ?>">Secret Keys</a>
    <a href="?page=swg-auth-settings&tab=css" class="nav-tab <?php echo $active_tab === 'css' ? 'nav-tab-active' : ''; ?>">CSS</a>
  </nav>

  <form action="options.php" method="post">
    <?php
    if ( $active_tab === 'general' ) {
      settings_fields( 'swg-auth-settings-general' );
      do_settings_sections( 'swg-auth-settings-general' );
    } elseif ( $active_tab === 'database' ) {
      settings_fields( 'swg-auth-settings-database' );
      do_settings_sections( 'swg-auth-settings-database' );
    } elseif ( $active_tab === 'keys' ) {
      settings_fields( 'swg-auth-settings-keys' );
      do_settings_sections( 'swg-auth-settings-keys' );
    } elseif ( $active_tab === 'css' ) {
      // Use single option group for all CSS settings
      settings_fields( 'swg-auth-settings-css-all' );
      
      // Main CSS settings
      do_settings_sections( 'swg-auth-settings-css' );
      ?>
      <div class="swg-auth-css-subtabs" style="display:none;">
        <h2 class="nav-tab-wrapper" style="margin-top: 20px;">
          <a href="?page=swg-auth-settings&tab=css&css_subtab=general" class="nav-tab <?php echo $active_css_subtab === 'general' ? 'nav-tab-active' : ''; ?>">General Pages</a>
          <a href="?page=swg-auth-settings&tab=css&css_subtab=resources" class="nav-tab <?php echo $active_css_subtab === 'resources' ? 'nav-tab-active' : ''; ?>">Resources Page</a>
          <a href="?page=swg-auth-settings&tab=css&css_subtab=widget" class="nav-tab <?php echo $active_css_subtab === 'widget' ? 'nav-tab-active' : ''; ?>">Metrics Widget</a>
        </h2>
        <?php
        if ( $active_css_subtab === 'general' ) {
          do_settings_sections( 'swg-auth-settings-css-general' );
        } elseif ( $active_css_subtab === 'resources' ) {
          do_settings_sections( 'swg-auth-settings-css-resources' );
        } elseif ( $active_css_subtab === 'widget' ) {
          do_settings_sections( 'swg-auth-settings-css-widget' );
        }
        ?>
      </div>
      <?php
    }
    submit_button( 'Save Settings' );
    ?>
  </form>

</div>
