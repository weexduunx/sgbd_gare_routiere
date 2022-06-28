<?php
	include_once('connection.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();

	try{
		$id = $_POST['id'];
		$stmt = $db->prepare("SELECT
					id_assurance,
					id_utilisateur,
                    prenom,
                    nom,
                    matricule,
                    categorie,
                    marque,
                    type_assurance,
                    montant_assurance,
                    debut_assurance,
                    fin_assurance,
                DATEDIFF (`fin_assurance` , `debut_assurance` ) as duree_assurance
				FROM assurance
				INNER JOIN utilisateurs 
                ON assurance.id_utilisateur = utilisateurs.id
				WHERE
				id_assurance = :id_assurance");
		$stmt->bindParam(':id_assurance', $id);
		$stmt->execute();
		$output['data'] = $stmt->fetch();
	}
	catch(PDOException $e){
		$output['error'] = true;
		$output['message'] = $e->getMessage();
	}

	//close connection
	$database->close();

	echo json_encode($output);

?>