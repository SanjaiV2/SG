<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Département</title>
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-dashboard.css">
</head>

<body class="tableau-bord">

    <!-- BARRE LATÉRALE -->
    <aside class="barre-laterale">
        <div class="entete-barre">
            <img src="/COLIS_SAE/assets/img/logo-iutv.png" class="logo" alt="Logo IUT">
            <h2>Département</h2>
            <p>Gestion des colis</p>
        </div>

        <nav class="menu">
            <a class="actif" href="/COLIS_SAE/public/departement/departement.php">📊 Tableau de bord</a>
            <a href="/COLIS_SAE/public/departement/creer-devis.php">📝 Créer un devis</a>
            <a href="/COLIS_SAE/public/departement/mes-devis.php">📄 Mes devis</a>
            <a href="/COLIS_SAE/public/departement/bons-commande.php">🧾 Mes bons de commande</a>
            <a href="/COLIS_SAE/public/departement/mes-colis.php">📦 Mes colis</a>
            <a href="/COLIS_SAE/public/departement/budget.php">💰 Budget</a>
            <a href="/COLIS_SAE/public/departement/fournisseurs.php">🏭 Fournisseurs</a>
        </nav>

        <div class="deconnexion">
            <a href="/SG_COLIS_SAE/COLIS_SAE/public/logout.php">🚪 Déconnexion</a>
        </div>
    </aside>


    <main class="contenu">
        
    
       <div class="dashboard">
    <div class="page-header">
        <h1 class="page-title">Tableau de bord</h1>
        <p class="page-subtitle">Gérez vos devis, commandes et colis</p>
        <button class="btn-primary"
                onclick="window.location.href='creer-devis.php'">
                Créer un devis
        </button>
    </div>
    

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-header">
                <span class="stat-label">Colis total</span>
            </div>
            <div class="stat-value"><?php echo $stats['colis_total']; ?></div>
            <div class="stat-description">Total des colis</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-header">
                <span class="stat-label">Colis en attente</span>
            </div>
            <div class="stat-value"><?php echo $stats['en_attente']; ?></div>
            <div class="stat-description">À récupérer</div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <span class="stat-label">Colis retirés</span>
            </div>
            <div class="stat-value"><?php echo $stats['retire']; ?></div>
            <div class="stat-description">Réceptions confirmées</div>
        </div>
    </div>
    
    <!-- Budget Section -->
    <?php if (isset($budget)): ?>
    <div class="section">
        <div class="section-header">
            <h2 class="section-title">Budget du département</h2>
            <span class="section-subtitle">Situation budgétaire</span>
        </div>
        
        <div class="stats-grid">
            <div class="stat-card">
                <span class="stat-label">Budget total</span>
                <div class="stat-value"><?php echo number_format($budget['budget_total'], 2, ',', ' '); ?> €</div>
            </div>
            <div class="stat-card">
                <span class="stat-label">Budget utilisé</span>
                <div class="stat-value"><?php echo number_format($budget['budget_utilise'], 2, ',', ' '); ?> €</div>
            </div>
            <div class="stat-card">
                <span class="stat-label">Budget restant</span>
                <div class="stat-value"><?php echo number_format($budget['budget_restant'], 2, ',', ' '); ?> €</div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    
    <!-- Recent Colis -->
    <div class="section">
        <div class="section-header">
            <h2 class="section-title">Derniers colis</h2>
            <span class="section-subtitle">Suivez vos livraisons récentes</span>
            <a href="mes-colis.php" class="btn-link">Voir tout</a>
        </div>
        
        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>N° Suivi</th>
                        <th>BC lié</th>
                        <th>Destinataire</th>
                        <th>Date réception</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($colis)): ?>
                        <tr>
                            <td colspan="5" class="empty-state">Aucun colis trouvé</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($colis as $col): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($col['numero_suivi'] ?? 'N/A'); ?></td>
                                <td><?php echo htmlspecialchars($col['numero_commande'] ?? 'N/A'); ?></td>
                                <td><?php echo htmlspecialchars($col['destinataire_nom'] ?? 'Non assigné'); ?></td>
                                <td><?php echo isset($col['date_reception']) ? date('d/m/Y', strtotime($col['date_reception'])) : 'N/A'; ?></td>
                                <td>
                                    <span class="badge badge-<?php echo $col['statut_libelle']; ?>">
                                        <?php echo ucfirst(str_replace('_', ' ', $col['statut_libelle'])); ?>
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