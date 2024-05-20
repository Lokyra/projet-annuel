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
                    <input class="form-control mr-sm-2" type="text" placeholder="search" id="search_input" aria-label="Search" oninput="searchUsers()">
                   
                </form>
                <a href="add_user.php" class="btn btn-primary btn-sm ms-2">Ajouter</a>
                <a href="pdf_generator.php" class="btn btn-primary btn-sm ms-2" target="_blank">Extraire les données utilisateurs</a>
                <?php
                session_start();
                if ($_SESSION['easter_egg'] == 1) {
                    echo "
                    <audio id='boheme' src='../asset/boheme.mp3' preload='auto'></audio>
                    <a onclick='play()' class='btn btn-primary btn-sm ms-2 mr-2' type='button'>Jouer le bon vieux temps</a>
                    <a onclick='pause()' class='btn btn-primary btn-sm ms-2' type='button'>Le mettre en pause</a>
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
                        <h3 class="fw-bold fs-4 my-3">Utilisateurs
                        </h3>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="highlight">
                                            <th scope="col">id</th>
                                            <th scope="col">pseudo</th>
                                            <th scope="col">Stats</th>
                                            <th scope="col">Email address</th>
                                            <th scope="col">is_sub</th>
                                            <th scope="col">Last Connection</th>   
                                        </tr>
                                    </thead>
                                    <tbody id="user_result">
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
        <script src='../js/boheme.js'></script>
        ";
    }
    ?>
    

</body>

</html>