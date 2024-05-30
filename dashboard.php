<?php
// Redirection vers la page index.html
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['find']) || $_SESSION['find'] !== true) {
    header('Location: http://localhost/TRAVAUX/index.php');
    exit();
}

// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'bp');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération des demandes
$sql = "SELECT id, titre, statut FROM demandes";
$result = $conn->query($sql);
?>

<table>
    <tr>
        <th>N°</th>
        <th>Titre de la demande</th>
        <th>Statut</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["titre"] . "</td>";
            echo "<td> <a href='details.php?id=" . $row["id"] . "'>Nouveau</a> </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Aucune demande</td></tr>";
    }
    ?>
</table>

<?php
$conn->close();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benin Petro Dashboard</title>
    <link rel="stylesheet" href="style/db1.css">
    <script src="script/script"></script>
</head>
<body>
    <!-- <div class="header">
        <img src="img/BENIN PETRO b.png" alt="Benin Petro">
        <div class="agent-name">John Doe</div>
    </div> -->
    <div class="dashboard">
        <!-- <div class="sidebar">
            <ul>
                <li><a href="#tableau-de-bord">Tableau de bord</a></li>
                <li><a href="#demandes-en-attente">Demandes en attentes</a></li>
                <li><a href="#demandes-validees">Demandes validées</a></li>
                <li><a href="#demandes-refusees">Demandes refusées</a></li>
                <li><a href="http://localhost/TRAVAUX/logout.php">Se déconnecter</a></li>
            </ul>
        </div> -->
        <div class="main-content">
            <div class="content-body">
                <table>
                    <tr>
                        <th>N°</th>
                        <th>Titre de la demande</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Station - services</td>
                        <td><div class="status-new"><button onclick="redirect()">Nouveau</button></div></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>