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
define('WP_CACHE', true);
define( 'WPCACHEHOME', 'C:\xampp\htdocs\camera\wp-content\plugins\wp-super-cache/' );
define( 'DB_NAME', 'camera' );

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
define( 'AUTH_KEY',         '#v}OEgN`_<fOUKL/`l;I3voGL[q^-f5ULD7;N=Xyl|B]p&mCrJPcs:$JJaK^(h*{' );
define( 'SECURE_AUTH_KEY',  'ZLiEA$>%m_ ^P|8#Qy`6Fke[PvuzcQA!&J#=Fv01H>Xmx%(xAM[SI/[ubPIazGv^' );
define( 'LOGGED_IN_KEY',    '7*F,JiXwe^G`>+Xg&C-rdYoa4 pPg# ORf)s-Zr9myI8vlE)OV2DK=pbV4:,zjYz' );
define( 'NONCE_KEY',        'I1IF[0%B9f#axm^VsuPQ~My*m F+$dw,^GLPdz+<6^mRX{peT7?!3|A{L/dyTJIH' );
define( 'AUTH_SALT',        'c8[X8(Rqq2@d!6#68]`,yA0R)HVpIsB4t%7OMO[0K(x^JSspIdb=$3fPn%POJ{vu' );
define( 'SECURE_AUTH_SALT', ' vsH&GvJ_XU&ma3i+xYm&OTPRSN)]/lvClzV8doXZ*@ro-*%T)?Z|V_3T]?~hk;`' );
define( 'LOGGED_IN_SALT',   'aU)iD*LPWIV]?p}&`W_<Tv{}+KD(wV%,r )BGCj@V*0g4^GNHAu7rpBu+:CB}N1f' );
define( 'NONCE_SALT',       ';RN$xM{wJM?:%-Q4M~-Ib&>Rxyd2ar,d9Ao-)<oC[ZgX0$l0|TE)UzgW;q]@Bp!;' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'cmd_';

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
