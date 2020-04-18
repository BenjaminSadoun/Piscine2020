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
        $nom = $prenom = $email = $mdp = $adresse1 = $adresse2 = $ville = $codePostal = $pays = $numeroTel = '';
        $errors = array('nom' => '', 'prenom' => '', 'email' => '', 'mdp' => '', 'adresse1' => '',
        'adresse2' => '', 'ville' => '', 'codePostal' => '', 'pays' => '', 'numeroTel' => '');

        $database = 'ebayece';
        $db_handle = mysqli_connect('localhost', 'root', '', $database);
        // check connection
        if (!$db_handle) {
            echo 'Connection error: ' . mysqli_connect_error();
        }
         // $connection = false;
         // $prenom = "";
        
        
         if(isset($_POST['button2'])){
		
        //check email
             if(empty($_POST['email'])){
                 $errors['email'] = 'An email is required';
             } else
                {
                 $email = $_POST['email'];
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                     $errors['email'] = 'Email must be a valid email address';
                    }
                }

             // check prenom
             if(empty($_POST['nom'])){
                 $errors['nom'] = 'Vous avez oublié votre nom';
             } else{
                 $title = $_POST['nom'];
                }

             if(empty($_POST['prenom'])){
                 $errors['prenom'] = 'Vous avez oublié votre prénom';
             } else{
                 $ingredients = $_POST['prenom'];
                }
        
             if(array_filter($errors)){
                 echo 'errors in form';
             } else {
                 // escape sql chars
             $nom = mysqli_real_escape_string($db_handle, $_POST['nom']);
             $prenom = mysqli_real_escape_string($db_handle, $_POST['prenom']);
             $email = mysqli_real_escape_string($db_handle, $_POST['email']);
             $mdp = mysqli_real_escape_string($db_handle, $_POST['mdp']);
             $adresse1 = mysqli_real_escape_string($db_handle, $_POST['adresse1']);
             $adresse2 = mysqli_real_escape_string($db_handle, $_POST['adresse2']);
             $ville = mysqli_real_escape_string($db_handle, $_POST['ville']);
             $codePostal = mysqli_real_escape_string($db_handle, $_POST['codePostal']);
             $pays = mysqli_real_escape_string($db_handle, $_POST['pays']);
             $numeroTel = mysqli_real_escape_string($db_handle, $_POST['numeroTel']);
            
             $sql = "INSERT INTO acheteur(nom,prenom,email,mdp,adresse1, adresse2,ville,codePostal,pays,numeroTel)
             VALUES('$nom','$prenom','$email','$mdp','$adresse1','$adresse2','$ville','$codePostal','$pays','$numeroTel')";

            echo '$sql';
             // save to db and check
                if(mysqli_query($db_handle, $sql)){
                // success
                header('Location: cartebancaire.php');
                } else {
                echo 'query error: '. mysqli_error($db_handle);
                }

            }
        }

    ?>

    <?php include("config/footer.php"); ?>


</body>

</html>