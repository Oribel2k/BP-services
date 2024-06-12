<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'bp');

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Exécutez la requête SQL pour récupérer les utilisateurs
$sql = "SELECT identifiant, mot_de_passe, role FROM login";
$result = $conn->query($sql);

if ($result === false) {
    die("Erreur de requête SQL: " . $conn->error);
}

$users = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = [
            'identifiant' => $row['identifiant'],
            'mot_de_passe' => $row['mot_de_passe'],
            'role' => $row['role']
        ];
    }
}

$conn->close();
?>
