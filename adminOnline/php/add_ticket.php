<!DOCTYPE html>
<html>

<head>
     <?php include('../includes/head.php'); ?>
</head>

<body>
 <?php include('../includes/sidebar.php'); ?>
        <div class="main">
            <nav class="navbar navbar-expand px-4 py-3">
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="text" placeholder="search" id="search_input" aria-label="Search">
                   
                </form>
                <a href="new_newsletter.php" class="btn btn-primary btn-sm ms-2">Ajouter</a>
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
                    <form method="post" action="verif_ticket.php">
                        <div class="mb-3">
                    
                            <select class="form-select" aria-label="Default select example" name="type">
                                <option selected>Choisissez une le type du ticket</option>
                                <option value="info">Info</option>
                                <option value="warning">Incident</option>
                                <option value="danger">Probleme</option>    
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
    <?php include('../includes/script.php'); ?>
</body>

</html>