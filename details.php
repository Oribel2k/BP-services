<?php
// Redirection vers la page index.html
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
header('Location: http://localhost/TRAVAUX/index.php');
exit();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/details.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/BENIN PETRO b.png" alt="Benin Petro">
        </div>
    </header>
    <main>
        <h1>Détails de la demande</h1>
        <div class="info-group">
            <p class="info-value">John Doe</p>
        </div>
        <div class="info-group">
            <p class="info-value">Jane</p>
        </div>
        <div class="info-group">
            <p class="info-value">35</p>
        </div>
        <div class="button-group">
            <button class="valider">Valider</button>
            <button class="rejeter">Rejeter</button>
        </div>
    </main>
    <div class="fixed-bottom">
        <div class="whatsapp-icon">
            <a href="https://wa.me/yourwhatsappnumber" target="_blank">
                <img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp">
            </a>
        </div> <br> <br>
        <footer class="footer">
            <div class="footer-content">
                <div class="copyright">
                    Copyright 2024
                </div>
            </div>
        </footer>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Récupère les valeurs depuis le localStorage
            const nom = localStorage.getItem('nom');
            const prenom = localStorage.getItem('prenom');
            const age = localStorage.getItem('age');

            // Affiche les valeurs dans le div résultat
            const resultatDiv = document.getElementById('resultat');
            resultatDiv.innerHTML = `<p><strong>Nom:</strong> ${nom}</p>
                                     <p><strong>Prénom:</strong> ${prenom}</p>
                                     <p><strong>Age:</strong> ${age}</p>`;
        });
    </script>
</body>
</html>