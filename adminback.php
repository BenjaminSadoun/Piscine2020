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

    <?php include("navig.php"); ?>

    <nav id = "sayHi">
    <?php
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $MdP = isset($_POST["MdP"]) ? $_POST["MdP"] : "";
    $erreur = "";
    $database = "ebayece";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    $connection = false;
    $prenom = "";

    if ($db_found) {
        $sql = "SELECT * FROM admin";
        $result = mysqli_query($db_handle, $sql);

        while ($data = mysqli_fetch_assoc($result)) {
            if ($email == $data['email'] && $MdP == $data['mdp']) {
                $connection = true;
                $prenom = $data['prenom'];
            }
        }
        ?>
        <div>
        <?php
        if ($connection == false) {
            echo "Il y a eu un problème de connexion! vérifier votre identifiant et votre mot de passe";
        } else {
            echo "Bonjour " . $prenom . "!";
        }
    } else {
        echo "Database not found";
    }
    mysqli_close($db_handle);
    ?>
    </nav>

    <?php include("footer.php"); ?>

    
</body>

</html>