<?php
session_start();
?>

<!DOCTYPE html>
<html lang="UTF-8">

<head>
    <title> Ebay ECE </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div id="header">
        <h1 id="h1">Ebay ECE</h1>
        <h2 id="h2">La vente en ligne pour la communauté ECE Paris</h2>
    </div>

    <?php include("config/navig.php"); ?>

    <div class="container features">
        <form action="ajouterobjetback.php" method="POST">

            <h3 class="feature-title">Ajouter un objet</h3>

            <input type="text" class="form-control" placeholder="Nom de l'objet" nom="nomitem">
            <input type="text" class="form-control" placeholder="Description" nom="description">
            <input type="file" id="fileItem" class="form-control" placeholder="Media" nom="nommedia"
            accept=".mp4,.jpg, .jpeg, .png, .gif, .avi" multiple>

            <br>
            <h6>Catégories :</h6>
            <input type="radio" id="fot" name="categorie" value="1" checked> 
            <label for ="fot"> Ferraille ou Trésor </label>
            <br>
            <input type="radio" id="bplm" name="categorie" value="2"> 
            <label for ="bplm">Bon pour le Musée</label>
            <br>
            <input type="radio" id="avip" name="categorie" value="3"> 
            <label for ="avip">Accessoire VIP</label>
            <br>
            <input type="submit" class="btn btn-secondary btn-block" value="Ajouter" name="">
        </form>
    </div>



</body>

<?php include("config/footer.php"); ?>

</html>