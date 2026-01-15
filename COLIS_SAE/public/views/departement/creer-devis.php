<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un devis – Département</title>
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-dashboard.css">
</head>

<body class="tableau-bord">

<!-- SIDEBAR IDENTIQUE AU DASHBOARD -->
<aside class="barre-laterale">
    <div class="entete-barre">
        <img src="/COLIS_SAE/assets/img/logo-iutv.png" class="logo">
        <h2>Département</h2>
        <p>Gestion des colis</p>
    </div>

    <nav class="menu">
        <a href="/COLIS_SAE/public/departement/departement.php">📊 Tableau de bord</a>
        <a class="actif" href="/COLIS_SAE/public/departement/creer-devis.php">📝 Créer un devis</a>
        <a href="/COLIS_SAE/public/departement/mes-devis.php">📄 Mes devis</a>
        <a href="/COLIS_SAE/public/departement/bons-commande.php">🧾 Mes bons de commande</a>
        <a href="/COLIS_SAE/public/departement/mes-colis.php">📦 Mes colis</a>
        <a href="/COLIS_SAE/public/departement/budget.php">🏛 Budget</a>
        <a href="/COLIS_SAE/public/departement/fournisseurs.php">🏭 Fournisseurs</a>
    </nav>
</aside>

<!-- CONTENU -->
<main class="contenu">

    <h1>📝 Créer un devis</h1>
    <p class="sous-titre">Nouvelle demande d’achat</p>

    <form method="post" action="/COLIS_SAE/public/departement/creer-devis.php" class="carte">

        <label>Objet du devis</label>
        <input type="text" name="objet" required>

        <label>Montant estimé (€)</label>
        <input type="number" step="0.01" name="montant_estime" required>

        <label>Fournisseur</label>
        <select name="fournisseur_id" required>
            <?php foreach ($fournisseurs as $f): ?>
                <option value="<?= $f["id_fournisseur"] ?>">
                    <?= $f["nom"] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Commentaire (optionnel)</label>
        <textarea name="commentaire"></textarea>

        <button type="submit" class="btn-action">
            📤 Envoyer au service financier
        </button>

    </form>

</main>

</body>
</html>