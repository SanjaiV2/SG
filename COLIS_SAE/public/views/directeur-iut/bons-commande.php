<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bons de commande – Directeur</title>
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-dashboard.css">
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-directeur.css">
</head>

<body class="tableau-bord">

    <!-- SIDEBAR (comme dashboard) -->
    <aside class="barre-laterale">
        <div class="entete-barre">
            <img src="/COLIS_SAE/assets/img/logo-iutv.png" class="logo">
            <h2>IUT Colis</h2>
            <p>Directeur</p>
        </div>

        <nav class="menu">
            <a href="/COLIS_SAE/public/directeur_iut/directeur.php">📊 Tableau de bord</a>
            <a href="/COLIS_SAE/public/directeur_iut/devis-a-signer.php">✍️ Devis à signer</a>
            <a class="actif" href="/COLIS_SAE/public/directeur_iut/bons-commande.php">📄 Bons de commande</a>
        </nav>
    </aside>

    <!-- CONTENU -->
    <main class="contenu">
        <h1>📄 Bons de commande</h1>
        <p class="sous-titre">Historique des bons de commande validés</p>

        <table class="tableau">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>N° commande</th>
                    <th>Objet</th>
                    <th>Montant</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bons as $b): ?>
                <tr>
                    <td>#<?= $b["id_bon_commande"] ?></td>
                    <td><?= $b["numero_commande"] ?></td>
                    <td><?= $b["objet"] ?: "—" ?></td>
                    <td><?= $b["montant_estime"] ? $b["montant_estime"]." €" : "—" ?></td>
                    <td><?= $b["date_commande"] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

</body>
</html>