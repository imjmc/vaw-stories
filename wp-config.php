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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'Mp).burpy^o6xu@CrB+hz|z(8*Pfm9!p?LF|?J[@+Jd>;Dcz/wCT,&Ue61eU@3cr');
define('SECURE_AUTH_KEY',  'B :Qz[,9#}(|S3~QIiAXTaM?hrzulfH+Z_j/-y%cI?/HXF_<jCux~aZ4#SaoRA/>');
define('LOGGED_IN_KEY',    'W@i$^7Y6Md4V--<oeE3 dl|=!U]7$|ugV3UYp2Zaa4JtRaP8}<_Cplkj,8cOC%>f');
define('NONCE_KEY',        '4-F9^o-LKl? vLO,FfVnWcHEpR~am>k&#ja/*]9yfq{TgQUvuvtl#pWcRRve,9)R');
define('AUTH_SALT',        '0 T=cjq=V+eYl^-u>K?zb|gIr*-x(EaVXIMxh[Lc.[3Mt1)ApAL}CfoG:Nep5.cj');
define('SECURE_AUTH_SALT', 'aP=(].c>TTxR%8uEvdufFHthSsfPHaw,e4S!OK# |~)VyYbeLBjG-#<!ocKSkib2');
define('LOGGED_IN_SALT',   'sMo:JLZ0}kj+H]+hbPp9=dH5zm lMFw4qy~$<+d-a b;!ygrw|XOEisIO3#O2t$p');
define('NONCE_SALT',       'hDvv]L@f^=.TSQM}S&@0i]]/^hgEYj}k/~.z}bhW[shq-Q8iMGq8!,<kLWG.0y{r');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
