<?php

require '../includes/debug.php';
require '../includes/db_connection.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('location: users.php?message=id inexistant !&type=danger');
    exit;
}


$q = 'UPDATE user SET is_ban = 0, ban_duration = NULL, motif_ban = NULL WHERE id = :id';
$req = $bdd->prepare($q);
$res = $req->execute([
    'id' => $_GET['id']

]);

if(!$res) {
    header('location: users.php?message=Erreur lors de la revocation!&type=warning');
} else {
    header('location: users.php?message=Utilisateur debanni avec avec succès !!&type=success');
}


