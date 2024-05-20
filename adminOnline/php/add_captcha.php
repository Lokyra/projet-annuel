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
                    <input class="form-control mr-sm-2" type="text" placeholder="search" id="search_input" aria-label="Search">
                   
                </form>
                <a href="add_captcha.php" class="btn btn-primary btn-sm ms-2">Ajouter</a>
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
                    <form method="post" action="verif_captcha.php">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nouvelle Question</label>
                            <input type="text" name="question" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Votre question doit etre différente que celles existantes.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Réponse</label>
                            <input type="text" name="answer" class="form-control" id="exampleInputPassword1">
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </main>
            <footer class="footer">
            </footer>
        </div>
    </div>
    <?php include('../includes/script.php'); ?>

</body>

</html>