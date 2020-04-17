<?php
session_start();
?>
<!DOCTYPE html>
<html lang="UTF-8">

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
        $typePay = $numCarte = $nomCarte = $dateExpi = $codeCarte = '';
        $errors = array('typePay' => '', 'numCarte' => '', 'nomCarte' => '', 'dateExpi' => '', 'codeSecu' => '');

        $database = 'ebayece';
        $db_handle = mysqli_connect('localhost', 'root', '', $database);
        // check connection
        if (!$db_handle) {
            echo 'Connection error: ' . mysqli_connect_error();
        }
         // $connection = false;
         // $prenom = "";
        
        
         if(isset($_POST['button4'])){
        
             if(array_filter($errors)){
                 echo 'errors in form';
             } else {
                 // escape sql chars
             $typePay = mysqli_real_escape_string($db_handle, $_POST['typePay']);
             $numCarte = mysqli_real_escape_string($db_handle, $_POST['numCarte']);
             $nomCarte = mysqli_real_escape_string($db_handle, $_POST['nomCarte']);
             $dateExpi = mysqli_real_escape_string($db_handle, $_POST['dateExpi']);
             $codeSecu = mysqli_real_escape_string($db_handle, $_POST['codeSecu']);
             
            $sqlinsert = "SELECT IDAch FROM acheteur ORDER BY IDAch DESC LIMIT 1";
            $res = mysqli_query($db_handle, $sqlinsert);
            $data = mysqli_fetch_assoc($res);
            $IDAch = $data['IDAch'];

            $sql = "INSERT INTO cartebancaire(IDAch,typePayement,numCarte, nomCarte, dateExpi, codeSecu)
             VALUES('$IDAch','$typePay','$numCarte','$nomCarte','$dateExpi','$codeSecu')";

            echo '$sql';
             // save to db and check
                if(mysqli_query($db_handle, $sql)){
                // success
                header('Location: index.php');
                } else {
                echo 'query error: '. mysqli_error($db_handle);
                }

            }
        }

    ?>

    <?php include("config/footer.php"); ?>


</body>

</html>