<?php
/**
 * The base configuration for WordPress
 *
 * @package WordPress
 */

// ** Database settings from Railway ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'railway' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'kefUtwjHuzswgvuLmDNKSiWqUPvXqxTu' );

/** Database hostname */
define( 'DB_HOST', 'caboose.proxy.rlwy.net:47704' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 * You should replace these with unique phrases generated from:
 * https://api.wordpress.org/secret-key/1.1/salt/
 */
define('AUTH_KEY',         'HN-<=3ea^QtC<o,C%+:8<N523Ek6Kf[U|xhqT6GKr31K4`hZJOfL:@b[._^:|jo&');
define('SECURE_AUTH_KEY',  '$fE-CAM^)eGME2AK8lVNn+&NUthh9 Wtg5fR7c.|o?J=q[hpg+3Szv2(?uG`DDI_');
define('LOGGED_IN_KEY',    '(Lp@Eh{ RehN*WvR5T9+izEhuerM-()VNH[uh23Lo!2j<)?w[FQo#*`MA+#>Y6nJ');
define('NONCE_KEY',        'c`UQ,UX0y02aowk=Ve>=]h1exT`B^>`+ +Fu#d68L(QNK`5{jq(V=34@ry9$)eFH');
define('AUTH_SALT',        ']/P%dEr^(UR{M>ly0$cbulc#|dO>@+ 6X10GzZ`3jiLufL|O.=~H1)#!j(+|iStm');
define('SECURE_AUTH_SALT', 'TZk;q1ytazz&:H:/!zQ+;RI0MC9%6pm4GQs}[SAuv7BK6lY82w9bXW~F$;60XBWZ');
define('LOGGED_IN_SALT',   'B`,x:zl+FX+~fhc]aPo!pOCli7$+O(M8I;(g-*/SEm47:Z):GTsn},9P8k-DovaL');
define('NONCE_SALT',       'tlMSFPee/-R q7@#}-5Ch@[-b-BvR%)pZ-klCRN>x=.0Gm{!0fJ{wKEqJFDj|h#E');
/**#@-*/

/**
 * WordPress database table prefix.
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
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
