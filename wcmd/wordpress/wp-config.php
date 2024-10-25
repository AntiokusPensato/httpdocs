<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'tdavis');

/** Database username */
define('DB_USER', 'tdavis');

/** Database password */
define('DB_PASSWORD', 'k6eD^X8yhv7Lbpe@');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',         'kOeV+&?2UA->hT4Svd~9{ Egx.e0p&  (~@_B41|r_:mS|CiBxI|fMCy|dg}D/(u');
define('SECURE_AUTH_KEY',  '%O!R;F,L,htBM7_VqE ?VZu8;B7B5m%?$WTK)N>JU02D`*HkV(3*j(k8;k6]OA3L');
define('LOGGED_IN_KEY',    '}wa6Ixp,Xy$I D_9qH,55w,$)V6o6diQ^E9wIbp$]&qf4JG25X0V)]OH#*$qhV?N');
define('NONCE_KEY',        'dK:D3lTsz^2P.So^Dd+-?5Alf]D%+Mh?Uic`l^~q5ydN11@iWp0d09(XRDc^1.>Q');
define('AUTH_SALT',        ' cb((?2<zt(/lS+Ei=O:zXvcA9X~W<=Lm6]%)i3o-D+-@w#5;w|Ueqs[?#oZ4/Yb');
define('SECURE_AUTH_SALT', '%hzHjE0QQQm8)wTlTAXI^-jJ<4}R&hnP:-b?gH*O{sH4oCJ,B(h5Fj.9ba>`jq_`');
define('LOGGED_IN_SALT',   'c<Td+Lzo{xHWg6zo(:eUcj-/?HM+|iYfX| v--7M9`+#m<YhXqq+;jD:hFBw=^Q9');
define('NONCE_SALT',       ')JvJQU8MGtz*6$_&zHMZ566nQ0(Pz7;q%0?rZk]HEN%p-],1%w|&^Z~$89}h#.*:');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wcmd_2248_a_wp_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define('WP_DEBUG', true);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (! defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
