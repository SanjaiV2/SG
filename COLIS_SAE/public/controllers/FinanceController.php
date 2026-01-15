<?php
require_once __DIR__ . "/../models/FinanceModels.php";

class FinanceController {

    private $model;

    public function __construct() {
        $this->model = new FinanceModels();
    }

    public function dashboard() {

        $stats = [
            "devis_attente" => $this->model->countDevisEnAttente(),
            "bons_commande" => $this->model->countBonCommande()
        ];

        $budgets = $this->model->getBudgetsDepartements();
        $devis   = $this->model->getDevisEnAttente();
        $bons    = $this->model->getBonsCommandeRecents();

        require __DIR__ . "/../views/finance/dashboard.php";
    }


    public function validerDevis() {
        if (!isset($_GET["id"])) {
            die("ID devis manquant");
        }

        $id = intval($_GET["id"]);
        $this->model->validerDevis($id);

        header("Location: finance.php");
        exit;
    }

    public function rejeterDevis() {
        if (!isset($_GET["id"])) {
            die("ID devis manquant");
        }

        $id = intval($_GET["id"]);
        $this->model->rejeterDevis($id);

        header("Location: finance.php");
        exit;
    }


    public function devisAVerifier() {

        $devis = $this->model->getDevisAVerifier();

        require __DIR__ . '/../views/finance/devis-a-verifier.php';
    }

     public function bonsCommande() {
        $bons = $this->model->getTousLesBonsCommande();
        require __DIR__ . '/../views/finance/bons-commande.php';
    }

    public function budgets() {

        $budgets = $this->model->getBudgetDepartements();

        require __DIR__ . "/../views/finance/budgets.php";
    }









}