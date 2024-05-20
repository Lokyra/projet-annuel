<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();


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

if (!isset($_POST['captcha_answer'])) {
    header('location: signup.php?message=Captcha non remplie !');
    exit;
}

$user_answer = $_POST['captcha_answer'];
$correct_answer = $_SESSION['answer'];

if (strtolower(trim($user_answer)) !== strtolower(trim($correct_answer))) {
    header("Location: signup.php?message=Captcha Invalide !");
    exit;
}

require_once "includes/db_connection.php";

$req = $bdd->prepare("SELECT email, password, pseudo FROM user WHERE email = :email");
$req->execute([':email' => $_POST['email']]);

$user = $req->fetch(PDO::FETCH_ASSOC);


if (!$user) {
   
    $hashed_password = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
    $verificationToken = bin2hex(random_bytes(5));

    
    $req = $bdd->prepare("INSERT INTO user (email, password, pseudo, token, signup_date) VALUES (:email, :password, :pseudo, :token, NOW())");
    $req->execute([
        ':email' => $_POST['email'], 
        ':password' => $hashed_password, 
        ':pseudo' => $_POST['pseudo'], 
        ':token' => $verificationToken,  
    ]);

    if (sendVerificationEmail($_POST['email'], $verificationToken)) {
        header('location: token.php?message=Compte créé ! Verifiez votre mail pour vous connecter.');
        exit;
    } else {
        header('location: login.php?message=Compte créé ! Mais impossible d\'envoyer le mail de verification.');
        exit;
    }
} else {
    header('location: login.php?message=Vous possedez deja un compte. Connectez-vous !');
    exit;
}

