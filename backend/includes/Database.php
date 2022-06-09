<?php
class Database
{
    private $dbServer = 'localhost';
    private $dbUser = 'root';
    private $dbPassword = '';
    private $dbName = 'bokk_yakaar_bd';
    protected $conn;

    public function __construct()
    {
        try {
            $dsn = "mysql:host={$this->dbServer}; dbname={$this->dbName}; charset=utf8";
            $options = array(PDO::ATTR_PERSISTENT);
            $this->conn = new PDO($dsn, $this->dbUser, $this->dbPassword, $options);
        } catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }

    }

    public function insertion(
        $membre, 
        $categorie, 
        $matricule, 
        $marque, 
        $typeassurance, 
        $montant, 
        $datedebut, 
        $datefin, 
        $photo)
    {
        $sql = "INSERT INTO assurance (
            id_utilisateur,  
            matricule,
            categorie, 
            marque, 
            type_assurance, 
            montant_assurance, 
            debut_assurance, 
            fin_assurance, 
            photo)
        VALUES (
            :membre, 
            :matricule,
            :categorie,  
            :marque, 
            :typeassurance, 
            :montant, 
            :datedebut, 
            :datefin, 
            :photo)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':membre' => $membre,
            ':matricule' => $matricule,
            ':categorie' => $categorie,
            ':marque' => $marque,
            ':typeassurance' => $typeassurance,
            ':montant' => $montant,
            ':datedebut' => $datedebut,
            ':datefin' => $datefin,
            ':photo' => $photo
        ]);

        return true;
    }

    public function lecture($start = 0, $limit = 5){
        $data = array();
        $sql = "SELECT                     
        photo,
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
                ORDER BY id_assurance 
                DESC LIMIT {$start},{$limit}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {

            $results = [];
        }
        return $results;

    }

    public function lectureParId($id){
        $sql = "SELECT * FROM assurance WHERE id_assurance = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

    }

    public function modification(
        $id, 
        $membre, 
        $categorie, 
        $matricule, 
        $marque, 
        $typeassurance, 
        $montant, 
        $datedebut, 
        $datefin, 
        $photo){
        $sql = "UPDATE assurance SET 
            id_utilisateur = :membre,
            matricule = :matricule,
            categorie = :categorie,
            marque = :marque,
            type_assurance = :typeassurance,
            montant_assurance = :montant,
            debut_assurance = :datedebut,
            fin_assurance = :datefin,
            photo = :photo
        WHERE id_assurance = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':membre' => $membre,
            ':matricule' => $matricule,
            ':categorie' => $categorie,
            ':marque' => $marque,
            ':typeassurance' => $typeassurance,
            ':montant' => $montant,
            ':datedebut' => $datedebut,
            ':datefin' => $datefin,
            ':photo' => $photo
        ]);
        return true;
    }

    public function suppression($id){
        $sql = "DELETE FROM assurance WHERE id_assurance = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return true;
    }

    public function total(){
        $sql = "SELECT COUNT(*) as total FROM assurance";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }


}
$ob = new Database();
echo $ob->total();
