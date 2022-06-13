<!-- Formulaire Ajouter / Modifier modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter / Modifier une assurance <i class="fa fa-user-circle-o"
            aria-hidden="true"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addform" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
        <div class="container-fluid">
              <div class="row">
                <div class="form-group col-md-12">
                    <div class="input-group mb-3">
                      <label class="input-group-text" for="inputGroupSelect01">
                        <i class="fa fa-user-o" aria-hidden="true"></i>
                      </label>
                      <select id="membre" name="membre" class="form-select " aria-label=".form-select">
                          <option value="0" selected="selected">Selectioner le membre à assurer</option>
                          <?php
                            require_once 'page/config.php';
                          
                            $stmt = $dbcon->prepare('SELECT * FROM utilisateurs');
                            $stmt->execute();
                            
                            while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                            {
                                extract($row);
                                ?>
                                  <option value="<?php echo $id; ?>"><?php echo $prenom; ?> <?php echo $nom; ?> </option>
                                <?php
                            }
                          ?>
                      </select>
                    </div>
                </div>
              </div> 
              <div class="row">
                <div class="form-group col-md-4">
                    <label for="message-text" class="col-form-label">Catégorie:</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                          <!-- <i class="fa fa-envelope-o" aria-hidden="true"></i> -->
                          <img src="css/categories.png" width="25" alt="" srcset="">
                        </span>
                      </div>
                      <input type="text" class="form-control" id="categorie" name="categorie" required>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="message-text" class="col-form-label">Matricule:</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                          <!-- <i class="fa fa-drivers-license-o" aria-hidden="true"></i> -->
                          <img src="css/license-plate.png" width="25" alt="" srcset="">
                        </span>
                      </div>
                      <input type="text" class="form-control" id="matricule" name="matricule" required>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="recipient-name" class="col-form-label">Marque Voiture:</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                        <i class="fa-regular fa fa-car"></i>
                      </div>
                      <input type="text" class="form-control" id="marque" name="marque" required>
                    </div>
                </div>
              </div> 
              <div class="row">
                <div class="form-group col-md-6">
                    <label for="recipient-name" class="col-form-label">Type Assurance:</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                        <i class="fa-solid fa fa-id-card"></i>
                      </div>
                      <input type="text" class="form-control" id="assurancetype" name="assurancetype" required>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="recipient-name" class="col-form-label">Montant Assurance:</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                        <i class="fa fa-money"></i>
                      </div>
                      <input type="text" class="form-control" id="montant" name="montant" required>
                    </div>
                </div>
              </div> 
              <div class="row">
                <div class="form-group col-md-6">
                    <label for="recipient-name" class="col-form-label">Date Début:</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                        <i class="fa-regular fa fa-calendar"></i>
                      </div>
                      <input type="date" class="form-control" id="datedebut" name="datedebut" required>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="recipient-name" class="col-form-label">Date fin:</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                        <i class="fa-regular fa fa-calendar"></i>
                      </div>
                      <input type="date" class="form-control" id="datefin" name="datefin" required>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="message-text" class="col-form-label">Photo Carte à grise:</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">
                          <i class="fa fa-picture-o" aria-hidden="true"></i></span>
                      </div>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="photo_assurance" id="photo_assurance">
                        <label class="custom-file-label" for="assurancephoto">téléverser</label>
                      </div>
                    </div>
                </div>
              </div> 
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-success" id="addButton">Envoyer</button>
          <input type="hidden" name="action" value="adduser">
          <input type="hidden" name="id" id="id" value="">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- add/edit form modal end -->
