<?php
	include_once('connection.php');

	$database = new Connection();
	$db = $database->open();

	try{	
	    $sql = 'SELECT
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
                ORDER BY id_assurance';
	    foreach ($db->query($sql) as $row) {
	    	?>
	    	<tr>
				<td><?php echo $row['id_utilisateur']; ?></td>
	    		<td><?php echo $row['prenom']; ?></td>
	    		<td><?php echo $row['nom']; ?></td>
	    		<td><?php echo $row['matricule']; ?></td>
	    		<td><?php echo $row['categorie']; ?></td>
	    		<td><?php echo $row['marque']; ?></td>
	    		<td><?php echo $row['type_assurance']; ?></td>
				<td><?php echo $row['montant_assurance']; ?></td>
	    		<td><?php echo $row['debut_assurance']; ?></td>
	    		<td><?php echo $row['fin_assurance']; ?></td>
				<td><?php echo $row['duree_assurance']; ?></td>
	    		<td>
	    			<button class="btn btn-warning mr-3 edit" data-id="<?php echo $row['id_assurance']; ?>">
						<i class="fa fa-pencil-square-o fa-lg"></i>
					</button>
	    			<button class="btn btn-danger mr-3 delete" data-id="<?php echo $row['id_assurance']; ?>">
					<i class="fa fa-trash-o fa-lg"></i>
					</button>
	    		</td>
	    	</tr>
	    	<?php 
	    }
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	//close connection
	$database->close();
	
?>