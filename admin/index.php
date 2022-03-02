<?php
    // Configuration de base
    include_once "../configuration/config.php";
    // Vérifier si connecté en tant qu'administrateur
    include_once "verifconnex.php";
    // Définir le titre de la page
    $page_title="Tableau de bord";
    //Inclure l'entête
    include "entête.php";
    //inclure le contenu du Tableau de Bord
    include "page/contenuTB.php";
    //inclure le pied de page
    include "pied.php";
?>


