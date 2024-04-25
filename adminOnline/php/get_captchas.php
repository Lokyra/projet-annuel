<?php

require_once 'db_connection.php';
require_once 'data_to_html.php';

$req = $bdd->prepare('SELECT id, question, answer FROM captcha');
$req->execute();

$captchas = $req->fetchAll(PDO::FETCH_ASSOC);

captchas_to_html($captchas);
