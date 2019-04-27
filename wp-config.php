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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'newsletterdb' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '@v0un8ma*NE?k&z K}wFWy[p< FK6[oaN,/2*;HyC9B~s.[-5QufXJf$;A|m:l)~' );
define( 'SECURE_AUTH_KEY',  'c!*z#M812zaYDL(-Hxwhv+fH-Wx{0!OWt_[gT1ft[fl/W/#Tz%(:0|>;Ggqv? #W' );
define( 'LOGGED_IN_KEY',    'dkol&/=HNG$#,.^8eTb[AS#qNd`)xBbfwt_o<HXBvEud[tK1zs*QFE}n4b74p@Oh' );
define( 'NONCE_KEY',        'xw#by&_ar aKZ[X~MN.Aj0!08]MNq.u1.Y^r#@jgdrD;%/o}P FsJ!-vfS~{Y6N.' );
define( 'AUTH_SALT',        '~.$.HVH-])Hk^m@fuZyW(zc7)$W1XXK(WwJG*B]MfMEs^59vg?y#HFC|[zDqa hr' );
define( 'SECURE_AUTH_SALT', ' J;=uVVjwi{F;`[9w?X^6PSB=OM:`|x5}uJw3n@[LDZUTapzGzLAmyxX|qQ%MkBI' );
define( 'LOGGED_IN_SALT',   '/9cL82?25ftL%hZ<@Yy<:aLCg`/$$JJr{aI8*&nd;Y_g_0I-=a1Yl<q8Ri ~EO8,' );
define( 'NONCE_SALT',       'a-jt*{~^];MGq1K#UVkb-QOsgnAJzcAKv+JH4X*31?!se)|HvY;O1tk1eV`(|lwe' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
