<?php

$routes = require base_path('routes.php');

function abort($code = 404) {
  http_response_code($code);
  require base_path("views/errors/{$code}.php");
  die();
}

function routeToController($URI, $routes) {
  if(array_key_exists($URI, $routes)) {
    require base_path($routes[$URI]);
  } else {
    abort();
  }
}

$URI = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($URI, $routes);
