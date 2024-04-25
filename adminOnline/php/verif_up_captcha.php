<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "db_connection.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('location: captcha.php?message=id inexistant !&type=danger');
    exit;
}

$question = 0;
$answer = 0;

if (!empty($_POST['question'])) {
    $question = 1;
}
if (!empty($_POST['answer'])) {
    $answer = 1;
}

if ($question == 0 && $answer == 0) {
    header('location: captcha.php?message=Vous devez remplir les 1 des 2 champs !&type=danger');
    exit;
}

$req = $bdd->prepare("SELECT id, question, answer FROM captcha WHERE id = :id");
$req->execute([
    'id' => $_GET['id']
]);

$captcha = $req->fetch(PDO::FETCH_ASSOC);

if ($question == 1) {
    $q = 'UPDATE captcha SET question = :question WHERE id = :id';
    $req = $bdd->prepare($q);

    $res = $req->execute([
        'question' => $_POST['question'],
        'id' => $_GET['id']
    ]);
    
}


if ($answer == 1) {
    $q = 'UPDATE captcha SET answer = :answer WHERE id = :id';
    $req = $bdd->prepare($q);

    $res = $req->execute([
        'answer' => $_POST['answer'],
        'id' => $_GET['id']
    ]);
}



if (!$res) {
    header('location: captcha.php?message=Erreur !&type=danger');
}else {
    header('location: captcha.php?message=Captcha modifié avec succès !&type=success');
}


