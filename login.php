<?php
// Configuration de la base de données
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "fiangonana"; 

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Chercher l'utilisateur dans la base de données
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Vérification du mot de passe
        $user = $result->fetch_assoc();
        
        if ($password === $user['password']) {
            // Connexion réussie
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['image'] = $user['image'];

           // Connexion réussie
echo "<script>
alert('Connexion réussie!')
</script>";
// Vous pouvez rediriger vers une autre page après la connexion
header("Location: accueil/");
exit;
        } else {
            // Mot de passe incorrect
            $_SESSION['status'] = "Mot de passe incorrect!";
            $_SESSION['status_code'] = "mot de passe";
            echo"<script>window.location='index.php'</script>";
        exit;
        }
    } else {
        // Email non trouvé
        $_SESSION['status'] = "Email non trouvé!";
        $_SESSION['status_code'] = "email";
        echo"<script>window.location='index.php'</script>";
        exit;
    }
    // Fermer la connexion
    $conn->close();
}
?>
<script src="dist/js/sweetalert2.all.min.js"></script>
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