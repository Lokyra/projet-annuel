<?php
// Ceci n'est pas une page web !!
// C'est un script chargé d'efectuer des vérifications et des redirections

// Si un email a été envoyé et que cet email n'est pas vide alors créer un cookie contenant cet email et qui expire dans 30j.
if (isset($_POST['email']) && !empty($_POST['email'])) {
    setcookie('email', $_POST['email'], time() + 30 * 24 * 3600);
}


// Si email ou password n'existent ou sont vides > redirection vers le formulaire avec un message d'erreur
if (
    !isset($_POST['email'])
    || empty($_POST['email'])
    || !isset($_POST['mot_de_passe'])
    || empty($_POST['mot_de_passe'])
) {
    header('location: connexion.php?message=Vous devez remplir les 2 champs !');
    exit; // interrompt le code
}



// Si l'email n'est pas valide > redirection vers connexion.php avec un message d'erreur
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header('location: connexion.php?message=Adresse email invalide !');
    exit; // interrompt le code
}

// Si les identifiants ne correspondent aux attentes > redirection avec un message
if ($_POST['email'] != 'admin@site.com' || $_POST['mot_de_passe'] != 'php123') {
    header('location: connexion.php?message=Identifiants incorrects !');
    exit; // interrompt le code
}

// Si on arrive ici, c'est que tout est OK !
// connectons l'utilisateur

// Créer une session utilisateur
session_start();
// Y mettre un index 'email' avec la valeur de l'email reçu
$_SESSION['email'] = $_POST['email'];
// Redirection vers la page d'accueil
header('location: app.php');
exit;
