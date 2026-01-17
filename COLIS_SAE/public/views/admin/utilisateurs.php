<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Utilisateurs – Admin</title>
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-dashboard.css">
</head>

<body class="tableau-bord">

<aside class="barre-laterale">
    <div class="entete-barre">
        <img src="/COLIS_SAE/assets/img/logo-iutv.png" class="logo">
        <h2>Administrateur</h2>
        <p>Gestion du système</p>
    </div>

    <nav class="menu">
        <a href="/COLIS_SAE/public/admin/admin.php">📊 Tableau de bord</a>
        <a class="actif" href="/COLIS_SAE/public/admin/utilisateurs.php">👤 Utilisateurs</a>
        <a href="/COLIS_SAE/public/admin/departements.php">🏛 Départements</a>
        <a href="/COLIS_SAE/public/admin/fournisseurs.php">🏭 Fournisseurs</a>
        <a href="/COLIS_SAE/public/admin/historique.php">📜 Historique</a>
        <a href="/COLIS_SAE/public/admin/devis.php">🧾 Tous les devis</a>
        <a href="/COLIS_SAE/public/admin/colis.php">📦 Tous les colis</a>
    </nav>
</aside>

<main class="contenu">

<h1>👤 Gestion des utilisateurs</h1>

<table class="tableau">
<thead>
<tr>
    <th>Nom</th>
    <th>Email</th>
    <th>UID CAS</th>
    <th>Rôle</th>
    <th>Département</th>
    <th>Action</th>
</tr>
</thead>

<tbody>
<?php foreach ($utilisateurs as $u): ?>
<tr>
<form method="post" action="/COLIS_SAE/public/admin/update-utilisateur.php">
    <td><?= $u["fullName"] ?></td>
    <td><?= $u["email"] ?></td>
    <td><?= $u["uid_cas"] ?></td>

    <td>
        <select name="role_id">
            <?php foreach ($roles as $r): ?>
                <option value="<?= $r["id_role"] ?>"
                    <?= $r["id_role"] == $u["role_id"] ? "selected" : "" ?>>
                    <?= $r["libelle"] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </td>

    <td>
        <select name="departement_id">
            <option value="">—</option>
            <?php foreach ($departements as $d): ?>
                <option value="<?= $d["id_departement"] ?>"
                    <?= $d["id_departement"] == $u["departement_id"] ? "selected" : "" ?>>
                    <?= $d["nom"] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </td>

    <td>
        <input type="hidden" name="id_utilisateur" value="<?= $u["id_utilisateur"] ?>">
        <button class="btn-action">💾 Enregistrer</button>
    </td>
</form>
</tr>
<?php endforeach; ?>
</tbody>
</table>

</main>

</body>
</html>