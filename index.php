<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . "/file.php";

if (isset($_POST["identifiant"]) && isset($_POST["password"])) {
    $identifiant = $_POST["identifiant"];
    $password = $_POST["password"];
    foreach ($users as $user) {
        if ($user["identifiant"] === $identifiant && $user["mot_de_passe"] === $password) {
            $_SESSION['find'] = true;
            break;
        }
    }
};

if (isset($_SESSION['find']) && $_SESSION['find'] === true) {
    header("Location: http://localhost/TRAVAUX/dashboard.php");
    exit();
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

        <form class="login-form" id="loginForm" method = "post">
            <h2>Etes-vous un agent BENIN PETRO ? Sinon <a href="accueil.html">cliquez ici</a></h2>
            <label for="identifiant">Identifiant</label>
            <input type="text" id="identifiant" name="identifiant" placeholder="Identifiant" required>
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Mot de passe" required>
            <button type="submit" class="submit-button" >Se connecter</button>
        </form>
    </div>
</body>
</html>