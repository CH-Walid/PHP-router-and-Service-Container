<?php

use Core\App;
use Core\Database;
use Core\Response;

$user_id = 1;
$note_id = $_GET['id'];

/* $config = require base_path('config.php'); // the problem
$pdo = new Database($config['database']); // the problem */

$pdo = App::resolve(Database::class);

$note = $pdo->query('SELECT * FROM notes WHERE id = :note_id', ['note_id' => $_POST['id']])->findOrFail($_POST['id']);

authorize($note['user_id'] === $user_id, Response::FORBIDDEN);

$pdo->query('DELETE FROM notes WHERE id = :id', ['id' => $_POST['id']]);

header('location: /notes');
exit();
