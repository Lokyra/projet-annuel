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
                <a href="#" class="btn btn-primary btn-sm ms-2">Add</a>
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
                    <form method="post" action="verif_ban.php?id=<?php echo $_GET['id']; ?>">
                        <div class="mb-3">
                    
                            <select class="form-select" aria-label="Default select example" name="duree">
                                <option selected>Choisissez la durée du banissement</option>
                                <option value="10min">10 minutes</option>
                                <option value="1h">1 heure</option>
                                <option value="1j">1 jour</option>    
                            </select>
                           
                        </div>
                        
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Motif du banissement</label>
                            <textarea class="form-control" name="motif" id="exampleFormControlTextarea1" rows="10"></textarea>
                            <div id="emailHelp" class="form-text">Expliquez la cause du banissement en évitant les mots vulgaire</div>
                        </div>

                        <button type="submit" class="btn btn-primary">Bannir</button>
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