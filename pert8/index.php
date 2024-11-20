<?php
require "helpers.php";
require "Response.php";
require "Database.php";

$dsn = "mysql:host=localhost;port=3306;dbname=myapp;charset=utf8mb4";
$db = new Database($dsn, "root");

// buat rute kemana saja harus memanggil file terkait
$routes = [
    '/' => 'controllers/home.php',
    '/posts' => 'controllers/posts.php',
    '/post'  => 'controllers/post.php',
    '/about' => 'controllers/about.php',
    '/admin' => 'controllers/admin/index.php',
];

// deteksi sedang berada di halaman mana?
$uri = $_SERVER['REQUEST_URI'] == '/' ? '/' : $_SERVER['PATH_INFO'];

// Check apakah $uri ada pada array routes
if (array_key_exists($uri, $routes)):
    // JIka ada maka kita panggil file nya
    require $routes[$uri];
else:
    // Tampilkan halaman 404
    abort(Response::NOTFOUND);
endif;