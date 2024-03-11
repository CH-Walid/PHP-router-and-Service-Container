<?php

use Core\Database;
use Core\Response;

$user_id = 1;
$note_id = $_GET['id'];

$config = require base_path('config.php');
$pdo = new Database($config['database']);

$note = $pdo->query('SELECT * FROM notes WHERE id = :note_id', ['note_id' => $note_id])->findOrFail($note_id);

authorize($note['user_id'] === $user_id, Response::NOT_FOUND);
  
require view('notes/show.view.php', ['heading' => 'My Note', 'note' => $note]);