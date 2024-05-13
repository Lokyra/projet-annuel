<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../includes/db_connection.php";

if (
    !isset($_POST['type'])
    || empty($_POST['type'])
    || !isset($_POST['title'])
    || empty($_POST['title'])
    || !isset($_POST['body'])
    || empty($_POST['body'])
) {
    header('location: ticketing.php?message=Vous devez remplir les 3 champs !&type=danger');
    exit;
}


$q = 'INSERT INTO ticket (type, title, body) VALUES (:type, :title, :body)';
$req = $bdd->prepare($q);

$res = $req->execute([
    'type' => $_POST['type'],
    'title' => $_POST['title'],
    'body' => $_POST['body']
]);

if(!$res) {
    header('location: ticketing.php?message=Erreur lors de la création!&type=success');
} else {
    header('location: ticketing.php?message=Ticket créé avec succès !!&type=success');
}

