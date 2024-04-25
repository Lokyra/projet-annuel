<?php
include 'db_connection.php';

$reqUserCount = $bdd->prepare("SELECT COUNT(email) as total_users FROM user");
$reqUserCount->execute();
$userCount = $reqUserCount->fetch(PDO::FETCH_ASSOC);


$req = $bdd->prepare("SELECT pseudo, email FROM user");
$req->execute();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../playerOnline/css/index.css">
    <link rel="stylesheet" href="../playerOnline/css/figure.css">
    <link rel="stylesheet" href="../playerOnline/css/play.css">
    <link rel="stylesheet" href="../css/backoffice.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,700;1,400;1,700&family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <title>Tic-Tac-Toe</title>
</head>
<body>
    <header class="container">
        <div class="logo-area">
            <img src="asset/logo.png" height="20px">
            <span class="logo-text">Tic-tac-toe.com</span>
        </div>
        <nav class="navigation">
            <div class="navigation-item">Historique</div>
            <div class="navigation-item">Modération</div>
            <div class="navigation-item">Watch</div>
        </nav>
        <div class="action-buttons">
            <a class="login-btn">ADMIN-1</a>
            <a href="newsletter.php" class="login-btn">Send an email</a>
        </div>
    </header>
    <main>
        <div class="stats-container">
            <div class="stats-box">Nombre de joueurs en ligne : 0</div>
            <div class="stats-box">Nombre de parties en cours : 0</div>
            <div class="stats-box">Nombre de joueurs total : <?php echo $userCount['total_users']; ?></div>
        </div>
        <div class="table-wrapper">
            <table class="game-table">
                <tr>
                    <th>Pseudo</th>
                    <th>Stats</th>
                    <th>Email Address</th>
                    <th>Last Connection</th>
                    <th>Guild</th>
                </tr>
                <?php
                while($row = $req->fetch()) {
                    echo "<tr>
                        <td class='table-cell'>" . $row["pseudo"] . "</td>
                        <td class='table-cell'>Win: 10, Loss: 5</td>
                        <td class='table-cell'>" . $row["email"] . "</td>
                        <td class='table-cell'>2024-02-25 08:00 AM</td>
                        <td class='table-cell'>Guild A</td>
                    </tr>";
                }
                ?>
            </table>
        </div>
    </main>
</body>
</html>
