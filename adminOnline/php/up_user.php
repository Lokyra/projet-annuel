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
                <a href="up_user.php" class="btn btn-primary btn-sm ms-2">Add</a>
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
                    <form method="post" action="verif_up_user.php?id=<?php echo $_GET['id']; ?>">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Changer le pseudo</label>
                            <input type="text" name="pseudo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Changer l'email</label>
                            <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Changer le mot de passe</label>
                            <input type="text" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    
                    
                        <button type="submit" class="btn btn-primary">Modifier</button>
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