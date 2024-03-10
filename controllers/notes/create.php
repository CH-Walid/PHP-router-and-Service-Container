<?php

$heading = 'Create Note';

$user_id = 1;

$config = require 'config.php';
$pdo = new Database($config['database']);


if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $errors = [];

  if(! Validator::string($_POST['body'], 5, 255)) {
    $errors['body'] = 'A body more than 255 characters is required!';
  }

  if(empty($errors)) {
    $pdo->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
      'body' => $_POST['body'],
      'user_id' => $user_id,
    ]);
  }
}

require 'views/notes/create.view.php';
