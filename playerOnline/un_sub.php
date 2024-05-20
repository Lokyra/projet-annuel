<?php 

session_start();

require 'includes/db_connection.php';


$q = 'UPDATE user SET is_sub = 0 WHERE email = :email';
$req = $bdd->prepare($q);

$res = $req->execute([
    'email' => $_SESSION['email']
]);


if ($res) {
    header("location: profile.php?message=Vous etes bien desinscrit a la newsletter");
} else {
    header("location: profile.php?message=Erreur lors de la desinscription");
}