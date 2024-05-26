

<?php // Paramètres de connexion à la base de données 
$serveur = "localhost"; // Adresse du serveur MySQL 
$utilisateur = "root"; // Nom d'utilisateur MySQL 
$motDePasse = ""; // Mot de passe MySQL (vide dans la configuration par défaut de WampServer) 
$baseDeDonnees = "bp"; // Nom de la base de données que vous avez créée dans phpMyAdmin 

// Récupérer les données du formulaire 
$username = $_POST['identifiant']; 
$password = $_POST['password']; 

// Connexion à la base de données 
$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees); 

// Vérification de la connexion 
if ($connexion->connect_error) { 
    die("Échec de la connexion : " . $connexion->connect_error); } 
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["identifiant"];
    $password = $_POST["password"];
    
    // Requête SQL pour vérifier les informations de connexion
    $query = "SELECT * FROM login WHERE identifiant='$username' and password='$password'";
    $result = $connexion->query($query);
    
    if ($result->num_rows == 1) {
        // Redirection vers une autre page si les informations sont correctes
        header("Location: C:\wamp64\www\TRAVAUX\db1.html");
        exit();
    } else {
        echo "Identifiants incorrects.";
    }
}
?>
