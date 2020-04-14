<!DOCTYPE html>
<html lang="UTF-8">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Ebay ECE</title>
</head>

<body>

    <div id="header">
        <h1 id="h1">Ebay ECE</h1>
        <h2 id="h2">La vente en ligne pour la communauté ECE Paris</h2>
    </div>

    <?php include("navig.php"); ?>
    <div class="container features">
        <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12"></div>
            <h3 class="feature-title">Inscription/Connexion</h3>

            <input type="text" class="form-control" placeholder="Votre nom :" nom="">
            <input type="text" class="form-control" placeholder="Votre prénom :" prenom="">
            <input type="text" class="form-control" placeholder="Votre email :" email="">
            <input type="text" class="form-control" placeholder="Votre mot de passe :" MdP="">
           
           
            <h8>Choisissez une photo de profil(.jpg)</h8>
            <input type="file" accept="image/png, image/jpeg"class="form-control" placeholder="Votre photo de profil :" PdP="">
            <h8>Choisissez un fond d'écran(.jpg)</h8>
            <input type="file" accept="image/png, image/jpeg"class="form-control" placeholder="Votre fond d'écran :" fondEcran="">



            <input type="submit" class="btn btn-secondary btn-block" value="Envoyer" name="">
        </div>
    </div>
    
    </body>

    <?php include("footer.php"); ?>


</html>