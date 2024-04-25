<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "db_connection.php";
require_once "email.php";

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

$req = $bdd->prepare("SELECT pseudo, email FROM user");
$req->execute();


$logFile = 'newsletter.log.txt';

while ($user= $req->fetch(PDO::FETCH_ASSOC)) {
    $result = sendNewsEmail($user['email'], $new['subject'], $new['body']);
    $message = date('Y-m-d H:i:s') . ' - ' . ($result ? 'Email sent successfully to ' : 'Failed to send email to ') . $row['email'] . PHP_EOL;
    file_put_contents($logFile, $message, FILE_APPEND);
    header('location: newsletter.php?message=Newsletter envoyée avec succès !!&type=success');
}
