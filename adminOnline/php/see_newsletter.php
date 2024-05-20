<?php

require_once "../includes/db_connection.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('location: newsletter.php?message=id inexistant !&type=danger');
    exit;
}

$q = 'SELECT subject, body FROM newsletter WHERE id = :id';

$req = $bdd->prepare($q);

$req->execute([
    'id' => $_GET['id']
]);

$newsletter = $req->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../includes/head.php'); ?>
</head>
<body>

    <h1><?php echo $newsletter['subject'] ?></h1>

    <p><?php echo $newsletter['body'] ?></p>
    
</body>
</html>