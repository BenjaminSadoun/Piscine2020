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
    <title>Ebay ECE</title>
</head>

<body>
    <div id="header">
        <h1 id="h1">Ebay ECE</h1>
        <h2 id="h2">La vente en ligne pour la communauté ECE Paris</h2>
    </div>

    <?php include("config/navig.php"); ?>

    <form action = "inscriptionacheteur-back.php" method="POST">     
        <input type="text" class="form-control" placeholder="Votre nom :" name="nom">
        <input type="text" class="form-control" placeholder="Votre prénom :" name="prenom">
        <input type="email" class="form-control" placeholder="Votre email :" name="email">
        <input type="text" class="form-control" placeholder="Votre mot de passe :" name="mdp">
        <input type="text" class="form-control" placeholder="Votre adresse principale:" name="adresse1">
        <input type="text" class="form-control" placeholder="Votre adresse secondaire:" name="adresse2">
        <input type="text" class="form-control" placeholder="Votre ville :" name="ville">
        <input type="text" class="form-control" placeholder="Votre code postal :" name="codePostal">
        <input type="text" class="form-control" placeholder="Votre pays :" name="pays">
        <input type="text" class="form-control" placeholder="Votre numero de téléphone :" name="numeroTel">

        <input type="submit" class="btn btn-secondary btn-block" value="Continuer" name="button2" >
    </form>
    

    <?php include("config/footer.php"); ?>


</body>

</html>