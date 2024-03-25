<?php 
include 'captcha.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="asset/favicon.png"/>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/signin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,700;1,400;1,700&family=Rubik+Mono+One&display=swap" rel="stylesheet">
   
    <title>Tictactoe Online Player</title>
</head>
<body>
    <header>
        <div class="centered-logo">
            <img src="asset/logo.png" height="20px">
            <span class="logo-text">Tic-tac-toe.com</span>
        </div>
       
    </header>
    <main>
        <h1 class="text">Créer votre compte<br> Tic-tac-toe</h1>
    
    <form action="verify_sign.php" method="post" class="container">

        <input type="pseudo" name="pseudo" class="user-input" placeholder="pseudo">

        <input type="email" name="email" class="user-input" placeholder="Email" value="<?= isset($_COOKIE['email']) ? htmlspecialchars($_COOKIE['email']) : ''; ?>">
       
        <input type="password" name="mot_de_passe" class="user-input" placeholder="Password">

        <label for="captcha_question" class="user-input">Veuillez répondre à la question suivante :</label>
        <p><?php echo htmlspecialchars($selected_question); ?></p>
        <input type="text" id="captcha_answer" name="captcha_answer" class="user-input" required>

        <div class="remember-me">
            <label class="checkbox-label">
                <input type="checkbox" class="checkbox" id="rememberMe" name="rememberMe">
                <span>Se souvenir de moi</span>
            </label>
            <div  role="button" class="forgot-password" onclick="alert('Forgot Password?');">Mot de passe ?</div>
        </div>
        <button class="login-btn-signin">Inscription</button>
    </form>
  
          
    </main>

    
</body>
</html>

