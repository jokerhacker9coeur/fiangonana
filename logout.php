<?php
// Démarrer la session
session_start();

// Détruire la session et déconnecter l'utilisateur
session_destroy();

// Rediriger vers la page de connexion après déconnexion
header("Location: index.php");
exit();
?>