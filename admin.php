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

    <?php include("navig.php"); ?>
    <div class="container features">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12"></div>
            <h3 class="feature-title">Connexion</h3>
        </div>
        <form action="adminback.php" method="post">
                <input type="text" class="form-control" placeholder="Votre login :" name="email">
                <input type="text" class="form-control" placeholder="Votre mot de passe :" name="MdP">
                <input type="submit" class="btn btn-secondary btn-block" type="submit" value="Envoyer" name="btnenvoyer">
            </form>

    </div>
</body>

<?php include("footer.php"); ?>

</footer>

</html>