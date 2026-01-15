<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes devis – Département</title>
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
        <a class="actif" href="/COLIS_SAE/public/departement/mes-devis.php">📄 Mes devis</a>
        <a href="/COLIS_SAE/public/departement/bons-commande.php">🧾 Mes bons de commande</a>
        <a href="/COLIS_SAE/public/departement/mes-colis.php">📦 Mes colis</a>
        <a href="/COLIS_SAE/public/departement/budget.php">🏛 Budget</a>
        <a href="/COLIS_SAE/public/departement/fournisseurs.php">🏭 Fournisseurs</a>
    </nav>
</aside>

<main class="contenu">

    <h1>📄 Mes devis</h1>
    <p class="sous-titre">Historique de vos demandes d’achat</p>

    <table class="tableau">
        <thead>
            <tr>
                <th>ID</th>
                <th>Objet</th>
                <th>Montant</th>
                <th>Date</th>
                <th>Statut</th>
            </tr>
        </thead>

        <tbody>
        <?php if (empty($devis)): ?>
            <tr>
                <td colspan="5">Aucun devis créé</td>
            </tr>
        <?php endif; ?>

        <?php foreach ($devis as $d): ?>
            <tr>
                <td>#<?= $d["id_devis"] ?></td>
                <td><?= $d["objet"] ?></td>
                <td><?= $d["montant_estime"] ?> €</td>
                <td><?= $d["date_demande"] ?></td>
                <td>
                    <?php if ($d["statut"] === "en_attente"): ?>
                        ⏳ En attente finance
                    <?php elseif ($d["statut"] === "valide_finance"): ?>
                        ✔️ Validé finance
                    <?php elseif ($d["statut"] === "rejete_finance"): ?>
                        ❌ Rejeté finance
                    <?php elseif ($d["statut"] === "signe_directeur"): ?>
                        🧾 Bon de commande créé
                    <?php else: ?>
                        <?= $d["statut"] ?>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</main>

</body>
</html>