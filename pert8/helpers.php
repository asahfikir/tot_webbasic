<?php
function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($status) {
    http_response_code($status);
    require 'views/'.$status.'.php';
    die();
}