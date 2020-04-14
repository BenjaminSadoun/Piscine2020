<!DOCTYPE html>
<html lang="UTF-8">
<head>
    <title> Ebay ECE </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div id="header">
        <h1 id = "h1">Ebay ECE</h1>
        <h2 id = "h2">La vente en ligne pour la communauté ECE Paris</h2>
    </div>

    <?php include("navig.php"); ?>

    <div class="container features">
        <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12"></div>
            <h3 class="feature-title">Inscription/Connexion</h3>

            <input type="text" class="form-control" placeholder="Votre nom :" nom="">
            <input type="text" class="form-control" placeholder="Votre prénom :" prenom="">
            <input type="text" class="form-control" placeholder="Votre adresse :" addresse="">
            <input type="text" class="form-control" placeholder="Votre ville :" ville="">
            <input type="text" class="form-control" placeholder="Votre code postal :" codePost="">
            <input type="text" class="form-control" placeholder="Votre pays :" pays="">
            <input type="text" class="form-control" placeholder="Votre numero de téléphone :" num="">
            <input type="text" class="form-control" placeholder="Votre nom :" name="">
            <h3>Informations bancaires</h3>
            <input type="text" class="form-control" placeholder="Type de payement :" typePay="">
            <input type="text" class="form-control" placeholder="Votre numéro de carte  :" numCarte="">
            <input type="text" class="form-control" placeholder="Nom affiché sur votre carte  :" nomCarte="">
            <input type="text" class="form-control" placeholder="Date d'expiration de la carte :" dateExpi="">
            <input type="text" class="form-control" placeholder="Code de sécurité :" codeSecu="">

            <input type="submit" class="btn btn-secondary btn-block" value="Envoyer" name="">
        </div>
    </div>
</body>
</html>