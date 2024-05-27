<?php
session_start();

// Remplacez les valeurs suivantes par les informations de connexion de votre base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bp";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['identifiant'];
    $input_password = $_POST['password'];

    // Préparation et exécution de la requête SQL
    $stmt = $conn->prepare("SELECT * FROM login WHERE identifiant = ? AND password = ?");
    $stmt->bind_param("ss", $input_username, $input_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Informations de connexion correctes, redirection vers la page protégée
        $_SESSION['loggedin'] = true;
        header("Location: dashboard.html");
    } else {
        // Informations de connexion incorrectes
        echo "<p>Identifiant ou mot de passe incorrect.</p>";
    }

    $stmt->close();
}

$conn->close();
?>
