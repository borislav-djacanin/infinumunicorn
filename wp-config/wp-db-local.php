<?php
// Prevent file from being accessed directly
if (!defined('ABSPATH')) exit();

define('DB_NAME',     'infinum');
define('DB_USER',     'root');
define('DB_PASSWORD', 'acke1996');
define('DB_HOST',     'localhost');
define('DB_CHARSET',  'utf8');
define('DB_COLLATE',  '');


define('AUTH_KEY',         'tjUYH0d~Kd:?WQn#4.qb=2:@dfc3|:nn*aSA>Y;F,WT.W}rp}pa<2=H=tR`vciyZ');
define('SECURE_AUTH_KEY',  '5;m<2bO#i+|oSDC4&Kl#<<?pt^va!KFoj>Y.@.:{FOF,N:61(,T%lHGPvR:?MG7o');
define('LOGGED_IN_KEY',    '4AvhnPNPXWZlD}m-v3$2,mK3]}vd^c7O?,O!NGx<U(AJbsQ.$I7v[4jz)}|4}-P7');
define('NONCE_KEY',        '-#QY}a:TAe;@8 GXgL|W.SI*Rr4hKt(*~SZ,1kx{q20Nm1A$dKK{f) CfWEa@5zZ');
define('AUTH_SALT',        '+On`{I<.}:/rhnY(rN6m; LOLSl+qJNx2eZoefDIa(0Z/u1WHt,op2_5v6?LltHa');
define('SECURE_AUTH_SALT', 'uIQ0LvB2c| Lq5k(?n^Nx@/L:Z~3CL*KszO9@OUz(cLToYz@*m`DE_s),ELR1ZKM');
define('LOGGED_IN_SALT',   '-BWJ$&c?[DS$<1|Gb-A6MU$&j;Cf.g`Y0_nms1J|:{YxR@mqn0tC8zsCi4/z@3$#');
define('NONCE_SALT',       'w+*6PC<Utmr=.Smrh3 I0Q>HU7Ze5oA7HH(1$A^](~[E=zu1AlK`a%lk+ZWnndy(');

$table_prefix  = 'bd_wp_';

define('WPLANG',   '');
define('WP_DEBUG', true);
