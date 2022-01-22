<?php
define('WP_CACHE', true); // Added by WP Rocket
/**
 * Podstawowa konfiguracja WordPressa.
 *
 * Ten plik zawiera konfiguracje: ustawień MySQL-a, prefiksu tabel
 * w bazie danych, tajnych kluczy, używanej lokalizacji WordPressa
 * i ABSPATH. Więćej informacji znajduje się na stronie
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Kodeksu. Ustawienia MySQL-a możesz zdobyć
 * od administratora Twojego serwera.
 *
 * Ten plik jest używany przez skrypt automatycznie tworzący plik
 * wp-config.php podczas instalacji. Nie musisz korzystać z tego
 * skryptu, możesz po prostu skopiować ten plik, nazwać go
 * "wp-config.php" i wprowadzić do niego odpowiednie wartości.
 *
 * @package WordPress
 */

// ** Ustawienia MySQL-a - możesz uzyskać je od administratora Twojego serwera ** //
/** Nazwa bazy danych, której używać ma WordPress */
define('DB_NAME', 'wordpress');

/** Nazwa użytkownika bazy danych MySQL */
define('DB_USER', 'wordpress');

/** Hasło użytkownika bazy danych MySQL */
define('DB_PASSWORD', '');

/** Nazwa hosta serwera MySQL */
define('DB_HOST', 'db:3306');

/** Kodowanie bazy danych używane do stworzenia tabel w bazie danych. */
define('DB_CHARSET', 'utf8');

/** Typ porównań w bazie danych. Nie zmieniaj tego ustawienia, jeśli masz jakieś wątpliwości. */
define('DB_COLLATE', '');

/**#@+
 * Unikatowe klucze uwierzytelniania i sole.
 *
 * Zmień każdy klucz tak, aby był inną, unikatową frazą!
 * Możesz wygenerować klucze przy pomocy {@link https://api.wordpress.org/secret-key/1.1/salt/ serwisu generującego tajne klucze witryny WordPress.org}
 * Klucze te mogą zostać zmienione w dowolnej chwili, aby uczynić nieważnymi wszelkie istniejące ciasteczka. Uczynienie tego zmusi wszystkich użytkowników do ponownego zalogowania się.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '0DD?s! U}*<eqkR*^+rNEbtNZP(r3=FddSc.^+-kW)Vc;-QH_*P ,A*.E-h8O6H|');
define('SECURE_AUTH_KEY',  'B6wCiwM!xh_;h&|i)lNbz7KFsU;`44I5(1~gL6?[h{)8~<@8g4h_2inZ?1~jl.XH');
define('LOGGED_IN_KEY',    '|2F+^_P_`2n]:aT/c+v<4*}VKCELr67|!Of*qMMF179]DoLa Pa9s*R^-[6mPU)`');
define('NONCE_KEY',        '#FuUIp_8VK}?hnSx 4T1:n!tZi<V}bxuYiDBc73(e(MpMsVizc>V`Sr*~i0A[xOi');
define('AUTH_SALT',        '0*wN> aF<cbAE,{zBE&%p*K2MIajjs&f]m?bt-|j/jW}mL?<6|Z5M-<os=IAQYP[');
define('SECURE_AUTH_SALT', 'zyV?F:zR=}4s9z]5$AKuTZhO!I+V{@iYB,ey_t5/P72 b!F|A7+j-S fQx`m$iQn');
define('LOGGED_IN_SALT',   '`&<LrY3Gb,<u08-JHs]k~vrkh>Kvz?PGHYd0gf,vLf=-Nt)QI +Ca{~+#,UO0ji&');
define('NONCE_SALT',       'GN.DOPCNY`b{PIgdlL.9aV[?9 a$&QI72-<:!eMb|9t9f8/+hZ$;pH/oKiI-pb#a');

/**#@-*/

/**
 * Prefiks tabel WordPressa w bazie danych.
 *
 * Możesz posiadać kilka instalacji WordPressa w jednej bazie danych,
 * jeżeli nadasz każdej z nich unikalny prefiks.
 * Tylko cyfry, litery i znaki podkreślenia, proszę!
 */
$table_prefix  = 'wp_';

/**
 * Dla programistów: tryb debugowania WordPressa.
 *
 * Zmień wartość tej stałej na true, aby włączyć wyświetlanie ostrzeżeń
 * podczas modyfikowania kodu WordPressa.
 * Wielce zalecane jest, aby twórcy wtyczek oraz motywów używali
 * WP_DEBUG w miejscach pracy nad nimi.
 */
define('WP_DEBUG', false);

/* Multisite */
define('WP_ALLOW_MULTISITE', true);
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', true);
define('DOMAIN_CURRENT_SITE', 'improwizuj.pl');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
define('SUNRISE', 'on');
define( 'WP_AUTO_UPDATE_CORE', true );

/* To wszystko, zakończ edycję w tym miejscu! Miłego blogowania! */

/** Absolutna ścieżka do katalogu WordPressa. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

// Force Admin Login To SSL
//define('FORCE_SSL_ADMIN', true);

if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
    // && strpos($_SERVER["REQUEST_URI"], 'wp-admin')
   $_SERVER['HTTPS']='on';
}

define('WP_SITE_URI', ($_SERVER["HTTPS"]?"https://":"http://").$_SERVER["HTTP_HOST"]);
define('WP_SITEURI', ($_SERVER["HTTPS"]?"https://":"http://").$_SERVER["HTTP_HOST"]);
define("WP_CONTENT_URL", WP_SITE_URI . "/wp-content");
define("WP_CONTENT_URL", WP_SITE_URI . "/wp-content");


/** Ustawia zmienne WordPressa i dołączane pliki. */
require_once(ABSPATH . 'wp-settings.php');

wp_cache_set("siteurl_secure", "https://" . $_SERVER["SERVER_NAME"], "options");
wp_cache_set("home", WP_SITE_URI, "options");
wp_cache_set("siteurl", WP_SITE_URI, "options");

add_filter( 'auto_update_plugin', '__return_true' );
add_filter( 'auto_update_theme', '__return_true' );
add_filter( 'allow_dev_auto_core_updates', '__return_false' );
