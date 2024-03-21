<?php

require_once 'email.php';

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
    || !isset($_POST['pseudo'])
    || empty($_POST['pseudo'])
) {
    header('location: signup.php?message=Vous devez remplir les 3 champs !');
    exit; // interrompt le code
}



// Si l'email n'est pas valide > redirection vers connexion.php avec un message d'erreur
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header('location: signup.php?message=Adresse email invalide !');
    exit; // interrompt le code
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PhpWeb";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$req = $bdd->prepare("SELECT email, password, pseudo FROM users WHERE email = :email");
$req->execute([':email' => $_POST['email']]);


if ($req->rowCount() == 0) {
   
    $hashed_password = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
    $verificationToken = bin2hex(random_bytes(32));

    session_start();
    $_SESSION['pseudo'] = $_POST['pseudo'];

    
    $req = $bdd->prepare("INSERT INTO users (email, password, pseudo, token) VALUES (:email, :password, :pseudo, :token)");
    $req->execute([':email' => $_POST['email'], ':password' => $hashed_password, ':pseudo' => $_POST['pseudo'], ':token' => $verificationToken]);

    if (sendVerificationEmail($_POST['email'], $verificationToken)) {
        header('location: token.php?message=Compte créé ! Verifiez votre mail pour vous connecter.');
        exit;
    } else {
        header('location: login.php?message=Compte créé ! Mais impossible d\'envoyer le mail de verification.');
        exit;
    }
}

if ($req->rowCount() > 0) {
 
    $user = $req->fetch(PDO::FETCH_ASSOC);

    header('location: login.php?message=Vous possedez deja un compte. Connectez-vous !');
    exit;
} 

