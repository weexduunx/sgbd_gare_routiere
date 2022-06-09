
<!-- Formulaire Ajout-->
<div class="modal fade" id="addAssuranceModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          &times;
        </button>
      </div>
        <div class="modal-body">
        <form id="ajoutAssurance" action="" method="post">

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
                    <input type="text" class="form-control" id="categorie" name="categorie" required="required">
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
                    <input type="text" class="form-control" id="matricule" name="matricule" required="required">
                  </div>
              </div>
              <div class="form-group col-md-4">
                  <label for="recipient-name" class="col-form-label">Marque Voiture:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">
                      <i class="fa-regular fa fa-car"></i>
                    </div>
                    <input type="text" class="form-control" id="marque" name="marque" required="required">
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
                    <input type="text" class="form-control" id="assurancetype" name="assurancetype" required="required">
                  </div>
              </div>
              <div class="form-group col-md-6">
                  <label for="recipient-name" class="col-form-label">Montant Assurance:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">
                      <i class="fa fa-money"></i>
                    </div>
                    <input type="text" class="form-control" id="montant" name="montant" required="required">
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
                    <input type="date" class="form-control" id="datedebut" name="datedebut" required="required">
                  </div>
              </div>
              <div class="form-group col-md-6">
                  <label for="recipient-name" class="col-form-label">Date fin:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">
                      <i class="fa-regular fa fa-calendar"></i>
                    </div>
                    <input type="date" class="form-control" id="datefin" name="datefin" required="required">
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
          <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Annuler</button>
          <button type="submit" class="btn btn-success" name="addAssurance" id="addAssurance"><span class="glyphicon glyphicon-floppy-disk"></span>Ajouter</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Formulaire Ajout -->

<!-- Formulaire Editer -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editer l'assurance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editForm">
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="form-group col-md-12">
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">
                      <i class="fa fa-user-o" aria-hidden="true"></i>
                    </label>
                    <select id="selMembre" name="id_utilisateur" class="form-select " aria-label=".form-select">
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
                    <input type="text" class="form-control" id="categorie" name="categorie" required="required">
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
                    <input type="text" class="form-control" id="matricule" name="matricule" required="required">
                  </div>
              </div>
              <div class="form-group col-md-4">
                  <label for="recipient-name" class="col-form-label">Marque Voiture:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">
                      <i class="fa-regular fa fa-car"></i>
                    </div>
                    <input type="text" class="form-control" id="marque" name="marque" required="required">
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
                    <input type="text" class="form-control" id="assurancetype" name="assurancetype" required="required">
                  </div>
              </div>
              <div class="form-group col-md-6">
                  <label for="recipient-name" class="col-form-label">Montant Assurance:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">
                      <i class="fa fa-money"></i>
                    </div>
                    <input type="text" class="form-control" id="montant" name="montant" required="required">
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
                    <input type="date" class="form-control" id="datedebut" name="datedebut" required="required">
                  </div>
              </div>
              <div class="form-group col-md-6">
                  <label for="recipient-name" class="col-form-label">Date fin:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">
                      <i class="fa-regular fa fa-calendar"></i>
                    </div>
                    <input type="date" class="form-control" id="datefin" name="datefin" required="required">
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
          <input type="hidden" class="id_assurance" name="id_assurance">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Formulaire Editer -->

<!-- Suppression-->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Supprimer une assurance</h4>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Etes-vous sûr de vouloir supprimer cet élément</p>
				<h2 class="text-center fullname"></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
                <button type="submit" class="btn btn-danger id"><span class="glyphicon glyphicon-trash"></span> Oui</button>

            </div>

        </div>
    </div>
</div>

