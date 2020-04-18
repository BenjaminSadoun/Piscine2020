<?php
session_start();
?>

<!DOCTYPE html>
<html lang="UTF-8">

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Ebay ECE</title>
</head>

    <div id="header">
        <h1 id="h1">Ebay ECE</h1>
        <h2 id="h2">La vente en ligne pour la communauté ECE Paris</h2>
        
    </div>

    <?php include("config/navig.php"); ?>

    <?php
    $database = 'ebayece';
    $db_handle = mysqli_connect('localhost', 'root', ''); 
    $db_found = mysqli_select_db($db_handle, $database);
    // $numID = isset($_POST["numID"]) ? $_POST["numID"] : "";
  
    if (isset($_POST['supprimer'])) {
        if($db_found){
            $sql = "DELETE FROM item WHERE numID = $numID";
            $result = mysqli_query($db_handle, $sql); 
            echo "Suppression reussi. <br>";
        }
        else {
            echo "Base de données introuvable";
        } 
    }
        
    ?> 

    <?php include("config/footer.php"); ?>


</body>

</html>