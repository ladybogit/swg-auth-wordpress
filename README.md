# SWG Authentication for Wordpress

# Usage:
1. Upload the plugin files to the `wp-content/plugins/swg-auth/` directory or install the plugin through the WordPress admin panel.
2. Activate the plugin through the Wordpress admin panel.
3. Point your SWG server's externalAuthURL config flag to `http://url.to.wordpress/?action=swg-auth`.
4. Done!

# Admin Level Checks:
Make sure you've got the latest src downloaded and compiled, and add the following to your SWG server cfg:
```
[ServerUtility]
externalAdminLevelsEnabled=true
externalAdminLevelsURL=http://url.to.wordpress/?action=swg-auth-admin-level
```
Anyone with admin access to Wordpress will also have admin level 50 to use god mode in game.

# Notes:
- Existing users should make a Wordpress account with the _same username_ that they were already using in order to gain access to their existing characters
- HTTPS is reccomended to avoid sending packets that contain plaintext passwords
