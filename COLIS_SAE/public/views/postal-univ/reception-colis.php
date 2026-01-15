<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réception des colis – Postal Université</title>
    <link rel="stylesheet" href="/COLIS_SAE/assets/css/style-dashboard.css">
</head>

<body class="tableau-bord">

<!-- SIDEBAR IDENTIQUE AU DASHBOARD -->
<aside class="barre-laterale">
    <div class="entete-barre">
        <img src="/COLIS_SAE/assets/img/logo-iutv.png" class="logo">
        <h2>Postal Université</h2>
        <p>Gestion des colis</p>
    </div>

    <nav class="menu">
        <a href="/COLIS_SAE/public/postal_univ/postal-univ.php">📊 Tableau de bord</a>
        <a class="actif" href="/COLIS_SAE/public/postal_univ/reception-colis.php">📦 Réception colis</a>
        <a href="/COLIS_SAE/public/postal_univ/colis.php">📋 Liste colis</a>
        <a href="/COLIS_SAE/public/postal_univ/non-identifies.php">❓ Non identifiés</a>
        <a href="/COLIS_SAE/public/postal_univ/historique.php">📜 Historique</a>
    </nav>
</aside>

<!-- CONTENU -->
<main class="contenu">

    <h1>📦 Réception d’un colis</h1>
    <p class="sous-titre">
        Enregistrer un colis reçu à l’université avant transfert vers l’IUT
    </p>

    <form method="post"
          action="/COLIS_SAE/public/postal_univ/reception-colis.php"
          enctype="multipart/form-data"
          class="carte">

        <label>Numéro de suivi</label>
        <input type="text" name="numero_suivi" required>

        <label>Numéro de bon de commande</label>
        <input type="text" name="numero_commande" required>

        <label>Photo de l’étiquette (optionnel)</label>
        <input type="file" name="photo_etiquette" accept="image/*">

        <p style="margin-top:15px; font-size:14px; color:#555;">
            👉 Le campus / IUT sera identifié automatiquement via le bon de commande.<br>
            👉 Si l’identification échoue, le colis sera marqué <strong>Non identifié</strong>.
        </p>

        <button type="submit" class="btn-action">
            ✅ Enregistrer le colis
        </button>

    </form>

</main>

</body>
</html>