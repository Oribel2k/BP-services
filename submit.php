<?php
session_start();
$_SESSION['message'] = "Demande effectuée avec succès";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la base de données
    $conn = new mysqli('localhost', 'root', '', 'bp');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Récupération des données du formulaire
    $titre = $_POST['titre'];
    $description = $_POST['description'];

    // Insertion de la demande dans la base de données
    $sql = "INSERT INTO demandes (titre, description, statut)
            VALUES ('$titre', '$description', 'en cours')";

    if ($conn->query($sql) === TRUE) {
        // Redirection vers la page d'accueil avec un message de succès
        header("Location: accueil.php");
        exit();
    } else {
        echo "Erreur: " . $conn->error;
    }

    $conn->close();
}
?>
