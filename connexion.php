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

    <div  class="container features">
            <h3 class="feature-title">Connexion</h3>

            <input type="text" class="form-control" placeholder="Votre email :" addresse="">
            <input type="text" class="form-control" placeholder="Votre mot de passe :" MdP="">

            <input type="submit" class="btn btn-secondary btn-block" value="Se connecter" name="">  

            <br>

            <h3 class="feature-title">Inscription</h3>

            <input type="text" class="form-control" placeholder="Votre nom :" nom="">
            <input type="text" class="form-control" placeholder="Votre prénom :" prenom="">
            <input type="text" class="form-control" placeholder="Votre email :" email="">
            <input type="text" class="form-control" placeholder="Votre mot de passe :" MdP="">
            <input type="text" class="form-control" placeholder="Votre adresse :" addresse="">
            <input type="text" class="form-control" placeholder="Votre ville :" ville="">
            <input type="text" class="form-control" placeholder="Votre code postal :" codePost="">
            <input type="text" class="form-control" placeholder="Votre pays :" pays="">
            <input type="text" class="form-control" placeholder="Votre numero de téléphone :" num="">
            <input type="text" class="form-control" placeholder="Votre nom :" name="">


            <h6>S'inscrire en tant que :</h6>
                
                

                    <input type="radio" name="classe" value="acheteur"> Acheteur 

                    <br>

                  
                    <input type="radio" name="classe" value="vendeur"> Vendeur
                    <br>

                    <input type="submit" class="btn btn-secondary btn-block" value="S'inscrire" name="">  
        </div>

           
 
</body>

<footer  class="page-footer">
        <div  class="container">
            <div class="row">
                <div  class="col-lg-8 col-md-8 col-sm-12">
                    <h6  class="text-uppercase font-weight-bold">Information additionnelle</h6>
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