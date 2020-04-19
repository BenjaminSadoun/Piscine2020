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
    $IDAch = $_SESSION['IDAch'];
    $database = 'ebayece';
    $db_handle = mysqli_connect('localhost', 'root', '', $database);
    $sql = "SELECT numID FROM transaction WHERE IDAch = $IDAch";
    $res = mysqli_query($db_handle, $sql);
    $ids = mysqli_fetch_all($res, MYSQLI_ASSOC);
    mysqli_free_result($res);
    $somme = 0;

    ?>
    <div class="container features">
        <h1> Panier </h1>
        <div class="row">
            <?php foreach ($ids as $id) { ?>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <?php $numID = $id['numID']; ?>
                            <?php
                            $sql2 = "SELECT nom, vignette, prixFinal FROM item WHERE numID = $numID";
                            $res2 = mysqli_query($db_handle, $sql2);
                            $items = mysqli_fetch_all($res2, MYSQLI_ASSOC);
                            mysqli_free_result($res2);
                            foreach ($items as $item) { ?>
                                <h6><?php echo htmlspecialchars($item['nom']); ?></h6>

                                <div><?php echo "<div id='img_div'>";
                                        echo "<img  class='img-fluid' src='img/imgitem/" . $item['vignette'] . "' >";
                                        echo "</div>";
                                        $somme += $item['prixFinal'];
                                        ?>
                                </div>
                                <div><?php echo htmlspecialchars($item['prixFinal']); ?></div>
                                <div><button><a href="panier.php?delete&numID=<?php echo $numID; ?>"
                             type="button" class="#" action="#" method="GET">Supprimer du panier</a></button>
                            </div>
                            <?php } ?>
                            
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php
            if (isset($_GET["delete"])) {
                if (isset($_GET["numID"])){
                $numID = $_GET["numID"];
                $sql3 = "DELETE FROM transaction where numID = $numID";
                $res3 = mysqli_query($db_handle, $sql3);
                mysqli_free_result($res3);
                echo '<script language="Javascript"> document.location.replace("panier.php"); </script>';
                ?>
                
                <?php
                }
                else{
                    echo "Votre panier est vide";
                }
            }
            $_SESSION['somme'] = $somme;
            ?>
            
            <div><button><a href="panier.php?numID=<?php echo $numID; ?>" type="button" class="#" action="#" 
                method="GET">Passer à la commande</a></button>
            <div><?php echo 'Total :' . $somme . '€' ?></div>
            <?php
            if (isset($_GET["numID"])) {
                echo '<script language="Javascript"> document.location.replace("achat.php"); </script>';
            }
            ?>
            
            </div>
        </div>
        <?php
        // }
        mysqli_close($db_handle);
        ?>
    </div>


</body>

<?php include("config/footer.php"); ?>

</html>