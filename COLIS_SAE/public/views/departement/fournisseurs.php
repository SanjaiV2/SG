<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fournisseurs – Département</title>
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-dashboard.css">
</head>

<body class="tableau-bord">

<aside class="barre-laterale">
    <div class="entete-barre">
        <img src="/COLIS_SAE/assets/img/logo-iutv.png" class="logo">
        <h2>Département</h2>
        <p>Gestion des colis</p>
    </div>

    <nav class="menu">
        <a href="/COLIS_SAE/public/departement/departement.php">📊 Tableau de bord</a>
        <a href="/COLIS_SAE/public/departement/creer-devis.php">📝 Créer un devis</a>
        <a href="/COLIS_SAE/public/departement/mes-devis.php">📄 Mes devis</a>
        <a href="/COLIS_SAE/public/departement/bons-commande.php">🧾 Mes bons de commande</a>
        <a href="/COLIS_SAE/public/departement/mes-colis.php">📦 Mes colis</a>
        <a href="/COLIS_SAE/public/departement/budget.php">🏛 Budget</a>
        <a class="actif" href="/COLIS_SAE/public/departement/fournisseurs.php">🏭 Fournisseurs</a>
    </nav>
</aside>

<main class="contenu">

    <h1>🏭 Fournisseurs autorisés</h1>
    <p class="sous-titre">Liste des partenaires auprès desquels vous pouvez commander</p>

    <table class="tableau">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Téléphone</th>
            </tr>
        </thead>
        <tbody>

        <?php if (empty($fournisseurs)): ?>
            <tr>
                <td colspan="5">Aucun fournisseur enregistré</td>
            </tr>
        <?php endif; ?>

        <?php foreach ($fournisseurs as $f): ?>
            <tr>
                <td>#<?= $f["id_fournisseur"] ?></td>
                <td><?= $f["nom"] ?></td>
                <td><?= $f["contact_nom"] ?: "—" ?></td>
                <td><?= $f["contact_email"] ?: "—" ?></td>
                <td><?= $f["contact_telephone"] ?: "—" ?></td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>

</main>

</body>
</html>