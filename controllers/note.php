<?php

$heading = 'My Note';

$user_id = 1;
$note_id = $_GET['id'];

$config = require 'config.php';
$pdo = new Database($config['database']);

$note = $pdo
        ->query('SELECT * FROM notes WHERE user_id = :user_id AND id = :id', ['user_id' => $user_id, 'id' => $note_id])
        ->fetch();

require 'views/note.view.php';