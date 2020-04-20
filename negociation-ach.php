<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

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

    <?php
    ?>
    <div class="container features">
        <div class="row">
        <div class ="col-lg-3 col-md-3 col-sm-12"> </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <form action="negociation-back.php" method="POST">
                    <br><br>
                    <h1> Proposez au vendeur un prix </h1>
                    <?php   $database = 'ebayece';
                            $db_handle = mysqli_connect('localhost', 'root', '', $database);
                            // check connection
                            if (!$db_handle) {
                                echo 'Connection error: ' . mysqli_connect_error();
                            }

                             $IDAch = $_SESSION['IDAch'];
                            $sql = "SELECT contreOffre , compteur FROM transaction WHERE IDAch = $IDAch  ";
                            $res = mysqli_query($db_handle, $sql);
                            $infos = mysqli_fetch_assoc($res);
                            mysqli_free_result($res);
                            
                            echo 'Le vendeur propose : '.$infos['contreOffre'].'.';
                            echo 'Vous avez fait '.$infos['compteur']. ' offre(s). Au bout de 5 offres, la négociation s\'arrête.'
                    ?>
                    <input type="text" id="prixprop" class="form-control" name="offre" placeholder="Prix propose">
                    <input type="submit" class="btn btn-secondary btn-block" value="Continuer" name="soumettreAch">
                    <input type="submit" class="btn btn-secondary btn-block" value="Valider l'offre" name="validerOffre" >
                    <input type="submit" class="btn btn-secondary btn-block" value="Arrêter la négociation" name="arreterOffre">

                </form>
                <div class="card-action right-align"></div>
            </div>
            <?php
        // }
            ?>
        </div>
    </div>


</body>

<?php include("config/footer.php"); ?>

</html>