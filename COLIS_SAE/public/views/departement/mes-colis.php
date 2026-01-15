<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes colis – Département</title>
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-dashboard.css">
</head>

<body class="tableau-bord">

<!-- SIDEBAR -->
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
        <a class="actif" href="/COLIS_SAE/public/departement/mes-colis.php">📦 Mes colis</a>
        <a href="/COLIS_SAE/public/departement/budget.php">🏛 Budget</a>
        <a href="/COLIS_SAE/public/departement/fournisseurs.php">🏭 Fournisseurs</a>
    </nav>
</aside>

<!-- CONTENU -->
<main class="contenu">

    <h1>📦 Mes colis</h1>
    <p class="sous-titre">Suivi des colis liés à vos commandes</p>

    <table class="tableau">
        <thead>
            <tr>
                <th>ID</th>
                <th>N° Suivi</th>
                <th>Bon de commande</th>
                <th>Date réception</th>
                <th>Statut</th>
            </tr>
        </thead>

        <tbody>
        <?php if (empty($colis)): ?>
            <tr>
                <td colspan="5">Aucun colis trouvé</td>
            </tr>
        <?php endif; ?>

        <?php foreach ($colis as $c): ?>
            <tr>
                <td>#<?= $c["id_colis"] ?></td>
                <td><?= $c["numero_suivi"] ?: "—" ?></td>
                <td><?= $c["numero_commande"] ?></td>
                <td><?= $c["date_reception"] ?: "—" ?></td>
                <td>
                    <?php
                    switch ($c["statut_id"]) {
                        case 5:
                            echo '<span class="badge badge-info">Arrivé à l’université</span>';
                            break;

                        case 6:
                            echo '<span class="badge badge-warning">En cours d’acheminement vers l’IUT</span>';
                            break;

                        case 7:
                            echo '<span class="badge badge-success">Arrivé à l’IUT</span>';
                            break;

                        case 4:
                            echo '<span class="badge badge-livre">Livré</span>';
                            break;

                        case 3:
                            echo '<span class="badge badge-danger">Non identifié</span>';
                            break;

                        case 1:
                            echo '<span class="badge badge-attente">En attente</span>';
                            break;

                        default:
                            echo '<span class="badge badge-autre">Statut inconnu</span>';
                    }
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</main>

</body>
</html>