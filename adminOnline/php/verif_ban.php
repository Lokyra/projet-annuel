<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../includes/db_connection.php";


if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('location: users.php?message=id inexistant !&type=danger');
    exit;
}

if (
    !isset($_POST['duree'])
    || empty($_POST['duree'])
    || !isset($_POST['motif'])
    || empty($_POST['motif'])
) {
    header('location: users.php?message=Vous devez remplir les 2 champs !&type=danger');
    exit;
}

if ($_POST['duree'] == '10min') {
    $banDuration = time() + 10 * 60;
} elseif ($_POST['duree'] == '1h') {
    $banDuration = time() + 1 * 60 * 60;
} else {
    $banDuration = time() + 1 * 60 * 60 * 24;
}

$q = 'UPDATE user SET ban_duration = :duree, motif_ban = :motif, is_ban = 1  WHERE id = :id';
$res = $req = $bdd->prepare($q);

$req->execute([
    'duree' => $banDuration,
    'motif' => $_POST['motif'],
    'id' => $_GET['id']
]);


if(!$res) {
    header('location: users.php?message=Erreur lors du banissement!&type=success');
} else {
    header('location: users.php?message=Utilisateur banni avec avec succès !!&type=warning');
}

