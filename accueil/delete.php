<?php
// Configuration de la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fiangonana";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

if (isset($_POST['delete_btn'])) {
    $conn->begin_transaction();

    try {
        // Récupération de l'identifiant unique (id_kristianina ou numéro de téléphone)
        $id_kristianina = mysqli_real_escape_string($conn, $_POST['id_kristianina']); // Correct: id_kristianina

        // Suppression dans la table `faritra`
        $delete_faritra = mysqli_query($conn, "DELETE FROM faritra WHERE id_kristianina = '$id_kristianina'");
        if (!$delete_faritra) {
            throw new Exception("Erreur lors de la suppression dans la table faritra : " . mysqli_error($conn));
        }

        // Suppression dans la table `adidy`
        $delete_adidy = mysqli_query($conn, "DELETE FROM adidy WHERE id_kristianina = '$id_kristianina'");
        if (!$delete_adidy) {
            throw new Exception("Erreur lors de la suppression dans la table adidy : " . mysqli_error($conn));
        }

        // Suppression dans la table `fikambanana`
        $delete_fikambanana = mysqli_query($conn, "DELETE FROM fikambanana WHERE id_kristianina = '$id_kristianina'");
        if (!$delete_fikambanana) {
            throw new Exception("Erreur lors de la suppression dans la table fikambanana : " . mysqli_error($conn));
        }

        // Suppression dans la table `vaomiera`
        $delete_vaomiera = mysqli_query($conn, "DELETE FROM vaomiera WHERE id_kristianina = '$id_kristianina'");
        if (!$delete_vaomiera) {
            throw new Exception("Erreur lors de la suppression dans la table vaomiera : " . mysqli_error($conn));
        }

        // Récupération de l'image avant de supprimer l'enregistrement de la table `kristianina`
        $get_image = "SELECT image FROM kristianina WHERE id_kristianina = ?";
        $stmt_get_image = $conn->prepare($get_image);
        $stmt_get_image->bind_param('s', $id_kristianina);
        $stmt_get_image->execute();
        $result = $stmt_get_image->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            $image_path = "../uploads/" . $row['image']; // Assurez-vous que le chemin est correct
            // Suppression du fichier image du serveur, si l'image existe
            if (file_exists($image_path)) {
                if (!unlink($image_path)) {
                    throw new Exception("Erreur lors de la suppression de l'image sur le serveur.");
                }
            }
        }

        // Suppression dans la table `kristianina`
        $delete_kristianina = "DELETE FROM kristianina WHERE id_kristianina = ?";
        $stmt_kristianina = $conn->prepare($delete_kristianina);
        $stmt_kristianina->bind_param('s', $id_kristianina);

        if (!$stmt_kristianina->execute()) {
            throw new Exception("Erreur lors de la suppression dans la table kristianina : " . $stmt_kristianina->error);
        }

        // Si tout s'est bien passé, validez la transaction
        $conn->commit();
        echo 200;
        exit(); // Assurez-vous d'arrêter l'exécution après la redirection

    } catch (Exception $e) {
        $conn->rollback(); // Annulez si une erreur se produit
        echo 500;
    }

    // Fermeture des requêtes préparées
    if (isset($stmt_kristianina)) {
        $stmt_kristianina->close();
    }
    if (isset($stmt_get_image)) {
        $stmt_get_image->close();
    }

    // Fermeture de la connexion
    $conn->close();
}
?>