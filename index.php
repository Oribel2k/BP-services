<?php
// Démarre une session si ce n'est pas déjà fait
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Inclut le fichier de connexion à la base de données
require_once __DIR__ . "/file.php";

// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identifiant = $_POST["identifiant"];
    $password = $_POST["password"];
    $login_success = false;

    foreach ($users as $user) {
        // Vérifie les identifiants et le mot de passe
        if ($user["identifiant"] === $identifiant && $user["mot_de_passe"] === $password) {
            $_SESSION['find'] = true;
            $_SESSION['user'] = $user['identifiant'];
            $_SESSION['role'] = $user['role'];
            $login_success = true;
            break;
        }
    }

    if ($login_success) {
        if ($_SESSION['role'] === 'dg') {
            header("Location: dashboard_dg.php");
        } else {
            header("Location: dashboard.php");
        }
        exit();
    } else {
        echo "Identifiant ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benin Petro - Connexion</title>
    <link rel="stylesheet" href="style/login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <img src="img/BENIN PETRO b.png" alt="Benin Petro Logo" class="logo">
            <h1>Connexion</h1>
        </div>

        <form class="login-form" id="loginForm" method="post">
            <h2>Etes-vous un agent BENIN PETRO ? Sinon <a href="accueil.php">cliquez ici</a></h2>
            <label for="identifiant">Identifiant</label>
            <input type="text" id="identifiant" name="identifiant" placeholder="Identifiant" required>
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Mot de passe" required>
            <button type="submit" class="submit-button">Se connecter</button>
        </form>
    </div>
</body>
</html>
