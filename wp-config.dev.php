<?php
define('WP_HOME', 'http://tanyo');
define('WP_SITEURL', 'http://tanyo');

define('DB_NAME', 'takerman_tanyo');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

// define('DB_NAME', 'dbs6nibju2kcuj');
// define('DB_USER', 'um7kwb8zorzrm');
// define('DB_PASSWORD', 'um7kwb8zorzrm');
// define('DB_HOST', 'tanyoivanov.net');

define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');

// https://api.wordpress.org/secret-key/1.1/salt/

define('AUTH_KEY',         ' T@ j#.KXBX+gj8-Y{Zm g%M&K/Y_1qnTSdGAt~?n|@~O:Mb BF*2QUDw_An+y~L');
define('SECURE_AUTH_KEY',  'p0HWY,?i-}(/<qby(q }W}{:5fZ7<Yk;p~kU!#}Ekf5H{eh)@ <#Ee7$tq)QM:Q7');
define('LOGGED_IN_KEY',    ';:Op,xjxQMGE>)4Dj}z.c_$bR%qIFrbguPS0d;eg;Jz~!9c[D!64YlHb:X?LJM*W');
define('NONCE_KEY',        'D_j~Zs6Mj1Dd}Y%glt{p+[-?x`>`U<$Q_J(Y9Y-V:!BB;4A`J|Jx*aK-29EN@WE,');
define('AUTH_SALT',        '+@CnB>twNP,Ts6:;9b7|LreWkj-Sm-]U`R1u*#LC=;l<nC%%d6^}|x~f[j.f&++n');
define('SECURE_AUTH_SALT', 'Lg9`M[?;*+JN-<+FJ.|f9u8jF1870/EA/J{[9!V^[0H!fV@IJl0}}/:)}b.^,QU:');
define('LOGGED_IN_SALT',   'wd#i$+ZX=iCM1J^>u_g;mmR@_E{N!SJ=<vw&L2=4]2CxP{?.Tc7cx7hrd~{=UprB');
define('NONCE_SALT',       '(uL3_)kBV!x7.h&L7E^Q-L,PBPuZ8cBaa0h#AC<-KP<5ojG^CXlJrOasY8kVyC|k');
define('WP_CACHE_KEY_SALT', 'Ge4~%O1,L1y6liy[/J*5PfB)b4wY{5.nw]qOvqc~C}k!L6/TG}eUJ@EqgFCP{0+?');

$table_prefix = 'tan_';

// debug
define('WP_DEBUG', 'true');
define('WP_DEBUG_LOG', 'true');
define('WP_DEBUG_DISPLAY', 'false');
@ini_set('display_errors', 0);
define('SCRIPT_DEBUG', 'true');
define('FS_METHOD', 'direct');

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

require_once ABSPATH . 'wp-settings.php';
@include_once('/var/lib/sec/wp-settings.php');

define('DISALLOW_FILE_EDIT', false);
define('WP_ALLOW_REPAIR', 'true');
