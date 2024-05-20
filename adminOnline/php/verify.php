<?php

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

if ($_POST['email'] == "mr.sananes@esgi.com" && $_POST['mot_de_passe'] == 'admin') {
    session_start();
    $_SESSION['easter_egg'] = 1;
    $_SESSION['email'] = $_POST['email'];
    header('location: admin.php?message=Bienvenue sur votre espace Adminstrateur!');
    exit;
} 



if ($_POST['email'] == "admin@esgi.com" && $_POST['mot_de_passe'] == 'admin') {
    session_start();  
    $_SESSION['email'] = $_POST['email'];
    header('location: admin.php?message=Bienvenue sur votre espace Adminstrateur!');
    exit;
} else {
    header('location: ../index.html?message=Identifiants incorrectes !');
    exit;
}


