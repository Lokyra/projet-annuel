<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "db_connection.php";

if (
    !isset($_POST['question'])
    || empty($_POST['question'])
    || !isset($_POST['answer'])
    || empty($_POST['answer'])
) {
    header('location: captcha.php?message=Vous devez remplir les 2 champs !&type=danger');
    exit;
}

$q = 'INSERT INTO captcha (question, answer) VALUES (:question, :answer)';
$req = $bdd->prepare($q);

$req->execute([
    'question' => $_POST['question'],
    'answer' => $_POST['answer'],
]);

header('location: captcha.php?message=Captcha créé avec succès !!&type=success');