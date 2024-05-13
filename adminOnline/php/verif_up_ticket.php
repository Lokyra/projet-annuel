<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../includes/db_connection.php";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('location: ticketing.php?message=id inexistant !&type=danger');
    exit;
}

$type = 0;
$title = 0;
$body = 0;

if (!empty($_POST['type'])) {
    $type = 1;
}
if (!empty($_POST['title'])) {
    $title = 1;
}
if (!empty($_POST['body'])) {
    $body = 1;
}


if ($type == 0 && $title == 0 && $body == 0) {
    header('location: newsletter.php?message=Vous devez remplir les 1 des 3 champs !&type=danger');
    exit;
}


if ($type == 1) {
    $q = 'UPDATE ticket SET type = :type WHERE id = :id';
    $req = $bdd->prepare($q);

    $res = $req->execute([
        'type' => $_POST['type'],
        'id' => $_GET['id']
    ]);
    
}


if ($title == 1) {
    $q = 'UPDATE ticket SET title = :title WHERE id = :id';
    $req = $bdd->prepare($q);

    $res = $req->execute([
        'title' => $_POST['title'],
        'id' => $_GET['id']
    ]);
    
}

if ($body == 1) {
    $q = 'UPDATE ticket SET body = :body WHERE id = :id';
    $req = $bdd->prepare($q);

    $res = $req->execute([
        'body' => $_POST['body'],
        'id' => $_GET['id']
    ]);
}



if (!$res) {
    header('location: ticketing.php?message=Erreur !&type=danger');
}else {
    header('location: ticketing.php?message=Newsletter modifié avec succès !&type=success');
}


