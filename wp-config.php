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
define( 'DB_NAME', 'wordpod' );

/** Database username */
define( 'DB_USER', 'phpmyadmin' );

/** Database password */
define( 'DB_PASSWORD', '#1122phases' );

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
define( 'AUTH_KEY',         'q~+ThK-{yoxEC=U*4DyW}H6b:|X|bx}y<ToSLy4y)?kQr=hDBg7oL*;|<smX*U:j' );
define( 'SECURE_AUTH_KEY',  '$.Ui*<Vq;gCYw4LV@u6,y0PB,XF(oSk?c_jSMs?lM=K`L|/N%Za,))4475kSvXgz' );
define( 'LOGGED_IN_KEY',    'j#}Dx2NWMT=i{oIANd[d@[4[vpzx>iAd|3rSl)=)A;uupO>6Av<SiT(l DwWqVD&' );
define( 'NONCE_KEY',        'X+J0>e8fw)kXd]flD^G:;AP^h1K`0lsSX@lNI1lOyc0N~O |@kt>;E^7>zPxg@uY' );
define( 'AUTH_SALT',        'ZkfUbe>9-u)mopOc`.i_If?<2ZYRi}A@Vey[|Iz9XC8^{iZRP2POtgZz.z@Xqiv}' );
define( 'SECURE_AUTH_SALT', 'M8&$vNK{vd6.G&NRola^POMVVY1O;]>!or&T16YgVn]<6LoaTR<frA!RQ_n$V9Hs' );
define( 'LOGGED_IN_SALT',   '8trF3~[n)r~Wqu>!N+!N=)=ElGR 1>AG4nL0(a@ub3HsEWP!hm@@1|ar|;S1%|u0' );
define( 'NONCE_SALT',       'E>w;4-W|T$tZY.$21X*:uB=h/.cf?:J (i7PPFshOIFDn>:6+@|nGhuJ6PQkjQ6h' );

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


define('FS_METHOD', 'direct');

define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', false);
define('WP_DEBUG_LOG', true);


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
