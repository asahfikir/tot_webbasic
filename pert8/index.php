<?php
require "helpers.php";
require "Response.php";
require "Database.php";

$uri = $_SERVER['REQUEST_URI'];

// Setup DB
$dsn = "mysql:host=localhost;port=3306;dbname=myapp;charset=utf8mb4";
$db = new Database($dsn, 'root');

$routes = [
    '/' => 'controllers/home.php',
    '/posts' => 'controllers/posts.php',
    '/admin' => 'controllers/admin/index.php'
];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    abort(Response::NOTFOUND);
}