<!-- Modal -->

<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      	<div class="modal-header">
			<h5 class="modal-title" id="createModalLabel">Nouvelle Commande</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
      	</div>
      	<div class="modal-body">
            <form id="formOrder" method="post" action="">
				<div class="row">
					<div class="form-group col-md-6">
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">
							  N° Com.
							</span>
						  </div>
						  	<?php						  

								function genererChaineAleatoire ($longueur, $listeCar = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
								{
									$chaine = '';
									$max = mb_strlen($listeCar, '8bit') - 1;
									for ($i = 0; $i < $longueur; ++$i) {
									$chaine .= $listeCar[random_int(0, $max)];
									}
									return $chaine;
								}
								$chaine = genererChaineAleatoire(3);
								$ref = 'COM'.'-'.date('Ym', time()).'-'.$chaine;
					  		?>
						  <input type="text" placeholder="<?php echo $ref; ?>"  value="<?php echo  $ref; ?>" id="numcom" name="numcom">
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text" for="inputGroupSelect01">
									<i class="fa fa-user"></i>
								</label>
							</div>
							<select class="custom-select" name="utilisateur" id="utilisateur">
								<option value="0" selected>Selectioner le membre</option>
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
				<div class="form-group col-md-12">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text" for="inputGroupSelect01">
									<i class="fa fa-product-hunt"></i>
								</label>
							</div>
							<select class="custom-select" name="produit" id="produit">
								<option value="0" selected>Selectioner le produit</option>
								<?php
									require_once 'page/config.php';
								
									$stmt = $dbcon->prepare('SELECT * FROM produit');
									$stmt->execute();
									
									while($row=$stmt->fetch(PDO::FETCH_ASSOC))
									{
										extract($row);
										?>
										<option value="<?php echo $id; ?>"><?php echo $libelle; ?> <?php //echo $nom; ?> </option>
										<?php
									}
								?>
							</select>
						</div>
					</div>
					<div class="form-group col-md-6">
						<label for="percu" class="col-form-label">Prix du produit</label>
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">
							  <!-- <i class="fa fa-drivers-license-o" aria-hidden="true"></i> -->
							  <img src="css/license-plate.png" width="25" alt="" srcset="">
							</span>
						  </div>
						  <input type="text" class="form-control" id="montant" name="montant" required>
						</div>
					</div>
					<div class="form-group col-md-6">
						<label for="percu" class="col-form-label">Montant Reçu:</label>
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">
							  <!-- <i class="fa fa-drivers-license-o" aria-hidden="true"></i> -->
							  <img src="css/license-plate.png" width="25" alt="" srcset="">
							</span>
						  </div>
						  <input type="text" class="form-control" id="percu" name="percu" required>
						</div>
					</div>
					<!-- <div class="form-group col-md-3">
						<label for="retourne" class="col-form-label">Montant Remboursé:</label>
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">
							<i class="fa-regular fa fa-car"></i>
						  </div>
						  <input type="text" class="form-control"  id="retourne" name="retourne" required>
						</div>
					</div> -->
				</div> 
				<div class="row">
					<div class="form-group col-md-6">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<label class="input-group-text" for="inputGroupSelect01">
										<i class="fa fa-product-hunt">Etat</i>
									</label>
								</div>
								<select class="custom-select" name="etat" id="etat">
									<option value="0" selected>Etat</option>
									<option value="Facturée">Facturée</option>
									<option value="Payée" >Payée</option>
									<option value="Annulée">Annulée</option>
								</select>
							</div>
						</div>
					</div>
				</div> 
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
					<button type="button" class="btn btn-primary" id="create" name="create">Ajouter <i class="fa fa-plus-circle"></i> </button>
				</div>
			</form>
      	</div>
    </div>
  </div>
</div>