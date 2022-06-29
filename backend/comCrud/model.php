<?php
class Database
{
    private $host = 'mysql:host=localhost;dbname=bokk_yakaar_bd';
    private $user = 'root';
    private $pswd = '';

    public function getConnexion()
    {
        try {
            return new PDO($this->host, $this->user, $this->pswd);
        } catch (PDOException $e) {
            die("Connection Error: " . $e->getMessage());
        }
    }

    public function create(int $utilisateur, int $produit, int $montant, int $percu, int $retourne, string $etat)
    {

        $q = $this->getConnexion()->prepare(
            "INSERT INTO commande (`id_utilisateur`, `id_produit`, `montant`, `percu`, `retourne`, `etat`) 
             VALUES (:id_utilisateur, :id_produit, :montant, :percu, :retourne, :etat)"
        );
        return $q->execute([
            'id_utilisateur' => $utilisateur,
            'id_produit' => $produit,
            'montant' => $montant,
            'percu' => $percu,
            'retourne' => $retourne,
            'etat' => $etat
        ]);
    }

    public function read()
    {
        return $this->getConnexion()->query(
            "SELECT id_com, prenom,nom, libelle,montant, percu, retourne, etat 
                FROM commande
                INNER JOIN utilisateurs 
                ON commande.id_utilisateur = utilisateurs.id
                INNER JOIN produit
                ON commande.id_produit = produit.id
                ORDER BY id_com"
        )->fetchAll(PDO::FETCH_OBJ);
    }

    public function countCommande(): int
    {
        return (int)$this->getConnexion()->query("SELECT COUNT(id_com) as count FROM commande")->fetch()[0];
    }
}
