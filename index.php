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
        <h1 >Ebay ECE</h1>
        <h2 >La vente en ligne pour la communauté ECE Paris</h2>
    </div>

    <?php include("config/navig.php"); ?>
    <div  class="container features">
    <img style="opacity:1;display: block;margin-left: auto;
    margin-right: auto ;" src="img/logoeECE.png">
    <div class="overlay">
        <img  width="1000" style="transform:scale(2);"; » src="img/index.jpg">
    </div>
    </div>






    <?php include("config/footer.php"); ?>

</body>

</html>