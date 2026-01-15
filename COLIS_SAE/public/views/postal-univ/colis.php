<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des colis – Postal Université</title>
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
        <a class="actif" href="/COLIS_SAE/public/postal_univ/colis.php">📋 Liste colis</a>
        <a href="/COLIS_SAE/public/postal_univ/non-identifies.php">❓ Non identifiés</a>
        <a href="/COLIS_SAE/public/postal_univ/historique.php">📜 Historique</a>
    </nav>
</aside>

<main class="contenu">

<h1>📋 Liste des colis reçus</h1>
<p class="sous-titre">Tous les colis réceptionnés par l’université</p>

<table class="tableau">
    <thead>
        <tr>
            <th>ID</th>
            <th>N° suivi</th>
            <th>N° bon de commande</th>
            <th>Campus / IUT</th>
            <th>Statut</th>
            <th>Date réception</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($colis as $c): ?>
        <tr>
            <td>#<?= $c["id_colis"] ?></td>
            <td><?= $c["numero_suivi"] ?: "—" ?></td>
            <td><?= $c["numero_commande"] ?></td>
            <td><?= $c["departement"] ?: "Non identifié" ?></td>
            <td><?= $c["statut"] ?></td>
            <td><?= $c["date_reception"] ?></td>
            <td>
            <?php if ($c["statut_id"] == 5): ?>
                <a class="btn-action"
                href="/COLIS_SAE/public/postal_univ/transferer-colis.php?id=<?= $c["id_colis"] ?>">
                    📤 Transférer vers l’IUT
                </a>
            <?php else: ?>
                —
            <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</main>
</body>
</html>