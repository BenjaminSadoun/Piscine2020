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
    <title>Feraille ou Trésor</title>
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
    $sql = 'SELECT numID, prixInitial, nom, vignette, description FROM item WHERE typeVente = 2';
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
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($info['nom']); ?></h6>
                            <div><?php echo htmlspecialchars($info['description']); ?></div>
                            <div><?php echo "<div id='img_div'>";
                                    echo "<img  class='img-fluid' src='img/imgitem/" . $info['vignette'] . "' >";
                                    echo "</div>";
                                    ?>
                            </div>
                            <div><?php echo htmlspecialchars($info['prixInitial']); ?></div>
                        
                            <div class="card-action right-align"></div>

                            <div><button><a href="achatimm.php?numID=<?php echo $info['numID']; ?>"
                             type="button" class="#" action="infosobjet.php" method="GET">Plus d'informations</a></button>
                            </div>
                        </div>
                    </div>
                </div>
        
    <?php  }
    ?>
        </div>
    </div>


    <?php
    if (isset($_GET["numID"])) {
        $numID = $_GET["numID"];
        $req = $bdd->prepare("SELECT numID, prixInitial, nom, vignette, typeVente, IDVend, description 
                                FROM item WHERE numID = :numID and typeVente = 2");
        $req->bindValue(':numID', $numID);
        $req->execute();
        // while ($objets = $req->fetch()) {
        $objets = $req->fetch();
        // $_SESSION['objets']=$objets;
        $_SESSION['numID'] = $objets['numID'];
        $_SESSION['prixInitial'] = $objets['prixInitial'];
        $_SESSION['nom'] = $objets['nom'];
        $_SESSION['vignette'] = $objets['vignette'];
        $_SESSION['description'] = $objets['description'];
        $_SESSION['typeVente'] = $objets['typeVente'];
        $_SESSION['IDVend'] = $objets['IDVend'];
        echo '<script language="Javascript"> document.location.replace("infosobjet.php"); </script>';
    ?>

        <!-- <input type="button" value="rafraichir" onclick="window.location.href='infosobjet.php'" /> -->
    <?php

    }
    ?>
    <br><br><br>

    <!-- <div class="container features">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($_SESSION['nom']); ?></h6>
                        <div><?php echo htmlspecialchars($_SESSION['description']); ?></div>
                        <div><?php echo "<div id='img_div'>";
                                echo "<img  class='img-fluid' src='img/imgitem/" . $_SESSION['vignette'] . "' >";
                                echo "</div>";
                                ?>
                        </div>
                        <div><?php echo htmlspecialchars($_SESSION['prixInitial']); ?></div>
                    </div>
                    <div class="card-action right-align"></div>
                </div>
            </div>
        </div>
    </div> -->
</body>

<?php include("config/footer.php"); ?>

</html>