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


    <?php
    $IDAch = $_SESSION['IDAch'];


    $sqlinsert = "SELECT * FROM cartebancaire WHERE IDAch = $IDAch";
    $res = mysqli_query($db_handle, $sqlinsert);
    $data = mysqli_fetch_assoc($res);
    if (!$data) {
        echo "error";
    }
    ?>

    <div class="container features">
        <div class="row">
            <div class="col-sm-4">
                <div>
                    <?php echo "Numéro de la carte: ", $data['numCarte']; ?></div>
                <div>
                    <?php echo "Type de paiement: ", $data['typePayement']; ?></div>
                <div>
                    <?php echo "Nom de la carte: ", $data['nomCarte']; ?></div>
                <div>
                    <?php echo "Date d'expiration: ", $data['dateExpi']; ?></div>
                <div>
                    <?php echo "Code de sécurité: ", $data['codeSecu']; ?></div>
            </div>
            <div class="col-sm-4">
                <img src="img/CB.png">

            </div>
        </div>
    </div>



    <?php include("config/footer.php"); ?>


</body>

</html>