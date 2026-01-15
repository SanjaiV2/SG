<?php
require_once __DIR__ . "/Model.php";

class PostalIutModels {

    private $db;

    public function __construct() {
        $this->db = Model::getModel()->bd;
    }

    /* ===== STATS ===== */

    public function getColisRecusIUT() {
        return $this->db
            ->query("SELECT COUNT(*) FROM colis WHERE statut_id = 7")
            ->fetchColumn();
    }

    public function getColisEnAttente() {
        return $this->db
            ->query("SELECT COUNT(*) FROM colis WHERE statut_id = 1")
            ->fetchColumn();
    }

    public function getColisRetires() {
        return $this->db
            ->query("SELECT COUNT(*) FROM colis WHERE statut_id = 3")
            ->fetchColumn();
    }

    public function getColisNonIdentifies() {
        return $this->db
            ->query("SELECT COUNT(*) FROM colis WHERE statut_id = 4")
            ->fetchColumn();
    }

    /* ===== DERNIERS COLIS ===== */

    public function getDerniersColis() {
        $sql = "
            SELECT 
                c.id_colis,
                c.numero_suivi,
                c.date_reception,
                s.libelle AS statut,
                d.nom AS departement
            FROM colis c
            LEFT JOIN bon_commande b ON c.bon_commande_id = b.id_bon_commande
            LEFT JOIN departement d ON b.departement_id = d.id_departement
            JOIN statut_colis s ON c.statut_id = s.id_statut
            ORDER BY c.date_reception DESC
            LIMIT 10
        ";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getColisRecus() {
        $sql = "
            SELECT 
                c.id_colis,
                c.numero_suivi,
                c.date_reception,
                d.nom AS departement,
                s.libelle AS statut
            FROM colis c
            LEFT JOIN bon_commande b ON c.bon_commande_id = b.id_bon_commande
            LEFT JOIN departement d ON b.departement_id = d.id_departement
            JOIN statut_colis s ON c.statut_id = s.id_statut
            WHERE c.statut_id = 7
            ORDER BY c.date_reception DESC
        ";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getColisById($id_colis) {
        $sql = "
            SELECT 
                c.id_colis,
                c.numero_suivi,
                c.date_reception,
                c.date_retrait,
                c.commentaire,
                s.libelle AS statut,
                b.numero_commande,
                d.nom AS departement
            FROM colis c
            LEFT JOIN bon_commande b ON c.bon_commande_id = b.id_bon_commande
            LEFT JOIN departement d ON b.departement_id = d.id_departement
            JOIN statut_colis s ON c.statut_id = s.id_statut
            WHERE c.id_colis = ?
        ";

        $req = $this->db->prepare($sql);
        $req->execute([$id_colis]);
        return $req->fetch(PDO::FETCH_ASSOC);
    }


    public function getHistoriqueColis($id_colis) {
        $sql = "
            SELECT 
                action,
                date_action
            FROM historique_colis
            WHERE colis_id = ?
            ORDER BY date_action DESC
        ";

        $req = $this->db->prepare($sql);
        $req->execute([$id_colis]);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getColisRemis() {
        $sql = "
            SELECT 
                c.id_colis,
                c.numero_suivi,
                c.date_reception,
                c.date_retrait,
                d.nom AS departement
            FROM colis c
            LEFT JOIN bon_commande b ON c.bon_commande_id = b.id_bon_commande
            LEFT JOIN departement d ON b.departement_id = d.id_departement
            WHERE c.statut_id = 4
            ORDER BY c.date_retrait DESC
        ";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function rechercherColis($motcle) {

        $motcle = "%" . $motcle . "%";

        $sql = "
            SELECT 
                c.id_colis,
                c.numero_suivi,
                c.date_reception,
                s.libelle AS statut,
                d.nom AS departement,
                b.numero_commande
            FROM colis c
            LEFT JOIN bon_commande b ON c.bon_commande_id = b.id_bon_commande
            LEFT JOIN departement d ON b.departement_id = d.id_departement
            JOIN statut_colis s ON c.statut_id = s.id_statut
            WHERE 
                c.numero_suivi LIKE ?
                OR b.numero_commande LIKE ?
                OR d.nom LIKE ?
                OR c.id_colis LIKE ?
            ORDER BY c.date_reception DESC
        ";

        $req = $this->db->prepare($sql);
        $req->execute([$motcle, $motcle, $motcle, $motcle]);

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getColisNonIdentifie() {
        $sql = "
            SELECT 
                c.id_colis,
                c.numero_suivi,
                c.date_reception,
                c.commentaire
            FROM colis c
            WHERE c.statut_id = 3
            ORDER BY c.date_reception DESC
        ";

        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getColisATConfirmer() {
    $sql = "
        SELECT 
            c.id_colis,
            c.numero_suivi,
            c.date_reception,
            d.nom AS departement,
            b.numero_commande
        FROM colis c
        LEFT JOIN bon_commande b ON c.bon_commande_id = b.id_bon_commande
        LEFT JOIN departement d ON b.departement_id = d.id_departement
        WHERE c.statut_id = 6
        ORDER BY c.date_reception DESC
    ";
    return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

        public function confirmerReceptionIUT($id_colis) {
            $sql = "
                UPDATE colis
                SET statut_id = 7
                WHERE id_colis = ?
            ";
            $req = $this->db->prepare($sql);
            return $req->execute([$id_colis]);
        }

        public function marquerColisRetire($id_colis)
    {
        $sql = "
            UPDATE colis
            SET 
                statut_id = 4,
                date_retrait = NOW()
            WHERE id_colis = ?
        ";

        $req = $this->db->prepare($sql);
        return $req->execute([$id_colis]);
    }







}