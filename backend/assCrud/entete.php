<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
         
        <title><?php echo isset($page_title) ? strip_tags($page_title) : "Bokk Yakaar"; ?></title>

        <!-- Layout styles -->
            <link rel="stylesheet" href="assets/css/demo/style.css">
            <link rel="shortcut icon" href="assets/images/favicon.png" />
        <!-- End layout styles -->
        
        <!-- Bootstrap & FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
            <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!-- Bootstrap & FontAwesome -->

        <!-- DataTables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css">
        <!-- DataTables -->

        <!-- plugins:css -->
            <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
            <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
        <!-- plugins:css -->

        <!-- Plugin css for this page -->
            <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
            <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
        <!-- End plugin css for this page -->


           
         <!-- Personnalisation style --> 
            <link rel="stylesheet" href="css/fcfa-icon.css">
            <link href="css/style.css" rel="stylesheet" >
            <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
            <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
        <!-- Personnalisation style --> 
    </head>
    <body >
        <script src="assets/js/preloader.js"></script>

        <?php
            // inclure la barre de navigation supérieure
            include_once "navigation.php";
        ?>


