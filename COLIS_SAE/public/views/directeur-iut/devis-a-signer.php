<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Devis à signer – Directeur</title>
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-dashboard.css">
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-directeur.css">
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
        <a class="actif" href="/COLIS_SAE/public/directeur_iut/devis-a-signer.php">✍️ Devis à signer</a>
        <a href="/COLIS_SAE/public/directeur_iut/bons-commande.php">📚 Bons de commande</a>
    </nav>
</aside>

<main class="contenu">

    <h1>✍️ Devis à signer</h1>
    <p class="sous-titre">Devis validés par le service financier</p>

    <table class="tableau">
        <thead>
            <tr>
                <th>ID</th>
                <th>Objet</th>
                <th>Montant estimé</th>
                <th>Date demande</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
        <?php if (empty($devis)): ?>
            <tr>
                <td colspan="5">Aucun devis à signer</td>
            </tr>
        <?php endif; ?>

        <?php foreach ($devis as $d): ?>
            <tr>
                <td>#<?= $d["id_devis"] ?></td>
                <td><?= $d["objet"] ?></td>
                <td><?= $d["montant_estime"] ?> €</td>
                <td><?= $d["date_demande"] ?></td>
                <td>
                    <a class="btn-action"
                       href="/COLIS_SAE/public/directeur_iut/signer-devis.php?id=<?= $d["id_devis"] ?>">
                        ✍️ Signer
                    </a>
                </td>
                <td>
                    <a class="btn-action" href="/COLIS_SAE/public/directeur_iut/voir-devis.php?id=<?= $d["id_devis"] ?>" target="_blank"> 📄 Voir devis</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</main>

</body>
</html>