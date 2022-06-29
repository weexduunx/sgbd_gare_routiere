<?php
        // Configuration de base
    include_once "configuration/config.php";
    
    // Vérifier si connecté en tant qu'administrateur
    include_once "verifconnex.php";
    
    // Définir le titre de la page
    $page_title = "Liste des Commandes";

    //inclure l'entête
    include "comCrud/entete.php";
    //inclure la table de données
    include "page/commande.php";
    //inclure le pied de page
    include "comCrud/pied.php";

    
?>

