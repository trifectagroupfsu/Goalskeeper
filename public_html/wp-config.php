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
define('DB_NAME', 'youthcoa_wp995');

/** MySQL database username */
define('DB_USER', 'youthcoa_wp995');

/** MySQL database password */
define('DB_PASSWORD', '1NcdJTStONeImK7');

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
define('AUTH_KEY',         'iqpo5alvl1oduwvdcli4ipbhoqnjqolzx7oqzfbf20ur9lyctr2qa2tek9jgippq');
define('SECURE_AUTH_KEY',  'intpu0lmuwlptqafsxpejla5qgyo5s0oe3jepzimehrp3wntmtjkahu7kfnqil1s');
define('LOGGED_IN_KEY',    'ftized2jwaon7ejjlbbrdgfkaobtbculwbh2qncf5fw0efnsphlrwtm3g11fpbz8');
define('NONCE_KEY',        'dxvvz2xe5my2hq3jh9qmvpg9rceuhflzclskcqsaukt4ex4vdphlrlv6zjlagluf');
define('AUTH_SALT',        'hn3igowejini5529lxpgvzhrd0w2h4eoingqlu19tgfibajyor2cnmwpcpu4imm5');
define('SECURE_AUTH_SALT', 'uf43wub60wh5qasz6o3oz1jhz8jqfikuim7s2nr0vjrjzbtevayl1gn591fbbzsj');
define('LOGGED_IN_SALT',   'qqjufwxkutschejchstujjyihq2r7cjz4ulucirdpeyfsxeqsdnf4zzk1vu28gqx');
define('NONCE_SALT',       'z9gnhuqjjpu2vo5q0twvnrt8pzt5nrm13aws4ft5f4q7uafa0oj56orfyhw1fpwn');

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

/** Disables auto updates. */
define( 'AUTOMATIC_UPDATER_DISABLED', true );
