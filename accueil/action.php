<?php 
// Paramètres de connexion
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fiangonana";

// Création de la connexion
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("La connexion a échoué: " . mysqli_connect_error());
}

// Vérifiez si l'action est définie dans la requête POST
if (isset($_POST['action'])) {
    
    // Action pour récupérer les données initiales
    if ($_POST['action'] == 'fetchData') {
        $sql = "
        SELECT
            k.id_kristianina, 
            k.nom, 
            k.prenom, 
            k.date_naissance,
            k.pere, 
            k.mere, 
            k.image,
            k.numero, 
            f.nom_fikambanana, 
            v.nom_vaomiera, 
            r.nom_faritra, 
            r.geo 
        FROM 
            kristianina k
        JOIN 
            fikambanana f ON k.id_kristianina = f.id_kristianina
        JOIN 
            vaomiera v ON k.id_kristianina = v.id_kristianina
        JOIN 
            faritra r ON k.id_kristianina = r.id_kristianina
        ORDER BY k.nom
        ";

        getData($sql, $conn);
    }

    // Action pour rechercher un enregistrement
    if ($_POST['action'] == 'searchRecord') {
        $emp_name = mysqli_real_escape_string($conn, $_POST['emp_name']);
        
        // Requête SQL avec recherche par nom
        $sql = "
        SELECT 
            k.id_kristianina, 
            k.nom, 
            k.prenom, 
            k.date_naissance,
            k.pere, 
            k.mere, 
            k.numero, 
            k.image,
            r.nom_faritra,
            r.geo,
            f.nom_fikambanana, 
            v.nom_vaomiera
        FROM kristianina k
        JOIN faritra r ON k.id_kristianina = r.id_kristianina
        JOIN fikambanana f ON k.id_kristianina = f.id_kristianina
        JOIN vaomiera v ON k.id_kristianina = v.id_kristianina
        WHERE k.nom LIKE '$emp_name%' OR k.prenom LIKE '$emp_name%'
        ORDER BY k.nom
        ";

        getData($sql, $conn);
    }
}
// Fonction pour exécuter la requête et afficher les résultats
function getData($sql, $conn) {
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr class="text-center">
                    <td>' . htmlspecialchars($row['id_kristianina']) . '</td>
                    <td><img src="../uploads/' . htmlspecialchars($row['image']) . '" class="img-circle" width="150px;" height="100px;"/></td>
                    <td>' . htmlspecialchars($row['nom']) . '</td>
                    <td>' . htmlspecialchars($row['prenom']) . '</td>
                    <td>' . htmlspecialchars($row['pere']) . '</td>
                    <td>' . htmlspecialchars($row['mere']) . '</td>
                    <td>' . htmlspecialchars($row['numero']) . '</td>
                    <td>' . htmlspecialchars($row['date_naissance']) . '</td>
                    <td>' . htmlspecialchars($row['nom_faritra']) . '</td>
                    <td>' . htmlspecialchars($row['geo']) . '</td>
                    <td>' . htmlspecialchars($row['nom_fikambanana']) . '</td>
                    <td>' . htmlspecialchars($row['nom_vaomiera']) . '</td>
                    <td><a href="update.php?id_kristianina=' . htmlspecialchars($row['id_kristianina']) . '" class="btn btn-primary"><i class="fa fa-edit fs-5" aria-hidden="true"></i></a></td>
                    <td>
                        <button type="button" class="btn btn-primary delete_btn" value="' . htmlspecialchars($row['id_kristianina']) . '">
                            <i class="fa fa-trash fs-5" aria-hidden="true"></i>
                        </button>
                    </td>
                </tr>';
        }
    } else {
        echo '<tr><td colspan="14" class="text-center">Aucun résultat trouvé</td></tr>';
    }
}
?>

<script>
$(document).ready(function() {
    $(".delete_btn").click(function(e) {
        e.preventDefault();

        var id_kristianina = $(this).val();
        swal({
                title: "Êtes-vous sûr?",
                text: "Une fois supprimé, vous ne pourrez plus récupérer !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: "POST",
                        url: "delete.php",
                        data: {
                            'id_kristianina': id_kristianina,
                            'delete_btn': true
                        },
                        success: function(response) {
                            if (response == 200) {
                                swal("Succès!", "Suppression réussie!", "success")
                                    .then(() => {
                                        // Redirige après la suppression réussie
                                        window.location.href = "kristianina.php";
                                    });
                            } else if (response == 500) {
                                swal("Erreur!", "Erreur lors de la suppression!",
                                    "error");
                            }
                        }
                    });
                }
            });
    });
});
</script>