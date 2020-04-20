<?php
session_start();
?>
<!DOCTYPE html>
<html lang="UTF-8">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>
    <div id="header">
        <h1 id="h1">Ebay ECE</h1>
        <h2 id="h2">La vente en ligne pour la communauté ECE Paris</h2>
    </div>

    <?php include("config/navig.php"); ?>

    <?php
    $database = 'ebayece';
    $db_handle = mysqli_connect('localhost', 'root', '', $database);

    if (!$db_handle) {
        echo 'Erreur de connexion: ' . mysqli_connect_error();
    }

    ?>


    <!------ Include the above in your HEAD tag ---------->

    <div class="container features">


        <div class="row">

            <div class="col" style="margin-top:-16px;">

                <div class="row">
                    <a href="panier.php" class="btn btn-secondary btn-block">Accéder à mon panier</a>
                </div>
                <div class="row">
                    <a href="infosbancaires.php" class="btn btn-secondary btn-block">Accéder à mes informations bancaires</a>
                </div>
                <div class="row">
                    <a href="inscriptionacheteur.php" class="btn btn-secondary btn-block">Modifier mes informations</a>
                </div>
                <div class="row">
                    <a href="connexion.php" class="btn btn-secondary btn-block">Se connecter avec un autre compte</a>
                </div>

            </div>
            <div style="margin-left:150px;" class="col">
                <h3><?php echo  $_SESSION['prenom'], ' ', $_SESSION['nom']; ?></h3>
                <div><?php echo $_SESSION['email']; ?></div>
                <div><?php echo $_SESSION['pays']; ?></div>
                <div><?php echo $_SESSION['ville']; ?></div>
                <div><?php echo $_SESSION['codePostal']; ?></div>
                <div><?php echo $_SESSION['adresse1']; ?></div>
                <div><?php echo $_SESSION['numeroTel']; ?></div>
            </div>


            <div class="col">
                <img src="img/account" style="height: 200px;">



            </div>
        </div>




    </div>
    </div>

    <?php include("config/footer.php"); ?>


</body>

</html>