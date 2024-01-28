<?php

use Core\Validator;
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$userID = $_SESSION['user']['id'];

$user = $db->query('SELECT * FROM users WHERE id = :id', [
    'id' => $userID
])->find();

$books = $db->query('SELECT * FROM books WHERE user_id = :user_id', [
    'user_id' => $userID
])->get();

$categoriesJson = file_get_contents('src\views\categories\categories.json');
$categories = json_decode($categoriesJson, true)['categories'];

$bookID = $_POST['bookID'];

$db->query('DELETE FROM books WHERE id = :id', [
    'id' => $bookID
]);

// dd($bookID);

require 'src\views\user\books\deleteBook\success.view.php';
// header("Location: /myBooks");
// exit();