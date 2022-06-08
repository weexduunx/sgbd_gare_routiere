<?php
    // Vérificateur de connexion pour le niveau d'accès 'admin'
    
    // Si la valeur de la session est vide, il n'est pas encore connecté, on le redirige vers la page de connexion
    if(empty($_SESSION['logged_in'])){
        header("Location: {$home_url}login.php?action=not_yet_logged_in");
    }
    
    // Si le niveau d'accès n'est pas «admin», redirige-le à la page de connexion
    else if($_SESSION['niveau_dacces']!="Admin"){
        header("Location: {$home_url}login.php?action=not_admin");
    }

    else{
        // Pas de problème, restez sur la page en cours
    }
?>