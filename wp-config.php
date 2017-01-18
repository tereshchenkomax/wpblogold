<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'tereshchenkomax');

/** MySQL database username */
define('DB_USER', 'tereshchenkomax');

/** MySQL database password */
define('DB_PASSWORD', 'lUzrJcmQoI');

/** MySQL hostname */
define('DB_HOST', 's2.ho.ua');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ']CDZkHE5zd%!qCDWUGBa_wXZ$yomMMwbXNHkm3$ NAe|:;%mB[FS$t1CH6Uw$1FK');
define('SECURE_AUTH_KEY',  'b<HvN[@Z#)R5 {7M@s*VrUAh~uYLH.22-R=y@}g.qI[-YwK<H<XWuPNf8(/}_rAd');
define('LOGGED_IN_KEY',    '1B@C?oa>j1`D4y?/#*^#h_Ur&erZM4%P@(}<<n-?z}vHdlNGg[!1 }PFRW~+5w03');
define('NONCE_KEY',        '6Z=NXf2hub|cjz?PWIBOdGY[W5i=vQ<L0DLY~4@r|e;NT9LBdlBnjUz6E|4m UR?');
define('AUTH_SALT',        '?Y3|ap5~d#KVZ`t{N k&C<v|~&e%DQaE0HE/BZscJe67&{GDaF%xS2^%T0~`>>C,');
define('SECURE_AUTH_SALT', 'Mf.<;&Ci56-t}vp#vN%A1`}my(1zAm~V;_DF`@{_f*1PGXUV!nx2;>g4&q!FI`-7');
define('LOGGED_IN_SALT',   'Ih`hknppZ2cn~Zo>5r2ZmlN;:K20:~RSu4H3zZ00oCKq2%LtUna=-OBcw9@=Y0]c');
define('NONCE_SALT',       'S.BTW5tr{Jr!ya.W%&Bk )lLDk(fI1l4oz&_.<m$?k$miu$zIYp,&@{o57sDz{P>');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
