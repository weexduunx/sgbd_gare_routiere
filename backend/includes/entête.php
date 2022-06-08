<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
         
        <title><?php echo isset($page_title) ? strip_tags($page_title) : "Bokk Yakaar"; ?></title>

            <link rel="stylesheet" href="../css/fcfa-icon.css">
            <link href="../css/style.css" rel="stylesheet" >
            <!-- CoreUI for Bootstrap CSS -->
            <link href="../assets/coreui/css/coreui.min.css" rel="stylesheet" >
            <!-- CSS only -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
            integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
            <!-- plugins:css -->
            <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
            <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.css.map">
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
    </head>
    <body >
        <script src="../assets/js/preloader.js"></script>

        <?php
            // inclure la barre de navigation supérieure
            include_once "navigation.php";
        ?>


