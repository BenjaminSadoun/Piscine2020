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
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card z-depth-0">
                    <div class="card-content center">

                        <?php if ($_SESSION['typeVente'] == 0) {
                        ?>
                            <div>enchere</div>
                        <?php } ?>

                        <?php if ($_SESSION['typeVente'] == 1) {

                            echo 'Vous avez conclu une négociation.';?>
                          
                        <?php } ?>

                        <?php if ($_SESSION['typeVente'] == 2) {
                        ?>
                            <form action="achat-back.php" method="POST">
                                <br><br>
                                <input type="radio" id="VISA" name="typePay" value="VISA">
                                <label for="VISA">VISA</label><br>
                                <input type="radio" id="Master Card" name="typePay" value="Master Card">
                                <label for="Master Card">Master Card</label><br>
                                <input type="radio" id="American Express" name="typePay" value="American Express">
                                <label for="American Express">American Express</label><br>
                                <input type="radio" id="Paypal" name="typePay" value="Paypal">
                                <label for="Paypal">Paypal</label><br>
                                <input type="text" class="form-control" placeholder="Numéro de la carte :" name="numCarte">
                                <input type="text" class="form-control" placeholder="Nom affiché sur la carte :" name="nomCarte">
                                <input type="date" class="form-control" placeholder="Date d'expiration de la carte :" name="dateExpi">
                                <input type="text" class="form-control" placeholder="Code de sécurité :" name="codeSecu">
                                <input type="submit" class="btn btn-secondary btn-block" value="Verification" name="verif">
                            </form>
                        <?php } ?>

                        <div class="card-action right-align"></div>
                    </div>
                </div>
            </div>

            <?php
            // }
            ?>
        </div>


</body>

<?php include("config/footer.php"); ?>

</html>