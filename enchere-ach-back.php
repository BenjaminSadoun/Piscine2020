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
    <?php include("config/navig.php"); ?>

    <?php 
        $IDAch = $_SESSION['IDAch'];
        $IDAdm = 0;
        $numID = $_SESSION['numID'];
        $offre = '';
        $IDVend = $_SESSION['IDVend'];
        $errors = array('offre' => '');
        // $dateDebut = $dateFin = date("Y-m-d H:i:s");
        
        $database = 'ebayece';
        $db_handle = mysqli_connect('localhost', 'root', '', $database);


        if (!$db_handle) {
            echo 'Connection error: ' . mysqli_connect_error();
        }

        if(isset($_POST['submit'])){
            
            if(array_filter($errors)){
                echo 'errors in form';
            } else {
            
            $offre = mysqli_real_escape_string($db_handle, $_POST['offre']);

            
            $sql = "UPDATE transaction SET offre = $offre WHERE IDAch = $IDAch and numID = $numID";

            if(mysqli_query($db_handle, $sql)){ 
                
                // header('Location: index.php');
            } else {
                echo 'query error: '. mysqli_error($db_handle);
            }
        }  

        $sql2 = "SELECT dateFin FROM item WHERE numID = $numID";
        $res2 = mysqli_query($db_handle, $sql2);
        $infos2 = mysqli_fetch_assoc($res2);
        mysqli_free_result($res2);
        $dateFin= $infos2['dateFin'];    

        if ($dateFin<date("Y-m-d H:i:s")){
            $sql3 = "SELECT offre FROM transaction WHERE numID = $numID";
            $res3 = mysqli_query($db_handle, $sql3);
            $infos3 = mysqli_fetch_all($res3, MYSQLI_ASSOC);
            mysqli_free_result($res3); 
        }
    }
    ?>


</body>

<?php include("config/footer.php"); ?>


</html>