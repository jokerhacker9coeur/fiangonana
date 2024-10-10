<?php
// Configuration de la base de données
$servername = "localhost";
$username = "root"; // Utilisateur MySQL
$password = ""; // Mot de passe MySQL
$dbname = "fiangonana"; // Nom de la base de données

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
    $password = mysqli_real_escape_string($conn, $_POST['password']); // Gardez le mot de passe en clair

    // Chercher l'utilisateur dans la base de données
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Vérification du mot de passe
        $user = $result->fetch_assoc();
        // Vérifiez simplement si le mot de passe correspond, sans hachage
        if ($password === $user['password']) { // Vérification directe sans hachage
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['image'] = $user['image'];
            // Connexion réussie
            echo "<script>alert('Connexion réussie!')</script>";
            // Vous pouvez rediriger vers une autre page après la connexion
            header("Location: accueil/");
            exit;
        } else {
            // Mot de passe incorrect
            echo "<script>alert('Mot de passe incorrect!')</script>";
            echo "<script>window.location = 'index.php'</script>";
            exit;
        }
    } else {
        // Email non trouvé
        echo "<script>alert('Email non trouvé!')</script>";
        echo "<script>window.location = 'index.php'</script>";
        exit;
    }
}
// Fermer la connexion
$conn->close();
?>