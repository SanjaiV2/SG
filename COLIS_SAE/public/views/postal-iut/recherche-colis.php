<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recherche colis – Postal IUT</title>
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-dashboard.css">
</head>

<body class="tableau-bord">

<aside class="barre-laterale">
    <div class="entete-barre">
        <img src="/COLIS_SAE/assets/img/logo-iutv.png" class="logo">
        <h2>Postal IUT</h2>
        <p>Recherche colis</p>
    </div>

    <nav class="menu">
        <a href="/COLIS_SAE/public/postal_iut/postal-iut.php">📊 Tableau de bord</a>
        <a href="/COLIS_SAE/public/postal_iut/confirmation.php">✅ Confirmation réception</a>
        <a href="/COLIS_SAE/public/postal_iut/colis-recus.php">📥 Colis reçus</a>
        <a href="/COLIS_SAE/public/postal_iut/colis-remis.php">📤 Colis remis</a>
        <a class="actif" href="/COLIS_SAE/public/postal_iut/recherche-colis.php">🔍 Recherche colis</a>
        <a href="/COLIS_SAE/public/postal_iut/colis-non-identifies.php">❓ Non identifiés</a>
    </nav>
</aside>

<main class="contenu">

<h1>🔍 Recherche de colis</h1>

<form method="get" class="filtre">
    <input type="text" name="q" placeholder="N° suivi, BC, département, ID colis"
           value="<?= $_GET["q"] ?? "" ?>">
    <button class="btn-action">Rechercher</button>
</form>

<table class="tableau">
<thead>
<tr>
    <th>ID</th>
    <th>N° suivi</th>
    <th>Bon de commande</th>
    <th>Département</th>
    <th>Date réception</th>
    <th>Statut</th>
</tr>
</thead>

<tbody>
<?php if (empty($resultats)): ?>
<tr>
    <td colspan="6">Aucun résultat</td>
</tr>
<?php endif; ?>

<?php foreach ($resultats as $c): ?>
<tr>
    <td>
        <a href="/COLIS_SAE/public/postal_iut/colis-details.php?id=<?= $c["id_colis"] ?>">
            #<?= $c["id_colis"] ?>
        </a>
    </td>
    <td><?= $c["numero_suivi"] ?></td>
    <td><?= $c["numero_commande"] ?: "—" ?></td>
    <td><?= $c["departement"] ?: "—" ?></td>
    <td><?= $c["date_reception"] ?></td>
    <td><?= $c["statut"] ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

</main>
</body>
</html>