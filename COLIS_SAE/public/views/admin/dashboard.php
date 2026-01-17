<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard – Administrateur</title>
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-dashboard.css">
</head>

<body class="tableau-bord">

<!-- SIDEBAR -->
<aside class="barre-laterale">
    <div class="entete-barre">
        <img src="/COLIS_SAE/assets/img/logo-iutv.png" class="logo">
        <h2>Administrateur</h2>
        <p>Gestion du système</p>
    </div>

    <nav class="menu">
        <a class="actif" href="/COLIS_SAE/public/admin/admin.php">📊 Tableau de bord</a>
        <a href="/COLIS_SAE/public/admin/utilisateurs.php">👤 Utilisateurs</a>
        <a href="/COLIS_SAE/public/admin/departements.php">🏛 Départements</a>
        <a href="/COLIS_SAE/public/admin/fournisseurs.php">🏭 Fournisseurs</a>
        <a href="/COLIS_SAE/public/admin/historique.php">📜 Historique</a>
        <a href="/COLIS_SAE/public/admin/devis.php">🧾 Tous les devis</a>
        <a href="/COLIS_SAE/public/admin/colis.php">📦 Tous les colis</a>
    </nav>
</aside>

<!-- CONTENU -->
<main class="contenu">

<h1>📊 Tableau de bord – Administrateur</h1>
<p class="sous-titre">Vue globale du système</p>

<!-- CARTES -->
<div class="cartes">
    <div class="carte">
        <h3>👤 Utilisateurs</h3>
        <p class="valeur"><?= $stats["utilisateurs"] ?></p>
    </div>

    <div class="carte">
        <h3>📄 Devis</h3>
        <p class="valeur"><?= $stats["devis"] ?></p>
    </div>

    <div class="carte">
        <h3>🧾 Bons de commande</h3>
        <p class="valeur"><?= $stats["bons"] ?></p>
    </div>

    <div class="carte">
        <h3>📦 Colis</h3>
        <p class="valeur"><?= $stats["colis"] ?></p>
    </div>
</div>

<!-- RÔLES -->
<h2>👥 Répartition des utilisateurs par rôle</h2>

<table class="tableau">
    <thead>
        <tr>
            <th>Rôle</th>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($roles as $r): ?>
        <tr>
            <td><?= ucfirst($r["libelle"]) ?></td>
            <td><?= $r["total"] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</main>

</body>
</html>