<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tous les devis – Admin</title>
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
        <a class="actif" href="/COLIS_SAE/public/admin/devis.php">🧾 Tous les devis</a>
        <a href="/COLIS_SAE/public/admin/colis.php">📦 Tous les colis</a>
    </nav>
</aside>

<main class="contenu">

<h1>🧾 Tous les devis</h1>
<p class="sous-titre">Vue globale de l’ensemble des devis du système</p>

<!-- CARTES STATS -->
<div class="cartes">
<?php foreach ($stats as $s): ?>
    <div class="carte">
        <h3><?= ucfirst(str_replace('_', ' ', $s['statut'])) ?></h3>
        <p class="valeur"><?= $s['total'] ?></p>
    </div>
<?php endforeach; ?>
</div>

<!-- RECHERCHE -->
<form method="get" class="carte">
    <input 
        type="text" 
        name="q" 
        placeholder="Rechercher un devis (objet, département, fournisseur, statut)"
        value="<?= htmlspecialchars($_GET['q'] ?? '') ?>"
    >
    <button class="btn-action">🔍 Rechercher</button>
</form>

<!-- TABLE -->
<table class="tableau">
<thead>
<tr>
    <th>ID</th>
    <th>Objet</th>
    <th>Département</th>
    <th>Fournisseur</th>
    <th>Montant</th>
    <th>Statut</th>
    <th>Date</th>
</tr>
</thead>
<tbody>

<?php if (empty($devis)): ?>
<tr>
    <td colspan="7">Aucun devis trouvé</td>
</tr>
<?php endif; ?>

<?php foreach ($devis as $d): ?>
<tr>
    <td>#<?= $d['id_devis'] ?></td>
    <td><?= htmlspecialchars($d['objet']) ?></td>
    <td><?= $d['departement'] ?? '—' ?></td>
    <td><?= $d['fournisseur'] ?? '—' ?></td>
    <td><?= $d['montant_estime'] ?> €</td>
    <td><?= ucfirst(str_replace('_', ' ', $d['statut'])) ?></td>
    <td><?= $d['date_demande'] ?></td>
</tr>
<?php endforeach; ?>

</tbody>
</table>

</main>
</body>
</html>