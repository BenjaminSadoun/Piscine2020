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
    ?>
    <div class="container features">
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
                        <?php $numID = $_SESSION['numID']; ?>
                        <?php $prixInitial = $_SESSION['prixInitial']; ?>
                        <?php $IDAch = isset($_SESSION['IDAch']) ? $_SESSION['IDAch']:""?>
                        <?php $IDVend = $_SESSION['IDVend']; ?>

                        
                        <?php 

                        if(!isset($_SESSION['IDAch']) && !isset($_SESSION['IDVend']))
                        {
                            ?>
                            <p> Vous devez vous connecter pour acceder aux informations de l'objet </p>
                            <?php
                        } 
                                $database = 'ebayece';
                                $db_handle = mysqli_connect('localhost', 'root', '', $database);
                                // check connection
                                if (!$db_handle) {
                                    echo 'Connection error: ' . mysqli_connect_error();
                                }
                        //     $req = "SELECT typeVente FROM item WHERE numID = $numID ";
                        //     $result = mysqli_query($db_handle, $req);
                        //     $type = mysqli_fetch_assoc($result);
                        //     mysqli_free_result($result);
                        //     $typeVente = $type['typeVente'];
                        //   $_SESSION['typeVente']=$typeVente;
                        ?>
                        <?php if ($_SESSION['typeVente'] == 0) {
                        
                        if(!isset($_SESSION['IDAch']) && !isset($_SESSION['IDVend']))
                        {
                        ?>
                            
                            <div><button><a href="infosobjet.php?numID=<?php echo $numID; ?>"
                             type="button" class="#" action="infosobjet.php" method="GET">
                             Encherir sur l'objet</a></button>
                            </div>
                            <?php
                            } 
                         } ?>

                        <?php if ($_SESSION['typeVente'] == 1) {
                             if(!isset($_SESSION['IDAch']) && !isset($_SESSION['IDVend']))
                             {
                        ?>
                            <div><button><a href="infosobjet.php?numID=<?php echo $numID; ?>" 
                            type="button" class="#" action="infosobjet.php" method="GET">
                            Proposer une offre</a></button>
                            </div>
                            <?php
                        } 
                             } ?>

                        <?php if ($_SESSION['typeVente'] == 2) {
                             if(!isset($_SESSION['IDAch']) && !isset($_SESSION['IDVend']))
                             {
                        ?>
                            <div><button><a href="infosobjet.php?numID=<?php echo $numID; ?>"
                             type="button" class="#" action="infosobjet.php" method="GET">
                             Acheter cet objet maintenant</a></button>
                            </div>
                            <?php
                             } 
                            
                         } ?>

                        <?php
                        $database = 'ebayece';
                        $db_handle = mysqli_connect('localhost', 'root', '', $database);
                        if (!$db_handle) {
                            echo 'Connection error: ' . mysqli_connect_error();
                        }
                        if (isset($_GET["numID"])) {
                            if( $_SESSION['typeVente'] == 0){
                            $sql = "INSERT INTO transaction(IDAch,IDVend,numID, 
                                                    enchere, meilleureOffre, achatImmediat, offre, contreOffre, compteur)
                            VALUES('$IDAch','$IDVend','$numID',1,0,0,$prixInitial,$prixInitial,0)";
                            if (mysqli_query($db_handle, $sql)) { //AND mysqli_query($db_handle, $sql2)
                                // success
                                // header('Location: index.php');
                            } else {
                                echo 'query error: ' . mysqli_error($db_handle);
                            }
                            echo '<script language="Javascript"> document.location.replace("enchere-ach.php"); </script>';
                            }

                            if( $_SESSION['typeVente'] == 1){

                            $sql = "INSERT INTO transaction(IDAch,IDVend,numID, 
                                                    enchere, meilleureOffre, achatImmediat,offre, contreOffre, compteur)
                            VALUES('$IDAch','$IDVend','$numID',0,1,0,$prixInitial,$prixInitial,0)";
                            if (mysqli_query($db_handle, $sql)) { //AND mysqli_query($db_handle, $sql2)
                                // success
                                // header('Location: index.php');
                            } else {
                                echo 'query error: ' . mysqli_error($db_handle);
                            }
                            echo '<script language="Javascript"> document.location.replace("negociation-ach.php"); </script>';
                            }

                            if( $_SESSION['typeVente'] == 2){
                            $sql = "INSERT INTO transaction(IDAch,IDVend,numID, 
                                                    enchere, meilleureOffre, achatImmediat,offre, contreOffre, compteur )
                            VALUES('$IDAch','$IDVend','$numID',0,0,1,$prixInitial,$prixInitial,0)";
                            if (mysqli_query($db_handle, $sql)) { //AND mysqli_query($db_handle, $sql2)
                                // success
                                // header('Location: index.php');
                            } else {
                                echo 'query error: ' . mysqli_error($db_handle);
                            }
                            echo '<script language="Javascript"> document.location.replace("panier.php"); </script>';
                            }
                }

                        ?>
                    </div>
                    <div class="card-action right-align"></div>
                </div>
            </div>
        </div>

        <?php
        // }
        ?>
    </div>


</body>

<?php include("config/footer.php"); ?>

</html>