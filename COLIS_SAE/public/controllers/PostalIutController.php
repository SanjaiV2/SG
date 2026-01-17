<?php
require_once __DIR__ . '/../models/PostalIutModels.php';

class PostalIutController {

    private $model;

    public function __construct() {
        $this->model = new PostalIutModels();
    }

    public function dashboard() {

        $stats = [
            "recus"           => $this->model->getColisRecusIUT(),
            "en_attente"     => $this->model->getColisEnAttente(),
            "retires"        => $this->model->getColisRetires(),
            "non_identifies" => $this->model->getColisNonIdentifies()
        ];

        $colis = $this->model->getDerniersColis();

        require __DIR__ . '/../views/postal-iut/dashboard.php';
    }


    public function colisRecus() {

        $colis = $this->model->getColisRecus();

        require __DIR__ . '/../views/postal-iut/colis-recus.php';
    }


    public function detailsColis() {

        if (!isset($_GET["id"])) {
            die("ID colis manquant");
        }

        $id_colis = intval($_GET["id"]);

        $colis = $this->model->getColisById($id_colis);

        if (!$colis) {
            die("Colis introuvable");
        }

        $historique = $this->model->getHistoriqueColis($id_colis);

        require __DIR__ . '/../views/postal-iut/colis-details.php';
    }


    public function colisRemis() {

        // Colis avec statut "retiré"
        $colis = $this->model->getColisRemis();

        require __DIR__ . '/../views/postal-iut/colis-remis.php';
    }

    public function rechercheColis() {

        $resultats = [];

        if (isset($_GET["q"]) && !empty($_GET["q"])) {
            $resultats = $this->model->rechercherColis($_GET["q"]);
        }

        require __DIR__ . '/../views/postal-iut/recherche-colis.php';
    }


    public function colisNonIdentifies() {

        $colis = $this->model->getColisNonIdentifie();

        require __DIR__ . '/../views/postal-iut/colis-non-identifies.php';
    }

    public function confirmation() {
        $colis = $this->model->getColisATConfirmer();
        require __DIR__ . '/../views/postal-iut/confirmation.php';
    }

    public function confirmerColis() {
        if (!isset($_GET["id"])) {
            die("ID colis manquant");
        }

        $this->model->confirmerReceptionIUT((int)$_GET["id"]);
        header("Location: confirmation.php?ok=1");
        exit;
    }


    public function retirerColis()
    {
        if (!isset($_GET["id"])) {
            die("ID colis manquant");
        }

        $id_colis = (int) $_GET["id"];

        $this->model->marquerColisRetire($id_colis);

        header("Location: colis-recus.php?ok=1");
        exit;
    }

    



}