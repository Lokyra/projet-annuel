<?php

require_once "db_connection.php";

if (
    !isset($_POST['topic'])
    || empty($_POST['topic'])
    || !isset($_POST['subject'])
    || empty($_POST['subject'])
    || !isset($_POST['message'])
    || empty($_POST['message'])
) {
    header('location: newsletter.php?message=Vous devez remplir les 3 champs !');
    exit; 
}


$req = $bdd->prepare("INSERT INTO newsletter (topic, subject, body) VALUE (:topic, :subject, :body)");
$res = $req->execute([
    'topic' => $_POST['topic'],
    'subject' => $_POST['subject'],
    'body' => $_POST['message']
]);

if (!$res) {
    header('location: newsletter.php?message=Erreur !&type=danger');
}else {
    header('location: newsletter.php?message=Newsletter creer avec succès !&type=success');
}


