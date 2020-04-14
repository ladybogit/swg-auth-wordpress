# SWG Authentication for Wordpress

# Usage:
1. Upload the plugin files to the `wp-content/plugins/swg-auth/` directory or install the plugin through the WordPress admin panel.
2. Activate the plugin through the Wordpress admin panel.
3. Point your SWG server's externalAuthURL config flag to `http://url.to.wordpress/?action=swg-auth`.
4. Done!

# Notes:
- Existing users should make a Wordpress account with the _same username_ that they were already using in order to gain access to their existing characters
- HTTPS is reccomended to avoid sending packets that contain plaintext passwords
