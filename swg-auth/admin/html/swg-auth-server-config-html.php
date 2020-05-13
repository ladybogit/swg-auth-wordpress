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

<pre><code>[LoginServer]
useExternalAuth=true
externalAuthURL=<?php echo get_site_url(); ?>/?action=swg-auth
<?php echo ( $loginserver_key !== '' ) ? 'externalAuthSecretKey=' . $loginserver_key . '
' : ''; ?>

[ServerUtility]
externalAdminLevelsEnabled=true
externalAdminLevelsURL=<?php echo get_site_url(); ?>/?action=swg-auth-admin-level
<?php echo ( $serverutility_key !== '' ) ? 'externalAdminLevelsSecretKey=' . $serverutility_key . '
' : ''; ?>

[CentralServer]
metricsDataURL=<?php echo get_site_url(); ?>?action=swg-auth-metrics
webUpdateIntervalSeconds=5<?php echo ( $centralserver_key !== '' ) ? '
metricsSecretKey=' . $centralserver_key : ''; ?></code></pre>

</div>
