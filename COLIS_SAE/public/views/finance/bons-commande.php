<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bons de commande – Service Financier</title>
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-dashboard.css">
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/Finance/style-finance.css">
</head>

<body class="tableau-bord">

<!-- BARRE LATERALE -->
<aside class="barre-laterale">
    <div class="entete-barre">
        <img src="/COLIS_SAE/assets/img/logo-iutv.png" class="logo">
        <h2>IUT Colis</h2>
        <p>Service Financier</p>
    </div>

    <nav class="menu">
        <a href="/COLIS_SAE/public/finance/finance.php">📊 Tableau de bord</a>
        <a href="/COLIS_SAE/public/finance/devis-a-verifier.php">📄 Devis à vérifier</a>
        <a class="actif" href="/COLIS_SAE/public/finance/bons-commande.php">📚 Bons de commande</a>
        <a href="/COLIS_SAE/public/finance/budgets.php">🏛 Budgets</a>
    </nav>

    <div class="deconnexion">
        <a href="/COLIS_SAE/logout.php">🚪 Déconnexion</a>
    </div>
</aside>

<!-- CONTENU -->
<main class="contenu">

    <h1>📚 Bons de commande</h1>
    <p class="sous-titre">Historique des bons de commande validés</p>

    <table class="tableau">
        <thead>
            <tr>
                <th>N° commande</th>
                <th>Date</th>
                <th>Montant</th>
                <th>Statut</th>
            </tr>
        </thead>

        <tbody>
        <?php if (empty($bons)): ?>
            <tr>
                <td colspan="4">Aucun bon de commande</td>
            </tr>
        <?php endif; ?>

        <?php foreach ($bons as $b): ?>
            <tr>
                <td><?= $b["numero_commande"] ?></td>
                <td><?= $b["date_commande"] ?></td>
                <td><?= $b["montant_estime"] ?> €</td>
                <td><?= ucfirst($b["statut"]) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</main>

</body>
</html>