<?php

require 'functions.php';
require 'router.php';
require 'Database.php';

$config = require 'config.php';

$pdo = new Database($config['database']);

$posts = $pdo->query('SELECT * FROM posts')->fetchAll();

dd($posts);