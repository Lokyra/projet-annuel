<?php

$servername = "localhost";
$username = "root";
$password = "tictactoe";
$dbname = "tictactoe";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if (
    !isset($_POST['token'])
    || empty($_POST['token'])
    
) {
    header('location: token.php?message=Vous devez entrer votre token envoyer par mail !');
    exit; 
}

$req = $bdd->prepare('SELECT * FROM users WHERE token = :token');
$req->execute(['token' => $_POST['token']]);

$user = $req->fetch();

if ($user['token'] == $_POST['token']) {
    $req = $bdd->prepare('UPDATE users SET email_verified = 1, token = NULL WHERE id = :id');
    $req->execute(['id' => $user['id']]);
    header('Location: login.php?message=Compte verifié ! Vous pouvez desormais vous connecter !');
    exit;
} else {
    echo 'Invalid or expired token. Please try again.';
}