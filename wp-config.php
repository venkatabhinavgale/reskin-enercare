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
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          'k)w F9][_W?& C.7]uZ(d&212vOsE{h)}d@wEyW-2?2jEyk+4|q%SVkrTCV//94<' );
define( 'SECURE_AUTH_KEY',   '$^,F.#Jk+%{}I}B8I4tvu9.!MUj>)3q#u,!#)_@o]x;`rQX!|xH|X^(]Oj^|8*8x' );
define( 'LOGGED_IN_KEY',     '+<u-b$_))xHMC9eE%:w&nT@*3V{eu!.nxb>KVz6K&OMZmewN(b{;J[ev ;CPZ{FY' );
define( 'NONCE_KEY',         's8#WhY.fv{qk+U_@)s41=7LtW^W*u%3u0tC-{1ae.E|@.{H7.8>[fP(Gto?{#vx4' );
define( 'AUTH_SALT',         '3m2fWY2r^fGwXA^scL9$mWufwjKX #6iB@i?~lY9xf|ol|Nox?6b %%bO$.Uv>4A' );
define( 'SECURE_AUTH_SALT',  'GvARnvK|POOxQ/FWmcj!b^X ^|b!n1L@9BL<<eIwqTke2WUe<w&A TkPq+v!K51W' );
define( 'LOGGED_IN_SALT',    'P,ok|iY?w3}E%>oOF}1_[/0^bfS)@T{bi30y}B1ZX#71iWU}qTJ,fSw4[Puf-PBs' );
define( 'NONCE_SALT',        'c0k_%I=;dJ[T<[z/+8=[mRQAV1I7?UtIH fedXs$Q7^VeZ6f_L1mb Ht;zV.31n|' );
define( 'WP_CACHE_KEY_SALT', 'hJiihCTzNtXs3o&.m/w?uhSVhp[wY&@L<Z}|E}|EP1N&qkLBc-B?5:el8H3U?<Cb' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
