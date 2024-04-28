<?php

include "../includes/debug.php";

require_once "db_connection.php";

$reqUserCount = $bdd->prepare("SELECT COUNT(email) as total_users FROM user");
$reqUserCount->execute();
$userCount = $reqUserCount->fetch(PDO::FETCH_ASSOC);

$monthUserCount = $bdd->prepare("SELECT COUNT(email) as progress FROM user
WHERE MONTH(signup_date) = MONTH(CURRENT_DATE()) AND YEAR(signup_date) = YEAR(CURRENT_DATE())");
$monthUserCount->execute();
$monthCount = $monthUserCount->fetch(PDO::FETCH_ASSOC);

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
                <form action="#">

                </form>
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
            <main class="content px-3 py-4">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h3 class="fw-bold fs-4 mb-3">Admin Dashboard</h3>
                        <div class="row">
                            <div class="col-12 col-md-4 ">
                                <div class="card border-0">
                                    <div class="card-body py-4 bg-light mb-3">
                                        <h5 class="mb-2 fw-bold">
                                            Members total
                                        </h5>
                                        <p class="mb-2 fw-bold">
                                            <?php echo $userCount['total_users']; ?>
                                        </p>
                                        <div class="mb-0">
                                            <span class="badge text-success me-2">
                                                +9.0%
                                            </span>
                                            <span class=" fw-bold">
                                                Since Last Month
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 ">
                                <div class="card  border-0">
                                    <div class="card-body py-4 bg-light mb-3">
                                        <h5 class="mb-2 fw-bold">
                                            Membres inscrit ce mois
                                        </h5>
                                        <p class="mb-2 fw-bold">
                                            <?php echo $monthCount['progress']; ?>
                                        </p>
                                        <div class="mb-0">
                                            <span class="badge text-success me-2">
                                                +9.0%
                                            </span>
                                            <span class="fw-bold">
                                                Since Last Month
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 ">
                                <div class="card border-0">
                                    <div class="card-body py-4 bg-light mb-3">
                                        <h5 class="mb-2 fw-bold">
                                            Membres En ligne
                                        </h5>
                                        <p class="mb-2 fw-bold">
                                            0
                                        </p>
                                        <div class="mb-0">
                                            <span class="badge text-success me-2">
                                                +9.0%
                                            </span>
                                            <span class="fw-bold">
                                                Since Last Month
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3 class="fw-bold fs-4 my-3">Online User
                        </h3>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="highlight">
                                            <th scope="col">#</th>
                                            <th scope="col">First</th>
                                            <th scope="col">Last</th>
                                            <th scope="col">Pseudo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Evans</td>
                                            <td>@mEvans</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Axel</td>
                                            <td>Blaise</td>
                                            <td>@Blasito</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Luffy</td>
                                            <td>Mugiwara</td>
                                            <td>@Monkey</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
</body>

</html>