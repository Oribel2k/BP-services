<?php
include('file.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $email = $_POST['email'];
    $code_verification = bin2hex(random_bytes(4)); // Générer un code de vérification aléatoire
    $status = 'en cours';

    // Préparer la requête d'insertion
    $query = "INSERT INTO demandes (titre, description, email, code_verification, status) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        die('Erreur de préparation de la requête : ' . htmlspecialchars($conn->error));
    }

    // Lier les paramètres
    $stmt->bind_param('sssss', $titre, $description, $email, $code_verification, $status);

    // Exécuter la requête
    if ($stmt->execute()) {
        // Envoyer un email avec le code de vérification
        $to = $email;
        $subject = "Votre code de vérification";
        $message = "Votre code de vérification est : $code_verification";
        $headers = "From: orgbtech@gmail.com\r\n";

        if (mail($to, $subject, $message, $headers)) {
            // Rediriger vers la page de confirmation
            echo '<script type="text/javascript">';
            echo 'alert("Votre demande a bien été soumise.");';
            echo 'window.location.href = "index.php";';
            echo '</script>';
        } else {
            echo "Erreur lors de l'envoi de l'email.";
        }
    } else {
        echo "Erreur lors de l'insertion de la demande : " . htmlspecialchars($stmt->error);
    }

    // Fermer la requête et la connexion
    $stmt->close();
    $conn->close();
}
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
        <?php if (!empty($message)): ?>
            <div class="message">
                <?php echo $message; ?>
            </div>
            <form action="index.php" method="GET">
                <button type="submit" class="btn-ok">Ok</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
