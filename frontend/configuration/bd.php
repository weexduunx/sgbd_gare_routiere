<?php
// utilisé pour obtenir une connexion de base de données MySQL
class Basededonnee{

    // j'stocke les informations de connexion dans les variables
    private $host = "localhost";
    private $db_name = "bokk_yakaar_bd";
    private $username = "root";
    private $password = "";
    public $conn;
 
    // Obtenir la connexion de la base de données
    public function connectBD(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Erreur de connexion: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>