<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Colis non identifiés – Postal Université</title>
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
        <a href="/COLIS_SAE/public/postal_univ/postal-univ.php">📊 Tableau de bord</a>
        <a href="/COLIS_SAE/public/postal_univ/reception-colis.php">📦 Réception colis</a>
        <a href="/COLIS_SAE/public/postal_univ/colis.php">📋 Liste colis</a>
        <a class="actif" href="/COLIS_SAE/public/postal_univ/non-identifies.php">❓ Non identifiés</a>
        <a href="/COLIS_SAE/public/postal_univ/historique.php">📜 Historique</a>
    </nav>
</aside>

<main class="contenu">

<h1>❓ Colis non identifiés</h1>
<p class="sous-titre">Colis sans correspondance ou information incomplète</p>

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

    <?php if (empty($colis)): ?>
        <tr>
            <td colspan="4"></td>
        </tr>
    <?php endif; ?>

    <?php foreach ($colis as $c): ?>
        <tr>
            <td>#<?= $c["id_colis"] ?></td>
            <td><?= $c["numero_suivi"] ?: "—" ?></td>
            <td><?= $c["date_reception"] ?></td>
            <td><?= $c["statut"] ?></td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>

</main>
</body>
</html>