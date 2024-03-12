<?php

use Core\Database;
use Core\Response;

$user_id = 1;
$note_id = $_GET['id'];

$config = require base_path('config.php');
$pdo = new Database($config['database']);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $note = $pdo->query('SELECT * FROM notes WHERE id = :note_id', ['note_id' => $_POST['id']])->findOrFail($_POST['id']);
  
  authorize($note['user_id'] === $user_id, Response::FORBIDDEN);

  $pdo->query('DELETE FROM notes WHERE id = :id', ['id' => $_POST['id']]);

  header('location: /notes');

} else {
  
  $note = $pdo->query('SELECT * FROM notes WHERE id = :note_id', ['note_id' => $note_id])->findOrFail($note_id);
  
  authorize($note['user_id'] === $user_id, Response::FORBIDDEN);
    
  require view('notes/show.view.php', ['heading' => 'My Note', 'note' => $note]);
}