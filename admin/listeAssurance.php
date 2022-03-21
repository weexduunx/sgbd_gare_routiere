<?php
        // Configuration de base
    include_once "../configuration/config.php";
    
    // Vérifier si connecté en tant qu'administrateur
    include_once "verifconnex.php";
   
    // inclure des classes et des objets
    include_once '../configuration/bd.php';
    include_once '../objets/assurance.php';
    
    // Obtenir la connexion de base de données
    $basededonnee = new Basededonnee();
    $db = $basededonnee->connectBD();
   
    //initialiser les objets
    $utilisateur = new Assurance($db);
    
    // Définir le titre de la page
    $page_title = "Liste des Assurés";

    //inclure l'entête
    include "entête.php";
    //inclure la table de données
    include "page/assurance.php";
    //inclure le pied de page
    include "pied.php";

    
?>

