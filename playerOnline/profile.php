<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
                    <th>Statistique</th>
                    <th>Adresse mail</th>
                    <th>Mot de passe</th>
                    <th>Date de création du compte</th>
                    <th>Guilde</th>
                </tr>
                <tr>
                    <td class="table-cell">Joueur 1</td>
                    <td class="table-cell">50% Win, 50% lose</td>
                    <td class="table-cell">player1@example.com</td>
                    <td class="table-cell">********</td>
                    <td class="table-cell">2024-02-25 08:00 AM</td>
                    <td class="table-cell">Guilde A</td>
                </tr>
            </table>
        </div>
    </main>
    </main>
</body>
</html>
