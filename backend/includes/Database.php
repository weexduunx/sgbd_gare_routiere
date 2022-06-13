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
        $datefin)
    {
        $sql = "INSERT INTO assurance (
            id_utilisateur,  
            matricule,
            categorie, 
            marque, 
            type_assurance, 
            montant_assurance, 
            debut_assurance, 
            fin_assurance)
        VALUES (
            :membre, 
            :matricule,
            :categorie,  
            :marque, 
            :assurancetype, 
            :montant, 
            :datedebut, 
            :datefin)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':membre' => $membre,
            ':matricule' => $matricule,
            ':categorie' => $categorie,
            ':marque' => $marque,
            ':assurancetype' => $typeassurance,
            ':montant' => $montant,
            ':datedebut' => $datedebut,
            ':datefin' => $datefin,
        ]);

        return true;
    }

    public function lecture(){
        $data = array();
        $sql = "SELECT
        id_assurance,
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
                ORDER BY id_assurance ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row){
            $data[] = $row;
        }
        return $data;

    }

    public function lectureParId($id){
        $sql = "SELECT * FROM assurance WHERE id_assurance = :id_assurance";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id_assurance' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

    }

    public function modification(
        $id, 
        $categorie, 
        $matricule, 
        $marque, 
        $typeassurance, 
        $montant, 
        $datedebut, 
        $datefin){
        $sql = "UPDATE assurance SET 
            matricule = :matricule,
            categorie = :categorie,
            marque = :marque,
            type_assurance = :assurancetype,
            montant_assurance = :montant,
            debut_assurance = :datedebut,
            fin_assurance = :datefin
        WHERE id_assurance = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':matricule' => $matricule,
            ':categorie' => $categorie,
            ':marque' => $marque,
            ':assurancetype' => $typeassurance,
            ':montant' => $montant,
            ':datedebut' => $datedebut,
            ':datefin' => $datefin
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
?>