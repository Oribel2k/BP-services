<?php
// require 'file.php'; // Inclure le fichier de configuration de la base de données

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $code = $_POST['code'];

//     // Préparer et exécuter la requête SQL pour vérifier l'état de la demande
//     $stmt = $conn->prepare("SELECT statut FROM demandes WHERE code_verification = ?");
//     $stmt->bind_param("s", $code);
//     $stmt->execute();
//     $stmt->bind_result($statut);
//     $stmt->fetch();

//     // Afficher l'état de la demande
//     if ($statut) {
//         echo "L'état de votre demande est : " . htmlspecialchars($statut);
//     } else {
//         echo "Code de vérification invalide.";
//     }

//     $stmt->close();
//     $conn->close();
// }
?>
