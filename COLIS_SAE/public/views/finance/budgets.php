<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Budgets – Service Financier</title>
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-dashboard.css">
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/Finance/style-finance.css">
</head>

<body class="tableau-bord">

<aside class="barre-laterale">
    <div class="entete-barre">
        <img src="/COLIS_SAE/assets/img/logo-iutv.png" class="logo">
        <h2>IUT Colis</h2>
        <p>Service Financier</p>
    </div>

    <nav class="menu">
        <a href="/COLIS_SAE/public/finance/finance.php">📊 Tableau de bord</a>
        <a href="/COLIS_SAE/public/finance/devis-a-verifier.php">📄 Devis à vérifier</a>
        <a href="/COLIS_SAE/public/finance/bons-commande.php">📚 Bons de commande</a>
        <a class="actif" href="/COLIS_SAE/public/finance/budgets.php">🏛 Budgets</a>
    </nav>
</aside>

<main class="contenu">

    <h1>🏛 Budgets des départements</h1>
    <p class="sous-titre">Suivi budgétaire global</p>

    <table class="tableau">
        <thead>
            <tr>
                <th>Département</th>
                <th>Budget total (€)</th>
                <th>Budget utilisé (€)</th>
                <th>Budget restant (€)</th>
                <th>État</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($budgets as $b): ?>
            <tr>
                <td><?= $b["nom"] ?></td>
                <td><?= $b["budget_total"] ?></td>
                <td><?= $b["budget_utilise"] ?></td>
                <td><?= $b["budget_restant"] ?></td>
                <td>
                    <?php if ($b["budget_restant"] < 0): ?>
                        <span class="badge badge-danger">❌ Dépassé</span>
                    <?php else: ?>
                        <span class="badge badge-ok">✔ OK</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>

</body>
</html>