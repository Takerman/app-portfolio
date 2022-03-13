=== SiteGround Security ===
Contributors: Hristo Sg, siteground, sstoqnov, stoyangeorgiev, elenachavdarova
Tags: security, firewall, malware scanner, web application firewall, two factor authentication, block hackers, country blocking, clean hacked site, blocklist, waf, login security
Requires at least: 4.7
Tested up to: 5.8
Requires PHP: 7.0
Stable tag: trunk
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

SiteGround Security is the all-in-one security solution for your WordPress website.

== Description ==
With the carefully selected and easy to configure functions the plugin provides everything you need to secure your website and prevent a number of threats such as brute-force attacks, compromised login, data leaks, and more.

== Login Settings ==

Here you can use the tools we've developed to protect your login page from unauthorized visitors, bots, and other malicious behavior.

= Custom Login URL =
Change the default login url to prevent attacks and have an easily memorisable login URL. You can also change the default sign-up url if you have that option enabled for your website.

**Important!**
You can revert to the default login type by using the following snippet.

`
add_action( 'init', 'remove_custom_login_url' );
function remove_custom_login_url() {
	update_option( 'sg_security_login_type', 'default' );
}
`

= Login Access =
Login Access allows you to limit the access of the login page to a specific IP’s or a range of IP’s to prevent malicious login attempts or brute-force attacks.

**Important!**
If you lock yourself out of your admin panel, you can add the following option to your theme’s function.php, reload the site and then remove it once you have gained access. Keep in mind that this will also remove all IP's that are allowed to access the login page and a re-configuration will be needed:

`
add_action( 'init', 'remove_login_access_data' );
function remove_login_access_data() {
	update_option( 'sg_login_access', array() );
}
`

= Two-factor Authentication =
Two-factor Authentication for Admin User will force all admins to provide a token, generated from the Google Authentication application when logging in. 

= Disable Common Usernames =
Using common usernames like 'admin' is a security threat that often results in unauthorised access. By enabling this option we will disable the creation of common usernames and if you already have one ore more users with a weak username, we'll ask you to provide new one(s).

= Limit Login Attempts =
With Limit Login Attempts you can specify the number of times users can try to log in with incorrect credentials. If they reach a specific limit, the IP they are attempting to log from will be blocked for an hour. If they continue with unsuccessful attempts, they will be restricted for 24 hours and 7 days after that.

**Important!**
If you lock yourself out of your admin panel, you can add the following option to your theme’s function.php, reload the site and then remove it once you have gained access. Keep in mind that this will also remove the unsuccessful attempts block for all IP's:

`
add_action( 'init', 'remove_unsuccessfull_attempts_block' );
function remove_unsuccessfull_attempts_block() {
	update_option( 'sg_security_unsuccessful_login', array() );
}
`


== Site Security ==

With this toolset you can harden your WordPress аpplication and keep it safe from malware, exploits and other malicious actions.

= Lock and Protect System Folders =
Lock and Protect System Folders allows you to block any malicious or unauthorized scripts to be executed in your applications system folders. 

= Hide WordPress Version =
When using Hide WordPress Version you can avoid being marked for mass attacks due to version specific vulnerabilities. 

= Disable Themes & Plugins Editor =
Disable Themes & Plugins Editor in the WordPress admin to prevent potential coding errors or unauthorized access through the WordPress editor.

= Disable XML-RPC =
You can Disable XML-RPC protocol which was recently used in a number of exploits. Keep in mind that when disabled, it will prevent WordPress from communicating with third-party systems. We recommend using this, unless you specifically need it.

= Force HTTP Strict-Transport-Security (HSTS) =
HSTS (HTTP Strict-Transport-Security) is a response header. It allows the website to tell browsers that it should only be accessed using HTTPS, instead of using HTTP. Тhis prevents "man-in-the-middle" attacks and ensures that regular visitors will redirected to the secure version of the website.

= Disable RSS and ATOM Feeds =
Disable RSS and ATOM Feeds to prevent content scraping and specific attacks against your site. It’s recommended to use this at all times, unless you have readers using your site via RSS readers.

= Advanced XSS Protection =
By enabling Advanced XSS Protection you can add an additional layer of protection against XSS attacks.

= Delete the Default Readme.txt =
When you Delete the Default Readme.txt which contains information about your website, you reduce the chances of it ending in a potentially vulnerable sites list, used by hackers.

== Activity Log ==

Here you can monitor in detail the activity of registered, unknown and blocked visitors. If your site is being hacked, a user or a plugin was compromised, you can always use the quick tools to block their future actions.

**Important!**
You can set a custom log lifetime ( in days ), using the following filter we have provided for that purpose.

`
add_filter( 'sgs_set_activity_log_lifetime', 'set_custom_log_lifetime' );
function set_custom_log_lifetime() {
    return 'your-custom-log-lifetime-in-days';
}
`


== Post-Hack Actions ==

= Reinstall All Free Plugins =
If your website was hacked, you can always try to reduce the harm by using Reinstall All Free Plugins. This will reinstall all of your free plugins, reducing the chance of another exploit or the re-use of malicious code.

= Log Out All Users =
You can Log Out All Users to prevent any further actions done by them or use.

= Force Password Reset =
Force Password Reset to force all users to change their password upon their next login. This will also log-out all current users instantly.

= WP-CLI Support =

In version 1.0.2 we've added full WP-CLI support for all plugin options and functionalities.

* `wp sg limit-login-attempts 0|3|5` - limits the login attempts to 3, 5, or 0 in order to disable it
* `wp sg login-access add IP` - allows only specific IP(s) to access the backend of the website
* `wp sg login-access list all` - lists the whitelisted IP addresses
* `wp sg login-access remove IP` - removes IP from the whitelisted ones
* `wp sg login-access remove all` - removes all of the whitelisted IP addresses
* `wp sg secure protect-system-folders enable|disable` - enables or disables protects system folders option
* `wp sg secure hide-wordpress-version enable|disable` - enables or disables hide WordPress version option
* `wp sg secure plugins-themes-editor enable|disable` - enables or disables plugin and theme editor
* `wp sg secure xml-rpc enable|disable` - enables or disables XML-RPC
* `wp sg secure rss-atom-feed enable|disable` - enables or disables RSS and ATOM feeds
* `wp sg secure xss-protection enable|disable` - enables or disables XSS protection
* `wp sg secure 2fa enable|disable` - enables or disables two-factor authentication
* `wp sg secure disable-admin-user enable|disable` - enables or disables usage of "admin" as username
* `wp sg log ip add|remove|list <name> --ip=<ip>` - add/list/remove user defined pingbots listed in the activity log by ip
* `wp sg log ua add|remove|list <name> ` - add/list/remove user defined bots listed in the activity log by user agent
* `wp sg list log-unknown|log-registered|log-blocked --days=<days>` - List specific access log for a specific period

= Requirements =
* WordPress 4.7
* PHP 7.0
* Working .htaccess file

== Installation ==

= Automatic Installation =

1. Go to Plugins -> Add New
1. Search for "SiteGround Security"
1. Click on the Install button under the SiteGround Security plugin
1. Once the plugin is installed, click on the Activate plugin link

= Manual Installation =

1. Login to the WordPress admin panel and go to Plugins -> Add New
1. Select the 'Upload' menu 
1. Click the 'Choose File' button and point your browser to the sg-security.zip file you've downloaded
1. Click the 'Install Now' button
1. Go to Plugins -> Installed Plugins and click the 'Activate' link under the WordPress SiteGround Security listing

== Changelog ==

= Version 1.1.3 =
Release Date: October 1st, 2021
* Improved Hide WP version functionality

= Version 1.1.2 =
Release Date: August 20th, 2021
* Improved Custom Login URL functionality
* Improved 2FA
* Improved success/error messages

= Version 1.1.1 =
Release Date: August 12th, 2021
* Improved 2FA
* Improved logout functionality

= Version 1.1.0 =
Release Date: July 27th, 2021
* NEW! Added 2FA backup codes to the profile edit page
* NEW! Custom login and registration URLs
* NEW! Added automatic HSTS headers generation
* Improved Disable common usernames functionality
* Improved Mass Logout Service
* Improved Activity Logging and added custom labeling
* Improved Password Reset functionality

= Version 1.0.4 =
* Improved Limit Login Attempts

= Version 1.0.3 =
* Fixed rating box bug on safari
* Improved RSS & ATOM Feed Disabler service

= Version 1.0.2 =
* Added filter to configure log lifetime
* Added WP CLI support
* Improved strings

= Version 1.0.1 =
* Added defaults on install
* Improved translation support
* Added cleanup on uninstall

= Version 1.0.0 =
* First stable release.

= Version 0.1 =
* Initial release.
