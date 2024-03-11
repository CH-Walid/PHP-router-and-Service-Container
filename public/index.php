<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function($class) {
  // Core\Database
  // base_path(Core/Database.php)
  require base_path(str_replace('\\', DIRECTORY_SEPARATOR, $class)) . '.php';
});

require base_path('Core/router.php');
