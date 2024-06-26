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
                <a href="new_newsletter.php" class="btn btn-primary btn-sm ms-2">Add</a>
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
                    <form method="post" action="verif_up_newsletter.php?id=<?php echo $_GET['id']; ?>">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Sujet de la newsletter</label>
                            <input type="text" name="topic" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Sujet Generale.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Objet du mail</label>
                            <input type="text" name="subject" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="10"></textarea>
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