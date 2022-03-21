<?php
// objet 'utilisateur'
class Assurance{

    // Nom de la connexion et de la table utilisateurs 
    private $conn;
    private $table_name = "assurance";
 
    // Propriétés d'objet
    public $id_assurance;
    public $id_utilisateur;
    public $type_assurance;
    public $montant_assurance;
    public $debut_assurance;
    public $fin_assurance;


    // constructeur
    public function __construct($db){
        $this->conn = $db;

    }

    // Créer un nouvel enregistrement d'assurance
        function creer(){
        
            // Obtenir un timbre de temps pour le champ «créé»
            $this->debut_assurance=date('Y-m-d H:i:s');
            $this->fin_assurance=date('Y-m-d H:i:s');
        
            // insérer la requête
            $query = "INSERT INTO" . $this->table_name . "
                        SET
                        type_assurance = :type_assurance,
                        montant_assurance = :montant_assurance,
                        debut_assurance = :debut_assurance,
                        fin_assurance = :fin_assurance";
                        
            // préparer la requête
            $stmt = $this->conn->prepare($query);
        
            // sanitize
            $this->type_assurance=htmlspecialchars(strip_tags($this->type_assurance));
            $this->montant_assurance=htmlspecialchars(strip_tags($this->montant_assurance));
            $this->debut_assurance=htmlspecialchars(strip_tags($this->debut_assurance));
            $this->fin_assurance=htmlspecialchars(strip_tags($this->fin_assurance));
        
            // Lier les valeurs
            $stmt->bindParam(':type_assurance', $this->type_assurance);
            $stmt->bindParam(':montant_assurance', $this->montant_assurance);
            $stmt->bindParam(':debut_assurance', $this->debut_assurance);
            $stmt->bindParam(':fin_assurance', $this->fin_assurance);
        
            // exécuter la requête, vérifiez également si la requête a réussi
            if($stmt->execute()){
                return true;
            }else{
                $this->showError($stmt);
                return false;
            }
        
        }

        public function showError($stmt){
            echo "<pre>";
                print_r($stmt->errorInfo());
            echo "</pre>";
        }

            // Lire tous les enregistrements des assurances
        function lireTout($from_record_num, $records_per_page){
        
            // Requête pour lire tous les enregistrements d'assurance, avec la clause limite de pagination
            $query ="SELECT
                        id_assurance,
                        id_utilisateur,
                        type_assurance,
                        montant_assurance,
                        debut_assurance,
                        fin_assurance
                    FROM " . $this->table_name . "
                        ORDER BY id_assurance DESC
                        LIMIT ?, ?";
        
            // Préparer la déclaration de requête
            $stmt = $this->conn->prepare( $query );
        
            // Variables de clause limite de liaison
            $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
            $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
        
            // exécuter l'ordre
            $stmt->execute();
        
            // Valeurs de retour
            return $stmt;
        }

        // utilisé pour les assurances dans la pagination
        public function compter(){
        
            // Requête pour sélectionner tous les enregistrements d'utilisateur
            $query = "SELECT id_assurance FROM " . $this->table_name . "";
        
            // Préparer la déclaration de requête
            $stmt = $this->conn->prepare($query);
        
            // exécuter l'ordre
            $stmt->execute();
        
            // Obtenir le nombre de lignes
            $num = $stmt->rowCount();
        
            // retourne le nombre de ligne
            return $num;
        }
}