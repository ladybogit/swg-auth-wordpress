=== SWG Auth ===
Contributors: tekaoh
Tags: admin, integration
Requires at least: 2.8
Tested up to: 5.4
Stable tag: 0.1
Requires PHP: 4.3
License: The Unlicense
License URI: https://unlicense.org

Star Wars Galaxies Authentication for Wordpress

== Description ==

If you're running a Star Wars Galaxies server, now you can use Wordpress to allow users to sign up and change their passwords.

== Installation ==

1. Upload the plugin files to the `wp-content/plugins/swgauth/` directory or install the plugin through the WordPress admin panel.
2. Activate the plugin through Wordpress admin panel.
3. Point your SWG server's externalAuthURL config flag to `http://url.to.wordpress/?action=swgauth`.
4. Done!

== Frequently Asked Questions ==

= How do I run a Star Wars Galaxies server? =

Check out https://swg-source.github.io/ and join that community on discord. If you'd rather build your own VM than download one, you could check out https://tekaohswg.github.io/new.html but be aware that this isn't for the faint of heart.

== Changelog ==

= 0.1 =
* Initial version
* Authentication is functional
