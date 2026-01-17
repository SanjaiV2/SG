<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Colis non identifiés – Postal IUT</title>
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-dashboard.css">
</head>

<body class="tableau-bord">

<aside class="barre-laterale">
    <div class="entete-barre">
        <img src="/COLIS_SAE/assets/img/logo-iutv.png" class="logo">
        <h2>Postal IUT</h2>
        <p>Gestion des colis</p>
    </div>

    <nav class="menu">
        <a href="/COLIS_SAE/public/postal_iut/postal-iut.php">📊 Tableau de bord</a>
        <a href="/COLIS_SAE/public/postal_iut/confirmation.php">✅ Confirmation réception</a>
        <a href="/COLIS_SAE/public/postal_iut/colis-recus.php">📥 Colis reçus</a>
        <a href="/COLIS_SAE/public/postal_iut/colis-remis.php">📤 Colis remis</a>
        <a href="/COLIS_SAE/public/postal_iut/recherche-colis.php">🔍 Recherche colis</a>
        <a class="actif" href="/COLIS_SAE/public/postal_iut/colis-non-identifies.php">❓ Non identifiés</a>
    </nav>
</aside>

<main class="contenu">

<h1>❓ Colis non identifiés</h1>
<p class="sous-titre">Colis reçus sans destinataire identifié</p>

<table class="tableau">
    <thead>
        <tr>
            <th>ID</th>
            <th>N° suivi</th>
            <th>Date réception</th>
            <th>Commentaire</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($colis)): ?>
            <tr>
                <td colspan="4">Aucun colis non identifié</td>
            </tr>
        <?php endif; ?>

        <?php foreach ($colis as $c): ?>
        <tr>
            <td>#<?= $c["id_colis"] ?></td>
            <td><?= $c["numero_suivi"] ?: "—" ?></td>
            <td><?= $c["date_reception"] ?></td>
            <td><?= $c["commentaire"] ?: "—" ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</main>
</body>
</html>