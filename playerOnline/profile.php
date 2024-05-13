<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="asset/favicon.png"/>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/figure.css">
    <link rel="stylesheet" href="css/play.css">
    <link rel="stylesheet" href="../adminOnline/css/backoffice.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,700;1,400;1,700&family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <title>Tic-Tac-Toe</title>
</head>
<body>
    <header class="container">
        <div>
            <img src="asset/logo.png" height="20px">
            <span class="logo-text">Tic-tac-toe.com</span>
        </div>
        <nav class="navigation">
            <div class="navigation-item">Jouer</div>
            <div class="navigation-item">Puzzles</div>
            <div class="navigation-item">Apprendre</div>
            <div class="navigation-item">Regarder</div>
        </nav>
        <div class="action-buttons">
            <a href="login.php"class="login-btn">Login</a>
            <a href="signup.php"class="sign-up-btn">Sign Up</a>
        </div>
    </header>
    <main>
        <div class="stats-container">
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "root";
                $dbname = "tictactoe";
                
                try {
                    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch(PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                }
                $req = $bdd->prepare("SELECT signup_date, nb_parties FROM user where email = :email");
                $req-> execute([
                    'email' => $_SESSION['email']
                ]);
                $user = $req->fetch();
               echo "<div class='stats-box'>Date d'inscription : " . $user['signup_date'] . "</div>";
               echo "<div class='stats-box'>Nombre de parties jouer: " . $user['nb_parties'] . "</div>";
            ?>
        </div>
        <div class="table-wrapper">
            <table class="game-table">
                <tr>
                    <th>Nom du compte</th>
                    <th>Adresse mail</th>
                    <th>Mot de passe</th>
                </tr>
               <?php
                 echo "<tr>";
                 echo "<td class='table-cell'>" . $_SESSION['pseudo'] . "</td>";
                 echo "<td class='table-cell'>" . $_SESSION['email'] . "</td>";
                 echo "</tr>";
               ?>
            </table>
        </div>
    </main>
    </main>
</body>
</html>
