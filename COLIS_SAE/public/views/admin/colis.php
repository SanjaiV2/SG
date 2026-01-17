<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tous les colis – Admin</title>
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-dashboard.css">
</head>

<body class="tableau-bord">

<!-- SIDEBAR -->
<aside class="barre-laterale">
    <div class="entete-barre">
        <img src="/COLIS_SAE/assets/img/logo-iutv.png" class="logo">
        <h2>Administration</h2>
    </div>

    <nav class="menu">
        <a href="/COLIS_SAE/public/admin/admin.php">📊 Tableau de bord</a>
        <a href="/COLIS_SAE/public/admin/utilisateurs.php">👤 Utilisateurs</a>
        <a href="/COLIS_SAE/public/admin/departements.php">🏛 Départements</a>
        <a href="/COLIS_SAE/public/admin/fournisseurs.php">🏭 Fournisseurs</a>
        <a href="/COLIS_SAE/public/admin/historique.php">📜 Historique</a>
        <a href="/COLIS_SAE/public/admin/devis.php">🧾 Tous les devis</a>
        <a class="actif" href="/COLIS_SAE/public/admin/colis.php">📦 Tous les colis</a>
    </nav>
</aside>

<main class="contenu">

<h1>📮 Tous les colis</h1>
<p class="sous-titre">Vision globale et traçabilité complète des colis</p>

<!-- CARTES -->
<div class="cartes">
<?php foreach ($stats as $s): ?>
    <div class="carte">
        <h3><?= $s['statut'] ?></h3>
        <p class="valeur"><?= $s['total'] ?></p>
    </div>
<?php endforeach; ?>
</div>

<!-- RECHERCHE -->
<form method="get" class="carte">
    <input
        type="text"
        name="q"
        placeholder="Recherche : n° suivi, BC, département, statut"
        value="<?= htmlspecialchars($_GET['q'] ?? '') ?>"
    >
    <button class="btn-action">🔍 Rechercher</button>
</form>

<!-- TABLE -->
<table class="tableau">
<thead>
<tr>
    <th>ID</th>
    <th>N° suivi</th>
    <th>Bon de commande</th>
    <th>Département</th>
    <th>Statut</th>
    <th>Date réception</th>
    <th>Date retrait</th>
</tr>
</thead>
<tbody>

<?php if (empty($colis)): ?>
<tr>
    <td colspan="7">Aucun colis trouvé</td>
</tr>
<?php endif; ?>

<?php foreach ($colis as $c): ?>
<tr>
    <td>#<?= $c['id_colis'] ?></td>
    <td><?= $c['numero_suivi'] ?: '—' ?></td>
    <td><?= $c['numero_commande'] ?: '—' ?></td>
    <td><?= $c['departement'] ?: '—' ?></td>
    <td><?= $c['statut'] ?></td>
    <td><?= $c['date_reception'] ?: '—' ?></td>
    <td><?= $c['date_retrait'] ?: '—' ?></td>
</tr>
<?php endforeach; ?>

</tbody>
</table>

</main>
</body>
</html>