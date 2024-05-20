<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include "writeLog.php";

if (isset($_POST['email']) && !empty($_POST['email'])) {
    setcookie('email', $_POST['email'], time() + 30 * 24 * 3600);
}


if (
    !isset($_POST['email'])
    || empty($_POST['email'])
    || !isset($_POST['mot_de_passe'])
    || empty($_POST['mot_de_passe'])
) {
    header('location: login.php?message=Vous devez remplir les 2 champs !');
    exit; 
}


if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header('location: login.php?message=Adresse email invalide !');
    exit; 
}

require 'includes/db_connection.php';

$req = $bdd->prepare("SELECT email, password, pseudo, email_verified, is_ban, ban_duration FROM user WHERE email = :email");
$req->execute([':email' => $_POST['email']]);

$user = $req->fetch(PDO::FETCH_ASSOC);



if ($user) {

    if ($user['is_ban'] == 1) {

        if ($user['ban_duration'] > time()) {
            header('location: app.php?message=Vous etes actuellement banni!');
            exit;
        } else {
            $q = 'UPDATE user SET is_ban = 0, ban_duration = NULL, motif_ban = NULL WHERE email = :email';
            $req = $bdd->prepare($q);
            $res = $req->execute([
                'email' => $user['email']
            ]);
           
        }
        
    }
    
    
    if (password_verify($_POST['mot_de_passe'], $user['password'])) {   
        if($user['email_verified'] == 1) {
            $q = 'UPDATE user SET last_connection = NOW() WHERE email = :email';
            $req = $bdd->prepare($q);
            $req->execute([
                'email' => $user['email']
            ]);
            session_start();  
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['pseudo'] = $user['pseudo'];
            writeLogLine(true, $_POST['email']);
            header('location: app.php');
            exit;
        } else {
            writeLogLine(false, $_POST['email']);
            header('location: login.php?message=Compte non vérifer !');
            exit;
        }
        
    } else {
        header('location: login.php?message=Mot de passe incorrect !');
        exit;
    }
} else {
    header('location: signup.php?message=Compte inconnu. Veuillez creer un compte');
    exit;
}


