<?php

$heading = 'My Note';

$user_id = 1;
$note_id = $_GET['id'];

$config = require 'config.php';
$pdo = new Database($config['database']);

$note = $pdo
        ->query('SELECT * FROM notes WHERE id = :id', ['id' => $note_id])
        ->fetch();

if(!$note) {
  abort();
}

if($note['user_id'] !== $user_id) {
  abort(Response::FORBIDDEN);
}

require 'views/note.view.php';