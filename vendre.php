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
            <div class="col-lg-4 col-md-4 col-sm-12"></div>
            

            <form enctype="multipart/form-data" action="imagesVendeur.php" method="POST">
                <h3 class="feature-title">Personnaliser votre compte</h3>
                <br>

                <h8>Choisissez une photo de profil(.jpg)</h8>
                <input type="file" accept="image/png, image/jpeg" class="form-control" 
                        placeholder="Votre photo de profil :" name="photoProfil">
                <h8>Choisissez un fond d'écran(.jpg)</h8>
                <input type="file" accept="image/png, image/jpeg" class="form-control" 
                        placeholder="Votre fond d'écran :" name="fondEcran">
                <input type="submit" class="btn btn-secondary btn-block" value="Envoyer" name="button1">
            </form>

        <?php
            $database = 'ebayece';
            $db_handle = mysqli_connect('localhost', 'root', '', $database);

            $sql = "SELECT * FROM vendeur";
            $result = mysqli_query($db_handle, $sql);
            while ($rows = mysqli_fetch_array($result))
            {
                $photoProfil =$rows['photoProfil'];
                $fondEcran =$rows['fondEcran'];
        ?>

            <div class="img-block">
	        <img src="img/<?php echo $photoProfil; ?>" alt="" title="" class="img-responsive" />
            <img src="img/<?php echo $fondEcran; ?>" alt="" title="" class="img-responsive" />
	        </div>
	
	    <?php
	        }
	    ?>
        </div>
    </div>

</body>

<?php include("config/footer.php"); ?>


</html>