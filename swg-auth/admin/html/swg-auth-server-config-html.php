<div class="wrap">

<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

<p>This is the SWG Server Configuration you need. Edit these values in your existing configuration files, or else just paste all of it at the bottom of <kbd>localOptions.cfg</kbd>.</p>

<p><strong>Note:</strong> Always make sure you've downloaded and compiled the latest SWG src.</p>

<pre><code>[LoginServer]
useExternalAuth=true
externalAuthURL=<?php echo get_site_url(); ?>/?action=swg-auth

[ServerUtility]
externalAdminLevelsEnabled=true
externalAdminLevelsURL=<?php echo get_site_url(); ?>/?action=swg-auth-admin-level

[CentralServer]
metricsDataURL=<?php echo get_site_url(); ?>?action=swg-auth-metrics
webUpdateIntervalSeconds=5</code></pre>

</div>
