<?php

use Core\App;
use Core\Database;

$user_id = 1;

$pdo = App::resolve(Database::class);

$notes = $pdo->query('SELECT * FROM notes WHERE user_id = :user_id;', ['user_id' => $user_id])->get();

require view('notes/index.view.php', ['heading' => "My notes", 'notes' => $notes]);