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
    <div class="header">
        <img src="img/BENIN PETRO b.png" alt="Benin Petro">
        <div class="agent-name"> Tableau de bord</div>
        <div class="agent-name">John Doe</div>
    </div>
    <div class="dashboard">
        <div class="sidebar">
            <ul>
                <li><a href="dashboard.php">Nouvelles demandes</a></li>
                <li><a href="demandes_validees.php" class= "active">Demandes validées</a></li>
                <li><a href="demandes_rejetees.php">Demandes refusées</a></li>
                <li><a href="http://localhost/TRAVAUX/logout.php">Se déconnecter</a></li>
            </ul>
        </div>
        <div class="main-content">
            <div class="content-body">
                <?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'bp');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération des demandes validées
$sql = "SELECT id, titre, statut FROM demandes WHERE statut = 'validé' ORDER BY id DESC";
$result = $conn->query($sql);
?>

<table>
    <tr>
        <th>N°</th>
        <th>Titre de la demande</th>
        <th>Statut</th>
        <th>Action</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["titre"] . "</td>";
            echo "<td>" . $row["statut"] . "</td>";
            echo "<td><a href='details.php?id=" . $row["id"] . "'>Voir les détails</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Aucune demande validée</td></tr>";
    }
    ?>
</table>

<?php
$conn->close();
?>
