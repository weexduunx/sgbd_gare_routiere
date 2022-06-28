<?php
	include_once('connection.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();
	try{
		$id = $_POST['id'];
		$matricule = $_POST['matricule'];
		$categorie = $_POST['categorie'];
		$marque = $_POST['marque'];
		$type = $_POST['type'];
		$montant = $_POST['montant'];
		$debut = $_POST['debut'];
		$fin = $_POST['fin'];

		$sql = "UPDATE `assurance` SET 
		`id_assurance`='$id',
		`matricule`='$matricule',
		`categorie`='$categorie',
		`marque`='$marque',
		`type_assurance`='$type',
		`montant_assurance`='$montant',
		`debut_assurance`='$debut',
		`fin_assurance`='$fin' WHERE `id_assurance`='$id' ";
		//if-else statement in executing our query
		if($db->exec($sql)){
			$output['message'] = 'Assurance modifiée avec succés';
		} 
		else{
			$output['error'] = true;
			$output['message'] = 'Something went wrong. Cannot update member';
		}

	}
	catch(PDOException $e){
		$output['error'] = true;
		$output['message'] = $e->getMessage();
	}

	//close connection
	$database->close();

	echo json_encode($output);
	
?>