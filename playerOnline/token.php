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
   
    <title>Document</title>
</head>
<body>
    <header>
        <div class="centered-logo">
            <img src="asset/logo.png" height="20px">
            <span class="logo-text">Tic-tac-toe.com</span>
        </div>
       
    </header>
    <main>
        <h1 class="text">Enter your<br>verification<br>token</h1>
    
    <form action="verify_token.php" method="post" class="container">
        
        <input type="text" name="token" class="user-input" placeholder="Enter your token">
      
        <div>
        <button type="submit" class="login-btn-signin" value="Verify">Verify</button>
        </div>
        
    </form>
  
          
    </main>

    
</body>