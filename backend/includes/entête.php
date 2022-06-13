<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
         
        <title><?php echo isset($page_title) ? strip_tags($page_title) : "Bokk Yakaar"; ?></title>
            <!-- Personnalisation style --> 

                <!-- CSS CFA -->
                    <link href="css/style.css" rel="stylesheet" >
                    <link rel="stylesheet" href="css/fcfa-icon.css">
                <!-- CSS CFA -->

                <!-- CSS Bootstrapcdn only -->
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" 
                    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
                <!-- CSS Bootstrapcdn only -->

                <!-- Fontawesome -->
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
                    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
                <!-- Fontawesome -->
                
                <!-- DataTables -->
                    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
                <!-- DataTables -->

                <!-- SweetAlert -->
                    <link href="node_modules/sweetalert2/dist/sweetalert2.css" rel="stylesheet" >
                <!-- SweetAlert -->


                <!-- plugins:css -->
                    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
                    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.css.map">
                    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
                <!-- plugins:css -->

                <!-- Plugin css for this page -->
                    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
                    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
                <!-- End plugin css for this page -->

                <!-- Layout styles -->
                    <link rel="stylesheet" href="assets/css/demo/style.css">
                    <link rel="shortcut icon" href="assets/images/favicon.png" />
                <!-- layout styles -->
            <!-- Personnalisation style --> 
    </head>
    <body >
        <script src="assets/js/preloader.js"></script>

        <?php
            // inclure la barre de navigation supérieure
            include_once "navigation.php";
        ?>


