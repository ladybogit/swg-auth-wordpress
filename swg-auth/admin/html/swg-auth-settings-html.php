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
      <div class="swg-auth-css-subtabs">
        <h2 class="nav-tab-wrapper" style="margin-top: 20px;">
          <a href="#" class="nav-tab <?php echo $active_css_subtab === 'general' ? 'nav-tab-active' : ''; ?>" data-subtab="general">General Pages</a>
          <a href="#" class="nav-tab <?php echo $active_css_subtab === 'resources' ? 'nav-tab-active' : ''; ?>" data-subtab="resources">Resources Page</a>
          <a href="#" class="nav-tab <?php echo $active_css_subtab === 'widget' ? 'nav-tab-active' : ''; ?>" data-subtab="widget">Metrics Widget</a>
        </h2>
        <div class="swg-auth-subtab-content" data-subtab="general" style="display:none;">
          <?php do_settings_sections( 'swg-auth-settings-css-general' ); ?>
        </div>
        <div class="swg-auth-subtab-content" data-subtab="resources" style="display:none;">
          <?php do_settings_sections( 'swg-auth-settings-css-resources' ); ?>
        </div>
        <div class="swg-auth-subtab-content" data-subtab="widget" style="display:none;">
          <?php do_settings_sections( 'swg-auth-settings-css-widget' ); ?>
        </div>
      </div>
      <?php
    }
    submit_button( 'Save Settings' );
    ?>
  </form>

</div>
