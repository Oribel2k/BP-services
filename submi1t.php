<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Connexion à la base de données
$servername = "localhost";
$username = "root"; // Remplacez par votre nom d'utilisateur MySQL
$password = ""; // Remplacez par votre mot de passe MySQL
$dbname = "BP"; // Remplacez par le nom de votre base de données

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$email = $_POST['email'];

// Validation des données
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Adresse e-mail non valide");
}

// Génération du code unique
$unique_code = substr(md5(uniqid(mt_rand(), true)), 0, 8);

// Enregistrement des données dans la base de données
$sql = "INSERT INTO demande1 (email, code) VALUES ('$email', '$unique_code')";

if ($conn->query($sql) === TRUE) {
    // Configuration de PHPMailer pour envoyer l'e-mail
    $mail = new PHPMailer(true);
    try {
        // Paramètres du serveur
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Remplacez par votre serveur SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'orgbtech@gmail.com'; // Votre adresse e-mail Gmail
        $mail->Password = 'xykb slqa ttpc kfhp'; // Votre mot de passe Gmail ou App password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Destinataires
        $mail->setFrom('orgbtech@gmail.com', 'BENIN PETRO'); // Remplacez par votre adresse e-mail
        $mail->addAddress($email);

        // Contenu de l'e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Votre code unique';
        $mail->Body    = "Votre code unique est : $unique_code";

        $mail->send();
        echo "Un e-mail contenant votre code unique a été envoyé à $email.";
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
    }
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

// Fermer la connexion à la base de données
$conn->close();
?>
