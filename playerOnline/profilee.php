<?php
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
            <div class="stats-box">Dernière connnection : 1 day</div>
            <div class="stats-box">Nombre de parties jouer: 128 000</div>
            <div class="stats-box">Nombre de partie gagné: 1024 000</div>
            <div class="stats-box">Nombre de partie perdu: 1024 000</div>
        </div>
        <div class="table-wrapper">
            <table class="game-table">
                <tr>
                    <th>Nom du compte</th>
                    <th>Adresse mail</th>
                    
                </tr>
               <?php
                 echo "<tr>";
                 echo "<td class='table-cell'>" . $_SESSION['pseudo'] . "</td>";
                 echo "<td class='table-cell'>" . $_SESSION['email'] . "</td>";
                 echo "</tr>";
               ?>
            </table>
            <div style="margin-left: 200px;">
           
                <a href="sub.php"class="login-btn">Subscribe to the Newsletter</a>

            </div>
            
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
