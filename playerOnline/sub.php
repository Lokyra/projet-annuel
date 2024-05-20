<?php 

session_start();

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


$q = 'UPDATE user SET is_sub = 1 WHERE email = :email';
$req = $bdd->prepare($q);

$res = $req->execute([
    'email' => $_SESSION['email']
]);


if ($res) {
    header("location: profile.php?message=Vous etes bien inscrit a la newsletter");
} else {
    header("location: profile.php?message=Erreur lors de l'inscription");
}