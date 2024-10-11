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
             SELECT  kristianina.numero, kristianina.nom, kristianina.prenom, faritra.nom_faritra, fikambanana.nom_fikambanana, vaomiera.nom_vaomiera, adidy.nom_adidy, adidy.date_adidy 
            FROM kristianina
            INNER JOIN faritra ON kristianina.id_kristianina = faritra.id_kristianina
            INNER JOIN fikambanana ON kristianina.id_kristianina = fikambanana.id_kristianina
            INNER JOIN vaomiera ON kristianina.id_kristianina = vaomiera.id_kristianina
            INNER JOIN adidy ON kristianina.id_kristianina = adidy.id_kristianina
            ORDER BY kristianina.nom
        ";
        getData($sql, $conn);
    }

    // Action pour rechercher un enregistrement
    if ($_POST['action'] == 'searchRecord') {
        $emp_name = mysqli_real_escape_string($conn, $_POST['emp_name']);
        $sql = "
        SELECT kristianina.numero, kristianina.nom, kristianina.prenom, faritra.nom_faritra, fikambanana.nom_fikambanana, vaomiera.nom_vaomiera, adidy.nom_adidy, adidy.date_adidy 
        FROM kristianina
        INNER JOIN faritra ON kristianina.id_kristianina = faritra.id_kristianina
        INNER JOIN fikambanana ON kristianina.id_kristianina = fikambanana.id_kristianina
        INNER JOIN vaomiera ON kristianina.id_kristianina = vaomiera.id_kristianina
        INNER JOIN adidy ON kristianina.id_kristianina = adidy.id_kristianina
        WHERE kristianina.nom LIKE '$emp_name%' OR kristianina.prenom LIKE '$emp_name%'
        ORDER BY kristianina.nom
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
            <td>' . $row['numero'] . '</td>
            <td>' . $row['nom'] . '</td>
            <td>' . $row['prenom'] . '</td>
            <td>' . $row['nom_faritra'] . '</td>
            <td>' . $row['nom_fikambanana'] . '</td>
            <td>' . $row['nom_vaomiera'] . '</td>
            <td>' . $row['nom_adidy'] . '</td>
            <td>' . $row['date_adidy'] . '</td>
        </tr>';
        }
    } else {
        echo '<tr><td colspan="8" class="text-center">Aucun résultat trouvé</td></tr>';
    }
}

$conn->close();
?>