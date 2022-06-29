<?php
require_once('comCrud/model.php');

$db = new Database();
// Création des Commandes
if (isset($_POST['action']) && $_POST['action'] == 'create') {
    extract($_POST);
    $retourne = (int)$percu - (int)$montant;
    $db->create((int)$utilisateur, (int)$produit, (int)$montant, (int)$percu, (int)$retourne, $etat);
    echo 'parfait';
}

// Recupérer les commandes
if (isset($_POST['action']) && $_POST['action'] == 'fetch') {
    $output = '';
    if ($db->countCommande() > 0) {
        $commandes = $db->read();
        $output .= '
        <table class="table table-hoverable" id="comTab">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Membre bénéficiaire</th>
                    <th>Produit</th>
                    <th>Prix du Produit</th>
                    <th>Montant Reçu</th>
                    <th>A Remboursé</th>
                    <th>Etat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
        ';
        foreach ($commandes as $commande) {
            $output .= "
            <tr>
                <td>$commande->id_com</td>
                <td>$commande->prenom  $commande->nom</td>
                <td>$commande->libelle</td>
                <td>$commande->montant</td>
                <td>$commande->percu</td>
                <td>$commande->retourne</td>
                <td>$commande->etat</td>
                <td>
                <a href='#' class='btn btn-info mr-3 infoBtn' title='Voir détails'>
                    <i class='fa fa-info-circle fa-lg' aria-hidden='true'></i>
                </a>
                <a href='#' class='btn btn-warning mr-3 editBtn' title='Modifier'>
                    <i class='fa fa-edit fa-lg' aria-hidden='true'></i>
                </a>
                <a href='#' class='btn btn-danger mr-3 deleteBtn' title='Supprimer'>
                    <i class='fa fa-trash fa-lg' aria-hidden='true'></i>
                </a>
                </td>
            </tr>            
            ";
        }
        $output .= "</tbody></table>";
        echo $output;
    } else {
        echo "<h3> Aucune commande pour le moment !</h3>";
    }
}
