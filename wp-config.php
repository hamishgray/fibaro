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
define('DB_NAME', 'fibaro_test');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'NCm^{L6e(I#L-Rq:*AY|*y>H#PZ&y0isN`/=r}c<02E4Ok+=Rb-hgD4mg6Sf!`N9');
define('SECURE_AUTH_KEY',  'uG]Itl/4Sf^>V}/52Uv_aOipmjO?`phw6UjkBnL&#G)kPqkT(C5?D)Jjz%*FVd6E');
define('LOGGED_IN_KEY',    '>zE5E4e^}xzEnFADla6nhw4,c~vcyS^8{~ sngjxgCnK|Q1[0zKAo-!U{D^!/| j');
define('NONCE_KEY',        'gw|Y0)<qP9DI5[9?t~?!nn|yjbf|O|4`VYETPr.V5F!tE~l8`^W;_3lCjgy[kl6j');
define('AUTH_SALT',        '>j@;4+7JUozVz#4a>|?aW)8b{|Z${g(D2euJEu}:6m=2I7a*)E4-U!YjaZPi~dr`');
define('SECURE_AUTH_SALT', 'ee!}S*DwP0o/fE%s-U)zRYHFn)K{3d9_d(1Z@Js2=!*#E1G1eq:B<J_6!jp-khH#');
define('LOGGED_IN_SALT',   'muC29fCG9{J{z#>_>5n~`9VAkZ2L+Hu;TwR2>e~Vu?`xWS_tLz~qUUfpC-jeo$ l');
define('NONCE_SALT',       '-<59w&vZL2CpdKKjiGv< fD>C:botWIEDcPvC`/bUO5slZ&,&N]>t(kQ2P,g^!%*');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'fibaro_';

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
 define( 'WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

