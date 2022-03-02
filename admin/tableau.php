<?php
    // Afficher la table si le nombre d'utilisateurs récupérés était supérieur à zéro
    if($num>0){
    
        echo "<div class='table-responsive'>";
            echo "<table class='table table-hoverable'>";
                // en-têtes de table
                echo "<thead>";
                    echo "<th>Prénom</th>";
                    echo "<th>Nom</th>";
                    echo "<th>Email</th>";
                    echo "<th>N° téléphone</th>";
                    echo "<th>Niveau d'accès</th>";
                echo "</thead>";
                // boucle à travers les enregistrements d'utilisateurs
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    // Afficher les détails de l'utilisateur
                    echo "<tbody>";
                        echo "<tr>";
                            echo "<td>{$prenom}</td>";
                            echo "<td>{$nom}</td>";
                            echo "<td>{$email}</td>";
                            echo "<td>{$tel}</td>";
                            echo "<td>{$niveau_dacces}</td>";
                        echo "</tr>";
                    echo "</tbody>";
                    }
        
            echo "</table>";
        echo "</div>";
    
        $page_url="listeUtilisateur.php?";
        $total_rows = $utilisateur->compter();
    
        // boutons de pagination réels
        include_once 'pagination.php';
    }
    
    // Dites à l'utilisateur qu'il n'y a pas de selfies
    else{
        echo "<div class='alert alert-danger'>
                <strong>Aucun utilisateur trouvé.</strong>
            </div>";
    }
?>