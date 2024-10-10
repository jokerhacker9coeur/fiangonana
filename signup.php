<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";  // Remplacez par votre nom d'utilisateur MySQL
$password = "";      // Remplacez par votre mot de passe MySQL
$dbname = "fiangonana";  // Remplacez par le nom de votre base de données

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Récupérer les données du formulaire et les sécuriser
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']); // Gardez le mot de passe en clair
        
        // Gestion de l'upload d'image
        $image = $_FILES['profile_image']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Vérification de la taille du fichier
        if ($_FILES["profile_image"]["size"] > 5000000) {
            throw new Exception("L'image est trop grande (limite de 5 Mo).");
        }

        // Vérifier que le fichier est une image
        $check = getimagesize($_FILES["profile_image"]["tmp_name"]);
        if ($check === false) {
            throw new Exception("Le fichier n'est pas une image.");
        }

        // Autoriser certains formats d'image
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowed_types)) {
            throw new Exception("Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.");
        }

        // Déplacer le fichier uploadé
        if (!move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
            throw new Exception("Erreur lors du téléchargement de l'image.");
        }

        // Vérifier si l'email existe déjà
        $check_email_stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $check_email_stmt->bind_param("s", $email);
        $check_email_stmt->execute();
        $result = $check_email_stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('Cet email est déjà utilisé !');</script>";
        } else {
            // Insertion des données dans la base de données avec une requête préparée
            $stmt = $conn->prepare("INSERT INTO users (username, email, password, image) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $username, $email, $password, $image); // Stocke le mot de passe en clair

            if ($stmt->execute()) {
                echo "<script>alert('Inscription réussie ! Vous pouvez maintenant vous connecter.');</script>";
                header("Location: index.php");
                exit(); // Terminer le script après redirection
            } else {
                throw new Exception("Erreur lors de l'insertion des données : " . $stmt->error);
            }
        }
    } catch (Exception $e) {
        echo "<script>alert('Erreur: " . $e->getMessage() . "');</script>";
    }
}

// Fermer la connexion
$conn->close();
?>