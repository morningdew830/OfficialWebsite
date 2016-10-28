<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //

if (dirname(__FILE__) . file_exists('wp-config-local.php') && (getenv('DB_NAME') === False)):
	require_once(dirname(__FILE__) . '/wp-config-local.php');
else:
	/** The name of the database for WordPress */
	define('DB_NAME', getenv('DB_NAME'));

	/** MySQL database username */
	define('DB_USER', getenv('DB_USER'));

	/** MySQL database password */
    define('DB_PASSWORD', getenv('DB_PASSWD'));

	/** MySQL hostname */
	define('DB_HOST', getenv('DB_HOST'));

	/** Database Charset to use in creating database tables. */
	define('DB_CHARSET', 'utf8');

	/** The Database Collate type. Don't change this if in doubt. */
	define('DB_COLLATE', '');
endif;

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '{J#A[FO,_{B--I+@ 03iIQ4@$p.bo~}wpXFBnu|443oI1+/Ze,h @2:A&ac/.~w$');
define('SECURE_AUTH_KEY',  'SYr+|=qp}H@e8R;j|N0K@EtQa+7sy4KuEWr^QR2lmIfWd%&},{C#m^y8R.OVJ<r-');
define('LOGGED_IN_KEY',    'X,tzoyf:r[j&h=v~87)sS2r.7 |,_DQ&?2?&b|mFV-l#$qwgw~CZ:{.Zj(-Tr65n');
define('NONCE_KEY',        'W~ba/L^=<a[a4|)D!@#cGQV?r0@#-h~P,kk<QLAV}!K}u(2ezfd]k?XYETT,Ooqv');
define('AUTH_SALT',        'TkZr9_HV~#!_W1J#9b?SWtp%E->%u}VrkZrR`/HT2O|Pum+WQ!nV@GT8|^1QL=eS');
define('SECURE_AUTH_SALT', '(@J|,w-3u{}2~&$XmF}[AR73w@BI5&GO3g/_N!Mb8mg~p+>|AhWs+)0UwZS)J@v$');
define('LOGGED_IN_SALT',   'lUHFzfA]|e&@A|5vMp?BO$;~m@Yes+j`%&|4rzG+cK:t-Nq:V6AW&*Ntd1>M()<1');
define('NONCE_SALT',       'BtaYu^=p#:s[x<ifaA1![D<0_| (9YYD{4R}:D|o//d&W[8B7o*Ih%..2+rw,YPd');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
