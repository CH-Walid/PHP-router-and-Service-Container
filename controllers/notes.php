<?php

$heading = 'My Notes';

$config = require 'config.php';
$pdo = new Database($config['database']);

$notes = $pdo->query('SELECT * FROM notes WHERE user_id = 1;')->get();

require 'views/notes.view.php';