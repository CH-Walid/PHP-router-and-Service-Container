<?php

$URI = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
  '/' => 'controllers/index.php',
  '/about' => 'controllers/about.php',
  '/contact' => 'controllers/contact.php',
];

function abort($code = 404) {
  http_response_code($code);
  require "views/errors/{$code}.php";
  die();
}

function routeToController($URI, $routes) {
  if(array_key_exists($URI, $routes)) {
    require $routes[$URI];
  } else {
    abort();
  }
}

routeToController($URI, $routes);
