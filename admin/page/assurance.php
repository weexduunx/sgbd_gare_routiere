<div class="alert alert-success alert-dismissible text-center message fade show " role="alert">
    <button type='button' class='btn-close' data-coreui-dismiss='alert' aria-label='Close'></button>
</div>
<!--Debut Table -->
<div class="mdc-layout-grid">
    <div class="mdc-layout-grid__inner">
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
            <div class="mdc-card ">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mb-0">Liste des Assurés</h4>
                <div>
                    <div>
                        <button type="button" class="mdc-button " data-toggle="modal" data-target="#userModal" id="addnewbtn">
                            Ajouter 
                            <i class="fa fa-plus-circle " aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
                
                    <?php
                        include_once 'form.php';
                        include_once 'profile.php';
                    ?>
                        
                    <?php
                        include_once 'tableassurance.php';
                    ?>
                        <nav id="pagination"></nav>
                        <input type="hidden" name="currentpage" id="currentpage" value="1">
                    <!-- Script PHP pour lire et afficher tous les utilisateurs -->
                        <?php
                            /** Script PHP pour lire et afficher tous les utilisateurs */
                                // Lire tous les utilisateurs de la base de données
                                //$stmt = $utilisateur->lireTout($from_record_num, $records_per_page);
                                // Compter les utilisateurs récupérés
                                //$num = $stmt->rowCount();
                                // Identifier la page pour la pagination
                                //$page_url="listeUtilisateur.php?";
                                // Inclure le tableau de la liste  HTML Modèle
                                //include_once "tableau.php";
                            /** Script PHP pour lire et afficher tous les utilisateurs */
                        ?>
                    <!-- Script PHP pour lire et afficher tous les utilisateurs -->
            </div>
        </div>
    </div>
</div>
<!--Fin Table -->