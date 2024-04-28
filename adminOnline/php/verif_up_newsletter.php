<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "db_connection.php";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('location: newsletter.php?message=id inexistant !&type=danger');
    exit;
}

$password = 0;
$email = 0;
$pseudo = 0;

if (!empty($_POST['topic'])) {
    $pseudo = 1;
}
if (!empty($_POST['subject'])) {
    $email = 1;
}
if (!empty($_POST['message'])) {
    $password = 1;
}


if ($pseudo == 0 && $email == 0 && $password == 0) {
    header('location: newsletter.php?message=Vous devez remplir les 1 des 3 champs !&type=danger');
    exit;
}


if ($pseudo == 1) {
    $q = 'UPDATE newsletter SET topic = :topic WHERE id = :id';
    $req = $bdd->prepare($q);

    $res = $req->execute([
        'topic' => $_POST['topic'],
        'id' => $_GET['id']
    ]);
    
}


if ($email == 1) {
    $q = 'UPDATE newsletter SET subject = :subject WHERE id = :id';
    $req = $bdd->prepare($q);

    $res = $req->execute([
        'subject' => $_POST['subject'],
        'id' => $_GET['id']
    ]);
    
}

if ($password == 1) {
    $q = 'UPDATE newsletter SET body = :body WHERE id = :id';
    $req = $bdd->prepare($q);

    $res = $req->execute([
        'body' => $_POST['message'],
        'id' => $_GET['id']
    ]);
}



if (!$res) {
    header('location: newsletter.php?message=Erreur !&type=danger');
}else {
    header('location: newsletter.php?message=Newsletter modifié avec succès !&type=success');
}


