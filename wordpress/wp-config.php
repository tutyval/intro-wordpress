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
define('DB_NAME', 'prueba_wp');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY', 'e`EKN!8[T4FLslz; +j.!IL5@rfnuB@t&,uy]$yY8Zojd=13~JF6SaX9GUE4`)U(');
define('SECURE_AUTH_KEY', '[;45y=8CGu<X,W3|8aMk+C|2TS$[EvNW6@R0tYm2d4}wK(8P(s0f0dnI6vw*Md T');
define('LOGGED_IN_KEY', 'Cm`gf/y9WioD ._hB67:2Q(TPEnCC[+]G/CY*I*9<beaHX]V/TAH@|D4nboZ9e1>');
define('NONCE_KEY', 'Ej}OU>8B.Av -?Wm;We1^M`DV4e;E*$!.=IU:}Z3F1`{feTdZVp~d{bEzn)=<lC_');
define('AUTH_SALT', 'OYlsFNRE0N}1Y?i]4])qBD AtJh6=DI;vCK3I=c-i;]h$ FcC5i#.n~E$hhYkWw-');
define('SECURE_AUTH_SALT', 'A[rbS/F[1F}c>G|fkGDKl6j5O;y3z{GG.`M.q2;y+,PEec>pNeC,vBw[%~+B[,sI');
define('LOGGED_IN_SALT', 'f(.).s UU_6v(-==P~f_PJ3mCB@2gsYY!^6ap5!hsen=)^rDct,4;T+vI$<=cQIn');
define('NONCE_SALT', '[i0$J@;A}pbu]*cYQ7_w8pBpw=0;><@?<qBJ-5Bbf,`PuP)~}Ifb)G8C{tQ|khL|');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'dl_';


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

