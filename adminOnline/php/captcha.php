<!DOCTYPE html>
<html>

<head>
    <?php include ('../includes/head.php'); ?>
</head>

<body>
        <?php include('../includes/sidebar.php'); ?>
        <div class="main">
            <nav class="navbar navbar-expand px-4 py-3">
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="text" placeholder="search" id="search_input" aria-label="Search" oninput="searchCaptchas()">
                   
                </form>
                <a href="add_captcha.php" class="btn btn-primary btn-sm ms-2">Ajouter</a>
                <?php
                session_start();
                if ($_SESSION['easter_egg'] == 1) {
                    echo "
                    <audio id='emmenez' src='../asset/emmenez.mp3' preload='auto'></audio>
                    <a onclick='play()' class='btn btn-primary btn-sm ms-2 mr-2' type='button'>Jouer l'aventure</a>
                    <a onclick='pause()' class='btn btn-primary btn-sm ms-2' type='button'>La mettre en pause</a>
                    ";
                }
                ?>
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
                        <h3 class="fw-bold fs-4 my-3">Captchas
                        </h3>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="highlight">
                                            <th scope="col">id</th>
                                            <th scope="col">Question</th>
                                            <th scope="col">Answer</th>
                                        </tr>
                                    </thead>
                                    <tbody id="captcha_result">
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
    <?php include('../includes/script.php'); ?>
    <?php
    session_start();
    if ($_SESSION['easter_egg'] == 1) {
        echo "
        <script src='../js/emmenez.js'></script>
        ";
    }
    ?>

</body>

</html>