<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'peterfogh_dk');

/** MySQL database username */
define('DB_USER', 'peterfogh_dk');

/** MySQL database password */
define('DB_PASSWORD', 'Gf2SnjLd');

/** MySQL hostname */
define('DB_HOST', 'peterfogh.dk.mysql');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '<PZWN,}_`!b#2<jxTB4&m^2cnDm_T=>:$BiA>G!;3TTHR3HQOR]{p+q&x`WoNm--');
define('SECURE_AUTH_KEY',  'Z/xkiC-PvR+^[)n]<|BqQjps8m-o _W<HmRJ#g9gj&~1Pw,(>-#=^mBC>l+U+.C ');
define('LOGGED_IN_KEY',    '%b]A@K{j2ka;KD-hdzg| h`,KVA(?z;]PJ&&dhkL+P~:^Mv=q|Vzv=QNN7UKy:OZ');
define('NONCE_KEY',        '604FHn-x^5IRXZ_qRCpR`sT(jxC2_UY0~Xvo|C7mV}0=:K/B9L0MhF+z$J--1I<P');
define('AUTH_SALT',        '~-My(Mcy!3zC[)d#&WM>|ja^-[4R~,%P76hx1uD?W#Uh65G_oMcBHa_`=!;y,^7_');
define('SECURE_AUTH_SALT', 'Py7:L)rClD+7*=Do8x~P6KW%/ZWf>^f.p9a>[{LNlPM9(keZ?nRL~;h-%I`nP)y8');
define('LOGGED_IN_SALT',   'VAp5qYs(D<flI1x}+;3C/BoH?e)q69+$Q{|.Ksb%beX2TEiVjE<1SJAfehMU5rv!');
define('NONCE_SALT',       'PKg?C||Lw~up(hnW$NEv,oUjW?~O+=-7+DI{%*Ji+!dv^*v[jJ|(3++`lL?rZpEU');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_first';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
