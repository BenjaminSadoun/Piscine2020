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
    <div  class='container features'>

    <nav id="sayHi">
        <?php
        $identifiant = isset($_POST["identifiant"]) ? $_POST["identifiant"] : "";
        $MdP = isset($_POST["MdP"]) ? $_POST["MdP"] : "";
        $erreur = "";
        $database = "ebayece";
        $db_handle = mysqli_connect('localhost', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);
        $_SESSION['nom'] = '';
        $_SESSION['prenom'] ='';
        $_SESSION['email'] = '';
        $_SESSION['mdp'] = '';
        $_SESSION['IDVend'] = 0;

        $_SESSION['coAdmin'] = '';
        $_SESSION['coAcheteur'] = '';
        $_SESSION['coVendeur'] = '';

        $connection = false;
        $prenom = "";
        $checkbox = false;
        $id = '';

        if ($db_found) {
            if ($_POST['connexion']=='acheteur') {
                $sql = "SELECT * FROM acheteur";
                $result = mysqli_query($db_handle, $sql);

                while ($data = mysqli_fetch_assoc($result)) {
                    if ($identifiant == $data['email'] && $MdP == $data['mdp']) {
                        $connection = true;
                        $prenom = $data['prenom'];
                        $id = $data['IDAch'];
                 
                        $_SESSION['nom'] = $data['nom'];
                        $_SESSION['prenom'] = $data['prenom'];
                        $_SESSION['email'] = $identifiant;
                        $_SESSION['mdp'] = $MdP;
                        $_SESSION['coAcheteur'] = 'connected';
                        $_SESSION['ville'] = $data['ville'];
                        $_SESSION['pays'] = $data['pays'];
                        $_SESSION['IDAch'] = $data['IDAch'];
                        $_SESSION['codePostal'] = $data['codePostal'];
                        $_SESSION['adresse1'] = $data['adresse1'];
                        $_SESSION['numeroTel'] = $data['numeroTel'];

                    }
                }
                if ($connection == false) {
                    echo "Il y a eu un problème de connexion à votre compte acheteur! Vérifiez votre identifiant et votre mot de passe";
                } else {
                    echo "<p style = 'font-size:30px;'> Bienvenue $prenom ! </p>";
                ?>
                
                <a href="index.php" class="btn btn-secondary ">Retourner à l'accueil</a>          
            <?php
                }
            } 
            if ($_POST['connexion']=='vendeur') {
                $sql = "SELECT * FROM vendeur";
                $result = mysqli_query($db_handle, $sql);

                while ($data = mysqli_fetch_assoc($result)) {
                    if ($identifiant == $data['email'] && $MdP == $data['mdp']) {
                        $connection = true;
                        $prenom = $data['prenom'];
                        
                        $_SESSION['nom'] = $data['nom'];
                        $_SESSION['prenom'] = $data['prenom'];
                        $_SESSION['email'] = $identifiant;
                        $_SESSION['mdp'] = $MdP;

                        $_SESSION['coVendeur'] = 'connected';
                        $_SESSION['IDVend'] = $data['IDVend'];
                        $_SESSION['photoProfil'] = $data['photoProfil'];
                        $_SESSION['fondEcran'] = $data['fondEcran'];
                        
                    }
                }
                if ($connection == false) {
                    echo "Il y a eu un problème de connexion à votre compte vendeur! Vérifiez votre identifiant et votre mot de passe";
                } else {
                    echo "<p style = 'font-size:30px;'> Bienvenue $prenom ! </p>";
                ?>
                
                <a href="index.php" class="btn btn-secondary ">Retourner à l'accueil</a>                <?php
                }
            }
            if ($_POST['connexion']=='admin') {
                $sql = "SELECT * FROM admin";
                $result = mysqli_query($db_handle, $sql);

                while ($data = mysqli_fetch_assoc($result)) {
                    if ($identifiant == $data['email'] && $MdP == $data['mdp']) {
                        $connection = true;
                        $prenom = $data['prenom'];

                        $_SESSION['nom'] = $data['nom'];
                        $_SESSION['prenom'] = $data['prenom'];
                        $_SESSION['email'] = $identifiant;
                        $_SESSION['mdp'] = $MdP;
                        $_SESSION['coAdmin'] = 'connected';
                    }
                }
                if ($connection == false) {
                    echo "Il y a eu un problème de connexion à votre compte admin! Vérifiez votre identifiant et votre mot de passe";
                } else {
                    echo "<p style = 'font-size:30px;'> Bienvenue $prenom ! </p>";
                    ?>
                    
                     <a href="index.php" class="btn btn-secondary ">Retourner à l'accueil</a>

                    <?php
                }
            } 
        } else {
            echo "Database not found";
        }
        mysqli_close($db_handle);
        ?>
    </nav>
 
    </div>

    <?php include("config/footer.php"); ?>


</body>

</html>