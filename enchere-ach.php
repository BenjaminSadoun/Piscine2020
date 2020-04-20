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
    <div class="container features">
        <form action="enchere-ach-back.php" method="POST">
            <h3 class="feature-title">Renseignez votre prix</h3>
            <input type="number" class="form-control" placeholder="Fixez votre prix" name ="offre">
            <input type="submit" class="btn btn-secondary btn-block" value="Valider" name="submit">
        </form>
    </div>

    <?php include("config/navig.php"); ?>


</body>

<?php include("config/footer.php"); ?>


</html>