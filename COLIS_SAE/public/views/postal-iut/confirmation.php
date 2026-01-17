<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation des colis – Postal IUT</title>
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
        <a href="/COLIS_SAE/public/postal_iut/postal-iut.php">📊 Tableau de bord</a>
        <a class="actif" href="/COLIS_SAE/public/postal_iut/confirmation.php">✅ Confirmation</a>
        <a href="/COLIS_SAE/public/postal_iut/colis-recus.php">📥 Colis reçus</a>
        <a href="/COLIS_SAE/public/postal_iut/colis-remis.php">📤 Colis remis</a>
        <a href="/COLIS_SAE/public/postal_iut/recherche-colis.php">🔍 Recherche colis</a>
        <a href="/COLIS_SAE/public/postal_iut/colis-non-identifies.php">❓ Non identifiés</a>
    </nav>
</aside>

<!-- CONTENU -->
<main class="contenu">

    <h1>✅ Confirmation des colis</h1>
    <p class="sous-titre">
        Colis transférés par le service postal universitaire et en attente de confirmation à l’IUT
    </p>

    <table class="tableau">
        <thead>
            <tr>
                <th>ID</th>
                <th>N° suivi</th>
                <th>Bon de commande</th>
                <th>Département</th>
                <th>Date transfert</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        <?php if (empty($colis)): ?>
            <tr>
                <td colspan="6">Aucun colis à confirmer</td>
            </tr>
        <?php endif; ?>

        <?php foreach ($colis as $c): ?>
            <tr>
                <td>#<?= $c["id_colis"] ?></td>
                <td><?= $c["numero_suivi"] ?></td>
                <td><?= $c["numero_commande"] ?></td>
                <td><?= $c["departement"] ?: "—" ?></td>
                <td><?= $c["date_reception"] ?></td>
                <td>
                    <a class="btn-action"
                       href="/COLIS_SAE/public/postal_iut/confirmer-colis.php?id=<?= $c["id_colis"] ?>">
                        ✔️ Confirmer réception
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</main>

</body>
</html>