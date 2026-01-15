<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Service Postal Université</title>
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-dashboard.css">
</head>

<body class="tableau-bord">

<aside class="barre-laterale">
    <div class="entete-barre">
        <img src="/COLIS_SAE/assets/img/logo-iutv.png" class="logo">
        <h2>Postal Université</h2>
        <p>Gestion des colis</p>
    </div>

    <nav class="menu">
        <a class="actif" href="/COLIS_SAE/public/postal_univ/postal-univ.php">📊 Tableau de bord</a>
        <a href="/COLIS_SAE/public/postal_univ/reception-colis.php">📦 Réception colis</a>
        <a href="/COLIS_SAE/public/postal_univ/colis.php">📋 Liste colis</a>
        <a href="/COLIS_SAE/public/postal_univ/non-identifies.php">❓ Non identifiés</a>
        <a href="/COLIS_SAE/public/postal_univ/historique.php">📜 Historique</a>
    </nav>
</aside>

<main class="contenu">

<h1>📊 Tableau de bord – Postal Université</h1>

<div class="cartes">
    <div class="carte">
        <h3>📦 Colis reçus</h3>
        <p class="valeur"><?= $stats["recus"] ?></p>
    </div>

    <div class="carte">
        <h3>📤 À transférer</h3>
        <p class="valeur"><?= $stats["a_transferer"] ?></p>
    </div>

    <div class="carte">
        <h3>✔️ Transférés</h3>
        <p class="valeur"><?= $stats["transferes"] ?></p>
    </div>

    <div class="carte">
        <h3>❓ Non identifiés</h3>
        <p class="valeur"><?= $stats["non_identifies"] ?></p>
    </div>
</div>

<h2>📋 Derniers colis reçus</h2>

<table class="tableau">
<thead>
<tr>
    <th>ID</th>
    <th>N° suivi</th>
    <th>Date réception</th>
    <th>Statut</th>
</tr>
</thead>
<tbody>
<?php foreach ($colis_recents as $c): ?>
<tr>
    <td>#<?= $c["id_colis"] ?></td>
    <td><?= $c["numero_suivi"] ?></td>
    <td><?= $c["date_reception"] ?></td>
    <td><?= $c["statut"] ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

</main>
</body>
</html>