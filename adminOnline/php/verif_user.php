<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../includes/db_connection.php";

if (
    !isset($_POST['pseudo'])
    || empty($_POST['pseudo'])
    || !isset($_POST['email'])
    || empty($_POST['email'])
    || !isset($_POST['password'])
    || empty($_POST['password'])
) {
    header('location: users.php?message=Vous devez remplir les 3 champs !&type=danger');
    exit;
}

$body = $_POST['password'];
$body = password_hash($body, PASSWORD_DEFAULT);

$q = 'INSERT INTO user (pseudo, email, password, signup_date) VALUES (:pseudo, :email, :password, :signup_date)';
$req = $bdd->prepare($q);

$currentDate = date('Y-m-d H:i:s');

$res = $req->execute([
    'pseudo' => $_POST['pseudo'],
    'email' => $_POST['email'],
    'password' => $body,
    'signup_date' => $currentDate
]);

if(!$res) {
    header('location: users.php?message=Erreur lors de la création!&type=success');
} else {
    header('location: users.php?message=Utilisateur créé avec succès !!&type=success');
}

