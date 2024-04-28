<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "db_connection.php";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('location: newsletter.php?message=id inexistant !&type=danger');
    exit;
}

$pseudo = 0;
$email = 0;
$password = 0;

if (!empty($_POST['pseudo'])) {
    $pseudo = 1;
}
if (!empty($_POST['email'])) {
    $email = 1;
}
if (!empty($_POST['password'])) {
    $password = 1;
}


if ($pseudo == 0 && $email == 0 && $password == 0) {
    header('location: users.php?message=Vous devez remplir les 1 des 3 champs !&type=danger');
    exit;
}


if ($pseudo == 1) {
    $q = 'UPDATE user SET pseudo = :pseudo WHERE id = :id';
    $req = $bdd->prepare($q);

    $res = $req->execute([
        'pseudo' => $_POST['pseudo'],
        'id' => $_GET['id']
    ]);
    
}


if ($email == 1) {
    $q = 'UPDATE user SET email = :email WHERE id = :id';
    $req = $bdd->prepare($q);

    $res = $req->execute([
        'email' => $_POST['email'],
        'id' => $_GET['id']
    ]);
    
}

if ($password == 1) {
    $q = 'UPDATE user SET password = :password WHERE id = :id';
    $req = $bdd->prepare($q);

    $res = $req->execute([
        'password' => $_POST['password'],
        'id' => $_GET['id']
    ]);
}



if (!$res) {
    header('location: users.php?message=Erreur !&type=danger');
}else {
    header('location: users.php?message=Utilisateur modifié avec succès !&type=success');
}


