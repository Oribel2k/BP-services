<?php
// Redirection vers la page index.html
header('Location: http://localhost/Travaux/index.html');
exit();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benin Petro Dashboard</title>
    <link rel="stylesheet" href="style/db1.css">
</head>
<body>
    <div class="header">
        <img src="img/BENIN PETRO b.png" alt="Benin Petro">
        <div class="agent-name">John Doe</div>
    </div>
    <div class="dashboard">
        <div class="sidebar">
            <ul>
                <li><a href="#tableau-de-bord">Tableau de bord</a></li>
                <li><a href="#demandes-en-attente">Demandes en attentes</a></li>
                <li><a href="#demandes-validees">Demandes validées</a></li>
                <li><a href="#demandes-refusees">Demandes refusées</a></li>
            </ul>
        </div>
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
                        <td><div class="status-new"><button>Nouveau</button></div></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>