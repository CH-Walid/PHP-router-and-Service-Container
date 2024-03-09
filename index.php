<?php

require 'functions.php';
/* require 'router.php'; */
require 'Database.php';

$id_user = $_GET['id'];

$config = require 'config.php';

$pdo = new Database($config['database']);

$posts = $pdo->query("SELECT * FROM posts WHERE id = :id", ['id' => $id_user])->fetch();

dd($posts);