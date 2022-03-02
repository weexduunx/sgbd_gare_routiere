<!--Debut Table -->
<div class="mdc-layout-grid">
    <div class="mdc-layout-grid__inner">
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
            <div class="mdc-card p-0">
                <h6 class="card-title card-padding pb-0">Liste des Utilisateurs</h6>
                <!-- Script PHP pour lire et afficher tous les utilisateurs -->
                    <?php
                        /** Script PHP pour lire et afficher tous les utilisateurs */
                            // Lire tous les utilisateurs de la base de données
                            $stmt = $utilisateur->lireTout($from_record_num, $records_per_page);
                            // Compter les utilisateurs récupérés
                            $num = $stmt->rowCount();
                            // Identifier la page pour la pagination
                            $page_url="listeUtilisateur.php?";
                            // Inclure le tableau de la liste  HTML Modèle
                            include_once "tableau.php";
                        /** Script PHP pour lire et afficher tous les utilisateurs */
                    ?>
                <!-- Script PHP pour lire et afficher tous les utilisateurs -->
            </div>
        </div>
    </div>
</div>
<!--Fin Table -->