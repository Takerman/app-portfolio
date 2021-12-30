<?php
define('WP_HOME', 'https://tanyoivanov.net');
define('WP_SITEURL', 'https://tanyoivanov.net');

define('DB_NAME', 'dbs6nibju2kcuj');
define('DB_USER', 'um7kwb8zorzrm');
define('DB_PASSWORD', 'um7kwb8zorzrm');
define('DB_HOST', 'localhost');

define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');

// https://api.wordpress.org/secret-key/1.1/salt/

define('AUTH_KEY',         't,@G2lRB;Jsi!Nf7`x]kUo%O-!Cw#UJBS%%bxvFj;HH`3Z!89D83Rs+ar1;5EhJc');
define('SECURE_AUTH_KEY',  'kUT<DU^0(s]xd0~bx*<`$D#mQc=m+a<ncJADR<GGX#Gc y+LR+QgxC~-N&*<-`Qr');
define('LOGGED_IN_KEY',    ',?EI=8k)g0<k/)ZoDqb?*-oIC$Z9Zv(C{529a>R6Z(R%z6-P]^.Jjk;Q^|8pCegT');
define('NONCE_KEY',        'VMe;z4#3/<BT9Cri`dg5c|}G297XxNU2F7|M,0!8]-|V453C-m>72f8`36d$s_!j');
define('AUTH_SALT',        '2y?.OHMY.kJerm~,t5)iIRfoumGa=&5Lxup-,p3L7)PB0Oh 1q01mZ_Lo8[E;64.');
define('SECURE_AUTH_SALT', '6#}HdMcu_tV(/wWa1iREl#rD9DzR-ttTn}0@XIvoO@U|sXA+d4|-1jaxE|&T:rT|');
define('LOGGED_IN_SALT',   'i-P5|nAs#sUZJIu|U}sI+7}ryc5EsoGXv%.w_#^8-bBhf!Opk`&@7j.?I2WR} =I');
define('NONCE_SALT',       'Z}G}Q?Ysp1f+m5`QUT#w#8Bya0|<|xRl>lK,H-wM>A}gT6:Y,-j=v<7W%c-}]r-8');
define('WP_CACHE_KEY_SALT', 'Ge4~%O1,L1y6liy[/J*5PfB)b4wY{5.nw]qOvqc~C}k!L6/TG}eUJ@EqgFCP{0+?');

$table_prefix = 'wp_';
define('WP_DEBUG', true);
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

require_once ABSPATH . 'wp-settings.php';
@include_once('/var/lib/sec/wp-settings.php');

define('DISALLOW_FILE_EDIT', true);
define('WP_ALLOW_REPAIR', 'true');
