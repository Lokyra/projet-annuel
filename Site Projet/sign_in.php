<?php

session_start();

$pseudo = $_POST['pseudo'] ?? null;
$password = $_POST['password'] ?? null;

if (!$pseudo || !$password) {
    header('Location: connexion.html');
    exit;
}


$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

if (!password_verify($password, $hashedPassword)) {
    header('Location: connexion.html');
    exit;
}

$_SESSION['pseudo'] = $pseudo;

header('Location: index.php');
exit;


// Traitement du formulaire

if (isset($_POST['nom_utilisateur']) && isset($_POST['mot_de_passe'])) {
  // Connexion à la base de données
  $bdd = new PDO('mysql:host=localhost;dbname=tictactoe', 'root', '');

  // Préparation de la requête
  $requete = $bdd->prepare('INSERT INTO utilisateurs (nom_utilisateur, mot_de_passe) VALUES (?, ?)');

  // Exécution de la requête
  $requete->execute([
    $_POST['nom_utilisateur'],
    $_POST['mot_de_passe'],
  ]);

  // Redirection vers la page d'accueil
  header('Location: index.php');
}

?>