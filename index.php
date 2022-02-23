<?php
    // Configuration de base
    include_once "configuration/config.php";
    
    // Définit le titre de la page
    $page_title="Index";
    
    // inclure le vérificateur de connexion
    $require_login=true;
    include_once "verifconnex.php";
    
    // Inclure l'en-tête de la page HTML
    include_once 'entête.php';
    
    echo "<div class='col-md-12'>";
    
        // Pour prévenir un avis d'index non défini
        $action = isset($_GET['action']) ? $_GET['action'] : "";
    
        // Si la connexion a réussi
        if($action=='login_success'){
            echo "<div class='alert alert-info'>";
                echo "<strong>salut " . $_SESSION['prenom'] . ", content de te revoir!</strong>";
            echo "</div>";
        }
    
        //Si l'utilisateur est déjà connecté, affiché lorsque l'utilisateur tente d'accéder à la page de connexion
        else if($action=='already_logged_in'){
            echo "<div class='alert alert-info'>";
                echo "<strong>Vous êtes déjà connecté.</strong>";
            echo "</div>";
        }
    
        // Contenu une fois connecté
        echo "<div class='alert alert-info'>";
            echo "Contenu quand connecté sera ici. Par exemple, vos produits premium ou services.";
        echo "</div>";
    
    echo "</div>";
    
    //Footer HTML et codes JavaScript
    include 'pied.php';
?>