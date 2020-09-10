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
define( 'DB_NAME', 'fxmoqtfb_080920' );

/** MySQL database username */
define( 'DB_USER', 'fxmoqtfb_wp136' );

/** MySQL database password */
define( 'DB_PASSWORD', '7O5pTe-S]3' );

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
define( 'AUTH_KEY',         'dcyjcbnv5ttwgoex63pyajednprafc67zhhhbpbky0ok1neebquybwefoquv7oki' );
define( 'SECURE_AUTH_KEY',  'cgkfsrfvhxh6o06xrthnlshrh0x6lxxcaefnul0df77hn0v96jxfxybm5n4hp26n' );
define( 'LOGGED_IN_KEY',    'tzh9ztnvpxjt3s1jo3m9ycidfqtielfzv7jmxljrugkrsa9yqghc7ibhyyluzar9' );
define( 'NONCE_KEY',        'yshdfsdxgkmd3w3ro17rqear6iabttkftghbpl3rppl7z7vjdasabl8oedkdqigq' );
define( 'AUTH_SALT',        'ghvbexfizfxzzbh078osjbzu2hmspx5sromr5avd44agywp0vchsybjwrpt2pg1q' );
define( 'SECURE_AUTH_SALT', 'pplzw8q5ta0mjkggonkpaukkvufcu16ksfnlo6efinaowd9fem2mhm2s5smv5xzw' );
define( 'LOGGED_IN_SALT',   'b4zlundr2ko7kn2u8vdmiifkohcjhgb5prl3hc7ogl5b72rmfmzvtxnskqfa00i9' );
define( 'NONCE_SALT',       'pxmwvetbopo6nhlbbx0op1vrqqfbn7bmzvgchuawf3rbl8lvtditilgny3mcttgr' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpyv_';

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
