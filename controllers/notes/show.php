<?php

use Core\App;
use Core\Database;
use Core\Response;

$user_id = 1;
$note_id = $_GET['id'] ?? false;

$pdo = App::resolve(Database::class);

$note = $pdo->query('SELECT * FROM notes WHERE id = :note_id', ['note_id' => $note_id])->findOrFail($note_id);

authorize($note['user_id'] === $user_id, Response::FORBIDDEN);
  
require view('notes/show.view.php', ['heading' => 'My Note', 'note' => $note]);
