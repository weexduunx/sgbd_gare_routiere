<?php
    // Configuration de base
    include_once "frontend/configuration/config.php";
    // Détruire la session, il supprimera tous les paramètres de session
    session_destroy();
    
    //Rediriger vers la page de connexion
    header("Location: {$home_url}login.php");
?>