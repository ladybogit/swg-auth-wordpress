<?php

// No Direct Access
if ( ! defined( 'ABSPATH' ) ) {
  die;
}

// Check for the secret keys
$loginserver_key = get_option( 'swg-auth-loginserver-key' );
$serverutility_key = get_option( 'swg-auth-serverutility-key' );
$centralserver_key = get_option( 'swg-auth-centralserver-key' );

?>

<div class="wrap">

<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

<p>This is the SWG Server Configuration you need. Edit these values in your existing configuration files, or else just paste all of it at the bottom of <kbd>localOptions.cfg</kbd>.</p>

<p><strong>Note:</strong> Always make sure you've downloaded and compiled the latest SWG src.</p>

<p>
  <code>
    [LoginServer]<br>
    useExternalAuth=true<br>
    <?php echo ( get_option( 'swg-auth-auth-type' ) === 'JsonWebAPI' ) ? "useJsonWebApi=true" : ''; ?>
    externalAuthURL=<?php echo get_site_url(); ?>/?action=swg-auth
    <?php echo ( $loginserver_key !== '' ) ? '<br>externalAuthSecretKey=' . $loginserver_key : ''; ?>
  </code>
</p>
<p>
  <code>
    [ServerUtility]<br>
    externalAdminLevelsEnabled=true<br>
    externalAdminLevelsURL=<?php echo get_site_url(); ?>/?action=swg-auth-admin-level
    <?php echo ( $serverutility_key !== '' ) ? '<br>externalAdminLevelsSecretKey=' . $serverutility_key : ''; ?>
  </code>
</p>
<p>
  <code>
    [CentralServer]<br>
    metricsDataURL=<?php echo get_site_url(); ?>/?action=swg-auth-metrics<br>
    webUpdateIntervalSeconds=5
    <?php echo ( $centralserver_key !== '' ) ? '<br>metricsSecretKey=' . $centralserver_key : ''; ?>
  </code>
</p>

</div>
