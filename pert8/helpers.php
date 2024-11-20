<?php
function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function abort($status) {
    http_response_code($status);
    require "views/{$status}.php";
    die();
}