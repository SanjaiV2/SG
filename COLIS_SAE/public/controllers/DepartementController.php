<?php
require_once __DIR__ . "/../models/DepartementModels.php";

class DepartementController {

    private $model;

    public function __construct() {
        $this->model = new DepartementModels();
    }

    public function dashboard() {
        $departement_id = 1;

        $stats = [
            "colis_total"   => $this->model->countColisTotal($departement_id),
            "en_attente"    => $this->model->countColisEnAttente($departement_id),
            "retire"        => $this->model->countColisRetires($departement_id),
        ];

        $budget = $this->model->getBudgetDepartement($departement_id);
        $colis  = $this->model->getDerniersColis($departement_id);

        require __DIR__ . "/../views/departement/dashboard.php";
    }


    public function creerDevis() {
        $fournisseurs = $this->model->getFournisseurs();
        require __DIR__ . '/../views/departement/creer-devis.php';
    }

    public function envoyerDevis() {

        $objet          = $_POST["objet"];
        $montant        = $_POST["montant_estime"];
        $fournisseur_id = $_POST["fournisseur_id"];
        $commentaire    = $_POST["commentaire"] ?? null;

        // ⚠️ ID utilisateur connecté (TEMPORAIRE POUR TEST)
        $createur_id = 1; // à remplacer plus tard par la session CAS

        $this->model->insertDevis(
            $objet,
            $montant,
            $fournisseur_id,
            $createur_id
        );

        // Redirection après insertion
        header("Location: departement.php");
        exit;
    }

    public function mesDevis() {

        // ID utilisateur simulé (à remplacer plus tard par la session CAS)
        $idUtilisateur = 1;

        $devis = $this->model->getMesDevis($idUtilisateur);

        require __DIR__ . "/../views/departement/mes-devis.php";
    }


    public function mesBonsCommande() {

        // plus tard : depuis la session CAS
        $departement_id = 1;

        $bons = $this->model->getMesBonsCommande($departement_id);

        require __DIR__ . '/../views/departement/mes-bons-commande.php';
    }

    public function mesColis() {

        // À remplacer plus tard par la session CAS
        $departement_id = 1;

        $colis = $this->model->getColisDepartement($departement_id);

        require __DIR__ . '/../views/departement/mes-colis.php';
    }


    public function budget() {

        // normalement récupéré via la session
        $departement_id = $_SESSION["departement_id"] ?? 1;

        $budget = $this->model->getBudgetDepartement($departement_id);
        $depenses = $this->model->getDepensesDepartement($departement_id);

        require __DIR__ . "/../views/departement/budget.php";
    }

    public function fournisseurs() {
        $fournisseurs = $this->model->getFournisseursAutorises();
        require __DIR__ . "/../views/departement/fournisseurs.php";
    }





}