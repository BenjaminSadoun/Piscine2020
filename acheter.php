<?php
session_start();
?>
<!DOCTYPE html>
<html lang="UTF-8">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title> Ebay ECE </title>
    <form action="acheter-back.php" method="post">
</head>

<body>
    <div id="header">
        <h1 id = "h1">Ebay ECE</h1>
        <h2 id = "h2">La vente en ligne pour la communauté ECE Paris</h2>
    </div>

    <?php include("config/navig.php"); ?>

    <div class="container features">
        <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12"></div>
            <h3 class="feature-title">Inscription/Connexion</h3>

            <input type="text" class="form-control" placeholder="Votre nom :" name="nom">
            <input type="text" class="form-control" placeholder="Votre prénom :" name="prenom">
            <input type="text" class="form-control" placeholder="Votre adresse email :" name="email">
            <input type="text" class="form-control" placeholder="Entrez un mot de passe :" name="mdp">
            <input type="text" class="form-control" placeholder="Votre adresse 1 :" name="adresse1">
            <input type="text" class="form-control" placeholder="Votre adresse 2 :" name="adresse2">
            <input type="text" class="form-control" placeholder="Votre ville :" name="ville">
            <input type="text" class="form-control" placeholder="Votre code postal :" name="codePost">
            <input type="text" class="form-control" placeholder="Votre pays :" name="pays">
            <input type="text" class="form-control" placeholder="Votre numero de téléphone :" name="num">
           
            <h3>Informations bancaires</h3>
            <input type="text" class="form-control" placeholder="Type de paiement :" name="typePay">
            <input type="text" class="form-control" placeholder="Votre numéro de carte  :" name="numCarte">
            <input type="text" class="form-control" placeholder="Nom affiché sur votre carte  :" name="nomCarte">
            <input type="text" class="form-control" placeholder="Date d'expiration de la carte :" name="dateExpi">
            <input type="text" class="form-control" placeholder="Code de sécurité :" name="codeSecu">

            <input type="submit" class="btn btn-secondary btn-block" value="Envoyer" name="button1">
        </div>
    </div>
</body>

<?php include("config/footer.php"); ?>

</html>