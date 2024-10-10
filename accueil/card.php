<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['image'])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Application Catholique</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../img/eglise.jpg" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="../fonts/css/all.min.css" rel="stylesheet">
    <link href="../fonts/css/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../dist/css/owl.carousel.min.css" rel="stylesheet">
    <link href="../dist/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->



        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-church me-2"></i>Eglise</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../uploads/<?php echo $_SESSION['image']; ?>" alt=""
                            style="width: 40px; height: 40px;">

                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">
                            <?php echo "". $_SESSION['username']; // Affiche le nom d'utilisateur ?></h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link active"><i class="fa fa-home me-2"></i>Accueil</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-list"></i>&nbsp;&nbsp;Liste</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="kristianina.php" class="dropdown-item mx-4"><i class="fa fa-users me-2"></i>
                                Kristianina</a>
                            <a href="adidy.php" class="dropdown-item mx-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 448 512"
                                    class="me-2">
                                    <!--! Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2024 Fonticons, Inc. -->
                                    <path fill="#6C7293"
                                        d="M128 0c13.3 0 24 10.7 24 24V64H296V24c0-13.3 10.7-24 24-24s24 10.7 24 24V64h40c35.3 0 64 28.7 64 64v16 48V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V192 144 128C0 92.7 28.7 64 64 64h40V24c0-13.3 10.7-24 24-24zM400 192H48V448c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V192zM329 297L217 409c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47 95-95c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                </svg>
                                Adidy
                            </a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-user me-2"></i>Mon Profile</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="card.php" class="dropdown-item mx-4"><i class=" fa fa-eye me-2"
                                    aria-hidden="true"></i>
                                Voir</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-church"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle" src="../uploads/<?php echo $_SESSION['image']; ?>" alt=""
                                style="width: 40px; height: 40px;">

                            <span
                                class="d-none d-lg-inline-flex"><?php echo "". $_SESSION['username']; // Affiche le nom d'utilisateur ?>
                            </span>
                        </a>
                        <?php 
} else {
    echo "Aucun utilisateur connecté";
}
?>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="../logout.php" class="dropdown-item"><i class="fa fa-sign-out"
                                    aria-hidden="true"></i> &nbsp;Se
                                déconnecter</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            <div class="container-fluid pt-4 px-4">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="../uploads/<?php echo $_SESSION['image']; ?>" class="img-fluid rounded-start"
                                alt="..." width="1400px" heigth="140px">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body text-dark">
                                <h5 class="card-title text-dark">
                                    <?php echo "". $_SESSION['username'];?></h5>
                                <p class="card-text">
                                    <?php echo "". $_SESSION['email'];?></p>
                                <p class="card-text"><a href="profile.php?id=<?php echo $_SESSION['id']; ?>"
                                        class="text-body-secondary btn btn-success"><i class="fa fa-edit
                                " aria-hidden="true"></i> Modifier</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- JavaScript Libraries -->
            <script src="../dist/js/jquery-3.7.1.min.js"></script>
            <script src="../dist/js/bootstrap.bundle.min.js"></script>
            <script src="../dist/js/chart.min.js"></script>
            <script src="../dist/js/easing.min.js"></script>
            <script src="../dist/js/waypoints.min.js"></script>
            <script src="../dist/js/owl.carousel.min.js"></script>
            <script src="../dist/js/moment.min.js"></script>
            <script src="../dist/js/moment-timezone.min.js"></script>
            <script src="../dist/js/tempusdominus-bootstrap-4.min.js"></script>
            <script src="../dist/js/sweetalert.min.js"></script>
            <script src="../dist/js/jquery-ui.min.js"></script>

            <script src="../js/main.js"></script>
</body>

</html>