<?php

if (isset($_POST['email']) && !empty($_POST['email'])) {
    setcookie('email', $_POST['email'], time() + 30 * 24 * 3600);
}


if (
    !isset($_POST['email'])
    || empty($_POST['email'])
    || !isset($_POST['mot_de_passe'])
    || empty($_POST['mot_de_passe'])
) {
    header('location: connexion.php?message=Vous devez remplir les 2 champs !');
    exit; 
}


if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header('location: connexion.php?message=Adresse email invalide !');
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

$req = $bdd->prepare("SELECT email, password, pseudo FROM users WHERE email = :email");
$req->execute([':email' => $_POST['email']]);



if ($req->rowCount() > 0) {
 
    $user = $req->fetch(PDO::FETCH_ASSOC);

    
    if (password_verify($_POST['mot_de_passe'], $user['password'])) {   
        session_start();  
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['pseudo'] = $user['pseudo'];
        header('location: app.php');
    } else {
        header('location: login.php?message=Mot de passe incorrect !');
        exit;
    }
} else {
    header('location: signup.php?message=Compte inconnu. Veuillez creer un compte');
    exit;
}


