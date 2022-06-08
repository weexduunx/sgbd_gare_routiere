<?php
// Afficher les rapports d'erreur
error_reporting(E_ALL);
 
// Démarrer la session PHP
session_start();

// Définition de la zone d'horaire par défaut
date_default_timezone_set('Africa/Dakar');
 
// Lien vers la page d'acceuil
$home_url="http://localhost/sgbd_gare_routiere-1/";
 
// Page donnée dans le paramètre URL, la page par défaut est une
$page = isset($_GET['page']) ? $_GET['page'] : 1;
 
// Définir le nombre d'enregistrements par page
$records_per_page = 5;
 
// calcul pour la clause de la limite de requête
$from_record_num = ($records_per_page * $page) - $records_per_page;
?>