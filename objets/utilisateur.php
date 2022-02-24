<?php
// objet 'utilisateur'
class Utilisateur{

    // Nom de la connexion et de la table utilisateurs 
    private $conn;
    private $table_name = "utilisateurs";
 
    // Propriétés d'objet
    public $id;
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
        $query = "SELECT id, prenom, nom, niveau_dacces, password, status
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
            $this->niveau_dacces = $row['niveau_dacces'];
            $this->password = $row['password'];
            $this->status = $row['status'];
    
            // retourne true parce que le courrier électronique existe dans la base de données
            return true;
        }
    
        // renvoie false si l'e-mail n'existe pas dans la base de données
        return false;
    }

    // create new user record
        function creer(){
        
            // to get time stamp for 'created' field
            $this->created=date('Y-m-d H:i:s');
        
            // insert query
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
        
            // prepare the query
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
        
            // bind the values
            $stmt->bindParam(':prenom', $this->prenom);
            $stmt->bindParam(':nom', $this->nom);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':tel', $this->tel);
            $stmt->bindParam(':adresse', $this->adresse);
        
            // hash the password before saving to database
            $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
            $stmt->bindParam(':password', $password_hash);
        
            $stmt->bindParam(':niveau_dacces', $this->niveau_dacces);
            $stmt->bindParam(':status', $this->status);
            $stmt->bindParam(':created', $this->created);
        
            // execute the query, also check if query was successful
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
}