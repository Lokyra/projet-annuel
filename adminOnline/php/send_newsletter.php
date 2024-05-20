<?php


require_once '../includes/debug.php';
require_once '../includes/writeLog.php';
require_once "email.php";
require_once "../includes/db_connection.php";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('location: newsletter.php?message=id inexistant !&type=danger');
    exit;
}

$q = 'SELECT subject, body FROM newsletter WHERE id = :id';
$news = $bdd->prepare($q);
$news->execute([
    'id' => $_GET['id']
]);

$new = $news->fetch(PDO::FETCH_ASSOC); 

$req = $bdd->prepare("SELECT email FROM user WHERE is_sub = 1");
$res = $req->execute();
$users = $req->fetchAll(PDO::FETCH_ASSOC);


if ($users) {
    
    foreach ($users as $user) {
        sendNewsEmail($user['email'], $new['subject'], $new['body']);
        writeSendLog(true, $user['email']);
    }
    header('location: newsletter.php?message=Newsletter envoyée avec succès !!&type=success');

} else {
    writeSendLog(false, $user['email']);
    header("location: newsletter.php?message=Echec lors de l'envoi !&type=success");
}
