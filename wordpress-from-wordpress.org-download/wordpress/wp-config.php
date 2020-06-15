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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_test' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         's!$B%ebE:HuBjim]B: C8fUv{BHM=!?,>%t|UrE/Z#guH6.`U=CxcS&u{>1so$@F' );
define( 'SECURE_AUTH_KEY',  '~QQRoSU{qHvxcCa]%4RK6Tgbl@K+!6/oI;BKW t-iKSo,sd%HDCSyH8gr>D5L-2{' );
define( 'LOGGED_IN_KEY',    ';[B]Jjg37&Md,.`(,D-Y;,SR8_ioK02q?L^O#ioa$)}d?PtdgC!qb[KC:+Y@};?}' );
define( 'NONCE_KEY',        'cL)=YMR2U3i[7*(u0S+CHHyF4t5mi}K8-JO/o5DGd=!?&(aee_8{,L~!7+FtBbly' );
define( 'AUTH_SALT',        'jk:$19mmNJa_ Rmka&>Q(.Uqy<5uGm Q}`&0]y_cU`Pu|&ce(_-g1_0qG{rJJ0T0' );
define( 'SECURE_AUTH_SALT', ',.d^|0w];!NXkz]_H!l?E(Xr0tdbO)8fkd=Lf4A&ts$sR@lEvd-[aY=O+HEUwX :' );
define( 'LOGGED_IN_SALT',   'Vj<0waFCJ,RYk;ZR;AUI:|e5vA9uoSCLnOoX%X ^w1G1@-vy(*H (#egj 3o^9+t' );
define( 'NONCE_SALT',       '8HC&*7vx?*{;iO< [xt?WT9!WH0GF,gs!T`DqgB@S,wz>`=*A0On)G;RES=8tNkl' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

define('WP_MEMORY_LIMIT', '1024M');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
