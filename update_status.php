<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'bp');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération des données du formulaire
$id = $_POST['id'];
$action = $_POST['action'];

// Détermination du nouveau statut
if ($action == 'valider') {
    $new_status = 'validé';
} elseif ($action == 'rejeter') {
    $new_status = 'rejeté';
} else {
    die("Action non valide");
}

// Mise à jour du statut de la demande dans la base de données
$sql = "UPDATE demandes SET statut='$new_status' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Statut mis à jour avec succès";
} else {
    echo "Erreur: " . $conn->error;
}

$conn->close();

// Redirection vers le tableau de bord
header("Location: dashboard.php");
exit();
?>
