<?php
	include_once('connection.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();
	try{
		//make use of prepared statement to prevent sql injection
		$stmt = $db->prepare(
			"INSERT INTO 
			assurance (
					id_utilisateur,
					matricule,
					categorie,
					marque,
					type_assurance,
					montant_assurance,
					debut_assurance,
					fin_assurance) 
					VALUES (
					:id_utilisateur, 
					:matricule, 
					:categorie,
					:marque,
					:type_assurance,
					:montant_assurance,
					:debut_assurance,
					:fin_assurance)"
									);
		//if-else statement in executing our prepared statement
		if ($stmt->execute(array(
			':id_utilisateur' => $_POST['membre'] , 
			':matricule' => $_POST['matricule'] , 
			':categorie' => $_POST['categorie'],
			':marque' => $_POST['marque'],
			':type_assurance' => $_POST['type'],
			':montant_assurance' => $_POST['montant'],
			':debut_assurance' => $_POST['debut'],
			':fin_assurance' => $_POST['fin'],
		
			)) ){
			$output['message'] = 'Assurance ajoutée avec succés';
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Quelque chose s\'est mal passé. Impossible d\'ajouter une assurance';
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