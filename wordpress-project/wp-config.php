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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 * 
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'GraphQL-Nuxt_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '-aGd*xa<m{QKP}T2>`)%B[w!ebin_ic[/>=T{F6E82pv&{mbV4/wjW>0d ,H7L}%' );
define( 'SECURE_AUTH_KEY',  'sx&x 88+qengA95ojRICbpnAj>q1-g|-@|`jCh*kKKV.ynmU-!0vwL~IV-43]@S>' );
define( 'LOGGED_IN_KEY',    '%pi YM^-ZwpWk;;y^Oj[+$#.;{VT2.T1V=9!_%J:[0%vFoa6N{D$K/UD+zhnR-R@' );
define( 'NONCE_KEY',        'k^i0n>3`VdjR-:FC?B g9STil%8;6EsN% {u+AL0KxR3fhNG^_q>f,x-E}WT_OYX' );
define( 'AUTH_SALT',        't#eJA2oq4 *OA;YNCKv=q,]ULN,W0t,Y6o-m(vut8lQim@^m,$LT-~EPszv5MU6)' );
define( 'SECURE_AUTH_SALT', 'R?ickO H-G&qDMo 2z&6|lXB^J58J$]=ZX^sE.}wM!q$_M_@T3mk}_vnyq+L+[@t' );
define( 'LOGGED_IN_SALT',   'Yk*WC!aT~S4ReGXm*m2K5, *s!um9hUP1qPT56)@cNxjdGiCtX;n~C1jJPh``Z^!' );
define( 'NONCE_SALT',       'Ff=wr}$@3%Nw.M?eJ9!)f[~<Gt5V{89gnpwyY~MoFx vK:7r)?KCW@H%rSZyujVl' );

/**#@-*/
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );

/* Add any custom values between this line and the "stop editing" line. */

// Enable JWT Authentication
define('JWT_AUTH_SECRET_KEY', 'marwan1988'); 
define('JWT_AUTH_CORS_ENABLE', true);

// Enable GraphQL Debugging
define( 'GRAPHQL_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
