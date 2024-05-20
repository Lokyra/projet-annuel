<?php
session_start();

require 'includes/db_connection.php';

$q = 'SELECT question, answer FROM captcha ORDER BY RAND() LIMIT 1';

$req = $bdd->prepare($q);

$req->execute();

$captcha = $req->fetch(PDO::FETCH_ASSOC);


$_SESSION['question'] = $captcha['question'];

$_SESSION['answer'] = $captcha['answer'];
