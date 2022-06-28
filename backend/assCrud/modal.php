<!-- Add New -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ajouter</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
				</button>
			</div>
            <div class="modal-body">
			<div class="container-fluid">
			<form id="addForm">
				<div class="row">
					<div class="form-group col-md-12">
						<div class="input-group mb-3">
						  <label class="input-group-text" for="inputGroupSelect01">
							<i class="fa fa-user-o" aria-hidden="true"></i>
						  </label>
						  <select  name="membre" class="form-select " aria-label=".form-select">
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
						  <input type="text" class="form-control"  name="categorie" required>
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
						  <input type="text" class="form-control"  name="matricule" required>
						</div>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="col-form-label">Marque Voiture:</label>
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">
							<i class="fa-regular fa fa-car"></i>
						  </div>
						  <input type="text" class="form-control"  name="marque" required>
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
						  <input type="text" class="form-control"  name="type" required>
						</div>
					</div>
					<div class="form-group col-md-6">
						<label for="recipient-name" class="col-form-label">Montant Assurance:</label>
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">
							<i class="fa fa-money"></i>
						  </div>
						  <input type="text" class="form-control"  name="montant" required>
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
						  <input type="date" class="form-control"  name="debut" required>
						</div>
					</div>
					<div class="form-group col-md-6">
						<label for="recipient-name" class="col-form-label">Date fin:</label>
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">
							<i class="fa-regular fa fa-calendar"></i>
						  </div>
						  <input type="date" class="form-control"  name="fin" required>
						</div>
					</div>
				  </div> 				
            	</div> 
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal"> Annuler</button>
					<button type="submit" class="btn btn-success"><span class="fa fa-plus"></span>Ajouter</button>
				</div>
			</form>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Modifier</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
				</button>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form id="editForm">
				<input type="hidden" class="id" name="id">
				<div class="row">
					<div class="form-group col-md-12">
						<div class="input-group mb-3">
						<input type="text" class="form-control membre"  name="membre" disabled>
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
						  <input type="text" class="form-control categorie"  name="categorie" required>
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
						  <input type="text" class="form-control matricule"  name="matricule" required>
						</div>
					</div>
					<div class="form-group col-md-4">
						<label for="recipient-name" class="col-form-label">Marque Voiture:</label>
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">
							<i class="fa-regular fa fa-car"></i>
						  </div>
						  <input type="text" class="form-control marque"  name="marque" required>
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
						  <input type="text" class="form-control type"  name="type" required>
						</div>
					</div>
					<div class="form-group col-md-6">
						<label for="recipient-name" class="col-form-label">Montant Assurance:</label>
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">
							<i class="fa fa-money"></i>
						  </div>
						  <input type="text" class="form-control montant"  name="montant" required>
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
						  <input type="date" class="form-control debut"  name="debut" required>
						</div>
					</div>
					<div class="form-group col-md-6">
						<label for="recipient-name" class="col-form-label">Date fin:</label>
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">
							<i class="fa-regular fa fa-calendar"></i>
						  </div>
						  <input type="date" class="form-control fin"  name="fin" required>
						</div>
					</div>
				  </div> 
				</div> 
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
					<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Modifier</button>
				</div>
			</form>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Supprimer</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
				</button>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Etes-vous sûr de vouloir supprimer l'assurance</p>
				<h2 class="text-center fullname"></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="button" class="btn btn-danger id"><span class="glyphicon glyphicon-trash"></span> Yes</button>
            </div>

        </div>
    </div>
</div>