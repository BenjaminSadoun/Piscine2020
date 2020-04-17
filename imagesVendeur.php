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
    <title> Ebay ECE </title>

</head>

<body>
    <div id="header">
        <h1 id="h1">Ebay ECE</h1>
        <h2 id="h2">La vente en ligne pour la communauté ECE Paris</h2>
    </div>

    <?php include("config/navig.php"); ?>

    <nav id="sayHi">

        <?php  
        
        $IDAdm = $nom = $prenom = $email = $mdp = $fondEcran = $photoProfil = '';
        $errors = array('nom' => '', 'prenom' => '', 'email' => '', 'mdp' => '', 'fondEcran' => '', 'photoProfil' => '');
        
        $IDAdm = 1;
        $msg ="";

        $target1 = "img/".basename($_FILES['photoProfil']['name']);
        $target2 = "img/".basename($_FILES['fondEcran']['name']);

        $database = 'ebayece';
        $db_handle = mysqli_connect('localhost', 'root', '', $database);
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        $email = $_SESSION['email'];
        $mdp = $_SESSION['mdp'];
        // check connection
        if (!$db_handle) {
            echo 'Connection error: ' . mysqli_connect_error();
        }
            
        if(isset($_POST['button1'])){
		
            if(array_filter($errors)){
                echo 'errors in form';
            } else {
                $photoProfil = $_FILES['photoProfil']['name'];
                $fondEcran = $_FILES['fondEcran']['name'];
                
                // $photoProfil = mysqli_real_escape_string($db_handle, $_POST['photoProfil']);
                // $fondEcran = mysqli_real_escape_string($db_handle, $_POST['fondEcran']);

            // create sql
           
            // $sql = "INSERT INTO vendeur (IDAdm,nom,prenom,email,mdp,photoProfil,fondEcran)
            // VALUES (1, '$nom','$prenom','$email','$mdp','$photoProfil', '$fondEcran')";

            $sql = "UPDATE vendeur SET photoProfil = '$photoProfil', fondEcran = '$fondEcran'
             WHERE email = '$email' ";
            
            // save to db and check
            if(mysqli_query($db_handle, $sql)){
                // success
                // header('Location: index.php');
                
            } else {
                echo 'query error: '. mysqli_error($db_handle);
            }

            if (move_uploaded_file($_FILES['photoProfil']['tmp_name'], $target1)){
                $msg = "L'image a été correctement chargée";
                echo '<script>alert("Image correctement inseree")</script>';
            }else{
                $msg = "Il y a eu un problème de chargement d'item";
            }

            if (move_uploaded_file($_FILES['fondEcran']['tmp_name'], $target2)){
                $msg = "L'image a été correctement chargée";
            }else{
                $msg = "Il y a eu un problème de chargement d'item";
            }

        }  
    }
    
    
         ?> </nav>

    </body>

<?php include("config/footer.php"); ?>


</html>
