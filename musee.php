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
    $database = 'ebayece';
    $db_handle = mysqli_connect('localhost', 'root', '', $database);
    try {
        $bdd = new PDO('mysql:host=localhost; dbname=ebayece', 'root', '');
    } catch (exception $e) {
        die('Erreur ' . $e->getMessage());
    }

    if (!$db_handle) {
        echo 'Erreur de connexion: ' . mysqli_connect_error();
    }
    $sql = 'SELECT numID, prixInitial,prixFinal, nom, vignette,description FROM item WHERE categorie = 1';
    $res = mysqli_query($db_handle, $sql);
    $infos = mysqli_fetch_all($res, MYSQLI_ASSOC);
    mysqli_free_result($res);
    mysqli_close($db_handle);
    //$numID = $infos['numID'];
    ?>

    <div class="container features">
        <div class="row">
            <?php foreach ($infos as $info) { ?>
                <div class="col-lg-4 col-md-4 col-sm-12">
                <p style="text-align:center;font-size:20px;" ><?php echo htmlspecialchars($info['nom']); ?></p>
                <p style="text-align:center;" > <?php echo htmlspecialchars($info['description']); ?></p>
                            <?php echo "<div id='img_div'>";
                                    echo "<img width=400px; height=300px class='img-fluid' src='img/imgitem/" . $info['vignette'] . "' >";
                                    echo "</div>";
                                    ?>

                           <p style="text-align:center;font-size:20px;" ><?php echo htmlspecialchars($info['prixInitial']); ?> €<p>


                            <a href="musee.php?numID=<?php echo $info['numID']; ?>"
                             class="btn btn-secondary btn-block" action="infosobjet.php" >Plus d'informations</a>
                </div>
        
    <?php  }
    ?>
        </div>
    </div>


    <?php
    if (isset($_GET["numID"])) {
        $numID = $_GET["numID"];
        $req = $bdd->prepare("SELECT numID, prixInitial, prixFinal, nom, vignette, IDVend, description 
                                FROM item WHERE numID = :numID and categorie = 1");
        $req->bindValue(':numID', $numID);
        $req->execute();
        // while ($objets = $req->fetch()) {
        $objets = $req->fetch();
        // $_SESSION['objets']=$objets;
        $_SESSION['numID'] = $objets['numID'];
        $_SESSION['prixInitial'] = $objets['prixInitial'];
        $_SESSION['prixFinal'] = $objets['prixFinal'];
        $_SESSION['nom'] = $objets['nom'];
        $_SESSION['vignette'] = $objets['vignette'];
        $_SESSION['description'] = $objets['description'];
        $_SESSION['IDVend'] = $objets['IDVend'];
        echo '<script language="Javascript"> document.location.replace("infosobjet.php"); </script>';
    ?>

        
    <?php

    }
    ?>
    <br><br><br>

    
</body>

<?php include("config/footer.php"); ?>

</html>