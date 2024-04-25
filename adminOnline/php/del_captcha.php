<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "db_connection.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('location: captcha.php?message=id inexistant !&type=danger');
    exit;
}

$q = 'DELETE FROM captcha WHERE id = :id';
$req = $bdd->prepare($q);

$res = $req->execute([
    'id' => $_GET['id']
]);

if(!$res) {
    header('location: captcha.php?message=id non valide!&type=danger');
    exit;
} else {
    header('location: captcha.php?message=Captcha supprime avec succès !!&type=success');
}