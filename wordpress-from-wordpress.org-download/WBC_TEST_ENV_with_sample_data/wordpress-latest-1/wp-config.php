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
define( 'DB_NAME', 'WBC_TEST_ENV_with_sample_data_wp_latest_1' );

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
define( 'AUTH_KEY',         'a;HW(dH,:~>5?(~k6$k?UUJ.EPe&le.4eGYR2uf&!k3Hpba@2|Rqoah&-{ek4`H0' );
define( 'SECURE_AUTH_KEY',  '%Vr!7GDAX)+_s0JoXhB)q36?}.L_]sU@CW@j)jIQa;}Om{}Z;@eeZi*_dWm}Fq]?' );
define( 'LOGGED_IN_KEY',    '^LaK2^c0,yuxwF6h3^J9^96=?Q=x!QC6llrNkFr|ab8~FVDyS{PzN1,nxd79L6b>' );
define( 'NONCE_KEY',        '(7Tqt%>Pu[t@e.8gs:U[:n22q2]vT1c)F$i+J&aPWTZVDk4&Gr~Y13yX8 T5)v44' );
define( 'AUTH_SALT',        '*_Tt`c64_>%!MaMO-R$c*gl&~~AF5}LQ,:X_!NwHGlWu@K2%A[qup*7F*B(Jh}L(' );
define( 'SECURE_AUTH_SALT', 'J8|9o8:J9r~?TLN1sO=>(Mt81]0y=i!*=9[Z)QB|ymvgcE<x4;fy5(?Y*-W5IJHl' );
define( 'LOGGED_IN_SALT',   'oJlu|icZ`?nQ-$_JX7~*n:~s*ORTH0!Q2<b|w&w2<vD>FJ$ZI$uQT<3M== SfG%e' );
define( 'NONCE_SALT',       'MBxl6DSb5Se@3K_gL<M} rxI%grO3Z>ttpzRA}w2zpg,h8p,/m`p@war5JuT4({(' );

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
