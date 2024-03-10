<?php

$heading = 'Create Note';

$user_id = 1;

$config = require 'config.php';
$pdo = new Database($config['database']);


if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $errors = [];

  if(strlen(trim($_POST['body'])) === 0) {
    $errors['body'] = 'A body is required!';
  }

  if(strlen(trim($_POST['body'])) > 255) {
    $errors['body'] = 'The body can not be more than 255 characters!';
  }

  if(empty($errors)) {
    $pdo->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
      'body' => $_POST['body'],
      'user_id' => $user_id,
    ]);
  }
}

require 'views/note-create.view.php';
