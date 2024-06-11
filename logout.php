<?php 
if (session_status() === PHP_SESSION_ACTIVE) {
    unset($_SESSION['login']);
}
header("Location: http://localhost/TRAVAUX/index.php");
exit;
?>
