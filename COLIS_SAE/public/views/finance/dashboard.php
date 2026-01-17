<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard – Service Financier</title>
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-dashboard.css">
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/finance/style-finance.css">
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
            <a class="actif" href="/COLIS_SAE/public/finance/finance.php">💰 Tableau de bord</a>
            <a href="/COLIS_SAE/public/finance/devis-a-verifier.php">📄 Devis à vérifier</a>
            <a href="/COLIS_SAE/public/finance/bons-commande.php">📚 Bons de commande</a>
            <a href="/COLIS_SAE/public/finance/budgets.php">🏛 Budgets</a>
            <a href="/COLIS_SAE/public/finance/alertes.php">⏰ Alertes</a>
        </nav>

        <div class="deconnexion">
            <a href="/COLIS_SAE/logout.php">🚪 Déconnexion</a>
        </div>
    </aside>

    <!-- CONTENU PRINCIPAL -->
    <main class="contenu">

        <h1>💰 Tableau de bord – Service Financier</h1>
        <p class="sous-titre">Suivi budgétaire et validation des devis</p>

        <!-- STATS -->
        <div class="cartes">
            <div class="carte">
                <h3>📄 Devis en attente</h3>
                <p class="valeur"><?= $stats["devis_attente"] ?></p>
            </div>

            <div class="carte">
                <h3>🧾 Bons de commande</h3>
                <p class="valeur"><?= $stats["bons_commande"] ?></p>
            </div>
        </div>

        <!-- BUDGETS -->
        <h2>🏛 Budgets des départements</h2>

        <table class="tableau">
            <thead>
                <tr>
                    <th>Département</th>
                    <th>Budget total</th>
                    <th>Budget utilisé</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($budgets as $b): ?>
                <tr>
                    <td><?= $b["nom"] ?></td>
                    <td><?= $b["budget_total"] ?> €</td>
                    <td><?= $b["budget_utilise"] ?> €</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- DEVIS -->
        <h2>📄 Devis à vérifier</h2>

        <table class="tableau">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Objet</th>
                    <th>Département</th>
                    <th>Montant</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($devis as $d): ?>
                <tr>
                    <td>#<?= $d["id_devis"] ?></td>
                    <td><?= $d["objet"] ?></td>
                    <td><?= $d["departement"] ?></td>
                    <td><?= $d["montant_estime"] ?> €</td>
                    <td>
                        <a class="btn-action" href="/COLIS_SAE/public/finance_iut/valider-devis.php?id=<?= $d["id_devis"] ?>">✔ Valider</a>
                        <a class="btn-danger" href="/COLIS_SAE/public/finance_iut/rejeter-devis.php?id=<?= $d["id_devis"] ?>">✖ Rejeter</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </main>

</body>
</html>