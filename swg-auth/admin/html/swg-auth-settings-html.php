<?php settings_errors(); ?>

<div class="wrap">

  <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

  <form action="options.php" method="post">
    <?php settings_fields( 'swg-auth-general-settings' ); ?>
    <?php settings_fields( 'swg-auth-odb-settings' ); ?>
    <?php do_settings_sections( 'swg-auth-settings' ); ?>
    <?php submit_button( 'Save Settings' ); ?>
  </form>

</div>
