<div class="wrap">
  <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
  <p>Welcome to SWG Auth for Wordpress. Your plugin is functioning normally.</p>
  <p>To enable authentication for your SWG server, edit these lines in your server config:</p>
  <code>
    [LoginServer]<br />
    useExternalAuth=true<br />
    externalAuthURL=<?php echo get_site_url() ?>/?action=swg-auth
  </code>
  <p>Additionally, you can use this plugin to enable God Mode in game. Wordpress Administrators will also be SWG Admins. To do this, be sure you have compiled the latest version of the src and add these lines to your server config:</p>
  <code>
    [ServerUtility]<br />
    externalAdminLevelsEnabled=true<br />
    externalAdminLevelsURL=<?php echo get_site_url() ?>/?action=swg-auth-admin-level
  </code>
</div>
