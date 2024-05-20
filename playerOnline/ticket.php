<?php

include 'includes/db_connection.php';

$req = $bdd->prepare("SELECT id, question, answer FROM captcha");
$req->execute();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic-tac-toe Admin</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
 
        <div class="main">
            
            <main class="content px-3 py-4">
                <div class="container-fluid">
                    <h2>Espace Contact. Nous essaierons de répondre dans les plus brève délais.</h2>
                    <form method="post" action="verif_ticket.php">
                        <div class="mb-3">
                    
                            <select class="form-select" aria-label="Default select example" name="type">
                                <option selected>Choisissez une le type du ticket</option>
                                <option value="info">Info</option>
                                <option value="warning">Incident</option>   
                            </select>
                           
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Titre du ticket</label>
                            <input type="text" name="title" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="10"></textarea>
                            <div id="emailHelp" class="form-text">Ecrivez une description brève en allant a l'essentiel.</div>
                        </div>

                        <button type="submit" class="btn btn-primary">Soumettre</button>
                    </form>
                </div>
            </main>
            <footer class="footer">
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
    <script src="../js/main.js"></script>

</body>

</html>