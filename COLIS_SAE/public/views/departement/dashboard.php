<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Département</title>
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
        <a class="actif" href="/COLIS_SAE/public/departement/departement.php">📊 Tableau de bord</a>
        <a href="/COLIS_SAE/public/departement/creer-devis.php">📝 Créer un devis</a>
        <a href="/COLIS_SAE/public/departement/mes-devis.php">📄 Mes devis</a>
        <a href="/COLIS_SAE/public/departement/bons-commande.php">🧾 Mes bons de commande</a>
        <a href="/COLIS_SAE/public/departement/mes-colis.php">📦 Mes colis</a>
        <a href="/COLIS_SAE/public/departement/budget.php">🏛 Budget</a>
        <a href="/COLIS_SAE/public/departement/fournisseurs.php">🏭 Fournisseurs</a>
    </nav>
</aside>

<main class="contenu">

    <h1>📊 Tableau de bord – Département</h1>
    <p class="sous-titre">Vue d’ensemble de vos colis</p>

    <div class="cartes">
        <div class="carte">
            <h3>📦 Colis reçus</h3>
            <p class="valeur"><?= $stats["colis_total"] ?></p>
        </div>

        <div class="carte">
            <h3>⏳ En attente</h3>
            <p class="valeur"><?= $stats["en_attente"] ?></p>
        </div>

        <div class="carte">
            <h3>✔️ Retirés</h3>
            <p class="valeur"><?= $stats["retire"] ?></p>
        </div>

        <div class="carte">
            <h3>💰 Budget restant</h3>
            <p class="valeur">
                <?= $budget["budget_total"] - $budget["budget_utilise"] ?> €
            </p>
        </div>
    </div>

    <h2>📋 Derniers colis</h2>

    <table class="tableau">
        <thead>
            <tr>
                <th>ID</th>
                <th>N° Suivi</th>
                <th>Date réception</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($colis as $c): ?>
            <tr>
                <td>#<?= $c["id_colis"] ?></td>
                <td><?= $c["numero_suivi"] ?></td>
                <td><?= $c["date_reception"] ?></td>
                <td><?= $c["statut_id"] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>

</body>
</html>