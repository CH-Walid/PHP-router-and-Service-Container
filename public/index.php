<?php

use Core\Router;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function($class) {
  require base_path(str_replace('\\', DIRECTORY_SEPARATOR, $class)) . '.php';
});

require base_path('bootstrap.php');

$router = new Router();

require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);