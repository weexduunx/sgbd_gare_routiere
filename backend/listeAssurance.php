<?php
        // Configuration de base
    include_once "configuration/config.php";
    
    // Vérifier si connecté en tant qu'administrateur
    include_once "includes/verifconnex.php";
    
    // Définir le titre de la page
    $page_title = "Liste des Assurés";

    //inclure l'entête
    include "includes/entête.php";
    //inclure la table de données
    include "page/assurance.php";    
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
        <!-- JS, Popper.js, and jQuery -->
            
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

            <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
           
        <!-- JS, Popper.js, and jQuery -->

            <script type="text/javascript">
                $(document).ready(function () {
                    $('table').DataTable();
                });
            </script>
            
    </body>
</html>
