<?php
include 'file1.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id']) && isset($_POST['action'])) {
        $id = intval($_POST['id']);
        $action = $_POST['action'];

        // Déterminer le nouveau statut
        if ($action == 'valider') {
            $statut = 'validé';
        } elseif ($action == 'rejeter') {
            $statut = 'rejetée';
        } else {
            echo "Action non reconnue.";
            exit;
        }

        // Mettre à jour le statut de la demande
        $sql = "UPDATE demandes SET statut = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);

        // if ($stmt === false) {
        //     echo "Erreur de préparation de la requête: " . $conn->error;
        //     exit;
        // }

        $stmt->bind_param('si', $statut, $id);

        if ($stmt->execute()) {
            // Rediriger vers la page d'accueil ou une page de confirmation
            header("Location: dashboard.php");
            exit;
        } else {
            echo "Erreur lors de la mise à jour du statut: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "ID ou action non spécifié.";
        exit;
    }
}

$conn->close();
?>
