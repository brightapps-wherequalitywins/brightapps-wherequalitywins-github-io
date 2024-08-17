<?php

if (! defined('ABSPATH')) {
    define('ABSPATH', __DIR__);
}

/**
 * Globals
 */
$view = [];
$section = '';
$request_uri = $_SERVER['REQUEST_URI'];

/**
 * GET Query string
 */
$server_query_string = (isset($_SERVER['QUERY_STRING']) && (!empty($_SERVER['QUERY_STRING'])));
define('ESC_QUERY_SRING',  $server_query_string);

/**
 * Selecciona el idioma del sitio
 */
$lang =  $url = !empty(explode('/', ltrim($request_uri, '/'))[0]) ? explode('/', ltrim($request_uri, '/')) : ['en'];;
define('ESC_LANG', $lang[0]);


/**
 * Idiomas disponibles en el sitio
 */
$aval_lang = include 'languages.php';
define('AVAL_LANGS', $aval_lang);

if(empty(AVAL_LANGS[ESC_LANG])){
    http_response_code(404);
    return false;
}

/**
 * Seleccionar del listado de vistas
 */

$views = include 'views-' . ESC_LANG . '.php';
define('ESC_VIEWS', $views);

require ABSPATH . '/functions.php';
require ABSPATH . '/render-html.php';