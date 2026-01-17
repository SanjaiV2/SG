<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fournisseurs – Département</title>
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
        <a href="bons-commande.php">🧾 Mes bons de commande</a>
        <a href="mes-colis.php">📦 Mes colis</a>
        <a href="budget.php">🏛 Budget</a>
        <a class="actif" href="fournisseurs.php">🏭 Fournisseurs</a>
    </nav>
</aside>

<main class="contenu">

    <div class="fournisseur-page">
    <div class="page-header-simple">
        <a href="departement.php" class="back-button-simple">
            <span class="back-arrow">←</span>
            Retour
        </a>
    </div>
    
    <div class="fournisseur-header">
        <div>
            <h1 class="page-title">Fournisseurs Autorisés</h1>
            <p class="page-subtitle">Liste des fournisseurs validés par l'administration pour passer commande</p>
        </div>
    </div>
    
    <!-- Info Alert -->
    <div class="alert alert-info-simple">
        <span class="alert-icon-text">ℹ️</span>
        <div class="alert-content">
            <strong>Fournisseurs validés uniquement</strong><br>
            Vous ne pouvez passer commande qu'auprès des fournisseurs listés ci-dessous. Ces partenaires ont été validés par l'administration de l'IUT.
        </div>
    </div>
    
    <!-- Fournisseurs Count -->
    <div class="section">
        <div class="section-header">
            <h2 class="section-title">Liste des Fournisseurs (<?php echo isset($fournisseurs) ? count($fournisseurs) : 0; ?>)</h2>
            <span class="section-subtitle">Fournisseurs autorisés pour vos commandes</span>
        </div>
        
        <!-- Fournisseurs Grid -->
        <div class="fournisseurs-grid">
            <?php if (empty($fournisseurs)): ?>
                <div class="empty-state-card-simple">
                    <span class="empty-icon">📦</span>
                    <p>Aucun fournisseur disponible</p>
                </div>
            <?php else: ?>
                <?php foreach ($fournisseurs as $f): ?>
                    <div class="fournisseur-card-simple">
                        <div class="fournisseur-card-header-simple">
                            <div class="fournisseur-icon-simple">
                                <span class="icon-text">🏢</span>
                            </div>
                            <div class="fournisseur-info">
                                <h3 class="fournisseur-name"><?php echo htmlspecialchars($f['nom']); ?></h3>
                                <span class="badge badge-autorise-simple">
                                    <span class="badge-check">✓</span>
                                    Autorisé
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Detailed View -->
    <div class="section">
        <div class="section-header">
            <h2 class="section-title">Vue détaillée</h2>
        </div>
        
        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nom du fournisseur</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($fournisseurs)): ?>
                        <tr>
                            <td colspan="5" class="empty-state">Aucun fournisseur trouvé</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($fournisseurs as $f): ?>
                            <tr>
                                <td>
                                    <div class="table-fournisseur-name-simple">
                                        <span class="table-icon-text">🏢</span>
                                        <strong><?php echo htmlspecialchars($f['nom']); ?></strong>
                                    </div>
                                </td>
                                <td><?php echo $f['contact_nom'] ? htmlspecialchars($f['contact_nom']) : '-'; ?></td>
                                <td><?php echo $f['contact_email'] ? htmlspecialchars($f['contact_email']) : '-'; ?></td>
                                <td><?php echo $f['contact_telephone'] ? htmlspecialchars($f['contact_telephone']) : '-'; ?></td>
                                <td>
                                    <span class="badge badge-autorise-simple">
                                        <span class="badge-check">✓</span>
                                        Autorisé
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