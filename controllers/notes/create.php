<?php

use Core\Database;
use Core\Validator;

$user_id = 1;
$errors = [];

require base_path('Core/Validator.php');
$config = require base_path('config.php');
$pdo = new Database($config['database']);


if($_SERVER['REQUEST_METHOD'] === 'POST') {

  if(! Validator::string($_POST['body'], 5, 255)) {
    $errors['body'] = 'A body more than 255 characters is required!';
  }

  if(empty($errors)) {
    $pdo->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
      'body' => $_POST['body'],
      'user_id' => $user_id,
    ]);
    header('Location: /notes');
  }
}

require view('notes/create.view.php', ['heading' => 'Create Note', 'errors' => $errors]);
