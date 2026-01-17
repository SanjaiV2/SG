<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un devis – Département</title>
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
        <a class="actif" href="creer-devis.php">📝 Créer un devis</a>
        <a href="mes-devis.php">📄 Mes devis</a>
        <a href="bons-commande.php">🧾 Mes bons de commande</a>
        <a href="mes-colis.php">📦 Mes colis</a>
        <a href="budget.php">🏛 Budget</a>
        <a href="fournisseurs.php">🏭 Fournisseurs</a>
    </nav>
</aside>

<!-- contenue  -->
<main class="contenu">

    <form method="POST" action="" class="devis-form" id="devisForm">

    <div class="create-devis-page">
    <div class="page-header-simple">
        <a href="departement.php" class="back-button-simple">
            <span class="back-arrow">←</span>
            Retour
        </a>
    </div>
    
    <div class="form-container">
        <div class="form-header">
            <h1 class="form-title">Créer un Devis</h1>
            <p class="form-subtitle">Saisissez les informations du devis pour créer une demande d'achat</p>
        </div>
        
       
        <div class="alert alert-info-simple">
            <span class="alert-icon-text">ℹ️</span>
            <div class="alert-content">
                Une fois créé, le devis sera automatiquement envoyé au service financier pour vérification budgétaire. Vous serez notifié de sa validation ou de son refus.
            </div>
        </div>
        
       <form method="POST" action="" class="devis-form" id="devisForm">

           
            <div class="form-section">
                <div class="form-section-header-simple">
                    <span class="section-icon-text">📄</span>
                    <div>
                        <h3 class="form-section-title">Informations du devis</h3>
                        <p class="form-section-subtitle">Remplissez tous les champs obligatoires</p>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="objet" class="form-label required">Objet de la demande</label>
                    <input 
                        type="text" 
                        id="objet" 
                        name="objet" 
                        class="form-input" 
                        placeholder="Ex: Achat de matériel informatique pour le laboratoire"
                        required
                    >
                    <small class="form-help">Décrivez brièvement l'objet de votre demande d'achat</small>
                </div>
                
                    <div class="form-group">
                    <label for="fournisseur_id" class="form-label required">Fournisseur</label>
                    <select id="fournisseur_id" name="fournisseur_id" class="form-select" required>
                        <option value="">Sélectionnez un fournisseur</option>
                        <?php foreach ($fournisseurs as $fournisseur): ?>
                            <option value="<?= $fournisseur['id_fournisseur']; ?>">
                                <?= htmlspecialchars($fournisseur['nom']); ?>
                                <?php if (!empty($fournisseur['contact_email'])): ?>
                                    - <?= htmlspecialchars($fournisseur['contact_email']); ?>
                                <?php endif; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="montant_estime" class="form-label required">Montant estimé (€)</label>
                    <input 
                        type="number" 
                        id="montant_estime" 
                        name="montant_estime" 
                        class="form-input" 
                        placeholder="0.00"
                        step="0.01"
                        min="0"
                        required
                    >
                    <small class="form-help">Montant estimé de la commande en euros</small>
                </div>
            </div>
            
           
            <div class="form-actions">
                <button 
                    type="button" 
                    class="btn-secondary" 
                    onclick="window.location.href='departement.php'"
                >
                    Annuler
                </button>
                <button type="submit" class="btn-primary btn-submit">
                    <span class="btn-icon-text">✓</span>
                    Créer et envoyer le devis
                </button>
            </div>
        </form>
        
        <!-- Process Info -->
        <div class="process-section">
            <h3 class="process-title">Processus de validation</h3>
            <ol class="process-list">
                <li class="process-item">
                    <span class="process-number">1</span>
                    <span class="process-text">Vous créez le devis</span>
                </li>
                <li class="process-item">
                    <span class="process-number">2</span>
                    <span class="process-text">Le service financier vérifie la disponibilité budgétaire</span>
                </li>
                <li class="process-item">
                    <span class="process-number">3</span>
                    <span class="process-text">Si validé, un bon de commande est créé</span>
                </li>
                <li class="process-item">
                    <span class="process-number">4</span>
                    <span class="process-text">Le directeur signe le bon de commande</span>
                </li>
                <li class="process-item">
                    <span class="process-number">5</span>
                    <span class="process-text">La commande est envoyée au fournisseur</span>
                </li>
            </ol>
        </div>
    </div>
</div>

</main>

</body>
</html>