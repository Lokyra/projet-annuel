<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../includes/db_connection.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('location: ticketing.php?message=id inexistant !&type=danger');
    exit;
}

$q = 'DELETE FROM ticket WHERE id = :id';
$req = $bdd->prepare($q);

$res = $req->execute([
    'id' => $_GET['id']
]);

if(!$res) {
    header('location: ticketing.php?message=erreur lors de la suppression!&type=danger');
    exit;
} else {
    header('location: ticketing.php?message=Ticket supprimé avec succès !!&type=success');
}