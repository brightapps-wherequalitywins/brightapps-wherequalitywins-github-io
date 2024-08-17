<?php
if (!defined('ABSPATH')) die("You don't belong here");

// echo '<pre>';
// var_dump($view);
// echo '</pre>';
// die;

define('RENDERED_VIEW', $view['view']);

$file_path = ABSPATH . '/' . RENDERED_VIEW . '.php';
if (!file_exists($file_path)) {
    http_response_code(404);
    die;
}
include $file_path;
