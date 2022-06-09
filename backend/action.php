<?php

    require_once 'includes/Database.php';

    $db = new Database();
    if(isset($_POST['action']) && $_POST['action'] == 'viewAssurance'){
        $output = '';
        $data = $db->lecture();
        if($db->total() > 0){
            $output .= '
            <table id="table" class="table table-striped table-sm table-bordered" >
                <thead>
                    <tr class="text-center">
                    <th>Photo</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Matricule</th>
                    <th>Catégorie</th>
                    <th>Marque</th>
                    <th>Type Assurance</th>
                    <th>Montant Assurance</th>
                    <th>Debut Assurance</th>
                    <th>Fin Assurance</th>
                    <th>Durée Assurance</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
            ';
            foreach($data as $row){ 
                $output .= '
                <tr class="text-center text-secondary">
                    <td><img src="" class="img-fluid" width="50" height="50" alt=""></td>
                    <td>'.$row["prenom"].'</td>
                    <td>'.$row["nom"].'</td>
                    <td>'.$row["matricule"].'</td>
                    <td>'.$row["categorie"].'</td>
                    <td>'.$row["marque"].'</td>
                    <td>'.$row["type_assurance"].'</td>
                    <td>'.$row["montant_assurance"].'</td>
                    <td>'.$row["debut_assurance"].'</td>
                    <td>'.$row["fin_assurance"].'</td>
                    <td>'.$row["duree_assurance"].'</td>
                    <td>
                    <a href="#" title="Voir les détails" class="text-success">
                      <i class="fa fa-info-circle fa-lg" aria-hidden="true"></i>
                    </a>&nbsp;&nbsp;
                    <a href="#" title="Editer" class="text-primary">
                      <i class="fa fa-edit fa-lg" aria-hidden="true"></i>
                    </a>&nbsp;&nbsp;
                    <a href="#" title="Supprimer" class="text-danger">
                      <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                    </a>&nbsp;&nbsp;
                  </td>
                </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        }
        else{
            echo '<p class="text-center text-secondary">Aucune donnée trouvée</p>';
        }

    }





?>