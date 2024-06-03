<?php
require 'file.php'; // Inclure le fichier de configuration de la base de données

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $code = bin2hex(random_bytes(4)); // Générer un code alphanumérique à 8 caractères

    // Sauvegarder le code de vérification et l'email dans la base de données
    $stmt = $conn->prepare("INSERT INTO demandes (email, code_verification) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $code);

    if ($stmt->execute()) {
        // Envoyer l'email avec le code de vérification
        $to = $email;
        $subject = "Votre code de vérification";
        $message = "Votre code de vérification est : $code";
        $headers = "From: orgbtech@gmail.com.com\r\n";

        if (mail($to, $subject, $message, $headers)) {
            echo "Un email avec votre code de vérification a été envoyé.";
        } else {
            echo "Erreur lors de l'envoi de l'email.";
        }
    } else {
        echo "Erreur lors de la sauvegarde des données.";
    }

    $stmt->close();
    $conn->close();
}
?>
