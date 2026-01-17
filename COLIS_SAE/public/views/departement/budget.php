<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Budget – Département</title>
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
        <a href="departement.php">📊 Tableau de bord</a>
        <a href="creer-devis.php">📝 Créer un devis</a>
        <a href="mes-devis.php">📄 Mes devis</a>
        <a href="bons-commande.php">🧾 Mes bons de commande</a>
        <a href="mes-colis.php">📦 Mes colis</a>
        <a class="actif" href="budget.php">🏛 Budget</a>
        <a href="fournisseurs.php">🏭 Fournisseurs</a>
    </nav>
</aside>

<main class="contenu">

    <h1>🏛 Budget du département</h1>

    <div class="cartes">
        <div class="carte">
            <h3>Budget total</h3>
            <p class="valeur"><?= $budget["budget_total"] ?> €</p>
        </div>

        <div class="carte">
            <h3>Budget utilisé</h3>
            <p class="valeur"><?= $budget["budget_utilise"] ?> €</p>
        </div>

        <div class="carte">
            <h3>Budget restant</h3>
            <p class="valeur">
                <?= $budget["budget_total"] - $budget["budget_utilise"] ?> €
            </p>
        </div>
    </div>

</main>

</body>
</html>