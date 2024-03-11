<?php

$user_id = 1;

$config = require base_path('config.php');
$pdo = new Core\Database($config['database']);

$notes = $pdo->query('SELECT * FROM notes WHERE user_id = :user_id;', ['user_id' => $user_id])->get();

require view('notes/index.view.php', ['heading' => "My notes", 'notes' => $notes]);