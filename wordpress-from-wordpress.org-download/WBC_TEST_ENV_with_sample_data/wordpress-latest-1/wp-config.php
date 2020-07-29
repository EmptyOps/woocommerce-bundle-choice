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
define( 'AUTH_KEY',         '3qk.+<iF,;%,E.u)DE?)>OZ%Dqb]cP.Tv9;}2i=pmrAF7!iC/KE#.C8^)!;1u}IQ' );
define( 'SECURE_AUTH_KEY',  'Z8E6_cO@dU%v@e<B;YT0VRMnCG6]X{DZ9Z1wM *Oix&tKyfH.W?Izk26Ngy*>=y-' );
define( 'LOGGED_IN_KEY',    'HJmL( s<_OHVKTSbbF9Hv>nx!S@BAbt$=^R%C!M*/cX*??$I*;jI #YB}1&ymSe2' );
define( 'NONCE_KEY',        'QMt=?l?^lPVdCxVamM{?N&!py5qtFcgDJF|^G,)w4El(vpoS8}J8KR^X~9/-S#P:' );
define( 'AUTH_SALT',        'jx3(ZNDIyu4O%(|6K?*cwgj#_OdR)O9AO>@se~{9V5#cgH}-8@+t]AhhY+]!}*ao' );
define( 'SECURE_AUTH_SALT', 'oM%~*_[2%!4@h>P[)!`840]h_(!f[f[tZ!`voE>}Qe3_7RJ@8Fa15DCpNzv:pBTr' );
define( 'LOGGED_IN_SALT',   '(_%dy3^:@}.~:Idq8giG@qmRaEo*c4K8{2vd^/ON :v)l3NaRLN`O?XGg%t<[9:{' );
define( 'NONCE_SALT',       'Z&;G4!~s9?hj=-O*IlJ}BE<zG3?nMjdG`C1$3/?PQR)F7=l)OuY>,WheHUW2^Co!' );

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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
