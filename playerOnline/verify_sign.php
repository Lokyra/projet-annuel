<?php

require_once 'email.php';


if (isset($_POST['email']) && !empty($_POST['email'])) {
    setcookie('email', $_POST['email'], time() + 30 * 24 * 3600);
}


if (
    !isset($_POST['email'])
    || empty($_POST['email'])
    || !isset($_POST['mot_de_passe'])
    || empty($_POST['mot_de_passe'])
    || !isset($_POST['pseudo'])
    || empty($_POST['pseudo'])
) {
    header('location: signup.php?message=Vous devez remplir les 3 champs !');
    exit;
}


if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header('location: signup.php?message=Adresse email invalide !');
    exit;
}

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

$req = $bdd->prepare("SELECT email, password, pseudo FROM user WHERE email = :email");
$req->execute([':email' => $_POST['email']]);


if ($req->rowCount() == 0) {
   
    $hashed_password = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
    $verificationToken = bin2hex(random_bytes(32));

    
    $req = $bdd->prepare("INSERT INTO user (email, password, pseudo, token) VALUES (:email, :password, :pseudo, :token)");
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

