<?php

$heading = 'Create Note';

$user_id = 1;

$config = require 'config.php';
$pdo = new Database($config['database']);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $pdo->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
    'body' => $_POST['body'],
    'user_id' => $user_id,
  ]);
}

require 'views/note-create.view.php';
