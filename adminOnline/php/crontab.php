<?php


require_once "email.php";

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

$req = $bdd->prepare("SELECT email FROM user");
$res = $req->execute();
$users = $req->fetchAll(PDO::FETCH_ASSOC);


if ($users) {
    
    foreach ($users as $user) {
        sendAutoMail($user['email']);
    }
    exit;

} else {
    header("location: newsletter.php?message=Echec lors de l'envoi !&type=success");
}
