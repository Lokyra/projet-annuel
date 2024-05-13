<?php

require_once 'data_to_html.php';


ini_set('display_errors', 1);

$s = $_GET['search'];

require_once '../includes/db_connection.php';

$req = $bdd->prepare('SELECT id, question, answer FROM captcha WHERE question LIKE ?');

$req->execute([
    '%' . $s . '%' 
]);

$captchas = $req->fetchAll(PDO::FETCH_ASSOC);

captchas_to_html($captchas);
