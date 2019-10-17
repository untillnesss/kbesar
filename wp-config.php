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
define( 'DB_NAME', 'kbesar' );

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
define( 'AUTH_KEY',         'JQ_BRD5odCBE4GBfw1OeO7 SD%nOyFKwN]Gh_wavi/n7P|2}gt@@d;AI[}blhoWl' );
define( 'SECURE_AUTH_KEY',  'va60Z0:0]UqJ4c%rO+IX8`V=CqsdYKHK`it#jnMU^u&gZrZ%|f(oXKc@T.Q~c{S~' );
define( 'LOGGED_IN_KEY',    'mPV{*<uHs>GH=T=QveKDZXrG|>@8|-wqv.,6NgCgM)50)7AUY]sfUJBfT}:O?mBO' );
define( 'NONCE_KEY',        '=*WX!Qgd5bg6!STuH$=o*&j0}2R,FoO:MhgHVN{*U~OuMtC^Ep-{PkbI;rNij8Ho' );
define( 'AUTH_SALT',        '*tc/[FvSfe:R63%BF[Aa$aW)$L,dj~OOclO1Er:C]$[afR>9H:[`,?CxDZ:nYqGc' );
define( 'SECURE_AUTH_SALT', 'I/)3eOsz|53!WnIv1Q?,-1-k# jDdkfKXqVj{8iEF+WEE)aZ[iL+{UIYPKl]rJU&' );
define( 'LOGGED_IN_SALT',   '6d8#HSj/t{2S&!`FwLdN=K/jR*9LXj *jw^hj.lc?H9u2|!Ido ~9e.x/jVqgAb@' );
define( 'NONCE_SALT',       'N k/87x[@1IP |]ep!ovj#?Bi;qBnk=6KP1P5R]VlHN<%4jVvMdiOOye6`%8Vejz' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'kb_';

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


@ini_set( 'upload_max_filesize' , '128M' );
@ini_set( 'post_max_size', '128M');
@ini_set( 'memory_limit', '256M' );
@ini_set( 'max_execution_time', '300' );
@ini_set( 'max_input_time', '300' );