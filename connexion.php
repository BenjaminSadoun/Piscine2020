<!DOCTYPE html>
<html lang="UTF-8">

<head>
    <title> Ebay ECE </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div id="header">
        <h1 id="h1">Ebay ECE</h1>
        <h2 id="h2">La vente en ligne pour la communauté ECE Paris</h2>
    </div>

    <?php include("navig.php"); ?>

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
            <br><br><br><br>
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
            <input type="text" class="form-control" placeholder="Votre mot de passe :" name="MdP">
            <input type="text" class="form-control" placeholder="Votre adresse :" name="adresse">
            <input type="text" class="form-control" placeholder="Votre ville :" name="ville">
            <input type="text" class="form-control" placeholder="Votre code postal :" name="codePost">
            <input type="text" class="form-control" placeholder="Votre pays :" name="pays">
            <input type="text" class="form-control" placeholder="Votre numero de téléphone :" name="num">
            <input type="submit" class="btn btn-secondary btn-block" value="S'inscrire" name="button">
        </form>
    </div>



</body>

<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <h6 class="text-uppercase font-weight-bold">Information additionnelle</h6>
                <p>
                    Ce site va permettre à certain utilisateurs d’acheter, d’enchérir ou de négocier un item, à
                    d'autres utilisateurs de
                    vendre leurs items ou au gérant d’administrer le site de commerce.
                </p>

            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <h6 class="text-uppercase font-weight-bold">Contact</h6>
                <p>
                    37, quai de Grenelle, 75015 Paris, France <br>
                    ebay.ece@gmail.com <br>
                    +33 01 02 03 04 05 <br>
                    +33 01 03 02 05 04
                </p>
            </div>
        </div>
        <div class="footer-copyright text-center">&copy; 2019 Copyright | Droit d'auteur: ebay.ece.fr</div>
    </div>
</footer>

</html>