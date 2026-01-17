<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes colis – Département</title>
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-dashboard.css">
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/stylesheet-all.css">
</head>

<body class="tableau-bord">

<!-- SIDEBAR -->
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
        <a href="bons-commande.php">🧾 Mes bons de commande</a>
        <a class="actif" href="mes-colis.php">📦 Mes colis</a>
        <a href="budget.php">🏛 Budget</a>
        <a href="fournisseurs.php">🏭 Fournisseurs</a>
    </nav>
</aside>

<!-- CONTENU -->
<main class="contenu">

   <div class="colis-page">
    <div class="page-header-simple">
        <a href="departement.php" class="back-button-simple">
            <span class="back-arrow">←</span>
            Retour
        </a>
    </div>
    
    <div class="colis-header">
        <div>
            <h1 class="page-title">Mes Colis</h1>
            <p class="page-subtitle">Suivez l'état de vos livraisons</p>
        </div>
    </div>
    
    <!-- Barre de recherche -->
    <div class="search-container-simple">
        <span class="search-icon-text">🔍</span>
        <input 
            type="text" 
            class="search-input" 
            placeholder="Rechercher par numéro de suivi, destinataire ou statut..."
            id="rechercheColis"
            onkeyup="filtrerColis()"
        >
    </div>
    
    <!-- Cartes statistiques -->
    <div class="stats-grid">
        <div class="stat-card">
            <span class="stat-label">Total colis</span>
            <div class="stat-value-large">
                <?php 
                $totalColis = isset($colis) ? count($colis) : 0;
                echo $totalColis; 
                ?>
            </div>
        </div>
        
        <div class="stat-card stat-blue">
            <span class="stat-label">En transit</span>
            <div class="stat-value-large stat-blue-text">
                <?php 
                $enTransit = 0;
                if (isset($colis)) {
                    foreach ($colis as $c) {
                        if ($c['statut_libelle'] === 'transfere_iut') $enTransit++;
                    }
                }
                echo $enTransit;
                ?>
            </div>
        </div>
        
        <div class="stat-card stat-success">
            <span class="stat-label">Prêts au retrait</span>
            <div class="stat-value-large stat-success-text">
                <?php 
                $pretsRetrait = 0;
                if (isset($colis)) {
                    foreach ($colis as $c) {
                        if ($c['statut_libelle'] === 'en_attente') $pretsRetrait++;
                    }
                }
                echo $pretsRetrait;
                ?>
            </div>
        </div>
        
        <div class="stat-card">
            <span class="stat-label">Livrés</span>
            <div class="stat-value-large">
                <?php 
                $livres = 0;
                if (isset($colis)) {
                    foreach ($colis as $c) {
                        if ($c['statut_libelle'] === 'livre') $livres++;
                    }
                }
                echo $livres;
                ?>
            </div>
        </div>
    </div>
    
    <!-- Liste des colis -->
    <div class="section">
        <div class="section-header">
            <h2 class="section-title">Liste des colis</h2>
            <span class="section-subtitle">
                <?php echo $totalColis; ?> colis trouvé(s)
            </span>
        </div>
        
        <div class="table-container">
            <table class="data-table" id="tableauColis">
                <thead>
                    <tr>
                        <th>N° Suivi</th>
                        <th>BC lié</th>
                        <th>Destinataire</th>
                        <th>Bureau</th>
                        <th>Date réception</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($colis)): ?>
                        <tr>
                            <td colspan="7" class="empty-state">Aucun colis trouvé</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($colis as $c): ?>
                            <tr class="ligne-colis">
                                <td>
                                    <strong><?php echo htmlspecialchars($c['numero_suivi'] ?? 'N/A'); ?></strong>
                                </td>
                                <td><?php echo htmlspecialchars($c['numero_commande'] ?? '-'); ?></td>
                                <td><?php echo htmlspecialchars($c['nom_destinataire'] ?? 'Non assigné'); ?></td>
                                <td>-</td>
                                <td>
                                    <?php 
                                    if ($c['date_reception']) {
                                        echo date('d/m/Y', strtotime($c['date_reception']));
                                    } else {
                                        echo '-';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <span class="badge badge-<?php echo $c['statut_libelle']; ?>">
                                        <?php 
                                        $statutLabels = [
                                            'recu_universite' => 'Reçu université',
                                            'transfere_iut' => 'Transféré IUT',
                                            'en_attente' => 'En attente',
                                            'livre' => 'Livré'
                                        ];
                                        echo $statutLabels[$c['statut_libelle']] ?? ucfirst(str_replace('_', ' ', $c['statut_libelle']));
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