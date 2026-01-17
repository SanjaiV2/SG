<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Devis à vérifier – Service Financier</title>
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
        <a class="actif" href="/COLIS_SAE/public/finance/devis-a-verifier.php">📄 Devis à vérifier</a>
        <a href="/COLIS_SAE/public/finance/bons-commande.php">📚 Bons de commande</a>
        <a href="/COLIS_SAE/public/finance/budgets.php">🏛 Budgets</a>
    </nav>
</aside>

<main class="contenu">

    <h1>📄 Devis à vérifier</h1>
    <p class="sous-titre">Devis soumis par les acteurs</p>

    <table class="tableau">
        <thead>
            <tr>
                <th>ID</th>
                <th>Objet</th>
                <th>Département</th>
                <th>Montant</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        <?php if (empty($devis)): ?>
            <tr>
                <td colspan="6">Aucun devis à vérifier</td>
            </tr>
        <?php endif; ?>

        <?php foreach ($devis as $d): ?>
            <tr>
                <td>#<?= $d["id_devis"] ?></td>
                <td><?= $d["objet"] ?></td>
                <td><?= $d["departement"] ?></td>
                <td><?= $d["montant_estime"] ?> €</td>
                <td><?= $d["date_demande"] ?></td>
                <td>
                    <a class="btn-action"
                       href="/COLIS_SAE/public/finance/valider-devis.php?id=<?= $d["id_devis"] ?>">
                        ✔ Valider
                    </a>

                    <a class="btn-danger"
                       href="/COLIS_SAE/public/finance/rejeter-devis.php?id=<?= $d["id_devis"] ?>">
                        ✖ Rejeter
                    </a>

                    <a class="btn-action"
                       href="/COLIS_SAE/public/finance/voir-devis.php?id=<?= $d["id_devis"] ?>"
                       target="_blank">
                        📄 Voir devis
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</main>

</body>
</html>