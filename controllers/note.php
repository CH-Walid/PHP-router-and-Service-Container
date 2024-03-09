<?php

$heading = 'My Note';

$user_id = 1;
$note_id = $_GET['id'];

$config = require 'config.php';
$pdo = new Database($config['database']);

$note = $pdo->query('SELECT * FROM notes WHERE id = :note_id', ['note_id' => $note_id])->findOrFail($note_id);

authorize($note['user_id'] === $user_id, Response::NOT_FOUND);
  
require 'views/note.view.php';