<?php
// objet 'utilisateur'
class Utilisateur{

    // Nom de la connexion et de la table utilisateurs 
    private $conn;
    private $table_name = "utilisateurs";
 
    // Propriétés d'objet
    public $id;
    public $photo;
    public $prenom;
    public $nom;
    public $email;
    public $tel;
    public $adresse;
    public $password;
    public $niveau_dacces;
    public $access_code;
    public $status;
    public $created;
    public $modified;

    // constructeur
    public function __construct($db){
        $this->conn = $db;

    }

    // Vérifiez si le courrier électronique est donné dans la base de données
    function emailExists(){
    
        // requête pour vérifier si un email existe
        $query = "SELECT id, prenom, nom, tel, photo,  niveau_dacces, password, status
                FROM " . $this->table_name . "
                WHERE email = ?
                LIMIT 0,1";
    
        // préparer la requête
        $stmt = $this->conn->prepare( $query );
    
        // désinfecter
        $this->email=htmlspecialchars(strip_tags($this->email));
    
        // Lier la donnée à  une valeur électronique
        $stmt->bindParam(1, $this->email);
    
        // exécuter la requête
        $stmt->execute();
    
        // Obtenir le nombre de lignes
        $num = $stmt->rowCount();
    
        // Si le courrier électronique existe, attribuez des valeurs aux propriétés de l'objet pour un accès facile et une utilisation pour les sessions PHP
        if($num>0){
    
            // Obtenir des détails / valeurs record
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Attribuer des valeurs aux propriétés de l'objet
            $this->id = $row['id'];
            $this->prenom = $row['prenom'];
            $this->nom = $row['nom'];
            $this->tel = $row['tel'];
            $this->photo = $row['photo'];
            $this->niveau_dacces = $row['niveau_dacces'];
            $this->password = $row['password'];
            $this->status = $row['status'];
    
            // retourne true parce que le courrier électronique existe dans la base de données
            return true;
        }
    
        // renvoie false si l'e-mail n'existe pas dans la base de données
        return false;
    }

    // Créer un nouvel enregistrement d'utilisateur
        function creer(){
        
            // Obtenir un timbre de temps pour le champ «créé»
            $this->created=date('Y-m-d H:i:s');
        
            // insérer la requête
            $query = "INSERT INTO
                        " . $this->table_name . "
                    SET
                        prenom = :prenom,
                        nom = :nom,
                        email = :email,
                        tel = :tel,
                        adresse = :adresse,
                        password = :password,
                        niveau_dacces = :niveau_dacces,
                        status = :status,
                        created = :created";
        
            // préparer la requête
            $stmt = $this->conn->prepare($query);
        
            // sanitize
            $this->prenom=htmlspecialchars(strip_tags($this->prenom));
            $this->nom=htmlspecialchars(strip_tags($this->nom));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->tel=htmlspecialchars(strip_tags($this->tel));
            $this->adresse=htmlspecialchars(strip_tags($this->adresse));
            $this->password=htmlspecialchars(strip_tags($this->password));
            $this->niveau_dacces=htmlspecialchars(strip_tags($this->niveau_dacces));
            $this->status=htmlspecialchars(strip_tags($this->status));
        
            // Lier les valeurs
            $stmt->bindParam(':prenom', $this->prenom);
            $stmt->bindParam(':nom', $this->nom);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':tel', $this->tel);
            $stmt->bindParam(':adresse', $this->adresse);
        
            // hachage le mot de passe avant d'économiser sur la base de données
            $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
            $stmt->bindParam(':password', $password_hash);
        
            $stmt->bindParam(':niveau_dacces', $this->niveau_dacces);
            $stmt->bindParam(':status', $this->status);
            $stmt->bindParam(':created', $this->created);
        
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

                // Lire tous les enregistrements d'utilisateurs
        function lireTout($from_record_num, $records_per_page){
        
            // Requête pour lire tous les enregistrements d'utilisateurs, avec la clause limite de pagination
            $query = "SELECT
                        id,
                        prenom,
                        nom,
                        email,
                        tel,
                        niveau_dacces,
                        created
                    FROM " . $this->table_name . "
                    ORDER BY id DESC
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

        // utilisé pour les utilisateurs de pagination
        public function compter(){
        
            // Requête pour sélectionner tous les enregistrements d'utilisateur
            $query = "SELECT id FROM " . $this->table_name . "";
        
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