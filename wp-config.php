<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dbkgjxxpunlg1w' );

/** Database username */
define( 'DB_USER', 'ulfisiwe5wnup' );

/** Database password */
define( 'DB_PASSWORD', 'qhwtbaiqztv9' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'gU2-}.bay}4.lCuq]<1AGEG}+># %*7~~ om*zdOJm]r<zOYJK[$d)/8ZtD%gOmY' );
define( 'SECURE_AUTH_KEY',   'MjaL12,<M`GLZ<9_k0@bg9zp0^ZoPPRN1g5, BKA.._5&S|C;:HU}G1>YFt>9gU)' );
define( 'LOGGED_IN_KEY',     '=wKDQ[,U,: t{1ghORv/=i~kPTGIY:mc&F 7Mv54F-MWkP;BY3li`@uLzvCX]Ik~' );
define( 'NONCE_KEY',         '1r.rF~c6ek[ED0()F?t[T!m*^7W57)++B,?z&v{/u9TGc2eQ?*!c;E,tS8/S.oj ' );
define( 'AUTH_SALT',         'ycwZw5B/>;09m>gPJ_Xq&,-:xe3>DxuXbO{7B{@,<`Y[!YRRvqX|%gej?HFQtk:|' );
define( 'SECURE_AUTH_SALT',  'b!2k1ZruFmjE}MDDN&qlxC<$kJ]B0cl=659rOD>a?2M&aXA63|&k~-Q.)zQ^_zqO' );
define( 'LOGGED_IN_SALT',    '<ae4}3W|0nWg51>GT&oVE6b8t#XX074}b)QNM^G;ik]GZj&yZ*-c[{t*;<fmm #4' );
define( 'NONCE_SALT',        'A)j+gAK%%qKc}}pwTJ~^!.u219jOt6~R&c5j6B[czPcL6|LM,9zN`=^oKD!^:d|(' );
define( 'WP_CACHE_KEY_SALT', 'fe`ZuYnnm(DXU3!%u^{U92ygc76&^B`xR[|L+V_8A<.A(7/oMPKA;R6@{,O`}(-1' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'hna_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
@include_once('/var/lib/sec/wp-settings.php'); // Added by SiteGround WordPress management system
