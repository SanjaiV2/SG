<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord – Directeur</title>
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-dashboard.css">
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/Directeur/style-directeur.css">
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/Directeur/style-directeur-signer.css">


</head>

<body class="tableau-bord">

<!-- SIDEBAR -->
<aside class="barre-laterale">
    <div class="entete-barre">
        <img src="/COLIS_SAE/assets/img/logo-iutv.png" class="logo">

        <h2>IUT Colis</h2>
        <p>Directeur</p>
    </div>

    <nav class="menu">
        <a class="actif" href="/COLIS_SAE/public/directeur_iut/directeur.php">📊 Tableau de bord</a>
        <a href="/COLIS_SAE/public/directeur_iut/devis-a-signer.php">✍️ Devis à signer</a>
        <a href="/COLIS_SAE/public/directeur_iut/bons-commande.php">📚 Bons de commande</a>
    </nav>

    <div class="deconnexion">
        <a href="/COLIS_SAE/logout.php">🚪 Déconnexion</a>
    </div>
</aside>

<!-- CONTENU -->
<main class="contenu">

    <h1> Tableau de bord – Directeur</h1>
    <p class="sous-titre">Validation et suivi des décisions financières</p>

    <!-- STATS -->
    <div class="cartes">
        <div class="carte">
            <h3>📄 Devis à signer</h3>
            <p class="valeur"><?= $stats["devis_attente"] ?></p>
        </div>

        <div class="carte">
            <h3>🧾 Bons de commande signés</h3>
            <p class="valeur"><?= $stats["bc_signes"] ?></p>
        </div>
    </div>

    <!-- DEVIS -->
    <h2 id="devis">✍️ Devis validés par le service financier</h2>

    <table class="tableau">
        <thead>
            <tr>
                <th>ID</th>
                <th>Objet</th>
                <th>Montant</th>
                <th>Date demande</th>
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
                    <a class="btn-action" href="/COLIS_SAE/public/directeur_iut/signer-devis.php?id=<?= $d["id_devis"] ?>">✍️ Signer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- HISTORIQUE -->
    <h2 id="bons">📚 Historique des bons de commande</h2>

    <table class="tableau">
        <thead>
            <tr>
                <th>ID</th>
                <th>N° commande</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bons as $b): ?>
            <tr>
                <td>#<?= $b["id_bon_commande"] ?></td>
                <td><?= $b["numero_commande"] ?></td>
                <td><?= $b["date_commande"] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>

</body>
</html>