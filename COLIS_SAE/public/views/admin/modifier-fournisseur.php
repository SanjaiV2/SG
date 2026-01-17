<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier fournisseur – Admin</title>
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

<main class="contenu">

<h1>✏️ Modifier le fournisseur</h1>

<form method="post" action="update-fournisseur.php" class="carte">

    <input type="hidden" name="id_fournisseur" value="<?= $fournisseur['id_fournisseur'] ?>">

    <label>Nom</label>
    <input type="text" name="nom" value="<?= htmlspecialchars($fournisseur['nom']) ?>" required>

    <label>Contact</label>
    <input type="text" name="contact_nom" value="<?= htmlspecialchars($fournisseur['contact_nom']) ?>">

    <label>Email</label>
    <input type="email" name="contact_email" value="<?= htmlspecialchars($fournisseur['contact_email']) ?>">

    <label>Téléphone</label>
    <input type="text" name="contact_telephone" value="<?= htmlspecialchars($fournisseur['contact_telephone']) ?>">

    <button class="btn-action">💾 Enregistrer</button>
    <a class="btn-danger" href="fournisseurs.php">Annuler</a>

</form>

</main>
</body>
</html>