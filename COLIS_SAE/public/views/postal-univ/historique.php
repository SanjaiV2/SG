<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Historique – Postal Université</title>
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
        <a href="/COLIS_SAE/public/postal_univ/non-identifies.php">❓ Non identifiés</a>
        <a class="actif" href="/COLIS_SAE/public/postal_univ/historique.php">📜 Historique</a>
    </nav>
</aside>

<main class="contenu">

<h1>📜 Historique des actions</h1>
<p class="sous-titre">Traçabilité complète des colis</p>

<table class="tableau">
    <thead>
        <tr>
            <th>Date</th>
            <th>ID Colis</th>
            <th>N° Suivi</th>
            <th>Action</th>
            <th>Utilisateur</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($historique as $h): ?>
        <tr>
            <td><?= $h["date_action"] ?></td>
            <td>#<?= $h["id_colis"] ?></td>
            <td><?= $h["numero_suivi"] ?: "—" ?></td>
            <td><?= $h["action"] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</main>

</body>
</html>