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

    <div class="container features">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <h3 class="feature-title"><a href="ferailletresor.php">Ferraille ou trésor</a></h3>
                <a href="ferailletresor.php">
                    <img src="img/ferraille.jpg" class="img-fluid">
                </a>
                <p>
                    Ici vous pouvez trouver des objets de type ferraille ou trésor.
                </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <h3 class="feature-title"><a href="musee.php">Bon pour le musée</a></h3>
                <a href="musee.php">
                    <img src="img/musée.jpg" class="img-fluid">
                </a>
                <p>
                    Ici vous pouvez trouver des objets de type bon pour le musée.
                </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <h3 class="feature-title"><a href="vip.php">Accessoire VIP</a></h3>
                <a href="vip.php">
                    <img src="img/accessoire.jpg" class="img-fluid">
                </a>
                <p>
                    Ici vous pouvez trouver des objets de type accessoire VIP.
                </p>
            </div>

            <script>
                $("div div div a").css("color", "#293133");
            </script>
        </div>
    </div>

    <?php include("config/footer.php"); ?>
    
</body>

</html>