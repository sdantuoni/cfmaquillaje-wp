<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'cf-wp');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '!q 9|3noaq+dDswa. p([rlHJAeVj?q$`fAo376Oq)e5(C}4DDg7q>cg#ls>w5a,');
define('SECURE_AUTH_KEY', 'S)`D%1|j*T=e#NKK0J_&EYsBvWdA]8z!Vhjb>FGWKq4sLkOx$59f@OHQG!-VPlPY');
define('LOGGED_IN_KEY', 'A6G^J&l{pA>Zv,mBH)~K/fZRk~ji!4EIotZNd?PZXR}q8[_Gk=6K]y9?C6j{2bz%');
define('NONCE_KEY', '^j%J_ V#GW|&>y1r[H,vj<>^2m@dQ25|Ie%!E~/:|vTls{P*^eWS7r.@Cw%O_yV[');
define('AUTH_SALT', '*[Zy_M-In]}zz&ZNr>/SZQ|j4#[c]&aFaNpIp{k*)8|8KQNbpVNF7C--[A.fU1wS');
define('SECURE_AUTH_SALT', 'fDo`~NEa+$gIQRGuHOQ@G,:ptJ;]0:Y,xna8H5xn+N9&LW^0plO#(4Ic~ISUoPIZ');
define('LOGGED_IN_SALT', 'gwDw?!b_V[=0`0*C1jxi`V2;lz_F~(IEmyUK8N1f RPS4B~JD79fFlTNgMGOQr Z');
define('NONCE_SALT', 'F<JAk{!Iq$qmAgNX>OF7|>kwtK.,t?l{L`[,@b$v?;/G3MV=6IaVN59hAZ0g<9])');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

