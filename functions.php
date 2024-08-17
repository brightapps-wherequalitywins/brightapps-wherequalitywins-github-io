<?php
if (!defined('ABSPATH')) die("You don't belong here");

$view = view_selector();

function view_selector(){
    global $section;
    global $request_uri;
    /**
     * Quitar las queryvar
     */
    if (ESC_QUERY_SRING) {
        $request_uri = explode('?', ltrim($request_uri, '/'))[0];
    }

    $url = isset($request_uri) ? explode('/', ltrim($request_uri, '/')) : [];

    $query_string = $url;

    $section = (isset($query_string[1])) ? $query_string[1] : '';

    if (count($url) > 3) {
        array_pop($url);
        $query_string = $url;

        $section = (isset($query_string[1])) ? $query_string[1] : '';
    }

    if (!$section) {
        return ESC_VIEWS['index'];
    }

    if ($section) {
        if (array_key_exists($section, ESC_VIEWS)) {
            return ESC_VIEWS[$section];
        }
    }

    http_response_code(404);
    die;
}
