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

            <input type="text" class="form-control" placeholder="Nom de l'objet" name ="nom">
            <input type="text" class="form-control" placeholder="Description" name ="description">
            <input type="number" class="form-control" placeholder="Prix de l'Objet" name ="prixInitial">
            <input type="file" id="fileItem" class="form-control" placeholder="Media" name ="nommedia"
            accept=".mp4,.jpg, .jpeg, .png, .gif, .avi" multiple>

            <br>

            <h2>Catégories d'objet et type de vente</h2>
            <table>
                <tr>
                <td> <h4> Categorie d'objet    </h4> </td>
                <td><input type="radio" id="fot" name="categorie" value="fot" checked> 
                <label for ="fot"> Ferraille ou Trésor </label></td>
                <td><input type="radio" id="bplm" name="categorie" value="bplm"> 
                <label for ="bplm">Bon pour le Musée</label></td>
                <td><input type="radio" id="avip" name="categorie" value="avip">
                <label for ="avip">Accessoire VIP</label></td>
                </tr>  
                <tr>
                <td> <h4> Categorie de vente    </h4> </td>
                <td><input type="radio" id="enchere" name="typeVente" value="enchere"> 
                <label for ="enchere"> Enchere </label></td>
                <td><input type="radio" id="meilleuroffre" name="typeVente" value="meilleuroffre"> 
                <label for ="meilleuroffre"> Meilleur offre</label></td>
                <td><input type="radio" id="achatimmediat" name="typeVente" value="achatimmediat" checked> 
                <label for ="achatimmediat"> Achat immediat</label></td>
                </tr>                
            </table>
            <input type="submit" class="btn btn-secondary btn-block" value="Ajouter" name="submit">
            
        </form>
    </div>



</body>

<?php include("config/footer.php"); ?>

</html>