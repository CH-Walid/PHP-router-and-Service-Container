<?php

require 'functions.php';
require 'router.php';
require 'Database.php';


$pdo = new Database();

$posts = $pdo->query('SELECT * FROM posts')->fetchAll();

dd($posts);