
<?php
// Redirection vers la page index.html
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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
        <?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'bp');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération de l'ID de la demande
$id = $_GET['id'];

// Récupération des détails de la demande
$sql = "SELECT * FROM demandes WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h1 class= 'info-value'>Numéro " . $row["id"] . "</h1>";
    echo "<p class= 'info-value'>Titre: " . $row["titre"] . "</p>";
    echo "<p class= 'info-value'>Description: " . $row["description"] . "</p>";
    echo "<p class= 'info-value'>Statut: " . $row["statut"] . "</p>";
    // Ajout des boutons "Valider" et "Rejeter"
    echo "<form action='update_status.php' method='post'>
            <input type='hidden' name='id' value='" . $row["id"] . "'>
            <div class='button-group'>
            <button type='submit' name='action' value='valider' class='valider'>Valider</button>
            <button type='submit' name='action' value='rejeter' class='rejeter'>Rejeter</button>
            </div>
          </form>";
} else {
    echo "Demande non trouvée";
}

$conn->close();
?>

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
</body>
</html>