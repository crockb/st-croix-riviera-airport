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
define('DB_NAME', 'airpark');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '1-Ssg7)R%6L!~r<hGk42h=34_5^S@{<;;tK|W(qx=h++4FKKF S}@]LZ*N~X]:5k');
define('SECURE_AUTH_KEY',  'Z &DYbC.zB*MZSi;:]V!uU$/%a_KpwtRl~K<9Y*P`%%U1oJa.Np#>%?KB}4+-VJl');
define('LOGGED_IN_KEY',    '/X9|N@<Me(zZh$@!@H~`[kdN`xkuUFH;`E]ysbetCf~s@6Lcd}.fX7Rh4EtxtGeF');
define('NONCE_KEY',        '4LaK~v5?)&{/vpn-?fhY*Q}g)V-93bsXk!IqdW7`)VC]odkc.-Y^%g)oUqy e8<_');
define('AUTH_SALT',        'rN;K0&D$^@|x%F{oH-ye($qO,5%HiAu<Ba/:V)@9T?TT6`4IOj0&jQmpbVCF0v:6');
define('SECURE_AUTH_SALT', '6mZdbi`e|{/|[$%x/n+_5q`|Y_4)`UIj~j!s4,#pZDv,qL@&iS9}O~0EYo>FGsq!');
define('LOGGED_IN_SALT',   'NL7PY.|_;,h7rQ.0L+CO+gVc/Z_qV)^Nad0rI<RR{edD&E)hyd(NBZJ{qFj;pa8!');
define('NONCE_SALT',       '35aSG3OM+xI+ZH8W6i*aR4Iz_CRYkr[TjoV,H>FL}/X$8WlorK_&+I0R? =ah6B~');

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
