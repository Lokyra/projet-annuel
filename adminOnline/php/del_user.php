<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../includes/db_connection.php";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('location: users.php?message=id inexistant !&type=danger');
    exit;
}

$q = 'DELETE FROM user WHERE id = :id';
$req = $bdd->prepare($q);

$res = $req->execute([
    'id' => $_GET['id']
]);

if(!$res) {
    header('location: users.php?message=Erreur lors de la suppression&type=danger');
    exit;
} else {
    header('location: users.php?message=Utilisateur supprimé avec succès !!&type=success');
}