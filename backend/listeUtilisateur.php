<?php
        // Configuration de base
    include_once "configuration/config.php";
    
    // Vérifier si connecté en tant qu'administrateur
    include_once "verifconnex.php";
    
    // Définir le titre de la page
    $page_title = "Liste des Membres";

    //inclure l'entête
    include "entête.php";
    //inclure la table de données
    include "page/tableliste.php";
    //inclure le pied de page
    include "pied.php";

    
?>

