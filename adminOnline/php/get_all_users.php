<?php

require_once 'data_to_html.php';
require_once '../includes/db_connection.php';


$req = $bdd->prepare("SELECT id, pseudo, email, last_connection, is_sub, is_ban FROM user");
$req->execute();

$users = $req->fetchAll(PDO::FETCH_ASSOC);

users_to_html($users);