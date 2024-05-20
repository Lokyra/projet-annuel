<?php

require_once 'data_to_html.php';
require_once '../includes/db_connection.php';


$s = $_GET['search'];

$req = $bdd->prepare('SELECT id, pseudo, email, last_connection, is_ban FROM user WHERE pseudo LIKE ?');

$req->execute([
    '%' . $s . '%' 
]);

$users = $req->fetchAll(PDO::FETCH_ASSOC);

users_to_html($users);
