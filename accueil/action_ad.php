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

// Vérifiez si l'action est définie dans la requête POST
if (isset($_POST['action'])) {
    // Action pour récupérer tous les enregistrements
    if ($_POST['action'] == 'fetchData') {
        $sql = "
            SELECT 
                DISTINCT
                k.nom AS anarana, 
                k.prenom AS fanampiny_anarana, 
                k.numero AS laharana,
                f.nom_faritra AS faritra,
                fi.nom_fikambanana AS fikambanana,
                v.nom_vaomiera AS vaomiera,
                a.nom_adidy AS adidy,
                a.date_adidy AS daty_adidy
            FROM 
                kristianina k
            LEFT JOIN 
                faritra f ON k.nom_faritra = f.nom_faritra
            LEFT JOIN 
                fikambanana fi ON k.nom_fikambanana = fi.nom_fikambanana
            LEFT JOIN 
                vaomiera v ON k.nom_vaomiera = v.nom_vaomiera
            LEFT JOIN 
                adidy a ON k.nom_adidy = a.nom_adidy
        ";
        getData($sql, $conn);
    }

    // Action pour rechercher un enregistrement
    if ($_POST['action'] == 'searchRecord') {
        $emp_name = mysqli_real_escape_string($conn, $_POST['emp_name']);
        $sql = "
            SELECT 
                DISTINCT
                k.nom AS anarana, 
                k.prenom AS fanampiny_anarana, 
                k.numero AS laharana,
                f.nom_faritra AS faritra,
                fi.nom_fikambanana AS fikambanana,
                v.nom_vaomiera AS vaomiera,
                a.nom_adidy AS adidy,
                a.date_adidy AS daty_adidy
            FROM 
                kristianina k
            LEFT JOIN 
                faritra f ON k.nom_faritra = f.nom_faritra
            LEFT JOIN 
                fikambanana fi ON k.nom_fikambanana = fi.nom_fikambanana
            LEFT JOIN 
                vaomiera v ON k.nom_vaomiera = v.nom_vaomiera
            LEFT JOIN 
                adidy a ON k.nom_adidy = a.nom_adidy
            WHERE k.nom LIKE '$emp_name%'
        ";
        getData($sql, $conn);
    }
}

// Fonction pour afficher les résultats
function getData($sql, $conn) {
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr class="text-center">
                <td>' . $row['laharana'] . '</td>
                <td>' . $row['anarana'] . '</td>
                <td>' . $row['fanampiny_anarana'] . '</td>
                <td>' . $row['faritra'] . '</td>
                <td>' . $row['fikambanana'] . '</td>
                <td>' . $row['vaomiera'] . '</td>
                <td>' . $row['adidy'] . '</td>
                <td>' . $row['daty_adidy'] . '</td>
            </tr>';
        }
    } else {
        echo '<tr><td colspan="8" class="text-center">Aucun résultat trouvé</td></tr>';
    }
}

$conn->close();
?>