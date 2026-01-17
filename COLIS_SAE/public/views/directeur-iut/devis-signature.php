<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Devis à signer</title>
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-dashboard.css">
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/Directeur/style-directeur.css">
</head>

<body class="tableau-bord">

<aside class="barre-laterale">
    <div class="entete-barre">
        <img src="/COLIS_SAE/assets/img/logo-iutv.png" class="logo">
        <h2>IUT Colis</h2>
        <p>Directeur</p>
    </div>

    <nav class="menu">
        <a href="/COLIS_SAE/public/directeur_iut/directeur.php">📊 Tableau de bord</a>
        <a class="actif" href="#">✍️ Devis à signer</a>
        <a href="/COLIS_SAE/public/directeur_iut/directeur.php#bons">📚 Bons de commande</a>
    </nav>
</aside>

<main class="contenu">

<h1>✍️ Devis à signer</h1>

<table class="tableau">
    <thead>
        <tr>
            <th>ID</th>
            <th>Objet</th>
            <th>Montant</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($devis as $d): ?>
        <tr>
            <td>#<?= $d["id_devis"] ?></td>
            <td><?= $d["objet"] ?></td>
            <td><?= $d["montant_estime"] ?> €</td>
            <td><?= $d["date_demande"] ?></td>
            <td>
                <a class="btn-action"
                   href="devis-signature.php?id=<?= $d["id_devis"] ?>">
                   ✍️ Signer
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</main>
</body>
</html>