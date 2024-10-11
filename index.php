<?php
session_start();

// Vérifier si l'utilisateur est déjà connecté
if (isset($_SESSION['id'])) {
// Rediriger vers la page d'accueil ou tableau de bord si déjà connecté
header("Location: accueil/");
exit();
}
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
    <link href="img/eglise.jpg" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="fonts/css/all.min.css" rel="stylesheet">
    <link href="fonts/css/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="dist/css/owl.carousel.min.css" rel="stylesheet">
    <link href="dist/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
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


        <!-- Sign In Start -->
        <div class="container-fluid" id="signin">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="#" class="">
                                <h3 class="text-primary fs-1"><i class="fa fa-church me-2"></i></h3>
                            </a>
                            <h3>Se connecter</h3>
                        </div>
                        <form action="login.php" method="POST">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" name="email"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Addresse Email </label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" name="password"
                                    placeholder="Password" required>
                                <label for="floatingPassword">Mot de passe</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Vérifiez-moi</label>
                                </div>
                                <a href="">Mot de passe oublié</a>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Se connecter</button>
                            <p class="text-center mb-0">Je n'ai pas de compte? <a href="#" id="compte"
                                    class="fs-5">S'inscrire</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->

        <!-- Sign Up Start -->
        <div class="container-fluid" id="signup">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="#" class="">
                                <h3 class="text-primary fs-1"><i class="fa fa-church me-2"></i></h3>
                            </a>
                            <h3>S'inscrire</h3>
                        </div>
                        <!-- Formulaire avec upload image -->
                        <form action="signup.php" method="POST" enctype="multipart/form-data">
                            <!-- Champ de téléchargement d'image -->
                            <div class="mb-4">
                                <label for="file-upload" class="form-label">Ampidiro ny sary</label>
                                <input type="file" class="form-control" id="file-upload" name="profile_image"
                                    accept="image/*" onchange="previewImage(event)" required>
                                <img id="image-preview" src="#" alt="Aperçu de l'image" class="img-fluid mt-2"
                                    width="150px" heigth="150px" style="display:none;" />
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingText" name="username"
                                    placeholder="jhondoe" required>
                                <label for="floatingText">Nom de l'utilisateur</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" name="email"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Addresse Email</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" name="password"
                                    placeholder="Password" required>
                                <label for="floatingPassword">Mot de passe</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Vérifiez-moi</label>
                                </div>
                                <a href="">Mot de passe oublié</a>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">S'inscrire</button>
                            <p class="text-center mb-0">Vous avez déjà un compte? <a href="#" id="compte2" class="fs-5">
                                    Se_connecter</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->

        <!-- Script JavaScript pour prévisualisation de l'image -->
        <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('image-preview');
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        }
        </script>

        <!-- JavaScript Libraries -->
        <script src="dist/js/jquery-3.7.1.min.js"></script>
        <script src="dist/js/sweetalert.min.js"></script>
        <script src="dist/js/bootstrap.bundle.min.js"></script>
        <script src="dist/js/chart.min.js"></script>
        <script src="dist/js/easing.min.js"></script>
        <script src="dist/js/waypoints.min.js"></script>
        <script src="dist/js/owl.carousel.min.js"></script>
        <script src="dist/js/moment.min.js"></script>
        <script src="dist/js/moment-timezone.min.js"></script>
        <script src="dist/js/tempusdominus-bootstrap-4.min.js"></script>
        <?php 

if (isset($_SESSION['status']) && $_SESSION['status'] !='') {
   ?>
        <script>
        swal({
            title: '<?php echo $_SESSION['status'];?>',
            text: '<?php echo $_SESSION['status_code'];?>',
            icon: "error",
            button: "Okay",
        });
        </script>

        <?php
unset($_SESSION['status']);

}

?>
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        <script>
        $(document).ready(function() {

            $("#signup").hide();
            $("#compte").click(function() {
                $("#signin").fadeOut(function() {
                    $("#signup").fadeIn(3000);
                });
            });
        });
        </script>

        <script>
        $(document).ready(function() {
            $("#compte2").click(function() {
                $("#signup").fadeOut(function() {
                    $("#signin").fadeIn(3000);
                });
            });
        });
        </script>
</body>

</html>