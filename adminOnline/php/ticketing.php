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
    <?php include('../includes/script.php'); ?>


</body>

</html>