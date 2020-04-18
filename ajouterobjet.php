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
    <form action="new.php" method="post">


    <div  class="container features">
            <h3 class="feature-title">Ajouter un objet</h3>

            <input type="text" class="form-control" placeholder="Nom de l'objet" nomObj="">
            <input type="text" class="form-control" placeholder="Desciption" descriptionObj="">
            <input type="file" class="form-control" placeholder="Video" videoObj="">

             

            <br>


            <h6>Catégories :</h6>
                
                

                    <input type="radio" name="classe" value="acheteur"> Ferraille ou Trésor 

                    <br>

                  
                    <input type="radio" name="classe" value="vendeur"> Bon pour le Musée
                    <br>
                    <input type="radio" name="classe" value="vendeur"> Accessoire VIP
                    <br>


                    <input type="submit" class="btn btn-secondary btn-block" value="Ajouter" name="">  
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