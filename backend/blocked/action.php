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
                    <th>Action</th>
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
                    <a href="#" title="Voir les détails" class="text-success infoBtn"
                    id="'.$row["id_assurance"].'">
                      <i class="fa fa-info-circle fa-lg" aria-hidden="true"></i>
                    </a>&nbsp;&nbsp;

                    <a href="#" title="Editer" class="text-primary editBtn"
                    data-toggle="modal" data-target="#editModal" id="'.$row["id_assurance"].'">
                      <i class="fa fa-edit fa-lg" aria-hidden="true"></i>
                    </a>&nbsp;&nbsp;

                    <a href="#" title="Supprimer" class="text-danger delBtn" id="'.$row["id_assurance"].'">
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

    if(isset($_POST['action']) && $_POST['action'] == 'addAssurance'){
        $membre = $_POST['membre'];
        $categorie = $_POST['categorie'];
        $matricule = $_POST['matricule'];
        $marque = $_POST['marque'];
        $typeassurance = $_POST['assurancetype'];
        $montant = $_POST['montant'];
        $datedebut = $_POST['datedebut'];
        $datefin = $_POST['datefin'];

        $db->insertion(
            $membre, 
            $categorie, 
            $matricule, 
            $marque, 
            $typeassurance, 
            $montant, 
            $datedebut, 
            $datefin
        );
    }

    if(isset($_POST['edit_id'])){
        $id = $_POST['edit_id'];
        $output ="";

        $row = $db->lectureParId($id);
        if (json_encode($row)){
            $output .= '
            
            <div class="modal-body">
                <div class="form-group">
                    <label for="nom">Marque</label>
                    <input type="text" class="form-control" id="marque" value="'.$row["marque"].'" >
                </div>
                <div class="form-group">
                    <label for="matricule">Matricule</label>
                    <input type="text" class="form-control" id="matricule" value="'.$row["matricule"].'">
                </div>
                <div class="form-group">
                    <label for="categorie">Catégorie</label>
                    <input type="text" class="form-control" id="categorie" value="'.$row["categorie"].'">
                </div>
                <div class="form-group">
                    <label for="assurancetype">Type Assurance</label>
                    <input type="text" class="form-control" id="assurancetype" value="'.$row["type_assurance"].'">
                </div>
                <div class="form-group">
                    <label for="montant">Montant Assurance</label>
                    <input type="text" class="form-control" id="montant" value="'.$row["montant_assurance"].'">
                </div>
                <div class="form-group">
                    <label for="datedebut">Date Debut</label>
                    <input type="date" class="form-control" id="datedebut" value="'.$row["debut_assurance"].'">
                </div>
                <div class="form-group">
                    <label for="datefin">Date Fin</label>
                    <input type="date" class="form-control" id="datefin" value="'.$row["fin_assurance"].'">
                </div>

            </div>';
            echo $output;

        };

    }
    

    if(isset($_POST['action']) && $_POST['action'] == "modifier"){
        $id = $_POST['id_assurance'];
        $categorie = $_POST['categorie'];
        $matricule = $_POST['matricule'];
        $marque = $_POST['marque'];
        $typeassurance = $_POST['assurancetype'];
        $montant = $_POST['montant'];
        $datedebut = $_POST['datedebut'];
        $datefin = $_POST['datefin'];

        $db->modification(
            $id,
            $categorie, 
            $matricule, 
            $marque, 
            $typeassurance, 
            $montant, 
            $datedebut, 
            $datefin
        );
    }




?>