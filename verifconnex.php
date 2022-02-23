<?php
// Vérificateur de connexion pour le niveau d'accès 'client'
 
// Si le niveau d'accès n'était pas «admin», redirige-le à la page de connexion
if(isset($_SESSION['niveau_dacces']) && $_SESSION['niveau_dacces']=="Admin"){
    header("Location: {$home_url}admin/index.php?action=logged_in_as_admin");
}
 
// Si $require_login a été défini et la valeur est 'true'
else if(isset($require_login) && $require_login==true){
    // Si l'utilisateur n'est pas encore connecté, rediriger vers la page de connexion
    if(!isset($_SESSION['niveau_dacces'])){
        header("Location: {$home_url}login.php?action=please_login");
    }
}
 
// Si c'était la page "Connexion" ou "Inscrivez-vous" ou "Inscription", mais le client était déjà connecté
else if(isset($page_title) && ($page_title=="Login" || $page_title=="Sign Up")){
    // Si l'utilisateur n'est pas encore connecté, rediriger vers la page de connexion
    if(isset($_SESSION['niveau_dacces']) && $_SESSION['niveau_dacces']=="Customer"){
        header("Location: {$home_url}index.php?action=already_logged_in");
    }
}
 
else{
    // Pas de problème, restez sur la page en cours
}
?>