<!--Debut Contenu Tableau de bord -->
    <div class="mdc-layout-grid">
        <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
                    <div class="d-block d-sm-flex justify-content-between align-items-center">
                        <!--Script PHP pour afficher les alertes et autres infos -->
                            <?php
                                
                                echo'<h3 class="card-sub-title mb-2 mb-sm-0">';
                                // Obtenir des valeurs de paramètre et éviter l'avis d'index non défini
                                $action = isset($_GET['action']) ? $_GET['action'] : "";
                                                                    
                                // Si la connexion a réussi
                                if($action=='login_success'){
                                     echo "<div class='mdc-button mdc-button--outlined outlined-button--success mdc-ripple-upgraded'>";
                                        echo "<strong>salut " . $_SESSION['prenom'] . ", content de te revoir!</strong>";
                                    echo "</div>";
                                }
                                // Dites à l'utilisateur qu'il est déjà connecté
                                if($action=='already_logged_in'){
                                    echo "<div class='mdc-button text-button--info mdc-ripple-upgraded'>";
                                        echo "<strong>Vous</strong> êtes actuellement connecté.";
                                    echo "</div>";
                                }
                                                            
                                else if($action=='logged_in_as_admin'){
                                    echo "<div class='mdc-button text-button--info mdc-ripple-upgraded'>";
                                        echo "<strong>Vous</strong> vous êtes connectés en tant que Administrateur.";
                                    echo "</div>";
                                }
                                                            
                                echo "<div class='mdc-button text-button--info mdc-ripple-upgraded'>";
                                    echo "Le contenu de votre section administrative sera ici.";
                                echo "</div>";
                                echo'</h3>';
                            ?>
                        <!--Script PHP pour afficher les alertes et autres infos -->
                    </div>
                </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--success">
                    <div class="card-inner">
                        <h5 class="card-title">Emprunté</h5>
                        <h5 class="font-weight-light pb-2 mb-1 border-bottom"></h5>
                        <p class="tx-12 text-muted"></p>
                        <div class="card-icon-wrapper">
                            <i class="material-icons">dvr</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--danger">
                    <div class="card-inner">
                        <h5 class="card-title">Bénéfice annuel</h5>
                        <h5 class="font-weight-light pb-2 mb-1 border-bottom"></h5>
                        <p class="tx-12 text-muted"></p>
                        <div class="card-icon-wrapper">
                            <i class="material-icons">attach_money</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--primary">
                    <div class="card-inner">
                        <h5 class="card-title">Conversion de plomb</h5>
                        <h5 class="font-weight-light pb-2 mb-1 border-bottom"></h5>
                        <p class="tx-12 text-muted"></p>
                        <div class="card-icon-wrapper">
                            <i class="material-icons">trending_up</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--info">
                    <div class="card-inner">
                        <h5 class="card-title">Revenu moyen</h5>
                        <h5 class="font-weight-light pb-2 mb-1 border-bottom"></h5>
                        <p class="tx-12 text-muted"></p>
                        <div class="card-icon-wrapper">
                            <i class="material-icons">credit_card</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-0">Revenue by location</h4>
                        <div>
                            <i class="material-icons refresh-icon">refresh</i>
                            <i class="material-icons options-icon ml-2">more_vert</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-8">
                <div class="mdc-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-2 mb-sm-0">Revenue by location</h4>
                        <div class="d-flex justtify-content-between align-items-center">
                            <p class="d-none d-sm-block text-muted tx-12 mb-0 mr-2"></p>
                            <i class="material-icons options-icon">more_vert</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-8-tablet">
                <div class="mdc-card">
                    <div class="d-flex d-lg-block d-xl-flex justify-content-between">
                        <div>
                            <h4 class="card-title">Order Statistics</h4>
                            <h6 class="card-sub-title"></h6>
                        </div>
                        <div id="sales-legend" class="d-flex flex-wrap"></div>
                    </div>
                    <div class="chart-container mt-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--Fin Contenu Tableau de bord -->