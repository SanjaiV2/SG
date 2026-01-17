<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du colis</title>
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-dashboard.css">
</head>

<body class="tableau-bord">

<aside class="barre-laterale">
    <div class="entete-barre">
        <img src="/COLIS_SAE/assets/img/logo-iutv.png" class="logo">
        <h2>Postal IUT</h2>
        <p>Détails colis</p>
    </div>

    <nav class="menu">
        <a href="/COLIS_SAE/public/postal_iut/postal-iut.php">📊 Dashboard</a>
        <a href="/COLIS_SAE/public/postal_iut/colis-recus.php">📥 Colis reçus</a>
        <a href="/COLIS_SAE/public/postal_iut/colis-remis.php">📤 Colis remis</a>
        <a href="/COLIS_SAE/public/postal_iut/recherche-colis.php">🔍 Recherche colis</a>


    </nav>
</aside>

<main class="contenu">

    <h1>📦 Détails du colis #<?= $colis["id_colis"] ?></h1>

    <div class="carte">
        <p><strong>N° suivi :</strong> <?= $colis["numero_suivi"] ?: "—" ?></p>
        <p><strong>Bon de commande :</strong> <?= $colis["numero_commande"] ?: "—" ?></p>
        <p><strong>Département :</strong> <?= $colis["departement"] ?: "Non identifié" ?></p>
        <p><strong>Date réception :</strong> <?= $colis["date_reception"] ?></p>
        <p><strong>Date retrait :</strong> <?= $colis["date_retrait"] ?: "—" ?></p>
        <p><strong>Statut :</strong> <?= $colis["statut"] ?></p>
        <p><strong>Commentaire :</strong> <?= $colis["commentaire"] ?: "—" ?></p>
    </div>

    <h2>📜 Historique</h2>

    <table class="tableau">
        <thead>
            <tr>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($historique as $h): ?>
            <tr>
                <td><?= $h["date_action"] ?></td>
                <td><?= $h["action"] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="/COLIS_SAE/public/postal_iut/colis-recus.php" class="btn-action">
        ⬅ Retour
    </a>

</main>

</body>
</html>