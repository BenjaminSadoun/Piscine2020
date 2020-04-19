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
  
    <?php
    $database = 'ebayece';
    $db_handle = mysqli_connect('localhost', 'root', '', $database);

    if (!$db_handle) {
        echo 'Erreur de connexion: ' . mysqli_connect_error();
    }

    ?>
    <div class="overlay">

        <?php echo "<div id='img_div'>";
        echo "<img width='1579px'; height='750px'; src='img/" . $_SESSION['fondEcran'] . "'>";
        echo "</div>"; ?>

    </div>
    <div id="header">
        <h1>Ebay ECE</h1>
        <h2>La vente en ligne pour la communauté ECE Paris</h2>
    </div>

    <?php include("config/navig.php"); ?>



    <div class="container features">



        <div class="row">

            <div class="col-sm-4">

                <div>
                    <a href="catalogue.php"class="btn btn-secondary btn-block">Accéder à mes ventes</a>
                </div>
                <div>
                    <a href="modifphoto.php" class="btn btn-secondary btn-block">Modifier mes photos</a>
                </div>
                <div>
                    <a href="modifinfovendeur.php" class="btn btn-secondary btn-block">Modifier mes informations</a>
                </div>
                <div>
                    <a href="connexion.php" class="btn btn-secondary btn-block">Se connecter avec un autre compte</a>
                </div>

            </div>
            <div class="col-sm-4">
                <h3><?php echo  $_SESSION['prenom'], ' ', $_SESSION['nom']; ?></h3>
                <div><?php echo $_SESSION['email']; ?></div>
            </div>



            <div class="col-sm-4">
                <?php if ($_SESSION['photoProfil'] == '') {
                    echo "<div id='img_div'>";
                    echo "<img  class='img-fluid' src='img/account.png' ";
                    echo "</div>";
                } else {
                ?>
                    <div><?php
                            echo "<img  width='300px'; height='200'; src='img/" . $_SESSION['photoProfil'] . "' >";
                            echo "</div>";
                            ?> <?php } ?>


                    <!--   <p class="text small">
                                                <a> Charger une photo</a>
                                                <div class="divider">
                                                        <input href = "#"  type="file">
                                                        </div> -->


                    </div>
            </div>
        </div>




    </div>




    <?php include("config/footer.php"); ?>


</body>

</html>