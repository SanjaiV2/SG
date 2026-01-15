<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Colis reçus – Postal IUT</title>
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
        <a class="actif" href="/COLIS_SAE/public/postal_iut/colis-recus.php">📥 Colis reçus</a>
        <a href="/COLIS_SAE/public/postal_iut/colis-remis.php">📤 Colis remis</a>
        <a href="/COLIS_SAE/public/postal_iut/recherche-colis.php">🔍 Recherche colis</a>
        <a href="/COLIS_SAE/public/postal_iut/colis-non-identifies.php">❓ Non identifiés</a>
    </nav>
</aside>

<main class="contenu">

<h1>📥 Colis reçus à l’IUT</h1>
<p class="sous-titre">Colis transférés depuis l’université</p>

<table class="tableau">
    <thead>
        <tr>
            <th>ID</th>
            <th>N° suivi</th>
            <th>Département</th>
            <th>Date réception</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($colis as $c): ?>
        <tr>
            <td><a href="/COLIS_SAE/public/postal_iut/colis-details.php?id=<?= $c["id_colis"] ?>">#<?= $c["id_colis"] ?></a></td>
            <td><?= $c["numero_suivi"] ?></td>
            <td><?= $c["departement"] ?: "Non identifié" ?></td>
            <td><?= $c["date_reception"] ?></td>
            <td><?= $c["statut"] ?></td>
            <td>
                <a class="btn-action" href="/COLIS_SAE/public/postal_iut/retirer-colis.php?id=<?= $c["id_colis"] ?>">✔ Retiré</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</main>
</body>
</html>