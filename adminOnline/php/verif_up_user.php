<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "db_connection.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('location: users.php?message=id inexistant !&type=danger');
    exit;
}


$req = $bdd->prepare("SELECT pseudo FROM user WHERE id = :id");
$req->execute([
    'id' => $_GET['id']
]);

$user = $req->fetch(PDO::FETCH_ASSOC);


$q = 'UPDATE user SET pseudo = :pseudo WHERE id = :id';
$req = $bdd->prepare($q);

$res = $req->execute([
    'pseudo' => $_POST['pseudo'],
    'id' => $_GET['id']
]);



if (!$res) {
    header('location: users.php?message=Erreur !&type=danger');
}else {
    header('location: users.php?message=Pseudo modifié avec succès !&type=success');
}


