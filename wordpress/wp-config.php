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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         ':ne c+~p~mWMo(3:n[/[1$^17A(m8$ zSmsAslC9b95|6y1cFoPI!Gq@SOADB_q5' );
define( 'SECURE_AUTH_KEY',  'B2FWGivB%:hA<FEd&2v=xqB kKst {7I9UC7Oc}kD40=V_^JZ86j)W1Y>)`Y Mfw' );
define( 'LOGGED_IN_KEY',    'v*=m!u{gZWt/!m1+[Q|tc$eV{VJCp#=+b5E4t(^7x4]|xh6{(c>*Wf)Xsx8-M2em' );
define( 'NONCE_KEY',        '~gfgM9AK)y/TIm!>>JR:~PcKsw=0p_@LjPRYLAo$V0_dX]=z_tUo_DDCU/EjfLFI' );
define( 'AUTH_SALT',        '[#u?Jv<lrHPv&T8L.ZX1KioA5Y,2sPK;01Je1%sx/Z:)pg.nZI(kw#;:o~yj3V]B' );
define( 'SECURE_AUTH_SALT', 'SFtcPfs]aD.!y^c$RRusNo#%A==#E@z3D<7vt7b+S^$}&b%M[rTI$fpVMVXJ(2^5' );
define( 'LOGGED_IN_SALT',   'CzhWeq-/y5`.WY-:e9Q|g|Mn)M![*U%(JU8i]tF-B8-+..h|5?Z0LCx(<RA2WfJ5' );
define( 'NONCE_SALT',       '-,ab=y2G3o*6Q0@N#I[b!.f.]Omp|k|: Xw4w8.F*r6%mp5`$1X6bY]aD/C+n0&2' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
