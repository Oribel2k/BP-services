<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'bp');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération des données du formulaire
$titre = $_POST['titre'];
$description = $_POST['description'];

// Insertion des données dans la base de données
$sql = "INSERT INTO demandes (titre, description, statut) VALUES ('$titre', '$description','en cours')";

if ($conn->query($sql) === TRUE) {
    echo "Demande soumise avec succès";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>