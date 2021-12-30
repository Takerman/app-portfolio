<?php

/**
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 * @package WordPress
 */

// define('DB_NAME', 'takerman_tanyo');
// define('DB_USER', 'root');
// define('DB_PASSWORD', 'Hakerman91!');
// define('DB_HOST', 'localhost');

define('DB_NAME', 'dbs6nibju2kcuj');
define('DB_USER', 'um7kwb8zorzrm');
define('DB_PASSWORD', 'um7kwb8zorzrm!');
define('DB_HOST', 'tanyoivanov.net');
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

$table_prefix = 'wp_';
define('WP_DEBUG', true);
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

require_once ABSPATH . 'wp-settings.php';

# custom configurations
@ini_set('upload_max_size', '256M');
@ini_set('post_max_size', '13M');
@ini_set('memory_limit', '15M');
