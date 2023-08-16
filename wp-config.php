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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'task' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'BsXCL4G,E6o?GJqFP1[YZl*SQ_P@X.n5mC)TB<*C1~n`bhD;_d|3=]YH28Dy|sJH' );
define( 'SECURE_AUTH_KEY',  'WjX7b!maW-Ab,mPe$p!.frI71lDFSZC Bv]}0RAXS.TaE:pq=KD-Kk)PXhy|B`vC' );
define( 'LOGGED_IN_KEY',    '(O$+7p(WdFuEPg!&Vgr7*fmq6OT;02UdMd_]i{yp6~.m|)e`nRW)?VGI@=_K2 )v' );
define( 'NONCE_KEY',        '~j@>)r` &t0~[L;}~_e=+zhM7&koIrQB3Ud$A>%>H[+T&o;4|M~#?,ZmNS3=]C{&' );
define( 'AUTH_SALT',        'U@N-)ZvgL?nf?R>H?3Sd4ZCC+*;MLOze?|ymwY+s?:A0LgV2:BnEH?A7i&3b^hvn' );
define( 'SECURE_AUTH_SALT', ' D a_Ei$DOtTv#-0z37[8|LCgrK~kc3Utt]HBrO>Zh|^Qin~jC^uk`&-{D%mGrwL' );
define( 'LOGGED_IN_SALT',   'ZOaFwB?fl!Jy5isqmrdsX, ;Z%;iCg;L,!,GVTe-g?sW$RCto8f0?f$3+r<?;bpJ' );
define( 'NONCE_SALT',       'Iv!;rX@i%@E&K9C3*(7c2)s+ClA8fBTDg*N<Q;>WS4?X$)$;8?gfdD@*Q,b[{2QT' );

/**#@-*/

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
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_DEBUG_LOG', true );
/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
