<?php

include "../includes/debug.php";

require_once "../includes/db_connection.php";

$req = $bdd->prepare("SELECT COUNT(email) as total_users FROM user");
$req->execute();
$userCount = $req->fetch(PDO::FETCH_ASSOC);

$progress = $bdd->prepare("SELECT COUNT(email) as progress FROM user
WHERE MONTH(signup_date) = MONTH(CURRENT_DATE()) AND YEAR(signup_date) = YEAR(CURRENT_DATE())");
$progress->execute();
$monthCount = $progress->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>

<head>
    <?php include('../includes/head.php'); ?>
</head>

<body>
        <?php include('../includes/sidebar.php'); ?>
        <div id="spark"></div>
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
                                            Membres total
                                        </h5>
                                        <p class="mb-2 fw-bold">
                                            <?php echo $userCount['total_users']; ?>
                                        </p>
                                        <div class="mb-0">
                                            <span class="badge text-success me-2">
                                                +9.0%
                                            </span>
                                            <span class=" fw-bold">
                                                Depuis le dernier mois
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
                                                Depuis le dernier mois
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
                             
                    </div>
                </div>
            </main>
            <footer class="footer">
            </footer>
        </div>
    </div>
    <?php include('../includes/script.php'); ?>
   
    
</body>

</html>