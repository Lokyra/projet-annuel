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
   
    <title>ictactoe Online Player</title>
</head>
<body>
    <header>
        <div class="centered-logo">
            <img src="asset/logo.png" height="20px">
            <span class="logo-text">Tic-tac-toe.com</span>
        </div>
       
    </header>
    <main>
        <h1 class="text">Se connecter à votre compte<br> Tic-tac-toe</h1>
    
    <form action="verify.php" method="post" class="container">
        
        <input type="email" name="email" class="user-input" placeholder="User Name or Email" value="<?= isset($_COOKIE['email']) ? htmlspecialchars($_COOKIE['email']) : ''; ?>">
       
        <input type="password" name="mot_de_passe" class="user-input" placeholder="Password">
      
        <div class="remember-me">
            <label class="checkbox-label">
                <input type="checkbox" class="checkbox" id="rememberMe" name="rememberMe">
                <span>Se rappeller de moi</span>
            </label>
            <div  role="button" class="forgot-password" onclick="alert('Forgot Password?');">Mot de passe oublié?</div>
        </div>
        <div>
            <button class="login-btn-signin" value="Login">Connexion</button>
            <a class="sign-in-btn" value="sign-up" href="signup.php">Inscription</a>
        </div>
    </form>
  
          
    </main>

    
</body>
</html>
