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

    <nav id="sayHi">

        <?php

       
        
        
        
            
        if(isset($_POST['submit'])){

        
            // create sql
            if($_POST['inscription'] == 'acheteur')
            {
                header('Location: inscriptionacheteur.php');
        
            }

            if($_POST['inscription']== 'vendeur')
            {
                header('Location: inscriptionvendeur.php');
            }
        }
           
    
    
         ?> </nav>

    <?php include("config/footer.php"); ?>


</body>

</html>