<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "db_connection.php";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('location: newsletter.php?message=id inexistant !&type=danger');
    exit;
}

$body = 0;
$title = 0;
$type = 0;

if (!empty($_POST['topic'])) {
    $type = 1;
}
if (!empty($_POST['subject'])) {
    $title = 1;
}
if (!empty($_POST['message'])) {
    $body = 1;
}


if ($type == 0 && $title == 0 && $body == 0) {
    header('location: newsletter.php?message=Vous devez remplir les 1 des 3 champs !&type=danger');
    exit;
}


if ($type == 1) {
    $q = 'UPDATE newsletter SET topic = :topic WHERE id = :id';
    $req = $bdd->prepare($q);

    $res = $req->execute([
        'topic' => $_POST['topic'],
        'id' => $_GET['id']
    ]);
    
}


if ($title == 1) {
    $q = 'UPDATE newsletter SET subject = :subject WHERE id = :id';
    $req = $bdd->prepare($q);

    $res = $req->execute([
        'subject' => $_POST['subject'],
        'id' => $_GET['id']
    ]);
    
}

if ($body == 1) {
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


