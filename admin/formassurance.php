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
              <div class="form-group col-md-6">
                  <label for="recipient-name" class="col-form-label">Identifiant Membre:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"
                          aria-hidden="true"></i>
                    </div>
                    <input type="text" class="form-control" id="prenom" name="prenom" required="required">
                  </div>
              </div>
              <div class="form-group col-md-6">
                  <label for="recipient-name" class="col-form-label">Nom:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"
                          aria-hidden="true"></i>
                    </div>
                    <input type="text" class="form-control" id="nom" name="nom" required="required">
                  </div>
              </div>
            </div> 
            <div class="row">
              <div class="form-group col-md-4">
                  <label for="message-text" class="col-form-label">N° Téléphone:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"
                          aria-hidden="true"></i></span>
                    </div>
                    <input type="phone" class="form-control" id="tel" name="tel" required="required" maxLength="10"
                      minLength="10">
                  </div>
              </div>
              <div class="form-group col-md-8">
                  <label for="message-text" class="col-form-label">Email:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope-o"
                          aria-hidden="true"></i></span>
                    </div>
                    <input type="email" class="form-control" id="email" name="email" required="required">
                  </div>
              </div>
            </div> 
            <div class="row">
              <div class="form-group col-md-6">
                  <label for="recipient-name" class="col-form-label">N° Permis:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">
                      <i class="fa-regular fa fa-id-card"></i>
                    </div>
                    <input type="text" class="form-control" id="numpermis" name="numpermis" required="required">
                  </div>
              </div>
              <div class="form-group col-md-6">
                  <label for="recipient-name" class="col-form-label">N° Identification Nationale:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">
                      <i class="fa-solid fa fa-id-card"></i>
                    </div>
                    <input type="text" class="form-control" id="cin" name="cin" required="required">
                  </div>
              </div>
            </div> 
            <div class="row">
              <div class="form-group col-md-8">
                  <label for="recipient-name" class="col-form-label">Adresse:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">
                      <i class="fa-regular fa fa-id-card"></i>
                    </div>
                    <input type="text" class="form-control" id="adresse" name="adresse" required="required">
                  </div>
              </div>
              <div class="form-group col-md-4">
                  <label for="message-text" class="col-form-label">Photo:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01">
                        <i class="fa fa-picture-o" aria-hidden="true"></i></span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="photo" id="userphoto">
                      <label class="custom-file-label" for="userphoto">téléverser</label>
                    </div>
                  </div>
              </div>
            </div> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-success" id="addButton">Envoyer</button>
          <input type="hidden" name="action" value="addassurance">
          <input type="hidden" name="id_assurance" id="id_assurance" value="">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- add/edit form modal end -->
