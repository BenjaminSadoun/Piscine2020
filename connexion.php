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

</head>

<body>
    <div id="header">
        <h1 id="h1">Ebay ECE</h1>
        <h2 id="h2">La vente en ligne pour la communauté ECE Paris</h2>
    </div>

    <?php include("config/navig.php"); ?>

    <div class="container features">
        <form action = "connexionback.php" method="POST">
            <h3 class="feature-title">Connexion</h3>
            <h6>Se connecter en tant que :</h6>
            <input type="radio" id="coacheteur" name="connexion" value="acheteur" checked>
            <label for ="coacheteur"> Acheteur </label>
            <br>
            <input type="radio" id="covendeur" name="connexion" value="vendeur" >
            <label for="covendeur"> Vendeur</label>
            <br>
            <input type="radio" id="coadmin" name="connexion" value="admin" >
            <label for="coadmin"> Admin</label>
            <br><br>
            <input type="text" class="form-control" placeholder="Votre email :" name="identifiant">
            <input type="text" class="form-control" placeholder="Votre mot de passe :" name="MdP">
            <input type="submit" class="btn btn-secondary btn-block" value="Se connecter" name="buttonconnexion">
            <br>
            <!-- r -->
            <br><br><br>
        </form>

        <form action = "inscriptionback.php" method="POST">
            <h3 class="feature-title">Inscription</h3>
            <h6>S'inscrire en tant que :</h6>
            <input type="radio" id="insacheteur" name="inscription" value="acheteur" checked>
            <label for ="insacheteur"> Acheteur </label>
            <br>
            <input type="radio" id="insvendeur" name="inscription" value="vendeur" >
            <label for="insvendeur"> Vendeur</label>
            <br><br>
            <input type="text" class="form-control" placeholder="Votre nom :" name="nom">
            <input type="text" class="form-control" placeholder="Votre prénom :" name="prenom">
            <input type="text" class="form-control" placeholder="Votre email :" name="email">
            <input type="text" class="form-control" placeholder="Votre mot de passe :" name="mdp">
            <input type="text" class="form-control" placeholder="Votre adresse principale:" name="adresse1">
            <input type="text" class="form-control" placeholder="Votre adresse secondaire:" name="adresse2">
            <input type="text" class="form-control" placeholder="Votre ville :" name="ville">
            <input type="text" class="form-control" placeholder="Votre code postal :" name="codePostal">
            <input type="text" class="form-control" placeholder="Votre pays :" name="pays">
            <input type="text" class="form-control" placeholder="Votre numero de téléphone :" name="numeroTel">
            <input type="submit" class="btn btn-secondary btn-block" value="S'inscrire" name="submit" >
        </form>
    </div>



</body>

<?php include("config/footer.php"); ?>

</html>