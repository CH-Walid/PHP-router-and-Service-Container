<?php

use Core\Database;
use Core\Validator;

$user_id = 1;
$errors = [];

$config = require base_path('config.php');
$pdo = new Database($config['database']);

if(! Validator::string($_POST['body'], 5, 255)) {
  $errors['body'] = 'A body more than 255 characters is required!';
}


if(!empty($errors)) {
  view('notes/create.view.php', [
    'heading' => 'Create Note',
    'errors' => $errors,
  ]);

  die();
}

$pdo->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
  'body' => $_POST['body'],
  'user_id' => $user_id,
]);

header('location: /notes');
exit();