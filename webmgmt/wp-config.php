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
define( 'DB_NAME', 'wp_d3xdz' );

/** Database username */
define( 'DB_USER', 'wp_k6gdj' );

/** Database password */
define( 'DB_PASSWORD', 'tS8brMtmr1Ugm5l&' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

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
define('AUTH_KEY', 'Am(y7:22]fICM+bf04V&Qb2+567mIys/aM2Zfj23*0/nY&5fLU/jzl4ib20Q8I|5');
define('SECURE_AUTH_KEY', '6i*ViC;rL(293C1oh3B]Pn0[dQD8ls5Z]O%dU@~!46~9n[hnzi]~DkLg4uo82JE3');
define('LOGGED_IN_KEY', '9Ss()CE#9_FVa11b8i;-1G%VJ)3qLqZeF*@-dMD9S7TKwZ/K5mb/PV385kf+[vhA');
define('NONCE_KEY', '|4rOJVC6K:9x:en]dz(*55(3E6jN]wb0ar;+DsI2aV8Gn6r:0bI48!0RTNX9]TiH');
define('AUTH_SALT', 'P:O_@971*St/&L7xMAvTg)Gtey7L9e1+/Vd8_UL6bp~2i_v67Al8TjNZQ-QC[6mP');
define('SECURE_AUTH_SALT', '2%2RU4nx%O7H|55@818c6l4F!Q2BV!;#u5c5F)~i_5S@]p|692d4t63/ln((a0c4');
define('LOGGED_IN_SALT', ')n&7)yk3F7Jn82rV5_ri+@71M6]~8]#e5mz6Z+wY_2E&ih0(NA6Su|V86tP]iQ)4');
define('NONCE_SALT', 'WE;&+0n-y!BvyNKE2/e/*4AVB5u)B2b*q48R9xT;tST-21B5)7E_8@9Pc-92@H6h');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'q1AHrcW_';


/* Add any custom values between this line and the "stop editing" line. */

define('WP_ALLOW_MULTISITE', true);
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

define( 'DISALLOW_FILE_EDIT', true );
define( 'CONCATENATE_SCRIPTS', false );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
