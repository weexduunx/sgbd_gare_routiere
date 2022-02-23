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
}