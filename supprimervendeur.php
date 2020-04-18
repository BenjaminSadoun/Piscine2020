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

    <form action = "#" method="POST">   
        <input type="email" class="form-control" placeholder="Son email :" name="email">
        
        <input type="submit" class="btn btn-secondary btn-block" value="Supprimer ce vendeur à la base de donnée" name="supprimer" >
    </form> 

    <?php
        $email = '';
        $errors = array('email' => '');

        $database = 'ebayece';
        $db_handle = mysqli_connect('localhost', 'root', '', $database);
        // check connection
        if (!$db_handle) {
            echo 'Connection error: ' . mysqli_connect_error();
        }
         // $connection = false;
         // $prenom = "";
        
        
         if(isset($_POST['supprimer'])){
		
        // check email
             if(empty($_POST['email'])){
                 $errors['email'] = 'An email is required';
             } else
                {
                 $email = $_POST['email'];
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                     $errors['email'] = 'Email must be a valid email address';
                    }
                }
        
             if(array_filter($errors)){
                 echo 'L\'adresse email n\'a pas été trouvée';
             } else {
                 // escape sql chars
             $email = mysqli_real_escape_string($db_handle, $_POST['email']);        
             $sql = "DELETE FROM vendeur WHERE email = '$email'";
            // echo '$sql';
             // save to db and check
                if(mysqli_query($db_handle, $sql)){
                // success
                // header('Location: index.php');
                } else {
                echo 'query error: '. mysqli_error($db_handle);
                }

            }
        }

    ?>

    <?php include("config/footer.php"); ?>

    <?php include("config/footer.php"); ?>


</body>

</html>