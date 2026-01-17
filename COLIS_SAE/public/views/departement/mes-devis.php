<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes devis – Département</title>
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-dashboard.css">
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/stylesheet-all.css">
</head>

<body class="tableau-bord">

<aside class="barre-laterale">
    <div class="entete-barre">
        <img src="/COLIS_SAE/assets/img/logo-iutv.png" class="logo">
        <h2>Département</h2>
        <p>Gestion des colis</p>
    </div>

    <nav class="menu">
        <a href="departement.php">📊 Tableau de bord</a>
        <a href="creer-devis.php">📝 Créer un devis</a>
        <a class="actif" href="mes-devis.php">📄 Mes devis</a>
        <a href="bons-commande.php">🧾 Mes bons de commande</a>
        <a href="mes-colis.php">📦 Mes colis</a>
        <a href="budget.php">🏛 Budget</a>
        <a href="fournisseurs.php">🏭 Fournisseurs</a>
    </nav>
</aside>

<main class="contenu">

   <!-- views/devis/list.php -->
<div class="devis-page">
    <div class="page-header-simple">
        <a href="departement.php" class="back-button-simple">
            <span class="back-arrow">←</span>
            Retour
        </a>
    </div>
    
    <div class="page-header">
    <div class="page-header-content">
        <h1 class="page-title">Mes Devis</h1>
    </div>
    
        <div class="page-header-content">
        <p class="page-subtitle">Historique complet de vos devis</p>
    </div>

    <div class="page-actions">
        <button class="btn-primary" onclick="window.location.href=''">
            <span class="btn-icon-text">+</span>
            Nouveau devis
        </button>
    </div>

    </div>
    
    <!-- Search Bar -->
    <div class="search-container-simple">
        <span class="search-icon-text">🔍</span>
        <input 
            type="text" 
            class="search-input" 
            placeholder="Rechercher par objet, fournisseur ou statut..."
            id="searchDevis"
            onkeyup="filterDevis()"
        >
    </div>
    
    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <span class="stat-label">Total devis</span>
            <div class="stat-value">
                <?php 
                $totalDevis = isset($devis) ? count($devis) : 0;
                echo $totalDevis; 
                ?>
            </div>
        </div>
        
        <div class="stat-card">
            <span class="stat-label">En attente</span>
            <div class="stat-value">
                <?php 
                $enAttente = 0;
                if (isset($devis)) {
                    foreach ($devis as $d) {
                        if ($d['statut'] === 'en_attente') $enAttente++;
                    }
                }
                echo $enAttente;
                ?>
            </div>
        </div>
        
        <div class="stat-card">
            <span class="stat-label">Validés</span>
            <div class="stat-value">
                <?php 
                $valides = 0;
                if (isset($devis)) {
                    foreach ($devis as $d) {
                        if ($d['statut'] === 'valide') $valides++;
                    }
                }
                echo $valides;
                ?>
            </div>
        </div>
    </div>
    
    <!-- Liste des devis -->
    <div class="section">
        <div class="section-header">
            <h2 class="section-title">Liste des devis</h2>
            <span class="section-subtitle">
                <?php echo $totalDevis; ?> devis trouvé(s)
            </span>
        </div>
        
        <div class="table-container">
            <table class="data-table" id="devisTable">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Objet</th>
                        <th>Fournisseur</th>
                        <th>Montant estimé</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($devis)): ?>
                        <tr>
                            <td colspan="6" class="empty-state">Aucun devis trouvé</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($devis as $d): ?>
                            <tr class="devis-row">
                                <td><?php echo date('d/m/Y', strtotime($d['date_demande'])); ?></td>
                                <td><strong><?php echo htmlspecialchars($d['objet']); ?></strong></td>
                                <td><?php echo htmlspecialchars($d['fournisseur_nom']); ?></td>
                                <td>
                                    <span class="montant">
                                        <?php echo number_format($d['montant_estime'], 2, ',', ' '); ?> €
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-<?php echo $d['statut']; ?>">
                                        <?php 
                                        $statutLabels = [
                                            'en_attente' => 'En attente',
                                            'valide' => 'Validé',
                                            'refuse' => 'Refusé'
                                        ];
                                        echo $statutLabels[$d['statut']] ?? ucfirst($d['statut']);
                                        ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</main>

</body>
</html>