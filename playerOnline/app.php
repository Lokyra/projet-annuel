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
            <a href="http://tictactoe.ovh:7575/games/tictactoe" class="navigation-item">Jouer</a>
        </nav>
        <div class="action-buttons">
        <?php
            if(isset($_SESSION['pseudo'])){ 
                echo '<a href="profile.php" class="login-btn">' . $_SESSION['pseudo'] . '</a>';
            } else {
                echo '<a href="login.php" class="login-btn">Login</a>';
            }
            
            if(isset($_SESSION['pseudo'])){ 
                echo '<a href="signout.php" class="sign-up-btn"> Deconnexion</a>';
            } else {
                echo '<a href="signup.php" class="sign-up-btn">Sign Up</a>';
            }
            ?>
       
        </div>
    </header>
    <main>
        <div class="figure">
        <section class="section-padding">
            <div class="flex-row">
              <div class="flex-column wide-column">
                <div class="square"></div>
              </div>

              <div class="flex-column narrow-column">
                <div class="square-middle">
                  <img src="asset/cross.png"  class="img">
                </div>
                
              </div>
              <div class="flex-column wide-column">
                <div class="image-content-last"></div>
              </div>
              
            </div>
          </section>

          
          <section class="section-padding">
            <div class="flex-row">
              <div class="flex-column wide-column">
                <div class="square">
                  <div class="circle"></div>
                </div>
              </div>
              <div class="flex-column narrow-column">
                <div class="square-middle">
                  <img src="asset/cross.png"  class="img">
                </div>
              </div>
              <div class="flex-column wide-column">
                <div class="image-content-last"></div>
              </div>
              
            </div>
          </section>
          <section class="section-padding-last">
            <div class="flex-row">
              <div class="flex-column wide-column">
                <div class="image-content"></div>
              </div>
              <div class="flex-column narrow-column">
                <div class="square-last">
                  <div class="circle"></div>
                </div>
              </div>
              <div class="flex-column wide-column">
                <div class="image-content-last"></div>
              </div>
              
            </div>
          </section>
        </div>

        <section class="play-options-container">
            <a href="http://tictactoe.ovh:7575/games/tictactoe" class="play-online">Jouer en ligne</a>  
        </section>

        <section>
          <h1 class="game-title">Jouer <br>tic-tac-toe<br> en ligne !</h1>
        </section>
        
    </main>
</body>
</html>
