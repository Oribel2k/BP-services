<?php 
if (session_status() === PHP_SESSION_ACTIVE) {
    unset($_SESSION['login']);
}
header("Location: http://localhost/TRAVAUX/index.php");
exit;
?>

<?php
// // Démarrer la session
// session_start();

// // Vérifier si l'utilisateur est connecté
// if (isset($_SESSION['login'])) {
//     // Supprimer toutes les variables de session
//     $_SESSION = array();

//     // Détruire la session
//     session_destroy();

//     // Rediriger l'utilisateur vers la page de connexion ou une autre page appropriée
//     header("Location: index.php");
//     exit();
// } else {
//     // Si l'utilisateur n'est pas connecté, le rediriger vers la page de connexion ou une autre page appropriée
//     header("Location: index.php");
//     exit();
// }
?>