<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes bons de commande – Département</title>
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
        <a href="mes-devis.php">📄 Mes devis</a>
        <a class="actif" href="bons-commande.php">🧾 Mes bons de commande</a>
        <a href="mes-colis.php">📦 Mes colis</a>
        <a href="budget.php">🏛 Budget</a>
        <a href="fournisseurs.php">🏭 Fournisseurs</a>
    </nav>
</aside>
<main class="contenu">

    <div class="commande-page">
    <div class="page-header">
        <a href="departement.php" class="back-button-simple">
            <span class="back-arrow">←</span>
            Retour
        </a>
    </div>
    
    <div class="page-header">
        <div>
            <h1 class="page-title">Mes Bons de Commande</h1>
        </div>

        <div>
            <p class="page-subtitle">Historique complet de vos commandes</p>
        </div>
    </div>
    
    <!-- Search Bar -->
    <div class="search-container">
        <span class="search-icon-text">🔍</span>
        <input 
            type="text" 
            class="search-input" 
            placeholder="Rechercher par numéro, fournisseur ou statut..."
            id="searchCommandes"
            onkeyup="filterCommandes()"
        >
    </div>
    
    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <span class="stat-label">Total commandes</span>
            <div class="stat-value">
                <?php 
                $totalCommandes = isset($bons) ? count($bons) : 0;
                echo $totalCommandes; 
                ?>
            </div>
        </div>
        
        <div class="stat-card">
            <span class="stat-label">En attente</span>
            <div class="stat-value">
                <?php 
                $enAttente = 0;
                if (isset($bons)) {
                    foreach ($bons as $c) {
                        if ($c['statut'] === 'en_preparation') $enAttente++;
                    }
                }
                echo $enAttente;
                ?>
            </div>
        </div>
        
        <div class="stat-card stat-blue">
            <span class="stat-label">Signés</span>
            <div class="stat-value">
                <?php 
                $signes = 0;
                if (isset($bons)) {
                    foreach ($bons as $c) {
                        if ($c['statut'] === 'signe') $signes++;
                    }
                }
                echo $signes;
                ?>
            </div>
        </div>
        
        <div class="stat-card">
            <span class="stat-label">Montant total</span>
            <div class="stat-value">
                <?php 
                $montantTotal = 0;
                if (isset($bons)) {
                    foreach ($bons as $c) {
                        $montantTotal += $c['montant_estime'];
                    }
                }
                echo number_format($montantTotal, 2, ',', ' ') . ' €';
                ?>
            </div>
        </div>
    </div>
    
    <!-- Liste des commandes -->
    <div class="section">
        <div class="section-header">
            <h2 class="section-title">Liste des bons de commande</h2>
            <span class="section-subtitle">
                <?php echo $totalCommandes; ?> bon(s) de commande trouvé(s)
            </span>
        </div>
        
        <div class="table-container">
            <table class="data-table" id="commandesTable">
                <thead>
                    <tr>
                        <th>N° Commande</th>
                        <th>Date</th>
                        <th>Fournisseur</th>
                        <th>Montant</th>
                        <th>Date livraison estimée</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($bons)): ?>
                        <tr>
                            <td colspan="6" class="empty-state">Aucun bon de commande trouvé</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($bons as $cmd): ?>
                            <tr class="commande-row">
                                <td><strong><?php echo htmlspecialchars($cmd['numero_commande']); ?></strong></td>
                                <td><?php echo date('d/m/Y', strtotime($cmd['date_commande'])); ?></td>
                                <td><?php echo htmlspecialchars($cmd['fournisseur_nom']); ?></td>
                                <td>
                                    <span class="montant">
                                        <?php echo number_format($cmd['montant_estime'], 2, ',', ' '); ?> €
                                    </span>
                                </td>
                                <td>
                                    <?php 
                                    if ($cmd['date_estimee_livraison']) {
                                        echo date('d/m/Y', strtotime($cmd['date_estimee_livraison']));
                                    } else {
                                        echo '-';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <span class="badge badge-<?php echo $cmd['statut']; ?>">
                                        <?php 
                                        $statutLabels = [
                                            'en_preparation' => 'En préparation',
                                            'signe' => 'Signé',
                                            'envoye' => 'Envoyé',
                                            'livre' => 'Livré',
                                            'annule' => 'Annulé'
                                        ];
                                        echo $statutLabels[$cmd['statut']] ?? ucfirst(str_replace('_', ' ', $cmd['statut']));
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