<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes bons de commande – Département</title>
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-dashboard.css">
</head>

<body class="tableau-bord">

<aside class="barre-laterale">
    <div class="entete-barre">
        <img src="/COLIS_SAE/assets/img/logo-iutv.png" class="logo">
        <h2>Département</h2>
        <p>Gestion des colis</p>
    </div>

    <nav class="menu">
        <a href="/COLIS_SAE/public/departement/departement.php">📊 Tableau de bord</a>
        <a href="/COLIS_SAE/public/departement/creer-devis.php">📝 Créer un devis</a>
        <a href="/COLIS_SAE/public/departement/mes-devis.php">📄 Mes devis</a>
        <a class="actif" href="/COLIS_SAE/public/departement/bons-commande.php">🧾 Mes bons de commande</a>
        <a href="/COLIS_SAE/public/departement/mes-colis.php">📦 Mes colis</a>
        <a href="/COLIS_SAE/public/departement/budget.php">🏛 Budget</a>
        <a href="/COLIS_SAE/public/departement/fournisseurs.php">🏭 Fournisseurs</a>
    </nav>
</aside>
<main class="contenu">

    <h1>🧾 Mes bons de commande</h1>
    <p class="sous-titre">Commandes validées et signées</p>

    <table class="tableau">
        <thead>
            <tr>
                <th>N° commande</th>
                <th>Date</th>
                <th>Fournisseur</th>
                <th>Montant</th>
                <th>Statut</th>
            </tr>
        </thead>

        <tbody>
        <?php if (empty($bons)): ?>
            <tr>
                <td colspan="5">Aucun bon de commande</td>
            </tr>
        <?php endif; ?>

        <?php foreach ($bons as $b): ?>
            <tr>
                <td><?= $b["numero_commande"] ?></td>
                <td><?= $b["date_commande"] ?></td>
                <td><?= $b["fournisseur"] ?></td>
                <td><?= $b["montant_estime"] ?> €</td>
                <td><?= ucfirst($b["statut"]) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</main>

</body>
</html>