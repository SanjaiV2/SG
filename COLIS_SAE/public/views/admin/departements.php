<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Départements – Admin</title>
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-dashboard.css">
</head>

<body class="tableau-bord">

<aside class="barre-laterale">
    <div class="entete-barre">
        <img src="/COLIS_SAE/assets/img/logo-iutv.png" class="logo">
        <h2>Administration</h2>
        <p>Gestion du système</p>
    </div>

    <nav class="menu">
        <a href="/COLIS_SAE/public/admin/admin.php">📊 Tableau de bord</a>
        <a href="/COLIS_SAE/public/admin/utilisateurs.php">👤 Utilisateurs</a>
        <a class="actif" href="/COLIS_SAE/public/admin/departements.php">🏛 Départements</a>
        <a href="/COLIS_SAE/public/admin/fournisseurs.php">🏭 Fournisseurs</a>
        <a href="/COLIS_SAE/public/admin/historique.php">📜 Historique</a>
        <a href="/COLIS_SAE/public/admin/devis.php">🧾 Tous les devis</a>
        <a href="/COLIS_SAE/public/admin/colis.php">📦 Tous les colis</a>
    </nav>
</aside>

<main class="contenu">

<h1>🏛 Départements</h1>

<form method="post" action="ajouter-departement.php" class="carte">
    <h3>➕ Ajouter un département</h3>
    <input type="text" name="nom" placeholder="Nom du département" required>
    <input type="number" name="budget_total" placeholder="Budget total (€)" required>
    <button class="btn-action">Ajouter</button>
</form>

<table class="tableau">
<thead>
<tr>
    <th>Nom</th>
    <th>Budget total</th>
    <th>Budget utilisé</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>
<?php foreach ($departements as $d): ?>
<tr>
    <td><?= $d['nom'] ?></td>
    <td><?= $d['budget_total'] ?> €</td>
    <td><?= $d['budget_utilise'] ?> €</td>
    <td>
        <a href="modifier-departement.php?id=<?= $d['id_departement'] ?>">✏️</a>
        <a class="btn-danger" href="supprimer-departement.php?id=<?= $d['id_departement'] ?>">🗑</a>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

</main>
</body>
</html>