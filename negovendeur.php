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
    $contreOffre = '';
    $errors = array('contreOffre' => '');

    $database = 'ebayece';
    $db_handle = mysqli_connect('localhost', 'root', '', $database);
    // check connection
    if (!$db_handle) {
        echo 'Connection error: ' . mysqli_connect_error();
    }
    
    // if (isset($_POST['soumettreVend'])) {
    //     if (empty($_POST['contreOffre'])) {
    //         $errors['contreOffre'] = 'Veuillez proposer un prix';
    //     } else {
    //         $contreOffre = $_POST['contreOffre'];
    //     }

    //     if (array_filter($errors)) {
    //         echo 'errors in form';
    //     } else {
    //         $offre = mysqli_real_escape_string($db_handle, $_POST['contreOffre']);

    //         $sql = "UPDATE transaction SET offre = 0, contreOffre = $contreOffre, compteur = 1";
    //         if (mysqli_query($db_handle, $sql)) {
    //             // success
    //             header('Location: index.php');
    //         } else {
    //             echo 'query error: ' . mysqli_error($db_handle);
    //         }
    //     }
    // }

   


    ?>

</body>

<?php include("config/footer.php"); ?>

</html>