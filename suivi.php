<?php
include('file.php');

$erreur = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $code_verification = $_POST['code_verification'];

    $query = "SELECT * FROM demandes WHERE code_verification = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $code_verification);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $demande = $result->fetch_assoc();
    } else {
        $erreur = "Code de vérification invalide.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/suivi.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="script/script.js"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <img src="img/BENIN PETRO b.png" alt="" class="title">
        <div class="navbar">
            <nav class="navmenu">
                <ul>
                    <li><a href="accueil.php" >Nouvelle demande</a></li>
                    <li><a href="suivi.html" class="active">Statut de la demande</a></li>
                    <li><a href="plaintes.html">Plaintes et Réclamations</a></li>
                    <li><a href="FAQ.html">FAQs</a></li>
                </ul>
            </nav>
        </div>
    </header>  <br>
    <div class="verification-container">
        <form class="verification-form">
            <h2>Entrez votre code de vérification</h2>
            <input type="text" id="verification-code" name="verification-code" placeholder="Code de vérification : AB34ZX0W" required>
            <button type="submit" class="submit-button">Soumettre</button>
        </form>
        <?php if (!empty($message)): ?>
            <p>
                <?php echo $message; ?>
            </p>
        <?php elseif (!empty($status)): ?>
            <p>
                Le statut de votre demande est : <?php echo $status; ?>
            </p>
        <?php endif; ?>
    </div>
    <div class="fixed-bottom">
        <div class="whatsapp-icon">
            <a href="https://wa.me/+22966342020" target="_blank">
                <img src="img/whatsapp.png" alt="WhatsApp">
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