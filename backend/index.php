<?php
    // Configuration de base
    include_once "configuration/config.php";
    // Vérifier si connecté en tant qu'administrateur
    include_once "includes/verifconnex.php";
    // Définir le titre de la page
    $page_title="Tableau de bord";
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
         
        <title><?php echo isset($page_title) ? strip_tags($page_title) : "Bokk Yakaar"; ?></title>

            <link rel="stylesheet" href="css/fcfa-icon.css">
            <link href="css/style.css" rel="stylesheet" >
            <!-- CoreUI for Bootstrap CSS -->
            <link href="assets/coreui/css/coreui.min.css" rel="stylesheet" >
            <!-- CSS only -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
            integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
            <!-- plugins:css -->
            <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
            <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.css.map">
            <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Plugin css for this page -->
            <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
            <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
        <!-- End plugin css for this page -->
        <!-- Layout styles -->
            <link rel="stylesheet" href="assets/css/demo/style.css">
        <!-- End layout styles -->
           <link rel="shortcut icon" href="assets/images/favicon.png" />
         <!-- Personnalisation style --> 
    </head>
    <body >
        <script src="assets/js/preloader.js"></script>

        <?php
            // inclure la barre de navigation supérieure
            include_once "includes/navigation.php";
        ?>

        <?php
            //inclure le contenu du Tableau de Bord
            include "page/contenuTB.php";
        ?>
    </main>
<!--Fin principal conteneur -->                
<!-- Debut Pied de Page -->
     <footer class="bg-white">
        <div class="mdc-layout-grid ">
            <div class="mdc-layout-grid__inner">
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                    <span class="text-center text-sm-left d-block d-sm-inline-block tx-14">
                        Copyright © <a href="" target="_blank"></a><?php echo date("Y"); ?> 
                        NGTS - DEPARTEMENT INFORMATIQUE - Développer par 
                        <a href="mailto:indiouck04@yahoo.fr" style="color:green;">Idrissa Ndiouck</a>
                    </span>
                </div>
            </div>
        </div>
    </footer>
<!-- Fin Pied de Page -->
</div>
<!--Fin Emballage secondaire -->
    </div>
        <!--Fin Emballage Principal -->
            </div>

        <!-- JS, Popper.js, and jQuery -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <!-- JS, Popper.js, and jQuery -->

        <!-- tableau de bord js -->
           

        <!-- tableau de bord js -->

        <!-- plugins:js -->
            <script src="assets/coreui/js/coreui.bundle.min.js"></script>
               
        <!-- plugins:js -->
            <script src="assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
            <script src="assets/vendors/chartjs/Chart.min.js"></script>
            <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
            <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- End plugin js for this page-->
        <!-- inject:js -->
            <script src="assets/js/material.js"></script>
            <script src="assets/js/misc.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
            <script src="assets/js/dashboard.js"></script>
        <!-- End custom js for this page-->
    </body>
</html>
