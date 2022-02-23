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
}