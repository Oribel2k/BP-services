<?php
include 'file1.php'; // Connectez-vous à la base de données

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $email = $_POST['email'];
    $statut = "en cours"; // Valeur par défaut pour le statut

    // Validation des données
    if (empty($titre) || empty($description) || empty($email)) {
        echo "Tous les champs sont obligatoires.";
        exit;
    }

    // Insertion des données dans la base de données
    $sql = "INSERT INTO demandes (titre, description, email, statut) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        echo "Erreur de préparation de la requête: " . $conn->error;
        exit;
    }

    $stmt->bind_param('ssss', $titre, $description, $email, $statut);
    
    if ($stmt->execute()) {
        // Redirection après le succès
        header("Location: accueil.php");
        die();
    } else {
        echo "Erreur lors de la soumission de la demande: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirmation de Soumission</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container {
            text-align: center;
            margin-top: 50px;
        }
        .message {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .btn-ok {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
        }
        .btn-ok:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
            <div class="message">
            </div>
            <form action="submit.php" method="GET">
                <button type="submit" class="btn-ok">Ok</button>
            </form>
    </div>
</body>
</html>
