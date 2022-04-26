<form id="addform" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="form-group col-md-8">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"
                          aria-hidden="true"></i>
                    </div>
                    <select id="selMembre">
                        <option value="0" selected="selected">Selectioner un membre</option>
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
                    <label for="recipient-name" class="col-form-label"></label>
                  </div>
              </div>
            </div> 
            <div class="row">
              <div class="form-group col-md-4">
                  <label for="message-text" class="col-form-label">Matricule:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"
                          aria-hidden="true"></i></span>
                    </div>
                    <input type="phone" class="form-control" id="matricule" name="matricule" required="required" maxLength="10"
                      minLength="10">
                  </div>
              </div>
              <div class="form-group col-md-8">
                  <label for="message-text" class="col-form-label">Catégorie:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope-o"
                          aria-hidden="true"></i></span>
                    </div>
                    <input type="email" class="form-control" id="categorie" name="categorie" required="required">
                  </div>
              </div>
            </div> 
            <div class="row">
              <div class="form-group col-md-6">
                  <label for="recipient-name" class="col-form-label">Marque Voiture:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">
                      <i class="fa-regular fa fa-id-card"></i>
                    </div>
                    <input type="text" class="form-control" id="marque" name="marque" required="required">
                  </div>
              </div>
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
            </div> 
            <div class="row">
              <div class="form-group col-md-12">
                  <label for="recipient-name" class="col-form-label">Date Début:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">
                      <i class="fa-regular fa fa-id-card"></i>
                    </div>
                    <input type="date" class="form-control" id="datedebut" name="datedebut" required="required">
                  </div>
              </div>
              <div class="form-group col-md-12">
                  <label for="recipient-name" class="col-form-label">Date fin:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">
                      <i class="fa-regular fa fa-id-card"></i>
                    </div>
                    <input type="date" class="form-control" id="datefin" name="datefin" required="required">
                  </div>
              </div>
            </div> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-success" id="addButton">Envoyer</button>
          
        </div>
      </form>