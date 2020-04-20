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
    $offre = '';
    $errors = array('offre' => '');

    $database = 'ebayece';
    $db_handle = mysqli_connect('localhost', 'root', '', $database);
    // check connection
    if (!$db_handle) {
        echo 'Connection error: ' . mysqli_connect_error();
    }
    $IDAch = isset($_SESSION["IDAch"]) ? $_SESSION["IDAch"] : "";
    $IDVend = isset($_SESSION["IDVend"]) ? $_SESSION["IDVend"] : "";
  

    
    if (isset($_SESSION['IDAch'])){
            $sqlAch = "SELECT compteur, numID, IDTrans, offre, contreOffre FROM transaction WHERE IDAch = $IDAch";
            $resAch = mysqli_query($db_handle, $sqlAch);
            $infosAch = mysqli_fetch_assoc($resAch);
            mysqli_free_result($resAch);
            $IDTrans = $infosAch ['IDTrans'];
            $offre = $infosAch['offre'];
            $contreOffre = $infosAch['contreOffre'];
            $compteur = $infosAch['compteur'];
            // $IDAch = $_SESSION['IDAch'];
            // $sql = "SELECT contreOffre FROM transaction WHERE IDAch = $IDAch and IDTrans = $IDTrans ";
            // $res = mysqli_query($db_handle, $sql);
            // $infos = mysqli_fetch_assoc($res);
            // mysqli_free_result($res);
            // echo 'Le vendeur propose : '.$infos['contreOffre'].'.';
            if ($offre == 0){
                if (isset($_POST['soumettreAch'])) {
                    if (empty($_POST['offre'])) {
                        $errors['offre'] = 'Veuillez proposer un prix';
                    } else {
                        $offre = $_POST['offre'];
                    }

                    if (array_filter($errors)) {
                        echo 'errors in form';
                    } else {
                        $offre = mysqli_real_escape_string($db_handle, $_POST['offre']);

                        $sql = "UPDATE transaction SET offre = $offre, compteur = 0";
                        if (mysqli_query($db_handle, $sql)) {
                            // success
                            header('Location: index.php');
                        } else {
                            echo 'query error: ' . mysqli_error($db_handle);
                        }
                    }
                }
            }else if ($offre != 0){
                if (isset($_POST['soumettreAch'])) {
                    if (empty($_POST['offre'])) {
                        $errors['offre'] = 'Veuillez proposer un prix';
                    } else {
                        $offre = $_POST['offre'];
                    }

                    if (array_filter($errors)) {
                        echo 'errors in form';
                    } else {
                      
                            $offre = mysqli_real_escape_string($db_handle, $_POST['offre']);
                            $compteur = $compteur + 1;
                            $sql2 = "UPDATE transaction SET offre = $offre, compteur = $compteur";
                            if (mysqli_query($db_handle, $sql2)) {
                                // success
                                header('Location: index.php');
                            } else {
                                echo 'query error: ' . mysqli_error($db_handle);
                            }
                        }
                        
                    
                }
                if (isset($_POST['validerOffre'])){
                    $sql3 = "SELECT contreOffre,numID FROM transaction WHERE IDAch = $IDAch";
                    $res3 = mysqli_query($db_handle, $sql3);
                    $infos3 = mysqli_fetch_assoc($res3);
                    mysqli_free_result($res3);
                    $contreOffre = $infos3['contreOffre'];
                    $numID = $infos3['numID'];

                    // $req = "SELECT typeVente FROM item WHERE numID = $numID ";
                    // $result = mysqli_query($db_handle, $sreq);
                    // $type = mysqli_fetch_assoc($result);
                    // mysqli_free_result($result);
                    // $typeVente = $type['typeVente'];
                    // $typeVente = $_SESSION['typeVente'];

                    $sql4= "UPDATE item SET prixFinal = $contreOffre WHERE numID = $numID" ;
                    if (mysqli_query($db_handle, $sql4)) {
                        // success
                        header('Location: panier.php');
                    } else {
                        echo 'query error: ' . mysqli_error($db_handle);
                    }

                }
            }

}  else if (isset($_SESSION['IDVend'])){

            $sqlVend = "SELECT compteur, numID, IDTrans, offre, contreOffre FROM transaction WHERE IDVend = $IDVend";
            $resVend = mysqli_query($db_handle, $sqlVend);
            $infosVend = mysqli_fetch_assoc($resVend);
            mysqli_free_result($resVend);
            $IDTrans = $infosVend ['IDTrans'];
            $offre = $infosVend['offre'];
            $contreOffre = $infosVend['contreOffre'];
            $compteur = $infosVend['compteur'];

            if (isset($_POST['soumettreVend'])) {
                if (empty($_POST['contreOffre'])) {
                    $errors['contreOffre'] = 'Veuillez proposer un prix';
                } else {
                    $contreOffre = $_POST['contreOffre'];
                }
        
                if (array_filter($errors)) {
                    echo 'errors in form';
                } else {
                    $contreOffre = mysqli_real_escape_string($db_handle, $_POST['contreOffre']);
        
                    $sql = "UPDATE transaction SET contreOffre = $contreOffre";
                    if (mysqli_query($db_handle, $sql)) {
                        // success
                        header('Location: index.php');
                    } else {
                        echo 'query error: ' . mysqli_error($db_handle);
                    }
                }
            }
            if (isset($_POST['validerOffre'])){
                $sql5 = "SELECT offre,numID FROM transaction WHERE IDVend = $IDVend";
                $res5 = mysqli_query($db_handle, $sql5);
                $infos5 = mysqli_fetch_assoc($res5);
                mysqli_free_result($res5);
                $offre = $infos5['offre'];
                $numID = $infos5['numID'];

                $sql4= "UPDATE item SET prixFinal = $offre";
                if (mysqli_query($db_handle, $sql4)) {
                    // success
                    header('Location: achat.php');
                } else {
                    echo 'query error: ' . mysqli_error($db_handle);
                }

            }
        
        
    } else {
        echo 'La négociation n\'a pas été concluante.';
    }

    mysqli_close($db_handle);

    ?>

</body>

<?php include("config/footer.php"); ?>

</html>