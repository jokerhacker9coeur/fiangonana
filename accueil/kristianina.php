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
                <form class="d-none d-md-flex ms-4" method="post">
                    <input class="form-control bg-dark border-0" type="search" name="emp_name" id="emp_name"
                        placeholder="Search">
                </form>
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


            <?php
// Configuration de la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fiangonana"; // Nouvelle base de données

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Requête pour récupérer les données avec jointure
$sql = "
SELECT
    kristianina.id_kristianina, 
    kristianina.nom, 
    kristianina.prenom, 
    kristianina.date_naissance,
    kristianina.pere, 
    kristianina.mere, 
    kristianina.image,
    kristianina.numero, 
    fikambanana.nom_fikambanana, 
    vaomiera.nom_vaomiera, 
    faritra.nom_faritra, 
    faritra.geo 
FROM 
    kristianina
JOIN 
    fikambanana ON kristianina.id_kristianina = fikambanana.id_kristianina
JOIN 
    vaomiera ON kristianina.id_kristianina = vaomiera.id_kristianina
JOIN 
    faritra ON kristianina.id_kristianina= faritra.id_kristianina
    ORDER BY kristianina.nom
";

// Exécution de la requête
$result = $conn->query($sql);

// Affichage dans un tableau HTML
if ($result->num_rows > 0) {
    echo '
    <div class="container-fluid pt-4 px-4">
        <div class="col-xl-12 col-md-12 col-sm-12">
            <div class="bg-secondary rounded p-4">
                <h6 class="mb-4">Liste des Kristianina</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">ID</th>
                                <th scope="col">Sary</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Ray</th>
                                <th scope="col">Reny</th>
                                <th scope="col">Laharana</th>
                                <th scope="col">Daty_Nahaterana</th>
                                <th scope="col">Faritra</th>
                                <th scope="col">Situation_géo</th>
                                <th scope="col">Fikambanana</th>
                                <th scope="col">Vaomiera</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody id="post_list">';

    // Afficher chaque ligne de la base de données
while($row = $result->fetch_assoc()) {
    echo '<tr class="text-center">
            <th scope="row">' . $row['id_kristianina'] . '</th>
            <td><img src="../uploads/' . $row['image'] . '" class="img-circle" width="150px;" height="100px;"/></td>
            <td>' . $row['nom'] . '</td>
            <td>' . $row['prenom'] . '</td>
            <td>' . $row['pere'] . '</td>
            <td>' . $row['mere'] . '</td>
            <td>' . $row['numero'] . '</td>
            <td>' . $row['date_naissance'] . '</td>
            <td>' . $row['nom_faritra'] . '</td>
            <td>' . $row['geo'] . '</td>
            <td>' . $row['nom_fikambanana'] . '</td>
            <td>' . $row['nom_vaomiera'] . '</td>
            <td><a href="update.php?id_kristianina=' . $row['id_kristianina'] . '" class="btn btn-primary"><i class="fa fa-edit fs-5" aria-hidden="true"></i> </a></td>
            <td>
             <button type="button" class="btn btn-primary delete_btn" value="' . $row['id_kristianina'] . '">
              <i class="fa fa-trash fs-5" aria-hidden="true"></i>
             </button>
            </td>
        </tr>';

}


    echo '        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>';
} else {
    echo "Aucune donnée trouvée";
}

// Fermeture de la connexion
$conn->close();
?>
            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">App_Catholique</a>, Tous droits réservés.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <p class="text-white">
                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="30"
                                    height="30" viewBox="0 0 512 512">
                                    <path fill="blue" fill-rule="evenodd"
                                        d="M480,257.35c0-123.7-100.3-224-224-224s-224,100.3-224,224c0,111.8,81.9,204.47,189,221.29V322.12H164.11V257.35H221V208c0-56.13,33.45-87.16,84.61-87.16,24.51,0,50.15,4.38,50.15,4.38v55.13H327.5c-27.81,0-36.51,17.26-36.51,35v42h62.12l-9.92,64.77H291V478.66C398.1,461.85,480,369.18,480,257.35Z" />
                                </svg>
                                Yoram Nanay
                            </p>
                            <p class="text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512">
                                    <path
                                        d="M441.6,171.61,266.87,85.37a24.57,24.57,0,0,0-21.74,0L70.4,171.61A40,40,0,0,0,48,207.39V392c0,22.09,18.14,40,40.52,40h335c22.38,0,40.52-17.91,40.52-40V207.39A40,40,0,0,0,441.6,171.61Z"
                                        style="fill:none;stroke: blue;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" />
                                    <path d="M397.33,368,268.07,267.46a24,24,0,0,0-29.47,0L109.33,368"
                                        style="fill:none;stroke: blue;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" />
                                    <line x1="309.33" y1="295" x2="445.33" y2="192"
                                        style="fill:none;stroke: blue;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" />
                                    <line x1="61.33" y1="192" x2="200.33" y2="297"
                                        style="fill:none;stroke: blue;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" />
                                </svg>
                                nanayyoram00@gmail.com
                            </p>
                            <p class="text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512">
                                    <path fill="blue"
                                        d="M391,480c-19.52,0-46.94-7.06-88-30-49.93-28-88.55-53.85-138.21-103.38C116.91,298.77,93.61,267.79,61,208.45c-36.84-67-30.56-102.12-23.54-117.13C45.82,73.38,58.16,62.65,74.11,52A176.3,176.3,0,0,1,102.75,36.8c1-.43,1.93-.84,2.76-1.21,4.95-2.23,12.45-5.6,21.95-2,6.34,2.38,12,7.25,20.86,16,18.17,17.92,43,57.83,52.16,77.43,6.15,13.21,10.22,21.93,10.23,31.71,0,11.45-5.76,20.28-12.75,29.81-1.31,1.79-2.61,3.5-3.87,5.16-7.61,10-9.28,12.89-8.18,18.05,2.23,10.37,18.86,41.24,46.19,68.51s57.31,42.85,67.72,45.07c5.38,1.15,8.33-.59,18.65-8.47,1.48-1.13,3-2.3,4.59-3.47,10.66-7.93,19.08-13.54,30.26-13.54h.06c9.73,0,18.06,4.22,31.86,11.18,18,9.08,59.11,33.59,77.14,51.78,8.77,8.84,13.66,14.48,16.05,20.81,3.6,9.53.21,17-2,22-.37.83-.78,1.74-1.21,2.75a176.49,176.49,0,0,1-15.29,28.58c-10.63,15.9-21.4,28.21-39.38,36.58A67.42,67.42,0,0,1,391,480Z" />
                                </svg>

                                +261 38 46 182 63
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->

        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>
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
    <script type="text/javascript">
    function fetchData() {
        var action = 'fetchData';
        $.ajax({
            url: "action.php", // L'URL du fichier PHP
            method: "POST", // La méthode doit être en majuscule
            data: {
                action: action
            },
            success: function(data) {
                $('#post_list').html(
                    data); // Insérer les résultats dans un élément HTML avec l'ID post_list
                //alert(data);
            },
            error: function() {
                alert('Erreur lors de la récupération des données');
            }
        });
    }
    // Vous pouvez appeler fetchData() pour charger les données au démarrage de la page
    $(document).ready(function() {
        fetchData();
    });
    </script>

    <script>
    $(document).ready(function() {
        function fetchAllData() {
            // Envoyer une requête pour récupérer tous les enregistrements si le champ est vide
            var action = 'fetchData'; // Action pour récupérer tous les enregistrements

            $.ajax({
                url: "action.php", // L'URL du fichier PHP
                method: "POST",
                data: {
                    action: action
                },
                success: function(data) {
                    // Remplacer uniquement le contenu du <tbody>
                    $('#post_list').html(data);
                },
                error: function() {
                    alert('Erreur lors de la récupération des données');
                }
            });
        }

        // Charger tous les résultats lorsque la page est chargée
        fetchAllData();

        $('#emp_name').keyup(function(event) {
            event.preventDefault();
            var emp_name = $('#emp_name').val();
            var action;

            if (emp_name != '') {
                action = 'searchRecord'; // Action pour effectuer la recherche
            } else {
                fetchAllData(); // Si le champ est vide, récupérer tous les enregistrements
                return;
            }

            // Effectuer une recherche si l'utilisateur tape quelque chose
            $.ajax({
                url: "action.php", // L'URL du fichier PHP
                method: "POST",
                data: {
                    action: action,
                    emp_name: emp_name
                },
                success: function(data) {
                    // Remplacer uniquement le contenu du <tbody>
                    $('#post_list').html(data);
                },
                error: function() {
                    alert('Erreur lors de la récupération des données');
                }
            });
        });
    });
    </script>


    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>

</html>