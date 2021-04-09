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
define( 'DB_NAME', 'platzigift' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'JGT<^Lfts?qYAL_rIH.wr[w4^OeCvEJWJC9gz]4Zp8udNdg+|wUqs|9!49&XY9%6');
define('SECURE_AUTH_KEY',  '1F3`gN~kI4[^-$FHD|aVZ,>s<Q-W+-X11PLPyjYU=skML7kb*&U0n!Ix54R-=-+g');
define('LOGGED_IN_KEY',    'i1gBJ7P$[zs|xw|>VmC-9`I&0e-v6AF^Qr*{{e1z5:]oyc-|{(4zSOXGhMQ07d7g');
define('NONCE_KEY',        'W5/}]]=O8qeDw;*eV8*U.4Z>;@|BD55$P8;%>B(q)YQVyJND6hnh9}NLkr10tyd^');
define('AUTH_SALT',        'FPc~&`5%baTJv>BQ#]L%t7sMy<JXS<W!bB+CQ-Sp(g;kw7m%gN/s%83s9P/U!)oE');
define('SECURE_AUTH_SALT', 'B$cIX_^]RN|J|.GRku>ItD7ecGF&=m6xyQXg(`cD{&%b,dxPIeY0_d@eQwt4uhX6');
define('LOGGED_IN_SALT',   'TFY2Wyb{t+GzyE#!b/-XTBRe/vETdD8p5Bt*c4Zs5;91b-(7-0tvSfR9l/VSIf/E');
define('NONCE_SALT',       'WK)KW=g)Vi:-P_E!^+ky+Qn7,1K+/Vgu+nV}&2#e:[GA;mJrdo?Btr$k$#`RByQT');

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
