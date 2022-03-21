<?php
include_once 'Database.php';

class Assurance extends Database
{
    // nom de la table
    protected $tableName = 'assurance';

    /**
     * La fonction est utilisée pour ajouter une assurance
     * @param array $data
     * @return int $lastInsertedId
     */
    public function add($data)
    {

        if (!empty($data)) {
            $fileds = $placholders = [];
            foreach ($data as $field => $value) {
                $fileds[] = $field;
                $placholders[] = ":{$field}";
            }
        }

        $sql = "INSERT INTO {$this->tableName} (" . implode(',', $fileds) . ") VALUES (" . implode(',', $placholders) . ")";
        $stmt = $this->conn->prepare($sql);
        try {
            $this->conn->beginTransaction();
            $stmt->execute($data);
            $lastInsertedId = $this->conn->lastInsertId();
            $this->conn->commit();
            return $lastInsertedId;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            $this->conn->rollback();
        }

    }

    public function update($data, $id)
    {
        if (!empty($data)) {
            $fileds = '';
            $x = 1;
            $filedsCount = count($data);
            foreach ($data as $field => $value) {
                $fileds .= "{$field}=:{$field}";
                if ($x < $filedsCount) {
                    $fileds .= ", ";
                }
                $x++;
            }
        }
        $sql = "UPDATE {$this->tableName} SET {$fileds} WHERE id_assurance=:id_assurance";
        $stmt = $this->conn->prepare($sql);
        try {
            $this->conn->beginTransaction();
            $data['id_assurance'] = $id;
            $stmt->execute($data);
            $this->conn->commit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            $this->conn->rollback();
        }

    }

    /**
     * La fonction est utilisée pour obtenir des enregistrements
     * @param int $stmt
     * @param int @limit
     * @return array $results
     */

    public function getRows($start = 0, $limit = 5)
    {
        $sql = "SELECT id_utilisateur, type_assurance,montant_assurance,debut_assurance,fin_assurance,
        DATEDIFF (`fin_assurance` , `debut_assurance` ) as duree_assurance  
        FROM {$this->tableName} ORDER BY id_assurance DESC LIMIT {$start},{$limit}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {

            $results = [];
        }
        return $results;
    }

    // Supprimer la ligne avec ID
    public function deleteRow($id)
    {
        $sql = "DELETE FROM {$this->tableName}  WHERE id_assurance=:id_assurance";
        $stmt = $this->conn->prepare($sql);
        try {
            $stmt->execute([':id_assurance' => $id]);
            if ($stmt->rowCount() > 0) {
                return true;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }

    }

    public function getCount()
    {
        $sql = "SELECT count(*) as pcount FROM {$this->tableName}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['pcount'];
    }
    /**
     * La fonction est utilisée pour obtenir un enregistrement unique en fonction de la valeur de la colonne
     * @param string $fileds
     * @param any $value
     * @return array $results
     */
    public function getRow($field, $value)
    {

        $sql = "SELECT * FROM {$this->tableName}  WHERE {$field}=:{$field}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":{$field}" => $value]);
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $result = [];
        }

        return $result;
    }

    public function recherche($searchText, $start = 0, $limit = 4)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE type_assurance LIKE :search ORDER BY id_assurance DESC LIMIT {$start},{$limit}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':search' => "{$searchText}%"]);
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $results = [];
        }

        return $results;
    }

}
