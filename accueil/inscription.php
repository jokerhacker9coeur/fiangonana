<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Configuration de la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fiangonana";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

if (isset($_POST['valider'])) {
    $conn->begin_transaction();

    try {
        // Récupération des données du formulaire
        $nom = mysqli_real_escape_string($conn, $_POST['nom']);
        $tel = mysqli_real_escape_string($conn, $_POST['tel']);
        $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
        $date_naissance = mysqli_real_escape_string($conn, $_POST['date']);
        $region = mysqli_real_escape_string($conn, $_POST['region']);
        $geo = mysqli_real_escape_string($conn, $_POST['geo']);
        $sakramenta = isset($_POST['sakramenta']) ? implode(", ", $_POST['sakramenta']) : '';
        $ray = mysqli_real_escape_string($conn, $_POST['ray']);
        $reny = mysqli_real_escape_string($conn, $_POST['reny']);
        $anarana = mysqli_real_escape_string($conn, $_POST['anarana']);
        $daty = mysqli_real_escape_string($conn, $_POST['daty']);

        // Récupération des données du formulaire

        // Vérification et assignation de "fikambanana"
        $fikambanana = isset($_POST['fikambanana']) ? mysqli_real_escape_string($conn, $_POST['fikambanana']) : '';

        // Si "Fikambanana hafa" a été sélectionné, utiliser cette valeur
        if ($fikambanana == 'add') {
            $fikambanana = isset($_POST['fikambanana_hafa']) ? mysqli_real_escape_string($conn, $_POST['fikambanana_hafa']) : '';
        }

        // Vérification et assignation de "vaomiera"
        $vaomiera = isset($_POST['vaomiera']) ? mysqli_real_escape_string($conn, $_POST['vaomiera']) : '';

        // Si "Vaomiera hafa" a été sélectionné, utiliser cette valeur
        if ($vaomiera == 'add') {
            $vaomiera = isset($_POST['vaomiera_hafa']) ? mysqli_real_escape_string($conn, $_POST['vaomiera_hafa']) : '';
        }


        // Gestion de l'upload d'image
        $image = $_FILES['file-upload']['name'];
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($image);

        // Vérification et déplacement du fichier
        if ($_FILES["file-upload"]["size"] > 5000000) { // Limite de 5MB
            throw new Exception("L'image est trop grande.");
        }
        if (!move_uploaded_file($_FILES["file-upload"]["tmp_name"], $target_file)) {
            throw new Exception("Erreur lors du téléchargement de l'image.");
        }

        // Vérifiez si $tel n'est pas vide
        if (empty($tel)) {
            throw new Exception("Le numéro de téléphone est manquant.");
        }

        // Préparer les déclarations d'insertion
        $stmt = $conn->prepare("INSERT INTO kristianina (numero, nom, prenom, date_naissance, nom_faritra, situation_geo, sakramenta, nom_fikambanana, nom_vaomiera, pere, mere, nom_adidy, date_adidy, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssssss", $tel, $nom, $prenom, $date_naissance, $region, $geo, $sakramenta, $fikambanana, $vaomiera, $ray, $reny, $anarana, $daty, $image);

        if (!$stmt->execute()) {
            throw new Exception("Erreur lors de l'insertion dans la table kristianina : " . $stmt->error);
        }

        // Récupération de l'ID du dernier enregistrement inséré
        $id_kristianina = $stmt->insert_id;

        // Insertion dans d'autres tables
        $insert_faritra_stmt = $conn->prepare("INSERT INTO faritra(nom_faritra, geo, id_kristianina) VALUES (?, ?, ?)");
        $insert_faritra_stmt->bind_param("ssi", $region, $geo, $id_kristianina);
        if (!$insert_faritra_stmt->execute()) {
            throw new Exception("Erreur lors de l'insertion dans la table faritra : " . $insert_faritra_stmt->error);
        }

        $insert_adidy_stmt = $conn->prepare("INSERT INTO adidy(nom_adidy, date_adidy, id_kristianina) VALUES (?, ?, ?)");
        $insert_adidy_stmt->bind_param("ssi", $anarana, $daty, $id_kristianina);
        if (!$insert_adidy_stmt->execute()) {
            throw new Exception("Erreur lors de l'insertion dans la table adidy : " . $insert_adidy_stmt->error);
        }

        $insert_fikambanana_stmt = $conn->prepare("INSERT INTO fikambanana(nom_fikambanana, id_kristianina) VALUES (?, ?)");
        $insert_fikambanana_stmt->bind_param("si", $fikambanana, $id_kristianina);
        if (!$insert_fikambanana_stmt->execute()) {
            throw new Exception("Erreur lors de l'insertion dans la table fikambanana : " . $insert_fikambanana_stmt->error);
        }

        $insert_vaomiera_stmt = $conn->prepare("INSERT INTO vaomiera(nom_vaomiera, id_kristianina) VALUES (?, ?)");
        $insert_vaomiera_stmt->bind_param("si", $vaomiera, $id_kristianina);
        if (!$insert_vaomiera_stmt->execute()) {
            throw new Exception("Erreur lors de l'insertion dans la table vaomiera : " . $insert_vaomiera_stmt->error);
        }

        // Validation de la transaction
        $conn->commit();
        $_SESSION['status']="Insertion avec succès";
        $_SESSION['status_code']="insertion";
        echo"<script>window.location='index.php'</script>";
        exit;

    } catch (Exception $e) {
        // Annulation de la transaction en cas d'erreur
        $conn->rollback();
        echo "Erreur lors de l'insertion : " . $e->getMessage();
    }

    // Fermeture des déclarations préparées
    $stmt->close();
    $insert_faritra_stmt->close();
    $insert_adidy_stmt->close();
    $insert_fikambanana_stmt->close();
    $insert_vaomiera_stmt->close();

    // Fermeture de la connexion
    $conn->close();
}
?>