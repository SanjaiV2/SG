<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard – Service Postal IUT</title>
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-dashboard.css">
</head>

<body class="tableau-bord">

<!-- SIDEBAR -->
<aside class="barre-laterale">
    <div class="entete-barre">
        <img src="/COLIS_SAE/assets/img/logo-iutv.png" class="logo">
        <h2>Postal IUT</h2>
        <p>Gestion des colis</p>
    </div>

    <nav class="menu">
        <a class="actif" href="/COLIS_SAE/public/postal_iut/postal-iut.php">📊 Tableau de bord</a>
        <a href="/COLIS_SAE/public/postal_iut/confirmation.php">✅ Confirmation réception</a>
        <a href="/COLIS_SAE/public/postal_iut/colis-recus.php">📥 Colis reçus</a>
        <a href="/COLIS_SAE/public/postal_iut/colis-remis.php">📤 Colis remis</a>
        <a href="/COLIS_SAE/public/postal_iut/recherche-colis.php">🔍 Recherche colis</a>
        <a href="/COLIS_SAE/public/postal_iut/colis-non-identifies.php">❓ Non identifiés</a>
    </nav>
</aside>

<!-- CONTENU -->
<main class="contenu">

    <h1>📊 Tableau de bord – Service Postal IUT</h1>
    <p class="sous-titre">Vue d’ensemble des colis</p>

    <!-- CARTES -->
    <div class="cartes">
        <div class="carte">
            <h3>📦 Reçus à l’IUT</h3>
            <p class="valeur"><?= $stats["recus"] ?></p>
        </div>

        <div class="carte">
            <h3>⏳ En attente</h3>
            <p class="valeur"><?= $stats["en_attente"] ?></p>
        </div>

        <div class="carte">
            <h3>✔️ Retirés</h3>
            <p class="valeur"><?= $stats["retires"] ?></p>
        </div>

        <div class="carte">
            <h3>❓ Non identifiés</h3>
            <p class="valeur"><?= $stats["non_identifies"] ?></p>
        </div>
    </div>

    <!-- TABLE -->
    <h2>📋 Derniers colis reçus</h2>

    <table class="tableau">
        <thead>
            <tr>
                <th>ID</th>
                <th>N° suivi</th>
                <th>Département</th>
                <th>Date réception</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($colis as $c): ?>
            <tr>
                <td>#<?= $c["id_colis"] ?></td>
                <td><?= $c["numero_suivi"] ?></td>
                <td><?= $c["departement"] ?: "—" ?></td>
                <td><?= $c["date_reception"] ?></td>
                <td><?= $c["statut"] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>

</body>
</html>