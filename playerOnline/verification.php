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

$req = $bdd->prepare("SELECT email, password FROM users WHERE email = :email");
$req->execute([':email' => $_POST['email']]);


if ($req->rowCount() == 0) {
   
    $hashed_password = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

    
    $req = $bdd->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
    $req->execute([':email' => $_POST['email'], ':password' => $hashed_password]);

    
    header('location: connexion.php?message=Compte créé ! Connectez-vous à nouveau.');
    exit; // interrompt le code
}

if ($req->rowCount() > 0) {
 
    $user = $req->fetch(PDO::FETCH_ASSOC);

    
    if (password_verify($_POST['mot_de_passe'], $user['password'])) {
        // Créer une session utilisateur
        session_start();
        // Y mettre un index 'email' avec la valeur de l'email reçu
        $_SESSION['email'] = $_POST['email'];
        // Redirection vers la page d'accueil
        header('location: app.php');
    } else {
        header('location: connexion.php?message=Mot de passe incorrect !');
        exit;
    }
} 


