<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include '../includes/db_connection.php';

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
        <?php include('../includes/sidebar.php'); ?>

        <div class="main">
            <nav class="navbar navbar-expand px-4 py-3">
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="text" placeholder="search" id="search_input" aria-label="Search" oninput="searchTickets()">
                   
                </form>
                <a href="add_ticket.php" class="btn btn-primary btn-sm ms-2">Ajouter</a>
                <a href="alert.php" class="btn btn-primary btn-sm ms-2" target="_blank">Alerter</a>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="../asset/account.png" class="avatar img-fluid" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end rounded">

                            </div>
                        </li>
                    </ul>
                </div>
                
            </nav>
            <?php require_once "../includes/message.php" ?>
            <main class="content px-3 py-4">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h3 class="fw-bold fs-4 my-3">Tickets</h3>
                        
                        
                            <div class="d-flex align-items-center">

                                <div id="tickets" class="d-flex flex-wrap"></div>

                            </div>
                        
                    </div>
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