<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration – Fournisseurs</title>
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-dashboard.css">
</head>

<body class="tableau-bord">

<!-- SIDEBAR ADMIN -->
<aside class="barre-laterale">
    <div class="entete-barre">
        <img src="/COLIS_SAE/assets/img/logo-iutv.png" class="logo">
        <h2>Administration</h2>
        <p>Gestion du système</p>
    </div>

    <nav class="menu">
        <a href="/COLIS_SAE/public/admin/admin.php">📊 Tableau de bord</a>
        <a href="/COLIS_SAE/public/admin/utilisateurs.php">👤 Utilisateurs</a>
        <a href="/COLIS_SAE/public/admin/departements.php">🏛 Départements</a>
        <a class="actif" href="/COLIS_SAE/public/admin/fournisseurs.php">🏭 Fournisseurs</a>
        <a href="/COLIS_SAE/public/admin/historique.php">📜 Historique</a>
        <a href="/COLIS_SAE/public/admin/devis.php">🧾 Tous les devis</a>
        <a href="/COLIS_SAE/public/admin/colis.php">📦 Tous les colis</a>
    </nav>
</aside>

<!-- CONTENU -->
<main class="contenu">

<h1>🏭 Gestion des fournisseurs</h1>
<p class="sous-titre">Ajout, modification et suppression des fournisseurs</p>

<!-- FORMULAIRE AJOUT -->
<div class="carte">
    <h2>➕ Ajouter un fournisseur</h2>

    <form method="post" action="ajouter-fournisseur.php">
        <label>Nom</label>
        <input type="text" name="nom" required>

        <label>Nom du contact</label>
        <input type="text" name="contact_nom">

        <label>Email</label>
        <input type="email" name="contact_email">

        <label>Téléphone</label>
        <input type="text" name="contact_telephone">

        <button class="btn-action">Ajouter</button>
    </form>
</div>

<!-- LISTE FOURNISSEURS -->
<h2>📋 Liste des fournisseurs</h2>

<table class="tableau">
<thead>
<tr>
    <th>Nom</th>
    <th>Contact</th>
    <th>Email</th>
    <th>Téléphone</th>
    <th>Actions</th>
</tr>
</thead>

<tbody>
<?php if (empty($fournisseurs)): ?>
<tr>
    <td colspan="5">Aucun fournisseur</td>
</tr>
<?php endif; ?>

<?php foreach ($fournisseurs as $f): ?>
<tr>
    <td><?= htmlspecialchars($f['nom']) ?></td>
    <td><?= htmlspecialchars($f['contact_nom']) ?></td>
    <td><?= htmlspecialchars($f['contact_email']) ?></td>
    <td><?= htmlspecialchars($f['contact_telephone']) ?></td>
    <td>
        <a class="btn-action"
           href="modifier-fournisseur.php?id=<?= $f['id_fournisseur'] ?>">
           ✏️ Modifier
        </a>

  
    </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

</main>
</body>
</html>