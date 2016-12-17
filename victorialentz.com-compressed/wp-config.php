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
define('DB_NAME', 'admin_CreativeCreatureStudio');

/** MySQL database username */
define('DB_USER', 'admin_vlentz');

/** MySQL database password */
define('DB_PASSWORD', 'Howls_Moving_Castle741');

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
define('AUTH_KEY',         '}IRBu!R<^rU1Baq^Dg8:2:0L)0?UKs5d=CZLj1gv3RF.k*dALzrp[G;%R-VGu?ij');
define('SECURE_AUTH_KEY',  'IaR?o,/vv-4o8Y]xSH|_$mM/7gpQGz1k6t{F6Z,w~4rl%9q[e:jL]>j>,ve6wPjA');
define('LOGGED_IN_KEY',    ',>f7Z2uI  [^ ]q{,U,O7k~YQZ{_H_s*.%(9AEvt`y2^l{pHi5f1?w0ZjR1KVilV');
define('NONCE_KEY',        'eIC/N%LF/A*bkf[-zS-p:{mKYC1H,hdc]J6>(],W A.VOT^T-HG2jI_ikg5??kBH');
define('AUTH_SALT',        'FE*A.7yl4n[</jU=I|e.)4eK@#:d;yw&`4+Q;GW+m6%OAHp@x=R2O# J9Ap;^.rk');
define('SECURE_AUTH_SALT', 'LME0zE(];y3Z|.McXC3pf7d2 6oZP!o/#IiB(-AB!DeBl0@.-~.+zQND$fV,@= 7');
define('LOGGED_IN_SALT',   'R .5e=fQ5GQS9y@IrZJ02h]Gk]ioszQNEd|R+Sx>k[.T}@q-pDHX7P>/R,sf3AtU');
define('NONCE_SALT',       '}lR?^i1^}?<aM```?Z_JoW#-$+UWVO$M#[4|uB(N3FJmOPQaDCILI?.<k)T^%y(I');

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
