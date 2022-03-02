<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?php echo isset($page_title) ? strip_tags($page_title) : "Bokk Yakaar"; ?></title>
        <!-- plugins:css -->
            <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
            <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Plugin css for this page -->
            <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
            <link rel="stylesheet" href="../assets/vendors/jvectormap/jquery-jvectormap.css">
        <!-- End plugin css for this page -->
        <!-- Layout styles -->
            <link rel="stylesheet" href="../assets/css/demo/style.css">
        <!-- End layout styles -->
           <link rel="shortcut icon" href="../assets/images/favicon.png" />
         <!-- Personnalisation style --> 
           <link href="<?php echo $home_url . "assets/css/personnalisation.css" ?>" rel="stylesheet" />
    </head>
    <body>
        <script src="../assets/js/preloader.js"></script>

        <?php
            // inclure la barre de navigation supérieure
            include_once "navigation.php";
        ?>


