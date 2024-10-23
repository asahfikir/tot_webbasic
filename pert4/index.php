<?php

$uri = $_SERVER['REQUEST_URI'];

$routes = [
    '/' => 'home.php',
    '/about' =>'about.php',
    '/products' => 'products.php',
    '/features' => 'features.php',
];

if (array_key_exists($uri, $routes)):
    require("views/".$routes[$uri]);
else:
    die('Halaman tidak ditemukan');
endif;
