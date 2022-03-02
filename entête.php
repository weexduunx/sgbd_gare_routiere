<!DOCTYPE html>
<html lang="fr">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- set the page title, for seo purposes too -->
    <title><?php echo isset($page_title) ? strip_tags($page_title) : "Bokk Yakaar"; ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen" />
 
    <!-- Admin personnalisation CSS -->
    <link href="<?php echo $home_url . "assets/css/personnalisation.css" ?>" rel="stylesheet" />
 
</head>
<body>
 
    <!-- Inclure la barre de navigation -->
    <?php include_once 'navigation.php'; ?>
 
    <!-- container -->
    <div class="container">
 
        <?php
        // Si le titre de la page donné est 'Connectez-vous, ne pas afficher le titre.
        if($page_title!="Connexion"){
        ?>
        <div class='col-md-12'>
            <div class="page-header">
               <h1><?php echo isset($page_title) ? $page_title : "Don Spirit Code"; ?></h1>
            </div>
        </div>
        <?php
        }
        ?>